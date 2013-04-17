# -*- coding: utf-8 -*-
'''
Bikini: a minimalist Python wiki.
'''
from __future__ import with_statement # Python 2.5+

__version__ = (1, 1, 0)

BIKINI_VERSION = u'%d.%d.%d' % __version__

import sys, os, re, cgi, cgitb, time
from string import Template

from Cookie import SimpleCookie #, CookieError

try: 
    from configuration import *
except ImportError:
    OWNER_NAME = u'John Doe'
    OWNER_URI = u'http://example.com/'
    SITE_NAME = u'Bikini'
    SITE_DESCRIPTION = u'My Bikini wiki'
    USE_SMARTYPANTS = False  
    INDEX_PAGE = u'FrontPage'
    NAV_NAMES = u'FrontPage Names RecentChanges AboutBikini'
    DEBUG = False
    ENCODING = u'utf-8'

if DEBUG: 
    cgitb.enable() 
    
class HTTPError(Exception):
    def __init__(self, status, headers={}): #, body=u''):
        self.headers = headers
        super(HTTPError, self).__init__(status)
# class NotFoundError(HTTPError): pass
        
def log(s, *args):
    
    if not DEBUG: return # Silent
    
    if not args:
        args = ()
    
    print >>sys.stderr, encode(s % args)


def encode(value):
    return value.encode(ENCODING, 'replace')

def decode(value):  
    if type(value) == unicode:
        return value  
    return unicode(value, ENCODING, 'replace')        
    
def fill_template(templatename, **kwargs):    
        
    with open(os.path.join(u'./templates', templatename)) as f:
        template = f.read()   
    
    return fill_text_template(decode(template), **kwargs)


def fill_text_template(text, **kwargs):    

    t = Template(text)
    
    # First, update d with globals
    d = globals() 
    d.update(kwargs)
        
    return t.safe_substitute(d)

# def make_page(templatenames, status='200 OK', **kwargs):    
# 
#     for templatename in templatenames:
#         page_ = fill_template(templatename, **kwargs)
#    
#     current_page = ''
#     layout = fill_template('app.html',current_page=current_page, **kwargs)

def make_page(templatename, status=u'200 OK', headers={}, **kwargs):    
    
    g = globals()
 
    user_stylesheet_filename = g.get('USER_STYLESHEET', None)    
    if user_stylesheet_filename:
        user_stylesheet_link = fill_text_template(u'<link rel="stylesheet" href="$BASE_URI/s/$filename" type="text/css" media="all" />', filename=user_stylesheet_filename)
    else:
        user_stylesheet_link = u''

    # Fallback to SITE_NAME if page_id is not given
    site_title = kwargs.get('page_id', SITE_NAME)    
    
    kwargs.update({
        'site_title': site_title,
        'user_stylesheet_link': user_stylesheet_link,
    })
    
    
    #@@ This sucks
    current_page = fill_template(templatename, **kwargs)
    html = fill_template(u'app.html',site_content=current_page, **kwargs)

    return  status, headers, html

def make_404_page(**kwargs):    
    return make_page(u'404.html', status=u'404 Not Found', headers={}, **kwargs)

#@@
# def make_500_page(**kwargs):    
#     return '500 xxx', {}, fill_template('500.html', **kwargs)

def redirect_to(url, permanent=False):    
    """
    Output HTTP '303 See Other' redirect headers and empty page body.
    """        
    return u"303 See Other", {u"Location": url}, u''


request_dict = dict(
    request_uri=decode(os.getenv('REQUEST_URI', u'')),
    document_root=os.getenv('DOCUMENT_ROOT', u''),
    server_name=os.getenv('SERVER_NAME', u''),

    script_name=os.getenv('SCRIPT_NAME', u''),
    #path_translated=os.getenv('PATH_TRANSLATED', u''),        
    
    remote_host=os.getenv('REMOTE_HOST', u''),        
    remote_user=os.getenv('REMOTE_USER', u''),        

    # HTTP method (get, post, etc.)
    request_method=os.getenv('REQUEST_METHOD', u'get').lower(),
    
    path_info=decode(os.getenv('PATH_INFO', '')),
    query_string=cgi.parse_qs(os.getenv('QUERY_STRING', u''), keep_blank_values=True),            
            
    #http_referer=os.getenv('HTTP_REFERER', u''),
    http_cookie=decode(os.getenv('HTTP_COOKIE', '')),
    
    # Cache support
    http_if_modified_since = os.getenv('HTTP_IF_MODIFIED_SINCE', u''),
    http_if_none_match = os.getenv('HTTP_IF_NONE_MATCH', u''),            
    
    # UA
    #http_user_agent = os.getenv('HTTP_USER_AGENT', u''),        
)

BASE_URI = request_dict['script_name'].replace(u'/index.cgi', u'')
NAV_ITEMS = u' | '.join([fill_text_template(u'<a href="$BASE_URI/$name">$name</a>', name=name) for name in NAV_NAMES.split()])
NAV_SELECT = u'<select name="go-to">%s</select>' % u'\n'.join([fill_text_template(u'<option value="$name">$name</option>', name=name) for name in NAV_NAMES.split()])

URL_MAP = []

DEFAULT_OUTPUT_HEADERS = {
    'Content-Type': "text/html; charset=%s" % ENCODING
}

cookie = SimpleCookie(os.getenv('HTTP_COOKIE', ''))
#@@ Should be:
#cookie = SimpleCookie(request_dict['http_cookie'])

def set_message(text):
    #from helpers import format_http_datetime
    cookie["message"] = text
    cookie["message"]["domain"] = request_dict['server_name']
    cookie["message"]["path"] = BASE_URI
    cookie["message"]["max-age"] = 60
    #cookie["message"]["expires"] = format_http_datetime(time.time() + 60) # 1 min. 

def get_message():
    try:
        message = decode(cookie['message'].value)
        #del cookie['message']
    except KeyError:
        return u''

    return message

def make_message(text):
    from helpers import escape_html
    
    try: 
        klass, message = escape_html(text).split(u' ', 1)
    except ValueError:
        return u''
    
    return u'<div class="message %s">%s</div>' % (klass.lower(), message)
    
def dispatch_request():

    output_headers = {}
    output_headers.update(DEFAULT_OUTPUT_HEADERS)

    def find_handler():
    
        path_info, request_method = request_dict['path_info'], request_dict['request_method']
        
        for re, method, handler in URL_MAP:        
            match = re.match(path_info)
            if match and (method == request_method):                    
                return handler, match.groups()
    
        log(u'Request not matched with "%s" and method %s',  path_info, request_method)        
        raise HTTPError(u"404 Not Found")  
        

    def response(lines):
        print encode('\n'.join(lines))
                
    try:                    
        handler, args = find_handler()
                   
        if not args:
            args = ()
        
        status, headers, body = handler(request_dict, *args)
        
        output_headers.update(headers)
        output_headers['Content-Length'] = len(body)
    
        response([u'Status: %s' % status,        
            u'\n'.join([u'%s: %s' % (k, output_headers[k]) for k in output_headers]),    
            #cookie.output(),
            u'',
            body])

#     except NotFoundError, ex:                        
#         raise ex        
    except HTTPError, ex:          
        output_headers.update(ex.headers)
                                  
        response([u'Status: %s' % ex,        
            u'\n'.join([u'%s: %s' % (k, output_headers[k]) for k in output_headers]),    
            u'',
            u'<h1>%s</h1>' % ex])
        
# Decorator
def action(pattern=u'^$', request_method=u'get'):    
    
    def _(handler):         
        URL_MAP.append((re.compile(pattern, re.U), request_method, handler))
        return handler   

    return _   


# ------------------------------------------------------

import handlers



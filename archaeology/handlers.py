# -*- coding: utf-8 -*-
from __future__ import with_statement # Python 2.5+
import os, sys, cgi, glob, time, re

from app import *
from helpers import *

MAX_FEED_ENTRIES = 50
RESERVED_NAMES = ['AboutBikini', 'Names', 'Needed', 'RecentChanges', 'Unlinked']
WIKI_WORD = u'[A-Z]+[a-zA-Z0-9]+' # Matches SomePage, APage, Page, OkPage123

re_filename = re.compile(r'^\./pages/(\w+)\.(\d+)\.\w+$', re.U)
#re_filename = re.compile(r'^\./pages/(\w+)\.(\d+)', re.U)
def get_page_id(filename, filetype=u'html'):
    #page_id, revision_id = re_filename.match(filename).groups()     
    return filename.replace(u'./pages/', u'').replace('.%s' % filetype, u'')
    #return page_id

#@@ merge with get_page_id
def _get_page_id(filename):
    page_id, revision_id = re_filename.match(filename).groups()     
    return page_id, int(revision_id)

def get_revision_id(filename):
    _, revision_id = re_filename.match(filename).groups()    
    return int(revision_id)

def find_latest_revision(page_id):
    filenames = glob.glob(FILENAME_MASK % (page_id, u'.*', u'txt'))
        
    if not filenames:
        #@@ Raise IOError instead
        raise HTTPError('404 Not found')
    
    filenames.sort(reverse=True)
    return filenames[0], get_revision_id(filenames[0])

# E.g.
# SomePage.html
# SomePage.99.txt
# SomePage.draft.txt
FILENAME_MASK = u'./pages/%s%s.%s'

def make_filename(page_id, revision_id, filetype=u'txt'):
    return FILENAME_MASK % (page_id, u'.%02d' % int(revision_id), filetype)
    
def make_hash(s):      
    import hashlib
    return hashlib.md5(s).hexdigest()

re_link = re.compile(ur'^\./links/(\w+)%(\w+)$', re.U)    
def get_inbound_links(page_id): 
    # Linking page is 0, given page is 1 
    return [re_link.match(filename).groups()[0] for filename in glob.glob(u'./links/*%%%s' % page_id)]

def get_outbound_links(page_id): 
    # Given page is 0, linked page is 1 
    return [re_link.match(filename).groups()[1] for filename in glob.glob(u'./links/%s%%*' % page_id)]

def update_outbound_links(page_id, links):    

    # Remove previous indices
    for _ in get_outbound_links(page_id):
        os.unlink('./links/%s%%%s' % (page_id, _)) 
    
    for link in links:
        open('./links/%s%%%s' % (page_id, link), 'w').close() # Touch

# def app_template(**kwargs):
#     def _(filename, **kwargs)
#         return fill_template(filename, **kwargs)
# 
#     return _('app.html', kwargs)

# -------------------
# Index page
# -------------------

@action()
def index(request):     
    return page(request, INDEX_PAGE)

# -------------------
# Special pages
# -------------------

@action(r'^/RecentChanges$')
def recent_changes(request):

    pages = []    
     
    for filename in glob.glob(u'./pages/*.txt'):                
        pages.append((filename, os.path.getmtime(filename)))
    
    # Sort by mtime
    pages.sort(key=lambda t : t[1], reverse=True)
    
    page_list = []
    
    template_dt = u'<dt><a href="$BASE_URI/$page_id">$page_id</a></dt>'
    template_dd = u'<dd>$last_modified_on $is_new</dd>'

    if pages:
        prev_page_id = None
        for filename, mtime in pages[:MAX_FEED_ENTRIES]:
            page_id, revision_id = _get_page_id(filename)
            last_modified_on = format_datetime(mtime, short=False)        
            is_new = (revision_id == 1) and u'<span class="new">(created)</span>' or u''
            
            if page_id == prev_page_id:                        
                page_list.append(fill_text_template(template_dd, **locals()))
            else:
                page_list.append(fill_text_template(template_dt, **locals()))
                page_list.append(fill_text_template(template_dd, **locals()))

            prev_page_id = page_id           
    else:
        page_list.append(u'<dd class="empty">None</dd>')

    page_id='RecentChanges'
    page_list = u'\n'.join(page_list)
        
    return make_page(u'meta_updates.html', **locals())



template_feed = u'''<?xml version="1.0" encoding="$ENCODING"?>
<feed xml:lang="en" xmlns="http://www.w3.org/2005/Atom">	  
<link href="http://$server_name$feed_uri" rel="self" />    
<updated>$feed_last_updated_on</updated>    
<id>http://$server_name$feed_uri</id>	  
<title>$SITE_NAME</title>	
$entry_list
</feed>
'''

#@@ urlquote <link> contents
template_feed_entry = u'''<entry>
    <id>tag:$server_name,$created_on_year:$BASE_URI/$page_id-$revision_id</id>
    <link href="http://$server_name$BASE_URI/$page_id" rel="alternate" type="text/html" />
    <title>$page_id$is_new</title>
    <published>$created_on</published>
    <updated>$created_on</updated>
    <author>
        <name>$OWNER_NAME</name>
        <uri>$OWNER_URI</uri>
    </author>
    <content type="xhtml">
        <div xmlns="http://www.w3.org/1999/xhtml">
            $teaser
        </div>
    </content>
</entry>'''

@action('^/RecentChanges/feed$')
def recent_changes_feed(request):

    #@@ Use urlparse.urljoin(base, url) to include http://$server_name/$base_uri/RecentChanges/feed
    feed_uri = BASE_URI + u'/RecentChanges/feed'

    pages = []    
     
    for filename in glob.glob(u'./pages/*.txt'):                
        pages.append((filename, os.path.getctime(filename)))
    
    # Sort by mtime
    pages.sort(key=lambda t : t[1], reverse=True)
    
    entry_list = []

    server_name = request['server_name']    
    if pages:
        for filename, ctime in pages[:MAX_FEED_ENTRIES]:
            page_id, revision_id = _get_page_id(filename)            
            created_on = format_iso_datetime(ctime)
            created_on_year = format_year(ctime)
            is_new = (revision_id == 1) and u' (New page)' or u''                        
            if revision_id == 1:
                teaser = fill_text_template(u'A new page <i>$page_id</i> has been created.', **locals())
            else:
                prev_revision_id = revision_id-1
                teaser = fill_text_template(u'Revision $revision_id for page <i>$page_id</i> has been created. <a href="http://$server_name/$BASE_URI/$page_id/diff/$prev_revision_id/$revision_id">View changes</a>.', **locals())
            
            entry_list.append(fill_text_template(template_feed_entry, **locals()))
        
        feed_last_updated_on = format_iso_datetime(pages[0][1])
    else:
        # Fallback
        feed_last_updated_on = format_iso_datetime(time.time())
        
    entry_list = u'\n'.join(entry_list)

    return '200 OK', {'Content-Type': 'application/atom+xml'}, fill_text_template(template_feed, **locals())

    
@action(r'^/Names$')
def names(request):

    pages = [get_page_id(filename) for filename in glob.glob(u'./pages/*.html')]                        
    pages.extend(RESERVED_NAMES)
    pages.sort()

    page_list = []
    
    for page_id in pages:
        page_list.append(fill_text_template(u'<li><a href="$BASE_URI/$page_id">$page_id</a></li>', **locals()))

    if not pages:
        page_list.append(u'<li class="empty">None</li>')
    
    page_count = len(pages)
    s = (page_count != 1) and u's' or u''
    page_list = u'\n'.join(page_list)
    
    page_id = 'Names'
    
    return make_page(u'meta_pages.html', **locals())


@action(r'^/Needed$')
def needed(request):

    needed_pages = set(get_outbound_links(u'*')) - set([get_page_id(page) for page in glob.glob(u'./pages/*.html')]) - set(RESERVED_NAMES)
    
    page_list = []
    
    for filename in needed_pages:
        page_list.append(fill_text_template(u'<li><a href="$BASE_URI/$page_id">$page_id</a></li>', page_id=get_page_id(filename)))

    if not needed_pages:
        page_list.append(u'<li class="empty">None</li>')
    
    page_count = len(needed_pages)
    s = (page_count != 1) and u's' or u''
    page_list = u'\n'.join(page_list)
 
    page_id = 'Needed'
       
    return make_page(u'meta_needed.html', **locals())
    

@action(r'^/Unlinked$')
def unlinked(request):

    needed_pages = set([get_page_id(page) for page in glob.glob(u'./pages/*.html')]) -  set(get_outbound_links(u'*')) - set(RESERVED_NAMES)
    
    page_list = []
    
    for filename in needed_pages:
        page_list.append(fill_text_template(u'<li><a href="$BASE_URI/$page_id">$page_id</a></li>', page_id=get_page_id(filename)))

    if not needed_pages:
        page_list.append(u'<li class="empty">None</li>')
    
    page_count = len(needed_pages)
    s = (page_count != 1) and u's' or u''
    page_list = u'\n'.join(page_list)

    page_id = 'Unlinked'
        
    return make_page(u'meta_unlinked.html', **locals())    


@action(r'^/AboutBikini$')
def about(request):

    page_id = 'AboutBikini'

    return make_page(u'meta_about.html', **locals())


# -------------------
# User pages
# -------------------

@action(r'^/(%s)$' % WIKI_WORD)
def page(request, page_id):

    filename = FILENAME_MASK % (page_id, u'', u'html')

    try:
        with open(filename) as f:
            content = decode(f.read())
    except IOError, ex:        
        return make_404_page(**locals())        

    last_modified_on = format_datetime(os.path.getmtime(filename))
    message = get_message()
    
#     page_id = find_page_title(content) or page_id
    return make_page(u'page.html', **locals())
    #return make_page(u'page.html', headers={'Last-Modified':last_modified_on}, **locals())


# def find_page_title(content):    
#     def get_text(nodes):
#         return ''.join([node for node in nodes if node.nodeType == node.TEXT_NODE])
# 
#     from xml.dom.minidom import parseString
#     first_node = parseString(content).firstChild
#     if first_node.tagName == u'h1':
#         return get_text(first_node.childNodes)


@action(r'^/(%s)$' % WIKI_WORD, 'post')
def page_post(request, page_id):

    if not os.path.exists(u'./pages'):
        os.mkdir(u'./pages')
    
    form = cgi.FieldStorage()        
    content = form.getfirst('content', u'')
    content_hash = form.getfirst('content_hash', u'')    
    # Check for spambots
    honeypot = form.getfirst('hneoyopt')   
    
    if honeypot:
        return redirect_to(page_id)   # Ignore request    
    
    # Check if it's really changed something    
    if content_hash == make_hash(content):
        return redirect_to(page_id)   

    # Process Creole sytax     
    #try:
    emitter = process_content(decode(content))    
    html_content = emitter.emit()    
    #except ValueError:
    #    message = make_message(u'ERROR There were errors while processing your page. Please review it and save again.')
    #    return make_page(u'page_edit.html', **locals())

    if USE_SMARTYPANTS:
        html_content = smartypants(html_content)

    # Save page source
    try: 
        filename, revision_id = find_latest_revision(page_id)
    except HTTPError:
        revision_id = 0 # New page
        
    filename = make_filename(page_id, revision_id+1)
         
    with open(filename, 'w') as f:
        f.write(content)

    # Save HTML code
    with open(FILENAME_MASK % (page_id, u'', u'html'), 'w') as f:
        f.write(encode(html_content))

    # Update links 
    if not os.path.exists(u'./links'):
      os.mkdir(u'./links')
    
    update_outbound_links(page_id, emitter.outbound_links)

    #set_message(u'INFO ✓ Page saved.') 
    
    return redirect_to(page_id)    

@action(r'^/(%s)/edit$' % WIKI_WORD)
def page_edit(request, page_id):

    try: 
        filename, _ = find_latest_revision(page_id)

        with open(filename) as f:
            content = f.read()
            # make_hash requires a str, not unicode
            content_hash = make_hash(content)            
            content = decode(content)            
            
    except HTTPError:
        # New page
        content = u''
        content_hash = u''                        

    message = make_message(get_message())
    
    #@@ Page title: page_id (edit)

    return make_page(u'page_edit.html', **locals())
    

@action(r'^/(%s)/source$' % WIKI_WORD)
def page_source(request, page_id):
    _, revision_id = find_latest_revision(page_id)    
    return page_source_revision(request, page_id, revision_id)

@action(r'^/(\w+)/source/(\d+)?$')
def page_source_revision(request, page_id, revision_id):

    filename = make_filename(page_id, revision_id)
    
    try:
        with open(filename) as f:            
            content = decode(f.read())    
    except IOError, ex:
        raise HTTPError('404 Not Found') #@@ raise NotFoundError

    return u'200 OK', {'Content-Type': 'text/plain; charset=%s' % ENCODING}, escape_html(content)


@action(r'^/(%s)/about$' % WIKI_WORD)
def page_about(request, page_id):
    
    filename = FILENAME_MASK % (page_id, u'', u'html')
    
    try:
        with open(filename) as f:
            content = f.read()    
    except IOError, ex:
        raise HTTPError('404 Not Found')   #@@ raise NotFoundError()     

    last_modified_on = format_datetime(os.path.getmtime(filename), short=False)

    template_li = u'<li><a href="$BASE_URI/$link_id">$link_id</a></li>'

    inbound_links = []
    
    for link_id in get_inbound_links(page_id):    
        inbound_links.append(fill_text_template(template_li, **locals()))

#     if not inbound_links:
#         inbound_links.append(u'<li class="empty">None</li>')

    inbound_links_count = len(inbound_links)    
    inbound_links = u'\n'.join(inbound_links)
    
    revisions = []

    for filename in glob.glob(FILENAME_MASK % (page_id, u'*', u'txt')):                
        revisions.append((filename, os.path.getsize(filename), os.path.getmtime(filename)))
    
    # Sort by filename
    revisions.sort(key=lambda t : t[0], reverse=True)
    
    revision_list = []
    
    template_li = u'''<li class="$is_minor">$last_modified_on &mdash; 
        <a href="$BASE_URI/$page_id/source/$revision_id">source</a>$diff_a 
        </li>'''
    
    template_a = u', <a href="$BASE_URI/$page_id/diff/$revision_id_prev/$revision_id">changes</a>'
    
    if revisions:
        for index, (filename, size, mtime) in enumerate(revisions[:100]):
            revision_id = get_revision_id(filename)
            diff_a = u''
            is_minor = u''
            if revision_id > 1:
                # Check if major edit - it is heuristic. However, 
                #   it will be right most of the time
                is_minor = abs(size-revisions[index+1][1]) < 20 and u'minor dim' or u'' 
                revision_id_prev = revision_id-1
                diff_a = fill_text_template(template_a, **locals())
            
            last_modified_on = format_datetime(mtime, short=False)
            
            revision_list.append(fill_text_template(
                template_li, **locals()))
    else:
        revision_list = [u'<li class="empty">None</li>']    
    
    revision_count = len(revision_list)
    revisions=u'\n'.join(revision_list)

    #@@ Page title: page_id (about)
    
    return make_page('page_about.html', **locals())




@action(pattern=r'^/(%s)/diff/(\d+)/(\d+)$' % WIKI_WORD)
def page_diff(request, page_id, prev_rev, rev):
    
    try:
        with open(make_filename(page_id, rev)) as f:
            content = f.read()    
        with open(make_filename(page_id, prev_rev)) as f:
            content_prev = f.read()    
    except IOError, ex:
        return make_404_page(**locals())        

    from difflib import Differ

    content_prev, content = map(unicode.splitlines, map(decode, [content_prev, content]))

    diff = u''
    for line in list(Differ().compare(content_prev, content)): 
        if line.startswith(u'+ '):
            diff += u'<ins>%s</ins><br />' % escape_html(line)            
        elif line.startswith(u'- '):
            diff += u'<del>%s</del><br />' % escape_html(line)        
        elif line.startswith(u'? '):
            diff += u'<span%s</span><br />' % escape_html(line)
        else:
            # As-is
            diff += u'%s<br />' % escape_html(line)
    
    #@@ Page title: page_id (diff)
    
    return make_page('page_diff.html', **locals())


# ------------------------------------------------------------

re_wiki_word = re.compile(ur'^%s$' % WIKI_WORD) # re.U

def process_content(text):

    from creole.creole2html.parser import CreoleParser
    from creole.creole2html.emitter import HtmlEmitter
    
    class BikiniHtmlEmitter(HtmlEmitter): 
    
        def __init__(self, root,  macros=None, verbose=1, stderr=sys.stderr):
            HtmlEmitter.__init__(self, root, macros, verbose, stderr)
            # Track internal links
            self.outbound_links = []        


        def link_emit(self, node):
            target = node.content
            # Check if it is a WikiWord
            if re_wiki_word.match(target):                
                #@@ Check if broken
                self.outbound_links.append(target)

            return HtmlEmitter.link_emit(self, node)
    
    parser = CreoleParser(text)
    document = parser.parse()

    try:
        module = __import__('user_macros')
        macros = dict([(macro, getattr(module, macro)) for macro in dir(module) if not macro.startswith('_')])
    except ImportError:
        macros = None

    return BikiniHtmlEmitter(document, macros=macros)


# -*- coding: utf-8 -*-
import cgi, urllib, time, timeformat

def escape_html(value):
    """
    Escape HTML <, > & and " symbols.
    """
    #value = str(value) 
    return cgi.escape(value, quote=True)

def escape_url(value):
    """
    Escape given URL using percent-encoding.
    """    
    return urllib.quote(value)

def smartypants(value):
    import smartypants
    return smartypants.smartyPants(value, 'qbDe')

def format_year(seconds):
    return timeformat.format('%Y', time.gmtime(seconds), utctime=True)

def format_datetime(seconds, short=True):    
    return timeformat.format(short and '%b %d, %Y' or '%b %d, %Y at %H:%M %Z', 
        time.gmtime(seconds), utctime=True)

def format_iso_datetime(seconds):        
    return timeformat.format(u'%Y-%m-%dT%H:%M:%S%z', 
        time.gmtime(seconds), utctime=True)

def format_http_datetime(seconds):        
    return timeformat.format(u'%a[SHORT], %d %b[SHORT] %Y %H:%M:%S %Z', 
        time.gmtime(seconds), utctime=True)
        
# def truncate_words(value, length, extra=''):
#     """
#     Truncates a string after a certain number of words
#     @length  number of words to truncate after.
#     @extra   add a string suffix when truncation happens
#     """
#     
#     #value = str(value).decode('utf-8')
#         
#     words = value.split()
#     if len(words) > length:            
#         words = words[:length]
#         
#         if extra: 
#             #extra = str(extra).decode('utf-8')                
#             words.append(extra)  
#     
#     return u' '.join(words)
    
    

# import re
# RE_WIDONT = re.compile(r'''(?<!>)\s+(?!<)''', re.U|re.M|re.S)
# 
# def widont(value):
#     """Adapted from typogrify's 'widont' filter, 
#     does not check tags"""
#     
#     tokens = RE_WIDONT.split(value)
#     if len(tokens) <= 1:
#         return value
#     i = -1
#     for t in reversed(tokens):
#         if len(t) > 1:
#             break
#         i -= 1
#     return u"%s&nbsp;%s" % (u' '.join(tokens[:i]), u'&nbsp;'.join(tokens[i:]))
        
# ---------------------------------------------------------------------



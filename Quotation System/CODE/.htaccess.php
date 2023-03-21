# enable mod_rewrite
RewriteEngine On
 
# RewriteCond = define rule condition
# HTTP_REFERER = check from where the request originated
# ! = exclude
# ^ = start of string
# [NC] = case insensitive search
RewriteCond %{HTTP_REFERER} !^http://localhost/Admin%20Customer%20asing [NC]
 
# \ = match any
# . = any character
# () = pattern, group
# $ = end of string
 
# [F] = forbidden, 403
# [L] = stop processing further rules
RewriteRule \.(gif|jpg|jpeg|png|mp4|mov|mkv|flv)$ - [F,L]
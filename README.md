A wordpress plugin I have developed at work. Facebook Feed for Wordpress

A facebook feed plugin combined with owl carousel makes a carousel of your facebook page posts with pictures, counter of likes/comments/shares, link to the posts on facebook.

Integration kind of simple :/

1 - Install the plugin

2 - Make a facebook app at facebook developers

3 - Get a users token at https://developers.facebook.com/tools/accesstoken/ > Debug > Extend Access Token

4 - Copy and paste your access tokken on the FB Feed Settings option page (On your wordpress pannel left sidebar) > Facebook Extended User Access Token

5 - Retrieve your business page id from your facebook business page > About > Page Information > Page ID

6 - Use this shortcode were you want your feed to show: [gfn_fb_feed]

(This plugins has not been thoroughly tested, your input is appreciated :)


Note: Colors are very easy to change: just open css/gfn_facebook_feed.scss > change color vars on top of page and compile the document to css/gfn_facebook_feed.min.css

Description
-----------

Just a test wordpress nonce to check against CSRF or accidental submitting same data.

Installation
---------

1. Upload `wp-nonce` to the `/wp-content/plugins/` directory
2. Activate the plugin 
3. Create a NONCE with `$myNonce = WPNonce::createNonce('myNonce');`
4. Check a NONCE with `$result = WPNonce::checkNonce($myNonce['name'],$myNonce['value']);`

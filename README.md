# reCAPTCHA field Type for PyroCMS

Currently I have `v2 Checkbox` working, I am working to develop the `invisible` option and the `v3` score check.

## Compatibility
- PyroCMS 3.8
This may work on earlier versions of PyroCMS however it is untested.

## Install

1. First copy to your addons folder
2. Run `composer dump-autoload`
3. Enter the command `php artisan addon:install thrive.field_type.recaptcha`

4. Configure your `.env` file
5. Now you can add reCAPTCHA to your forms



You need to get your site_key and secret key from google and replace the variables below.
```
GOOGLE_RECAPTCHA_SITE_KEY=XXXX
GOOGLE_RECAPTCHA_SECRET_KEY=XXXX
```

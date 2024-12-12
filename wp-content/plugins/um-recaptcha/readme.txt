=== Ultimate Member - reCAPTCHA ===
Author URI: https://ultimatemember.com/
Plugin URI: https://ultimatemember.com/extensions/google-recaptcha/
Contributors: ultimatemember, champsupertramp, nsinelnikov
Tags: community, member, membership, user-profile
Requires at least: 5.5
Tested up to: 6.7
Stable tag: 2.3.8
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt
Requires UM core at least: 2.7.0

Stop bots on your registration & login forms with Google reCAPTCHA

== Description ==

This Ultimate Member extension stop bots on your registration & login forms with Google reCAPTCHA.

= Key Features: =

* Integrates seamlessly with register or login forms
* Easy to setup
* Stops spam registrations completely
* You can enable Google reCAPTCHA on register and login forms automatically
* You can turn on / off the reCAPTCHA on any specific form

Read about all of the plugin's features at [Ultimate Member - Google reCAPTCHA](https://ultimatemember.com/extensions/google-recaptcha/)

= Development * Translations =

Want to add a new language to Ultimate Member? Great! You can contribute via [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/ultimate-member).

If you are a developer and you need to know the list of UM Hooks, make this via our [Hooks Documentation](https://docs.ultimatemember.com/article/1324-hooks-list).

= Documentation & Support =

Got a problem or need help with Ultimate Member? Head over to our [documentation](http://docs.ultimatemember.com/) and perform a search of the knowledge base. If you can’t find a solution to your issue then you can create a topic on the [support forum](https://wordpress.org/support/plugin/um-online).

== Installation ==

1. Activate the plugin
2. That's it. Go to Ultimate Member > Settings to customize plugin options
3. For more details, please visit the official [Documentation](http://docs.ultimatemember.com/) page.

== Frequently Asked Questions ==

= Does the Ultimate Member plugin need to be activated to use this plugin? =

Yes. The Ultimate Member reCAPTCHA plugin adds the Google reCAPTCHA to Ultimate Member Forms (Login, Registration, Password reset), so the main Ultimate Member plugin needs to be installed and active.

= Does this plugin add Google reCAPTCHA to the wp-login.php form? =

Yes, the plugin can add the Google reCAPTCHA to the WordPress native login form to improve the security of the wp-login.php form. This can help with spam registration via the native WordPress registration form if you have enabled from your wp-install settings to allow anyone to register via the native WP registration method. We support wp-login.php form's login and lostpassword actions and WordPress native wp_login_form() widget.

= What versions of Google reCAPTCHA does the plugin support? =

Both v2 and v3. The plugin supports both the checkbox for the 2nd version and the invisible reCAPTCHA of the 2nd version. The plugin doesn't support Enterprise reCAPTCHA at this time.

= Does this plugin help stop spam registration? =

Yes, by adding the Google reCAPTCHA to your Ultimate Member registration form, it can help stop/reduce spam registrations. However, this plugin will only protect forms added by the Ultimate Member plugin and the native wp-login.php login/registration form. It does not add the reCAPTCHA to other forms added by other plugins.

== Screenshots ==

1. Screenshot 1
2. Screenshot 2
3. Screenshot 3

== Changelog ==

= Important: Please update to Ultimate Member 2.1 before updating the extension =

= 2.3.8: November 19, 2024 =

* Added: `um_recaptcha_api_response` action hook
* Fixed: "Load textdomain just in time" issue
* Tweak: Refactored requests to API

= 2.3.7: April 29, 2024 =

* Tweak: Added Ultimate Member as required plugin

= 2.3.6: February 21, 2024 =

* Fixed: Conflict with "Send password reset" wp-admin > Users action

= 2.3.5: December 11, 2023 =

* Tweak: `um-admin-clear` CSS class. It duplicates WordPress native `clear`. Using WordPress native instead.

= 2.3.4: October 11, 2023 =

* Updated: Dependencies versions based on the recent changes for `UM()->frontend()->enqueue()::get_suffix();`

= 2.3.3: July 01, 2023 =

* Tweak: Ultimate Member 2.6.7 compatibility

= 2.3.2: June 02, 2023 =

* Fixed: PHP warnings
* Fixed: Link to docs
* Tweak: Template overwrite versioning

= 2.3.1: June 13, 2022 =

* Fixed: Re-login process after password changing in Account page

= 2.3.0: April 21, 2022 =

* Added: reCAPTCHA for wp-login.php form
* Added: reCAPTCHA for wp-login.php lostpassword form
* Added: reCAPTCHA for wp-login.php register form
* Added: reCAPTCHA for the login form through `wp_login_form()` function

* Templates required update:
  - captcha.php
  - captcha_v3.php (please rename it in theme and use proper filename captcha-v3.php)

* Cached and optimized/minified assets(JS/CSS) must be flushed/re-generated after upgrade

* Tweak: Using PHPCS and WPCS for security enhancements
* Tweak: Changed main function for getting reCAPTCHA extension class. It's `UM()->ReCAPTCHA()` for now

= 2.2.2: February 9, 2022 =

* Fixed: Extension settings structure

= 2.2.1: 16 December, 2021 =

* Fixed: Undefined error message when reCAPTCHA is invalid
* Fixed: Duplicate error message on login

= 2.2.0: 20 July, 2021 =

* Added: Setting for reCAPTCHA v3 validation score
* Added: Ability to populate score settings for different forms

= 2.1.9: 8 July, 2021 =

* Added: reCAPTCHA v3 validation via score

= 2.1.8: 11 March, 2021 =

* Tweak: WordPress 5.7 compatibility

= 2.1.7: 17 December, 2020 =

* Added: Ability to change reCAPTCHA language code via the filter

= 2.1.6: 2 June, 2020 =

* Fixed: reCAPTCHA v3 keys settings on init
* Tweak: updated translations

= 2.1.5: 1 April, 2020 =

* Fixed: Added reCAPTCHA reset method on refresh form

= 2.1.4: 24 February, 2020 =

* Fixed: Error that appears on open/close modal action

= 2.1.3: 21 January, 2020 =

* Fixed: Admin notice if the settings are empty

= 2.1.2: 11 November, 2019 =

* Added: Google reCAPTCHA v3

= 2.1.1: 20 August, 2019 =

* Fixed PHP notice about deprecated variable

= 2.1.0: 2 August, 2019 =

* Added templates files
* Fixed uninstall process

= 2.0.2: 3 July, 2018 =

* Added: Ability to add reCaptcha to Password Reset Form
* Fixed: reCaptcha displaying in modal window

= 2.0.1: 27 April, 2018 =

* Added: Loading translation from "wp-content/languages/plugins/" directory

= 2.0: 30 October, 2017 =

* Tweak: UM2.0 compatibility

= 1.3.88: 1 March, 2017 =

* Fixed: Google reCaptcha API response

= 1.0.3: 15 October, 2016 =

* New: theme, type and size options.
* Tweak: Google reCaptcha API 2.0

= 1.0.2: 25 February, 2016 =

* Fixed: Recaptcha ID and Social Login conflict

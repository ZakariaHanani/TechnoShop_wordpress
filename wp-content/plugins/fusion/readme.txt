=== Fusion Page Builder ===
Contributors: agencydominion
Tags: admin, custom, builder, page builder, layout builder, layout, page, columns, multi-column, grid, responsive, shortcode, bootstrap
Requires at least: 3.9
Tested up to: 6.6.1
Stable tag: 1.6.3
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Fusion. The forever free, natively powerful, beautifully flexible, and easily expandable page builder for Wordpress.

== Description ==

Fusion is a flexible and expandable page builder for WordPress. It focuses on providing a powerful, user friendly experience that aims to closely emulate the native WordPress look and feel.

Built on the popular Bootstrap framework, Fusion will allow you to easily split your theme's content area into responsive multi-column layouts.

The Core plugin includes elements for outputting text and raw code into the columns while our free Extension plugins add all the functionality you need for your WordPress site including Galleries, Videos, and Maps.

Fusion also allows you to create Components and Templates. Components are pieces of a layout that can be repeated across several different pages and edited / maintained in one place, and Templates are full page layouts that can be loaded and modified to easily create new pages.

Fusion is designed to be developer friendly, making it possible for WordPress plugin and theme developers to add, modify, and expand the Fusion ecosystem to limitless horizons.

= Extensions =

* [Blog](https://wordpress.org/plugins/fusion-extension-blog/)
* [Button](https://wordpress.org/plugins/fusion-extension-button/)
* [Comments](https://wordpress.org/plugins/fusion-extension-comments/)
* [Contact Form](https://wordpress.org/plugins/fusion-extension-contact-form/)
* [Copyright](https://wordpress.org/plugins/fusion-extension-copyright/)
* [Divider](https://wordpress.org/plugins/fusion-extension-divider/)
* [Gallery](https://wordpress.org/plugins/fusion-extension-gallery/)
* [Image](https://wordpress.org/plugins/fusion-extension-image/)
* [Map](https://wordpress.org/plugins/fusion-extension-map/)
* [Menu](https://wordpress.org/plugins/fusion-extension-menu/)
* [Post Details](https://wordpress.org/plugins/fusion-extension-post-details/)
* [Sidebar](https://wordpress.org/plugins/fusion-extension-sidebar/)
* [Video](https://wordpress.org/plugins/fusion-extension-video/)

= Fusion Base Theme =

The Fusion Base Theme is a blank-canvas theme that is designed to work hand in hand with the Fusion plugin. The post and page templates use the entire browser window for post content output, meaning every aspect of your page is controlled by Fusion. This makes for limitless possibilities when it comes to the look and feel of your site.

The Fusion Base also adds a Layout page in the admin for building a Master Layout for your site. This allows you to add and arrange Components that are output above and/or below the post content on every post and page. This feature is most useful for building custom headers and footers that are easy to maintain from one location.

[Get Fusion Base on the WordPress Theme Directory](https://wordpress.org/themes/fusion-base/)

== Installation ==

1. Install Fusion through the WordPress plugins screen, or upload the plugin files to the `/wp-content/plugins` directory.
2. Activate Fusion through the 'Plugins' screen in WordPress
3. Use the Settings->Fusion screen to configure the plugin. Fusion's Default configuration will work with most themes.
4. Visit the Fusion knowledge base and user guide at <http://agencydominion.helpscoutdocs.com/>

== Frequently Asked Questions ==

= Will Fusion work with my theme? =

Yes. Fusion is designed to be compatible with themes that adhere to WordPress' theme development standards.

= How can I get more Fusion features? =

We have designed the Fusion core plugin to be fast, light, and easily expandable. We have also built a number of extension plugins so that you choose which functionality you would like to add based on the needs of your website.

== Changelog ==

= 1.6.1 =
* Fix PHP8 errors

= 1.6.0 =
* Minor Accessibility Updates.

= 1.5.4 =
* Move material icons to separately enqueued CSS file.

= 1.5.3 =
* Preload Material Icons webfont for better performance.

= 1.5.2 =
* Improve support for the Classic Editor plugin when installed.

= 1.5.1 =
* Restore fade transitions on front end modals.

= 1.5.0 =
* Remove fade transitions on admin modals for faster performance.
* Make core front end CSS dependent on Bootstrap CSS.

= 1.4.1 =
* Add support for the Classic Editor plugin when installed.

= 1.4.0 =
* Update to support WordPress 5.2.2 without Classic Editor plugin.
* Add improved Accessibility options.

= 1.3.7 =
* Update modals for better ADA Compliance.

= 1.3.6 =
* Update script enqueuing for better performance.

= 1.3.5 =
* Fix JavaScript bug.

= 1.3.4 =
* Fix JavaScript bugs in Component modals.

= 1.3.3 =
* Minor bugfix to handle elements with no defined params.

= 1.3.2 =
* Minor Code efficiency update.
* Update dynamic image function to use proper alt tag meta.

= 1.3.1 =
* Add filter hooks for development.

= 1.3.0 =
* Add JavaScript WP Query engine

= 1.2.8 =
* Allow WP Menu items to control Tabs.

= 1.2.7 =
* Add Deep Linking support to Tabs.

= 1.2.6 =
* Fix minor debugging issue.

= 1.2.5 =
* Properly prepare for localization.

= 1.2.4 =
* Properly prepare for localization.

= 1.2.3 =
* JavaScript Bugfix.
* Fix misspelled filter tag name.

= 1.2.2 =
* JavaScript Bugfixes.

= 1.2.1 =
* Accessibility update.

= 1.2.0 =
* Add option to Hide / Show Row Background Image on mobile.

= 1.1.15 =
* Update Modernizr to latest version and simplify loading of MatchMedia polyfill.

= 1.1.14 =
* Resolve conflict with other plugins or themes that include the Mobile Detect library.

= 1.1.13 =
* Remove duplicate outputting of Material Icons CSS on front end.

= 1.1.12 =
* Theme compatibility CSS fixes.

= 1.1.11 =
* Add action hook for appending styles to element inline style block.
* Narrow down admin post selection to public post types only.
* Bugfix: Do not load unpublished components.

= 1.1.10 =
* Move Element Style settings to Style tab for better organization.

= 1.1.9 =
* Register Animation tab in element modals.
* Update note field type to support a header.

= 1.1.8 =
* Add better handling of default values.
* Update a number of instances of the radio field type to the select field type.

= 1.1.7 =
* Admin performance upgrade.

= 1.1.6 =
* Add actions and filters to hook into Style functionality.
* Minor bug fixes and code quality improvements.

= 1.1.5 =
* Switch to self-hosted Google Material Icons Font.
* Update Image and Video fields to select set attachment when opening WordPress Media modal.

= 1.1.4 =
* Update load template pagination to 20 per page.

= 1.1.3 =
* Localization updates.
* Code quality updates.

= 1.1.2 =
* Fix errors in Version 1.1.0 / 1.1.1 update roll-out.

= 1.1.1 =
* Update plugin URL.

= 1.1.0 =
* Performance upgrades.
* Improved code quality.
* Requires all extensions to be upgraded to version 1.1.0 or higher.

= 1.0.8 =
* Security updates.
* Bug fixes.
* Remove Page Views tracking functionality.

= 1.0.7 =
* Security updates.

= 1.0.6 =
* Fix bug in Insert Component element for WordPress 3.5 and lower.

= 1.0.5 =
* Add Row Options menu items for moving rows up, down, to top, or to bottom.

= 1.0.4 =
* Fix bugs in user input parsing
* Further improve update flow

= 1.0.3 =
* Update front end Bootstrap build and include support for navbars
* Improve logic for setting default options on plugin activation

= 1.0.2 =
* Add encoding support for fields in rows, columns, tabs, and custom lists.
* Fix minor output bug in encoded textarea fields.

= 1.0.1 =
* Fix Insert Component element output bug.

= 1.0.0 =
* Fusion initial launch.

== Upgrade Notice ==

= 1.0.0 =
Initial Launch

== Links ==

[Knowledge Base and User Guide](http://agencydominion.helpscoutdocs.com/ "Fusion Knowledge Base")
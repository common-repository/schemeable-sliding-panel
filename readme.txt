=== Schemeable Sliding Panel ===
Contributors: kdmurthy
Donate link: http://wp-pde.jaliansystems.com
Tags: sliding-panel, login, registration, frontend-dashboard, dashboard, social login
Requires at least: 3.4
Tested up to: 3.4.2
Stable tag: 1.4
License: GPLv2 or later

Use smooth and beautiful sliding panel for your blog. Fully scheme-able and configurable. Bundled with six beautiful schemes.

== Description ==

The Schemeable Sliding Panel plugin adds a smooth sliding panel to your blog. The panel can be fully configured through the 'Sliding Panel Options' menu page.

Features:

* 3 different ways of displaying the panel - Overlay over content, slide down or fixed
* Modify all aspects of the panel - fonts, colors, background images, text displayed etc.
* Use the panel for login/registration
* Display either a dashboard or static content for logged-in users
* Disable admin bar and standard login/register and lost password pages. This may help reducing spam-bot registrations.
* Save color schemes and export them as plugins that can be shared with others
* Use a static dashboard for both logged-in and logged-out users.
* Gain fine grained control by including your own CSS (and images)
* Integrates nicely with Wordpress Social Login.

This plugin is developed using [WpPDE Pro](http://wp-pde.jaliansystems.com "WpPDE Home") - a Plugin Development Environment for Wordpress Plugins.

This plugin is based on the awesome (though a bit dated) panel from [http://web-kreation.com/all/implement-a-nice-clean-jquery-sliding-panel-in-wordpress-27/](http://web-kreation.com/all/implement-a-nice-clean-jquery-sliding-panel-in-wordpress-27/ "Implement a Nice & Clean jQuery Sliding Panel in WordPress 2.7+"). Quite a bit of refactoring is done to include scheme modification functionality.


== Installation ==

Upload the Schemeable Sliding Panel plugin to your blog, activate it and modify the settings.

You're done.



== Frequently Asked Questions ==

= <del>Why not widgetize the panel area</del> =
My immediate need is for a login/registration panel for visitors and display dashboard for admin and static content for all other logged in users. I couldn't find a neat way of getting this done using widgets. That said, a new version should include widgetized dashboard area.

= What is the advantage of disabling the standard login/registration forms? =
This not a sure way, but it goes some distancing in avoiding spambot registrations.

= How do I display a different login/registration form other than the default? =
You can change what is displayed in the login panel by adding shortcodes. For overriding the first/introduction/social-login add a shortcode 'sliding-panel-login-intro'. For overdiding the login form use 'sliding-panel-login-form' and 'sliding-panel-register-form' for overriding the registration form.


== Screenshots ==

1. Configuring the Schemeable Sliding Panel.
2. Using the Wood Lands scheme on a page.


== Changelog ==

= 1.1a =

1. Fixed: green-meadows scheme
2. Fixed: When uploads folder is not available, failure of mkdir() logging in css causing invalid CSS.

= 1.1 =

1. Added support for sliding-panel-login-intro, sliding-panel-login-form and sliding-panel-register-form shortcodes for overriding the default content in the login panel.
2. Fixed minor bugs.

= 1.0 =
First Release


== Upgrade Notice ==

= 1.1a =
No major changes.




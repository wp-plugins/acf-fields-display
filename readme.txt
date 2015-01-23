=== ACF Field Display ===
Contributors: Shane Provost, Lieberman Technologies
Tags: advanced custom fields, reference, acf
Requires at least: 3.0.1
Tested up to: 4.1
Version: 1.1
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

 Useful addition that displays a list of all your ACF custom fields including their Label, Name, Type, and Field Group they are associated with.

== Description == 

This plugin was build of the fantastic Advanced Custom Fields plugin created by Elliot Condon, and was made so that referencing custom fields is easier. Here, you can see a full list of all your currently used field which is sortable by clicking on the headers, and should you need to learn more about the field or edit it, clicking the label name will take you to the field group's page so you can do what you need to. The table sorting functionality incorporates the Tablesorter jQuery plugin by Christian Bach. Docs can be found at http://tablesorter.com/docs/. 

*Note: This doesn't display fields in your theme. It just gives you a complete list of your fields that you can reference easily and allows you to edit the field groups easily.

I tried to mark up the code for this plugin with lots of comments in hope that people can understand how it is working and expand on this functionality. Oh yeah, and all the function and variable names are based off Buster Bluth from Arrested Development.

== Installation ==

1. Upload `acf-field-display.php` to the `/wp-content/plugins/` directory, or install it via the WP Plugin repository
2. Activate the plugin through the 'Plugins' menu in WordPress
3. A new button will show up in the menu of the dashboard called ACF Field Display. If you don't have the ACF plugin activated, the button won't show up.
4. Clicking on the button will take you to a page that displays all your currently used fields in a sortable table. Opening up this page in a new tab and referencing this page while constructing your theme will save you a lot of referencing time.

== Frequently Asked Questions ==

= Why isn't my button showing up? =

Make sure sure you have ACF installed and activated.

= I can see the button, but why can't I see all my fields? =

If this is the case with you, make sure you have custom fields created. 

== Screenshots ==

1. This is what the button will look like once the ACF Fields Display plugin is activated.
2. Here is an example of the table once the ACF Field Display is being used.

== Changelog ==

= 1.0 =
* Currently, this is the first version of this plugin and no changes have been made. 

= 1.1 =
Updated paths to fix errors


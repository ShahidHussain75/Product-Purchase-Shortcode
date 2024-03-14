=== Product Purchase Shortcode ===

Contributors: Shahid Hussain
Author URI: https://github.com/ShahidHussain75
Author: Shahid Hussain
Tags: User Role Management, Product Purchase, WooCommerce, Shortcode, WordPress Plugin
Requires PHP: 7.3
Requires at least: 5.0
Tested up to: 6.2
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add shortcode to show or hide content based on product purchase status.

== Description ==

The "Product Purchase Shortcode" plugin provides a simple yet powerful solution to display content conditionally based on whether a user has purchased a specific product on your WooCommerce-powered website. This plugin is ideal for scenarios where you want to offer exclusive content to customers who have made a purchase, enhancing user engagement and maximizing the value of your products or services.

Additionally, a new shortcode [show_if_not_purchased content="This content will be displayed."] has been introduced, which allows you to display content to users who have not purchased anything from the store. This shortcode not need a closing tag.

Instructions:

1. **Insert Shortcode:** Insert the shortcode `[product_purchase]` into any post, page, or custom post type where you want to display conditional content based on product purchase status. Add the `product_id` attribute to specify the ID of the product to check against. For example:
   
   ```[product_purchase product_id="123"]Your exclusive content here[/product_purchase]```

   Replace `123` with the actual product ID you want to check against.

2. **Publish or Update Content:** Once you've inserted the shortcode and provided the necessary product ID, publish or update the post/page. The content within the shortcode will now be displayed conditionally based on whether the user has purchased the specified product.

== Features ==

* Conditional Content Display: Show or hide content based on whether a user has purchased a specific product.
* Seamless Integration with WooCommerce: Works seamlessly with WooCommerce to check product purchase status.
* Easy Shortcode Usage: Simply insert the `[product_purchase]` shortcode with the desired product ID to control content visibility.
* Enhanced User Experience: Offer exclusive content to customers who have purchased specific products, enhancing user engagement and satisfaction.
* Flexible Content Restriction: Define content visibility based on product purchase status, providing tailored experiences for different user segments.
* Compatible with WordPress: Designed to work with the latest version of WordPress and compatible with other essential plugins and themes.

Official Developer: [Shahid Hussain](https://github.com/ShahidHussain75).

== Usage ==

1. Install and activate the plugin.
2. Insert the `[product_purchase]` shortcode with the desired product ID into your content.
3. Publish or update the content.
4. Content will be displayed conditionally based on user's product purchase status.

Languages: English.

== Changelog ==

= 1.1 =
* Improved plugin functionality and compatibility.
= 1.2 =
* A new shortcode [not_purchased] has been introduced.

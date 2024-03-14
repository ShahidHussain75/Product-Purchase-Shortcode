<?php
/*
Plugin Name: Product Purchase Shortcode
Description: This plugin adds a shortcodes to show or hide content based on product purchase. Insert the shortcode [product_purchase product_id="123"]Your exclusive content here[/product_purchase] into any post, page, or custom post type where you want to display conditional content based on product purchase. Replace 123 with the actual product ID you want to check against. Additionally, a new shortcode [show_if_not_purchased content="This content will be displayed."] has been introduced, which allows you to display content to users who have not purchased anything from the store. This shortcode not need a closing tag.
Version: 1.2
Author: Shahid Hocien
Author URI: https://github.com/ShahidHussain75
*/

// Check if WooCommerce is active
if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    add_action('admin_notices', 'product_purchase_wc_missing_notice');
    return;
}

// Shortcode function to show content if user has purchased a specific product
function product_purchase_shortcode($atts, $content = null) {
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'product_id' => '', // Default product ID
    ), $atts, 'product_purchase');

    // Get current user ID
    $user_id = get_current_user_id();

    // Check if user is logged in
    if ($user_id) {
        // Check if user has purchased the specified product
        if (!empty($atts['product_id'])) {
            $product_id = intval($atts['product_id']);
            $has_purchased = wc_customer_bought_product($user_id, $user_id, $product_id);

            // If user has purchased the product, show content
            if ($has_purchased) {
                return do_shortcode($content);
            }
        }
    }

    // If user has not purchased the product or is not logged in, hide content
    return '';
}
add_shortcode('product_purchase', 'product_purchase_shortcode');




add_shortcode( 'show_if_not_purchased', 'show_if_not_purchased_shortcode' );

function show_if_not_purchased_shortcode( $atts ) {
    $content = do_shortcode( $atts['content'] ); // Retrieve the content passed within the shortcode

    // Check if user is logged in
    if ( ! is_user_logged_in() ) {
        return $content; // Display content if user is not logged in
    }

    // Check for purchase history using WooCommerce (adjust for your ecommerce plugin)
    if ( function_exists( 'wc_get_orders' ) ) {
        $customer_orders = wc_get_orders( array( 'customer' => get_current_user_id() ) );
        if ( ! empty( $customer_orders ) ) {
            return ''; // Hide content if user has at least one order
        }
    } else {
        // Handle cases where WooCommerce is not active or a different ecommerce plugin is used
        // You'll need to implement your plugin-specific logic here to check purchase history
        return $content; // For demonstration purposes, assume no purchases if plugin is not active
    }

    return $content; // Display content if user is logged in but has no purchases
}


// Show an admin notice if WooCommerce is not active
function product_purchase_wc_missing_notice() {
    $class = 'notice notice-error';
    $message = __('The "Product Purchase Shortcode" plugin requires WooCommerce to be installed and active.', 'product-purchase');

    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}
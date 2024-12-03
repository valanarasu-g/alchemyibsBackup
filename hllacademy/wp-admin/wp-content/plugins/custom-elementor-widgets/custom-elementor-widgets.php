<?php
/**
 * Plugin Name: Custom Elementor Widgets
 * Description: Adds custom widgets to Elementor.
 * Version: 1.0
 * Author: Valan
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

// Check if Elementor is active
function custom_elementor_widget_load() {
    if (did_action('elementor/loaded')) {
        // Include the widget file only after Elementor is loaded
        require_once(plugin_dir_path(__FILE__) . 'widgets/hello-world-widget.php');
    } else {
        // Show admin notice if Elementor is not activated
        add_action('admin_notices', function() {
            echo '<div class="notice notice-warning"><p>Elementor must be activated to use the Custom Elementor Widgets plugin.</p></div>';
        });
    }
}
add_action('elementor/init', 'custom_elementor_widget_load'); // Use 'elementor/init' instead of 'plugins_loaded'

// Register the custom widget with Elementor
function custom_elementor_widget_register($widgets_manager) {
    require_once(plugin_dir_path(__FILE__) . 'widgets/hello-world-widget.php');
    $widgets_manager->register(new \Elementor_Hello_World_Widget());
}
add_action('elementor/widgets/register', 'custom_elementor_widget_register');

function custom_elementor_widget_styles() {
    
       wp_enqueue_script(
        'swiper-elementor-widget-script',
        plugin_dir_url(__FILE__) . 'js/swiper.min.js',
        ['jquery'], 
        false,
        true // Load in footer
    );
    
    
     wp_enqueue_script(
        'services-elementor-widget-script',
        plugin_dir_url(__FILE__) . 'js/services.js',
        ['jquery'], 
        false,
        true // Load in footer
    );
    
    
    // Check if Elementor is loaded
    if (did_action('elementor/loaded')) {
        wp_enqueue_style(
            'custom-elementor-widget-style',
            plugin_dir_url(__FILE__) . 'css/services.css'
        );
    }
    
     if (did_action('elementor/loaded')) {
        wp_enqueue_style(
            'swiper-elementor-widget-style',
            plugin_dir_url(__FILE__) . 'css/swiper.css'
        );
    }
    
}
add_action('wp_enqueue_scripts', 'custom_elementor_widget_styles');


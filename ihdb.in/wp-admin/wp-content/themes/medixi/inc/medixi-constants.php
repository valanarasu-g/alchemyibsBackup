<?php
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://themeforest.net/user/vecuro_themes
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'MEDIXI_DIR_URI' ) ) {
    define('MEDIXI_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'MEDIXI_DIR_ASSIST_URI' ) ) {
    define( 'MEDIXI_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'MEDIXI_DIR_CSS_URI' ) ) {
    define( 'MEDIXI_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Skin Css File
if ( ! defined( 'MEDIXI_DIR_SKIN_CSS_URI' ) ) {
    define( 'MEDIXI_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/') );
}


// Js File URI
if (!defined('MEDIXI_DIR_JS_URI')) {
    define('MEDIXI_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('MEDIXI_DIR_PLUGIN_URI')) {
    define('MEDIXI_DIR_PLUGIN_URI', get_theme_file_uri( '/assets/plugins/'));
}

// Base Directory
if (!defined('MEDIXI_DIR_PATH')) {
    define('MEDIXI_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('MEDIXI_DIR_PATH_INC')) {
    define('MEDIXI_DIR_PATH_INC', MEDIXI_DIR_PATH . 'inc/');
}

//MEDIXI framework Folder Directory
if (!defined('MEDIXI_DIR_PATH_FRAM')) {
    define('MEDIXI_DIR_PATH_FRAM', MEDIXI_DIR_PATH_INC . 'medixi-framework/');
}

//Classes Folder Directory
if (!defined('MEDIXI_DIR_PATH_CLASSES')) {
    define('MEDIXI_DIR_PATH_CLASSES', MEDIXI_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('MEDIXI_DIR_PATH_HOOKS')) {
    define('MEDIXI_DIR_PATH_HOOKS', MEDIXI_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'MEDIXI_DEMO_DIR_PATH' ) ){
    define( 'MEDIXI_DEMO_DIR_PATH', MEDIXI_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'MEDIXI_DEMO_DIR_URI' ) ){
    define( 'MEDIXI_DEMO_DIR_URI', MEDIXI_DIR_URI.'inc/demo-data/' );
}
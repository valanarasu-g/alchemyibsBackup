<?php
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://themeforest.net/user/vecuro_themes
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/medixi-constants.php';

//theme setup
require_once MEDIXI_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once MEDIXI_DIR_PATH_INC . 'essential-scripts.php';

// Woo Hooks
require_once MEDIXI_DIR_PATH_INC . 'woo-hooks/medixi-woo-hooks.php';

// Woo Hooks Functions
require_once MEDIXI_DIR_PATH_INC . 'woo-hooks/medixi-woo-hooks-functions.php';

// plugin activation
require_once MEDIXI_DIR_PATH_FRAM . 'plugins-activation/medixi-active-plugins.php';

// meta options
require_once MEDIXI_DIR_PATH_FRAM . 'medixi-meta/medixi-config.php';

// page breadcrumbs
require_once MEDIXI_DIR_PATH_INC . 'medixi-breadcrumbs.php';

// sidebar register
require_once MEDIXI_DIR_PATH_INC . 'medixi-widgets-reg.php';

//essential functions
require_once MEDIXI_DIR_PATH_INC . 'medixi-functions.php';

// helper function
require_once MEDIXI_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once MEDIXI_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once MEDIXI_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// medixi options
require_once MEDIXI_DIR_PATH_FRAM . 'medixi-options/medixi-options.php';

// hooks
require_once MEDIXI_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once MEDIXI_DIR_PATH_HOOKS . 'hooks-functions.php';


require_once MEDIXI_DIR_PATH_INC . 'medixi-commoncss.php';
<?php
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://themeforest.net/user/vecuro_themes
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}

if ( ! is_active_sidebar( 'medixi-page-sidebar' ) ) {
    return;
}
?>

<div class="col-lg-4">
    <div class="page-sidebar">
    <?php 
        dynamic_sidebar( 'medixi-page-sidebar' );
    ?>               
    </div>
</div>
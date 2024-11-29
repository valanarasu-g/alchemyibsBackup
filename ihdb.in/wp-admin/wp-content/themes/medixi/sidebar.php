<?php

/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://themeforest.net/user/vecuro_themes
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

if ( ! is_active_sidebar( 'medixi-blog-sidebar' ) ) {
    return;
}
?>

<div class="col-lg-4">
    <aside class="sidebar-area pl-30">
	    <?php dynamic_sidebar( 'medixi-blog-sidebar' ); ?>
	</aside>
</div>
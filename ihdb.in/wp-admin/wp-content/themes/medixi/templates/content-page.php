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
?>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 

	/**
	 * page content 
	 * Comments Template
	 * @Hook  medixi_page_content
	 *
	 * @Hooked medixi_page_content_cb
	 * 
	 *
	 */
	do_action( 'medixi_page_content' );
	?>
</div>
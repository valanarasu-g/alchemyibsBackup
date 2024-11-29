<?php
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit( );
	}
	/**
	* @Packge 	   : Medixi
	* @Version     : 1.0
	* @Author     : Vecurosoft
    * @Author URI : https://themeforest.net/user/vecuro_themes
	*
	*/

	if( ! is_active_sidebar( 'medixi-woo-sidebar' ) ){
		return;
	}
?>
<div class="col-lg-4">
	<!-- Sidebar Begin -->
	<aside class="sidebar-area">
		<?php
			dynamic_sidebar( 'medixi-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>
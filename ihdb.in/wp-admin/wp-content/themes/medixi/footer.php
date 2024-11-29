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
    *
    * Hook for Footer Content
    *
    * Hook medixi_footer_content
    *
    * @Hooked medixi_footer_content_cb 10
    *
    */
    do_action( 'medixi_footer_content' );

    if( !is_404(  ) ) {
        /**
        *
        * Hook for Back to Top Button
        *
        * Hook medixi_back_to_top
        *
        * @Hooked medixi_back_to_top_cb 10
        *
        */
        do_action( 'medixi_back_to_top' );
    }

    wp_footer();
    ?>
</body>
</html>
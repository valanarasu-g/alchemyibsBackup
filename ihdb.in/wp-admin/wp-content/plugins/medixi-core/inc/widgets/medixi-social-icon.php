<?php
/**
 * @version  1.0
 * @package  medixi
 * @author   Vecurosoft <support@vecurosoft.com>
 *
 * Websites: http://www.vecurosoft.com
 *
 */

/**************************************
*Creating Contact Information Widget
***************************************/

class medixi_social_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'medixi_social_widget',
			// Widget name will appear in UI
			esc_html__( 'Medixi :: Social Icon', 'medixi' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Social Icon', 'medixi' ),
				'classname'		 => 'widget_social_icon',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {
	$social_icon    = isset( $instance['social_icon'] ) ? $instance['social_icon'] : false;

    if( $social_icon ){
        echo '<div class="footer-social3">';
            medixi_social_icon();
        echo '</div>';
    }

}

// Widget Backend
public function form( $instance ) {

    // Social Icon
    $social_icon = isset( $instance['social_icon'] ) ? (bool) $instance['social_icon'] : false;

?>
    <p>
        <input class="checkbox" type="checkbox"<?php checked( $social_icon ); ?> id="<?php echo $this->get_field_id( 'social_icon' ); ?>" name="<?php echo $this->get_field_name( 'social_icon' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'social_icon' ); ?>"><?php _e( 'Display Social Icon?' ); ?></label>
        <a href="<?php echo esc_url( home_url('/').'wp-admin/admin.php?page=Medixi&tab=17' );?>"><?php _e( 'Edit Social Icon' )?></a>
    </p>


<?php
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();

    $instance['social_icon']      = isset( $new_instance['social_icon'] ) ? (bool) $new_instance['social_icon'] : false;

	return $instance;
}
}
// Class medixi_subscribe_widget ends here

// Register and load the widget
function medixi_social_load_widget() {
	register_widget( 'medixi_social_widget' );
}
add_action( 'widgets_init', 'medixi_social_load_widget' );
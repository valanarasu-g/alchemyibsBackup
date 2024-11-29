<?php
/**
 * @version  1.0
 * @package  medilax
 * @author   Vecurosoft <support@vecurosoft.com>
 *
 * Websites: http://www.vecurosoft.com
 *
 */

/**************************************
*Creating Contact Information Widget
***************************************/

class medilax_contact_info_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'medilax_contact_info_widget',
			// Widget name will appear in UI
			esc_html__( 'Medilax :: Contact Info', 'medilax' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Contact Info', 'medilax' ),
				'classname'		 => 'widget_contact',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {

	$mobile 		= apply_filters( 'widget_mobile', $instance['mobile'] );
	$email 			= apply_filters( 'widget_email', $instance['email'] );
	$address 			= apply_filters( 'widget_address', $instance['address'] );
	//Remove ' ' , '-', ' - ' from email
	$email 			= is_email( $email );
	$replace 		= array(' ','-',' - ');
	$with 			= array('','','');
	$emailurl 		= str_replace( $replace, $with, $email );

	$mobileurl 	    = str_replace( $replace, $with, $mobile );
	//before and after widget arguments are defined by themes
	echo $args['before_widget'];
    echo '<!-- Contact Info Widget Start -->';
    	if( !empty( $title ) || !empty( $about_text ) ||  !empty( $email ) || !empty( $mobile ) ):

    		echo '<div class="widget-contact">';
                    
				if( !empty( $mobile ) ){
					echo '<p><i class="fas fa-phone-alt"></i>';
						echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $mobile ).'</a>';
					echo '</p>';
				}

	            if( !empty( $email ) ){
	                echo '<p><i class="fal fa-envelope"></i>';
	                   	echo '<a href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a>';
	                echo '</p>';
	            }

	            if( !empty( $address ) ){
	                echo '<p><i class="far fa-map-marker-alt"></i>'.esc_html( $address ).'</p>';
	            }
            echo '</div>';

    	endif;
	echo $args['after_widget'];
    echo '<!-- Contact Info Widget End -->';


}


// Widget Backend
public function form( $instance ) {
	
	// E-mail one
	if ( isset( $instance[ 'email' ] ) ) {
		$email = $instance[ 'email' ];
	}else {
		$email = '';
	}
	// Mobile
    if ( isset( $instance[ 'mobile' ] ) ) {
        $mobile = $instance[ 'mobile' ];
    }else {
        $mobile = '';
    }

    // Address
    if ( isset( $instance[ 'address' ] ) ) {
        $address = $instance[ 'address' ];
    }else {
        $address = '';
    }
?>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'mobile' ); ?>">
			<?php
				_e( 'Mobile :' ,'medilax');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" type="text" value="<?php echo esc_attr( $mobile ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>">
			<?php
				_e( 'Email :' ,'medilax');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>">
			<?php
				_e( 'Address :' ,'medilax');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
	</p>

	

<?php
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();

	$instance['email'] 		= ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

	$instance['mobile']  	= ( ! empty( $new_instance['mobile'] ) ) ? strip_tags( $new_instance['mobile'] ) : '';

	$instance['address']  	= ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';

	return $instance;
}
}
// Class medilax_subscribe_widget ends here

// Register and load the widget
function medilax_contact_info_load_widget() {
	register_widget( 'medilax_contact_info_widget' );
}
add_action( 'widgets_init', 'medilax_contact_info_load_widget' );
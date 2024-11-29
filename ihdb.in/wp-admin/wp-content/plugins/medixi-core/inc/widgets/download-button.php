<?php
/**
* @version  1.0
* @package  medilax
* @author   Vecurosoft <support@medilax.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating Advertise Image Widget
***************************************/

class medilax_download_button_widget extends WP_Widget {

        function __construct() {
        
            parent::__construct(
                // Base ID of your widget
                'medilax_download_button_widget', 
            
                // Widget name will appear in UI
                esc_html__( 'Medilax :: Download Button', 'medilax' ),
            
                // Widget description
                array( 
                    'classname'   					=> 'widget_file_link',
                    'customize_selective_refresh' 	=> true,  
                    'description' 					=> esc_html__( 'Add Download Button Widget', 'medilax' ),   
                )
            );

        }
    
        // This is where the action happens
        public function widget( $args, $instance ) {
            
            $title  				= apply_filters( 'widget_title', $instance['title'] );
            $first_button_text  	= ( !empty( $instance['first_button_text'] ) ) ? $instance['first_button_text'] : "";  
            $first_button_url  		= ( !empty( $instance['first_button_url'] ) ) ? $instance['first_button_url'] : "";  
            
            $second_button_text  	= ( !empty( $instance['second_button_text'] ) ) ? $instance['second_button_text'] : "";  
            $second_button_url  	= ( !empty( $instance['second_button_url'] ) ) ? $instance['second_button_url'] : "";  
            
            //before and after widget arguments are defined by themes
            echo $args['before_widget']; 
            
                if( !empty( $title  ) ){
                    echo $args['before_title']; 
                        echo esc_html( $title );
                    echo $args['after_title']; 
            	}
				echo '<ul>';
					if( !empty( $first_button_text ) ){
		              	echo '<li><a class="bg-primary" data-type="pdf" href="'.esc_url( $first_button_url ).'" download>'.esc_html( $first_button_text ).'</a></li>';
					}
					if( !empty( $second_button_text ) ){
						echo '<li><a class="bg-primary2" data-type="pdf" href="'.esc_url( $second_button_url ).'" download>'.esc_html( $second_button_text ).'</a></li>';
					}
	            echo '</ul>';
            echo $args['after_widget'];
            echo '<!-- End of Author Widget -->';
        }
            
        // Widget Backend 
        public function form( $instance ) {
    
            //Title	
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }
			
            // Button Text
            if ( isset( $instance[ 'first_button_text' ] ) ) {
                $first_button_text = $instance[ 'first_button_text' ];
            }else {
                $first_button_text = __( 'Download Boucher','medilax' );
            }
            // Button Url
            if ( isset( $instance[ 'first_button_url' ] ) ) {
                $first_button_url = $instance[ 'first_button_url' ];
            }else {
                $first_button_url = __( '#','medilax' );
            }
            // Button Text
            if ( isset( $instance[ 'second_button_text' ] ) ) {
                $second_button_text = $instance[ 'second_button_text' ];
            }else {
                $second_button_text = __( 'Download Boucher','medilax' );
            }
            // Button Url
            if ( isset( $instance[ 'second_button_url' ] ) ) {
                $second_button_url = $instance[ 'second_button_url' ];
            }else {
                $second_button_url = __( '#','medilax' );
            }

            
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'medilax'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'first_button_text' ); ?>"><?php _e( 'First Button Text:' ,'medilax'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'first_button_text' ); ?>" name="<?php echo $this->get_field_name( 'first_button_text' ); ?>" type="text" value="<?php echo esc_attr( $first_button_text ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'first_button_url' ); ?>"><?php _e( 'First Button Url:' ,'medilax'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'first_button_url' ); ?>" name="<?php echo $this->get_field_name( 'first_button_url' ); ?>" type="text" value="<?php echo esc_attr( $first_button_url ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'second_button_text' ); ?>"><?php _e( 'Second Button Text:' ,'medilax'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'second_button_text' ); ?>" name="<?php echo $this->get_field_name( 'second_button_text' ); ?>" type="text" value="<?php echo esc_attr( $second_button_text ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'second_button_url' ); ?>"><?php _e( 'Second Button Url:' ,'medilax'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'second_button_url' ); ?>" name="<?php echo $this->get_field_name( 'second_button_url' ); ?>" type="text" value="<?php echo esc_attr( $second_button_url ); ?>" />
            </p>
			
            <?php 
        }
    
        
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            
            $instance = array();
            $instance['title'] 	        		= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';        
            $instance['first_button_text'] 		= ( ! empty( $new_instance['first_button_text'] ) ) ? strip_tags( $new_instance['first_button_text'] ) : '';        
            $instance['first_button_url'] 		= ( ! empty( $new_instance['first_button_url'] ) ) ? strip_tags( $new_instance['first_button_url'] ) : '';        
            $instance['second_button_text'] 	= ( ! empty( $new_instance['second_button_text'] ) ) ? strip_tags( $new_instance['second_button_text'] ) : '';        
            $instance['second_button_url'] 		= ( ! empty( $new_instance['second_button_url'] ) ) ? strip_tags( $new_instance['second_button_url'] ) : '';        
            return $instance;
        }
    } // Class medilax_download_button_widget ends here
    

    // Register and load the widget
    function medilax_download_button_widget() {
        register_widget( 'medilax_download_button_widget' );
    }
    add_action( 'widgets_init', 'medilax_download_button_widget' );
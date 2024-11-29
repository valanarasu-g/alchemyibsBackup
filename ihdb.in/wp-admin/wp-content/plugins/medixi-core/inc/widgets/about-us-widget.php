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
* Creating About Us Widget
***************************************/

class medilax_about_us_widget extends WP_Widget {

        function __construct() {
        
            parent::__construct(
                // Base ID of your widget
                'medilax_about_us_widget',
            
                // Widget name will appear in UI
                esc_html__( 'Medilax :: About Us', 'medilax' ),
            
                // Widget description
                array(
                    'classname'                     => 'about',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'medilax' ),
                )
            );

        }
    
        // This is where the action happens
        public function widget( $args, $instance ) {
            
            $title          = apply_filters( 'widget_title', $instance['title'] );
            $desc           = ( !empty( $instance['desc'] ) ) ? $instance['desc'] : "";
            $phone          = ( !empty( $instance['phone'] ) ) ? $instance['phone'] : "";
            $email          = ( !empty( $instance['email'] ) ) ? $instance['email'] : "";

            $replace        = array(' ','-',' - ');
            $with           = array('','','');
            $mobileurl      = str_replace( $replace, $with, $phone );
            $emailurl       = str_replace( $replace, $with, $email );
            
            //before and after widget arguments are defined by themes
            echo '<!-- Author Widget -->';
            echo $args['before_widget'];
            
                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }

                echo '<div class="vs-widget-about">';
                    if( !empty( $instance['desc'] ) ) {
                        echo medixi_paragraph_tag( array(
                            'text'  => wp_kses_post( $instance['desc'] )
                        ) );
                    }
                    if( !empty( $phone ) ) {
                        echo '<h4><a class="text-theme" href="'.esc_attr( 'tel:'.$mobileurl ).'"><i class="fas fa-phone-volume me-2 pe-1"></i> '.esc_html($phone).'</a></h4>';
                    }
                    if( !empty( $email ) ) {
                        echo '<h4><a class="text-theme" href="'.esc_attr( 'mailto:'.$emailurl ).'"><i class="fas fa-envelope me-2 pe-1"></i> '.esc_html($email).'</a></h4>';
                    }
                echo '</div>';
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

            // Author Name
            if ( isset( $instance[ 'email' ] ) ) {
                $email = $instance[ 'email' ];
            }else {
                $email = '';
            }

            // Description
            if ( isset( $instance[ 'desc' ] ) ) {
                $desc = $instance[ 'desc' ];
            }else {
                $desc = '';
            }
            
            //phone
            if ( isset( $instance[ 'phone' ] ) ) {
                $phone = $instance[ 'phone' ];
            }else {
                $phone = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php _e( 'Description:' ,'medilax'); ?></label>
                <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" cols="30" rows="10"><?php echo wp_kses_post( $desc ); ?></textarea>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php _e( 'Phone:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
            </p>

            <?php
        }
    
        
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            
            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['desc']           = ( ! empty( $new_instance['desc'] ) ) ? wp_kses_post( $new_instance['desc'] ) : '';
            $instance['phone']          = ( ! empty( $new_instance['phone'] ) ) ? wp_kses_post( $new_instance['phone'] ) : '';
            $instance['email']          = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
            return $instance;
        }
    } // Class medilax_about_us_widget ends here
    

    // Register and load the widget
    function medilax_about_us_load_widget() {
        register_widget( 'medilax_about_us_widget' );
    }
    add_action( 'widgets_init', 'medilax_about_us_load_widget' );
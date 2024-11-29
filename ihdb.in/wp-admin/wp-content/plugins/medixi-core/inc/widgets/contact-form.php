<?php
/**
* @version  1.0
* @package  Medilax
* @author   Vecurosoft <support@vecurosoft.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating Contact Form Widget
***************************************/

class medilax_contact_form7_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'medilax_contact_form7_widget',

                // Widget name will appear in UI
                esc_html__( 'Medilax :: Contact Form', 'medilax' ),

                // Widget description
                array(
                    'classname'   => 'sidebar-contact-form',
                    'customize_selective_refresh' => true,
                    'description' => esc_html__( 'Add Contact Form Widget', 'medilax' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', $instance['title'] );
            $shortcode   = apply_filters( 'widget_shortcode', $instance['shortcode'] );

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }

                echo do_shortcode( $shortcode );
                
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            // ShortCode
            if ( isset( $instance[ 'shortcode' ] ) ) {
                $shortcode = $instance[ 'shortcode' ];
            }else {
                $shortcode = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'shortcode' ); ?>"><?php _e( 'Contact Form Shortcode:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" type="text" value="<?php echo esc_attr( $shortcode ); ?>" />
            </p>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['shortcode']     = ( ! empty( $new_instance['shortcode'] ) ) ? strip_tags( $new_instance['shortcode'] ) : '';
            return $instance;
        }
    } // Class medilax_contact_form7_widget ends here


    // Register and load the widget
    function medilax_contact_form_load_widget() {
        register_widget( 'medilax_contact_form7_widget' );
    }
    add_action( 'widgets_init', 'medilax_contact_form_load_widget' );

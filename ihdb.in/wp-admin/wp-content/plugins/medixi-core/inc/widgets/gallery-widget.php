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
* Creating Gallery Widget
***************************************/

class medilax_gallery_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'medilax_gallery_widget',

                // Widget name will appear in UI
                esc_html__( 'Medilax :: Gallery', 'medilax' ),

                // Widget description
                array(
                    'classname'                     => '',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Gallery Widget', 'medilax' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title      = apply_filters( 'widget_title', $instance['title'] );

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }
				$medilax_gallery_image = medixi_opt( 'medixi_gallery_image_widget' );

				if( !empty( $medilax_gallery_image ) && isset( $medilax_gallery_image ) ){
					echo '<div class="footer-gallery">';
							foreach( $medilax_gallery_image as $single_image ){
								echo '<div class="gal-item"><a href="'.esc_url( $single_image['image'] ).'">';
									echo medixi_img_tag( array(
										'url'	=> esc_url( $single_image['image'] ),
                                        'class' => 'w-100'
									) );
								echo '</a></div>';
							}
                    echo '</div>';
				}

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

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				<a href="<?php echo esc_url( home_url('/').'wp-admin/admin.php?page=Medilax&tab=15' );?>"><?php _e( 'Add Gallery Image', 'medilax' )?></a>
            </p>

            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

            return $instance;
        }
    } // Class medilax_gallery_widget ends here


    // Register and load the widget
    function medilax_gallery_widget() {
        register_widget( 'medilax_gallery_widget' );
    }
    add_action( 'widgets_init', 'medilax_gallery_widget' );
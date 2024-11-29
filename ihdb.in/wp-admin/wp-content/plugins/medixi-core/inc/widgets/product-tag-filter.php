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
* Creating Product Tags Filter Widget
***************************************/

class medilax_filter_tags_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'medilax_filter_tags_widget',

                // Widget name will appear in UI
                esc_html__( 'Medilax :: Product Tags Filter', 'medilax' ),

                // Widget description
                array(
                    'classname'   => 'widget_tag_cloud',
                    'customize_selective_refresh' => true,
                    'description' => esc_html__( 'Add Product Tags Filter Widget', 'medilax' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', $instance['title'] );

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }


                $prod_cats = get_terms( array(
                	"taxonomy"	=> 'product_tag'
                ) );

                $link = get_post_type_archive_link( 'product' );

                if ( ! empty( $prod_cats ) && ! is_wp_error( $prod_cats ) ){
                	echo '<div class="tagcloud">';
				    foreach ( $prod_cats as $term ) {
				        echo '<a href="'.esc_url($link).'?prod_tag='.esc_attr($term->slug).'">' . esc_html( $term->name ) . '</a>';
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
            </p>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    } // Class medilax_filter_tags_widget ends here


    // Register and load the widget
    function medilax_filter_tags_load_widget() {
        register_widget( 'medilax_filter_tags_widget' );
    }
    add_action( 'widgets_init', 'medilax_filter_tags_load_widget' );

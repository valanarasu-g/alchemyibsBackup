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
* Creating Product Categories Filter Widget
***************************************/

class medilax_filter_categories_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'medilax_filter_categories_widget',

                // Widget name will appear in UI
                esc_html__( 'Medilax :: Product Categories Filter', 'medilax' ),

                // Widget description
                array(
                    'classname'   => 'widget_product_categories',
                    'customize_selective_refresh' => true,
                    'description' => esc_html__( 'Add Product Categories Filter Widget', 'medilax' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', $instance['title'] );
            $show_count = isset( $instance['show_count'] ) ? (bool) $instance['show_count'] : false;

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }


                $prod_cats = get_terms( array(
                	"taxonomy"	=> 'product_cat'
                ) );

                $link = get_post_type_archive_link( 'product' );

                if ( ! empty( $prod_cats ) && ! is_wp_error( $prod_cats ) ){
                	echo '<ul>';
				    foreach ( $prod_cats as $term ) {
				    	if( $show_count ) {
				    		echo '<li>';
					        	echo '<a href="'.esc_url($link).'?prod_cat='.esc_attr($term->slug).'">' . esc_html( $term->name ) . ' ('.esc_html($term->count).')</a>';
					        echo '</li>';
				    	} else {
				    		echo '<li>';
					        	echo '<a href="'.esc_url($link).'?prod_cat='.esc_attr($term->slug).'">' . esc_html( $term->name ) . '</a>';
					        echo '</li>';
				    	}
				        
				    }
				    echo '</ul>';
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

            // Show Date
            $show_count = isset( $instance['show_count'] ) ? (bool) $instance['show_count'] : false;

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <input class="checkbox" type="checkbox"<?php checked( $show_count ); ?> id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>" />
    		    <label for="<?php echo $this->get_field_id( 'show_count' ); ?>"><?php _e( 'Display category count?' ); ?></label>
            </p>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['show_count']      = isset( $new_instance['show_count'] ) ? (bool) $new_instance['show_count'] : false;
            return $instance;
        }
    } // Class medilax_filter_categories_widget ends here


    // Register and load the widget
    function medilax_filter_categories_load_widget() {
        register_widget( 'medilax_filter_categories_widget' );
    }
    add_action( 'widgets_init', 'medilax_filter_categories_load_widget' );

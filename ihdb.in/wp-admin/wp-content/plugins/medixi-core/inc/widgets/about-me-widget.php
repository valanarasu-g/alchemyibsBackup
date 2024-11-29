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
* Creating About Me Widget
***************************************/

class medilax_about_me_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'medilax_about_me_widget',

                // Widget name will appear in UI
                esc_html__( 'Medilax :: About Me', 'medilax' ),

                // Widget description
                array(
                    'classname'                     => 'pb-35',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Me Widget', 'medilax' ),
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title          = apply_filters( 'widget_title', $instance['title'] );
            $about_img      = ( !empty( $instance['about_img'] ) ) ? $instance['about_img'] : "";
            $author_name    = ( !empty( $instance['author_name'] ) ) ? $instance['author_name'] : "";
            $author_desig   = ( !empty( $instance['author_desig'] ) ) ? $instance['author_desig'] : "";
            $desc           = ( !empty( $instance['desc'] ) ) ? $instance['desc'] : "";

            //before and after widget arguments are defined by themes
            echo '<!-- Author Widget -->';
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }
                echo '<!-- Widget Content -->';
                echo '<div class="vs_about_author">';
                    if( ! empty( $about_img ) ) {
                        echo '<!-- Author Image -->';
                        echo '<div class="author-img border-primary">';
                            echo medixi_img_tag( array(
                                "url"   => esc_url( $about_img ),
                            ) );
                        echo '</div>';
                        echo '<!-- End of Author Image -->';
                    }
                    if( !empty( $author_name ) ) {
                        echo medixi_heading_tag( array(
                            "text"  => esc_html( $author_name ),
                            "class" => "author-title font-semibold font2 text-20 mb-15",
                            "tag"   => "h4",
                        ) );
                    }
                    if( !empty( $author_desig ) ){
                        echo medilax_span_tag( array(
                            "text"  => esc_html( $author_desig ),
                            "class" => "degi",
                        ) );
                    }
                    if( !empty( $instance['desc'] ) ) {
                        echo medilax_paragraph_tag( array(
                            'text'  => wp_kses_post( $instance['desc'] ),
                            'class' => 'author-text',
                        ) );
                    }
                    echo '<!-- Author Social Links -->';
                    echo '<ul class="social-links pt-10">';
                        $medilax_social_icons = medilax_opt('medilax_social_links');
                        if( is_array( $medilax_social_icons ) && !empty( $medilax_social_icons ) ) {
                            foreach( $medilax_social_icons as $singleicon ) {
                                if( !empty( $singleicon['title'] ) ) {
                                    echo '<li><a href="'.esc_url( $singleicon['url']).'"><i class="'.esc_attr( $singleicon['title'] ).'"></i></a></li>';
                                }
                            }
                        }
                    echo '</ul>';
                    echo '<!-- End of Author Social Links -->';

                echo '</div>';
                echo '<!-- End of Widget Content -->';
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
            if ( isset( $instance[ 'author_name' ] ) ) {
                $author_name = $instance[ 'author_name' ];
            }else {
                $author_name = '';
            }

            // Author Designation
            if ( isset( $instance[ 'author_desig' ] ) ) {
                $author_desig = $instance[ 'author_desig' ];
            }else {
                $author_desig = '';
            }

            // Description
            if ( isset( $instance[ 'desc' ] ) ) {
                $desc = $instance[ 'desc' ];
            }else {
                $desc = '';
            }

            //Image
            if ( isset( $instance[ 'about_img' ] ) ) {
                $about_img = $instance[ 'about_img' ];
            }else {
                $about_img = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <input value="<?php echo esc_attr($about_img); ?>" name="<?php echo $this->get_field_name( 'about_img' ); ?>" type="hidden" class="widefat about_me_img_val" type="text" />
                <img class="about_me_img_show" src="<?php echo esc_url($about_img); ?>" alt="">
            </p>

            <p>
                <button class="button about-me-up-button"><?php ( empty( $about_img ) ) ?  esc_html_e("Upload Image","medilax") : esc_html_e("Change Image","medilax"); ?></button>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'author_name' ); ?>"><?php _e( 'Author Name:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'author_name' ); ?>" name="<?php echo $this->get_field_name( 'author_name' ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'author_desig' ); ?>"><?php _e( 'Author Designation:' ,'medilax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'author_desig' ); ?>" name="<?php echo $this->get_field_name( 'author_desig' ); ?>" type="text" value="<?php echo esc_attr( $author_desig ); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php _e( 'Description:' ,'medilax'); ?></label>
                <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" cols="30" rows="10"><?php echo wp_kses_post( $desc ); ?></textarea>
            </p>
            <p>
               <?php echo __( 'Add Social link from ','medilax') . '<a href="'.esc_url( admin_url('admin.php?page=Medilax&tab=18') ).'">'.__('Here','medilax').'</a>'; ?>
            </p>

            <script>
            jQuery(function($){
                'use strict';
                /**
                 *
                 * About Widget About Us upload
                 *
                 */
                $( function(){
                    $(".about_me_img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                    $(document).on('widget-updated',function(event,widget){
                        var widget_id = $(widget).attr('id');
                        if(widget_id.indexOf('medilax_aboutus_widget')!=-1){
                            $imgval = $(".about_me_img_val").val();
                            $(".about_me_img_show").attr("src",$imgval);
                            $(".about_me_img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                        }
                    });
                    $("body").off("click",".about-me-up-button");
                    $("body").on("click",".about-me-up-button",function( e ){

                        let frame = wp.media({
                            title: 'Select or Upload Media About Us',
                            button: {
                                text: 'Use this About Us'
                            },
                            multiple: false
                        });

                        frame.on("select",function(){
                            // Get media attachment details from the frame state
                            let $img = frame.state().get('selection').first().toJSON();

                            $(".about_me_img_show").attr("src",$img.url);
                            $(".about_me_img_val").val($img.url);

                            $(".about_me_img_val").trigger('change');

                            $(".about-me-up-button").text("Change Image");
                        });

                        // Open Media Modal
                        frame.open();
                        e.preventDefault();
                    });
                });
            });
            </script>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['author_name']    = ( ! empty( $new_instance['author_name'] ) ) ? strip_tags( $new_instance['author_name'] ) : '';
            $instance['author_desig']   = ( ! empty( $new_instance['author_desig'] ) ) ? strip_tags( $new_instance['author_desig'] ) : '';
            $instance['desc']           = ( ! empty( $new_instance['desc'] ) ) ? wp_kses_post( $new_instance['desc'] ) : '';
            $instance['about_img']      = ( ! empty( $new_instance['about_img'] ) ) ? strip_tags( $new_instance['about_img'] ) : '';
            return $instance;
        }
    } // Class medilax_about_me_widget ends here


    // Register and load the widget
    function medilax_about_me_load_widget() {
        register_widget( 'medilax_about_me_widget' );
    }
    add_action( 'widgets_init', 'medilax_about_me_load_widget' );
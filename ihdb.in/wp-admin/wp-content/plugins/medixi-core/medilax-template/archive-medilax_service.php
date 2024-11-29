<?php

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();
    echo '<section class="vs-service-wrapper space-top space-md-bottom">';
        echo '<div class="container">';
            echo '<div class="row">';
                while (have_posts()) { the_post();
                    $short_desc = medixi_meta( 'short_descriptons' );

                    $type = medixi_meta( 'icon-type' );
                    $options = medixi_flat_icon_options();
                    $icon = medixi_meta('f-icon');
                    $image = wp_get_attachment_image_src( medixi_meta('custom-icon_id'), 'full' );

                    echo '<div class="col-md-6 col-xl-4">';
                        echo '<div class="service-thumb">';
                            if( has_post_thumbnail() ) :
                                echo '<div class="sr-img">';
                                    the_post_thumbnail('medilax_387x355');
                                echo '</div>';
                            endif;
                            echo '<div class="sr-body">';

                                if($type == 'custom' && !empty( $image )) {
                                    echo '<div class="img-icon">';
                                        echo medixi_img_tag( array(
                                            'url'   => esc_url( $image[0] ),
                                            'class' => 'w-100',
                                        ) );
                                    echo '</div>';
                                }elseif($type == 'flat_icon'){
                                    echo '<div class="sr-icon">';
                                        echo '<i class="'.esc_attr( $icon ).' fa-3x"></i>';
                                    echo '</div>';
                                }
                                echo '<h3 class="h4 sr-title "><a class="text-reset" href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h3>';
                                if(!empty($short_desc)){
                                    echo '<p class="sr-text">'.esc_html( $short_desc ).'</p>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                wp_reset_postdata();
            echo '</div>';
        echo '</div>';
    echo '</section>';
    get_footer();
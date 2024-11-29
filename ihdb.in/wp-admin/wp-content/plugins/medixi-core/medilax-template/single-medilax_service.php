<?php

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();
    $banner_image = medixi_meta( 'banner_img');

    echo '<section class="vs-service-wrapper space-top space-md-bottom">';
        echo '<div class="container">';
            echo '<div class="row">';
                echo '<div class="col-12">';
                    echo '<div class="service-content mb-30">';
                        if(!empty($banner_image)){
                            echo '<div class="vs-surface wow" data-wow-delay="0.3s">';
                                echo '<img src="' . esc_url( $banner_image ) . '" class="w-100">';
                            echo '</div>';
                        }
                        while( have_posts( ) ) :
                            the_post();
                            the_content();

                        endwhile;
                        wp_reset_postdata();
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</section>';
    
    get_footer();
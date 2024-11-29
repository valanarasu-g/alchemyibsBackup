<?php 

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();
    echo '<section class="vs-details-wrapper space-top space-md-bottom">';
        echo '<div class="container">';
            echo '<div class="row gx-40">';
                while( have_posts( ) ) :
                    the_post();
                    the_content();

                endwhile;
                wp_reset_postdata();
            echo '</div>';
        echo '</div>';
    echo '</section>'; 
    get_footer();
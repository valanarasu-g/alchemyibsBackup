<?php

/**
 * @Packge     : Medilax
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

    // Block direct access

    if( ! defined( 'ABSPATH' ) ){

        exit();

    }

/**

 * Admin Custom Login Logo

 */

function medilax_custom_login_logo() {

    $logo = ! empty( medixi_opt( 'medilax_admin_login_logo', 'url' ) ) ? medixi_opt( 'medilax_admin_login_logo', 'url' ) : '' ;

    if( isset( $logo ) && ! empty( $logo ) ){

        echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
    }
}

add_action( 'login_enqueue_scripts', 'medilax_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'medilax_admin_styles' );

function medilax_admin_styles() {

  if ( ! empty( $medilax_admin_custom_css ) ) {
        $medilax_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $medilax_admin_custom_css);
        echo '<style rel="stylesheet" id="medilax-admin-custom-css" >';
            echo esc_html( $medilax_admin_custom_css );
        echo '</style>';
    }
}

 // share button code

 function medixi_social_sharing_buttons( ) {

    // Get page URL

    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script

    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );

    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );

    $pinteresturl   = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());

    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );

    // Add sharing button at the end of page/page content

    $content = '';

    $content .= '<li><a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';

    $content .= '<li><a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';

    $content .= '<li><a class="pinterest" href="'.esc_url( $pinteresturl ).'" target="_blank"><i class="fab fa-pinterest"></i></a></li>';

    $content .= '<li><a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';

    return $content;

};



//add SVG to allowed file uploads

function medilax_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svgz+xml';
    $mimes['exe'] = 'program/exe';
    $mimes['dwg'] = 'image/vnd.dwg';
    return $mimes;

}

add_filter('upload_mimes', 'medilax_mime_types');



function medilax_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );

}

add_filter( 'wp_check_filetype_and_ext', 'medilax_wp_check_filetype_and_ext', 10, 4 );


// Service Post Type

add_action( 'init','medilax_service', 0 );



function medilax_service(){

    $labels = array(

        'name'               => esc_html__( 'Services', 'post Category general name', 'medilax' ),
        'singular_name'      => esc_html__( 'Service', 'post Category singular name', 'medilax' ),
        'menu_name'          => esc_html__( 'Services', 'admin menu', 'medilax' ),
        'name_admin_bar'     => esc_html__( 'Service', 'add new on admin bar', 'medilax' ),
        'add_new'            => esc_html__( 'Add New', 'Service', 'medilax' ),
        'add_new_item'       => esc_html__( 'Add New Service', 'medilax' ),
        'new_item'           => esc_html__( 'New Service', 'medilax' ),
        'edit_item'          => esc_html__( 'Edit Service', 'medilax' ),
        'view_item'          => esc_html__( 'View Service', 'medilax' ),
        'all_items'          => esc_html__( 'All Services', 'medilax' ),
        'search_items'       => esc_html__( 'Search Services', 'medilax' ),
        'parent_item_colon'  => esc_html__( 'Parent Services:', 'medilax' ),
        'not_found'          => esc_html__( 'No Services found.', 'medilax' ),
        'not_found_in_trash' => esc_html__( 'No Services found in Trash.', 'medilax' ),
    );



    $args = array(

        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'medilax' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-nametag',
        'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt', 'elementor' ),
        'rewrite'            => array( 'slug' => 'all-services' ),
    );

    register_post_type( 'medilax_service', $args );


    $labels = array(

        'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'medilax' ),
        'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'medilax' ),
        'search_items'               => esc_html__( 'Search Categorys', 'medilax' ),
        'popular_items'              => esc_html__( 'Popular Categorys', 'medilax' ),
        'all_items'                  => esc_html__( 'All Categorys', 'medilax' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Category', 'medilax' ),
        'update_item'                => esc_html__( 'Update Category', 'medilax' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'medilax' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'medilax' ),
        'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'medilax' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'medilax' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'medilax' ),
        'not_found'                  => esc_html__( 'No Categorys found.', 'medilax' ),
        'menu_name'                  => esc_html__( 'Categories', 'medilax' ),
    );



    $args = array(

        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'service-category' ),
    );

    register_taxonomy( 'service_category', 'medilax_service', $args );



    // Add new taxonomy, NOT hierarchical (like tags)

    $labels = array(

        'name'                       => esc_html__( 'Tags', 'taxonomy general name', 'medilax' ),
        'singular_name'              => esc_html__( 'Tag', 'taxonomy singular name', 'medilax' ),
        'search_items'               => esc_html__( 'Search Tags', 'medilax' ),
        'popular_items'              => esc_html__( 'Popular Tags', 'medilax' ),
        'all_items'                  => esc_html__( 'All Tags', 'medilax' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Tag', 'medilax' ),
        'update_item'                => esc_html__( 'Update Tag', 'medilax' ),
        'add_new_item'               => esc_html__( 'Add New Tag', 'medilax' ),
        'new_item_name'              => esc_html__( 'New Tag Name', 'medilax' ),
        'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'medilax' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'medilax' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Tags', 'medilax' ),
        'not_found'                  => esc_html__( 'No Tags found.', 'medilax' ),
        'menu_name'                  => esc_html__( 'Tags', 'medilax' ),

    );

    $args = array(

        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'service-tag' ),
    );

    register_taxonomy( 'service_tag', 'medilax_service', $args );
}


if( ! function_exists( 'medilax_services_category' ) ){
    function medilax_services_category(){
        $cat_array = array();
        $cat_array[] = esc_html__( 'Select a category','medilax' );
        $terms = get_terms( array(
            'taxonomy'      => 'service_category',
            'hide_empty'    => true
        ) );
        if( is_array( $terms ) && $terms ){
            foreach( $terms as $term ){
                $cat_array[$term->slug] = $term->name;
            }
        }
        return $cat_array;
    }
}





// Doctor Post Type

add_action( 'init','medilax_doctors', 0 );



function medilax_doctors(){

    $labels = array(

        'name'               => esc_html__( 'Doctors', 'post Category general name', 'medilax' ),
        'singular_name'      => esc_html__( 'Doctor', 'post Category singular name', 'medilax' ),
        'menu_name'          => esc_html__( 'Doctors', 'admin menu', 'medilax' ),
        'name_admin_bar'     => esc_html__( 'Doctor', 'add new on admin bar', 'medilax' ),
        'add_new'            => esc_html__( 'Add New', 'Doctor', 'medilax' ),
        'add_new_item'       => esc_html__( 'Add New Doctor', 'medilax' ),
        'new_item'           => esc_html__( 'New Doctor', 'medilax' ),
        'edit_item'          => esc_html__( 'Edit Doctor', 'medilax' ),
        'view_item'          => esc_html__( 'View Doctor', 'medilax' ),
        'all_items'          => esc_html__( 'All Doctors', 'medilax' ),
        'search_items'       => esc_html__( 'Search Doctors', 'medilax' ),
        'parent_item_colon'  => esc_html__( 'Parent Doctors:', 'medilax' ),
        'not_found'          => esc_html__( 'No Doctors found.', 'medilax' ),
        'not_found_in_trash' => esc_html__( 'No Doctors found in Trash.', 'medilax' ),
    );



    $args = array(

        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'medilax' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
        'supports'           => array( 'title', 'thumbnail', 'editor' , 'elementor'),
        'rewrite'            => array( 'slug' => 'all-doctors' ),
    );

    register_post_type( 'medilax_doctors', $args );


    $labels = array(

        'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'medilax' ),
        'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'medilax' ),
        'search_items'               => esc_html__( 'Search Categorys', 'medilax' ),
        'popular_items'              => esc_html__( 'Popular Categorys', 'medilax' ),
        'all_items'                  => esc_html__( 'All Categorys', 'medilax' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Category', 'medilax' ),
        'update_item'                => esc_html__( 'Update Category', 'medilax' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'medilax' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'medilax' ),
        'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'medilax' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'medilax' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'medilax' ),
        'not_found'                  => esc_html__( 'No Categorys found.', 'medilax' ),
        'menu_name'                  => esc_html__( 'Categories', 'medilax' ),
    );



    $args = array(

        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'doctors-category' ),
    );

    register_taxonomy( 'doctors_category', 'medilax_doctors', $args );



    // Add new taxonomy, NOT hierarchical (like tags)

    $labels = array(

        'name'                       => esc_html__( 'Tags', 'taxonomy general name', 'medilax' ),
        'singular_name'              => esc_html__( 'Tag', 'taxonomy singular name', 'medilax' ),
        'search_items'               => esc_html__( 'Search Tags', 'medilax' ),
        'popular_items'              => esc_html__( 'Popular Tags', 'medilax' ),
        'all_items'                  => esc_html__( 'All Tags', 'medilax' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Tag', 'medilax' ),
        'update_item'                => esc_html__( 'Update Tag', 'medilax' ),
        'add_new_item'               => esc_html__( 'Add New Tag', 'medilax' ),
        'new_item_name'              => esc_html__( 'New Tag Name', 'medilax' ),
        'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'medilax' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'medilax' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Tags', 'medilax' ),
        'not_found'                  => esc_html__( 'No Tags found.', 'medilax' ),
        'menu_name'                  => esc_html__( 'Tags', 'medilax' ),

    );



    $args = array(

        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'doctors-tag' ),
    );



    register_taxonomy( 'doctors_tag', 'medilax_doctors', $args );

}



if( ! function_exists( 'medilax_doctorss_category' ) ){

    function medilax_doctorss_category(){
        $cat_array = array();
        $cat_array[] = esc_html__( 'Select a category','medilax' );
        $terms = get_terms( array(
            'taxonomy'      => 'doctors_category',
            'hide_empty'    => true
        ) );
        if( is_array( $terms ) && $terms ){
            foreach( $terms as $term ){
                $cat_array[$term->slug] = $term->name;
            }
        }
        return $cat_array;
    }
}



// Project Post Type

add_action( 'init','medilax_project', 0 );


function medilax_project(){

    $labels = array(

        'name'               => esc_html__( 'Projects', 'post Category general name', 'medilax' ),
        'singular_name'      => esc_html__( 'Project', 'post Category singular name', 'medilax' ),
        'menu_name'          => esc_html__( 'Projects', 'admin menu', 'medilax' ),
        'name_admin_bar'     => esc_html__( 'Project', 'add new on admin bar', 'medilax' ),
        'add_new'            => esc_html__( 'Add New', 'Project', 'medilax' ),
        'add_new_item'       => esc_html__( 'Add New Project', 'medilax' ),
        'new_item'           => esc_html__( 'New Project', 'medilax' ),
        'edit_item'          => esc_html__( 'Edit Project', 'medilax' ),
        'view_item'          => esc_html__( 'View Project', 'medilax' ),
        'all_items'          => esc_html__( 'All Projects', 'medilax' ),
        'search_items'       => esc_html__( 'Search Projects', 'medilax' ),
        'parent_item_colon'  => esc_html__( 'Parent Projects:', 'medilax' ),
        'not_found'          => esc_html__( 'No Projects found.', 'medilax' ),
        'not_found_in_trash' => esc_html__( 'No Projects found in Trash.', 'medilax' ),
    );



    $args = array(

        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'medilax' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-index-card',
        'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt', 'elementor' ),
        'rewrite'            => array( 'slug' => 'all-projects' ),
    );

    register_post_type( 'medilax_project', $args );


    $labels = array(

        'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'medilax' ),
        'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'medilax' ),
        'search_items'               => esc_html__( 'Search Categorys', 'medilax' ),
        'popular_items'              => esc_html__( 'Popular Categorys', 'medilax' ),
        'all_items'                  => esc_html__( 'All Categorys', 'medilax' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Category', 'medilax' ),
        'update_item'                => esc_html__( 'Update Category', 'medilax' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'medilax' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'medilax' ),
        'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'medilax' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'medilax' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'medilax' ),
        'not_found'                  => esc_html__( 'No Categorys found.', 'medilax' ),
        'menu_name'                  => esc_html__( 'Categories', 'medilax' ),
    );



    $args = array(

        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'project-category' ),
    );

    register_taxonomy( 'project_category', 'medilax_project', $args );



    // Add new taxonomy, NOT hierarchical (like tags)

    $labels = array(

        'name'                       => esc_html__( 'Tags', 'taxonomy general name', 'medilax' ),
        'singular_name'              => esc_html__( 'Tag', 'taxonomy singular name', 'medilax' ),
        'search_items'               => esc_html__( 'Search Tags', 'medilax' ),
        'popular_items'              => esc_html__( 'Popular Tags', 'medilax' ),
        'all_items'                  => esc_html__( 'All Tags', 'medilax' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Tag', 'medilax' ),
        'update_item'                => esc_html__( 'Update Tag', 'medilax' ),
        'add_new_item'               => esc_html__( 'Add New Tag', 'medilax' ),
        'new_item_name'              => esc_html__( 'New Tag Name', 'medilax' ),
        'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'medilax' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'medilax' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Tags', 'medilax' ),
        'not_found'                  => esc_html__( 'No Tags found.', 'medilax' ),
        'menu_name'                  => esc_html__( 'Tags', 'medilax' ),

    );

    $args = array(

        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'project-tag' ),
    );

    register_taxonomy( 'project_tag', 'medilax_project', $args );
}



if( ! function_exists( 'medilax_projects_category' ) ){

    function medilax_projects_category(){

        $cat_array = array();

        $cat_array[] = esc_html__( 'Select a category','medilax' );

        $terms = get_terms( array(

            'taxonomy'      => 'project_category',
            'hide_empty'    => true
        ) );

        if( is_array( $terms ) && $terms ){

            foreach( $terms as $term ){

                $cat_array[$term->slug] = $term->name;
            }
        }
        return $cat_array;
    }
}



/**
 * Single Template
 */

add_filter( 'single_template', 'medilax_core_template_redirect' );

if( ! function_exists( 'medilax_core_template_redirect' ) ){

    function medilax_core_template_redirect( $single_template ){

        global $post;


        if( $post ){

            if( $post->post_type == 'medilax_service' ){

                $single_template = MEDILAX_CORE_PLUGIN_TEMP . 'single-medilax_service.php';

            }elseif( $post->post_type == 'medilax_doctors' ){

                $single_template = MEDILAX_CORE_PLUGIN_TEMP . 'single-medilax_doctor.php';
            }
        }

        return $single_template;
    }

}

/**
 * Archive Template
 */

add_filter( 'archive_template', 'medilax_core_template_archive' );

if( ! function_exists( 'medilax_core_template_archive' ) ){

    function medilax_core_template_archive( $archive_template ){

        global $post;


        if( $post ){

            if( $post->post_type == 'medilax_service' ){

                $archive_template = MEDILAX_CORE_PLUGIN_TEMP . 'archive-medilax_service.php';

            }elseif( $post->post_type == 'medilax_project' ){

                $archive_template = MEDILAX_CORE_PLUGIN_TEMP . 'archive-medilax_project.php';

            }elseif( $post->post_type == 'medilax_doctors' ){
                
                $archive_template = MEDILAX_CORE_PLUGIN_TEMP . 'archive-medilax_doctors.php';
            }
        }

        return $archive_template;
    }

}

// Add Image Size

add_filter('wpcf7_autop_or_not', '__return_false');
add_image_size( 'medilax_90X80', 90, 80, true );
add_image_size( 'medilax_70X70', 70, 70, true );
add_image_size( 'medilax_387x310', 387, 310, true );
add_image_size( 'medilax_387x355', 387, 355, true );
add_image_size( 'medilax_417x228', 417, 228, true );
add_image_size( 'medilax_302x526', 302, 526, true );
add_image_size( 'medilax_347x318', 347, 318, true );
add_image_size( 'medilax_347x200', 347, 200, true );
add_image_size( 'medilax_405x275', 405, 275, true );
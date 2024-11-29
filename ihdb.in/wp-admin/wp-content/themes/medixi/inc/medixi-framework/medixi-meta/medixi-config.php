<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */


add_action( 'cmb2_admin_init', 'medixi_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function medixi_register_metabox() {

	$prefix = '_medixi_';

	$prefixpage = '_medixipage_';
	
	
	$medixi_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'medixi' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );
	$medixi_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Video', 'medixi' ),
		'desc' => esc_html__( 'Use This Field When Post Format Video', 'medixi' ),
		'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );
	$medixi_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'medixi' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'medixi' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$medixi_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'medixi' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'medixi' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );
	
	$medixi_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Meta', 'medixi' ),
		'object_types'  => array( 'page' ), // Post type
        'closed'        => true
    ) );

    $medixi_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'medixi' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'medixi' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','medixi'),
            '2'     => esc_html__('Hide','medixi'),
        )
    ) );


    $medixi_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'medixi' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__('Global Settings','medixi'),
            'page'     => esc_html__('Page Settings','medixi'),
        )
	) );
    $medixi_page_meta->add_field( array(
	    'name'    => esc_html__( 'Breadcumb Image', 'medixi' ),
	    'desc'    => esc_html__( 'Upload an image or enter an URL.', 'medixi' ),
	    'id'      => $prefix . 'breadcumb_image',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => __( 'Add File', 'medixi' ) // Change upload button text. Default: "Add or Upload File"
	    ),
	    'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );
    $medixi_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'medixi' ),
		'desc' => esc_html__( 'check to display Page Title.', 'medixi' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','medixi'),
            '2'     => esc_html__('Hide','medixi'),
        )
	) );

    $medixi_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'medixi' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','medixi'),
            'custom'  => esc_html__('Custom Title','medixi'),
        ),
        'default'   => 'default'
    ) );

    $medixi_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'medixi' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $medixi_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'medixi' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'medixi' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'checkbox',
    ) );

    $medixi_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'medixi' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$medixi_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'medixi' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'medixi' ),
            '2' => esc_html__( 'Container Fluid', 'medixi' ),
            '3' => esc_html__( 'Fullwidth', 'medixi' ),
        ),
	) );

}

add_action( 'cmb2_admin_init', 'medixi_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function medixi_register_taxonomy_metabox() {

    $prefix = '_medixi_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$medixi_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'medixi' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$medixi_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'medixi' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$medixi_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'medixi' ),
		'desc' => esc_html__( 'Set Category Image', 'medixi' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','medixi') // Change upload button text. Default: "Add or Upload File"
		),
	) );


	/**
	 * Metabox for the user profile screen
	 */
	$medixi_user = new_cmb2_box( array(
		'id'               => $prefix.'user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'medixi' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
	$medixi_user->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'medixi' ),
		'id'       => $prefix.'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $medixi_user->add_field( array(
        'id'          => $prefix .'social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'medixi' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'medixi' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'medixi' ),
            'remove_button'     => __( 'Remove Social Profile', 'medixi' ),
            'closed'         => true
        ),
    ) );

    $medixi_user->add_group_field( $group_field_id, array(
        'name'        => __( 'Icon Class', 'medixi' ),
        'id'          => $prefix .'social_profile_icon',
        'type'        => 'text', // This field type
    ) );

    $medixi_user->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'medixi' ),
        'id'         => $prefix . 'lawyer_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'medixi' ),
        'type'       => 'text'
    ) );
}

add_action( 'cmb2_admin_init', 'medixi_service_metabox' );
/**
 * Hook in and add a metabox to service post
 */
function medixi_service_metabox() {

    $prefix = '_medixi_';

	/**
	 * Metabox for the Serivice Post Type
	 */
	$medixi_servicess = new_cmb2_box( array(
		'id'               => $prefix.'service_post',
		'title'            => esc_html__( 'Service :: Additional Informations', 'medixi' ), // Doesn't output for user boxes
		'object_types'     => array( 'medilax_service' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
	) );

	$medixi_servicess->add_field( array(
		'name'     => esc_html__( 'Short Descriptions', 'medixi' ),
		'id'       => $prefix.'short_descriptons',
		'type'     => 'textarea_small',
	) );

	$medixi_servicess->add_field( array(
        'name'          => esc_html__('Icon Type','medixi'),
        'desc'          => esc_html__('Select an option form the dropdown menu','medixi'),
        'id'            => $prefix.'icon-type',
        'type'          => 'select',
        'default'       => 'custom',
        'options'       => array(
            'custom'            => esc_html__('Custom Icon','medixi'),
            'flat_icon'         => esc_html__('Flat Icon','medixi'),
        ),
    ) );

    $medixi_servicess->add_field( array(
        'name'          => esc_html__('Custom Icon','medixi'),
        'desc'          => esc_html__('Upload a custom Icon or enter image URL.','medixi'),
        'id'            => $prefix.'custom-icon',
        'type'          => 'file',
        'attributes'    => array(
            'required'                  => true,
            'data-conditional-id'       => $prefix.'icon-type',
            'data-conditional-value'    => 'custom',
        ),
        'allow'         => array( 'url', 'attachment' ),
        'text'          => array(
            'add_upload_file_text'      => esc_html__('Add Icon','medixi'),
        ),
        'query_args'    => array(
            'type'                      => array('image/gif', 'image/jpeg', 'image/png'),
        ),
        'preview_size'  => array(100,100),
    ));

    $medixi_servicess->add_field( array(
        'name'          => esc_html__('Flat Icon','medixi'),
        'desc'          => esc_html__('Select an icon name form the dropdown menu','medixi'),
        'id'            => $prefix.'f-icon',
        'type'          => 'select',
        'attributes'        => array(
            'required'               => true,
            'data-conditional-id'    => $prefix.'icon-type',
            'data-conditional-value' => 'flat_icon',
        ),
        'default'          => 'custom',
        'options_cb' => 'medixi_flat_icon_options',
    ));

	$medixi_servicess->add_field( array(
	    'name'    => 'Upload Banner Image',
	    'desc'    => 'Upload a banner image for showing in single page.',
	    'id'      => $prefix.'banner_img',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => 'Add A Banner Image' // Change upload button text. Default: "Add or Upload File"
	    ),
	    // query_args are passed to wp.media's library query.
	    'query_args' => array(

	        'type' => array(
	            'image/gif',
	            'image/jpeg',
	            'image/png',
	        ),
	    ),
	    'preview_size' => 'small', // Image size to use when previewing in the admin.
	) );
}

add_action( 'cmb2_admin_init', 'medixi_team_member_metabox' );

/**
 * Hook in and add a metabox to Doctor post
 */
function medixi_team_member_metabox() {

    $prefix = '_medixi_';

	/**
	 * Metabox for the team member Post Type
	 */
	$medixi_doctor = new_cmb2_box( array(
		'id'               => $prefix.'doctor_info',
		'title'            => esc_html__( 'Genaral Informations', 'medixi' ), // Doesn't output for user boxes
		'object_types'     => array( 'medilax_doctors' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
	) );

    $medixi_doctor->add_field( array(
        'name'     => esc_html__( 'Short Descriptions', 'medixi' ),
		'id'       => $prefix.'short_descripton',
		'type'     => 'textarea_small',
    ));

    $medixi_doctor->add_field( array(
        'name'          => esc_html__('Phone Number','medixi'),
        'id'            => $prefix.'doctor_phone',
        'type'     		=> 'text',
		'on_front' 		=> false,
    ));

    $medixi_doctor->add_field( array(
        'name'          => esc_html__('Email','medixi'),
        'id'            => $prefix.'doctor_email',
        'type'     		=> 'text',
		'on_front' 		=> false,
    ));

    $medixi_doctor->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'medixi' ),
		'id'       => $prefix.'doctor_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $medixi_doctor->add_field( array(
        'id'          => $prefix .'doctor_social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'medixi' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'medixi' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'medixi' ),
            'remove_button'     => __( 'Remove Social Profile', 'medixi' ),
            'closed'         => true
        ),
    ) );

    $medixi_doctor->add_group_field( $group_field_id, array(
        'name'        => __( 'Icon Class', 'medixi' ),
        'id'          => $prefix .'doctor_social_profile_icon',
        'type'        => 'text', // This field type
    ) );

    $medixi_doctor->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'medixi' ),
        'id'         => $prefix . 'doctor_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'medixi' ),
        'type'       => 'text'
    ) );

    
}

function medixi_flat_icon_options() {
    return
    array(
        'flaticon-blood-pressure'   => esc_html__('Blood Pressure', 'medixi'),
        'flaticon-computer-mouse'   => esc_html__('Computer Mouse', 'medixi'),
        'flaticon-discuss'   		=> esc_html__('Discuss', 'medixi'),
        'flaticon-ecg'   			=> esc_html__('ECG', 'medixi'),
        'flaticon-electrocardiogram'   => esc_html__('Electrocardiogram', 'medixi'),
        'flaticon-group'   			=> esc_html__('Group', 'medixi'),
        'flaticon-healthcare'  		=> esc_html__('Healthcare', 'medixi'),
        'flaticon-injection'   		=> esc_html__('Injection', 'medixi'),
        'flaticon-laboratory-equipment'   => esc_html__('Laboratory Equipment', 'medixi'),
        'flaticon-medical-kit'   	=> esc_html__('Medical kit', 'medixi'),
        'flaticon-medical-mask'   	=> esc_html__('Medical Mask', 'medixi'),
        'flaticon-medical-results'  => esc_html__('Medical Results', 'medixi'),
        'flaticon-medical-symbol'   => esc_html__('Medical Symbol', 'medixi'),
        'flaticon-quality-of-life'  => esc_html__('Medical Quality of life', 'medixi'),
        'flaticon-quotation'   		=> esc_html__('Quotation', 'medixi'),
        'flaticon-quote'   			=> esc_html__('Quote', 'medixi'),
        'flaticon-security'   		=> esc_html__('Security', 'medixi'),
        'flaticon-stethoscope-1'   	=> esc_html__('Stethoscope', 'medixi'),
        'flaticon-stethoscope'   	=> esc_html__('Stethoscope 2', 'medixi'),
    );
}
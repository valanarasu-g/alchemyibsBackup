<?php



if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.
}

/**
 * Main Medilax Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Medilax_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}


		// Add Plugin actions

		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);

		// Register widget styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );


		// Specific Register widget scripts

		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'medilax_regsiter_widget_scripts' ] );


        // category register

		add_action( 'elementor/elements/categories_registered',[ $this, 'medilax_elementor_widget_categories' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'medilax' ),
			'<strong>' . esc_html__( 'Medilax Core', 'medilax' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'medilax' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'medilax' ),
			'<strong>' . esc_html__( 'Medilax Core', 'medilax' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'medilax' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(

			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'medilax' ),
			'<strong>' . esc_html__( 'Medilax Core', 'medilax' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'medilax' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {

		// Include Widget files

		require_once( MEDILAX_ADDONS . '/widgets/section-title.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-about-us.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-services.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-service-info.php' );
		require_once( MEDILAX_ADDONS . '/widgets/appointment-button.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-features.php' );
		require_once( MEDILAX_ADDONS . '/widgets/content-header.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-doctors.php' );
		require_once( MEDILAX_ADDONS . '/widgets/doctor-single-image.php' );
		require_once( MEDILAX_ADDONS . '/widgets/time-schedule.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-contact-form.php' );
		require_once( MEDILAX_ADDONS . '/widgets/middle-box.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-tab.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-faq.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-skill.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-testimonials.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-brand.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-newslatter.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-blog.php' );
		require_once( MEDILAX_ADDONS . '/widgets/offer-date.php' );
		require_once( MEDILAX_ADDONS . '/widgets/coupon-code.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-project.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-image-with-video.php' );
		require_once( MEDILAX_ADDONS . '/widgets/contact-number.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-cta.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-work-process.php' );
		require_once( MEDILAX_ADDONS . '/widgets/button.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-single-contact-info.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-list.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-service-tab.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medical-box-slider.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-video-box.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-events.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-tab-builder.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-about-box.php' );
		require_once( MEDILAX_ADDONS . '/widgets/medilax-facility-slider.php' );

		// Header Elements

		require_once( MEDILAX_ADDONS . '/header/header.php' );
		require_once( MEDILAX_ADDONS . '/header/new-search.php' );
		require_once( MEDILAX_ADDONS . '/header/header-info.php' );
		require_once( MEDILAX_ADDONS . '/header/header-menu.php' );
		require_once( MEDILAX_ADDONS . '/header/medilax-mobile-menu.php' );

		// Register widget

		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_AboutUs_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Service_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Service_Info_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Appointment_Button_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Features_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Contetn_Header_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Doctors_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Doctor_Image_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Schedule_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Contact_Form_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Middle_Box_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Tab_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Faq_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Counterup_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Testimonial_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Client_Logo_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Newsletter_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Blog_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Offer_Date_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Coupon_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Project_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Image_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Contact_Number_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_CTA_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Work_Process_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Button_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Single_Contact_Info_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_List_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Service_Tab_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Medical_Slider_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Video_Box_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Events_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_About_Tab() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_AboutBox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Facility_Slider() );
		



		// Header Widget Register

		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Header() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Header_Search() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Header_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medilax_Header_Menu() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Medixi_Mobilemenu() );
	}

    public function widget_scripts() {

        wp_enqueue_script(
            'medilax-frontend-script',
            MEDILAX_PLUGDIRURI . 'assets/js/medilax-frontend.js',
            array('jquery'),
            false,
            true
		);
	}

	public function enqueue_widget_styles( ) {

		wp_enqueue_style( 
			'medilax-flaticons',
			 MEDILAX_PLUGDIRURI . 'assets/vendors/flaticon-set.css'
		);
	}

    function medilax_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'medilax',
            [
                'title' => __( 'Medilax', 'medilax' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'medilax_footer_elements',
            [
                'title' => __( 'Medilax Footer Elements', 'medilax' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'medilax_header_elements',
            [
                'title' => __( 'Medilax Header Elements', 'medilax' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Medilax_Extension::instance();
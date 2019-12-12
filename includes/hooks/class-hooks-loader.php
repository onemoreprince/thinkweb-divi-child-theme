<?php 
/**
 * Divi Hooks Loader
 */

if ( ! class_exists( 'Divi_Hooks_Loader' ) ) {

	class Divi_Hooks_Loader {

		/**
		 * Member Varible
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'customize_register',    array( $this, 'thinkweb_agency_hooks_customize_register' ) );
		}

		function thinkweb_agency_hooks_customize_register( $wp_customize ) {

			/**
			 * Panel
			 */
			$wp_customize->add_panel(
				'thinkweb-agency-panel-hooks', array(
					'priority' => 5,
					'title' => __( 'Divi Hooks', 'thinkweb-agency-child-theme' ),
				)
			);

			/**
			 * Sections
			 */
			$wp_customize->add_section(
				'header-hooks-section', array(
					'title'    => __( 'Header', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-panel-hooks',
				)
			);

			$wp_customize->add_section(
				'single-hooks-section', array(
					'title'    => __( 'Single', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-panel-hooks',
				)
			);

			$wp_customize->add_section(
				'footer-hooks-section', array(
					'title'    => __( 'Footer', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-panel-hooks',
				)
			);

			/**
			 * Settings
			 */
			
			// Hook: et_head_meta
			$wp_customize->add_setting( 'hook_et_head_meta', array(
				'default'   => '',
				'type'      => 'option',
				)
			);

			$wp_customize->add_control( 'hook_et_head_meta', array(
				'type'        => 'textarea',
				'section'     => 'header-hooks-section',
				'label'       => __( 'Head Meta', 'thinkweb-agency-child-theme' ),
				'description' => __( 'Fires in the head, before wp_head() is called. This action can be used to insert elements into the beginning of the head before any styles or scripts.' ),
				)
			);

			// Hook: wp_head
			$wp_customize->add_setting( 'hook_wp_head', array(
				'default'   => '',
				'type'      => 'option',
				)
			);

			$wp_customize->add_control( 'hook_wp_head', array(
				'type'        => 'textarea',
				'section'     => 'header-hooks-section',
				'label'       => __( 'wp_head', 'thinkweb-agency-child-theme' ),
				)
			);

			// Hook: et_html_top_header
			$wp_customize->add_setting( 'hook_et_html_top_header', array(
				'default'   => '',
				'type'      => 'option',
				)
			);
			
			$wp_customize->add_control( 'hook_et_html_top_header', array(
				'type'        => 'textarea',
				'section'     => 'header-hooks-section',
				'label'       => __( 'Top Header ( et_html_top_header )', 'thinkweb-agency-child-theme' ),
				)
			);

			// Hook: et_html_slide_header
			$wp_customize->add_setting( 'hook_et_html_slide_header', array(
				'default'   => '',
				'type'      => 'option',
				)
			);
			
			$wp_customize->add_control( 'hook_et_html_slide_header', array(
				'type'        => 'textarea',
				'section'     => 'header-hooks-section',
				'label'       => __( 'Slide Header ( et_html_slide_header )', 'thinkweb-agency-child-theme' ),
				'description' => __( 'HTML output for the slide header' ),
				)
			);

			// Hook: et_html_logo_container
			$wp_customize->add_setting( 'hook_et_html_logo_container', array(
				'default'   => '',
				'type'      => 'option',
   			'transport'   => 'postMessage',
  			// 'transport' => 'refresh',
				)
			);
			
			$wp_customize->add_control( 'hook_et_html_logo_container', array(
				'type'        => 'textarea',
				'section'     => 'header-hooks-section',
				'label'       => __( 'Logo Container ( et_html_logo_container )', 'thinkweb-agency-child-theme' ),
				'description' => __( 'HTML output for the logo container' ),
				)
			);
			
			// Hook: et_header_top
			$wp_customize->add_setting( 'hook_et_header_top', array(
				'default'   => '',
				'type'      => 'option',
				)
			);

			$wp_customize->add_control( 'hook_et_header_top', array(
				'type'        => 'textarea',
				'section'     => 'header-hooks-section',
				'label'       => __( 'Top Navigation ( et_header_top )', 'thinkweb-agency-child-theme' ),
				'description' => __( 'Fires at the end of the et-top-navigation element, just before its closing tag.' ),
				)
			);

			// Hook: et_before_main_content
			$wp_customize->add_setting( 'hook_et_before_main_content', array(
				'default'   => '',
				'type'      => 'option',
				)
			);

			$wp_customize->add_control( 'hook_et_before_main_content', array(
				'type'        => 'textarea',
				'section'     => 'header-hooks-section',
				'label'       => __( 'After Header ( et_before_main_content )', 'thinkweb-agency-child-theme' ),
				'description' => __( 'Fires after the header, before the main content is output.' ),
				)
			);

			// Hook: et_after_main_content
			$wp_customize->add_setting( 'hook_et_before_content', array(
				'default'   => '',
				'type'      => 'option',
				)
			);

			$wp_customize->add_control( 'hook_et_before_content', array(
				'type'        => 'textarea',
				'section'     => 'single-hooks-section',
				'label'       => __( 'Before Content ( et_before_content )', 'thinkweb-agency-child-theme' ),
				'description' => __( 'Fires right before the_content() is called.' ),
				)
			);

			// Hook: et_after_main_content
			$wp_customize->add_setting( 'hook_et_after_main_content', array(
				'default'   => '',
				'type'      => 'option',
				)
			);

			$wp_customize->add_control( 'hook_et_after_main_content', array(
				'type'        => 'textarea',
				'section'     => 'footer-hooks-section',
				'label'       => __( 'Before Footer ( et_after_main_content )', 'thinkweb-agency-child-theme' ),
				'description' => __( 'Fires after the main content, before the footer is output.' ),
				)
			);

		}

	}

	Divi_Hooks_Loader::get_instance();
}
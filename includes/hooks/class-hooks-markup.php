<?php 
/**
 * Divi Hooks Markup
 */

if ( ! class_exists( 'Divi_Hooks_Markup' ) ) {

	class Divi_Hooks_Markup {

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
			// Header 
			add_action( 'wp_head',									array( $this, 'hook_wp_head' ) );
			add_action( 'et_html_top_header',				array( $this, 'hook_html_top_header' ) );
			add_action( 'et_html_slide_heade',			array( $this, 'hook_html_slide_header' ) );

			if( '' !== get_option( 'hook_et_html_logo_container' ) ) {
				add_action( 'et_html_logo_container',		array( $this, 'hook_html_logo_container' ) );
			}

			add_action( 'et_header_top',						array( $this, 'hook_header_top' ) );
			add_action( 'et_before_main_content',		array( $this, 'hook_before_main_content' ) );
			add_action( 'et_after_main_content',		array( $this, 'hook_after_main_content' ) );
			add_action( 'et_before_content',				array( $this, 'hook_single_before_content' ) );

		}
		
		function hook_wp_head() {
			$wp_head    = get_option( 'hook_wp_head' );
			echo do_shortcode( $wp_head );
		}

		function hook_html_top_header() {
			$html_top_header    = get_option( 'hook_et_html_top_header' );
			echo do_shortcode( $html_top_header );
		}

		function hook_html_slide_header() {
			$html_slide_header    = get_option( 'hook_et_html_slide_header' );
			echo do_shortcode( $html_slide_header );
		}

		function hook_html_logo_container() {
			$html_logo_container  = get_option( 'hook_et_html_logo_container' );
			echo '<div class="logo_container">' . do_shortcode( $html_logo_container ) . '</div>';
		}

		function hook_header_top() {
			$header_top    = get_option( 'hook_et_header_top' );
			echo do_shortcode( $header_top );
		}
		
		function hook_before_main_content() {
			$before_main_content    = get_option( 'hook_et_before_main_content' );
			echo do_shortcode( $before_main_content );
		}

		function hook_after_main_content() {
			$after_main_content    = get_option( 'hook_et_after_main_content' );
			echo do_shortcode( $after_main_content );
		}

		function hook_single_before_content() {
			$single_before_content    = get_option( 'hook_et_before_content' );
			echo do_shortcode( $single_before_content );
		}

	}

	Divi_Hooks_Markup::get_instance();
}
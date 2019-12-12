<?php 
/**
 * Divi Hooks
 */

if ( ! class_exists( 'Divi_Hooks' ) ) {

	class Divi_Hooks {

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
			add_action( 'admin_menu', array($this, 'thinkweb_agency_hooks_admin_link'), 99 );
			require_once dirname(__FILE__) . '/class-hooks-loader.php';
			require_once dirname(__FILE__) . '/class-hooks-markup.php';
		}

		public function thinkweb_agency_hooks_admin_link() {

			$home_url = esc_url( home_url() );

			$url = add_query_arg(
				array(
					'et_customizer_option_set' => 'theme',
					'autofocus[panel]' => 'thinkweb-agency-panel-hooks',
					'url' => rawurlencode( $home_url ),
				),

				admin_url( 'customize.php' )
			);

			add_submenu_page( 
				'et_divi_options', 
				esc_html__( 'Divi Hooks', 'thinkweb-agency-child-theme' ), 
				esc_html__( 'Divi Hooks', 'thinkweb-agency-child-theme' ), 
				'manage_options', 
				$url
			);
		}

	}

	Divi_Hooks::get_instance();
}
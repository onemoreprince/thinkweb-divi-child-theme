<?php
/**
 * SVG Mime type
 */

if ( ! class_exists( 'Divi_Svg_Mime_Type' ) ) {

	class Divi_Svg_Mime_Type {
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
			add_filter('upload_mimes', array( $this, 'thinkweb_agency_svg_mime_support') );
			add_action('admin_enqueue_scripts', array( $this, 'thinkweb_agency_fix_svg_thumb_display') );
		}

		public function thinkweb_agency_svg_mime_support( $file_types ) {
			$svg_mime_filetypes = array();
			$svg_mime_filetypes['svg'] = 'image/svg+xml';
			$file_types = array_merge($file_types, $svg_mime_filetypes );
			return $file_types;
		}

		function thinkweb_agency_fix_svg_thumb_display() { ?>
			<style type="text/css">
				.has-media-icon .media-icon.image-icon img{
        	width: 100% !important;
        	height: auto !important;
				}
			</style>
		<?php
		}


	}


	Divi_Svg_Mime_Type::get_instance();

}
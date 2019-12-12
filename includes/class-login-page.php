<?php 
/**
 * Divi Hooks
 */

if ( ! class_exists( 'Login_Page_Customizer' ) ) {

	class Login_Page_Customizer {

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
			add_action( 'admin_menu', array($this, 'thinkweb_agency_lpc_admin_link'), 99 );
			add_action( 'customize_register', array( $this, 'thinkweb_agency_login_page_customize_register' ) );
			add_action( 'login_enqueue_scripts', array($this, 'thinkweb_agency_lpc_style'), 99999);
			add_filter( 'login_headerurl', array($this, 'thinkweb_agency_login_url' ) );
		}

		function thinkweb_agency_login_url() {
			return home_url(); 
		}

		function thinkweb_agency_lpc_admin_link() {

			$login_url = esc_url( wp_login_url() );

			$url = add_query_arg(
				array(
					'et_customizer_option_set' => 'theme',
					'autofocus[panel]' => 'thinkweb-agency-panel-login-page',
					'url' => rawurlencode( $login_url ),
				),

				admin_url( 'customize.php' )
			);

			add_submenu_page( 
				'et_divi_options', 
				esc_html__( 'Login Customizer', 'thinkweb-agency-child-theme' ), 
				esc_html__( 'Login Customizer', 'thinkweb-agency-child-theme' ), 
				'manage_options', 
				$url
			);
		}

		function thinkweb_agency_login_page_customize_register( $wp_customize ) {

			/**
			 * Panel
			 */
			$wp_customize->add_panel(
				'thinkweb-agency-panel-login-page', array(
					'priority' => 5,
					'title' => __( 'Login Page', 'thinkweb-agency-child-theme' ),
				)
			);

			/**
			 * Sections
			 */
			$wp_customize->add_section(
				'thinkweb-agency-login-page-logo-section', array(
					'title'    => __( 'Logo', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-panel-login-page',
				)
			);

			$wp_customize->add_section(
				'thinkweb-agency-login-page-bg-section', array(
					'title'    => __( 'Background', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-panel-login-page',
				)
			);

			$wp_customize->add_section(
				'thinkweb-agency-login-page-form-section', array(
					'title'    => __( 'Login Form', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-panel-login-page',
				)
			);

			$wp_customize->add_section(
				'thinkweb-agency-login-page-button-section', array(
					'title'    => __( 'Button', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-panel-login-page',
				)
			);

			/**
			 * Settings
			 */
			$wp_customize->add_setting( 'thinkweb_agency_login_page_logo', array(
        'type' => 'option',
				'capability'  => 'edit_theme_options'
			) );
			
			$wp_customize->add_control( 
				new WP_Customize_Image_Control(
					$wp_customize, 
					'thinkweb_agency_login_page_logo', 
					array(
						'label'		=> esc_html__( 'Upload a logo', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-logo-section',
            'settings'   => 'thinkweb_agency_login_page_logo',
           )
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_logo_width', array(
				'default'       => '84',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_login_logo_width', array(
				'label'	      => esc_html__( 'Logo Width', 'thinkweb-agency-child-theme' ),
				'section'			=> 'thinkweb-agency-login-page-logo-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 950,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_login_logo_height', array(
				'default'       => '84',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_login_logo_height', array(
				'label'	      => esc_html__( 'Logo Height', 'thinkweb-agency-child-theme' ),
				'section'			=> 'thinkweb-agency-login-page-logo-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 950,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_login_logo_bottom_padding', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_login_logo_bottom_padding', array(
				'label'	      => esc_html__( 'Logo Buttom Padding', 'thinkweb-agency-child-theme' ),
				'section'			=> 'thinkweb-agency-login-page-logo-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1
				),
			) ) );
			
			/**
			 * Background
			 */
			$wp_customize->add_setting( 'thinkweb_agency_login_page_bg_img', array(
        'type' => 'option',
				'capability'  => 'edit_theme_options'
			) );

			$wp_customize->add_control( 
				new WP_Customize_Image_Control(
					$wp_customize, 
					'thinkweb_agency_login_page_bg_img', 
					array(
						'label'		=> esc_html__( 'Upload a Background Image', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-bg-section',
            'settings'   => 'thinkweb_agency_login_page_bg_img',
           )
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_bg_color', array(
				'default'       => '#fff',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_bg_color', 
					array(
						'label'		=> esc_html__( 'Background Color', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-bg-section',
					)
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_bg_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'thinkweb_agency_login_page_bg_size', 
					array(
					'label'	      => esc_html__( 'Backgorund Size', 'thinkweb-agency-child-theme' ),
					'section'			=> 'thinkweb-agency-login-page-bg-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					),
			) ) );

			/**
			 * Login Form
			 */
			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_width', array(
				'default'       => '320',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_width', 
					array(
					'label'	      => esc_html__( 'Login Form Width', 'thinkweb-agency-child-theme' ),
					'section'			=> 'thinkweb-agency-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 750,
						'step' => 1
					),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_bg_img', array(
				'default'       => '',
        'type' => 'option',
				'capability'  => 'edit_theme_options'
			) );

			$wp_customize->add_control( 
				new WP_Customize_Image_Control(
					$wp_customize, 
					'thinkweb_agency_login_page_form_bg_img', 
					array(
						'label'		=> esc_html__( 'Upload a Background Image', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-form-section',
            'settings'   => 'thinkweb_agency_login_page_form_bg_img',
           )
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_bg_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_bg_color', 
					array(
						'label'		=> esc_html__( 'Background Color', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-form-section',
					)
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_height', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_height', 
					array(
					'label'	      => esc_html__( 'Login Form Height', 'thinkweb-agency-child-theme' ),
					'section'			=> 'thinkweb-agency-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 450,
						'step' => 1
					),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_padding', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_padding', 
					array(
					'label'	      => esc_html__( 'Login Form Padding', 'thinkweb-agency-child-theme' ),
					'section'			=> 'thinkweb-agency-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					),
			) ) );

			/**
			 * Input box
			 */
			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_input_bg', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_input_bg', 
					array(
						'label'		=> esc_html__( 'Input Background Color', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-form-section',
					)
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_input_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_input_color', 
					array(
						'label'		=> esc_html__( 'Input Text Color', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-form-section',
					)
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_input_height', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_input_height', 
					array(
					'label'	      => esc_html__( 'Input Height', 'thinkweb-agency-child-theme' ),
					'section'			=> 'thinkweb-agency-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 250,
						'step' => 1
					),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_input_margin', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_input_margin', 
					array(
					'label'	      => esc_html__( 'Input Margin', 'thinkweb-agency-child-theme' ),
					'section'			=> 'thinkweb-agency-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 250,
						'step' => 1
					),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_login_page_form_label_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_form_label_color', 
					array(
						'label'		=> esc_html__( 'Label Text Color', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-form-section',
					)
				)
			);

			// Button 
			$wp_customize->add_setting( 'thinkweb_agency_login_page_button_bg', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_button_bg', 
					array(
						'label'		=> esc_html__( 'Button Backgorund', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-button-section',
					)
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_button_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_button_color', 
					array(
						'label'		=> esc_html__( 'Button Text Color', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-button-section',
					)
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_button_border_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control(
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_button_border_color', 
					array(
						'label'		=> esc_html__( 'Button Border Color', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-button-section',
					)
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_login_page_button_box_shadow_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'thinkweb_agency_login_page_button_box_shadow_color', 
					array(
						'label'		=> esc_html__( 'Button Text Shadow Color', 'thinkweb-agency-child-theme' ),
						'section'	=> 'thinkweb-agency-login-page-button-section',
					)
				)
			); 
		}

		public function thinkweb_agency_lpc_style(){
			$lpc_logo_url = get_option('thinkweb_agency_login_page_logo');
			$lpc_logo_width = get_option('thinkweb_agency_login_logo_width');
			$lpc_logo_height = get_option('thinkweb_agency_login_logo_height');
			$lpc_logo_padding = get_option('thinkweb_agency_login_logo_bottom_padding');

			$lpc_bg_img = get_option('thinkweb_agency_login_page_bg_img');
			$lpc_bg_color = get_option('thinkweb_agency_login_page_bg_color');
			$lpc_bg_size = get_option('thinkweb_agency_login_page_bg_size');

			$lpc_form_width = get_option('thinkweb_agency_login_page_form_width');
			$lpc_form_bg_img = get_option('thinkweb_agency_login_page_form_bg_img');
			$lpc_form_bg_color = get_option('thinkweb_agency_login_page_form_bg_color');
			$lpc_form_height = get_option('thinkweb_agency_login_page_form_height');
			$lpc_form_padding = get_option('thinkweb_agency_login_page_form_padding');

			$lpc_form_input_bg = get_option('thinkweb_agency_login_page_form_input_bg');
			$lpc_form_input_color = get_option('thinkweb_agency_login_page_form_input_color');
			$lpc_form_input_height = get_option('thinkweb_agency_login_page_form_input_height');
			$lpc_form_input_margin = get_option('thinkweb_agency_login_page_form_input_margin');

			$lpc_form_label_color = get_option('thinkweb_agency_login_page_form_label_color');

			$lpc_button_bg = get_option('thinkweb_agency_login_page_button_bg');
			$lpc_button_color = get_option('thinkweb_agency_login_page_button_color');
			$lpc_border_color = get_option('thinkweb_agency_login_page_button_border_color');
			$lpc_box_shadow_color = get_option('thinkweb_agency_login_page_button_box_shadow_color');
			?>
			<style type="text/css">

				body.login {

					<?php if( !empty( $lpc_bg_img )) : ?>
						background-image: url(<?php echo $lpc_bg_img; ?>) !important; 
					<?php endif; ?>

					<?php if( !empty( $lpc_bg_color )) : ?>
	    			background-color: <?php echo $lpc_bg_color ?> !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_bg_size )) : ?>
	   				background-size: <?php echo $lpc_bg_size ?>px !important;
					<?php endif; ?>

	    	}

				body.login #login h1 a {

					<?php if( !empty( $lpc_logo_url )) : ?>
						background-image: url(<?php echo $lpc_logo_url; ?>) !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_logo_width ) ) : ?>
						width: <?php echo $lpc_logo_width; ?>px !important;
	   				background-size: <?php echo $lpc_logo_width; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_logo_height ) ) : ?>
						height: <?php echo $lpc_logo_height; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_logo_padding ) ) : ?>
						padding-bottom: <?php echo $lpc_logo_padding; ?>px !important;
					<?php endif; ?>

				}

				#login {
					<?php if( !empty( $lpc_form_width )) : ?>
	    			width: <?php echo $lpc_form_width; ?>px !important;
					<?php endif; ?>
				}

				#loginform {

					<?php if( !empty( $lpc_form_bg_img )) : ?>
						background-image: url(<?php echo $lpc_form_bg_img; ?>) !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_form_bg_color )) : ?>
						background-color: <?php echo $lpc_form_bg_color; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_form_height )) : ?>
						height: <?php echo $lpc_form_height; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_form_padding )) : ?>
						padding: <?php echo $lpc_form_padding; ?>px !important;
					<?php endif; ?>

				}

				.login form .input,
				.login input[type="text"] {

					<?php if( !empty( $lpc_form_input_bg )) : ?>
					 background: <?php echo $lpc_form_input_bg; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_form_input_color )) : ?>
					 color: <?php echo $lpc_form_input_color; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_form_input_height )) : ?>
					 height: <?php echo $lpc_form_input_height; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $lpc_form_input_margin )) : ?>
					 margin: <?php echo $lpc_form_input_margin; ?>px !important;
					<?php endif; ?>

				}

				.login label {
					<?php if( !empty( $lpc_form_label_color )) : ?>
				  	color: <?php echo $lpc_form_label_color; ?> !important;
					<?php endif; ?>
				}
				
				.wp-core-ui .button-primary {

					<?php if( !empty(  $lpc_button_bg )) : ?>
						background: <?php echo $lpc_button_bg; ?> !important;
					<?php endif; ?>

					<?php if( !empty(  $lpc_border_color )) : ?>
	    			border-color: <?php echo lpc_border_color; ?> !important;
					<?php endif; ?>

					<?php if( !empty(  $lpc_border_color )) : ?>
	    			box-shadow: 0px 1px 0px <?php echo $lpc_border_color; ?> inset, 0px 1px 0px rgba(0, 0, 0, 0.15);
					<?php endif; ?>

					<?php if( !empty(  $lpc_button_color )) : ?>
	    			color: <?php echo $lpc_button_color ?> !important;
					<?php endif; ?>

				}
			</style>
			<?php
		}

	}

	Login_Page_Customizer::get_instance();
}
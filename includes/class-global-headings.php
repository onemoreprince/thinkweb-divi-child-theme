<?php
/**
 * Global Headings Style
 */

if ( ! class_exists( 'Divi_Global_Headings_Style' ) ) {

	class Divi_Global_Headings_Style {

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
			add_action( 'customize_register', array( $this, 'thinkweb_agency_headings_customize_register' ) );
			add_action( 'wp_head', array($this, 'thinkweb_agency_headings_style'), 9999 );
			add_action( 'customize_preview_init', array( $this, 'preview_init' ), 99999 );
			add_action( 'admin_menu', array($this, 'thinkweb_agency_ghc_admin_link'), 99 );
		}

		public function thinkweb_agency_ghc_admin_link() {

			$home_url = esc_url( home_url() );

			$url = add_query_arg(
				array(
					'et_customizer_option_set' => 'theme',
					'autofocus[panel]' => 'thinkweb-agency-headings',
					'url' => rawurlencode( $home_url ),
				),

				admin_url( 'customize.php' )
			);

			add_submenu_page( 
				'et_divi_options', 
				esc_html__( 'Global Headings', 'thinkweb-agency-child-theme' ), 
				esc_html__( 'Global Headings', 'thinkweb-agency-child-theme' ), 
				'manage_options', 
				$url
			);
		}

		public function thinkweb_agency_headings_customize_register( $wp_customize ) {
			/**
			 * Panel
			 */
			$wp_customize->add_panel(
				'thinkweb-agency-headings', array(
					'priority' => 5,
					'title' => __( 'Global Headings (H1 - H6)', 'thinkweb-agency-child-theme' ),
				)
			);

			/**
			 * Sections
			 */
			$wp_customize->add_section(
				'thinkweb-agency-h1-section', array(
					'title'    => __( 'Heading( H1 )', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-headings',
				)
			);

			$wp_customize->add_section(
				'thinkweb-agency-h2-section', array(
					'title'    => __( 'Heading( H2 )', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-headings',
				)
			);

			$wp_customize->add_section(
				'thinkweb-agency-h3-section', array(
					'title'    => __( 'Heading( H3 )', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-headings',
				)
			);

			$wp_customize->add_section(
				'thinkweb-agency-h4-section', array(
					'title'    => __( 'Heading( H4 )', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-headings',
				)
			);

			$wp_customize->add_section(
				'thinkweb-agency-h5-section', array(
					'title'    => __( 'Heading( H5 )', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-headings',
				)
			);

			$wp_customize->add_section(
				'thinkweb-agency-h6-section', array(
					'title'    => __( 'Heading( H6 )', 'thinkweb-agency-child-theme' ),
					'panel'    => 'thinkweb-agency-headings',
				)
			);

			/**
			 * Settings & Control for H1
			 */
			$wp_customize->add_setting( 'thinkweb_agency_h1_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h1_font_size', array(
				'label'	      => esc_html__( 'H1 Text Size', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h1-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h1_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h1_line_height', array(
				'label'	      => esc_html__( 'H1 Line Height', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h1-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h1_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h1_spacing', array(
				'label'	      => esc_html__( 'H1 Letter Spacing', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h1-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h1_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'thinkweb_agency_h1_style', array(
				'label'	      => esc_html__( 'H1 Font Style', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h1-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h1_weight', array(
				'default'       => '500',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage'
			) );

			$wp_customize->add_control(
				'thinkweb_agency_h1_weight', array(
					'type'		=> 'select',
					'section'     => 'thinkweb-agency-h1-section',
					'label'		=> __( 'H1 Font Weight', 'thinkweb-agency-child-theme' ),
					'choices'	=> array(
						'100'	=> __( '100', 'thinkweb-agency-child-theme' ),
						'200'	=> __( '200', 'thinkweb-agency-child-theme' ),
						'300'	=> __( '300', 'thinkweb-agency-child-theme' ),
						'400'	=> __( '400', 'thinkweb-agency-child-theme' ),
						'500'	=> __( '500', 'thinkweb-agency-child-theme' ),
						'600'	=> __( '600', 'thinkweb-agency-child-theme' ),
						'700'	=> __( '700', 'thinkweb-agency-child-theme' ),
						'800'	=> __( '800', 'thinkweb-agency-child-theme' ),
						'900'	=> __( '900', 'thinkweb-agency-child-theme' )
					),
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_h1_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'thinkweb_agency_h1_color', array(
				'label'		=> esc_html__( 'H1 Text Color', 'thinkweb-agency-child-theme' ),
				'section'	=> 'thinkweb-agency-h1-section',
				'settings'	=> 'thinkweb_agency_h1_color',
			) ) );

			/**
			 * Settings & Control for H2
			 */
			$wp_customize->add_setting( 'thinkweb_agency_h2_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h2_font_size', array(
				'label'	      => esc_html__( 'H2 Text Size', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h2-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h2_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h2_line_height', array(
				'label'	      => esc_html__( 'H2 Line Height', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h2-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h2_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h2_spacing', array(
				'label'	      => esc_html__( 'H2 Letter Spacing', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h2-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h2_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'thinkweb_agency_h2_style', array(
				'label'	      => esc_html__( 'H2 Font Style', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h2-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h2_weight', array(
				'default'       => '500',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage'
			) );

			$wp_customize->add_control(
				'thinkweb_agency_h2_weight', array(
					'type'		=> 'select',
					'section'     => 'thinkweb-agency-h2-section',
					'label'		=> __( 'H2 Font Weight', 'thinkweb-agency-child-theme' ),
					'choices'	=> array(
						'100'	=> __( '100', 'thinkweb-agency-child-theme' ),
						'200'	=> __( '200', 'thinkweb-agency-child-theme' ),
						'300'	=> __( '300', 'thinkweb-agency-child-theme' ),
						'400'	=> __( '400', 'thinkweb-agency-child-theme' ),
						'500'	=> __( '500', 'thinkweb-agency-child-theme' ),
						'600'	=> __( '600', 'thinkweb-agency-child-theme' ),
						'700'	=> __( '700', 'thinkweb-agency-child-theme' ),
						'800'	=> __( '800', 'thinkweb-agency-child-theme' ),
						'900'	=> __( '900', 'thinkweb-agency-child-theme' )
					),
				)
			);

			$wp_customize->add_setting( 'thinkweb_agency_h2_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'thinkweb_agency_h2_color', array(
				'label'		=> esc_html__( 'H2 Text Color', 'thinkweb-agency-child-theme' ),
				'section'	=> 'thinkweb-agency-h2-section',
				'settings'	=> 'thinkweb_agency_h2_color',
			) ) );

			/**
			 * Settings & Control for H3
			 */
			$wp_customize->add_setting( 'thinkweb_agency_h3_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h3_font_size', array(
				'label'	      => esc_html__( 'H3 Text Size', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h3-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h3_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h3_line_height', array(
				'label'	      => esc_html__( 'H3 Line Height', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h3-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h3_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h3_spacing', array(
				'label'	      => esc_html__( 'H3 Letter Spacing', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h3-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h3_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'thinkweb_agency_h3_style', array(
				'label'	      => esc_html__( 'H3 Font Style', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h3-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h3_weight', array(
					'default'       => '500',
					'type'          => 'option',
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage'
				) );

				$wp_customize->add_control(
					'thinkweb_agency_h3_weight', array(
						'type'		=> 'select',
						'section'     => 'thinkweb-agency-h3-section',
						'label'		=> __( 'H3 Font Weight', 'thinkweb-agency-child-theme' ),
						'choices'	=> array(
							'100'	=> __( '100', 'thinkweb-agency-child-theme' ),
							'200'	=> __( '200', 'thinkweb-agency-child-theme' ),
							'300'	=> __( '300', 'thinkweb-agency-child-theme' ),
							'400'	=> __( '400', 'thinkweb-agency-child-theme' ),
							'500'	=> __( '500', 'thinkweb-agency-child-theme' ),
							'600'	=> __( '600', 'thinkweb-agency-child-theme' ),
							'700'	=> __( '700', 'thinkweb-agency-child-theme' ),
							'800'	=> __( '800', 'thinkweb-agency-child-theme' ),
							'900'	=> __( '900', 'thinkweb-agency-child-theme' )
						),
					)
				);

			$wp_customize->add_setting( 'thinkweb_agency_h3_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'thinkweb_agency_h3_color', array(
				'label'		=> esc_html__( 'H3 Text Color', 'thinkweb-agency-child-theme' ),
				'section'	=> 'thinkweb-agency-h3-section',
				'settings'	=> 'thinkweb_agency_h3_color',
			) ) );

			/**
			 * Settings & Control for H4
			 */
			$wp_customize->add_setting( 'thinkweb_agency_h4_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h4_font_size', array(
				'label'	      => esc_html__( 'H4 Text Size', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h4-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h4_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h4_line_height', array(
				'label'	      => esc_html__( 'H4 Line Height', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h4-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h4_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h4_spacing', array(
				'label'	      => esc_html__( 'H4 Letter Spacing', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h4-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h4_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'thinkweb_agency_h4_style', array(
				'label'	      => esc_html__( 'H4 Font Style', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h4-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h4_weight', array(
					'default'       => '500',
					'type'          => 'option',
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage'
				) );

				$wp_customize->add_control(
					'thinkweb_agency_h4_weight', array(
						'type'		=> 'select',
						'section'     => 'thinkweb-agency-h4-section',
						'label'		=> __( 'H4 Font Weight', 'thinkweb-agency-child-theme' ),
						'choices'	=> array(
							'100'	=> __( '100', 'thinkweb-agency-child-theme' ),
							'200'	=> __( '200', 'thinkweb-agency-child-theme' ),
							'300'	=> __( '300', 'thinkweb-agency-child-theme' ),
							'400'	=> __( '400', 'thinkweb-agency-child-theme' ),
							'500'	=> __( '500', 'thinkweb-agency-child-theme' ),
							'600'	=> __( '600', 'thinkweb-agency-child-theme' ),
							'700'	=> __( '700', 'thinkweb-agency-child-theme' ),
							'800'	=> __( '800', 'thinkweb-agency-child-theme' ),
							'900'	=> __( '900', 'thinkweb-agency-child-theme' )
						),
					)
				);

			$wp_customize->add_setting( 'thinkweb_agency_h4_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'thinkweb_agency_h4_color', array(
				'label'		=> esc_html__( 'H4 Text Color', 'thinkweb-agency-child-theme' ),
				'section'	=> 'thinkweb-agency-h4-section',
				'settings'	=> 'thinkweb_agency_h4_color',
			) ) );

			/**
			 * Settings & Control for H5
			 */
			$wp_customize->add_setting( 'thinkweb_agency_h5_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h5_font_size', array(
				'label'	      => esc_html__( 'H5 Text Size', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h5-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h5_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h5_line_height', array(
				'label'	      => esc_html__( 'H5 Line Height', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h5-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h5_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h5_spacing', array(
				'label'	      => esc_html__( 'H5 Letter Spacing', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h5-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h5_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'thinkweb_agency_h5_style', array(
				'label'	      => esc_html__( 'H5 Font Style', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h5-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h5_weight', array(
					'default'       => '500',
					'type'          => 'option',
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage'
				) );

				$wp_customize->add_control(
					'thinkweb_agency_h5_weight', array(
						'type'		=> 'select',
						'section'     => 'thinkweb-agency-h5-section',
						'label'		=> __( 'H5 Font Weight', 'thinkweb-agency-child-theme' ),
						'choices'	=> array(
							'100'	=> __( '100', 'thinkweb-agency-child-theme' ),
							'200'	=> __( '200', 'thinkweb-agency-child-theme' ),
							'300'	=> __( '300', 'thinkweb-agency-child-theme' ),
							'400'	=> __( '400', 'thinkweb-agency-child-theme' ),
							'500'	=> __( '500', 'thinkweb-agency-child-theme' ),
							'600'	=> __( '600', 'thinkweb-agency-child-theme' ),
							'700'	=> __( '700', 'thinkweb-agency-child-theme' ),
							'800'	=> __( '800', 'thinkweb-agency-child-theme' ),
							'900'	=> __( '900', 'thinkweb-agency-child-theme' )
						),
					)
				);

			$wp_customize->add_setting( 'thinkweb_agency_h5_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'thinkweb_agency_h5_color', array(
				'label'		=> esc_html__( 'H5 Text Color', 'thinkweb-agency-child-theme' ),
				'section'	=> 'thinkweb-agency-h5-section',
				'settings'	=> 'thinkweb_agency_h5_color',
			) ) );

			/**
			 * Settings & Control for H6
			 */
			$wp_customize->add_setting( 'thinkweb_agency_h6_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h6_font_size', array(
				'label'	      => esc_html__( 'H6 Text Size', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h6-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h6_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h6_line_height', array(
				'label'	      => esc_html__( 'H6 Line Height', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h6-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h6_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'thinkweb_agency_h6_spacing', array(
				'label'	      => esc_html__( 'H6 Letter Spacing', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h6-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h6_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'thinkweb_agency_h6_style', array(
				'label'	      => esc_html__( 'H6 Font Style', 'thinkweb-agency-child-theme' ),
				'section'     => 'thinkweb-agency-h6-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'thinkweb_agency_h6_weight', array(
					'default'       => '500',
					'type'          => 'option',
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage'
				) );

				$wp_customize->add_control(
					'thinkweb_agency_h6_weight', array(
						'type'		=> 'select',
						'section'     => 'thinkweb-agency-h6-section',
						'label'		=> __( 'H6 Font Weight', 'thinkweb-agency-child-theme' ),
						'choices'	=> array(
							'100'	=> __( '100', 'thinkweb-agency-child-theme' ),
							'200'	=> __( '200', 'thinkweb-agency-child-theme' ),
							'300'	=> __( '300', 'thinkweb-agency-child-theme' ),
							'400'	=> __( '400', 'thinkweb-agency-child-theme' ),
							'500'	=> __( '500', 'thinkweb-agency-child-theme' ),
							'600'	=> __( '600', 'thinkweb-agency-child-theme' ),
							'700'	=> __( '700', 'thinkweb-agency-child-theme' ),
							'800'	=> __( '800', 'thinkweb-agency-child-theme' ),
							'900'	=> __( '900', 'thinkweb-agency-child-theme' )
						),
					)
				);

			$wp_customize->add_setting( 'thinkweb_agency_h6_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'thinkweb_agency_h6_color', array(
				'label'		=> esc_html__( 'H6 Text Color', 'thinkweb-agency-child-theme' ),
				'section'	=> 'thinkweb-agency-h6-section',
				'settings'	=> 'thinkweb_agency_h6_color',
			) ) );

		}

		public function thinkweb_agency_headings_style() {
			
			/**
			 * H1
			 */
			$thinkweb_agency_h1_font_size 	 =   get_option('thinkweb_agency_h1_font_size');
			$thinkweb_agency_h1_line_height  =   get_option('thinkweb_agency_h1_line_height');
			$thinkweb_agency_h1_spacing 		 =   get_option('thinkweb_agency_h1_spacing');

			$thinkweb_agency_h1_style 			 =   get_option('thinkweb_agency_h1_style');
			$thinkweb_agency_h1_style 	 		 =   explode("|", $thinkweb_agency_h1_style );

			if ( ! isset( $thinkweb_agency_h1_style[0] )) {
				$thinkweb_agency_h1_style[0] = null;
			}

			if ( ! isset( $thinkweb_agency_h1_style[1] )) {
				$thinkweb_agency_h1_style[1] = null;
			}

			if ( ! isset( $thinkweb_agency_h1_style[2] )) {
				$thinkweb_agency_h1_style[2] = null;
			}

			if ( ! isset( $thinkweb_agency_h1_style[3] )) {
				$thinkweb_agency_h1_style[3] = null;
			}

			$thinkweb_agency_h1_weight 			 =   get_option('thinkweb_agency_h1_weight');
			$thinkweb_agency_h1_color 			 =   get_option('thinkweb_agency_h1_color');
			
			/**
			 * H2
			 */
			$thinkweb_agency_h2_font_size 	 =   get_option('thinkweb_agency_h2_font_size');
			$thinkweb_agency_h2_line_height  =   get_option('thinkweb_agency_h2_line_height');
			$thinkweb_agency_h2_spacing 		 =   get_option('thinkweb_agency_h2_spacing');

			$thinkweb_agency_h2_style 			 =   get_option('thinkweb_agency_h2_style');
			$thinkweb_agency_h2_style 	 		 =   explode("|", $thinkweb_agency_h2_style );

			if ( ! isset( $thinkweb_agency_h2_style[0] )) {
				$thinkweb_agency_h2_style[0] = null;
			}

			if ( ! isset( $thinkweb_agency_h2_style[1] )) {
				$thinkweb_agency_h2_style[1] = null;
			}

			if ( ! isset( $thinkweb_agency_h2_style[2] )) {
				$thinkweb_agency_h2_style[2] = null;
			}

			if ( ! isset( $thinkweb_agency_h2_style[3] )) {
				$thinkweb_agency_h2_style[3] = null;
			}

			$thinkweb_agency_h2_weight 			 =   get_option('thinkweb_agency_h2_weight');
			$thinkweb_agency_h2_color 			 =   get_option('thinkweb_agency_h2_color');
			
			/**
			 * H3
			 */
			$thinkweb_agency_h3_font_size 	 =   get_option('thinkweb_agency_h3_font_size');
			$thinkweb_agency_h3_line_height  =   get_option('thinkweb_agency_h3_line_height');
			$thinkweb_agency_h3_spacing 		 =   get_option('thinkweb_agency_h3_spacing');

			$thinkweb_agency_h3_style 			 =   get_option('thinkweb_agency_h3_style');
			$thinkweb_agency_h3_style 	 		 =   explode("|", $thinkweb_agency_h3_style );

			if ( ! isset( $thinkweb_agency_h3_style[0] )) {
				$thinkweb_agency_h3_style[0] = null;
			}

			if ( ! isset( $thinkweb_agency_h3_style[1] )) {
				$thinkweb_agency_h3_style[1] = null;
			}

			if ( ! isset( $thinkweb_agency_h3_style[2] )) {
				$thinkweb_agency_h3_style[2] = null;
			}

			if ( ! isset( $thinkweb_agency_h3_style[3] )) {
				$thinkweb_agency_h3_style[3] = null;
			}

			$thinkweb_agency_h3_weight 			 =   get_option('thinkweb_agency_h3_weight');
			$thinkweb_agency_h3_color 			 =   get_option('thinkweb_agency_h3_color');

			/**
			 * H4
			 */
			$thinkweb_agency_h4_font_size 	 =   get_option('thinkweb_agency_h4_font_size');
			$thinkweb_agency_h4_line_height  =   get_option('thinkweb_agency_h4_line_height');
			$thinkweb_agency_h4_spacing 		 =   get_option('thinkweb_agency_h4_spacing');

			$thinkweb_agency_h4_style 			 =   get_option('thinkweb_agency_h4_style');
			$thinkweb_agency_h4_style 	 		 =   explode("|", $thinkweb_agency_h4_style );

			if ( ! isset( $thinkweb_agency_h4_style[0] )) {
				$thinkweb_agency_h4_style[0] = null;
			}

			if ( ! isset( $thinkweb_agency_h4_style[1] )) {
				$thinkweb_agency_h4_style[1] = null;
			}

			if ( ! isset( $thinkweb_agency_h4_style[2] )) {
				$thinkweb_agency_h4_style[2] = null;
			}

			if ( ! isset( $thinkweb_agency_h4_style[3] )) {
				$thinkweb_agency_h4_style[3] = null;
			}

			$thinkweb_agency_h4_weight 			 =   get_option('thinkweb_agency_h4_weight');
			$thinkweb_agency_h4_color 			 =   get_option('thinkweb_agency_h4_color');

			/**
			 * H5
			 */
			$thinkweb_agency_h5_font_size 	 =   get_option('thinkweb_agency_h5_font_size');
			$thinkweb_agency_h5_line_height  =   get_option('thinkweb_agency_h5_line_height');
			$thinkweb_agency_h5_spacing 		 =   get_option('thinkweb_agency_h5_spacing');

			$thinkweb_agency_h5_style 			 =   get_option('thinkweb_agency_h5_style');
			$thinkweb_agency_h5_style 	 		 =   explode("|", $thinkweb_agency_h5_style );

			if ( ! isset( $thinkweb_agency_h5_style[0] )) {
				$thinkweb_agency_h5_style[0] = null;
			}

			if ( ! isset( $thinkweb_agency_h5_style[1] )) {
				$thinkweb_agency_h5_style[1] = null;
			}

			if ( ! isset( $thinkweb_agency_h5_style[2] )) {
				$thinkweb_agency_h5_style[2] = null;
			}

			if ( ! isset( $thinkweb_agency_h5_style[3] )) {
				$thinkweb_agency_h5_style[3] = null;
			}

			$thinkweb_agency_h5_weight 			 =   get_option('thinkweb_agency_h5_weight');
			$thinkweb_agency_h5_color 			 =   get_option('thinkweb_agency_h5_color');

			/**
			 * H6
			 */
			$thinkweb_agency_h6_font_size 	 =   get_option('thinkweb_agency_h6_font_size');
			$thinkweb_agency_h6_line_height  =   get_option('thinkweb_agency_h6_line_height');
			$thinkweb_agency_h6_spacing 		 =   get_option('thinkweb_agency_h6_spacing');

			$thinkweb_agency_h6_style 			 =   get_option('thinkweb_agency_h6_style');
			$thinkweb_agency_h6_style 	 		 =   explode("|", $thinkweb_agency_h6_style );

			if ( ! isset( $thinkweb_agency_h6_style[0] )) {
				$thinkweb_agency_h6_style[0] = null;
			}

			if ( ! isset( $thinkweb_agency_h6_style[1] )) {
				$thinkweb_agency_h6_style[1] = null;
			}

			if ( ! isset( $thinkweb_agency_h6_style[2] )) {
				$thinkweb_agency_h6_style[2] = null;
			}

			if ( ! isset( $thinkweb_agency_h6_style[3] )) {
				$thinkweb_agency_h6_style[3] = null;
			}

			$thinkweb_agency_h6_weight 			 =   get_option('thinkweb_agency_h6_weight');
			$thinkweb_agency_h6_color 			 =   get_option('thinkweb_agency_h6_color');

		?>

			<style type="text/css">

				h1 {
					<?php if( !empty( $thinkweb_agency_h1_font_size )) : ?>
					font-size: <?php echo $thinkweb_agency_h1_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h1_line_height )) : ?>
					line-height: <?php echo $thinkweb_agency_h1_line_height; ?>em !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h1_spacing )) : ?>
					letter-spacing: <?php echo $thinkweb_agency_h1_spacing; ?>px !important;
					<?php endif; ?>

					<?php foreach( $thinkweb_agency_h1_style as $h1_style ) : ?>
					
						<?php if( $h1_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h1_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h1_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h1_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>

					<?php endforeach; ?>

					<?php if( !empty( $thinkweb_agency_h1_weight )) : ?>
					font-weight: <?php echo $thinkweb_agency_h1_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h1_color )) : ?>
					color: <?php echo $thinkweb_agency_h1_color; ?> !important;
					<?php endif; ?>

				}

				h2 {
					<?php if( !empty( $thinkweb_agency_h2_font_size )) : ?>
					font-size: <?php echo $thinkweb_agency_h2_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h2_line_height )) : ?>
					line-height: <?php echo $thinkweb_agency_h2_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h2_spacing )) : ?>
					letter-spacing: <?php echo $thinkweb_agency_h2_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $thinkweb_agency_h2_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $thinkweb_agency_h2_weight )) : ?>
					font-weight: <?php echo $thinkweb_agency_h2_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h2_color )) : ?>
					color: <?php echo $thinkweb_agency_h2_color; ?> !important;
					<?php endif; ?>
				}

				h3 {
					<?php if( !empty( $thinkweb_agency_h3_font_size )) : ?>
					font-size: <?php echo $thinkweb_agency_h3_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h3_line_height )) : ?>
					line-height: <?php echo $thinkweb_agency_h3_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h3_spacing )) : ?>
					letter-spacing: <?php echo $thinkweb_agency_h3_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $thinkweb_agency_h3_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $thinkweb_agency_h3_weight )) : ?>
					font-weight: <?php echo $thinkweb_agency_h3_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h3_color )) : ?>
					color: <?php echo $thinkweb_agency_h3_color; ?> !important;
					<?php endif; ?>
				}
				
				h4 {
					<?php if( !empty( $thinkweb_agency_h4_font_size )) : ?>
					font-size: <?php echo $thinkweb_agency_h4_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h4_line_height )) : ?>
					line-height: <?php echo $thinkweb_agency_h4_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h4_spacing )) : ?>
					letter-spacing: <?php echo $thinkweb_agency_h4_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $thinkweb_agency_h4_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $thinkweb_agency_h4_weight )) : ?>
					font-weight: <?php echo $thinkweb_agency_h4_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h4_color )) : ?>
					color: <?php echo $thinkweb_agency_h4_color; ?> !important;
					<?php endif; ?>
				}

				h5 {
					<?php if( !empty( $thinkweb_agency_h5_font_size )) : ?>
					font-size: <?php echo $thinkweb_agency_h5_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h5_line_height )) : ?>
					line-height: <?php echo $thinkweb_agency_h5_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h5_spacing )) : ?>
					letter-spacing: <?php echo $thinkweb_agency_h5_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $thinkweb_agency_h5_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $thinkweb_agency_h5_weight )) : ?>
					font-weight: <?php echo $thinkweb_agency_h5_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h5_color )) : ?>
					color: <?php echo $thinkweb_agency_h5_color; ?> !important;
					<?php endif; ?>
				}

				h6 {
					<?php if( !empty( $thinkweb_agency_h6_font_size )) : ?>
					font-size: <?php echo $thinkweb_agency_h6_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h6_line_height )) : ?>
					line-height: <?php echo $thinkweb_agency_h6_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h6_spacing )) : ?>
					letter-spacing: <?php echo $thinkweb_agency_h6_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $thinkweb_agency_h6_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $thinkweb_agency_h6_weight )) : ?>
					font-weight: <?php echo $thinkweb_agency_h6_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $thinkweb_agency_h6_color )) : ?>
					color: <?php echo $thinkweb_agency_h6_color; ?> !important;
					<?php endif; ?>
				}
				
			</style>

		<?php	}

		public function preview_init() {
			wp_enqueue_script( 
				'thinkweb-agency-headings-customizer-preview-js', 
				get_stylesheet_directory_uri() . '/js/headings-customizer-preview.js', 
				array( 'customize-preview' ),
				'1.0.0', 
				null
			);
		}

	}

	Divi_Global_Headings_Style::get_instance();

}
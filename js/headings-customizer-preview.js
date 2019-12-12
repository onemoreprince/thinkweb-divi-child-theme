function thinkweb_agency_css_font_size( control, selector ) {

	wp.customize( control, function( value ) {
		value.bind( function( size ) {

			if ( size ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var fontSize = 'font-size: ' + size + 'px';

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + fontSize + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

thinkweb_agency_css_font_size('thinkweb_agency_h1_font_size', 'h1');
thinkweb_agency_css_font_size('thinkweb_agency_h2_font_size', 'h2');
thinkweb_agency_css_font_size('thinkweb_agency_h3_font_size', 'h3');
thinkweb_agency_css_font_size('thinkweb_agency_h4_font_size', 'h4');
thinkweb_agency_css_font_size('thinkweb_agency_h5_font_size', 'h5');
thinkweb_agency_css_font_size('thinkweb_agency_h6_font_size', 'h6');

function thinkweb_agency_css_line_height( control, selector ) {

	wp.customize( control, function( value ) {
		value.bind( function( height ) {

			if ( height ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var lineHeight = 'line-height: ' + height + 'em';

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + lineHeight + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

thinkweb_agency_css_line_height( 'thinkweb_agency_h1_line_height', 'h1' );
thinkweb_agency_css_line_height( 'thinkweb_agency_h2_line_height', 'h2' );
thinkweb_agency_css_line_height( 'thinkweb_agency_h3_line_height', 'h3' );
thinkweb_agency_css_line_height( 'thinkweb_agency_h4_line_height', 'h4' );
thinkweb_agency_css_line_height( 'thinkweb_agency_h5_line_height', 'h5' );
thinkweb_agency_css_line_height( 'thinkweb_agency_h6_line_height', 'h6' );

function thinkweb_agency_css_text_spacing( control, selector ) {
	
	wp.customize( control, function( value ) {
		value.bind( function( spacing ) {

			if ( spacing ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var lineHeight = 'letter-spacing: ' + spacing + 'px';

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + lineHeight + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

thinkweb_agency_css_text_spacing( 'thinkweb_agency_h1_spacing', 'h1' );
thinkweb_agency_css_text_spacing( 'thinkweb_agency_h2_spacing', 'h2' );
thinkweb_agency_css_text_spacing( 'thinkweb_agency_h3_spacing', 'h3' );
thinkweb_agency_css_text_spacing( 'thinkweb_agency_h4_spacing', 'h4' );
thinkweb_agency_css_text_spacing( 'thinkweb_agency_h5_spacing', 'h5' );
thinkweb_agency_css_text_spacing( 'thinkweb_agency_h6_spacing', 'h6' );

function thinkweb_agency_css_font_styles( control, selector ) {
	
	wp.customize( control, function( value ) {

		value.bind( function( styles ) {

			if  (styles ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );

				jQuery( 'style#' + control ).remove();

				var  font_styles = thinkweb_agency_set_font_styles( styles );

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + font_styles + '}'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

thinkweb_agency_css_font_styles( 'thinkweb_agency_h1_style', 'h1' );
thinkweb_agency_css_font_styles( 'thinkweb_agency_h2_style', 'h2' );
thinkweb_agency_css_font_styles( 'thinkweb_agency_h3_style', 'h3' );
thinkweb_agency_css_font_styles( 'thinkweb_agency_h4_style', 'h4' );
thinkweb_agency_css_font_styles( 'thinkweb_agency_h5_style', 'h5' );
thinkweb_agency_css_font_styles( 'thinkweb_agency_h6_style', 'h6' );

function thinkweb_agency_set_font_styles( value ) {
		var font_styles = value.split( '|' ),
			style = '';

		if ( $.inArray( 'bold', font_styles ) >= 0 ) {
			style += 'font-weight: bold !important;';
		} else {
			style += 'font-weight: inherit !important;';
		}

		if ( $.inArray( 'italic', font_styles ) >= 0 ) {
			style += 'font-style: italic !important;';
		} else {
			style += 'font-style: inherit !important;';
		}

		if ( $.inArray( 'underline', font_styles ) >= 0 ) {
			style += 'text-decoration: underline !important;';
		} else {
			style += 'text-decoration: inherit !important;';
		}

		if ( $.inArray( 'uppercase', font_styles ) >= 0 ) {
			style += 'text-transform: uppercase !important;';
		} else {
			style += 'text-transform: inherit !important;';
		}

		return style;
}

function thinkweb_agency_css_font_weight( control, selector ) {
	
	wp.customize( control, function( value ) {
		value.bind( function( weight ) {

			if ( weight ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var fontWeight = 'font-weight: ' + weight;

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + fontWeight + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

thinkweb_agency_css_font_weight( 'thinkweb_agency_h1_weight', 'h1' );
thinkweb_agency_css_font_weight( 'thinkweb_agency_h2_weight', 'h2' );
thinkweb_agency_css_font_weight( 'thinkweb_agency_h3_weight', 'h3' );
thinkweb_agency_css_font_weight( 'thinkweb_agency_h4_weight', 'h4' );
thinkweb_agency_css_font_weight( 'thinkweb_agency_h5_weight', 'h5' );
thinkweb_agency_css_font_weight( 'thinkweb_agency_h6_weight', 'h6' );

function thinkweb_agency_css_heading_color( control, selector ) {
	
	wp.customize( control, function( value ) {
		value.bind( function( color ) {

			if ( color ) {

				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control ).remove();

				var textColor = 'color: ' + color;

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + textColor + ' !important }'
					+ '</style>'
				);

			} else {

				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}

thinkweb_agency_css_heading_color( 'thinkweb_agency_h1_color', 'h1' );
thinkweb_agency_css_heading_color( 'thinkweb_agency_h2_color', 'h2' );
thinkweb_agency_css_heading_color( 'thinkweb_agency_h3_color', 'h3' );
thinkweb_agency_css_heading_color( 'thinkweb_agency_h4_color', 'h4' );
thinkweb_agency_css_heading_color( 'thinkweb_agency_h5_color', 'h5' );
thinkweb_agency_css_heading_color( 'thinkweb_agency_h6_color', 'h6' );
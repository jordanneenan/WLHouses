<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'style' => 'f00c',
			'icon_color'=> '',
			'animation' => '',
			'margin_bottom' => '',
		), $atts ) );

$id = uniqid();
$output = $animation_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

if(substr( $style, 0, 2 ) == 'e6' ) {
	$font_family = 'Pe-icon-line';
} else if(substr( $style, 0, 2 ) == 'e0' ) {
	$font_family = 'Flaticon';
} else if ( substr( $style, 0, 1 ) == 'e' ) {
	$font_family = 'ArtbeesWPTokens';
}  else {
	$font_family = 'FontAwesome';
}

global $mk_accent_color, $mk_settings;

$icon_color = ($icon_color == $mk_settings['accent-color']) ? $mk_accent_color : $icon_color;

$output .= '<div id="list-style-'.$id.'" class="mk-list-styles '.$animation_css.$el_class.'" style="margin-bottom:'.$margin_bottom.'px">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';


// Get global JSON contructor object for styles and create local variable
global $ken_dynamic_styles;
$ken_styles = '';

$ken_styles .= '
#list-style-'.$id.' ul li:before {
    font-family:"'.$font_family.'";
    content: "\\'.$style.'";
    color:'.$icon_color.'
}';

echo $output;


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo '<!-- ' . mk_clean_dynamic_styles($ken_styles) . '-->';
echo '</div>';

// Export styles to json for faster page load
$ken_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $ken_styles
);
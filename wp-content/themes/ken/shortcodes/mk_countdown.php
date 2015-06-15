<?php

extract( shortcode_atts( array(
            'skin' => 'dark',
            'custom_color' => '',
            'date' => '12/24/2015 12:00:00',
            'offset' => '+10',
            'el_class' => '',
        ), $atts ) );


$style_id = uniqid();

// Get global JSON contructor object for styles and create local variable
global $ken_dynamic_styles;
$ken_styles = '';

$ken_styles .= '
#countdown-'.$style_id.' ul li {
	border-color: '.mk_convert_rgba($custom_color, 0.2).';
}
#countdown-'.$style_id.' ul li::before {
	background-color: '.mk_convert_rgba($custom_color, 0.2).';
}
#countdown-'.$style_id.' ul li .countdown-timer {
	color: '.$custom_color.';
}
#countdown-'.$style_id.' ul li .countdown-text {
	color: '.mk_convert_rgba($custom_color, 0.6).';
}';

$output  = '<div id="countdown-'.$style_id.'" class="'.$el_class.' '.$skin.'-skin mk-event-countdown" data-offset="'.$offset.'" data-date="'.$date.'">';
$output .= '<ul>';
$output .= '<li><span class="days countdown-timer">00</span><span class="countdown-text">'.__('Days', 'mk_framework').'</span></li>';
$output .= '<li><span class="hours countdown-timer">00</span><span class="countdown-text">'.__('Hours', 'mk_framework').'</span></li>';
$output .= '<li><span class="minutes countdown-timer">00</span><span class="countdown-text">'.__('Minutes', 'mk_framework').'</span></li>';
$output .= '<li><span class="seconds countdown-timer">00</span><span class="countdown-text">'.__('Seconds', 'mk_framework').'</span></li>';
$output .= '</ul>';
$output .= '</div>';
echo $output;


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$style_id.'" class="mk-dynamic-styles">';
echo '<!-- ' . mk_clean_dynamic_styles($ken_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$ken_dynamic_styles[] = array(
  'id' => 'ajax-'.$style_id ,
  'inject' => $ken_styles
);
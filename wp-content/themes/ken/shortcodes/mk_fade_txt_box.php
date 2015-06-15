<?php 

extract( shortcode_atts( array(
            "animation_speed" => 700,
            "slideshow_speed" => 7000,
            'padding' => 0,
			'el_class' => '',
		), $atts ) );


$output = '';

$style_id = uniqid();

$output .= '<div id="mk-fade-txt-box-' . $style_id . '" data-loop="true" data-autoplayStop="false" data-slidesPerView="1" data-direction="horizontal" data-mousewheelControl="false" data-freeModeFluid="true" data-slideshowSpeed="' . $slideshow_speed . '" data-animationSpeed="' . $animation_speed . '" data-animation="fade" class="mk-fade-txt-box mk-swiper-container mk-swiper-slider ' . $el_class . '">';
$output .= '	<div class="mk-swiper-wrapper">';
$output .= "		\n\t\t\t".wpb_js_remove_wpautop( $content, true );
$output .= '	</div>';
$output .= '</div>';


// Get global JSON contructor object for styles and create local variable
global $ken_dynamic_styles;
$ken_styles = '';

$ken_styles .= '
#mk-fade-txt-box-' . $style_id . ' .swiper-slide { 
  padding: '.$padding.'px 0;
}';

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
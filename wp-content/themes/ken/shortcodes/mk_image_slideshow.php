<?php

extract(shortcode_atts(array(
    "images" => '',
    "image_width" => 770,
    "image_height" => 350,
    "effect" => 'fade',
    "animation_speed" => 700,
    "slideshow_speed" => 7000,
    "direction" => 'horizontal',
    "direction_nav" => "true",
    "pagination" => "false",
    "freeModeFluid" => "true",
    "freeMode" => "false",
    "margin_bottom" => 20,
    'loop' => 'true',
    'resposnive' => 'false',
    "mousewheelControl" => 'false',
    "slideshow_aligment" => 'none',
    "el_class" => ''
), $atts));

require_once THEME_INCLUDES . "/image-cropping.php";    

if ($images == '')
    return null;


$style_id     = uniqid();
$slides = $output = '';
$images = explode(',', $images);
$i      = -1;

foreach ($images as $attach_id) {
    $i++;
    $image_src_array = wp_get_attachment_image_src($attach_id, 'full', true);
    $image_src       = bfi_thumb($image_src_array[0], array(
        'width' => $image_width,
        'height' => $image_height,
        'crop' => true
    ));


    $slides .= '<div class="swiper-slide">';
    $slides .= '<a class="mk-lightbox" href="'.$image_src_array[0].'" rel="slideshow-'.$style_id.'"><img alt="" src="' . mk_thumbnail_image_gen($image_src, $image_width, $image_height) . '" /></a>';
    $slides .= '</div>' . "\n\n";

}

$container_width = ($resposnive != 'true') ? 'max-width:' . $image_width . 'px;' : '';

$output .= '<div class="mk-image-slideshow" id="mk-image-slideshow-' . $style_id . '" style="' . $container_width . 'max-height:' . $image_height . 'px; margin-bottom:'.$margin_bottom.'px; float:'.$slideshow_aligment.';"><div id="mk-swiper-' . $style_id . '" data-loop="true" data-freeModeFluid="' . $freeModeFluid . '" data-slidesPerView="1" data-pagination="' . $pagination . '" data-freeMode="' . $freeMode . '" data-mousewheelControl="false" data-direction="' . $direction . '" data-slideshowSpeed="' . $slideshow_speed . '" data-animationSpeed="' . $animation_speed . '" data-directionNav="' . $direction_nav . '" class="mk-swiper-container mk-swiper-slider ' . $el_class . '">';

$output .= '<div class="mk-swiper-wrapper">' . $slides . '</div>';

if ($direction_nav == 'true') {
    $output .= '<a class="mk-swiper-prev slideshow-swiper-arrows"><i class="mk-theme-icon-prev-big"></i></a>';
    $output .= '<a class="mk-swiper-next slideshow-swiper-arrows"><i class="mk-theme-icon-next-big"></i></a>';
}

if ($pagination == 'true') {
    $output .= '<div class="swiper-pagination"></div>';
}

$output .= '</div></div>';


global $ken_dynamic_styles;
$ken_styles = '';

$ken_styles .= '
        @media handheld, only screen and (max-width:'.$image_width.'px) {
        #mk-image-slideshow-' . $style_id . ' {
            float:none !important;
            }
        }';

// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$style_id.'" class="mk-dynamic-styles">';
echo '<!-- ' . mk_clean_dynamic_styles($ken_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$ken_dynamic_styles[] = array(
  'id' => 'ajax-'.$style_id ,
  'inject' => $ken_styles
);

echo $output;

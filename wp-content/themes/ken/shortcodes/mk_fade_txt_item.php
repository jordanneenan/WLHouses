<?php 

extract( shortcode_atts( array(
      'item_txt' => '',
      'item_text_size' => '',
      'item_color' => '',
      'item_font_weight' => '',
      'item_text_align' => '',
      'el_class' => '',
    ), $atts ) );


$output = '';

$id = uniqid();

$force_responsive = ($item_text_size > 35) ? ' mk-force-responsive' : '';

$output .= '<div id="mk-fade-txt-item-'.$id.'" class="swiper-slide'. $force_responsive .'">
        		  '.$item_txt.'
            </div>';

// Get global JSON contructor object for styles and create local variable
global $ken_dynamic_styles;
$ken_styles = '';
  
$ken_styles .= '
#mk-fade-txt-item-'.$id.' { 
  font-size:'.$item_text_size.'px;
  color: '.$item_color.';
  font-weight: '.$item_font_weight.';
  text-align: '.$item_text_align.';
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
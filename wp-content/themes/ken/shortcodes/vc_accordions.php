<?php
global $mk_settings;
$el_class = $output = '';

extract( shortcode_atts( array(
            'container_bg_color' => '',
            'style' => 'simple',
            'open_toggle' => 0,
            'responsive' => 'true',
            'el_class' => ''
		), $atts ) );


$id = uniqid();
$el_class = $this->getExtraClass( $el_class );

// Get global JSON contructor object for styles and create local variable
global $ken_dynamic_styles;
$ken_styles = '';

if ( $style == 'simple' ) {
    $ken_styles .= '
        #accordion-'.$id.' .mk-accordion-single.current-item .mk-accordion-tab{
            color:'.$mk_settings['accent-color'].';
        }
        ';
}

$output .= '<div id="accordion-'.$id.'" class="mk-accordion mobile-'.$responsive.' '.$style.'-style '.$el_class.'" data-item-index="'.$open_toggle.'">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>';

$ken_styles .= '#accordion-'.$id.' .mk-accordion-pane .inner-box{background-color: '.$container_bg_color.';}';


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
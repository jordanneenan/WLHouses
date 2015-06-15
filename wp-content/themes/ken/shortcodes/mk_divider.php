<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'icon' => '',
			'divider_width' => 'full',
			'custom_width' => '',
			'align' => '',
			'style' => 'line',
			'divider_color' => '',
			'margin_top' => '20',
			'thickness' => '2',
			'margin_bottom' => '20',

		), $atts ) );
$output = $custom_css = $align_css = '';

$custom_css = $divider_width == 'custom_width' ? 'width:'.$custom_width.'px;' : '';

if($align == 'left'){
	$align_css = '';
}else if ($align == 'center') {
	$align_css = 'margin: 0 auto;';	
}else{
	$align_css = 'margin: 0 0 0 auto;';
}

$style_id = uniqid();


// Get global JSON contructor object for styles and create local variable
global $ken_dynamic_styles;
$ken_styles = '';
	
if($style == 'single'){
	$ken_styles .= '
        #divider-'.$style_id.' .divider-inner{
            border-width:'.$thickness.'px;
            height:'.$thickness.'px;
            '.$custom_css.'
            '.$align_css.'
        }
        ';	
}else{
	$ken_styles .= '
        #divider-'.$style_id.' .divider-inner{
            '.$custom_css.'
            '.$align_css.'
        }
        ';
}

$output .= '<div id="divider-'.$style_id.'" style="padding: '.$margin_top.'px 0 '.$margin_bottom.'px;" class="mk-divider divider_'.$divider_width.' divider-'.$style.' '.$el_class.'">';

	$border_color = (!empty($divider_color)) ? (' style="border-color:'.$divider_color.'"') : '';
	$output .= '<div'.$border_color.' class="divider-inner"></div>';
$output .= '</div><div class="clearboth"></div>';


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

<?php

$title = $el_class = $value = $label_value= $units = '';
extract(shortcode_atts(array(
	'image_url' => '',
	'link_url' => '',
	'link_new_tab' => '',
	'link_text' => '',
	'min_height' => '300',
	'color' => 'accent-color',
	'box_style' => 'default',
	'icon_family' => '',
	'icon_fontawesome' => '',
	'icon_linecons' => '',
	'icon_linea' => '',
	'icon_iconsmind' => '',
	'icon_steadysets' => '',
	'icon_size' => '50',
	'secondary_content' => '',
	'box_color' => '',
	'content_color' => '#ffffff',
	'box_color_opacity' => '1',
	'css' => '',
	'enable_animation' => '',
	'animation' => '', 
	'enable_border' => '',
	'box_alignment' => 'left',
	'delay' => ''
	
), $atts));

$style       = null;
$icon_markup = null;

//icon
switch($icon_family) {
	case 'fontawesome':
	$icon = $icon_fontawesome;
	break;
	case 'steadysets':
	$icon = $icon_steadysets;
	break;
	case 'linea':
	$icon = $icon_linea;
	break;
	case 'linecons':
	$icon = $icon_linecons;
	break;
	case 'iconsmind':
	$icon = $icon_iconsmind;
	break;
	default:
	$icon = '';
	break;
}

if( $icon_family === 'linea' ) { 
	wp_enqueue_style('linea'); 
}

if( !empty($icon) ) {
	
	$color_attr = 'data-color="'.esc_attr(strtolower($color)).'"';
	
	// Check if iconsmind SVGs exist.
	$svg_iconsmind = ( defined('NECTAR_THEME_DIRECTORY') && file_exists( NECTAR_THEME_DIRECTORY . '/css/fonts/svg-iconsmind/Aa.svg.php' ) ) ? true : false;


	if( $icon_family === 'iconsmind' && $svg_iconsmind ) {
		
		// SVG iconsmind.
		$icon_id        = 'nectar-iconsmind-icon-'.uniqid();
		$icon_markup    = '<span class="im-icon-wrap" data-color="'.esc_attr(strtolower($color)) .'"><span>';
		$converted_icon = str_replace('iconsmind-', '', $icon);
		ob_start();
		
		get_template_part( 'css/fonts/svg-iconsmind/'. $converted_icon .'.svg' );
		
		$icon_markup .=  ob_get_contents();
		
		// Custom size.
		$icon_markup = preg_replace(
			array('/width="\d+"/i', '/height="\d+"/i'),
			array('width="'.$icon_size.'"', 'height="'.$icon_size.'"'),
			$icon_markup);
			
			// Handle custom colors.
			if($box_style == 'color_box_basic' && !empty($content_color) ) {
				$icon_markup =  preg_replace('/(<svg\b[^><]*)>/i', '$1 fill="'.$content_color.'">', $icon_markup);
			}
			// Gradient.
			if( strtolower($color) === 'extra-color-gradient-1' || strtolower($color) === 'extra-color-gradient-2') {
				
				$nectar_options = get_nectar_theme_options();
				
				if( strtolower($color) === 'extra-color-gradient-1' && isset($nectar_options["extra-color-gradient"]['from']) ) {
					
					$accent_gradient_from = $nectar_options["extra-color-gradient"]['from'];
					$accent_gradient_to   = $nectar_options["extra-color-gradient"]['to'];
					
				} else if( strtolower($color) === 'extra-color-gradient-2' && isset($nectar_options["extra-color-gradient-2"]['from']) ) {
					
					$accent_gradient_from = $nectar_options["extra-color-gradient-2"]['from'];
					$accent_gradient_to   = $nectar_options["extra-color-gradient-2"]['to'];
					
				}
				
				$icon_markup =  preg_replace('/(<svg\b[^><]*)>/i', '$1 fill="url(#'.$icon_id.')">', $icon_markup);
				
				$icon_markup .= '<svg style="height:0;width:0;position:absolute;" aria-hidden="true" focusable="false">
				<linearGradient id="'.$icon_id.'" x2="1" y2="1">
				<stop offset="0%" stop-color="'.$accent_gradient_from.'" />
				<stop offset="100%" stop-color="'.$accent_gradient_to.'" />
				</linearGradient>
				</svg>';
			} 
			
			ob_end_clean();
			
			$icon_markup .= '</span></span>';
		}
		
		else {
			
			if( !empty($icon_family) && $icon_family === 'iconsmind' ) {
				wp_enqueue_style( 'iconsmind' );
			}
			
			$icon_markup = '<i class="icon-default-style '.$icon.'" '.$color_attr.' style="font-size: '.esc_attr($icon_size).'px!important; line-height: '.esc_attr($icon_size).'px!important;"></i>';
			
			// Needs two for fancy gradient hover.
			if($box_style == 'color_box_hover' && strtolower($color) === 'extra-color-gradient-2' || $box_style === 'color_box_hover' && strtolower($color) === 'extra-color-gradient-1') {
				$icon_markup .= '<i class="icon-default-style hover-only '.$icon.'" data-color="white" style="font-size: '.esc_attr($icon_size).'px!important; line-height: '.esc_attr($icon_size).'px!important;"></i>';
			}
			
		}
		
	}
	
	$new_tab_markup  = ($link_new_tab == true) ? 'target="_blank"' : null;
	$using_img_class = null;
	$bg_image_src    = array('0' => '');
	
	if( !empty($image_url) ) {
		
		$using_img_class = 'using-img';
		
		if(!preg_match('/^\d+$/',$image_url)){
			
			$bg_image_src = $image_url;
			$style .= ' style="background-image: url(\''.esc_url($bg_image_src).'\'); "';
			
		} else {
			
			$bg_image_src = wp_get_attachment_image_src($image_url, 'full');
			$style .= ' style="background-image: url(\''.esc_url($bg_image_src[0]).'\'); "';
		}
		
	}
	
	$style2 = '';
	
	if( $box_style === 'color_box_basic' && !empty($box_color) ) { 
		$color = $box_color; 
	}
	
	if( !empty($box_color) && $box_style === 'color_box_basic' || !empty($content_color) && $box_style === 'color_box_basic') {
		
		$basic_box_coloring = '';
		
		if( !empty($box_color) ) {
			$basic_box_coloring .= ' background-color: '.esc_attr($box_color).';';
		}
		if( !empty($content_color) ) {
			$style2 = 'style="color: '.esc_attr($content_color).';"';
		}
		
		if( $style == null ) {
			$style = 'style="'.$basic_box_coloring.'"';
		}
		else {
			// Remove the ending quotation first since it's already closed.
			$style = substr($style,0,-1);
			$style .= $basic_box_coloring .'"';
			
		}
		
	}
	
	$box_link = null;
	if(!empty($link_url)) {
		$box_link = '<a '.$new_tab_markup.' href="'.esc_url($link_url).'" class="box-link"></a>';
	}
	
	$text_link = null;
	if(!empty($link_text)) {
		$text_link = '<div class="link-text">'.$link_text.'<span class="arrow"></span></div>';
	}
	
	$extra_wrap_open = $extra_wrap_close = $extra_wrap_open2 = $extra_wrap_close2 = null;
	if( $box_style === 'color_box_hover' ) {
		$extra_wrap_open = '<div class="inner-wrap">';
		$extra_wrap_open2 = '<div class="box-inner-wrap">';
		$extra_wrap_close = $extra_wrap_close2 ='</div>';
		
	}
	
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
	
	$parsed_animation = '';
	
	if(!empty($animation) && $animation !== 'none' && $enable_animation === 'true') {
		$css_class .= ' has-animation';
		
		$parsed_animation = str_replace(" ","-",$animation);
		$delay = intval($delay);
	}
	
	if($box_style === 'parallax_hover') {
		
		if(!preg_match('/^\d+$/',$image_url)){
			$parallax_bg_img = $image_url;
		} else {
			$parallax_bg_img = $bg_image_src[0];
		}
		
		$output = '<div class="nectar-fancy-box style-5 '.$using_img_class.' '.$css_class.'" data-style="'. esc_attr($box_style) .'" data-animation="'.strtolower(esc_attr($parsed_animation)).'" data-delay="'.esc_attr($delay).'" data-color="'.strtolower(esc_attr($color)).'">';
		
		$output .= $box_link;
		$output .= '<div class="parallaxImg">';
		$output .= '<div class="parallaxImg-layer" data-img="'.esc_url($parallax_bg_img).'"></div>';
		$output .= '<div class="parallaxImg-layer"> <div class="meta-wrap" style="min-height: '.esc_attr($min_height).'px"><div class="inner">';
		$output .= $icon_markup . wp_kses_post($content);
		$output .= '</div> </div></div></div>';
		$output .= '</div>';
		
	} else {
		
		$output = '<div class="nectar-fancy-box '.$using_img_class.' '.$css_class.'" data-style="'. esc_attr($box_style) .'" data-animation="'.strtolower(esc_attr($parsed_animation)).'" data-border="'.esc_attr($enable_border).'" data-box-color-opacity="'.esc_attr($box_color_opacity).'" data-delay="'.esc_attr($delay).'" data-alignment="'.esc_attr($box_alignment).'" data-color="'.strtolower($color).'" '.$style2.'>';
		$output .= $extra_wrap_open2 . '<div class="box-bg" '.$style.'></div> <div class="inner" style="min-height: '.esc_attr($min_height).'px">'.$extra_wrap_open . $icon_markup . wp_kses_post($content) . $extra_wrap_close. '</div> '.$text_link.' '.$box_link. $extra_wrap_close2 .' </div>';
		
	}
	
	echo do_shortcode($output);
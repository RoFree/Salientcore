<?php 

extract(shortcode_atts(array(
  "description" => '', 
  'team_member_bio' => '',
  'team_memeber_style' => '', 
  'color' => 'Accent-Color', 
  'name' => 'Name', 
  'job_position' => '', 
  'image_url' => '', 
  'bio_image_url' => '', 
  'social' => '', 
  'social_icon_1' => '', 
  'social_link_1' => '', 
  'social_icon_2' => '', 
  'social_link_2' => '', 
  'social_icon_3' => '', 
  'social_link_3' => '', 
  'social_icon_4' => '', 
  'social_link_4' => '', 
  'link_element' => 'none', 
  'link_url' => '', 
  'link_url_2' => '',
  'team_member_link_new_tab' => ''), $atts));
  
  $html = null;
  $link_new_tab_markup = ($team_member_link_new_tab == 'true') ? 'target="_blank"': '';
  
  
  // Fullscreen bio style.
  if( $team_memeber_style === 'bio_fullscreen' ) {
    
    $bio_image_url_src = null;
    $team_alt = null;
    
    if( !empty($bio_image_url) ){
      
      $bio_image_url_src = $bio_image_url;
      
      if(preg_match('/^\d+$/',$bio_image_url)){
        $bio_image_src     = wp_get_attachment_image_src($bio_image_url, 'full');
        $bio_image_url_src = $bio_image_src[0];
      }
    }
    
    if( !empty($image_url) ){
      
      if( preg_match('/^\d+$/',$image_url) ){
        
        $team_alt  = get_post_meta( $image_url, '_wp_attachment_image_alt', true );
        $image_src = wp_get_attachment_image_src($image_url, 'regular');
        $image_url = $image_src[0];
      }
      
    }
    
    $social_markup = '<div class="bottom_meta">';
    for( $i = 1; $i < 5; $i++) {
      
      if( isset($atts['social_icon_'.$i]) && !empty($atts['social_icon_'.$i]) ) {
        
        $social_link_url = ( !empty($atts['social_link_'.$i]) ) ? $atts['social_link_'.$i] : '';
        $social_markup .= '<a href="'.esc_url($social_link_url).'" target="_blank"><i class="icon-default-style '.esc_attr($atts['social_icon_'.$i]).'"></i>'.'</a>';
        
      }
    }
    $social_markup .= '</div>';
    
    $html .= '<div class="team-member" data-style="'.esc_attr($team_memeber_style).'">
    <div class="team-member-image"><img src="'.esc_url($image_url).'" alt="'.esc_attr($team_alt).'" width="500" height="500" /></div>
    <div class="team-member-overlay"></div>
    <div class="team-meta"><h3>' . wp_kses_post($name) . '</h3><p>' . wp_kses_post($job_position) . '</p><div class="arrow-end fa fa-angle-right"></div><div class="arrow-line"></div></div>
    <div class="nectar_team_bio_img" data-img-src="'.esc_attr($bio_image_url_src).'"></div>
    <div class="nectar_team_bio">'.$team_member_bio . $social_markup .'</div>
    </div>';
    
    echo str_replace("\r\n", '', $html);
    return;
  }
  
  
  
  $html .= '<div class="team-member" data-style="'.$team_memeber_style.'">';
  
  if( $team_memeber_style === 'meta_overlaid' || $team_memeber_style === 'meta_overlaid_alt' ) {
    
    $html .= '<div class="team-member-overlay"></div>';
    
    if( !empty($image_url) ){
      
      if(preg_match('/^\d+$/',$image_url)){
        $image_src = wp_get_attachment_image_src($image_url, 'portfolio-thumb');
        $image_url = $image_src[0];
      }
      
      // Image link.
      if(!empty($link_url_2)){
        $html .= '<a href="'.esc_url($link_url_2).'" '.$link_new_tab_markup.'></a> <div class="team-member-image" style="background-image: url('.esc_url($image_url).');"></div>';
      } else {
        $html .= '<div class="team-member-image" style="background-image: url('.esc_url($image_url).');"></div>';
      }
      
    }
    else {
      // Image link.
      if(!empty($link_url_2)){
        $html .= '<a href="'.esc_url($link_url_2).'" '.$link_new_tab_markup.'></a><div class="team-member-image" style="background-image: url('. SALIENT_CORE_PLUGIN_PATH . '/includes/img/team-member-default.jpg);"></div>';
      } else {
        $html .= '<div class="team-member-image" style="background-image: url('. SALIENT_CORE_PLUGIN_PATH . '/includes/img/team-member-default.jpg);"></div>';
      }
      
    }
    
    // Name link.
    $html .= '<div class="team-meta">';
    $html .= '<h3>' . wp_kses_post($name) . '</h3>';
    $html .= '<p>' . wp_kses_post($job_position) . '<p>';
    $html .= '</div>';
    
  } else {
    
    if(!empty($image_url)){
      
      $team_alt = $name;
      
      if( preg_match('/^\d+$/',$image_url) ) {
        $image_src = wp_get_attachment_image_src($image_url, 'full');
        $team_alt  = get_post_meta( $image_url, '_wp_attachment_image_alt', true );
        $image_url = $image_src[0];
      }
      
      // Image link.
      if($link_element === 'image' || $link_element === 'both') {
        $html .= '<a href="'.esc_url($link_url).'" '.$link_new_tab_markup.'><img alt="'.esc_attr($team_alt).'" src="' . esc_url($image_url) .'" title="' . esc_attr($name) . '" /></a>';
      } else {
        $html .= '<img alt="'.esc_attr($team_alt).'" src="' . esc_url($image_url) .'" title="' . esc_attr($name) . '" />';
      }
      
    }
    else {
      // Image link.
      if($link_element === 'image' || $link_element === 'both'){
        $html .= '<a href="'.esc_url($link_url).'" '.$link_new_tab_markup.'><img alt="'.esc_attr($name).'" src="' . SALIENT_CORE_PLUGIN_PATH . '/includes/img/team-member-default.jpg" title="' . esc_attr($name) . '" /></a>';
      } else {
        $html .= '<img alt="'.esc_attr($name).'" src="' . SALIENT_CORE_PLUGIN_PATH . '/includes/img/team-member-default.jpg" title="' . esc_attr($name) . '" />';
      }
      
    }
    
    // Name link.
    if($link_element === 'name' || $link_element === 'both'){
      $html .= '<h4 class="light"><a class="'.strtolower($color).'" href="'.esc_url($link_url).'" '.$link_new_tab_markup.'>' . wp_kses_post($name) . '</a></h4>';
    } else {
      $html .= '<h4 class="light">' . wp_kses_post($name) . '</h4>';
    }
    
    $html .= '<div class="position">' . wp_kses_post($job_position) . '</div>';
    $html .= '<p class="description">' . wp_kses_post($description) . '</p>';
    
    if (!empty($social) && strlen($social) > 1) {
      
      $social     = str_replace(array("\r\n", "\r", "\n", "<br/>", "<br />"), " ", $social);
      $social_arr = explode(",", $social);
      
      $html .= '<ul class="social '.strtolower($color).'">';
      
      for ($i = 0 ; $i < count($social_arr) ; $i = $i + 2) {
        
        if( isset($social_arr[$i + 1]) ) {	
          $target        = null;
          $url_host      = parse_url($social_arr[$i + 1], PHP_URL_HOST);
          $base_url_host = parse_url(get_template_directory_uri(), PHP_URL_HOST);
          
          if( $url_host != $base_url_host || empty($url_host) ) {
            $target = 'target="_blank"';
          }
          
          $html .=  "<li><a ".$target." href='" . esc_url($social_arr[$i + 1]) . "'>" . $social_arr[$i] . "</a></li>";   
        }
        
      }
      
      $html .= '</ul>'; 
      
    }
    
  }
  
  $html .= '</div>';
  
  echo str_replace("\r\n", '', $html);
  
  ?>
<?php

function simple_grey_sliding_panel_scheme($schemes) {
  $scheme_name = 'Simple Grey' ;
  $scheme = 
      array (
  'text_color' => '#7a7a7a',
  'background_color' => '#e0dfdf',
  'h1_color' => '#292929',
  'h2_color' => '#292929',
  'link_color' => '#292929',
  'link_hover_color' => '#898989',
  'field_color' => '#000000',
  'field_bg_color' => '#bbbbbb',
  'field_bg_focus_color' => '#ffffff',
  'field_border_color' => '#000000',
  'panel_border_color' => '#292929',
  'login_bg_color' => '#bbbbbb',
  'login_border_color' => '#000000',
  'login_color' => '#000000',
  'login_hover_color' => '#ffffff',
  'lostpwd_bg_color' => '#bbbbbb',
  'lostpwd_border_color' => '#000000',
  'lostpwd_color' => '#000000',
  'lostpwd_hover_color' => '#ffffff',
  'register_bg_color' => '#bbbbbb',
  'register_border_color' => '#000000',
  'register_color' => '#000000',
  'register_hover_color' => '#ffffff',
  'tab_link_color' => '#292929',
  'tab_link_hover_color' => '#898989',
  'tab_images' => '',
  'tab_background_color' => '#e0e0e0',
  'tab_border_color' => '#292929',
  'panel_font_family' => 'Arial, Helvetica Neue, Helvetica, sans-serif',
  'panel_font_size' => '13px',
  'h1_font_family' => 'Arial, Helvetica Neue, Helvetica, sans-serif',
  'h1_font_size' => '20px',
  'h1_font_weight' => 'bold',
  'h1_font_style' => 'normal',
  'h2_font_family' => 'Arial, Helvetica Neue, Helvetica, sans-serif',
  'h2_font_size' => '16px',
  'h2_font_weight' => 'bold',
  'h2_font_style' => 'normal',
  'btn_font_family' => 'Arial, Helvetica Neue, Helvetica, sans-serif',
  'btn_font_size' => '12px',
  'btn_font_weight' => 'bold',
  'btn_font_style' => 'normal',
  'tab_font_family' => 'Arial, Helvetica Neue, Helvetica, sans-serif',
  'tab_font_size' => '12px',
  'tab_font_weight' => 'bold',
  'tab_font_style' => 'normal',
  'panel_background' => '',
  'panel_background_repeat' => 'Repeat',
  'content_background' => '',
  'content_background_repeat' => 'Repeat',
);

      $scheme['panel_background'] = plugins_url('images/batthern.png', __FILE__ );
        $scheme['content_background'] = plugins_url('images/leather_1.png', __FILE__ );
        $scheme['extra_css'] = '#sliding-panel #panel .content {
  -moz-box-shadow: rgba(0,0,0,1) 0 4px 30px;
  -webkit-box-shadow: rgba(0,0,0,1) 0 4px 30px;
  -khtml-box-shadow: rgba(0,0,0,1) 0 4px 30px;
  box-shadow: rgba(0,0,0,1) 0 4px 30px;
}

#sliding-panel #panel .content a:hover {
  text-decoration: underline;
}

#sliding-panel #panel .content div#login-intro.left {
  border-left: 0;
}';
        $scheme['tab_l'] = plugins_url('images/tab_l-e0e0e0-292929.png', __FILE__ );
        $scheme['tab_b'] = plugins_url('images/tab_b-e0e0e0-292929.png', __FILE__ );
        $scheme['tab_r'] = plugins_url('images/tab_r-e0e0e0-292929.png', __FILE__ );
        $scheme['tab_m'] = plugins_url('images/tab_m-e0e0e0-292929.png', __FILE__ );
        $scheme['other_images'] = array(
        );
    $scheme['default'] = true ;
  $schemes[$scheme_name] = $scheme ;
  return $schemes ;
}
add_action('sliding-panel-schemes', 'simple_grey_sliding_panel_scheme');
?>

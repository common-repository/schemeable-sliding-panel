<?php

function default_sliding_panel_scheme($schemes) {
  $scheme_name = 'Default' ;
  $scheme = 
      array (
  'text_color' => '#999999',
  'background_color' => '#272727',
  'h1_color' => 'white',
  'h2_color' => 'white',
  'link_color' => '#15ADFF',
  'link_hover_color' => '#FFFFFF',
  'field_color' => '#FFFFFF',
  'field_bg_color' => '#414141',
  'field_bg_focus_color' => '#545454',
  'field_border_color' => '#1A1A1A',
  'panel_border_color' => '#414141',
  'login_bg_color' => '#21759B',
  'login_border_color' => '#298CBA',
  'login_color' => '#FFFFFF',
  'login_hover_color' => '#e0e0e0',
  'lostpwd_bg_color' => '#21759B',
  'lostpwd_border_color' => '#298CBA',
  'lostpwd_color' => '#FFFFFF',
  'lostpwd_hover_color' => '#e0e0e0',
  'register_bg_color' => '#E7E7E7',
  'register_border_color' => '#C7C7C7',
  'register_color' => '#636363',
  'register_hover_color' => '#838383',
  'tab_link_color' => '#15ADFF',
  'tab_link_hover_color' => '#FFFFFF',
  'tab_images' => 'Tab Images',
  'tab_background_color' => '#292929',
  'tab_border_color' => '#C3C3C3',
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
  'panel_background_repeat' => '',
  'content_background' => '',
  'content_background_repeat' => '',
);

          $scheme['extra_css'] = '';
                $scheme['other_images'] = array(
        );
    $scheme['default'] = true ;
  $schemes[$scheme_name] = $scheme ;
  return $schemes ;
}
add_action('sliding-panel-schemes', 'default_sliding_panel_scheme');
?>

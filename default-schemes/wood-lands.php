<?php

function wood_lands_sliding_panel_scheme($schemes) {
  $scheme_name = 'Wood Lands' ;
  $scheme = 
      array (
  'text_color' => '#de6a19',
  'background_color' => '#272727',
  'h1_color' => '#724923',
  'h2_color' => '#724923',
  'link_color' => '#9e5700',
  'link_hover_color' => '#Ce8719',
  'field_color' => '#FFFFFF',
  'field_bg_color' => '#CAAB8C',
  'field_bg_focus_color' => '#FADBAC',
  'field_border_color' => '#1A1A1A',
  'panel_border_color' => '#414141',
  'login_bg_color' => '#9e5700',
  'login_border_color' => '#298CBA',
  'login_color' => '#FFFFFF',
  'login_hover_color' => '#e0e0e0',
  'lostpwd_bg_color' => '#9e5700',
  'lostpwd_border_color' => '#298CBA',
  'lostpwd_color' => '#FFFFFF',
  'lostpwd_hover_color' => '#e0e0e0',
  'register_bg_color' => '#E7E7E7',
  'register_border_color' => '#C7C7C7',
  'register_color' => '#636363',
  'register_hover_color' => '#838383',
  'tab_link_color' => '#9e5700',
  'tab_link_hover_color' => '#Ce8719',
  'tab_images' => '',
  'tab_background_color' => '#FADBAC',
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
  'panel_background_repeat' => 'Repeat',
  'content_background' => '',
  'content_background_repeat' => '',
);

      $scheme['panel_background'] = plugins_url('images/wood_pattern.png', __FILE__ );
          $scheme['extra_css'] = '';
        $scheme['tab_l'] = plugins_url('images/tab_l-FADBAC-C3C3C3.png', __FILE__ );
        $scheme['tab_b'] = plugins_url('images/tab_b-FADBAC-C3C3C3.png', __FILE__ );
        $scheme['tab_r'] = plugins_url('images/tab_r-FADBAC-C3C3C3.png', __FILE__ );
        $scheme['tab_m'] = plugins_url('images/tab_m-FADBAC-C3C3C3.png', __FILE__ );
        $scheme['other_images'] = array(
        );
    $scheme['default'] = true ;
  $schemes[$scheme_name] = $scheme ;
  return $schemes ;
}
add_action('sliding-panel-schemes', 'wood_lands_sliding_panel_scheme');
?>

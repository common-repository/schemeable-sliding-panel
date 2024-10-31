<?php

function green_meadows_sliding_panel_scheme($schemes) {
  $scheme_name = 'Green Meadows' ;
  $scheme =
      array (
  'text_color' => '#ffffff',
  'background_color' => '#077e05',
  'h1_color' => '#58ff40',
  'h2_color' => '#ff701c',
  'link_color' => '#58ff40',
  'link_hover_color' => '#ffffff',
  'field_color' => '#000000',
  'field_bg_color' => '#fdfcbb',
  'field_bg_focus_color' => '#ffffff',
  'field_border_color' => '#1A1A1A',
  'panel_border_color' => '#000000',
  'login_bg_color' => '#fdfcbb',
  'login_border_color' => '#000000',
  'login_color' => '#000000',
  'login_hover_color' => '#ffffff',
  'lostpwd_bg_color' => '#fdfcbb',
  'lostpwd_border_color' => '#000000',
  'lostpwd_color' => '#000000',
  'lostpwd_hover_color' => '#ffffff',
  'register_bg_color' => '#fdfcbb',
  'register_border_color' => '#000000',
  'register_color' => '#000000',
  'register_hover_color' => '#ffffff',
  'tab_link_color' => '#58ff40',
  'tab_link_hover_color' => '#FFFFFF',
  'tab_images' => '',
  'tab_background_color' => '#077e05',
  'tab_border_color' => '#0a0a0a',
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
  'btn_font_size' => '14px',
  'btn_font_weight' => '400',
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

          $scheme['extra_css'] = '#sliding-panel #panel {
   background: url(' . plugins_url('images/grass4-300x198.png', __FILE__ ) . ') bottom repeat-x #077e05;
}


';
        $scheme['tab_l'] = plugins_url('images/tab_l-077e05-0a0a0a.png', __FILE__ );
        $scheme['tab_b'] = plugins_url('images/tab_b-077e05-0a0a0a.png', __FILE__ );
        $scheme['tab_r'] = plugins_url('images/tab_r-077e05-0a0a0a.png', __FILE__ );
        $scheme['tab_m'] = plugins_url('images/tab_m-077e05-0a0a0a.png', __FILE__ );
        $scheme['other_images'] = array(
  plugins_url('images/grass4-300x198.png', __FILE__ ),
      );
    $scheme['default'] = true ;
  $schemes[$scheme_name] = $scheme ;
  return $schemes ;
}
add_action('sliding-panel-schemes', 'green_meadows_sliding_panel_scheme');
?>

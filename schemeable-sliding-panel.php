<?php
/*
Plugin Name: Schemeable Sliding Panel
Plugin URI: http://wp-pde.jaliansystems.com/schemeable-sliding-panel
Description: Use smooth and beautiful sliding panel for your blog. Fully scheme-able and configurable. Bundled with six beautiful schemes.
Version: 1.4
Author: Dakshinamurthy Karra
Author URI: http://wp-pde.jaliansystems.com
License: GPLv2 or later
Code Generator: WpPDE (http://wp-pde.jaliansystems.com/)
*/

/* (C) Jalian Systems Pvt. Ltd. */

/*
*/

if( !function_exists( 'Markdown' ) ) {
  if( isset($wp_version) ) {
    $wp_version_bak = $wp_version ;
    unset( $wp_version );
  }
  require 'php-markdown-1.0.1o/markdown.php';
  if( isset($wp_version_bak) ) {
    $wp_version = $wp_version_bak ;
    unset( $wp_version_bak );
  }
}

require_once dirname(__FILE__) . '/schemes.php';
require_once dirname(__FILE__) . '/slide.php';
require_once dirname(__FILE__) . '/tabs.php';

/**
 * Schemeable Sliding Panel plugin class
 */
class Schemeable_Sliding_Panel_v1_1a {

  static function check_for_scheme_change( $sop ) {
    $sop = get_option('sliding-panel-options');
    $opt = $sop['options'] ;

    $schemes = get_schemes();
    if( $opt['scheme'] != $_REQUEST['current_scheme'] && isset( $schemes[$opt['scheme']] ) ) {
      $scheme = $schemes[$opt['scheme']] ;
      foreach( $scheme as $k => $v )
        $sop[$k] = $v ;
    }
    if( !isset( $schemes[$opt['scheme']] ) ) {
      $opt['scheme'] = array_shift( array_keys( $schemes ) );
      $scheme = array_shift( array_values( $schemes ) );
      foreach( $scheme as $k => $v )
        $sop[$k] = $v ;
      $sop['options']['scheme'] = $opt['scheme'] ;
    }

    $sop['options']['scheme_name'] = $sop['options']['scheme'];
    global $messages;
    $messages[] = array( 'updated fade', 'Changes saved. If you modified colors, background or fonts - you should save the scheme to make them permanent.');
    update_option('sliding-panel-options', $sop);
    sliding_panel_tab_folder_check($sop);
  }

  static function export_scheme( $instance ) {
    global $messages ;
    global $sliding_panel_options ;

    $sliding_panel_options = $instance ;
    $scheme_name = $instance['share-scheme']['scheme'];

    if( empty( $scheme_name ) ) {
      $messages[] = array( 'error', 'You should provide a scheme name for export.' );
      return ;
    }
    $file = export_scheme( $scheme_name ) ;
    if( $file ) {
         $messages[] = array('updated fade', "Scheme exported and available <a href='$file'>here</a>. Your download should start shortly.");
  ?>
  <script type="text/javascript">
  jQuery(document).ready(function(e) {
    location.href = '<?php echo $file; ?>' ;
  });
  </script>
  <?php
    }
  }

  static function include_sliding_panel( $arg1 ) {
     show_sliding_panel();
  }

  static function login_user( $arg1 ) {
        if( empty($_REQUEST['sliding-panel']) || trim($_REQUEST['sliding-panel']) != 'true' ) {
          $sop = get_option('sliding-panel-options');
          if(!empty($sop['options']['standard_pages']) && empty($sop['login_panel']))
               wp_redirect(site_url());
          return ;
        }
        $return = array();
        if( empty($_REQUEST['log']) || empty($_REQUEST['pwd']) || trim($_REQUEST['log']) == '' || trim($_REQUEST['pwd'] == '') ) {
            $return['success'] = false;
            $return['message'] = __('Please supply your username and password.', 'sliding-panel');
            echo json_encode($return) ;
            exit();
        }
        $creds = array();
        $creds['user_login'] = $_REQUEST['log'];
        $creds['user_password'] = $_REQUEST['pwd'];
        $creds['remember'] = !empty($_REQUEST['rememberme']);
        $user = wp_signon( $creds, false );
        if ( is_wp_error($user) ) {
            $return['success'] = false;
            $return['message'] = preg_replace('/<a.*/', '', $user->get_error_message());
            echo json_encode($return) ;
            exit();
        }
        $return['success'] = true;
        $return['message'] = __('Login successful. refreshing...', 'sliding-panel');
        echo json_encode($return) ;
        exit();
  }

  static function lost_password( $arg1 ) {
        if( empty($_REQUEST['sliding-panel']) || trim($_REQUEST['sliding-panel']) != 'true' ) {
          $sop = get_option('sliding-panel-options');
          if(!empty($sop['options']['standard_pages']) && empty($sop['login_panel']))
               wp_redirect(site_url());
          return ;
        }
      $return = array();
      $errors = retrieve_password();
      if ( !is_wp_error($errors) ) {
          $return['success'] = true ;
          $return['message'] = __('Check your email for a confirmation link.', 'sliding-panel');
          echo json_encode($return);
          exit();
      }
      $return['success'] = false ;
      $return['message'] = $errors->get_error_message();
      echo json_encode($return);
      exit();
  }

  static function process_file( $arg1 ) {
      global $wp_query;
      if( isset( $wp_query->query_vars['process-file'] )) {
          $parsed_url = $wp_query->query_vars['process-file'] ;
          include(dirname( __FILE__ )  . $parsed_url);
          exit();
      }
  }
  static function register_new_user($arg1) {
        if( empty($_REQUEST['sliding-panel']) || trim($_REQUEST['sliding-panel']) != 'true' ) {
          $sop = get_option('sliding-panel-options');
          if(!empty($sop['options']['standard_pages']) && empty($sop['login_panel']))
               wp_redirect(site_url());
          return ;
        }
      $errors = register_new_user($_POST['user_login'], $_POST['user_email']);
      if ( !is_wp_error($errors) ) {
          //Success
          $return['success'] = true;
          $return['message'] = __('Registration complete. Please check your e-mail.');
      }else{
          //Something's wrong
          $return['success'] = false;
          $msg = $errors->get_error_message();
          $return['message'] = $msg;
      }
      echo json_encode($return);
      exit();
  }

  static function register_sidebar( $arg1 ) {
    $sop = get_option('sliding-panel-options');
    if( !$sop || !empty( $sop['use_widgets'] ) )
      /* Register the 'primary' sidebar. */
      register_sidebar(
         array(
          'id' => 'sliding-panel-sidebar',
          'name' => __( 'Sliding Panel Sidebar' ),
          'description' => __( 'Widgets shown in the sliding panel' ),
          'before_widget' => '<div id="%1$s" class="left widget %2$s">',
          'after_widget' => '</div>',
          'before_title' => '<h3 class="widget-title">',
          'after_title' => '</h3>'
          )
      );
  }

  static function remove_scheme( $sop ) {
    if(!empty($sop['options']['remove_scheme_name'])) {
      if( remove_scheme( $sop['options']['remove_scheme_name'] ) )
        do_action('sliding-panel-options-action-save', $sop);
    }
  }

  static function save_scheme( $sop ) {
    $opt = $sop['options'];
    if(!empty($opt['scheme_name'])) {
      $scheme = get_scheme($opt['scheme_name']);
      if( $scheme ) {
        if( $scheme['default'] || $scheme['external'] )
          $opt['scheme_name'] = $opt['scheme_name'] . ' (Local)' ;
      }
      if(save_scheme($opt['scheme_name'], $sop)) {
        $orig = get_option('sliding-panel-options');
        foreach( $orig['options'] as $k => $v )
           $sop['options'][$k] = $v;
        $sop['options']['scheme'] = $opt['scheme_name'] ;
        update_option('sliding-panel-options', $sop);
        do_action('sliding-panel-options-action-save', $sop);
      }
    }
  }

  static function sliding_panel_admin_include_scripts( $arg1 ) {
      $style_file = dirname( __FILE__ ) . '/css/slide.css.php';
      if( file_exists( $style_file ) ) {
        $style_url = add_query_arg('process-file', '/css/slide.css.php', site_url());
        wp_register_style('slide', $style_url) ;
        wp_enqueue_style('slide');
      }
  }

  static function sliding_panel_enqueue_scripts( $arg1 ) {
      $script_url = plugins_url('js/slide.js', __FILE__);
      $script_file = dirname( __FILE__ ) . '/js/slide.js';
      if( file_exists( $script_file ) ) {
        wp_register_script('slide', $script_url, array('jquery')) ;
        wp_enqueue_script('slide');
        wp_localize_script( 'slide', 'ajaxurl', admin_url( 'admin-ajax.php', 'relative' ));
      }

      $style_file = dirname( __FILE__ ) . '/css/slide.css.php';
      if( file_exists( $style_file ) ) {
        $style_url = add_query_arg('process-file', '/css/slide.css.php', site_url());
        wp_register_style('slide', $style_url) ;
        wp_enqueue_style('slide');
      }


  }

  function add_activation_links($links, $file) {
      static $my_plugin;
      if (!$my_plugin) {
          $my_plugin = plugin_basename(__FILE__);
      }
      if ($file == $my_plugin) {
          $settings_link = '<a href="' . menu_page_url('sliding-panel-options', false) . '">Settings</a>';
          array_unshift($links, $settings_link);
      }
      return $links;
  }

  static function add_process_file_query_var( $qvars ) {
    $qvars[] = 'process-file';
    return $qvars;
  }

  static function sliding_panel_fill_defaults( $arg1 ) {
    $font_defaults = array(
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
      'btn_font_size' => '16px',
      'btn_font_weight' => 'bold',
      'btn_font_style' => 'normal',
      'tab_font_family' => 'Arial, Helvetica Neue, Helvetica, sans-serif',
      'tab_font_size' => '12px',
      'tab_font_weight' => 'bold',
      'tab_font_style' => 'normal',
    );
    foreach( $font_defaults as $k => $v )
      $arg1[$k] = $v ;

    $arg1['welcome_message'] = '<h1>Welcome to ' . get_bloginfo('name') . "</h1>\n"  ;
    $arg1['social_login_introduction'] = '<h1>Login with OpenID</h1><p>OpenID allows you to use an existing account to sign in to multiple websites, without needing to create new passwords. <a href="http://openid.net/what">Learn more</a>.</p>' ;
    $arg1['dashboard_welcome_message'] = '<h1>Welcome back [user_identity]</h1>' ;
    $arg1['registration_message'] = '<h1>Registration is closed</h1><p>Sorry, you are not allowed to register by yourself on this site!</p><p>You must either be invited by one of our team member or request an invitation by emailing the site administrator at <a href="mailto:' . get_option('admin_email') . '">' . esc_html(get_option('admin_email')) . '</a>.</p>' ;

    return $arg1;
  }



}

class Schemeable_Sliding_Panel_v1_1a_StubFirePHP {
	function __call($name, $arguments) {}
}

if(!isset($GLOBALS['pde_firephp'])) {
	global $pde_firephp ;
	$pde_firephp = new Schemeable_Sliding_Panel_v1_1a_StubFirePHP();
}

if(!function_exists('pde_fb')) {
	function pde_fb($x) {}
}

add_action( 'sliding-panel-options-action-save', array('Schemeable_Sliding_Panel_v1_1a', 'check_for_scheme_change'), 10, 1 );
add_action( 'sliding-panel-options-action-export_scheme', array('Schemeable_Sliding_Panel_v1_1a', 'export_scheme'), 10, 1 );
add_action( 'wp_footer', array('Schemeable_Sliding_Panel_v1_1a', 'include_sliding_panel'), 10, 1 );
add_action( 'login_form_login', array('Schemeable_Sliding_Panel_v1_1a', 'login_user'), 10, 1 );
add_action( 'login_form_lostpassword', array('Schemeable_Sliding_Panel_v1_1a', 'lost_password'), 10, 1 );
add_action( 'template_redirect', array('Schemeable_Sliding_Panel_v1_1a', 'process_file'), 10, 1 );
add_action( 'login_form_register', array('Schemeable_Sliding_Panel_v1_1a', 'register_new_user'), 10, 1 );
add_action( 'widgets_init', array('Schemeable_Sliding_Panel_v1_1a', 'register_sidebar'), 10, 1 );
add_action( 'sliding-panel-options-action-remove_scheme', array('Schemeable_Sliding_Panel_v1_1a', 'remove_scheme'), 10, 1 );
add_action( 'sliding-panel-options-action-save_scheme', array('Schemeable_Sliding_Panel_v1_1a', 'save_scheme'), 10, 1 );
add_action( 'enqueue_css_sliding-panel-options', array('Schemeable_Sliding_Panel_v1_1a', 'sliding_panel_admin_include_scripts'), 10, 1 );
add_action( 'wp_enqueue_scripts', array('Schemeable_Sliding_Panel_v1_1a', 'sliding_panel_enqueue_scripts'), 10, 1 );
add_filter( 'plugin_action_links', array('Schemeable_Sliding_Panel_v1_1a', 'add_activation_links'), 10, 2 );
add_filter( 'query_vars', array('Schemeable_Sliding_Panel_v1_1a', 'add_process_file_query_var'), 10, 1 );
add_filter( 'pde-menu-page-defaults-sliding-panel-options', array('Schemeable_Sliding_Panel_v1_1a', 'sliding_panel_fill_defaults'), 10, 1 );




require_once dirname(__FILE__) . '/menu_pages/sliding-panel-options.php';
require_once dirname(__FILE__) . '/meta_boxes/share-scheme.php';
require_once dirname(__FILE__) . '/meta_boxes/options.php';
require_once dirname(__FILE__) . '/meta_boxes/spread-the-word.php';
require_once dirname(__FILE__) . '/meta_boxes/need-support.php';
?>

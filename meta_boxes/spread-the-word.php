<?php

class Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word {
  static function setup() {
    $var = new Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word;
    add_action( 'add_meta_boxes', array( &$var, 'add_meta_box' ) );
    add_action( 'add_menu_page_meta_boxes', array( &$var, 'add_menu_page_meta_box' ) );
    add_action( 'save_post', array( &$var, 'save_post' ) );
    add_filter( 'save_menu_page-sliding-panel-options', array( &$var, 'save_menu_page' ) );
  }

  function add_meta_box( $meta_post_type ) {
  }

  function add_menu_page_meta_box( $meta_menu_page ) {
      if( $meta_menu_page == 'sliding-panel-options' ) {
        $this->__enqueue_css();
        add_meta_box( 
            'Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word',
            __( 'Spread the Word', 'Schemeable Sliding Panel_textdomain' ),
            array( &$this, 'render_menu_page_meta_box' ),
            get_current_screen(),
            'side',
            'high'
        );
        add_filter( 'admin_title', array( &$this, 'setup_help' ) );
      }
  }

  function setup_help($title) {
    $screen = get_current_screen();
    $meta_key = 'spread-the-word' ;
    $help_tabs = array();
    if( !is_dir( dirname( __FILE__ ) . '/help' ) )
      return ;
    $help_files = scandir( dirname( __FILE__ ) . '/help' );
    foreach( $help_files as $help_file ) {
      if( preg_match( '/[^-]*-' . get_bloginfo('language') . '-' . $meta_key . '-' . '/', $help_file ) ) {
        $display = preg_replace( '/[^-]*-' . get_bloginfo('language') . '-' . $meta_key . '-' . '/', '', basename( $help_file, '.md' ) );
        $display = ucwords( str_replace( '-', ' ', $display ) );
        $help_tabs[] = array( sanitize_html_class( $help_file ), $display, $help_file );
      } else if( get_bloginfo('language') . '-' . $meta_key . '-sidebar.md' == $help_file ) {
        $sidebar = $help_file ;
      }
    }
    foreach( $help_tabs as $tab )
      $screen->add_help_tab( array(
        'id' => $tab[0],
        'title' => $tab[1],
        'content' => Markdown( file_get_contents( dirname( __FILE__ ) . '/help/' . $tab[2] ) )
      ) );

    if( isset( $sidebar ) )
      $screen->set_help_sidebar( Markdown( file_get_contents( dirname( __FILE__ ) . '/help/' . $sidebar ) ) );
    return $title;
  }

  function get_field_id( $id ) {
    return 'id_Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word_' . $id ;
  }

  function get_field_name( $id ) {
    return 'name_Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word_' . $id ;
  }

  function render_meta_box( $post ) {

    wp_nonce_field( plugin_basename( __FILE__ ), 'Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word_noncename' );

    $instance = get_post_meta( $post->ID, 'spread-the-word', true );
    if( empty( $instance ) ) {
      $instance = array(
                 'markup' => '',
                );
      $instance = apply_filters('pde-meta-box-defaults-spread-the-word', $instance);
    }
    ?>
    <div id='<?php echo $this->get_field_id("wp-pde-form"); ?>' class="pde-meta-box pde-meta-box-default">
    <?php
?>
 
      <div class="pde-form-field pde-form-markup markup-style-html">
        <p>Help us to make this plugin better.</p>
<p><a href="http://wordpress.org/extend/plugins/schemeable-sliding-panel">Rate us 5* on plugin repository.</a></p>
<p>If you use this plugin on your site, <a href="mailto:wppde@jaliansystems.com">drop us</a> a mail. We would love to see it in use.</p>
<p>If you customized and created a great looking panel and would like to share it with others, export it as a plugin and <a href="mailto:wppde@jaliansystems.com">send it across</a>.</p>
<p>You can support us by purchasing a copy of <a href="">WpPDE Pro</a> we used to create this plugin. It is just $49, gives you a great environment to create your own plugins and gives us more time to work on these plugins. <b>Thanks in advance.</b> 
      </div>

<?php 
    ?>
    </div>
    <?php
  }

  function render_menu_page_meta_box( $menu_page_slug ) {

    wp_nonce_field( plugin_basename( __FILE__ ), 'Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word_noncename' );

	$option = get_option($menu_page_slug);
    $instance = $option['spread-the-word'];
    if( empty( $instance ) ) {
      $instance = array(
                 'markup' => '',
                );
    $instance = apply_filters('pde-meta-box-defaults-spread-the-word', $instance);
    }
    ?>
    <div id='<?php echo $this->get_field_id("wp-pde-form"); ?>' class="pde-meta-box pde-meta-box-default">
    <?php
?>
 
      <div class="pde-form-field pde-form-markup markup-style-html">
        <p>Help us to make this plugin better.</p>
<p><a href="http://wordpress.org/extend/plugins/schemeable-sliding-panel">Rate us 5* on plugin repository.</a></p>
<p>If you use this plugin on your site, <a href="mailto:wppde@jaliansystems.com">drop us</a> a mail. We would love to see it in use.</p>
<p>If you customized and created a great looking panel and would like to share it with others, export it as a plugin and <a href="mailto:wppde@jaliansystems.com">send it across</a>.</p>
<p>You can support us by purchasing a copy of <a href="">WpPDE Pro</a> we used to create this plugin. It is just $49, gives you a great environment to create your own plugins and gives us more time to work on these plugins. <b>Thanks in advance.</b> 
      </div>

<?php 
    ?>
    </div>
    <?php
  }

  function save_post( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( !isset( $_POST['Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word_noncename']) || !wp_verify_nonce( $_POST['Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word_noncename'], plugin_basename( __FILE__ ) ) )
        return;

    $supported_post_types = array(
                          );
    if( !in_array( $_POST['post_type'], $supported_post_types ) )
      return ;

    // Check permissions
    if ( 'page' == $_POST['post_type'] ) 
    {
      if ( !current_user_can( 'edit_page', $post_id ) )
          return;
    }
    else
    {
      if ( !current_user_can( 'edit_post', $post_id ) )
          return;
    }

    $odefaults = array(
                 'markup' => '',
                );

    $odefaults = apply_filters('pde-meta-box-defaults-spread-the-word', $odefaults);
    $defaults = array();
    foreach( $odefaults as $k => $v )
      $defaults[$this->get_field_name($k)] = $v ;

    $post_vars = shortcode_atts( $defaults, $_POST );

    $instance = array();
      $instance['markup'] = $post_vars[$this->get_field_name('') . 'markup'] ;
    update_post_meta( $post_id, 'spread-the-word', $instance );
  }

  function save_menu_page( $data ) {

    $odefaults = array(
                 'markup' => '',
                );

    $odefaults = apply_filters('pde-meta-box-defaults-spread-the-word', $odefaults);
    $defaults = array();
    foreach( $odefaults as $k => $v )
      $defaults[$this->get_field_name($k)] = $v ;

    $post_vars = shortcode_atts( $defaults, $_POST );

    $instance = array();
      $instance['markup'] = $post_vars[$this->get_field_name('') . 'markup'] ;
	  $data['spread-the-word'] = $instance ;
    return $data ;
  }


  function __enqueue_css() {
     $file = 'pde-meta-box-default.css';
     $script_id = 'pde-meta-box-default' ;
     wp_enqueue_style( $script_id, plugins_url( $file, __FILE__ ) );
  }

}
if( is_admin( ) )
  add_action( 'admin_init', array( 'Schemeable_Sliding_Panel_v1_1a_m_Spread_The_Word', 'setup' ) );
?>

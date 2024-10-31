<?php header("Content-type: text/css; charset: UTF-8"); ?>
<?php
function sliding_panel_c($name) { global $sliding_panel_options; echo $sliding_panel_options[$name . '_color']; }
function sliding_panel_ff($name) { global $sliding_panel_options; echo $sliding_panel_options[$name . '_font_family']; }
function sliding_panel_fs($name) { global $sliding_panel_options; echo $sliding_panel_options[$name . '_font_size']; }
function sliding_panel_fw($name) { global $sliding_panel_options; echo $sliding_panel_options[$name . '_font_weight']; }
function sliding_panel_fst($name) { global $sliding_panel_options; echo $sliding_panel_options[$name . '_font_style']; }
function sliding_panel_e($name) { global $sliding_panel_options; return empty($sliding_panel_options[$name . '_color']); }
function sliding_panel_extract_options($pairs, $atts) {
    $atts = (array)$atts;
    foreach($pairs as $name => $default) {
        if ( !isset($atts[$name]) )
            $atts[$name] = $default;
    }
    return $atts;
}

    global $sliding_panel_options;
    $sliding_panel_options = get_option( 'sliding-panel-options');
    if( !$sliding_panel_options )
      $sliding_panel_options = array( 'tab_images' => 'Tab Images', );
    $options = isset($sliding_panel_options['options']) ? $sliding_panel_options['options'] : array();
    $sliding_panel_content_display = isset($options['content_display']) ? $options['content_display'] : 'Overlay over Content' ;
    $overlay = ($sliding_panel_content_display != 'Slide Down');
    $schemes = get_schemes();
    $defaults = array_shift( array_values( $schemes ) );
    $sliding_panel_options = sliding_panel_extract_options($defaults, $sliding_panel_options);
?>
/*
Name: Sliding Login Panel with jQuery 1.3.2
Author: Jeremie Tisseau
Author URI: http://web-kreation.com/
Date: March 26, 2009
Version: 1.0
    The CSS, XHTML and design is released under Creative Common License 3.0:
    http://creativecommons.org/licenses/by-sa/3.0/

*/

/***** clearfix *****/
.clear {clear: both;height: 0;line-height: 0;}
.clearfix:after {content: ".";display: block;height: 0;clear: both;visibility: hidden;}
.clearfix {display: inline-block;}
/* Hides from IE-mac */
* html .clearfix {height: 1%;}
.clearfix {display: block;}
/* End hide from IE-mac */
.clearfix {height: 1%;}
.clearfix {display: block;}

#sliding-panel * {
	text-shadow: none;
}

div.overview-dashboard {
}

div.overview-login {
}

div.overview {
  -moz-transform: scale(0.85);
  -moz-transform-origin: 0% 0%;
  -webkit-transform: scale(0.85);
  -webkit-transform-origin: 0% 0%;
  -ms-transform: scale(0.85);
  -ms-transform-origin: 0% 0%;
  -o-transform: scale(0.85);
  -o-transform-origin: 0% 0%;
}

div.overview-dashboard:after {content: ".";display: block;height: 0;clear: right;visibility: hidden;}
div.overview-login:after {content: ".";display: block;height: 0;clear: right;visibility: hidden;}

div.overview #sliding-panel {
    position: relative;
    width:980px;
}

div.overview #sliding-panel #panel {
	display: block;
	overflow: hidden ;
	height: auto;
}

/* sliding panel */
#sliding-panel {
<?php if($sliding_panel_content_display == 'Fixed'): ?>
    position: fixed;   /*Panel will overlap  content */
<?php elseif($sliding_panel_content_display == 'Overlay over Content'): ?>
    position: absolute;   /*Panel will overlap  content */
<?php else: ?>
    position: relative;   /*Panel will "push" the content down */
<?php endif; ?>
<?php if(is_admin_bar_showing() && $overlay): ?>
    top: 28px;
<?php else: ?>
    top: 0;
<?php endif; ?>
    left: 0;
    width: 100%;
    z-index: 10000; /* Work by default with twentyeleven theme */
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}

#sliding-panel #panel {
    width: 100%;
    /* height: 280px; */
    overflow: hidden;
    position: relative;
    z-index: 3;
    display: none;
}

#sliding-panel #panel p {
    margin: 5px 0 10px;
    padding: 0;
}

#sliding-panel #panel a {
    text-decoration: none;
}

#sliding-panel #panel ul {
    margin: 0 0 5px 0;
    padding: 0;
    line-height: 1.6em;
    list-style: none;
}

#sliding-panel #panel .content {
    width: 960px;
    margin: 0 auto;
    padding-top: 15px;
    text-align: left;
}

#sliding-panel #panel .content a {
}

#sliding-panel #panel .content .left {
    width: 280px;
    float: left;
    margin-bottom: 25px;
    padding: 0 15px;
    min-height: 220px;
    border-left: 1px solid #333;
}

#sliding-panel #panel .content .border {
    border-left: 1px solid #333;
}

#sliding-panel #panel .content .narrow {
    width:120px !important;
}

#sliding-panel #panel .content form {
    margin: 0;
}

#sliding-panel #panel .content label {
    float: left;
    padding-top: 8px;
    clear: both;
    width: 280px;
    display: block;
}

#sliding-panel #panel .content input.field {
    border: 1px #1A1A1A solid;
    margin-right: 5px;
    margin-top: 4px;
    width: 200px;
    height: 16px;
}

#sliding-panel #panel .lost-pwd {
    display: inline-block;
    text-decoration: underline;
}

/* Panel Tab/button */
#sliding-panel #register-message, #sliding-panel #login-message, #sliding-panel #lostpwd-message {
}

#login-message .login-success {
    color: #60ff60;
}

#login-message .login-failure {
    color: #ff6060;
}

#sliding-panel .content p {
}

/* Colors */

#sliding-panel #panel {
    color: <?php sliding_panel_c('text'); ?>;
    background-color:   <?php sliding_panel_c('background'); ?>;
}

#sliding-panel h1 {
    color: <?php sliding_panel_c('h1'); ?>;
}

#sliding-panel h2,
#sliding-panel .widget h3 {
    color: <?php sliding_panel_c('h2'); ?>;
}

#sliding-panel #panel a {
    color: <?php sliding_panel_c('link'); ?>;
}

#sliding-panel #panel a:hover {
    color: <?php sliding_panel_c('link_hover'); ?>;
}

#sliding-panel #panel .content input.field {
    background-color: <?php sliding_panel_c('field_bg'); ?>;
    color: <?php sliding_panel_c('field'); ?>;
}

#sliding-panel #panel .content .left {
    border-left: 1px solid <?php sliding_panel_c('panel_border'); ?>;
}

#sliding-panel #panel .content .border {
    border-left: 1px solid <?php sliding_panel_c('panel_border'); ?>;
}

#sliding-panel #panel .content input.field {
    border-color: <?php sliding_panel_c('field_border'); ?>;
}

#sliding-panel #panel .content input:focus.field {
    background-color: <?php sliding_panel_c('field_bg_focus'); ?>;
}

#sliding-panel input[type=submit].bt_login,
#sliding-panel input[type=submit].bt_lostpwd,
#sliding-panel input[type=submit].bt_register {
    clear:left;
    margin-top:8px;
    line-height: 16px;
    padding: 3px 8px 3px 8px;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
    -moz-box-sizing: content-box;
    border-radius: 11px 11px 11px 11px;
    border-style: solid;
    border-width: 1px;
    cursor: pointer;
    text-decoration: none;
    outline: 0 none;
    height: auto;
    width: auto;
}

#sliding-panel input[type=submit].bt_login {
    background: <?php sliding_panel_c('login_bg'); ?>;
    border-color: <?php sliding_panel_c('login_border'); ?>;
    color: <?php sliding_panel_c('login'); ?>;
}

#sliding-panel input[type=submit].bt_login:hover {
   color: <?php sliding_panel_c('login_hover'); ?>
}

#sliding-panel input[type=submit].bt_lostpwd {
    background: <?php sliding_panel_c('lostpwd_bg'); ?>;
    border-color: <?php sliding_panel_c('lostpwd_border'); ?>;
    color: <?php sliding_panel_c('lostpwd'); ?>;
}

#sliding-panel input[type=submit].bt_lostpwd:hover {
   color: <?php sliding_panel_c('lostpwd_hover'); ?>
}

#sliding-panel input[type=submit].bt_register {
    background: <?php sliding_panel_c('register_bg'); ?>;
    border-color: <?php sliding_panel_c('register_border'); ?>;
    color: <?php sliding_panel_c('register'); ?>;
}

#sliding-panel input[type=submit].bt_register:hover {
   color: <?php sliding_panel_c('register_hover'); ?>
}

/* Background Images */

<?php if(!empty($sliding_panel_options['panel_background'])): ?>
#sliding-panel #panel {
<?php if(empty($sliding_panel_options['panel_background_repeat'])): ?>
  background: url(<?php echo $sliding_panel_options['panel_background']; ?>) no-repeat left top  <?php sliding_panel_c('background'); ?>;
<?php else: ?>
  background: url(<?php echo $sliding_panel_options['panel_background']; ?>) repeat left top  <?php sliding_panel_c('background'); ?>;
<?php endif; ?>
}
<?php endif; ?>

<?php if(!empty($sliding_panel_options['content_background'])): ?>
#sliding-panel #panel .content {
<?php if(empty($sliding_panel_options['content_background_repeat'])): ?>
  background: url(<?php echo $sliding_panel_options['content_background']; ?>) no-repeat left top <?php sliding_panel_c('background'); ?>;
<?php else: ?>
  background: url(<?php echo $sliding_panel_options['content_background']; ?>) repeat left top  <?php sliding_panel_c('background'); ?>;
<?php endif; ?>
}
<?php endif; ?>

/* FONTS */

#sliding-panel {
	font-family: <?php sliding_panel_ff('panel'); ?>;
	font-size: <?php sliding_panel_fs('panel'); ?>;
}

#sliding-panel h1 {
    text-align: left;
    display: block ;
    margin: 10px 0 10px 0;
    font-family: <?php sliding_panel_ff('h1'); ?>;
    font-size: <?php sliding_panel_fs('h1'); ?>;
    font-weight: <?php sliding_panel_fw('h1'); ?>;
    font-style: <?php sliding_panel_fst('h1'); ?>;
    line-height: 100%;
}

#sliding-panel h2,
#sliding-panel .widget h3 {
    margin: 6px 0 6px 0;
    text-align: left;
    display: block;
    font-family: <?php sliding_panel_ff('h2'); ?>;
    font-size: <?php sliding_panel_fs('h2'); ?>;
    font-weight: <?php sliding_panel_fw('h2'); ?>;
    font-style: <?php sliding_panel_fst('h2'); ?>;
    line-height: 100%;
}

#sliding-panel input[type=submit].bt_login,
#sliding-panel input[type=submit].bt_lostpwd,
#sliding-panel input[type=submit].bt_register {
    font-family: <?php sliding_panel_ff('btn'); ?>;
    font-size: <?php sliding_panel_fs('btn'); ?>;
    font-weight: <?php sliding_panel_fw('btn'); ?>;
    font-style: <?php sliding_panel_fst('btn'); ?>;
}

#sliding-panel a span,
#sliding-panel h2 span {
   color: <?php sliding_panel_c('text') ?>;
}

#sliding-panel .widget {
  border: 0;
  background: none;
  box-shadow: none;
  clear: none;
}

<?php include(dirname(__FILE__) . '/slide-tab.css.php'); ?>

<?php echo $sliding_panel_options['extra_css']; ?>

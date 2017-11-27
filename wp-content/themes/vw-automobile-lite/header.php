<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Automobile Lite
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-automobile-lite'); ?></a></div>
  
  <div id="header">
    <div class="col-md-4">
        <div class="logowrapper">
          <div class="logo">
            <?php if( has_custom_logo() ){ vw_automobile_lite_the_custom_logo();
            }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; } ?>
          </div>
        </div>
    </div>
    <div class="col-md-8 padremove">
      <div class="con_details">       
        <div class="row marremove">
          <?php if(get_theme_mod('vw_automobile_lite_contact',true) != '') { ?>
          <div class="top-contact col-md-4 col-xs-12 col-sm-3">
             <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('vw_automobile_lite_contact','(518) 356-5373')); ?></span>
          </div>
          <?php } if(get_theme_mod('vw_automobile_lite_email',true) != '') { ?>  
          <div class="top-contact col-md-4 col-xs-12 col-sm-3">   
             <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_attr( get_theme_mod( 'vw_automobile_lite_email','support@vwthemes.com' ) ); ?></span>
          </div>
          <?php } if(get_theme_mod('vw_automobile_lite_headertimings',true) != '') { ?>  
          <div class="top-contact col-md-4 col-xs-12 col-sm-3">   
             <span class="timings"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('vw_automobile_lite_headertimings',__('Mon-Sat :7:00-19:00','vw-automobile-lite'))); ?></span>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="menubox">
          <div class="nav">
            <div class="container">
  		        <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
            </div>
          </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
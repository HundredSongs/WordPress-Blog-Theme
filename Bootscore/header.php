<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Wittgenstein:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
  
  <?php wp_head(); ?>

  <style>
    .top-nav-person  {
      background-color:white;
    }
    header {
      background-color:white;
    }
    nav {
      background-color:white;
    }
    body {

      background-color:#f5f3f3;
    }
    .serif-font-h {
      font-family: serif;
    }
    .nav-link {
      color:black;
    }
    .three-header-img {
      width: 100px;
      height: 75px;
      object-fit: cover;
    }
    .three-header-text {
      font-size: 12px;
    } 
    .top-color-navbar {
      background-color: #a02c2cff;
    }
    .main-index-img {
      width: 550px;
      height: 550px;
      object-fit: cover;
    }
    a { 
      color: #a02c2cff;
      text-decoration: none; 
    }
    .custom-btn {
      font-size: 18px;
      background-color: #a02c2cff;
      color: #fff;
    }
  </style>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- Top Color -->
<div class="p-1 top-color-navbar"></div>

<!-- If it's a Desktop do: -->

<nav class="top-nav-person d-none d-md-block"> <!-- hide on d-none d-sm-block -->

<div id="page" class="site">
  
  <a class="skip-link visually-hidden-focusable" href="#primary"><?php esc_html_e( 'Skip to content', 'bootscore' ); ?></a>

  <!-- Top Bar Widget -->
  <?php if (is_active_sidebar('top-bar')) : ?>
    <?php dynamic_sidebar('top-bar'); ?>
  <?php endif; ?>

  <!-- handmade header by João Roque -->
  <div class="container ">
    <header id="masthead" class="border-bottom lh-1 py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">

        <div class="col-4 pt-1">
          <a class="link-secondary" href="#">Subscribe</a>
        </div>
        
        <div class="col-4 text-center">

          <!-- Navbar Brand -->
          <a class="navbar-brand" href="<?= esc_url(home_url()); ?>">
            <?php the_custom_logo(); ?>
            <!-- <img src="<?= esc_url(apply_filters('bootscore/logo', get_stylesheet_directory_uri() . '/assets/img/logo/logo-knot.png', 'default')); ?>" width="250" alt="Logo"> -->
            <!-- <img src="<?= esc_url(apply_filters('bootscore/logo', get_stylesheet_directory_uri() . '/assets/img/logo/logo-theme-dark.svg', 'theme-dark')); ?>" width="250" alt="<?php bloginfo('name'); ?> Logo" class="d-tl-none me-2"> -->
          </a>  

        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <div class="col-9"><?php get_search_form(); ?></div>
          <!--
          <a class="link-secondary" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
          </a>
          -->
          <a class="btn btn-sm btn-outline-secondary rounded" href="#">Donate</a>
        </div>
      </div>
    </header>

    <div class="nav-scroller navbar-collapse" id="navbarNav">
      
      <nav class="nav nav-underline justify-content-between">
        <?php
        // Bootstrap 5 Nav Walker
        wp_nav_menu(array(
          'theme_location' => 'main-menu',
          'container'      => false,
          'menu_class'     => '',
          'fallback_cb'    => '__return_false',
          'items_wrap'     => '<p id="bootscore-navbar" class="nav-item nav-link link-body-emphasis %2$s">%3$s</p>',
          'depth'          => 2,
          'walker'         => new bootstrap_5_wp_nav_menu_walker()
        ));
        ?>
      </nav>
    </div>
</div>

    <?php
    if (class_exists('WooCommerce')) :
      get_template_part('template-parts/header/collapse-search', 'woocommerce');
    else :
      get_template_part('template-parts/header/collapse-search');
    endif;
    ?>

    <!-- Offcanvas User and Cart -->
    <?php
    if (class_exists('WooCommerce')) :
      get_template_part('template-parts/header/offcanvas', 'woocommerce');
    endif;
    ?>

  </nav><!-- #masthead -->


<!-- If it's a Mobile do: -->
  
  <nav class="top-nav-person d-block d-md-none">

    <div class="row p-2">
      
      
        <nav class="navbar bg-body">
          <div class="container-fluid">
            
          <div class="col-2">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="true" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>

            
          <div class="col">

              <a class="navbar-brand" href="<?= esc_url(home_url()); ?>">
                <?php the_custom_logo(); ?>
                <!-- <img src="<?= esc_url(apply_filters('bootscore/logo', get_stylesheet_directory_uri() . '/assets/img/logo/logo-knot.png', 'default')); ?>" width="250" alt="Logo"> -->
              </a>

          </div>


            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll" >
              <?php
                // Bootstrap 5 Nav Walker
                wp_nav_menu(array(
                  'theme_location' => 'main-menu',
                  'container'      => false,
                  'menu_class'     => '',
                  'fallback_cb'    => '__return_false',
                  'items_wrap'     => '<li class="nav-item"><a aria-current="page" class="nav-link active %2$s">%3$s</a></li>',
                  'depth'          => 2,
                  'walker'         => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
              </ul>
            </div>

          </div>
        </nav>


    </div>

  </nav>

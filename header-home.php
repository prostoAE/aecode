<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aecode
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="loader">
  <div class="screen-bg">
    <div class="screen-bg__left"></div>
    <div class="screen-bg__right"></div>
  </div>
  <div class="loader__elems">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>
</div>
<!-- /.loader -->

<header class="home-header">
  <div class="logo"><?php the_custom_logo(); ?></div>
  <div class="top-nav-icon">
    <div class="hamburger"></div>
  </div>

  <?php
  wp_nav_menu( [
	  'theme_location'  => '',
	  'menu'            => 'home-menu',
	  'container'       => 'nav',
	  'container_class' => 'top-nav',
	  'menu_class'      => 'top-nav__list',
	  'add_li_class'    => 'top-nav__item',
	  'echo'            => true,
	  'fallback_cb'     => 'wp_page_menu',
	  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  ] );
  ?>
  <!-- /.top-nav -->
</header>
<!-- /.header -->

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

<header class="header">
  <div class="header-wrapper">
    <div class="logo"><?php the_custom_logo(); ?></div>

	  <?php
	  wp_nav_menu( [
		  'theme_location'  => '',
		  'menu'            => 'home-menu',
		  'container'       => 'nav',
		  'container_class' => 'top-menu',
		  'menu_class'      => 'top-menu__list',
		  'add_li_class'    => 'top-menu__item',
		  'echo'            => true,
		  'fallback_cb'     => 'wp_page_menu',
		  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	  ] );
	  ?>

    <div class="mobile-menu">
      <div class="top-nav-icon">
        <div class="hamburger"></div>
      </div>

      <nav class="top-nav">
        <ul class="top-nav__list">
          <li class="top-nav__item"><a href="./index.html">Главная</a></li>
          <li class="top-nav__item"><a href="./archive-portfolio.html">Портфолио</a></li>
          <li class="top-nav__item"><a href="./about.html">Обо мне</a></li>
          <li class="top-nav__item"><a href="./archive-service.html">Услуги</a></li>
          <li class="top-nav__item"><a href="./archive-blog.html">Блог</a></li>
          <li class="top-nav__item"><a href="./contacts.html">Контакты</a></li>
        </ul>
      </nav>
    </div>
    <!-- /.mobile-menu -->

    <div class="search" id="search-modal">
      <span class="search__icon"></span>
    </div>
  </div>
</header>
<!-- /.header -->

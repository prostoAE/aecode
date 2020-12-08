<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aecode
 */
global $aecode_options;
?>

<footer class="footer">
  <div class="footer-info">
    <div class="logo"><a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/logo-footer.png' ?>"
                                       alt="logo"></a></div>
    <div class="footer-socials">
      <a class="footer-socials__link" href="#" target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a class="footer-socials__link" href="#" target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a class="footer-socials__link" href="#" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a class="footer-socials__link" href="#" target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
    </div>
    <div class="copyright">
      <p><?php echo ( $aecode_options['footer-copyright1'] ) ? $aecode_options['footer-copyright1'] : ''; ?></p>
      <span><?php echo ( $aecode_options['footer-copyright2'] ) ? $aecode_options['footer-copyright2'] : ''; ?></span>
    </div>
  </div>

  <div class="footer-menu">
    <h3 class="footer-menu__title">Основное</h3>
		<?php
		wp_nav_menu( [
			'menu'         => 'home-menu',
			'container'    => 'nav',
			'menu_class'   => 'footer-menu__list',
			'add_li_class' => 'footer-menu__item',
			'echo'         => true,
			'fallback_cb'  => 'wp_page_menu',
			'items_wrap'   => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		] );
		?>
  </div>

  <div class="footer-services">
    <h3 class="footer-services__title">Услуги</h3>
		<?php
		wp_nav_menu( [
			'menu'         => 'home-footer-menu',
			'container'    => 'nav',
			'menu_class'   => 'footer-services__list',
			'add_li_class' => 'footer-services__item',
			'echo'         => true,
			'fallback_cb'  => 'wp_page_menu',
			'items_wrap'   => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		] );
		?>
  </div>

  <div class="footer-subscribe">
    <h3 class="footer-subscribe__title">Новости</h3>
    <p class="footer-subscribe__desc"><?php echo ( $aecode_options['footer-subscribe-text'] ) ? $aecode_options['footer-subscribe-text'] : ''; ?></p>


		<?php
		if ( $aecode_options['footer-subscribe-shortcode'] ) {
			echo do_shortcode( $aecode_options['footer-subscribe-shortcode'] );
		}
		?>
    <!-- /.subscribe-form -->
  </div>

</footer>
<!-- /.footer -->

<?php
if(is_front_page()) {
	get_template_part('template-parts/popups');
}
if(!is_front_page()) {
	get_template_part('template-parts/search-popup');
}
?>

<?php wp_footer(); ?>

</body>
</html>

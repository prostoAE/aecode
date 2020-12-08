<?php
/**
 * Template name: Шаблон: Контакты
 */
get_header();
global $aecode_options;
?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="services-banner" style="background: url(<?php echo ( $aecode_options['contacts-banner']['url'] ) ? $aecode_options['contacts-banner']['url'] : null; ?>) no-repeat top/cover;">
		<h1 class="services-banner__title"><?php the_title(); ?></h1>
	</section>
	<!-- /.contacts-banner -->

	<section class="feedback">
		<div class="container">
			<div class="section-header-block">
				<h2 class="section-header section-header-block__title">Напишите мне</h2>
			</div>

			<h3 class="feedback__title"><?php echo ($aecode_options['form-caption']) ? $aecode_options['form-caption'] : ''; ?></h3>

			<div class="form-wrapper">
				<div class="contact-form">
					<div class="contact-form__info">
						<h2 class="contact-form__title">Контакты</h2>
						<p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-adress"></span>г. Киев Проспект Героев Сталинграда 17-А кв. 126</p>
						<p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-email"></span>trident998@gmail.com</p>
						<p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-skype"></span>mixa778</p>
						<p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-phone"></span>+38 097 775 75 75</p>
					</div>

					<?php if ( $aecode_options['form-shortcode'] ) : ?>
            <div class="contact-form__fields">
							<?php echo do_shortcode( $aecode_options['form-shortcode'] ); ?>
            </div>
					<?php endif; ?>

					<div class="bg-dots bg-dots-top">
						<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
					</div>
					<div class="bg-dots bg-dots-bottom">
						<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container -->
	</section>
	<!-- /.feedback -->

	<section class="map">
		<div class="map-container">
      <?php echo ($aecode_options['map-shortcode']) ? do_shortcode($aecode_options['map-shortcode']) : null; ?>
		</div>
	</section>

<?php
endwhile;
get_footer();
?>

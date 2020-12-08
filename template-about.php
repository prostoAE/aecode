<?php
/**
 * Template name: Шаблон: Обо мне
 */
get_header();
global $aecode_options;
?>

<?php while ( have_posts() ) : the_post(); ?>
  <section class="services-banner"
           style="background: url(<?php echo ( $aecode_options['about-banner']['url'] ) ? $aecode_options['about-banner']['url'] : null; ?>) no-repeat top/cover;">
    <h1 class="services-banner__title"><?php the_title(); ?></h1>
  </section>
  <!-- /.about-banner -->

  <section class="about">
    <div class="container">
      <div class="about-info">
        <div class="about-info__photo">
					<?php if ( $aecode_options['page-about-photo'] ) : ?>
            <img class="about-info__img" src="<?php echo $aecode_options['page-about-photo']['url']; ?>"
                 alt="<?php echo $aecode_options['page-about-photo']['alt']; ?>">
            <img class="about-info__img-shadow" src="<?php echo $aecode_options['page-about-photo']['url']; ?>"
                 alt="<?php echo $aecode_options['page-about-photo']['alt']; ?>">
					<?php endif; ?>
        </div>


        <div class="about-info__desc">
          <h2 class="about-info__title"><?php echo ( $aecode_options['page-about-title'] ) ? $aecode_options['page-about-title'] : ''; ?></h2>
          <p class="about-info__text"><?php echo ( $aecode_options['page-about-desc'] ) ? $aecode_options['page-about-desc'] : ''; ?></p>
          <a href="<?php echo ( $aecode_options['page-about-link'] ) ? $aecode_options['page-about-link'] : '#'; ?>"
             class="about-info__btn"><span>Смотерть видео</span></a>
        </div>
      </div>
      <!-- /.about-info -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /.about -->

  <section class="sertificats">
    <div class="container">
      <div class="section-header-block">
        <h2 class="section-header section-header-block__title">Сертификаты</h2>
      </div>

      <div class="slider">
        <ul class="slider__list owl-carousel" id="sertif-slider">
					<?php
					if ( $aecode_options['sertificats-slides'] ) :
						$slider = $aecode_options['sertificats-slides'];
//					var_dump( $slider );
						foreach ( $slider as $slide ) : ?>
              <li class="slider__item">
                <div class="sertificate-info">
                  <p class="sertificate-desc"><?php echo $slide['description']; ?></p>
                </div>
                <img class="sertificate-img" src="<?php echo $slide['image']; ?>" alt="sertificate image">
              </li>
						<?php endforeach; ?>
					<?php endif; ?>

        </ul>
      </div>
      <!-- /.slider -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /.sertificats -->

  <section class="contacts">
    <div class="container">
      <div class="section-header-block">
        <h2 class="section-header section-header-block__title">Связаться со мной</h2>
      </div>

      <div class="contact-form">
        <div class="contact-form__info">
          <h2 class="contact-form__title">Контакты</h2>
          <p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-adress"></span>г. Киев
            Проспект Героев Сталинграда 17-А кв. 126</p>
          <p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-email"></span>trident998@gmail.com
          </p>
          <p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-skype"></span>mixa778</p>
          <p class="contact-form__desc"><span class="contact-form__icon contact-form__icon-phone"></span>+38 097 775 75
            75</p>
        </div>
				<?php if ( $aecode_options['about-form'] ) : ?>
          <div class="contact-form__fields">
						<?php echo do_shortcode( $aecode_options['about-form'] ); ?>
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
    <!-- /.container -->
  </section>
  <!-- /.contacts -->


<?php
endwhile;
get_footer();
?>

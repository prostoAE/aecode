<?php
get_header();
global $aecode_options;
?>

<?php
while ( have_posts() ): the_post(); ?>

  <section class="services-banner"
           style="background: url(<?php echo ( $aecode_options['portfolio-banner']['url'] ) ? $aecode_options['portfolio-banner']['url'] : null; ?>) no-repeat top/cover;">
    <h1 class="services-banner__title"><?php the_title(); ?></h1>
  </section>
  <!-- /.services-banner -->

  <section class="portfolio-details">
    <div class="container">
      <div class="portfolio-details-wrapper">
        <div class="portfolio-details-slider">
          <div class="owl-carousel" id="singPortfolio" data-slider-id="1">
						<?php
						$gallery = get_field( 'galereya' );
						if ( $gallery ) :
							foreach ( $gallery as $photo ) : ?>
                <div class="portfolio-details-slider__item">
                  <img class="portfolio-details-slider__image" src="<?php echo $photo; ?>" alt="slide image">
                </div>
							<?php endforeach;
						else: ?>
              <div class="portfolio-details-slider__item">
                <img class="portfolio-details-slider__image"
                     src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="slide image">
              </div>
						<?php endif; ?>
          </div>
          <div class="owl-thumbs" data-slider-id="1">
						<?php
						if ( $gallery ) :
							foreach ( $gallery as $thumb ) : ?>
                <img class="owl-thumb-item" src="<?php echo $thumb; ?>" alt="">
							<?php endforeach;
						else: ?>
              <img class="owl-thumb-item" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ); ?>" alt="">
						<?php endif; ?>
          </div>
        </div>

        <div class="portfolio-details-desc">
          <h2 class="portfolio-details-desc__title"><?php the_title(); ?></h2>
          <div class="portfolio-details-desc__text"><?php the_content(); ?></div>

          <div class="bg-dots">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
          </div>
          <!-- /.bg-dots -->
        </div>

        <a class="portfolio-details__btn" href="<?php the_field( 'ssylka_na_demo' ); ?>">Смотреть Демо</a>
      </div>

    </div>
    <!-- /.container -->
  </section>
  <!-- /.services-archive -->

<?php endwhile; ?>

<?php
get_footer();
?>

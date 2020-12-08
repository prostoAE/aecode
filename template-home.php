<?php
/**
 * Template name: Шаблон: Главная
 */
get_header( 'home' );
global $aecode_options;
?>

<?php while ( have_posts() ) : the_post(); ?>
  <main class="offer">
    <!--Slider-->
    <div class="offer-slider">
      <div class="owl-carousel" id="offer-slider">
				<?php
				$myGalleryIDs = explode( ',', $aecode_options['offer-gallery'] );
				foreach ( $myGalleryIDs as $myPhotoID ):
					$photoArray = wp_get_attachment_image( $myPhotoID );
					?>
          <div class="owl-carousel__item"
               style="background: url(<?php echo wp_get_attachment_url( $myPhotoID ); ?>) no-repeat top/cover;">
          </div>
				<?php endforeach; ?>
      </div>
    </div>
    <!--/Slider-->

    <div class="offer__action">
      <h1 class="offer__title"><?php if ( $aecode_options['offer-title'] ) {
					echo $aecode_options['offer-title'];
				} ?></h1>
      <button class="offer__btn">Связаться</button>
    </div>

    <div class="offer-socials">
			<?php if ( $aecode_options['fb-link'] ) : ?>
        <a class="offer-socials__link" href="<?php echo $aecode_options['fb-link']; ?>" target="_blank">
          <i class="fab fa-facebook-f"></i>
        </a>
			<?php endif ?>
			<?php if ( $aecode_options['tw-link'] ) : ?>
        <a class="offer-socials__link" href="<?php echo $aecode_options['tw-link']; ?>" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
			<?php endif ?>
			<?php if ( $aecode_options['youtube-link'] ) : ?>
        <a class="offer-socials__link" href="<?php echo $aecode_options['youtube-link']; ?>" target="_blank">
          <i class="fab fa-youtube"></i>
        </a>
			<?php endif ?>
			<?php if ( $aecode_options['inst-link'] ) : ?>
        <a class="offer-socials__link" href="<?php echo $aecode_options['inst-link']; ?>" target="_blank">
          <i class="fab fa-instagram"></i>
        </a>
			<?php endif ?>
    </div>

  </main>
  <!-- /.offer -->

  <section class="portfolio">
    <div class="container">
      <div class="section-header-block">
        <a class="section-header-block__btn" href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>">Смотреть
          все</a>
        <h2 class="section-header section-header-block__title">Мои последние работы</h2>
      </div>

      <!--Portfolio Slider-->
      <div class="portfolio-slider">
        <div class="owl-carousel" id="portfolio-slider">
					<?php
					$portfolio_items = new WP_Query( array(
						'post_type'      => 'portfolio',
						'posts_per_page' => 5
					) );
					while ( $portfolio_items->have_posts() ) : $portfolio_items->the_post(); ?>
            <div class="owl-carousel__item">
              <div class="owl-carousel__left">
                <div class="owl-carousel__desc">
									<?php echo wp_trim_words( get_the_content(), 25, '...' ); ?>
                </div>
              </div>
              <div class="owl-carousel__right">
                <img class="owl-carousel__img"
                     src="<?php echo get_the_post_thumbnail_url( get_the_ID(), [ 777, 444 ] ); ?>"
                     alt="portfolio-image">
                <img class="owl-carousel__img-shadow"
                     src="<?php echo get_the_post_thumbnail_url( get_the_ID(), [ 777, 444 ] ); ?>"
                     alt="portfolio-image">
              </div>
            </div>
					<?php endwhile;
					wp_reset_postdata();
					?>
        </div>

        <div class="bg-dots">
          <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <!-- /.bg-dots -->
      </div>
      <!--/Slider-->
    </div>
    <!--  /container-->

  </section>
  <!-- /.portfolio -->

  <section class="about">
    <div class="container">
      <div class="wrapper">
        <div class="about-photo">
					<?php if ( $aecode_options['about-photo']['url'] ) :
						?>
            <img class="about-photo__img" src="<?php echo $aecode_options['about-photo']['url']; ?>"
                 alt="about-image">
            <img class="about-photo__img-shadow" src="<?php echo $aecode_options['about-photo']['url']; ?>"
                 alt="about-image">
					<?php endif; ?>
          <!--          <img class="about-photo__icon" src="wp-content/themes/aecode/assets/img/play-icon.png" alt="play-icon">-->
        </div>
        <div class="about-desc">
          <h2 class="section-header"><?php echo ( $aecode_options['about-title'] ) ? $aecode_options['about-title'] : ''; ?></h2>
          <p class="about-desc__text"><?php echo ( $aecode_options['about-desc'] ) ? $aecode_options['about-desc'] : ''; ?></p>
          <a class="about-desc__btn" href="<?php echo get_page_link( 30 ) ?>">Узнать больше</a>
        </div>
      </div>
    </div>
    <!-- /.container -->
  </section>
  <!-- /.about -->

  <section class="services">
    <div class="container">
			<?php
			$service_items = new WP_Query( array(
				'post_type'      => 'services',
				'posts_per_page' => 3,
				'orderby'        => 'ID',
				'order'          => 'ASC'
			) );
			if ( $service_items->have_posts() ) :
				while ( $service_items->have_posts() ) : $service_items->the_post(); ?>
          <div class="service-item">
            <div class="service-item__wrapper">
              <div class="service-item__content">
                <h2 class="section-header service-item__header"><?php the_title(); ?></h2>
                <div class="service-item__text"><?php the_content(); ?></div>
                <a href="<?php the_permalink(); ?>" class="service-item__btn">Подробнее</a>
              </div>
              <div class="service-item__photo">
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), [ 427, 511 ] ); ?>" alt="service-img">
              </div>
            </div>
          </div>
				<?php endwhile;
				wp_reset_postdata();
			endif; ?>
      <!-- /.service-item -->

      <div class="all-services-block">
        <h2 class="section-header all-services-block__title">Весь перечень услуг</h2>
        <a class="all-services-block__btn" href="<?php echo get_post_type_archive_link( 'services' ); ?>">Смотреть</a>

        <div class="bg-dots">
          <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
      </div>

    </div>
    <!-- /.container -->
  </section>
  <!-- /.services -->

  <section class="blog">
    <div class="container">
      <div class="blog-header">
        <h2 class="section-header blog-header__title">Последние записи блога</h2>
        <a class="blog-header__btn" href="<?php echo get_post_type_archive_link( 'news' ); ?>">Больше</a>
      </div>

      <div class="posts">
        <ul class="posts__list">
					<?php
					$service_items = new WP_Query( array(
						'post_type'      => 'news',
						'posts_per_page' => 3,
						'orderby'        => 'date',
//						'order'          => 'ASC'
					) );
					if ( $service_items->have_posts() ) :
						while ( $service_items->have_posts() ) : $service_items->the_post(); ?>
              <li class="posts__item">
                <a href="<?php the_permalink(); ?>" class="posts__link">
                  <img class="posts__img" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), [ 400, 238 ] ); ?>"
                       alt="post_photo">
                  <div class="posts__meta">
                    <span class="posts__user"><?php echo get_the_author(); ?></span>
                    <span class="posts__date"><?php echo get_the_date(); ?></span>
                  </div>
                  <div class="posts__content">
                    <h3 class="posts__header"><?php the_title(); ?></h3>
                    <div class="posts__desc"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' );?></div>
                  </div>
                </a>
              </li>
						<?php endwhile;
						wp_reset_postdata();
					endif; ?>
          <!-- /.posts__item -->
        </ul>
        <!-- /.posts__list -->
      </div>
      <!-- /.posts -->

    </div>
    <!-- /.container -->
  </section>
  <!-- /.blog -->
<?php endwhile; ?>

<?php get_footer(); ?>

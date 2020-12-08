<?php
get_header();
global $aecode_options;
$archive_title = explode( ':', get_the_archive_title() );
?>

<section class="services-banner"
         style="background: url(<?php echo ($aecode_options['portfolio-banner']['url']) ? $aecode_options['portfolio-banner']['url'] : null; ?>) no-repeat top/cover;">
  <h1 class="services-banner__title"><?php echo $archive_title[1]; ?></h1>
</section>
<!-- /.services-banner -->

<section class="archive-portfolio">

  <div class="portfolio-filter">

    <ul class="portfolio-filter__list" id="filter">
      <li class="portfolio-filter__item active">Все</li>
			<?php
			$categories = get_categories( [
				'taxonomy' => 'portfolio-type',
				'type'     => 'post',
				'orderby'  => 'name',
				'order'    => 'ASC',
			] );

			foreach ( $categories as $category ) : ?>
        <li class="portfolio-filter__item"><?php echo $category->name; ?></li>
			<?php endforeach; ?>

    </ul>
    <!-- /.portfolio-filter__list -->
  </div>
  <!-- /.portfolio-filter -->

  <div class="container">

    <ul class="portfolio__list">
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
					<?php
					$category_list = get_the_terms( get_the_ID(), 'portfolio-type' );
					$cat_arr       = [];
					foreach ( $category_list as $cat_item ) {
						$cat_arr[] = $cat_item->name;
					}
					?>
          <li class="portfolio__item" data-cat="<?php echo implode( '_', $cat_arr ); ?>">
            <div class="portfolio__img_wrapper">
              <img class="portfolio__img"
                   src="<?php echo get_the_post_thumbnail_url( get_the_ID(), [ 420, 330 ] ); ?>" alt="portfolio img">
              <a class="portfolio__link" href="<?php the_permalink(); ?>">
                <span></span>
              </a>
            </div>
            <div class="portfolio__desc">
              <h3 class="portfolio__title"><?php the_title() ?></h3>
              <p class="portfolio__subtitle"><?php echo implode( ', ', $cat_arr ); ?></p>
            </div>
          </li>
				<?php endwhile;
			endif; ?>

    </ul>
    <!-- /.portfolio-archive__list -->

  </div>
  <!-- /.container -->
</section>
<!-- /.services-archive -->

<?php get_footer(); ?>

<?php
get_header();
global $aecode_options;
$archive_title = explode( ':', get_the_archive_title() );
?>

<section class="services-banner"
         style="background: url(<?php echo ( $aecode_options['service-banner']['url'] ) ? $aecode_options['service-banner']['url'] : null; ?>) no-repeat top/cover;">
  <h1 class="services-banner__title"><?php echo $archive_title[1]; ?></h1>
</section>
<!-- /.services-banner -->

<section class="services-archive">
  <div class="container">
    <div class="section-header-block">
      <h2 class="section-header section-header-block__title">Что мы предлагаем</h2>
    </div>

    <ul class="services-archive__list">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
			?>
          <li class="services-archive__item">
            <div class="services-archive__img_wrapper">
              <img class="services-archive__img" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), [ 415, 300 ] ); ?> " alt="<?php echo get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true); ?>">
              <a class="services-archive__link" href="<?php the_permalink(); ?>">
                <span></span>
              </a>
            </div>
            <div class="services-archive__desc">
              <h3 class="services-archive__title"><?php the_title(); ?></h3>
            </div>
          </li>
				<?php
				endwhile;
			endif;
			?>
    </ul>
    <!-- /.services-archive__list -->

  </div>
  <!-- /.container -->
</section>
<!-- /.services-archive -->

<?php get_footer(); ?>

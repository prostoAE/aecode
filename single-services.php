<?php
get_header();
global $aecode_options;
?>

<?php
while ( have_posts() ): the_post(); ?>

<section class="services-banner" style="background: url(<?php echo ( $aecode_options['service-banner']['url'] ) ? $aecode_options['service-banner']['url'] : null; ?>) no-repeat top/cover;">
	<h1 class="services-banner__title">Услуги</h1>
</section>
<!-- /.services-banner -->

<section class="service">
	<div class="container">

		<div class="single-service">
			<div class="single-service__img-block">
				<img class="single-service__img" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), [690, 500]) ?>">
			</div>
			<div class="single-service__desc">
				<h2 class="single-service__title"><?php the_title(); ?></h2>
				<div class="single-service__text"><?php the_content(); ?></div>
			</div>

			<div class="bg-dots">
				<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
			</div>
		</div>
		<!-- /.single-service -->

		<a class="single-service__btn" href="<?php echo get_post_type_archive_link('services'); ?>">Все услуги</a>
	</div>
	<!-- /.container -->
</section>
<!-- /.services-archive -->
<?php endwhile; ?>

<?php
get_footer();
?>

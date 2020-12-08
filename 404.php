<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package aecode
 */

get_header();
?>

	<section id="primary" class="blog-archive">
		<main id="main" class="container">

			<div class="wrapper">
				<header class="page-header">
					<h1 class="page-title">Страниц не найдена!</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php echo '<a href="'. get_home_url() .'">Вернуться на главную:</a>'; ?></p>

				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

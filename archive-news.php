<?php
get_header();
global $aecode_options;
$archive_title = explode( ':', get_the_archive_title() );
?>

<section class="services-banner"
         style="background: url(<?php echo ( $aecode_options['blog-banner']['url'] ) ? $aecode_options['blog-banner']['url'] : null; ?>) no-repeat top/cover;">
  <h1 class="services-banner__title"><?php echo $archive_title[1]; ?></h1>
</section>
<!-- /.services-banner -->

<section class="blog-archive">
  <div class="container">
    <div class="page-wrapper">
      <div class="articles">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$news = new WP_Query( array(
					'post_type' => 'news',
	        'paged' => $paged
				) );

				if ( $news->have_posts() ) :
					while ( $news->have_posts() ) : $news->the_post(); ?>
            <article class="articles__item">
              <img class="articles__img" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
                   alt="post image">
              <div class="articles__meta">
                <span class="articles__date"><?php echo get_the_date(); ?></span>
                <span class="articles__user"><?php the_author(); ?></span>
								<?php
								$categories = get_the_terms( get_the_ID(), 'news-type' );
								if ( $categories ) :
									$category = array_shift( $categories );
									?>
                  <span class="articles__taxonomy"><?php echo $category->name; ?></span>
								<?php endif; ?>
              </div>
              <h2 class="articles__title"><?php the_title() ?></h2>
              <p class="articles__desc"><?php echo get_the_excerpt(); ?></p>
              <a class="articles__link" href="<?php the_permalink(); ?>">Читать всё</a>
            </article>
					<?php endwhile;
				endif; ?>

        <?php
        $big = 999999999; // уникальное число для замены

        $args = array(
	        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
	        'format' => '?paged=%#%',
	        'type' => 'list',
	        'current' => max(1, get_query_var('paged')),
	        'prev_next' => false,
	        'prev_text' => '',
	        'next_text' => '',
	        'total'   => $news->max_num_pages,
        );

        $result = paginate_links( $args );

        // удаляем добавку к пагинации для первой страницы
        $result = preg_replace( '~/page/1/?([\'"])~', '\1', $result );

        echo $result;
        ?>
        <!-- /.pagination -->
      </div>
      <!-- /.articles -->


<!--      </aside>-->
	    <?php get_sidebar(); ?>
      <!-- /.sidebar -->

    </div>
    <!-- /.page-wrapper -->
  </div>
  <!-- /.container -->
</section>
<!-- /.services-archive -->

<?php get_footer(); ?>

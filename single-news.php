<?php
get_header();
global $aecode_options;
?>

<?php
if ( have_posts() ) :
	while ( have_posts() )  : the_post();
		?>
    <section class="services-banner"
             style="background: url(<?php echo ( $aecode_options['blog-banner']['url'] ) ? $aecode_options['blog-banner']['url'] : null; ?>) no-repeat top/cover;">
      <h1 class="services-banner__title"><?php the_title(); ?></h1>
    </section>
    <!-- /.services-banner -->

    <section class="blog-single">
      <div class="container">
        <div class="page-wrapper">
          <div class="articles single-article">
            <article class="articles__item single-article__item">
              <h2 class="articles__title single-article__title"><?php the_title(); ?></h2>
              <img class="articles__img single-article__img" src="<?php echo get_the_post_thumbnail_url(); ?>"
                   alt="post image">
              <div class="articles__meta">
                <span class="articles__date"><?php the_date(); ?></span>
                <span class="articles__user"><?php the_author(); ?></span>
								<?php
								$categories = get_the_terms( get_the_ID(), 'news-type' );
								if ( $categories ) :
									$category = array_shift( $categories );
									?>
                  <span class="articles__taxonomy"><?php echo $category->name; ?></span>
								<?php endif; ?>
              </div>
							<?php the_content(); ?>
            </article>

            <div class="article-meta">
              <div class="article-links">
                <div class="article-tegs">
                  Теги:
                  <ul class="article-tegs__list">
										<?php
										$tags = get_the_tags();
										if ( $tags ) :
											foreach ( $tags as $tag ) : ?>
                        <li class="article-tegs__item"><span><?php echo $tag->name; ?></span></li>
											<?php
											endforeach;
										endif; ?>
                  </ul>
                </div>
              </div>
              <!-- /.article-links -->

              <div class="article-share">
                Поделиться:
                <div class="article-share__list">
                  <a class="article-share__link" href="<?php echo aecode_get_share('fb', get_the_permalink(), get_the_title()); ?>" onclick="window.open(this.href, 'Share on VK', 'width=600,height=300'); return false">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a class="article-share__link" href="<?php echo aecode_get_share('twi', get_the_permalink(), get_the_title()); ?>" onclick="window.open(this.href, 'Share on VK', 'width=600,height=300'); return false">
                    <i class="fab fa-twitter"></i>
                  </a>
                </div>
              </div>
              <!-- /.article-share -->
            </div>
            <!-- /.article-meta -->

          </div>
          <!-- /.single-article -->

					<?php get_sidebar(); ?>

        </div>
        <!-- /.page-wrapper -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.services-archive -->

	<?php
	endwhile;
endif;
?>

<?php get_footer(); ?>

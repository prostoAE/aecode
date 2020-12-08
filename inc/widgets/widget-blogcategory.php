<?php

/**
 * Blog Widget
 */
class Aecode_Blogcategory_Widget extends WP_Widget {

	/**
	 * General Setup
	 */
	public function __construct() {

		/* Widget settings. */
		$widget_ops = array(
			'classname'   => 'aecode_blogcategory_widget',
			'description' => 'Виджет, который выводит категории записей'
		);
		/* Widget control settings. */
		$control_ops = array(
			'width'   => 500,
			'height'  => 450,
			'id_base' => 'aecode_blogcategory_widget'
		);
		/* Create the widget. */
		parent::__construct( 'aecode_blogcategory_widget', 'Aecode | Категории новостей', $widget_ops, $control_ops );
	}

	/**
	 * Display Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$wwidget_title = $instance['custom_placeholder'];

		// Display Widget
		?>

    <div class="widget-taxonomy">
      <h3 class="widget-taxonomy__title"><?php echo $wwidget_title; ?></h3>
      <ul class="widget-taxonomy__list">
	      <?php
	      $news_categories = get_terms( [
		      'taxonomy'      => array( 'news-type' ),
		      'get'           => 'all',
	      ]);

	      foreach ( $news_categories as $news_category ) : ?>
        <li class="widget-taxonomy__item">
          <a href="<?php echo get_term_link($news_category); ?>" class="widget-taxonomy__link"><?php echo $news_category->name; ?></a>
        </li>
	      <?php endforeach; ?>
      </ul>
      <!-- /.widget-taxonomy__list -->
    </div>
    <!-- /.widget-taxonomy -->

		<?php
	}

	/**
	 * Update Widget
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['custom_placeholder'] = strip_tags( $new_instance['custom_placeholder'] );

		return $instance;
	}

	/**
	 * Widget Settings
	 *
	 * @param array $instance
	 */
	public function form( $instance ) {
		//default widget settings.
		$defaults = array(
			'custom_placeholder' => 'Категории',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>
    <p>
      <label for="<?php echo $this->get_field_id( 'custom_placeholder' ); ?>">Плейсхолдер</label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'custom_placeholder' ); ?>"
             name="<?php echo $this->get_field_name( 'custom_placeholder' ); ?>"
             value="<?php echo $instance['custom_placeholder']; ?>"/>
    </p>

		<?php
	}
}

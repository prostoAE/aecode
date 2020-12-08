<?php

/**
 * Blog Widget
 */
class Aecode_Blogtags_Widget extends WP_Widget {

	/**
	 * General Setup
	 */
	public function __construct() {

		/* Widget settings. */
		$widget_ops = array(
			'classname'   => 'aecode_blogtags_widget',
			'description' => 'Виджет, который выводит теги'
		);
		/* Widget control settings. */
		$control_ops = array(
			'width'   => 500,
			'height'  => 450,
			'id_base' => 'aecode_blogtags_widget'
		);
		/* Create the widget. */
		parent::__construct( 'aecode_blogtags_widget', 'Aecode | Теги новостей', $widget_ops, $control_ops );
	}

	/**
	 * Display Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$wwidget_title = $instance['widget_title'];

		// Display Widget
		?>

		<div class="widget-tegs">
			<h3 class="widget-tegs__title"><?php echo $wwidget_title; ?></h3>
			<div class="widget-tegs__list">
				<?php
				$tags = get_tags();

				foreach ( $tags as $tag ) : ?>
				<a href="<?php echo home_url('/') . '?s=' . $tag->name . '&post_type=news'; ?>" class="widget-tegs__item"><span><?php echo $tag->name; ?></span></a>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- /.widget-tegs -->

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

		$instance['widget_title'] = strip_tags( $new_instance['widget_title'] );

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
			'widget_title' => 'Теги',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>">Плейсхолдер</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>"
			       name="<?php echo $this->get_field_name( 'widget_title' ); ?>"
			       value="<?php echo $instance['widget_title']; ?>"/>
		</p>

		<?php
	}
}

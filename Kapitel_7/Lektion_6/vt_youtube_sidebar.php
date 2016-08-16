<?php
/*
Plugin Name: VT YouTube Widget
Description: Sidebar Widget zum Anteasern von YouTube-Videos
*/

defined( 'ABSPATH' ) || exit;


function vt_register_youtube_widget() {
	register_widget( 'VT_YouTube_Widget' );
}

add_action( 'widgets_init', 'vt_register_youtube_widget' );


class VT_YouTube_Widget extends WP_Widget {
	protected $defaults;

	public function __construct() {
		$this->defaults = [
			'title'  => '',
			'video_id'    => '',
			'width'  => 278,
			'height' => 156
		];

		$widget_options = [
			'classname'   => 'vt-youtube-widget',
			'description' => 'Bettet ein YouTube-Video in die Sidebar ein.'
		];

		$control_options = [ ];

		parent::__construct( 'vt-youtube-widget', 'VT YouTube Widget', $widget_options, $control_options );
	}

	public function widget( $args, $instance ) {
		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $args['before_widget'];

		?>
		<h2 class="widget-title"><?= apply_filters( 'widget_title', $instance['title'], $instance,
				$this->id_base ) ?></h2>
		<iframe width="<?= esc_attr( $instance['width'] ); ?>"
		        height="<?= esc_attr( $instance['height'] ); ?>"
		        src="https://www.youtube.com/embed/<?= esc_attr($instance['video_id']); ?>"
		        frameborder="0"
		        allowfullscreen></iframe>
		<?php

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		?>
		<p>
			<label for="<?= $this->get_field_id( 'title' ); ?>">Titel</label><br>
			<input type="text"
			       id="<?= $this->get_field_id( 'title' ); ?>"
			       name="<?= $this->get_field_name( 'title' ); ?>"
			       value="<?= esc_attr( $instance['title'] ); ?>"/>
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'video_id' ); ?>">YouTube Video-ID</label><br>
			<input type="text"
			       id="<?= $this->get_field_id( 'video_id' ); ?>"
			       name="<?= $this->get_field_name( 'video_id' ); ?>"
			       value="<?= esc_attr( $instance['video_id'] ); ?>"/>
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'width' ); ?>">Breite</label><br>
			<input type="text"
			       id="<?= $this->get_field_id( 'width' ); ?>"
			       name="<?= $this->get_field_name( 'width' ); ?>"
			       value="<?= esc_attr( $instance['width'] ); ?>"/>
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'height' ); ?>">Höhe</label><br>
			<input type="text"
			       id="<?= $this->get_field_id( 'height' ); ?>"
			       name="<?= $this->get_field_name( 'height' ); ?>"
			       value="<?= esc_attr( $instance['height'] ); ?>"/>
		</p>
		<?php
	}
}

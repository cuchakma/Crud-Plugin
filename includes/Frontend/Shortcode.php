<?php

namespace CC\CRUD\Frontend;

/**
 * Shortcode Handler Class
 */
class Shortcode {

	/**
	 * Initializes the class
	 */
	public function __construct() {
		add_shortcode( 'cc-curd', array( $this, 'render_shortcode' ) );
	}

	/**
	 * Shortcode handler class
	 *
	 * @param array  $atts
	 * @param string $content
	 * @return string
	 */
	public function render_shortcode( $atts, $content = '' ) {
		wp_enqueue_script( 'cc-scripts' );
		wp_enqueue_style( 'cc-styles' );
		return '<div class="cc-shortcodes">Hello From Shortcode</div>';
	}
}

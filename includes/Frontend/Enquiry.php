<?php

namespace CC\CRUD\Frontend;

/**
 * shortcode class handler
 */
class Enquiry {

	public function __construct() {
		add_shortcode( 'cc-enquiry', array( $this, 'render_shortode' ) );
	}

	/**
	 * Shortcode Handler Class
	 *
	 * @param array  $atts
	 * @param string $content
	 * @return string
	 */
	public function render_shortode( $atts, $content = '' ) {

		wp_enqueue_script( 'academy-enquiry-script' );
		wp_enqueue_style( 'academy-enquiry-style' );
		ob_start();
		include __DIR__ . '/views/enquiry.php';
		return ob_get_clean();
	}
}

<?php

namespace CC\CRUD;

/**
 * Ajax class handler
 */
class Ajax {

	public function __construct() {
		add_action( 'wp_ajax_nopriv_cc_enquiry', array( $this, 'submit_enquiry' ) );
	}

	public function submit_enquiry() {
		wp_send_json_success();
	}
}

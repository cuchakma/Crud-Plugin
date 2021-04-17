<?php

namespace CC\CRUD;

/**
 * Frontend Handler Class
 */
class Frontend {


	function __construct() {
		new Frontend\Shortcode();
		new Frontend\Enquiry();
	}
}

<?php

namespace CC\CRUD\Traits;

/**
 * Error Handler Trait
 */
trait Form_Error {

	/**
	 * Variable to hold errors
	 *
	 * @var array
	 */
	public $errors = array();

	/**
	 * Check if the form has an error
	 *
	 * @param string $key
	 * @return boolean
	 */
	public function has_error( $key ) {
		return isset( $this->errors[ $key ] ) ? true : false;
	}

	/**
	 * Get the error by key
	 *
	 * @param string $key
	 * @return string|boolean
	 */
	public function get_error( $key ) {
		if ( isset( $this->errors[ $key ] ) ) {
			return $this->errors[ $key ];
		}

		return false;
	}
}

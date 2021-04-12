<?php

namespace CC\CRUD\Admin;

use CC\CRUD\Traits\Form_Error;
/**
 * Addressbook class handler
 */
class Addressbook {

	use Form_Error;


	public function plugin_page() {

		$action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
		$id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
		switch ( $action ) {
			case 'new':
				$template = __DIR__ . '/views/address-new.php';
				break;

			case 'edit':
				$address  = cc_get_address( $id );
				$template = __DIR__ . '/views/address-edit.php';
				break;

			case 'view':
				$template = __DIR__ . '/views/address-view.php';
				break;

			default:
				$template = __DIR__ . '/views/address-list.php';

		}

		if ( file_exists( $template ) ) {
			include $template;
		}
	}

	/**
	 * Handles the form
	 *
	 * @return void
	 */
	public function form_handler() {

		if ( ! isset( $_POST['submit_address'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'new-address' ) ) {
			wp_die( 'Are You Cheating?' );
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Are You Cheating?' );
		}

		$id      = isset( $_POST['id'] ) ? intval( $_POST['id'] ) : 0;
		$name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$address = isset( $_POST['address'] ) ? sanitize_textarea_field( $_POST['address'] ) : '';
		$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';

		if ( empty( $name ) ) {
			$this->errors['name'] = __( 'Please provide a name', 'crud' );
		}

		if ( empty( $phone ) ) {
			$this->errors['phone'] = __( 'Please provide a phone number', 'crud' );
		}

		if ( ! empty( $this->errors ) ) {
			return;
		}

		$args = array(
			'name'    => $name,
			'address' => $address,
			'phone'   => $phone,
		);

		if ( $id ) {
			$args['id'] = $id;
		}

		$insert_id = cc_insert_address( $args );

		if ( is_wp_error( $insert_id ) ) {
			wp_die( $insert_id->get_error_message() );
		}

		if ( $id ) {
			$redirected_to = admin_url( 'admin.php?page=crud&action=edit&address-updated=true&id=' . $id );
			wp_redirect( $redirected_to );
			exit();
		}
		$redirected_to = admin_url( 'admin.php?page=crud&inserted=true' );
		wp_redirect( $redirected_to );
		exit();
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function delete_address() {
		if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'cc-delete-address' ) ) {
			wp_die( 'Are You Cheating?' );
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Are You Cheating?' );
		}

		$id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;

		if ( cc_delete_address( $id ) ) {
			$redirected_to = admin_url( 'admin.php?page=crud&address-deleted=true' );
		} else {
			$redirected_to = admin_url( 'admin.php?page=crud&address-deleted=false' );
		}

		wp_redirect( $redirected_to );
		exit();
	}

}

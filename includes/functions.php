<?php

/**
 * Insert a new address
 *
 * @param array $args
 * @return int|WP_Error
 */
function cc_insert_address( $args = array() ) {
	global $wpdb;

	if ( empty( $args['name'] ) ) {
		return new \WP_Error( 'no-name', __( 'You must provide a name', 'crud' ), );
	}

	$defaults = array(
		'name'       => '',
		'address'    => '',
		'phone'      => '',
		'created_by' => get_current_user_id(),
		'created_at' => current_time( 'mysql' ),
	);

	$data = wp_parse_args( $args, $defaults );

	if ( isset( $data['id'] ) ) {
		$id = $data['id'];
		unset( $data['id'] );
		$updated = $wpdb->update(
			"{$wpdb->prefix}cc_addresses",
			$data,
			array( 'id' => $id ),
			array(
				'%s',
				'%s',
				'%s',
				'%d',
				'%s',
			),
			array( '%d' )
		);

		return $updated;
	} else {

		$inserted = $wpdb->insert(
			"{$wpdb->prefix}cc_addresses",
			$data,
			array(
				'%s',
				'%s',
				'%s',
				'%d',
				'%s',
			)
		);

		if ( ! $inserted ) {
			return new \WP_Error( 'failed-to-insert', __( 'Failed To Insert Data', 'crud' ) );
		}

		return $wpdb->insert_id;

	}
}

/**
 * Fetches Addresses From Database
 *
 * @param array $args
 *
 * @return array
 */
function cc_fetch_address( $args = array() ) {

	global $wpdb;

	$defaults = array(
		'number'  => 20,
		'offset'  => 0,
		'orderby' => 'id',
		'order'   => 'ASC',
	);

	$args = wp_parse_args( $args, $defaults );

	$items = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}cc_addresses ORDER BY {$args['orderby']} {$args['order']} LIMIT %d, %d",
			$args['offset'],
			$args['number']
		)
	);

	return $items;
}


/**
 * Count Total Address From Database
 *
 * @return int
 */
function cc_fetch_address_count() {
	global $wpdb;

	return (int) $wpdb->get_var( "SELECT count(id) FROM {$wpdb->prefix}cc_addresses" );
}

/**
 * Get single address from the database
 *
 * @param int $id Id of the contact.
 * @return object
 */
function cc_get_address( $id ) {
	global $wpdb;

	return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}cc_addresses where id= %d", $id ) );
}

/**
 * Delete an address
 *
 * @param int $id
 * @return int|boolean
 */
function cc_delete_address( $id ) {

	global $wpdb;

	return $wpdb->delete(
		$wpdb->prefix . 'cc_addresses',
		array( 'id' => $id ),
		array( '%d' )
	);
}

<?php

/**
 * Insert a new address
 *
 * @param array $args
 * @return int|WP_Error 
 */
function cc_insert_address( $args = [] ) {
    global $wpdb;


    if( empty( $args['name'] ) ) {
        return new \WP_Error('no-name', __('You must provide a name', 'crud'),  );
    }

    $defaults = array(
        'name'        => '',
        'address'     => '',
        'phone'       => '',
        'created_by'  => get_current_user_id(),
        'created_at'  => current_time( 'mysql' )
    );

    $data = wp_parse_args( $args, $defaults );
    
    $inserted = $wpdb->insert(
        "{$wpdb->prefix}cc_addresses", 
        $data,
        array(
            '%s',
            '%s',
            '%s',
            '%d',
            '%s'
        )
    );
    
    if( !$inserted ) {
        return new \WP_Error('failed-to-insert', __( 'Failed To Insert Data', 'crud' ) );
    }

    return $wpdb->insert_id;
}
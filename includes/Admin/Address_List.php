<?php

namespace CC\CRUD\Admin;

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}
/**
 * List table class
 */
class Address_List extends \WP_List_Table {

	public function __construct() {
		parent::__construct(
			array(
				'singular' => 'contact',
				'plural'   => 'contacts',
				'ajax'     => 'false',
			)
		);
	}

	public function get_columns() {
		return array(
			'cb'         => '<input type="checkbox"/>',
			'name'       => __( 'Name', 'crud' ),
			'address'    => __( 'Address', 'crud' ),
			'phone'      => __( 'Phone', 'crud' ),
			'created_at' => __( 'Date', 'crud' ),
		);
	}

	/**
	 * sortable columns
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'name'       => array( 'name', true ),
			'created_at' => array( 'created_at', true ),
		);

		return $sortable_columns;
	}

	protected function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'value':
				break;

			default:
				return isset( $item->$column_name ) ? $item->$column_name : '';
		}
	}

	public function column_name( $item ) {

		$actions           = array();
		$actions['edit']   = sprintf( '<a href="%s" title="%s">%s</a>', admin_url( 'admin.php?page=crud&action=edit&id=' . $item->id ), $item->id, __( 'Edit', 'crud' ), __( 'Edit', 'crud' ) );
		$actions['delete'] = sprintf( '<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=cc-delete-address&id=' . $item->id ), 'cc-delete-address' ), $item->id, __( 'Delete', 'crud' ), __( 'Delete', 'crud' ) );
		error_log( print_r( $actions, true ) );
		return sprintf(
			'<a href="%1$s"><strong>%2$s</strong></a> %3$s',
			admin_url( 'admin.php?page=crud&action=view&id' . $item->id ),
			$item->name,
			$this->row_actions( $actions )
		);
	}

	protected function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="address_id[]" value="%d"/>',
			$item->id
		);
	}

	public function prepare_items() {
		$column   = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();

		$this->_column_headers = array( $column, $hidden, $sortable );

		$per_page     = 20;
		$current_page = $this->get_pagenum();
		$offset       = ( $current_page - 1 ) * $per_page;

		$args = array(
			'number' => $per_page,
			'offser' => $offset,
		);

		if ( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
			$args['orderby'] = $_REQUEST['orderby'];
			$args['order']   = $_REQUEST['order'];
		}

		$this->items = cc_fetch_address( $args );

		$this->set_pagination_args(
			array(
				'total_items' => cc_fetch_address_count(),
				'per_page'    => $per_page,
			)
		);
	}
}

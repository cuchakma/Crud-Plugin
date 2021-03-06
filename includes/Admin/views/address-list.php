<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'Address Book', 'crud' ); ?></h1>

	<a href="<?php echo admin_url( 'admin.php?page=crud&action=new' ); ?>" class="page-title-action"><?php _e( 'Add New', 'crud' ); ?></a>

	<?php if ( isset( $_GET['inserted'] ) ) : ?>
		<div class="notice notice-success">
			<p><?php _e( 'Address Has Been Added Sucessfully', 'crud' ); ?></p>
		</div>
	<?php endif; ?>

	<?php if ( isset( $_GET['address-deleted'] ) && true == $_GET['address-deleted'] ) : ?>
		<div class="notice notice-success">
			<p><?php _e( 'Address Has Been Deleted Sucessfully', 'crud' ); ?></p>
		</div>
	<?php endif; ?>

	<form action="" method="post">
		<?php
			$table = new \CC\CRUD\Admin\Address_List();
			$table->prepare_items();
			$table->display();
		?>
	</form>
</div>

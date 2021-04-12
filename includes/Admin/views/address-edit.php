<div class="wrap">
	<h1><?php _e( 'Edit Address', 'crud' ); ?></h1>

	<?php if ( isset( $_GET['address-updated'] ) ) : ?>
		<div class="notice notice-success">
			<p><?php _e( 'Address Has Been Updated Sucessfully', 'crud' ); ?></p>
		</div>
	<?php endif; ?>

	<form action="" method="POST">
		<table class="form-table">
			<tbody>
				<tr class="row<?php echo $this->has_error( 'name' ) ? ' form-invalid' : ''; ?>">
					<th scope="row">
						<label for="name"><?php _e( 'Name', 'crud' ); ?></label>
					</th>
					<td>
						<input type="text" name="name" id="name" class="regular-text" value="<?php echo esc_attr( $address->name ); ?>">
						<?php if ( $this->has_error( 'name' ) ) : ?>
							<p class="description error"><?php echo $this->get_error( 'name' ); ?></p>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="name"><?php _e( 'Address', 'crud' ); ?></label>
					</th>
					<td>
						<textarea class="regular-text" name="address" id="address" ><?php echo esc_textarea( $address->address ); ?></textarea>
					</td>
				</tr>
				<tr class="row<?php echo $this->has_error( 'phone' ) ? ' form-invalid' : ''; ?>">
					<th scope="row">
						<label for="name"><?php _e( 'Phone', 'crud' ); ?></label>
					</th>
					<td>
						<input type="text" name="phone" id="phone" class="regular-text" value="<?php echo esc_attr( $address->phone ); ?>">
						<?php if ( $this->has_error( 'phone' ) ) : ?>
							<p class="description error"><?php echo $this->get_error( 'phone' ); ?></p>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<input type="hidden" name="id" value="<?php echo esc_attr( $address->id ); ?>">
		<?php wp_nonce_field( 'new-address' ); ?>
		<?php submit_button( __( 'Update Address', 'crud' ), 'primary', 'submit_address' ); ?>
	</form>
</div>

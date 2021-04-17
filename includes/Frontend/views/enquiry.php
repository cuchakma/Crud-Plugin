<div class="enquiry-form" id="enquiry-form">

	<form action="" method="post">

		<div class="form-row">
			<label for="name"><?php _e( 'Name', 'crud' ); ?></label>
			<input type="text" id="name" name="name" value="" required>
		</div>

		<div class="form-row">
			<label for="name"><?php _e( 'Email', 'crud' ); ?></label>
			<input type="email" id="email" name="email" value="" required>
		</div>

		<div class="form-row">
			<label for="message"><?php _e( 'Message', 'crud' ); ?></label>
			<textarea name="message" id="message" required></textarea>
		</div>

		<div class="form-row">
			<?php wp_nonce_field( 'cc-enquiry-form' ); ?>
				<input type="hidden" name="action" value="cc_enquiry">
			<input type="submit" name="send_enquiry" value="<?php esc_attr_e( 'Send Enquiry', 'crud' ); ?>">
		</div>
	</form>
    
</div>

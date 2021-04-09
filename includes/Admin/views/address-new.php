<div class="wrap">
    <h1><?php _e( 'New Address', 'crud' )?></h1>
   <?php var_dump($this->errors); ?>
    <form action="" method="POST">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e('Name', 'crud'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e('Address', 'crud'); ?></label>
                    </th>
                    <td>
                        <textarea class="regular-text" name="address" id="address" ></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e('Phone', 'crud'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="">
                    </td>
                </tr>
            </tbody>
        </table>
        <?php wp_nonce_field( 'new-address' ); ?>
        <?php submit_button( __( 'Add Address', 'crud' ), 'primary', 'submit_address' ); ?>
    </form>
</div>
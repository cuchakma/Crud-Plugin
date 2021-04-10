<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('Address Book', 'crud')?></h1>

    <a href="<?php echo admin_url( 'admin.php?page=crud&action=new')?>" class="page-title-action"><?php _e('Add New', 'crud') ?></a>

    <form action="" method="post">
        <?php
             $table = new \CC\CRUD\Admin\Address_List();
             $table->prepare_items();
             $table->display();
        ?>
    </form>
</div>
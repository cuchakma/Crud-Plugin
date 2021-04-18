(function($){
    $('table.wp-list-table.contacts').on('click', 'a.submitdelete', function(event){
        event.preventDefault();
      
        if(!confirm(cccrudobject2.confirm)){
            return;
        }

        var self = $(this),
        id = self.data('id');
        // wp.ajax.send('cc-delete-contact', {
        //     data : {
        //         id : id,
        //         _wpnonce : cccrudobject2.nonce
        //     }
        // })
        wp.ajax.post('cc-delete-contact', {
            id : id,
            _wpnonce : cccrudobject2.nonce
        })
        .done(function(response){
            self.closest('tr').css('background-color', 'red').hide(400, function(){
                $(this).remove();
            });

        }).
        fail(function(){
            alert(cccrudobject2.error);
        });
    });
})(jQuery)
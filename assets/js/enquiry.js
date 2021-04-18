;(function($) {

    $('#enquiry_form form').on('submit', function(e) {
        e.preventDefault();

        var data = $(this).serialize();

        $.post(cccrudobject.ajaxurl, data, function(response) {
            if( response.success ){
                console.log(response.success)
            } else {
                alert(response.data);
            }
        })
        .fail(function() {
            alert(cccrudobject.error);
        })

    });

})(jQuery);
jQuery(function(){
    jQuery('#edit-message').keyup(function(){
        var length = jQuery(this).val().length;
        jQuery('#message-length').html(length);
    });
});
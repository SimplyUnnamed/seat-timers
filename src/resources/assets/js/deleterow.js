

$(document).on("click", ".timer-delete-record", function(){
    var label = $(this).attr('data-label');
    var text   = "Are you sure you want to delete "+label+"?";
    var uri = $(this).attr('data-url');
    bootbox.confirm(text, function(confirmed){
        if(confirmed)
            window.location = uri;
    });
})


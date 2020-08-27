$(document).on('click', '.remove_image', function(){
    var name = $(this).attr('id');
    $.ajax({
        url:"upload.php",
        method:"POST",
        data:{name:name},
        success:function(data)
        {
            list_image();
        }
    })
});

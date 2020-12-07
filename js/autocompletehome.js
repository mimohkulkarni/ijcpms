$(document).ready(function(){
    $('#article').keyup(function(){
        let query = $(this).val();
        const id = 5;
        if(query && id)
        {
            $.ajax({
                url:"search.php",
                method:"POST",
                data:{query:query,id:id},
                success:function(data)
                {
                    // alert(data);
                    $('#articleList').fadeIn();
                    $('#articleList').html(data);
                }
            });
        }
        else{
            $('#articleList').fadeOut();
        }
    });
    $(document).on('click', '.abcd', function(){
        // $('#article').val($(this).text());
        $('#articleList').fadeOut();
    });
});
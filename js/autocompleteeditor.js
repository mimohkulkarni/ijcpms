$(document).ready(function(){
    $('#txtEditor').keyup(function(){
        let query = $(this).val();
        const id = 6;
        if(query && id)
        {
            $.ajax({
                url:"search.php",
                method:"POST",
                dataType:"json",
                data:{query:query,id:id},
                success:function(data)
                {
                    // alert(data);
                    $('#editorList').empty().fadeIn();
                    $("#editorList").append("<ul class='list-unstyled'>");
                    for (let i=0; i<data.length; ++i){
                        $("#editorList").append("<li class='abcde' data-desg='"+ data[i]['desg'] +"' data-email='"+ data[i]['email'] +"' data-id='"+ data[i]['id'] +"'>"+ data[i]['name'] +"</li>");
                    }
                    $("#editorList").append("</ul>");
                    // alert($("#editorList").val());
                    // $('#issueList').html(data);
                }
            });
        }
        else $('#issueList').empty().fadeOut();
    });

    $(document).on('click', '.abcde', function(){
        let id = $(this).data('id');
        $('#txtEditor').val($(this).text());
        $('#editorList').fadeOut();
        $("#txtDeleteEditorId").val(id);
        $('#deleteInnerDiv').show();
        $("#txtDeleteDesg").val($(this).data('desg'));
        $("#txtDeleteEmail").val($(this).data('email'));

        // alert($(this).data('email'));
        // alert($("#txtDeleteEditorId").val());
        // $('#issue').val($(this).text());
        // $('#issueList').fadeOut();
    });
});
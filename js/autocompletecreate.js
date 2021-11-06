$(document).ready(function(){
    $('#txtIssue').keyup(function(){
        let query = $(this).val();
        const id = 1;
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
                    $('#issueList').empty().fadeIn();
                    $("#issueList").append("<ul class='list-unstyled'>");
                    for (let i=0; i<data.length; ++i){
                        $("#issueList").append("<li class='abc' data-id='"+ data[i]['id'] +"'>"+ data[i]['name'] +"<span id='spanDate" + data[i]['id'] + "'>(Volume " + data[i]['vol'] + " " + data[i]['date'] + ")</span></li>");
                    }
                    $("#issueList").append("</ul>");
                    // $('#issueList').html(data);
                }
            });
        }
        else $('#issueList').empty().fadeOut();
    });

    $(document).on('click', '.abc', function(){
        let id = $(this).data('id');
        $('#spanDate' + id).empty();
        $('#txtIssue').val($(this).text());
        $('#issueList').fadeOut();
        $("#txtIssueId").val(id);

        // $('#issue').val($(this).text());
        // $('#issueList').fadeOut();
    });

    $('#txtSubArticle').keyup(function(){
        let query = $(this).val();
        const id = 2;
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
                    $('#subArticleList').empty().fadeIn();
                    $("#subArticleList").append("<ul class='list-unstyled'>");
                    for (let i=0; i<data.length; ++i){
                        $("#subArticleList").append("<li class='abcd' data-id='"+ data[i]['id'] +"'>"+ data[i]['title'] +"<span id='spanSubDate" + data[i]['id'] + "'>(Date: " + data[i]['date'] + ")</span></li>");
                    }
                    $("#subArticleList").append("</ul>");
                    // $('#subArticleList').fadeIn();
                    // $('#subArticleList').html(data);
                }
            });
        }
        else{
            $('#subArticleList').empty().fadeOut();
            // $('#subArticleList').hide();
        }
    });
    $(document).on('click', '.abcd', function(){
        let articleId = $(this).data('id');
        // alert($(this).text());
        // alert(articleId);
        $('#spanSubDate' + articleId).empty();
        $('#txtSubArticle').val($(this).text());
        $('#subArticleList').fadeOut();
        $("#txtSubArticleId").val(articleId);
        // $('#subArticle').val($(this).text());
        // $('#subArticleList').fadeOut();
    });
});
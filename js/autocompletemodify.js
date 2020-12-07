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
        // alert($("#txtIssue").val());
    });

    $('#txtSubArticle').keyup(function(){
        let issueId = $("#txtIssueId").val();
        let query = $(this).val();
        // alert(issueId);
        const id = 3;
        if(query && id && issueId)
        {
            $.ajax({
                url:"search.php",
                method:"POST",
                dataType:"json",
                data:{query:query,id:id,issueId:issueId},
                success:function(data)
                {
                    // alert(data);
                    $('#subArticleList').empty().fadeIn();
                    $("#subArticleList").append("<ul class='list-unstyled'>");
                    for (let i=0; i<data.length; ++i){
                        $("#subArticleList").append("<li class='abcd' data-id='"+ data[i]['id'] +"'>"+ data[i]['name'] +"<span id='spanSubDate" + data[i]['id'] + "'>(Date: " + data[i]['date'] + ")</span></li>");
                    }
                    $("#subArticleList").append("</ul>");
                }
            });
        }
        else{
            $('#subArticleList').empty().fadeOut();
            $('#hideShow').hide();
        }
    });
    $(document).on('click', '.abcd', function(){
        let articleId = $(this).data('id');
        // alert($(this).text());
        $('#spanSubDate' + articleId).empty();
        $('#txtSubArticle').val($(this).text());
        $('#subArticleList').fadeOut();
        $("#txtArticleId").val(articleId);

        // alert($('#txtIssueId').val());
        // alert($('#txtArticleId').val());

        // $('#subArticle').val($(this).text());
        // $('#subArticleList').fadeOut();
        // $("#txtArticleId").val($(this).data('id'));
        // articleId = $("#txtArticleId").val();

        $('#hideShow').fadeIn();

        // alert(issueId);
        const query = "1";
        const id = 4;
        if(id && articleId && query)
        {
            $.ajax({
                url:"search.php",
                method:"POST",
                dataType:"json",
                data:{query:query,id:id,articleId:articleId},
                success:function(data)
                {
                    // alert(data);
                    $('#txtAbstract').val(data['abstract']);
                    $('#txtKeywords').val(data['keywords']);
                    $('#txtAuthors').val(data['authors']);
                    $('#selectType').val(data['type']);
                    // alert(data['type'])
                    // $('#txtFile').html(data['file']);
                }
            });
        }
        else{
            $('#hideShow').hide();
        }
    });
});
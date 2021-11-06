$(document).ready(function(){
    $('.download').click(function(){
        // alert("here");
        let id = $(this).attr('id');
        // alert(id);
        if(id)
        {
            // alert("here");
            $.ajax({
                url:"download.php",
                method:"POST",
                dataType:"json",
                data:{id:id},
                success:function(data)
                {
                    // alert(data['file'].split(".")[0]);
                    if (data != "error" ){
                        var link = document.createElement('a');
                        link.href = "assets/pdf/" + data['file'];
                        link.download = data['name'] + "." + data['file'].split(".")[1];
                        link.dispatchEvent(new MouseEvent('click'));
                        // alert("Thank you for downloading");
                    }
                    else alert("download error");
                }
            });
        }
    });
});
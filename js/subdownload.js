$(document).ready(function(){
    $('.subdownload').click(function(){

        let file = $(this).data('file');
        let name = $(this).data('name');
        // alert(file);
        // alert(name);
        var link = document.createElement('a');
        link.href = "assets/submissions/" + file;
        link.download = name + "." + file.split(".")[1];
        link.dispatchEvent(new MouseEvent('click'));
        // alert("Thank you for downloading");
    });
});
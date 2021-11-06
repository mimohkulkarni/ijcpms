$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

function showProgress() {
    $("#spinnerProgress").fadeIn();
    $("#spanLoading").html("<b> Processing and uploading file</b>");
    let time = 0;
    const data ="Processing and uploading file";

    setInterval(function(){
        // alert(time);
        if (time === 1) $("#spanLoading").html("<b> " + data + ".</b>");
        if (time === 2) $("#spanLoading").html("<b> " + data + "..</b>");
        if (time === 3) $("#spanLoading").html("<b> " + data + "...</b>");
        if (time === 4) $("#spanLoading").html("<b> " + data + "....</b>");
        if (time === 5){
            $("#spanLoading").html("<b> " + data + ".....</b>");
            time = 0;
        }
        time++;
    }, 1000);
}

function resetAll() {
    
}


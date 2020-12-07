$(document).ready(function(){
    $('#btnDeleteSwitch').click(function(){
        $('#addDiv').fadeOut();
        $('#deleteDiv').fadeIn();
        $('#spanTitle').html("Delete Editor");
        $('#spanMainTitle').html("Delete Existing Editor");
        updateValues();
    });

    $('#btnAddSwitch').click(function(){
        $('#deleteDiv').fadeOut();
        $('#addDiv').fadeIn();
        $('#spanTitle').html("Add Editor");
        $('#spanMainTitle').html("Add New Editor");
        updateValues();
    });
});

function updateValues () {

    $('#txtAddEditorName').val("");
    $('#txtAddDesc').val("");
    $('#txtAddEmail').val("");

    $('#txtDeleteEditorId').val("");
    $('#editorList').empty().fadeOut();

}
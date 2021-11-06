$(document).ready(function(){
    $(document).bind("contextmenu",function(e){
        alert("Copy not allowed");
        return false;
    });
});
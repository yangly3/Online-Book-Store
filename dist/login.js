

$("#bir").focusin(function() {
    $('.background').css("background-color","#ff9800");
});
$("#iki").focusin(function() {
    $('.background').css("background-color","#03a9f4");
});
$("#uc").focusin(function() {
    $('.background').css("background-color","#e91e63");
});
$("#bir, #iki, #uc").focusout(function() {
    $('.background').css("background-color","");
});

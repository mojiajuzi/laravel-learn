$(".create-form-show").on("click", function(e){
    $(".create_form").show("1000");
    $(this).hide("1000");
});

$("#create-form-hide").on("click", function(e){
    $(".create_form").hide("1000");
    $(".create-form-show").show("1000");
})


$(".submit-form").on("click", function(){
    setTimeout(function(){
        window.location.reload();
    }, 1500);
});
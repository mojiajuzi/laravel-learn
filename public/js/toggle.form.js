$(".create-form-show").on("click", function(e){
    $(".create_form").show("1000");
});

$("#create-form-hide").on("click", function(e){
    $(".create_form").hide("1000");
    console.log("aaaa");
})


$(".submit-form").on("click", function(){
    console.log("heheheh");
    setTimeout(function(){
        window.location.reload();
    }, 1500);
});
// 编辑
$(".edit").on("click", function(e){
    var url = $(this).data('edit_url');
    $.ajax({
        url:url,
        method:'GET',
        type: 'HTML',
        success: function(data){
            $("#content").html(data);
            $("#departmentModal").modal('show');
        },
        errors: function(){
            toastr.error("请求发送失败");
        }
    });
});

// 提交
$(document).on('click', "#create_submit", function(event){
   var url = $("#edit_form").attr("action");
   $.ajax({
       url: url,
       data: $("#edit_form").serialize(),
       method: 'POST',
       type: 'JSON',
       success: function(data){
            if(data.status){
                $("#departmentModal").modal('hide');
                toastr.success(data.msg)
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
            }else{
                toastr.warning(data.msg);
            }
       },
       errors: function(){
        toastr.error("请求发送失败");
       }
   })
});
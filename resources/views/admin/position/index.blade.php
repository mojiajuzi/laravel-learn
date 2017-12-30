@extends('layouts.app')
@section('content')
<div class="col-md-7">
        <h4>{{$department->department_name}} 职位列表</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        职位名称
                    </th>
                    <th>
                       任职
                    </th>
                    <th>
                      部门负责人
                    </th>
                    <th>
                        操作
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach( $department->positions as $position)
                <tr>
                    <td>{{$position->id}}</td>
                    <td>{{$position->position_name}}</td>
                    <td>{{$teacherAll[$position->position_manager_uuid] or "未分配"}}</td>
                    <td>{{$position->position_master_text}}</td>
                    <td>
                         <div class="btn-group">
                            <button type="button" class="btn btn-warning  btn-xs department_edit" data-edit_url="{{action('DepartmentController@update', ['id' => $position->id])}}/edit">
                                修改
                            </button>
                         </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
 </div>
 <div class="col-md-4 col-md-offset-1">
    <h4>职位创建</h4>
    @include('layouts.errors')
    @include('admin.position.create', ['teacherAll' => $teacherAll, 'positionList' => $department->positions])    
 </div>

 {{--  部门修改模态框  --}}
 <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">部门修改</h4>
              <div id="content"></div>
            </div>
          </div>
        </div>
</div>
@endsection

@section('page_script')
<script>
        {{--  编辑  --}}
        $(".department_edit").on("click", function(e){
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

        {{--  提交  --}}
        $(document).on('click', "#department_submit", function(event){
           var url = $("#department_edit_form").attr("action");
           $.ajax({
               url: url,
               data: $("#department_edit_form").serialize(),
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
</script>
@endsection
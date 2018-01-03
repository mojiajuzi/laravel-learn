@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12  create_form"  @if(!count($errors)) style="display:none;" @endif>
            <div class="col-md-6 col-md-offset-2">
                    @include('layouts.errors')
                    @include('admin.position.create', ['positionList' => $department->positions, 'department' => $department]) 
            </div>
    </div>
</div>
<div class="row">
        <div class="col-md-12">
            <button class="btn btn-info create-form-show">新建职位</button>
        </div>
</div>
<div class="row">
        <h4>{{$department->department_name}} 职位列表</h4>
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                名称
                            </th>
                            <th>
                                任职
                            </th>
                            <th>
                                部门领导
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
                            <td>{{$position->department_master? "是" : "否"}}</td>
                            <td>
                                    <a href="#" class="text-danger department_edit" data-edit_url="{{action('PositionController@update', ['id' => $position->id])}}/edit">修改</a>
                                    <span>|</span>
                                    <a href="#" class="text-info"  data-edit_url="{{action('PositionController@update', ['id' => $position->id])}}/edit">职位</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
</div>
 {{--  部门修改模态框  --}}
 <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">职位修改</h4>
              <div id="content"></div>
            </div>
          </div>
        </div>
</div>
@endsection

@section('page_script')
<script src="/js/toggle.form.js"></script>
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
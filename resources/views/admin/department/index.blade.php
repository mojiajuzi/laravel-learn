@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12  create_form"  @if(!count($errors)) style="display:none;" @endif>
            <div class="col-md-6 col-md-offset-2">
                    @include('layouts.errors')
                    @include('admin.department.create', ['departmentAll' => $departmentList])   
            </div>
    </div>
</div>
<div class="row">
        <div class="col-md-12">
            <button class="btn btn-info create-form-show">创建</button>
        </div>
</div>
<div class="row">
    <h4>学校部门列表</h4>
    <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            部门全称
                        </th>
                        <th>
                            部门简称
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $departmentList as $detail)
                    <tr>
                        <td>{{$detail->id}}</td>
                        <td>{{$detail->department_full_name}}</td>
                        <td>{{$detail->department_name}}</td>
                        <td>
                            <a href="#" class=" text-danger department_edit" data-edit_url="{{action('DepartmentController@update', ['id' => $detail->id])}}/edit">修改</a>
                            <span>|</span>
                            <a href="{{action('PositionController@index')}}?department_id={{$detail->id}}" class="text-info">职位</a>
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
            <h4 class="modal-title" id="myModalLabel">部门修改</h4>
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
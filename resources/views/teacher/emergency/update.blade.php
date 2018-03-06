<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">紧急联系人修改</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_edit_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/emergency')}}/{{$emergency->id}}">
    {{ method_field('PUT') }}
        <div class="form-group">
        <label for="" class="col-sm-3 control-label">名称：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="emergency_name" value="{{$emergency->emergency_name}}" placeholder="姓名"/>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">联系方式：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="emergency_mobile" value="{{$emergency->emergency_mobile}}" />
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary edit_teacher_operator" data-tab="#emergency" data-url="{{url('teacher/emergency')}}">修改</button>
</div>
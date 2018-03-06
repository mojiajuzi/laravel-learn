<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">紧急联系人创建</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_create_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/emergency')}}">
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">名称：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="emergency_name" value="" placeholder="姓名"/>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">联系方式：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="emergency_mobile" value="" />
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary create_teacher_operator" data-tab="#emergency" data-url="{{url('teacher/emergency')}}">创建</button>
</div>
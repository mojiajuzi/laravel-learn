<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">教育经历修改</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_edit_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/family')}}/{{$family->id}}">
    {{ method_field('PUT') }}
        <div class="form-group">
        <label for="" class="col-sm-3 control-label">名称：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="family_name" value="{{$family->family_name}}" placeholder="姓名"/>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">关系：</label>
         <div  class="col-sm-9">
           <input type="text" class="form-control"  name="relationship" value="{{$family->relationship}}" />
         </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">联系方式：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="mobile" value="{{$family->mobile}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作单位：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_company" value="{{$family->work_company}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作职位：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_position" value="{{$family->work_position}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作地址：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_address" value="{{$family->work_address}}" />
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary edit_teacher_operator" data-tab="#family" data-url="{{url('teacher/family')}}">修改</button>
</div>
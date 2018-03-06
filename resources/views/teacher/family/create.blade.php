<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">家庭成员创建</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_create_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/family')}}">
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">名称：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="family_name" value="" placeholder="姓名"/>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">关系：</label>
         <div  class="col-sm-9">
           <input type="text" class="form-control"  name="relationship" value="" />
         </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">联系方式：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="mobile" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作单位：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_company" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作职位：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_position" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作地址：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_address" value="" />
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary create_teacher_operator" data-tab="#family" data-url="{{url('teacher/family')}}">创建</button>
</div>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">工作经历创建</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_create_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/work')}}">
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作单位：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_company" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">开始日期：</label>
         <div  class="col-sm-9">
           <input type="text" class="hpdate form-control"  name="start_at" value="" />
         </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">结束日期：</label>

        <div  class="col-sm-9">
           <input type="text" class="hpdate form-control" name="end_at" value="{{$birthday or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作职位：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_position" value="" />            
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">证明人：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="reference" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">联系方式</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="reference_mobile" value="" placeholder="证明人联系方式"/>
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary create_teacher_operator" data-tab="#work" data-url="{{url('teacher/work')}}">创建</button>
</div>
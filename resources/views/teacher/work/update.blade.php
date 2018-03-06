<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">工作经历修改</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_edit_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/work')}}/{{$work->id}}">
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作单位：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_company" value="{{$work->work_company}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">开始日期：</label>
         <div  class="col-sm-9">
           <input type="text" class="hpdate form-control"  name="start_at" value="{{$work->start_at}}" />
         </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">结束日期：</label>

        <div  class="col-sm-9">
           <input type="text" class="hpdate form-control" name="end_at" value="{{$work->end_at}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">工作职位：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="work_position" value="{{$work->work_position}}" />            
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">证明人：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="reference" value="{{$work->reference}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">联系方式</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="reference_mobile" value="{{$work->reference_mobile}}" placeholder="证明人联系方式"/>
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary edit_teacher_operator" data-tab="#work" data-url="{{url('teacher/work')}}">修改</button>
</div>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">教育经历创建</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_create_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/education')}}">
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学校名称：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="schoole_name" value="" />
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
        <label for="" class="col-sm-3 control-label">教育类型：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="education_type">
                @foreach($majorArr as $mk => $major)
                <option value="{{$mk}}">{{$major}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">专业：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="major" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学历：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="culture">
                <option value="0">无</option>
                @foreach($cultureArr as $ck => $culture)
                <option value="{{$ck}}">{{$culture}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学历编号</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="culture_number" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学位：</label>

        <div  class="col-sm-9">
            <select class="form-control" name="degree">
                <option value="0">无</option>
                @foreach($degreeArr as $dk => $degree)
                <option value="{{$dk}}">{{$degree}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">学位编号</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="degree_number" value="" placeholder=""/>
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary create_teacher_operator" data-tab="#education" data-url="{{url('teacher/education')}}">创建</button>
</div>
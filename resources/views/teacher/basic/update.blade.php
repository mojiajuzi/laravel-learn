<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">基础信息修改</h4>
</div>

<div class="modal-body">
<form class="form-horizontal teacher_edit_operator_form" data-toggle="validator"　method="POST" action="{{url('teacher/basic')}}/{{$basic->id}}">
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">姓名：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="teacher_name" value="{{$basic->teacher_name or ''}}" />
        </div>
    </div>
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">性别：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="gender" value="{{$basic->gender or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">生日：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="birthday" value="{{$basic->birthday or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">文化程度：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="culture_type" value="{{$basic->culture_type or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">手机：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="mobile" value="{{$basic->mobile or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">邮箱：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="email" value="{{$basic->email or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">民族：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="nation" value="{{$basic->nation or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">籍贯：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="native_place" value="{{$basic->native_place or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">证件类型：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="id_type" value="{{$basic->id_type or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">证件号码：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="id_card" value="{{$basic->id_card or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">婚姻状态：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="martial" value="{{$basic->martial or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">政治面貌：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="political" value="{{$basic->political or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">户籍类型：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="permananent_address_type" value="{{$basic->permananent_address_type or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">户籍：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="permanent_address" value="{{$basic->permanent_address or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">户籍所在地：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="registered_redidence" value="{{$basic->registered_redidence or ''}}" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-3 control-label">通讯地址：</label>

        <div  class="col-sm-9">
           <input type="text" class="form-control" name="local_address" value="{{$basic->local_address or ''}}" />
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary edit_teacher_operator">更新</button>
</div>
<div class="form-group　col-sm-12 clearfix bill_info_group">
    <div class="col-sm-6">
        <label for="" class="col-sm-3">姓名：</label>
        <div  class="col-sm-7">{{$basic->teacher_name or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">性别：</label>
        <div  class="col-sm-9">{{$basic->gender_text or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">生日：</label>
        <div  class="col-sm-9">{{$basic->birthday or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">文化程度：</label>
        <div  class="col-sm-9">{{$basic->culture_type_text or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">手机：</label>
        <div  class="col-sm-9">{{$basic->mobile or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">邮箱：</label>
        <div  class="col-sm-9">{{$basic->email or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">民族：</label>
        <div  class="col-sm-9">{{$basic->nation or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">籍贯：</label>
        <div  class="col-sm-9">{{$basic->native_place or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">证件类型：</label>
        <div  class="col-sm-9">{{$basic->id_type_text or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">证件号码：</label>
        <div  class="col-sm-9">{{$basic->id_card or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">婚姻状态：</label>
        <div  class="col-sm-9">{{$basic->martial_text or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">政治面貌：</label>
        <div  class="col-sm-9">{{$basic->political_text or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">户籍类型：</label>
        <div  class="col-sm-9">{{$basic->permananent_address_type_text or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">户籍：</label>
        <div  class="col-sm-9">{{$basic->permanent_address or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">户籍所在地：</label>
        <div  class="col-sm-9">{{$basic->registered_redidence or ''}}</div>
    </div>
    <div class="col-sm-6">
        <label for="" class="col-sm-3">通讯地址：</label>
        <div  class="col-sm-9">{{$basic->local_address or ''}}</div>
    </div>
</div>
<div class="col-sm-12">
    <button class="btn btn-primary edit_teacher_form" data-url="{{url('teacher/basic')}}/{{$basic->id}}/edit">编辑</button>
</div>
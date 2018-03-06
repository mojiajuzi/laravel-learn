<button class="btn btn-primary show-create-teacherinfo-form" data-url="{{url('teacher/family/create')}}">添加家庭成员</button>
    <table class="table">
        <thead>
            <th>姓名</th>
            <th>关系</th>
            <th>联系方式</th>
            <th>工作单位</th>
            <th>工作职位</th>
            <th>工作地点</th>
            <th>操作</th>
        </thead>
        @if($familyList->isNotEmpty())
        <tbody>
            @foreach($familyList as $k => $family)
                <tr>
                    <th>{{$family->family_name}}</th>
                    <th>{{$family->relationship}}</th>
                    <th>{{$family->mobile}}</th>
                    <th>{{$family->work_company or "未知"}}</th>
                    <th>{{$family->work_position or "未知"}}</th>
                    <th>{{$family->work_address or "未知"}}</th>
                    <th><button class=" btn btn-sm btn-primary edit_teacher_form" data-url="{{url('/teacher/family')}}/{{$family->id}}/edit">更新</button><button class="btn btn-warning btn-sm delete_teacher_recoder" data-url="{{url('teacher/family')}}/{{$family->id}}">删除</button></th>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>
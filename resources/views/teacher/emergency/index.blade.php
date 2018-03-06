<button class="btn btn-primary show-create-teacherinfo-form" data-url="{{url('teacher/emergency/create')}}">添加紧急联系人</button>
    <table class="table">
        <thead>
            <th>姓名</th>
            <th>联系方式</th>
            <th>创建时间</th>
            <th>操作</th>
        </thead>
        @if($emergencyList->isNotEmpty())
        <tbody>
            @foreach($emergencyList as $k => $emergency)
                <tr>
                    <th>{{$emergency->emergency_name}}</th>
                    <th>{{$emergency->emergency_mobile}}</th>
                    <th>{{$emergency->created_at}}</th>
                    <th><button class=" btn btn-sm btn-primary edit_teacher_form" data-url="{{url('/teacher/emergency')}}/{{$emergency->id}}/edit">更新</button><button class="btn btn-warning btn-sm delete_teacher_recoder" data-url="{{url('teacher/emergency')}}/{{$emergency->id}}">删除</button></th>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>
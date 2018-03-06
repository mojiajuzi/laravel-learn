<button class="btn btn-primary show-create-teacherinfo-form" data-url="{{url('teacher/education/create')}}">添加教育经历记录</button>
    <table class="table">
        <thead>
            <th>学校名称</th>
            <th>开始日期</th>
            <th>结束日期</th>
            <th>专业</th>
            <th>学历</th>
            <th>学历编号</th>
            <th>学位</th>
            <th>学位编号</th>
            <th>操作</th>
        </thead>
        @if($educationList->isNotEmpty())
        <tbody>
            @foreach($educationList as $k => $education)
                <tr>
                    <th>{{$education->schoole_name}}</th>
                    <th>{{$education->start_at}}</th>
                    <th>{{$education->end_at}}</th>
                    <th>{{$education->major or "无"}}</th>
                    <th>{{$education->culture_text}}</th>
                    <th>{{$education->culture_number}}</th>
                    <th>{{$education->degree_text}}</th>
                    <th>{{$education->degree_number}}</th>
                    <th><button class=" btn btn-sm btn-primary edit_teacher_form" data-url="{{url('/teacher/education')}}/{{$education->id}}/edit">更新</button><button class="btn btn-warning btn-sm delete_teacher_recoder" data-url="{{url('teacher/education')}}/{{$education->id}}">删除</button></th>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>
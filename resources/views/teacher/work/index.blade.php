<button class="btn btn-primary show-create-teacherinfo-form" data-url="{{url('teacher/work/create')}}">添加工作记录</button>
    <table class="table">
        <thead>
            <th>工作单位</th>
            <th>开始日期</th>
            <th>结束日期</th>
            <th>工作职位</th>
            <th>证明人</th>
            <th>联系方式</th>
            <th>操作</th>
        </thead>
        @if($workList->isNotEmpty())
        <tbody>
            @foreach($workList as $k => $work)
                <tr>
                    <th>{{$work->work_company}}</th>
                    <th>{{$work->start_at}}</th>
                    <th>{{$work->end_at}}</th>
                    <th>{{$work->work_position}}</th>
                    <th>{{$work->reference}}</th>
                    <th>{{$work->reference_mobile}}</th>
                    <th><button class=" btn btn-sm btn-primary edit_teacher_form" data-url="{{url('/teacher/work')}}/{{$work->id}}/edit">更新</button><button class="btn btn-warning btn-sm delete_teacher_recoder" data-url="{{url('teacher/work')}}/{{$work->id}}">删除</button></th>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>
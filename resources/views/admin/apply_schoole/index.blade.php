@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
        <h4>教师申请加入列表</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        申请人
                    </th>
                    <th>
                        电话
                    </th>
                    <th>
                       申请状态
                    </th>
                    <th>
                    　　申请时间
                    </th>
                    <th>
                       操作
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($applyList as $apply)
                <tr>
                    <td>{{$apply->user->name}}</td>
                    <td>{{$apply->user->mobile}}</td>
                    <td>{{$apply->status_text_arr[$apply->status]}}</td>
                    <td>{{$apply->created_at}}</td>
                    <td>
                        <div class="button-group">
                            @if(1 != $apply->status)
                                <button class="btn btn-info btn-sm apply"
                                data-url="{{action('SchooleTeacherController@applyReview', ['id' => $apply->id])}}"
                                data-action = "1">同意</button>
                                <button class="btn btn-warning btn-sm apply" 
                                data-url="{{action('SchooleTeacherController@applyReview',  ['id' => $apply->id])}}"
                                data-action = "2">拒绝</button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
 </div>
</div>
@endsection
@section('page_script')
<script>
        {{--  审核  --}}
        $(".apply").on("click", function(e){
            var url = $(this).data('url');
            axios.post(url, {'action' : $(this).data("action")})
            .then(function(data){
                if(data.status){
                    toastr.success(data.msg)
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                }else{
                    toastr.warning(data.msg);
                }
            })
            .catch(function(error){
                toastr.error("请求发送失败");
            });
        });
</script>
@endsection
@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-body">
        <button class="btn btn-info btn-sm col-sm-offset-11  show-file_export">批量导入</button>
        </div>
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
</div>

{{--  导入显示框  --}}
<div class="modal fade" id="templateExportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">文件导入</h4>
            <div id="content">
                <div><p　class="text-warning">请先下载<a href="{{action('SchooleTeacherController@teacherTemplate')}}">导入模板</a></p></div>
                <div>
                    <form action="{{action('SchooleTeacherController@teacherImport')}}" method="post" enctype="multipart/form-data">
                        <input type="file" id="file" name="teacher" />
                        <input type="submit" class="btn btn-primary" name="sub" value="导入" id="upload">
                    </form>
                </div>
            </div>
        </div>
        </div>
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

        {{--  文件导入  --}}
        $(".show-file_export").on("click", function(e){
            $("#templateExportModal").modal('show');
        })
</script>
<script>
    (function () { 
        document.getElementById('upload').onclick = function (e) {
            e.preventDefault();
          var data = new FormData();
          var url = "{{action('SchooleTeacherController@teacherImport')}}";
          data.append('teacher', document.getElementById('file').files[0]);
          var config = {
            onUploadProgress: function(progressEvent) {
              var percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
            }
          };
          axios.post(url, data, config)
            .then(function (res) {
                console.log(res);
            })
            .catch(function (err) {
                console.log(err);
            });
        };
      })();
</script>
@endsection
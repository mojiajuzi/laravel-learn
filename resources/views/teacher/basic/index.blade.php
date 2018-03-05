@extends("layouts.app")
@section("head_css")
<link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
<style>
    .dashed{
        height: 0;border-bottom: 1px dashed #ccc;
    }
    .bill_info_group .col-sm-6,.bill_info_group .col-sm-12{
        margin-bottom: 10px;
    }
    .line {
        height: 0;border-bottom: 1px solid #ccc;
        margin-bottom: 6px;
    }
    .feedback_history {
        padding: 15px;
    }
    .feedinfo{
        padding: 15px;
    }
    .feedcontent{
        margin-bottom: 20px;
        padding: 10px 10px 0 0;
    }
    .gray{
        color:#ccc;
    }
    .tab-content{
        padding-top: 35px;
    }
</style>
@endsection
@section("content")
<div class="row">
<div class="col-md-12">
    <div id="teacher_detail">
    <ul class="nav nav-tabs">
  　<li role="presentation" class="active"><a href="#basic" data-url="{{url('/teacher/basic')}}">基本信息</a></li>
  　<li role="presentation"><a href="#education" data-url="{{url('/teacher/education')}}">教育经历</a></li>
  　<li role="presentation"><a href="#work" data-url="{{url('/teacher/work')}}">工作经历</a></li>
  　<li role="presentation"><a href="#family" data-url="{{url('/teacher/family')}}">家庭成员</a></li>
  　<li role="presentation"><a href="#emergency" data-url="{{url('/teacher/emergency')}}">紧急联系人</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="basic">
            @include("teacher.basic.detail")
        </div>
        <div role="tabpanel" class="tab-pane" id="education">加载中...</div>
        <div role="tabpanel" class="tab-pane" id="work">加载中...</div>
        <div role="tabpanel" class="tab-pane" id="family">加载中...</div>
        <div role="tabpanel" class="tab-pane" id="emergency">加载中...</div>
    </div>
    </div>
 </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="...">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="edit_content">
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="...">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="create_content">
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@section("page_script")
 <script src="/js/bootstrap-datepicker.min.js"></script>
<script>
    var moduleArr = new Array();
    moduleArr["#basic"] = true;
    moduleArr["#education"] = false;
    moduleArr['#work'] = false;
    moduleArr['#family'] = false;
    moduleArr['#emergency'] = false;
    $('#teacher_detail a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
        var tabHref = $(this).attr("href");
        if(!moduleArr[tabHref]){
            var tabURL  = $(this).data("url");
            axios.get(tabURL).then(response =>{
                $(tabHref).html(response.data);
                moduleArr[tabHref] = true;
            })
        }
    })
    $(".hpdate").datepicker({
        format: "yyyy-mm-dd",
        StartDate: "1980-01-01"
    });
    //编辑
    $(document).on("click",".edit_teacher_form",function(event){
        event.preventDefault();
        var editurl = $(this).data("url")
        axios.get(editurl).then(response =>{
            $("#editModal").modal('show');
            $("#edit_content").html(response.data);
        })
    });

    // 提交修改请求
    $(document).on('click', ".edit_teacher_operator", function(event){
        var that = $(".teacher_edit_operator_form");
        var url = that.attr("action");
        console.log(that.serialize());
        
        axios.post(url, that.serialize()).then(response => {
            if(response.data.status){
                $("#editModal").modal('hide');
                window.location.reload();
            }else{
                toastr.warning(response.data.msg);
            }        
        })
    });

    //创建
    $(document).on("click",".show-create-teacherinfo-form",function(event){
        event.preventDefault();
        var editurl = $(this).data("url")
        axios.get(editurl).then(response =>{
            $("#createModal").modal('show');
            $("#create_content").html(response.data);
        })
    });

    //提交创建请求
    $(document).on("click", ".create_teacher_operator", function(){
        var that = $(".teacher_create_operator_form");
        var url = that.attr("action");
        axios.post(url, that.serialize()).then(response => {
            if(response.data.status){
                $("#createModal").modal('hide');
                window.location.reload();
            }else{
                toastr.warning(response.data.msg);
            }        
        })
    })
    //日期选择
    $(document).on("focus", ".hpdate",  function(){
        $(this).datepicker({
            format:"yyyy-mm-dd"
        });
    });
</script>
@endsection
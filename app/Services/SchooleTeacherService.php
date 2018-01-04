<?php
namespace App\Services;

use App\Schoole;
use App\SchooleTeacher;
use App\TeacherDetail;
use DB;
use Excel;
use App\Services\TemplateService;

class SchooleTeacherService extends BaseService
{
    /**
     * 获取所有的学校名称
     */
    public function schooleListForSearch(){
        return Schoole::select('schoole_uuid', 'schoole_name')->get();
    }

    /**
     * 保存用户申请
     * ＠param $schooleUUID 申请的学校标识
     * 
     * @params $userUUID 申请用户标识
     */
    public function apply(String $schooleUUID, String $userUUID){
        $apply = SchooleTeacher::where('teacher_uuid', $userUUID)->first();
        if(!is_null($apply))
            return $this->getReturnArr(FALSE, '你已加入学校');

        $insertData = ['teacher_uuid' => $userUUID, 'schoole_uuid' =>$schooleUUID ];
        try{
            SchooleTeacher::create($insertData);
             return $this->getReturnArr(TRUE, '申请成功。等待审核');
        }catch(Exception $e){
            return $this->getReturnArr(FALSE, '申请失败。需重新申请');
        }
    }

    /**
     * 获取审核列表
     * @param $schooleUUID 学校标识
     */
    public function list(String $schooleUUID){
        return SchooleTeacher::with('user')->where('schoole_uuid', $schooleUUID)->get();
    }

    /**
     * 教师申请审核
     * @param $applyID 申请记录id
     * @param $action 审核操作
     * @param $schooleUUID 学校唯一标识
     */
    public function review(Int $applyID, Int $action, String $schooleUUID): Array{
        $where = ['id' => $applyID, 'schoole_uuid' => $schooleUUID];
        $recoder = SchooleTeacher::where($where)->with('user')->first();

        if(is_null($recoder))
            return $this->getReturnArr(FALSE, '记录不存在');
        
        if(SchooleTeacher::APPLY_STATUS_PASS ==  $recoder->status)
            return $this->getReturnArr(FALSE, '该用户已经审核通过');
        
        try {
            DB::transaction(function()use($recoder,$action, $schooleUUID){
                $teacherData = [
                    'teacher_uuid' => $recoder->user->user_uuid,
                    'teacher_name' => $recoder->user->name,
                    'schoole_uuid' => $schooleUUID
                ];
                TeacherDetail::create($teacherData);
                $recoder->status = $action;
                $recoder->save();
            });
        }catch(Exception $e){
            return $this->getReturnArr(FALSE, '数据操作失败');
        }
        return $this->getReturnArr();
    }

    /**
     * 教师导入模板下载
     */
    public function teacherTemplate(){
        $title = TemplateService::getTeacherExportTitle();
        $this->templateExport("teacher", $title);
    }

    public function studentTemplate(){
        $title = TemplateService::getStudentsExportTitle();
        $this->templateExport("student", $title);
    }

    protected function templateExport(String $fileName, Array $title){
        Excel::create($fileName, function($excel)use($fileName,$title){
            $excel->sheet($fileName, function($sheet)use($title){
                $sheet->fromArray($title);
            });
        })->export("xls");
    }
}


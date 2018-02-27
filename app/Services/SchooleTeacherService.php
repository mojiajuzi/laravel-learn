<?php
namespace App\Services;

use App\Schoole;
use App\SchooleTeacher;
use App\TeacherDetail;
use App\Teacher\TeacherBasic;
use DB;
use Excel;
use Validator;
use App\Services\TemplateService;
use App\User;
use Webpatser\Uuid\Uuid;

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
                    'schoole_uuid' => $schooleUUID,
                    'teacher_mobile' => $recoder->user->mobile
                ];
                TeacherDetail::create($teacherData);
                $recoder->status = $action;
                $recoder->save();
            });
        }catch(Exception $e){
            return $this->getReturnArr(FALSE, '数据操作失败');
        }
        return $this->getReturnArr(TRUE, '操作成功');
    }

    /**
     * 教师导入模板下载
     */
    public function teacherTemplate(){
        $title = array_values(TemplateService::getTeacherExportTitle());
        $formatArr = TemplateService::getTeacherExportTitleFormat();
        Excel::create("teacher", function($excel)use($title, $formatArr){
            $excel->sheet("teacher", function($sheet)use($title, $formatArr){
                $sheet->setColumnFormat($formatArr);
                $sheet->fromArray($title);
            });
        })->export("xls");
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

    public function teacherImport($file, String $schooleUUID):Array{
        //获取上传数据
        $data = Excel::load($file, function($reader){
        })->get();
        $errors = [];
        if(!empty($data) && $data->count()){
            $rules = TemplateService::teacherExcelTitleValideRule();
            foreach($data as $k => $detail){
                $result = $this->validateTeacherData($detail->toArray(), $rules);
                if($result['status']){
                    $this->registerAccountAndAddSchoole($schooleUUID, $result['data']);
                }else{
                    $errors[][$result['data']['teacher_name']] =$result['errors'];
                }
            }
        }
        return $this->getReturnArr(TRUE, '操作成功');
    }

    /**
     * 校验导入的数据是否正确
     */
    protected function validateTeacherData(Array $data, Array $rules): Array {
        $data = array_combine(array_keys($rules), $data);
        $v = Validator::make($data, $rules);
        if($v->fails())
            return ['status' => false, 'errors' => $v->errors(), 'data' => $data];
        return ['status' => TRUE, 'data' => $data];
    }

    protected function registerAccountAndAddSchoole(String $schooleUUID, Array $data){
        try {
            DB::transaction(function()use($schooleUUID, $data){
                //判断用户是否已经注册了帐号
                $user = User::where("mobile", $data['teacher_mobile'])->first();

                if(!is_null($user)){
                    //判断用户是否已经向学校申请
                    $apply = SchooleTeacher::where("teacher_uuid", $user->user_uuid)->where("schoole_uuid", $schooleUUID)->first();
                    if(is_null($apply)){
                        $this->applyRecoderCreate($schooleUUID, $user->user_uuid);
                        $this->creatTeacherDetail($data, $schooleUUID, $user->user_uuid);
                    }elseif(SchooleTeacher::APPLY_PASS != $apply->status){
                        //申请未通过,需要审核通过，并创建教师帐号信息
                        $apply->status = SchooleTeacher::APPLY_PASS;
                        $apply->save();
                        $this->creatTeacherDetail($data, $schooleUUID, $user->user_uuid);
                    }
                }else{
                    $user =  User::create([
                            "name" => $data["teacher_name"],
                            "mobile" => $data["teacher_mobile"],
                            'password' => bcrypt($data['teacher_mobile']),
                            'user_uuid' => Uuid::generate()->string
                        ]);
                        $this->applyRecoderCreate($schooleUUID, $user->user_uuid);
                        $this->creatTeacherDetail($data, $schooleUUID, $user->user_uuid);
                    }
            });
        } catch(Exception $e){
            //记录日志
        }
    }

    protected function creatTeacherDetail(Array $data, String $schooleUUID, String $userUUID){
        $basicdata["teacher_uuid"] = $userUUID;
        $basicdata["schoole_uuid"] = $schooleUUID;
        $basicdata["mobile"] = $data["teacher_mobile"];
        $basicdata["gender"] = ($data["teacher_sex"] == "男") ? "male" : "female";
        $basicdata["teacher_name"] = $data["teacher_name"];
        TeacherBasic::insert($basicdata);
    }

    protected function applyRecoderCreate($schooleUUID, $userUUID){
       SchooleTeacher::create([
            'teacher_uuid' => $userUUID,
            'schoole_uuid' => $schooleUUID,
            'status' => SchooleTeacher::APPLY_PASS
        ]);
    }
}


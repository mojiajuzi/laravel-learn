<?php
namespace App\Services;

use App\Schoole;
use App\SchooleTeacher;

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
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CodeService;

class SmsController extends Controller
{
    protected $codeService;

    private $codeType = "register";

    public function __construct(CodeService $code){
        $this->codeService = $code;
    }

    public function index(){
        $mobile = "18274698403";
        $checkResult = $this->codeService->increSendTimes($mobile, $this->codeType);
        if(!$checkResult)
            return response()->json(['status' => FALSE, 'msg' => '发送数量达上限，三个小时以后再试']);
        $code = $this->codeService->cacheCode($mobile, $this->codeType);
        $res = $this->check("123456");
        return response()->json($res);
    }

    public function check($code){
        $mobile = "18274698403";
        return $this->codeService->checkCode($mobile, $this->codeType, $code);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SmsService;
use TheSeer\Tokenizer\Exception;

class HomeController extends Controller
{
    protected $sms;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SmsService $smsService)
    {
        $this->sms = $smsService;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sendCode(){
        $aliyunSms = $this->sms->aliyunSms();

        try{
        $result = $aliyunSms->send(18274698403, [
                    'content' => 'sssssss',
                    'template' => 'SMS_126635399',
                    'data' => [
                        'code' => 123456
                    ]
                    ], ['aliyun']);
        }catch(\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $e){
            return $e->results['aliyun']['exception']->raw['Message'];
        }
    }
}

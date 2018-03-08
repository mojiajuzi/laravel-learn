<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Webpatser\Uuid\Uuid;
use App\Services\SmsService;
use App\Services\CodeService;
use App\Rules\ZhcnMobileRule as mobile;
use App\Services\SmsTemplateService;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $smsService;

    protected $codeService;

    protected $smsTempService;

    protected $cacheType = "register";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SmsService $sms, CodeService $code, SmsTemplateService $temp)
    {
        $this->smsService = $sms;
        $this->codeService = $code;
        $this->smsTempService = $temp;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
            'user_uuid' => Uuid::generate()->string
        ]);
    }

    /**
     * 发送验证码
     *
     * @param Request $request
     * @return void
     */
    public function code(Request $request){
        $params = $request->all();
        $rules = $this->mobileAndCodeRules();
        unset($rules["code"]);
        $v = Validator::make($params, $rules);
        if ($v->fails()){
            $error = $v->errors()->first();
            $errors = $v->errors();
            $data = ['code' => 0, 'status' => false, 'msg'=>$error, 'res'=>[], 'errors'=>$errors];
            return response()->json($data);
        }

        //获取发送的数据
        $tempKeyAlise = 'vericationCode';
        $code = $this->codeService->cacheCode($params["mobile"], $this->cacheType);
        $data = $this->smsTempService->fillTempPlaceholderByDataAndKey($tempKeyAlise, ['code' => $code]);

        if(!$data['status'])
            return response()->json($data);

        //准备发送
        $aliyunSms = $this->sms->aliyunSms();
        try{
            $aliyunSms->send($params["mobile"], [
                    'content' => '',
                    'template' => $this->smsTempService->getTemplateKey($tempKeyAlise),
                    'data' => $data
                    ], ['aliyun']);
        }catch(\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $e){
            // return $e->results['aliyun']['exception']->raw['Message'];
            return response()->json(['status' => FALSE, 'msg' => '发送失败']);
        }
        return response()->json(['status' => TRUE, 'msg' => '发送成功,请注意查收短信']);

    }

    public function mobileAndCodeRules(){
        return [
            "mobile" => ["required","string", new mobile],
            "code" => "required|string|min:6"
        ];
    }
}

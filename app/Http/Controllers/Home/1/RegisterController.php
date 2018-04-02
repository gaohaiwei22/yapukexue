<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Home\homeuser;
use Illuminate\Support\Facades\Redis;
use Session;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
//use App\Model\message\SMS;


class RegisterController extends Controller
{
   public function index()
    {
        return view('home.register');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    private static $config = [
        'accessKeyId'=> 'LTAIetnFDud6qAhM',
        'accessKeySecret' => 'uIHPvwzBzDh4cht27LANlku7oP8ekt',
    ];
    //发送短信的模板(1:注册验证码  2:修改密码  3:修改手机号  4:找回密码验证码)
    private static $smsTemplate = array("0","SMS_112865157","SMS_112865156","SMS_112865155","SMS_113455188");

    public function sendMobileCode(Request $request)
    {
        $phone = $request ->input('phone'); // 用户手机号，接收验证码
        $dd = homeuser::where('phone',$phone)->get()->toArray();
        //dd($dd);die();
        if(count($dd)>0){
            return 1;

        }else{
            $code = rand(100000, 999999);
            $redis   = new Redis;
            $sendSms = new SendSms;
            $client  = new Client(self::$config);
            $sendSms->setTemplateCode('SMS_112865157');
            $sendSms->setPhoneNumbers($phone);// 用户手机号，接收验证码`
            $sendSms->setSignName('旭日东升');// 短信签名,可以在阿里大鱼的管理中心看到
            $sendSms->setTemplateParam(['code' => $code]);
            //存入redis
            Redis::set($phone,$sendSms);
            //设置生存360秒时间
            Redis::expireAt($phone,time()+60*5);
            $sendSms->setOutId('demo');
            $result = $client->execute($sendSms);
            if ($result->Code != 'OK') { //判断result对象中success 时候为真
                if($result->Code == 'isv.BUSINESS_LIMIT_CONTROL'){
                    return array('info' => '不能频繁发送，请稍候再试!');
                }else{
                    return array('info' => '发送失败请重试!');
                }
            }
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取要添加的数据
        $homeuser = $request->only("email","password","phone");

        //判断users管理邮箱是否被占用
        if(homeuser::where('email',$homeuser['email'])->first()){
            //返回json数据页面接收
            return Response()->json(['info' => '这个邮箱已被使用!', 'error_code' => 1]);
        }
        //获取验证码
        $mycode = $request->input("code");
        $phone = $request->input("phone");
        $code = Redis::get($phone);
        //判断验证码是否合法
        if($mycode != $code){
            return back()->with("msg","验证码错误");
        }
        //处理密码,加密
        $homeuser['password']=md5($homeuser['password']);
        //添加管理员时间
        $homeuser['create_at']=date("Y-m-d H:i:s",time());

        //添加数据到数据库
        $success =DB::table('homeuser')->insert($homeuser);
        //返回视图
        if($success>0){
            return redirect("home/success");
        }else{
            return redirect("home/lose");
        }

    }

    //注册成功
    public function success()
    {
        return view("home.success");
    }

    //注册失败
    public function lose()
    {
        return view("home.lose");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

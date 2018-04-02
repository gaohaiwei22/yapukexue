<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;
use Illuminate\Support\Facades\DB;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class loginController extends Controller
{
    //加载登陆界面
    public function login()
    {
        return view('home.login');
    }
//执行登陆判断
    public function doLogin(Request $request)
    {
        //先验证验证码
        //获取验证码
        $mycode = $request ->input('mycode');
        $code = $request -> session() ->get('phrase');

        if($mycode !== $code){
            return back()->with("msg","验证码错误!");
        }
        //验证邮箱与密码
        $email = $request ->input('email');
        $password = $request ->input('password');
        //从数据库查询信息
        $user = \DB::table("homeuser")->where("email",$email)->first();
        if(!empty($user)){
            //验证密码
            if(md5($password) == $user->password){
                session()->put("homeuser",$user);
                //跳回页面
                return redirect("/");
            }
        }
        return back() -> with("msg","用户名或密码错误！");
    }

    //验证码加载
    public function getCode()
    {
        $phraseBuilder = new PhraseBuilder(4,'0123456789');
        $builder = new CaptchaBuilder(null, $phraseBuilder);
        $builder->build(150,32);
        \Session::put('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
    }
    //执行退出
    public function logout(Request $request)
    {
        $request->session()->forget('homeuser');
        return redirect("/");
    }

}

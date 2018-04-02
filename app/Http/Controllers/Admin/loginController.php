<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.login');
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
		$user = \DB::table("users")->where("email",$email)->first();
		if(!empty($user)){
			//验证密码
			if(md5($password) == $user->password){
				session()->put("adminuser",$user);
                //获取当前登陆者的权限
                $res = \DB::select('select n.name,n.method,n.url  from user_role ur,role_node rn,node n where ur.rid=rn.rid and rn.nid=n.id and ur.uid=:id', ['id' => $user->id]);
                $nodelist = array(array("name"=>"网站首页","method"=>"get","url"=>"admin"));
                foreach($res as $ob){
                    $nodelist[] = [
                        "name"=>$ob->name,
                        "method"=>$ob->method,
                        "url"=>$ob->url
                    ];
                    //判断当前是否有添加权限,若有就追加执行添加
                    if(preg_match("/^.*?\/create$/",$ob->url) && $ob->method=="get"){
                        $nodelist[] =[
                            "name"=>"执行添加",
                            "method"=>"post",
                            "url"=>preg_replace("/^(.*?)\/create$/","\\1",$ob->url)
                        ];
                    }
                    //判断当前是否有修改权限,若有就追加执行修改
                    if(preg_match("/^.*?\/\*\/edit$/",$ob->url) && $ob->method=="get"){
                        $nodelist[] =[
                            "name"=>"执行修改",
                            "method"=>"put",
                            "url"=>preg_replace("/^(.*?)\/\*\/edit$/","\\1/*",$ob->url)
                        ];
                    }
                }
                //将获取的权限放入到session中
                session()->push("nodelist",$nodelist);
                //跳回页面
				return redirect("admin");
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
       $request->session()->forget('adminuser');
       return redirect("admin/login");
   }
}

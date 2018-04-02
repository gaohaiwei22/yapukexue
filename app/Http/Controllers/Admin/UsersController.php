<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化users表
        $users = DB::table('users');
        //判断并封装搜索条件
        $params  = array();
        if(!empty($_GET['name'])){
            $users->where("name","like","%{$_GET['name']}%");
            $params["name"]=$_GET["name"];//维持封装搜索
        }

        $user = $users->orderBy('id',"desc")->paginate(5);//每六页翻页显示

        //显示页面
        return view('admin.users.index',['user'=>$user,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加管理员页面
        return view('admin.users.create');
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
        $users = $request->only("name","email","password");
        //判断users管理用户是否被占用
            if(users::where('name',$users['name'])->first()){
                //返回json数据页面接收
            return Response()->json(['info' => '这个名字已被使用!', 'error_code' => 1]);
        }
        //判断users管理邮箱是否被占用
        if(users::where('email',$users['email'])->first()){
            //返回json数据页面接收
            return Response()->json(['info' => '这个邮箱已被使用!', 'error_code' => 1]);
        }
        //处理密码,加密
        $users['password']=md5($users['password']);
         //添加管理员时间
        $users['create_at']=date("Y-m-d H:i:s",time());

        //添加数据到数据库
        DB::table('users')->insert($users);
        //返回视图
        return redirect("admin/users");
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
        //编辑管理员信息
        $users = users::where('id',"=",$id)->first();
        //视图遍历
        return view("admin.users.edit",["users"=>$users]);
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
        //获取要编辑的信息
        $data = $request->only("name","email","password");
        //处理密码,加密
        $data['password']=md5($data['password']);
        //添加更新时间
        $data['update_at'] = date("Y-m-d H:i:s",time());
        //根据user表的id来更新数据
        $id = \DB::table("users")->where("id",$id)->update($data);
        //判断是否更新成功
        if($id>0){
            return redirect('admin/users');//成功返回视图
        }else{
            return back()->with("err","修改失败!");//失败报错
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除管理员信息
        users::where('id',"=",$id)->delete();
        //重定向
        return redirect('admin/users');
    }

    //为当前用户准备分配角色信息
    public function loadRole($uid=0){
        //获取所有的角色
        $role = DB::table("role")->get();
        //获取当前用户的角色id
        $rids = DB::table("user_role")->where("uid",$uid)->pluck("rid")->toArray();
        //加载模板
        return view("admin.users.rolelist",["uid"=>$uid,"rids"=>$rids,"role"=>$role]);
    }
    public function saveRole(Request $request){

        $uid = $request->input("uid");
        //清除数据
        \DB::table("user_role")->where("uid",$uid)->delete();

        $rids = $request->input("rids");
        if(!empty($rids)){
            //处理添加数据
            $data = [];
            foreach($rids as $v){
                $data[] = ["uid"=>$uid,"rid"=>$v];
            }
            //添加数据
            \DB::table("user_role")->insert($data);
        }
        return "角色保存成功!";
    }
}

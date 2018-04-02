<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化Role表
        $role = DB::table("role");
        //判断并封装搜索条件
        $params = array();
        if(!empty($_GET['name'])){
            $role->where("name","like","%{$_GET["name"]}%");
            $params["name"] = $_GET["name"];//维持搜索
        }
       $roles=  $role ->orderBy('id','desc')->paginate(5);//每5条数据翻页显示

        //返回视图显示
        return view("admin.role.index",["roles"=>$roles,"params"=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面
        return view('admin.role.create');
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
        $role = $request->only(["name","state"]);
        //处理添加时间
        $role['create_at'] = date("Y-m-d H:i:s",time());
        //添加到数据库
        DB::table('role')->insert($role);
        //返回视图
        return redirect("admin/role");
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
        //获取要编辑的信息
        $role = role::where('id',"=",$id)->first();
        //显示要编辑的信息\
        return view('admin.role.edit',["role"=>$role]);
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
        //编辑信息执行修改
        $role = $request->only('name','state');
        //添加更新时间
        $role['update_at'] = date("Y-m-d H:i:s",time());
        //根据role表的id来执行更行数据库
        $id = DB::table('role')->where('id',$id)->update($role);
        //判断是否修改成功
        if($id){
            return redirect('admin/role');//成功返回页面
        }else{
            return back()->with("err","修改失败!");
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
        //删除管理员角色
        role::where("id","=",$id)->delete();
        //重定向视图
        return redirect("admin/role");
    }
    //为当前角色准备分配节点信息
    public function loadNode($rid=0)
    {
        //获取所有节点信息
        $nodelist = \DB::table("node")->get();
        //获取当前角色的节点id
        $nids = \DB::table("role_node")->where("rid",$rid)->pluck("nid")->toArray();
        //加载模板
        return view("admin.role.nodelist",["rid"=>$rid,"nodelist"=>$nodelist,"nids"=>$nids]);
    }

    public function saveNode(Request $request){
        $rid = $request->input("rid");
        //清除数据
        \DB::table("role_node")->where("rid",$rid)->delete();

        $nids = $request->input("nids");
        if(!empty($nids)){
            //处理添加数据
            $data = [];
            foreach($nids as $v){
                $data[] = ["rid"=>$rid,"nid"=>$v];
            }
            //添加数据
            \DB::table("role_node")->insert($data);
        }
        return "节点保存成功!";
    }
}

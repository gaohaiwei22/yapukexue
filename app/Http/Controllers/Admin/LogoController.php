<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\logo;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化logo表
        $db = DB::table('logo');
        //封装搜索条件
        $params = array();
        if(!empty($_GET['name'])){
            $db->where("name","like","%{$_GET["name"]}%");
            $params['name'] = $_GET["name"];
        }
            $logo = $db->orderBy('id',"desc")->paginate("5");//每5条数据翻页显示
         return view('admin.logo.index',['logo'=>$logo,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面
        return view("admin.logo.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取要添加的数据信息
        $logo = $request->only(["name","logo","status","create_at"]);
        //处理添加时间
        $logo["create_at"] = date("Y-m-d H:i:s",time());
        //添加到数据库
        DB::table("logo")->insert($logo);
        //返回页面
        return redirect("admin/logo");
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
        $logo = logo::where("id","=",$id)->first();
        //返回页面
        return view("admin.logo.edit",["logo"=>$logo]);

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
        //执行修改
        $logo = $request->only(["name","logo","status","update_at"]);
        //添加到数据库更新数据
        DB::table("logo")->where("id",$id)->update($logo);
        //返回页面
        return redirect("admin/logo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除
        DB::table("logo")->where("id","=",$id)->delete();
        //返回视图
        return redirect("admin/logo");
    }
}

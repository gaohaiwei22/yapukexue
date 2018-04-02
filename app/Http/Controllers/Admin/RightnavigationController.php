<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Rightnavigation;
use Illuminate\Support\Facades\DB;

class RightnavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示导航栏
        $db = DB::table('rightnavigation');
        $params  = array();
        if(!empty($_GET['name'])){
            $db->where("name","like","%{$_GET['name']}%");
            $params["name"]=$_GET["name"];//维持封装搜索
        }
        $rightnavigation = $db->orderBy('id',"desc")->paginate(5);//每5条数据翻页显示

        return view('admin.rightnavigation.index',['rightnavigation'=>$rightnavigation,"params"=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页
        return view('admin.rightnavigation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        $rightnavigation = $request->only(['name','url','status','names']);
        //添加到数据库
        DB::table('rightnavigation')->insert($rightnavigation);
        //返回视图
        return redirect('admin/rightnavigation');
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
        $rightnavigation = rightnavigation::where('id',"=",$id)->first();
        //视图遍历
        return view("admin.rightnavigation.edit",["rightnavigation"=>$rightnavigation]);
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
        //获取要修改的信息
        $rightnavigation = $request->only(['name','url','status','names']);
        //添加到数据库
        DB::table("rightnavigation")->where("id",$id)->update($rightnavigation);
        //返回页面
        return redirect("admin/rightnavigation");
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

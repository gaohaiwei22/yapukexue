<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Introduction;
use Illuminate\Support\Facades\DB;
class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $introduction = DB::table("introduction")->get();
        return view("admin.Introduction.index",["introduction"=>$introduction]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页
        return view("admin.Introduction.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取学习概述名称
        $summary = $request->only(['summary',"address"]);
        //添加到数据库
        DB::table("introduction")->insert($summary);
        //返回首页
        return redirect("admin/introduction");
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
       //显示编辑页面
        $summary = introduction::where("id","=",$id)->first();
        //显示编辑页面
        return view("admin.Introduction.edit",['summary'=>$summary]);
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
        $summary = $request->only(['summary',"address"]);
        //添加数据库
        DB::table("introduction")->where("id",$id)->update($summary);
        //显示添加页面
        return redirect("admin/introduction");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除信息
        DB::table("introduction")->where("id","=",$id)->delete();
        //返回视图
        return redirect("admin/introduction");
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Resources;
use Illuminate\Support\Facades\DB;

class ShangchuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Resources = Resources::where("status",0)->get();
        //dd($Resources);
        return view("admin.shangchuan.index",['Resources'=>$Resources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.shangchuan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //获取上传信息
        $Resources = $request->only(['name','type','size','file','status']);
        DB::table("Resources")->insert($Resources);
        //返回试图
        return redirect('admin/shangchuan');
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
        //显示编辑
        $Resources = Resources::where("id","=",$id)->first();
        //返回
        return view("admin.shangchuan.edit",["Resources"=>$Resources]);
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
        $Resources = $request->only(['name','type','size','file','status']);
        DB::table("Resources")->where("id",$id)->update($Resources);
        //返回试图
        return redirect('admin/shangchuan');
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
        DB::table("Resources")->where("id","=",$id)->delete();
        //返回视图
        return redirect("admin/shangchuan");
    }
}

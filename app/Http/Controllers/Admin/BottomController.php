<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Bottom;

class BottomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //查看bottom表信息
        $bottom = DB::table("bottom")->get();
        return view('admin.bottom.index',['bottom'=>$bottom]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面
        return view('admin.bottom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取公司信息
        $bottom = $request->only(['phone','address','englishaddress','edition','image','status']);
        //处理添加时间
        $bottom['create_at'] = date("Y-m-d H:i:s",time());
        //添加到数据库
        DB::table("bottom")->insert($bottom);
        //返回首页
        return redirect("admin/bottom");
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
        $bottom = bottom::where("id","=",$id)->first();
        //显示编辑页面
        return view("admin.bottom.edit",['bottom'=>$bottom]);

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
        $bottom = $request->only(['phone','address','englishaddress','edition','image','status']);
        //处理添加时间
        $bottom['update_at'] = date("Y-m-d H:i:s",time());
        //添加数据库
        DB::table("bottom")->where("id",$id)->update($bottom);
        //显示添加页面
        return redirect("admin/bottom");
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
        DB::table("bottom")->where("id","=",$id)->delete();
        //返回视图
        return redirect("admin/bottom");
    }
}

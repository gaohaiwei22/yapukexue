<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Title;
use Illuminate\Support\Facades\DB;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化title产品标题表
        $title = DB::table("title");
        //每5条数据翻页显示
        $data = $title->orderBy('id',"desc")->paginate(6);
        //显示页面
        return view("admin.title.index",['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示产品标题添加页面
        return view('admin.title.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据执行添加
        $title = $request->only(['title','name','status',"names"]);
        //添加到数据库
        DB::table('title')->insert($title);
        //返回试图
        return redirect('admin/title');
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
        $title = title::where('id','=',$id)->first();
        //返回试图
        return view('admin.title.edit',['title'=>$title]);
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
        //执行要编辑的信息
        $title = $request->only(['title',"name","status","names"]);
        //修改的数据添加到数据库
        DB::table('title')->where('id',$id)->update($title);
        //返回数据库
        return redirect('admin/title');
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
        title::where('id',"=",$id)->delete();
        //返回页面
        return redirect("admin/title");
    }
}

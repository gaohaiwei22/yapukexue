<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course_video;
use App\Model\Learning;
use Illuminate\Support\Facades\DB;
class Course_videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化Totalcourse表
        $db = \DB::table('Course_video');
        //判断并封装
        $params = array();
        if(!empty($_GET["name"])){
            $db->where('name','like','%'.$_GET["name"].'%');
            $params['name'] = $_GET['name'];
        }
        //产品课程总介
        $Course_video = $db->orderBy('id','desc')->where("status",0)->paginate(5);
        foreach($Course_video as $k=>$v){
                $Course_video[$k]->type_name = \DB::table('learning')->where('id', $v->type_id)->first();
        }
        //dd($Course_video);
        return view("admin.Course_video.index",["Course_video"=>$Course_video]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页
        $learning = DB::table("learning")->get();
        foreach($learning as $k=>$v){
            $learning[$k]->type_name = \DB::table('product_table')->where('id', $v->product_id)->first();
        }
        return view("admin.Course_video.create",["learning"=>$learning]);
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
        $Course_video = $request->only(['type_id','name','video','introduce','create_at','status']);
        //处理时间
        $Course_video['create_at'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('Course_video')->insert($Course_video);
        //返回首页
        return redirect('admin/Course_video');
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
        //获取要编辑的数据
        $Course_video = Course_video::where('id','=',$id)->first();
        $learning = DB::table("learning")->get();
        foreach($learning as $k=>$v){
            $learning[$k]->type_name = \DB::table('product_table')->where('id', $v->product_id)->first();
        }

        //显示视图
        return view('admin.Course_video.edit',['Course_video'=>$Course_video,'learning'=>$learning]);
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
        //获取要添加的数据
        $Course_video = $request->only(['type_id','name','video','introduce','update_at','status']);
        //处理时间
        $Course_video['update_at'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('Course_video')->where('id',$id)->update($Course_video);
        //返回首页
        return redirect('admin/Course_video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除导航产品
        Course_video::where('id','=',$id)->delete();
        //返回页面
        return redirect('admin/Course_video');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\product_table;
use App\Model\Course;
use Illuminate\Support\Facades\DB;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化Course表
        $db = \DB::table('course');
        //判断并封装
        $params = array();
        if(!empty($_GET["name"])){
            $db->where('name','like','%'.$_GET["name"].'%');
            $params['name'] = $_GET['name'];
        }
        //产品课程总介
        $Course = $db->orderBy('id','desc')->where("status",0)->paginate(5);
        foreach($Course as $k=>$v){
            $Course[$k]->type_name = \DB::table('learning')->where('id', $v->type_id)->first();
        }
        return view("admin.course.index",["Course"=>$Course]);
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
        return view("admin.course.create",["learning"=>$learning]);
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
        $course = $request->only(['type_id','name','picture','number','Course','Generalization','title','introduction','Practical','link','download','create_at','status']);
        //处理时间
        $course['create_at'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('course')->insert($course);
        //返回首页
        return redirect('admin/course');
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
        $course = course::where('id','=',$id)->first();
        $learning = DB::table("learning")->get();
        foreach($learning as $k=>$v){
            $learning[$k]->type_name = \DB::table('product_table')->where('id', $v->product_id)->first();
        }
        //显示视图
        return view('admin.course.edit',['course'=>$course,'learning'=>$learning]);
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
        //获取要修改的数据
        $course = $request->only(['type_id','name','picture','number','Course','Generalization','title','introduction','Practical','link','download','update_at','status']);
        //处理时间
        $course['update_at'] = date("Y-m-d H:i:s",time());
        //把修改的数据添加到数据库
        DB::table('course')->where('id',$id)->update($course);
        //返回首页
        return redirect('admin/course');
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
        course::where('id','=',$id)->delete();
        //返回页面
        return redirect('admin/course');
    }
}

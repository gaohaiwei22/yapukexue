<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\product_table;
use App\Model\Curriculum;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化Totalcourse表
        $db = \DB::table('curriculum');
        //判断并封装
        $params = array();
        if(!empty($_GET["name"])){
            $db->where('name','like','%'.$_GET["name"].'%');
            $params['name'] = $_GET['name'];
        }
        //产品课程总介
        $curriculum = $db->orderBy('id','desc')->where("status",0)->paginate(5);
        foreach($curriculum as $k=>$v){
            $curriculum[$k]->type_name = \DB::table('product_table')->where('id', $v->product_id)->first();
        }
        return view("admin.curriculum.index",["curriculum"=>$curriculum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页
        $curriculum = DB::table('product_table')->get();
        return view("admin.curriculum.create",["curriculum"=>$curriculum]);
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
        $curriculum = $request->only(['product_id','name','picture','number','Course','Generalization','title','introduction','Practical','link','download','create_at','status']);
        //处理时间
        $curriculume['create_at'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('curriculum')->insert($curriculum);
        //返回首页
        return redirect('admin/curriculum');
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
        $curriculum = curriculum::where('id','=',$id)->first();
        //获取产品类型
        //$product = product::where('id','=',$id)->first();
        $curriculu = DB::table('product_table')->get();
        //显示视图
        return view('admin.curriculum.edit',['curriculum'=>$curriculum,'curriculu'=>$curriculu]);
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
        $curriculum = $request->only(['product_id','name','picture','number','Course','Generalization','title','introduction','Practical','link','download','update_at','status']);
        //处理时间
        $curriculume['update_at'] = date("Y-m-d H:i:s",time());
        //把修改的数据添加到数据库
        DB::table('curriculum')->where('id',$id)->update($curriculum);
        //返回首页
        return redirect('admin/curriculum');
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
        curriculum::where('id','=',$id)->delete();
        //返回页面
        return redirect('admin/curriculum');
    }
}

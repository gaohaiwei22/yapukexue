<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Totalcourse;
use App\Model\product_table;
use Illuminate\Support\Facades\DB;
class TotalcourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化Totalcourse表
        $db = \DB::table('Totalcourse');
        //判断并封装
        $params = array();
        if(!empty($_GET["name"])){
            $db->where('name','like','%'.$_GET["name"].'%');
            $params['name'] = $_GET['name'];
        }
        //产品课程总介
        $Totalcourse = $db->orderBy('id','desc')->where("status",0)->paginate(5);
        foreach($Totalcourse as $k=>$v){
            $Totalcourse[$k]->type_name = \DB::table('product_table')->where('id', $v->product_id)->first();
        }
        return view("admin.Totalcourse.index",["Totalcourse"=>$Totalcourse]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页
        $Totalcourse = DB::table('product_table')->get();
        return view("admin.Totalcourse.create",["Totalcourse"=>$Totalcourse]);
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
        $Totalcourse = $request->only(['product_id','name','video','introduce','create_at','status']);
        //处理时间
        $Totalcourse['create_at'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('Totalcourse')->insert($Totalcourse);
        //返回首页
        return redirect('admin/Totalcourse');
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
        $Totalcourse = Totalcourse::where('id','=',$id)->first();
        //获取产品类型
        //$product = product::where('id','=',$id)->first();
        $Totalcours = DB::table('product_table')->get();
        //显示视图
        return view('admin.Totalcourse.edit',['Totalcourse'=>$Totalcourse,'Totalcours'=>$Totalcours]);
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
        $Totalcourse = $request->only(['product_id','name','video','introduce','update_at','status']);
        //处理时间
        $Totalcourse['update_at'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('Totalcourse')->where('id',$id)->update($Totalcourse);
        //返回首页
        return redirect('admin/Totalcourse');
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
        Totalcourse::where('id','=',$id)->delete();
        //返回页面
        return redirect('admin/Totalcourse');
    }
}

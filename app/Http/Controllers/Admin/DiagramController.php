<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Diagram;
use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化Diagram表的轮播图
        $Diagram = DB::table('diagram');
        //判断并封装
        $params = array();
        if(!empty($_GET["name"])){
            $Diagram->where('name','like','%{$_GET["name"]}%');
            $params['name'] = $_GET['name'];
        }
        $Diagrams = $Diagram->orderBy('id','desc')->paginate(5);
        return view('admin.diagram.index',['Diagrams'=>$Diagrams,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面
        return view('admin.diagram.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //实例化carousel表添加
        $diagram = DB::table('diagram');

        //获取指定数据
        $diagram = $request->only(['name','picname','subname','pic']);
        //添加数据
        DB::table('diagram')->insert($diagram);
        //返回页面
        return redirect("admin/diagram");
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
        $diagram = diagram::where('id','=',$id)->first();
        //视图显示
        return view('admin.diagram.edit',['diagram'=>$diagram]);
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
        //执行修改数据
        $diagram = diagram::find($id);

        $diagram->name = $request->name;
        $diagram->subname = $request->subname;
        //=======产品图片=======>
        $diagram->picname = $request->picname;
        $diagram->pic = $request->pic;
        //插入数据库
        $diagram->save();
//        //获取要编辑的信息执行修改
//        $diagram = $request->only(['name','picname','subname','pic']);
//        //执行修改
//        DB::table('diagram')->where('id',$id)->update($diagram);
        //返回视图
        return redirect('admin/diagram');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除轮播图
        DB::table('diagram')->where('id','=',$id)->delete();
        return redirect("admin/diagram");
    }
}

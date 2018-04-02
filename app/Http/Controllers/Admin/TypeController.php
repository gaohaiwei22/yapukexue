<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Type;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化type表无限分类
        $type = DB::table('type');

        //执行查询并将结果放置到对象中
       $list = DB::select("select * from type order by concat(path,id) asc");
        //处理type信息
        foreach ($list as $v){
            $m = substr_count($v->path,",");
            //生成缩进
            $v->name = str_repeat("&nbsp;",($m-1)*8)."|--".$v->name;
        }
        return view('admin.type.index',["list"=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //显示添加无限分类页

        //执行sql查询并处理信息
        //$list = DB::select("select * from type order by concat(path,id) asc");
        $list = type::where('id','=',$id)->get();

            //遍历信息
            foreach ($list as $v) {
                $m = substr_count($v->path, ",");
                //生成缩进
                $v->name = str_repeat("&nbsp;", ($m - 1) * 8) . "|--" . $v->name;
            }
            //跳回类别首页
            return view('admin.type.create', ["list" => $list]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //实例化type表
        $db = new type;
        //==获取添加数据执行添加
        $data = $request->only("name","path","pid");
        $pid = $data["pid"];
        if($pid==0){
            $data['path']="0,";
        }else{
            $type = $db->where("id",$pid)->first();
            $data["path"]=$type->path.$pid.",";
        }
        //执行添加到数据库
        $id = $db->insertGetId($data);
        //判断是否添加成功
        if($id>0){
            $info = "类别信息添加成功!";
            //成功跳回类别首页
            return redirect("admin/type");
        }else{
            $info = "类别信息添加失败!";
        }

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
        //编辑获取的信息
        $list = type::where("id","=",$id)->first();
        //视图显示
        return view('admin.type.edit',['list'=>$list]);
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
        //获取编辑的信息执行修改
        $type = type::find($id);
        //分类名称
        $type->name = $request->name;
        //修改
        $m = $type->update();
        if($m>0){
            $info = "修改成功";
            return redirect("admin/type");
        }else{
            $info = "修改失败!";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //先判断当前类别下是否存在子类别
        $m = type::where("pid",$id)->count();
        if($m>0){
            return back()->with("err","禁止删除!");
        }
        type::where("id","=",$id)->delete();
        return redirect("admin/type");
    }
}

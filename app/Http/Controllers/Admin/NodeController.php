<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Node;
use Illuminate\Support\Facades\DB;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化node表权限
        $node = DB::table('node');
        //判断并封装搜索条件
        $params = array();
        if(!empty($_GET['name'])){
            $node->where("name","like","%{$_GET['name']}%");
            $params['name'] = $_GET['name'];//维持搜索条件
        }
        $nodes = $node->orderBy('id',"desc")->paginate(6);//每5条数据翻页显示
        //显示页面
        return view('admin.node.index',["nodes"=>$nodes,"params"=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面
        return view('admin.node.create');
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
        $node = $request->only(['name','url','method','state']);
        //添加数据时间
        $node['create_at'] = date("Y-m-d H:i:s",time());
        //添加数据库
        DB::table("node")->insert($node);
        //跳转页面
        return redirect("admin/node");
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
        //获取数据显示编辑页面
        $node = node::where('id',"=",$id)->first();
        return view('admin.node.edit',["node"=>$node]);
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
        //执行编辑修改
        $node = $request->only("name","url","method","state");
        //加载编辑修改时间
        $node['update_at'] = date('Y-m-d H:i:s',time());
        //根据node表里面的id来修改数据
        $id = DB::table("node")->where('id',$id)->update($node);
        //判断是否修改成功
        if($id>0){
            return redirect('admin/node');//成功跳回页面
        }else{
            return back()->with("err","修改失败!");
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
        //删除管理权限
        node::where("id","=",$id)->delete();
        //重定向视图
        return redirect("admin/node");
    }
}

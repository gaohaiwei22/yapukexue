<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Navigation;
use Illuminate\Support\Facades\DB;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示导航栏
        $db = DB::table('navigation');
        $params  = array();
        if(!empty($_GET['name'])){
            $db->where("name","like","%{$_GET['name']}%");
            $params["name"]=$_GET["name"];//维持封装搜索
        }
         $navigation = $db->orderBy('id',"desc")->paginate(5);//每5条数据翻页显示

        return view('admin.navigation.index',['navigation'=>$navigation,"params"=>$params]);

    }

    /* Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页
        return view('admin.navigation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        $navigation = $request->only(['name','url','status','names']);
        //添加到数据库
        DB::table('navigation')->insert($navigation);
        //返回视图
        return redirect('admin/navigation');
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
        $navigation = navigation::where('id',"=",$id)->first();
        //视图遍历
        return view("admin.navigation.edit",["navigation"=>$navigation]);

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
        //获取要修改的信息
        $navigation = $request->only(['name','url','status','names']);
        //添加到数据库
        DB::table("navigation")->where("id",$id)->update($navigation);
        //返回页面
        return redirect("admin/navigation");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除导航栏
        $navigation = DB::table("navigation");
        navigation::where("id","=",$id)->delete();
        return redirect("admin/navigation");
    }
}

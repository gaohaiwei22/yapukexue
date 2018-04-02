<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Carousel;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化carousel表的轮播图
        $carousel = DB::table('carousel');
        //判断并封装
        $params = array();
        if(!empty($_GET["name"])){
            $carousel->where('name','like','%{$_GET["name"]}%');
            $params['name'] = $_GET['name'];
        }
        $carousels = $carousel->orderBy('id','desc')->paginate(5);
        return view('admin.carousel.index',['carousel'=>$carousels,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面
        return view('admin.carousel.create');
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
        $carousel = DB::table('carousel');

        //获取指定数据
        $carousel = $request->only(['name','picture','status',"titlea","titleb","titlec"]);
        //添加数据
        DB::table('carousel')->insert($carousel);
        //返回页面
        return redirect("admin/carousel");
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
        $carousel = carousel::where('id','=',$id)->first();
        //视图显示
        return view('admin.carousel.edit',['carousel'=>$carousel]);
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
        //获取要编辑的信息执行修改
        $carousel = $request->only(['name','picture','status',"titlea","titleb","titlec"]);
        //执行修改
        DB::table('carousel')->where('id',$id)->update($carousel);
        //返回视图
        return redirect('admin/carousel');
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
        DB::table('carousel')->where('id','=',$id)->delete();
        return redirect("admin/carousel");
    }
}

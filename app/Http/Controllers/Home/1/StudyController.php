<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\logo;
use App\Model\Rightnavigation;
use App\Model\Diagram;
use App\Model\Bottom;
use App\Model\Navigation;
use App\Model\product_table;
use Illuminate\Support\Facades\DB;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //实例化product_table表
        $db = \DB::table('product_table');
        //判断并封装
        $params = array();
        if(!empty($_GET["product_name"])){
            $db->where('product_name','like','%'.$_GET["product_name"].'%')->orWhere('alias','like','%'.$_GET["product_name"].'%');
            $params['product_name'] = $_GET['product_name'];
        }
        //导航产品
        $product_table = $db->orderBy('id','desc')->where("status",0)->paginate(80000000);
        //dd($product_table);
        //Navigation表左导航
        $navigation = navigation::where("status",0)->get();
        //rightnavigation表右导航
        $rightnavigation = rightnavigation::where('status', 0)->get();
        //导航上下图
        $diagram = DB::table("diagram")->first();
        //logo图
        $logo = logo::where("status",0)->first();

        //bottom表底部公司信息
        $bottom = bottom::where('status', 0)->first();

       $product_table = product_table::where("status",0)->first();
        //显示首页
        return view("home.Study.study",["navigation"=>$navigation,'logo'=>$logo,'rightnavigation'=>$rightnavigation,"diagram"=>$diagram,'bottom'=>$bottom,"product_table"=>$product_table,"params"=>$params,"product_table"=>$product_table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //显示详情
        $product_table = product_table::where('id','=',$id)->first();
        return view("home.Study.edit",["product_table"=>$product_table]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

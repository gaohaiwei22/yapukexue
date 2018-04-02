<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\product_table;
use App\Model\Learning;
use App\Model\logo;
use App\Model\Rightnavigation;
use App\Model\Diagram;
use App\Model\Bottom;
use App\Model\Navigation;
use App\Model\type;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



    }
    public function details(Request $request, $id)
    {

//        $db = DB::table("learning");
//        //判断并封装
//        $params = array();
//        if(!empty($_GET["product_name"])){
//            $db->where('name','like','%'.$_GET["product_name"].'%')->orWhere('curriculum','like','%'.$_GET["product_name"].'%');
//            $params['product_name'] = $_GET['product_name'];
//        }
//        //导航产品
//        $search = $db->orderBy('id','desc')->where("status",0)->paginate(80000000);
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

        //==上下分开====

        //学习页详情页
        $product_table = product_table::where("status",0)->where("id",$id)->first()->toArray();

        //课节
        if(!$product_table['id']){
            return back()->with("err","没有数据");
        }else{
            $Learning = \DB::table('Learning')->where('product_id',"=",$product_table['id'])->get()->toArray();
        }

        //dd($course_video);
        //课节总视频
        if(!$product_table['id']){
            return Response()->json(['info' => '没有数据!', 'error_code' => 1]);
        }else{
            $Totalcourse = \DB::table('Totalcourse')->where('product_id',"=",$product_table['id'])->get()->toArray();
        }
        //课节总图和建议
        if (!$product_table['id']){
            return Response()->json(['info' => '没有数据!', 'error_code' => 1]);
        }else{
            $curriculum = \DB::table('curriculum')->where('product_id',"=",$product_table['id'])->get();
        }
      //学习产品套件里面的零件
        if(!$product_table['id']){
            return Response()->json(['info' => '没有数据!', 'error_code' => 1]);
        }else{
            $product = DB::table("product")->where("product_id",'=',$product_table['id'])->inRandomOrder()->take(2)->get();
        }

        //学习概述
        $introduction = DB::table("introduction")->get();

        return view("home.study.details",["product_table"=>$product_table,"navigation"=>$navigation,'logo'=>$logo,'rightnavigation'=>$rightnavigation,"diagram"=>$diagram,'bottom'=>$bottom,'introduction'=>$introduction,"Learning"=>$Learning,'Totalcourse'=>$Totalcourse,'curriculum'=>$curriculum,'product'=>$product]);
    }

//    public function getCategoryData(Request $request)
//    {
//
//        $switch = $request->input('switch');
//        //$learning = learning::where("status",0)->first();
//        //dd($switch);
//        $course_video = \DB::table("course_video")->where("type_id","=",$switch)->get()->toArray();
//        //返回数据
//        return response()->json(['res' => 1, 'info' => $course_video]);
//    }
}

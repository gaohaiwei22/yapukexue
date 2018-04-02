<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//===================>
use App\Model\Carousel;
use App\Model\Carousely;
use App\Model\Product;
use App\Model\Title;
//======================>
use App\Model\logo;
use App\Model\Rightnavigation;
use App\Model\Diagram;
use App\Model\Bottom;
use App\Model\Navigation;
use App\Model\product_table;


use Illuminate\Support\Facades\DB;

class IndexController extends Controller
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

//==============================================================================>
        //轮播图
        $carousel = carousel::where('status', 0)->get();
        // dd($carousel);
        //第一轮播图
        $carousely = carousely::where('status', 0)->first();

        //产品导航链接
        $product = product::where('status', 0)->get()->toArray();
        //产品标题
        $title = title::where('status', 0)->get();
        return view('home.Index.index',["navigation"=>$navigation,'logo'=>$logo,'rightnavigation'=>$rightnavigation,"diagram"=>$diagram,'bottom'=>$bottom,"product_table"=>$product_table,"params"=>$params,"carousel"=>$carousel,"carousely"=>$carousely,"title"=>$title,"product_table"=>$product_table]);

    }

//    public function getCategoryData(Request $request)
//    {
//        //请求相对应的数据--- id
//        $switch = $request->input('switch');
//            //判断全部显示
//        if ($switch == 0) {
//            //全部显示
//            $productList = \DB::table('product_table')->get()->toArray();
//        } else {
//            //产品表中的product_type == 请求过来的$switch里面包含中的id
//            $productList = \DB::table('product_table')->where('product_type', $switch)->get()->toArray();
//        }
//        //拼装图片链接地址，前台显示
//        foreach ($productList as $k => $v) {
//
//            $productList[$k]->product_picture = env('QINIU_DOMAIN')."/".$productList[$k]->product_picture;
//
//        }
//
//        //返回数据
//        return response()->json(['res' => 1, 'info' => $productList]);
//
//
//    }

}

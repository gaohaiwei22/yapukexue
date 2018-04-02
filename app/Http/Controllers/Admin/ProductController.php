<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Product_table;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化product产品导航表
        $db = DB::table("product");
        //判断并封装搜索
        $params = array();
        if(!empty($_GET['name'])){
            $db->where("name","like","%{$_GET['name']}%");
            $params['name'] = $_GET['name'];
        }
        $product = $db->orderBy('id',"desc")->paginate(5);//每5条数据分页
        foreach ($product as $k =>$v){
            $product[$k]->type_name = DB::table("product_table")->where("id",$v->product_id )->first();
        }
        //显示视图
        return view('admin.product.index',['product'=>$product,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        //获取产品导航的类型
        $product = DB::table("product_table")->get();
        return view('admin.product.create',['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据执行添加
        $product = $request->only(['product_id','name','introduce','product_picture','Price','status','create_at']);
        $product['create_at'] = date("Y-m-d H:i:s" ,time());
        //执行添加
        DB::table('product')->insert($product);
        //返回视图
        return redirect('admin/product');
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
        $product = product::where('id','=',$id)->first();
        $product_table = DB::table("product_table")->get();
        //返回视图
        return view('admin.product.edit',['product'=>$product,'product_table'=>$product_table]);
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

        //获取数据执行添加
        $product = $request->only(['product_id','name','introduce','product_picture','Price','status','update_at']);
        $product['update_at'] = date("Y-m-d H:i:s" ,time());
        //将修改的数据添加到数据库里面
        $id = DB::table('product')->where('id',$id)->update($product);
        //判断是否修改成功
        if($id>0){
            return redirect('admin\product');//成功则返回视图
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
        //删除
        product::where('id',"=",$id)->delete();
        //返回视图
        return redirect('admin/product');
    }
}

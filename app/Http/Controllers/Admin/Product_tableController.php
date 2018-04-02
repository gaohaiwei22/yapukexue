<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product_table;
use App\Model\Product;
use App\Model\Totalcourse;
use App\Model\learning;
use App\Model\curriculum;
use Illuminate\Support\Facades\DB;

class Product_tableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化product_table表
        $db = DB::table('product_table');
        //判断并封装搜索条件
        $params = array();
        if(!empty($_GET['product_name'])){
            $db->where("product_name","like","%{$_GET['product_name']}%");
            $params['product_name'] = $_GET['product_name'];
        }
        //分页显示
       $product_table =  $db ->orderBy('id','desc')->paginate('5');//每5条数据分页
        //dd($product_table);
        return view('admin.product_table.index',['product_table'=>$product_table,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_table.create');
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
        $product_table = $request->only(['product_name','alias','product_picture','product_details','describe','age','Price','product_video','create','status']);
       //处理时间
        $product_table['create'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('product_table')->insert($product_table);
        //返回首页
        return redirect('admin/product_table');

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
        $product_table = product_table::where('id','=',$id)->first();
        //显示视图
        return view('admin.product_table.edit',['product_table'=>$product_table]);
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
        //获取数据执行修改
        $product_table = $request->only(['product_name','alias','product_picture','age','Price','product_details','describe','product_video','status']);
        $product_table['product_edit'] = date('Y-m-d H:i:s',time());
        //添加数据库
        DB::table('product_table')->where('id',$id)->update($product_table);
        //返回页面
        return redirect('admin/product_table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product_table = product_table::where("status",0)->where("id",$id)->first()->toArray();

        $product = product::where("status",0)->where("product_id",'=',$product_table['id'])->first();

        $totalcourse = totalcourse::where("status",0)->where("product_id",'=',$product_table['id'])->first();

        $learning = learning::where("status",0)->where("product_id",'=',$product_table['id'])->first();

        $curriculum = curriculum::where("status",0)->where("product_id",'=',$product_table['id'])->first();

        if($product['product_id'] !== $product_table['id'] && $totalcourse['product_id'] !== $product_table['id'] && $learning['product_id'] !== $product_table['id'] && $curriculum['product_id'] !== $product_table['id'] ){
            product_table::where("id",'=',$id)->delete();
        }else{
            return back()->with("err","有子分类！禁止删除");
        }


        //返回页面,
        return redirect('admin/product_table');
    }
}

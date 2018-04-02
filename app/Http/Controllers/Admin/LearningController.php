<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Learning;
use App\Model\type;
use App\Model\course;
use App\Model\course_video;
use Illuminate\Support\Facades\DB;
class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化product_table表
        $db = DB::table('learning');
        //分页显示
        $Learning =  $db ->orderBy('id','desc')->paginate('5');//每5条数据分页
        foreach($Learning as $k=>$v){
        $Learning[$k]->type_name = \DB::table('product_table')->where('id', $v->product_id)->first();
        }
        return view('admin.Learning.index',["Learning"=>$Learning]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $Learning = DB::table("product_table")->get();
        return view("admin.Learning.create",["Learning"=>$Learning]);
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
        $Learning = $request->only(['product_id','curriculum','name','create_at','status','type_pid']);
        //处理时间
        $product_table['create'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('learning')->insert($Learning);
        //返回首页
        return redirect('admin/Learning');
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
        $Learning = Learning::where('id', '=', $id)->first();

        $Learnin = DB::table("product_table")->get();

        return view('admin.Learning.edit', ['Learning' => $Learning, 'Learnin' => $Learnin]);

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
        //获取要添加的数据
        $Learning = $request->only(['product_id','curriculum','name','status','update_at','type_pid']);
        //处理时间
        $product_table['update_at'] = date("Y-m-d H:i:s",time());
        //把数据添加到数据库
        DB::table('learning')->where('id',$id)->update($Learning);
        //返回首页
        return redirect('admin/Learning');
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


        $Learning = Learning::where("status",0)->where("id",'=',$id)->first()->toArray();

        $course = course::where("status",0)->where("type_id",$Learning['id'])->first();

        $course_video = course_video::where("status",0)->where("type_id",$Learning['id'])->first();

        if($course['type_id'] !== $Learning['id'] && $course_video['type_id'] !== $Learning['id'] ){

            Learning::where('id','=',$id)->delete();

        }else{

            return back()->with("err","有子分类！禁止删除");
        }
        //返回页面
        return redirect('admin/Learning');
    }
}

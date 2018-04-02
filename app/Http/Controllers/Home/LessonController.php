<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lesson;
use session;
use App\Model\learning;
use App\Model\discuss;
use App\Model\product_table;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    //
    public function Lesson(Request $request, $id)
    {
        //学习页详情页
        $learning = learning::where("status",0)->where("id",$id)->first()->toArray();

        if(!$learning['id']){
            return back()->with("err","数据错误！请尽快通知程序员！");
        }else{
            $discus = discuss::where('learning_id',$learning['id'])->get();
        }
        foreach ($discus as $k => $v){
            $discus[$k]->type_name = DB::table("learning")->where("id",$v->learning_id)->first();
        }
        foreach ($discus as $k => $v){
            $discus[$k]->type = DB::table("homeuser")->where("id",$v->homeuser_id)->first();
        }
        $product_table = product_table::where("status",0)->where("id",$learning['product_id'])->first();
        //dd($learnins);
        if($learning['product_id'] === $product_table['id'] ){
            $learnin =learning::where("status",0)->where("product_id",$product_table['id'])->get();
        }else{
            return back()->with("err","数据错误！请尽快通知程序员！");
        }
        if(!$learning['id']){
            return Response()->json(['info' => '没有数据!', 'error_code' => 1]);
        }else{
            $course_video = \DB::table('course_video')->where('type_id',"=",$learning['id'])->get();
        }
        if (!$learning['id']){
            return Response()->json(['info' => '没有数据!', 'error_code' => 1]);
        }else{
            $course = \DB::table('course')->where('type_id',"=",$learning['id'])->get();
        }
        return view("home.study.Lesson",['course_video'=>$course_video,'learning'=>$learning,'course'=>$course,'learnin'=>$learnin,'discus'=>$discus]);
    }
    public function store(Request $request)
    {

             //获取信息
                if(session('homeuser') == ""){
                    return Response()->json(['info' => '没有登陆!', 'error_code' => 1]);
                }
                $data = session('homeuser')->id;
                $discuss = $request->only(['homeuser_id','learning_id','title','content','create_at']);
                $discuss['homeuser_id'] = $data;
                $discuss['create_at'] =date("Y-m-d H:i:s",time());
                //var_dump($discuss);die();
                if($discuss['title']==""){
                    return Response()->json(['info' => '标题和内容不能为空!', 'error_code' => 2]);
                }
                $id = DB::table('discuss')->insertGetId($discuss);
                if($id>0){
                    return Response()->json(['info' => '已提交数据!', 'error_code' => 3]);
                }

    }

    public function show(Request $request)
    {

        $discuss = DB::select("select * from discuss order by id desc limit 1");
        foreach ($discuss as $k =>$v){
            $discuss[$k]->type = DB::table("homeuser")->where("id",$v->homeuser_id)->first();
        }
        foreach ($discuss as $k =>$v){
            $discuss[$k]->type_name = DB::table("learning")->where("id",$v->learning_id)->first();
        }

        return Response()->json(['info' => $discuss,'error_code' => 1]);

    }

}

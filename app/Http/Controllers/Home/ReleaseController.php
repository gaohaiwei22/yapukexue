<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Release;
use Illuminate\Support\Facades\DB;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //获取信息
        if(session('homeuser') == ""){
            return Response()->json(['info' => '没有登陆!', 'error_code' => 1]);
        }
        $data = session('homeuser')->id;
        $Release = $request->only(['homeuser_id','title','content','create_at']);
        $Release['homeuser_id'] = $data;
        $Release['create_at'] =date("Y-m-d H:i:s",time());
        //var_dump($discuss);die();
        if($Release['title']==""){
            return Response()->json(['info' => '标题和内容不能为空!', 'error_code' => 2]);
        }
        $id = DB::table('comment')->insertGetId($Release);
            DB::table('comment')->update($Release);
        if($id>0){
            return Response()->json(['info' => '已提交数据!', 'error_code' => 3]);
        }
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

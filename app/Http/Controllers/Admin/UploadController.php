<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
      	public function uploa(Request $request)
      {
//
//         if ($request->hasFile('picname'))
//		 {
//		 	if ($request->file('picname')->isValid()) {
//		 		$filename = rand(100000,999999).'mp4';
//		 		$request->picname->move('uploads/images', $filename);//$request->picname->store('images');
//		 		return response()->json(["res" => 1, 'filename' => $filename]);
//		 		}
//		 } else {
//		 	return "上传文错误";
//		 }
//          if ($request->hasFile('picname')) {
//              $path = './Uploads/'.date('Ymd');
//              //获取后缀
//              $suffix = $request->file('picname')->getClientOriginalExtension();
//              $suffixarr=['mp4','flv','wmv'];
//              if(in_array($suffix, $suffixarr)){
//                  $fileName = time().rand(100000, 999999).'.'.$suffix;
//                  $request->file('picname')->move($path, $fileName);
//                  $user -> picname = trim($path.'/'.$fileName,'.');
//              }else{
//                  return response()->json(["res" => 1, 'filename' => $user]);
//              }
//
//          }
	  }

//	  public function uploadImg(Request $request)
//	 {
//		 $disk = \Storage::disk('qiniu'); //使用七牛云上传
//		 $time = date('Y/m/d-H:i:s-');
//		 $filename = $disk->put($time, $request->file('picname'));//上传
//		 if(!$filename) {
//			 return json_response('上传文错误');
//		 }
//
//		 //$img_url = $disk->getDriver()->downloadUrl($filename); //获取下载链接
//		 return response()->json(["res" => 1, 'filename' => $filename]);
//	 }
//
   public function uploads(Request $request)
   {
       $disk = \Storage::disk('qiniu'); //使用七牛云上传
       $time = date('Y/m/d-H:i:s-');
       $filename = $disk->put($time, $request->file('picname'));//上传
       if(!$filename) {
           return json_response('上传文错误');
       }

       //$img_url = $disk->getDriver()->downloadUrl($filename); //获取下载链接
       return response()->json(["res" => 1, 'filename' => $filename]);
   }
    public function upload(Request $request)
    {
        //return $request->file('picname');
        $disk = \Storage::disk('qiniu'); //使用七牛云上传
        $time = date('Y/m/d-H:i:s-');
        $filename = $disk->put($time, $request->file('picname'));//上传
        //$ext =  pathinfo($filename, PATHINFO_EXTENSION);//类型
        //$size = $disk->size($filename);//大小
        $url = $disk->getUrl($filename);//地址
        $fname = $disk->fetch($filename,$url);//包含了，地址，大小，类型。
        if(!$filename){
            return json_response('上传文错误');
        }
        //$img_url = $disk->getDriver()->downloadUrl($filename); //获取下载链接
        return response()->json(["res" => 1, 'filename' => $filename,'fname' => $fname]);
    }

}

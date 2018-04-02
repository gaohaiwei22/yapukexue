<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});=
//==============================前台登陆========================================>
Route::get("/home/login","Home\loginController@login");//前台登陆显示
Route::get('/home/getcode',"Home\loginController@getCode"); //加载验证码
Route::post("/home/dologin","Home\loginController@doLogin");//执行登录
Route::get('/home/logout', "Home\loginController@logout");//退出登录

//==================================前台注册页面=============================================>
Route::get("/home/register","Home\RegisterController@index");//前台注册显示
Route::post("/home/store","Home\RegisterController@store");//注册添加到数据库
Route::get("/home/success","Home\RegisterController@success");//注册成功时间跳转
Route::get("/home/lose","Home\RegisterController@lose");//注册失败时间跳转
Route::post("/home/message","Home\RegisterController@sendMobileCode");//阿里云短信接口

//==============================前台首页===========================================>
    //==  前台首页\

Route::get('/','Home\IndexController@index');//首页
//Route::get('/getcategorydata', 'Home\IndexController@getCategoryData');//选项卡ajax
////学习页
//Route::get("/study","Home\StudyController@index");
////学习概述
//Route::get('/introduction','Home\IndexController@index');
//学习详情页
Route::get('/study/{id}/details','Home\DetailsController@details');
//学习课节
Route::get('/Lesson/{id}/Lesson','Home\LessonController@Lesson');

Route::post('/Lesson/store','Home\LessonController@store');//上评论
Route::get('/Lesson/show','Home\LessonController@show');
Route::post('/Release/store','Home\ReleaseController@store');//下评论










//==========================后台登陆========================================>
Route::get("/admin/login","Admin\loginController@login");//后台登陆显示
Route::get('/admin/getcode',"Admin\loginController@getCode"); //加载验证码
Route::post("/admin/dologin","Admin\loginController@doLogin");//执行登录
Route::get('/admin/logout', "Admin\loginController@logout");//退出登录

//====================后台中间件=========================>
Route::group(['prefix' => 'admin','middleware' =>'admin'], function () {

    //==后台首页
Route::get('/','Admin\IndexController@index');//后台首页

    //==管理员信息
Route::get('users', 'Admin\UsersController@index');//显示管理员信息
Route::get('users/create', 'Admin\UsersController@create');//显示添加管理员信息
Route::post('users/store', 'Admin\UsersController@store');//加管理员+ajax
Route::get('users/{id}/edit',"Admin\UsersController@edit");//显示编辑管理信息
Route::put('users/update/{id}',"Admin\UsersController@update");//修改管理信息
Route::delete('users/{id}',"Admin\UsersController@destroy");//删除

    //==管理员角色
Route::get('role','Admin\RoleController@index');//显示管理员角色
Route::get('role/create','Admin\RoleController@create');//显示添加管理员角色信息
Route::post('role/store','Admin\RoleController@store');//添加管理员角色信息
Route::get('role/{id}/edit','Admin\RoleController@edit');//显示编辑管理员角色信息
Route::put('role/update/{id}','Admin\RoleController@update');//执行修改管理员角色信息
Route::delete('role/{id}',"Admin\RoleController@destroy");//删除

    //==管理员权限
Route::get('node','Admin\NodeController@index');//显示管理员权限
Route::get('node/create','Admin\NodeController@create');//显示添加管理员权限
Route::post('node/store','Admin\NodeController@store');//执行添加管理员权限
Route::get('node/{id}/edit','Admin\NodeController@edit');//显示编辑管理员权限
Route::put('node/update/{id}','Admin\NodeController@update');//执行修改管理员权
Route::delete('node/{id}','Admin\NodeController@destroy');//删除

    //===ajax权限
Route::get('users/loadRole/{uid}',"Admin\UsersController@loadRole");//加载用户分配角色管理
Route::post('users/saveRole',"Admin\UsersController@saveRole");//加载用户分配节点管理
Route::get('role/loadNode/{rid}',"Admin\RoleController@loadNode");//加载角色分配权限管理
Route::post('role/saveNode',"Admin\RoleController@saveNode");//加载角色分配权限管理

   //==无限分类
Route::get('type','Admin\TypeController@index');//显示无限分类
Route::get('type/create/{id}','Admin\TypeController@create');//显示无限子分类添加页
Route::post('type/store','Admin\TypeController@store');//执行无限分类添加
Route::get('type/{id}/edit','Admin\TypeController@edit');//编辑无限分类
Route::put('type/update/{id}','Admin\TypeController@update');//执行编辑无限分类
Route::delete('type/{id}','Admin\TypeController@destroy');//删除

    //==左导航栏
Route::get('navigation','Admin\NavigationController@index');//显示导航栏
Route::get('navigation/create','Admin\NavigationController@create');//显示添加导航栏
Route::post('navigation/store','Admin\NavigationController@store');//执行添加导航栏
Route::get('navigation/{id}/edit','Admin\NavigationController@edit');//编辑导航栏
Route::put('navigation/update/{id}','Admin\NavigationController@update');//执行编辑修改导航栏
Route::delete('navigation/{id}','Admin\NavigationController@destroy');//执行编辑修改导航栏

    //==右导航栏
Route::get('rightnavigation','Admin\RightnavigationController@index');//显示导航栏
Route::get('rightnavigation/create','Admin\RightnavigationController@create');//显示添加导航栏
Route::post('rightnavigation/store','Admin\RightnavigationController@store');//执行添加导航栏
Route::get('rightnavigation/{id}/edit','Admin\RightnavigationController@edit');//编辑导航栏
Route::put('rightnavigation/update/{id}','Admin\RightnavigationController@update');//执行编辑修改导航栏
Route::delete('rightnavigation/{id}','Admin\RightnavigationController@destroy');//执行编辑修改导航栏

    //==产品零件
Route::get('product','Admin\ProductController@index');//显示产品
Route::get('product/create','Admin\ProductController@create');//显示添加产品
Route::post('product/store','Admin\ProductController@store');//执行添加产品
Route::get('product/{id}/edit','Admin\ProductController@edit');//显示要编辑产品
Route::put('product/update/{id}','Admin\ProductController@update');//显示要编辑产品
Route::delete('product/{id}','Admin\ProductController@destroy');//删除

    //==产品
Route::get('product_table','Admin\Product_tableController@index');//显示产品
Route::get('product_table/create','Admin\Product_tableController@create');//显示添加产品
Route::post('product_table/store','Admin\Product_tableController@store');//执行添加产品
Route::get('product_table/{id}/edit','Admin\Product_tableController@edit');//显示要编辑产品
Route::put('product_table/update/{id}','Admin\Product_tableController@update');//显示要编辑产品
Route::delete('product_table/{id}','Admin\Product_tableController@destroy');//删除

    //==学习
Route::get("introduction","Admin\IntroductionController@index"); //学习概述
Route::get("introduction/create","Admin\IntroductionController@create"); //学习概述
Route::post("introduction/store","Admin\IntroductionController@store"); //学习概述
Route::get("introduction/{id}/edit","Admin\IntroductionController@edit"); //学习概述
Route::put("introduction/update/{id}","Admin\IntroductionController@update"); //学习概述
Route::delete('introduction/{id}','Admin\IntroductionController@destroy');//删除

    //==学习总介
Route::get("Totalcourse",'Admin\TotalcourseController@index');//显示学习视频总介绍
Route::get("Totalcourse/create",'Admin\TotalcourseController@create');//显示添加视频学习总介绍
Route::post("Totalcourse/store",'Admin\TotalcourseController@store');//执行添加视频学习总介绍
Route::get("Totalcourse/{id}/edit",'Admin\TotalcourseController@edit');//编辑学习视频总介绍
Route::put("Totalcourse/update/{id}",'Admin\TotalcourseController@update');//执行编辑视频学习总介绍
Route::delete('Totalcourse/{id}','Admin\TotalcourseController@destroy');//删除视频

    //==课程，课程表，使用建议。
Route::get('curriculum','Admin\curriculumController@index');//==总总
Route::get('curriculum/create','Admin\curriculumController@create');
Route::post('curriculum/store','Admin\curriculumController@store');
Route::get('curriculum/{id}/edit','Admin\curriculumController@edit');
Route::put('curriculum/update/{id}','Admin\curriculumController@update');
Route::delete('curriculum/{id}','Admin\curriculumController@destroy');//删除

    //学习课程
Route::get("Learning","Admin\LearningController@index");//学习课程课节（第）
Route::get("Learning/create","Admin\LearningController@create");//显示添加页课节
Route::post("Learning/store","Admin\LearningController@store");//执行添加学习课程页课节
Route::get("Learning/{id}/edit","Admin\LearningController@edit");//执行编辑学习课程页课节
Route::put("Learning/update/{id}","Admin\LearningController@update");//执行修改学习课程页课节
Route::delete('Learning/{id}','Admin\LearningController@destroy');//删除课节

  //==学习图片课程
Route::get("course","Admin\CourseController@index");//（图片数字）
Route::get("course/create","Admin\CourseController@create");
Route::post("course/store","Admin\CourseController@store");
Route::get("course/{id}/edit","Admin\CourseController@edit");
Route::put("course/update/{id}","Admin\CourseController@update");//
Route::delete('course/{id}','Admin\CourseController@destroy');//删除课节

    //==学习课程视频
Route::get("Course_video","Admin\Course_videoController@index");//（视频）
Route::get("Course_video/create","Admin\Course_videoController@create");
Route::post("Course_video/store","Admin\Course_videoController@store");
Route::get("Course_video/{id}/edit","Admin\Course_videoController@edit");
Route::put("Course_video/update/{id}","Admin\Course_videoController@update");
Route::delete('Course_video/{id}','Admin\Course_videoController@destroy');//删除

    //==产品标题==首页
Route::get('title','Admin\TitleController@index');//显示产品标题
Route::get('title/create','Admin\TitleController@create');//显示产品标题添加
Route::post('title/store','Admin\TitleController@store');//执行产品标题添加
Route::get('title/{id}/edit','Admin\TitleController@edit');//显示产品标题编辑
Route::put('title/update/{id}','Admin\TitleController@update');//执行产品标题编辑
Route::delete('title/{id}','Admin\TitleController@destroy');//删除

//==第一轮播图
Route::get('carousely','Admin\CarouselyController@index');//显示轮播图
Route::get('carousely/create','Admin\CarouselyController@create');//显示轮播图
Route::post('carousely/store','Admin\CarouselyController@store');//执行添加轮播图
Route::get('carousely/{id}/edit','Admin\CarouselyController@edit');//显示编辑轮播图
Route::put('carousely/update/{id}','Admin\CarouselyController@update');//执行添加轮播图
Route::delete('carousely/{id}','Admin\CarouselyController@destroy');//执行添加轮播图

//==轮播图
Route::get('carousel','Admin\CarouselController@index');//显示轮播图
Route::get('carousel/create','Admin\CarouselController@create');//显示轮播图
Route::post('carousel/store','Admin\CarouselController@store');//执行添加轮播图
Route::get('carousel/{id}/edit','Admin\CarouselController@edit');//显示编辑轮播图
Route::put('carousel/update/{id}','Admin\CarouselController@update');//执行添加轮播图
Route::delete('carousel/{id}','Admin\CarouselController@destroy');//执行添加轮播图
    //上下导航栏图
Route::get('diagram','Admin\DiagramController@index');//显示轮播图
Route::get('diagram/create','Admin\DiagramController@create');//显示轮播图
Route::post('diagram/store','Admin\DiagramController@store');//执行添加轮播图
Route::get('diagram/{id}/edit','Admin\DiagramController@edit');//显示编辑轮播图
Route::put('diagram/update/{id}','Admin\DiagramController@update');//执行添加轮播图
Route::delete('diagram/{id}','Admin\DiagramController@destroy');//执行添加轮播图


   //==logo响应式图
Route::get('logo','Admin\LogoController@index');//显示logo图页面
Route::get('logo/create','Admin\LogoController@create');//显示添加logo图页面
Route::post('logo/store','Admin\LogoController@store');//执行添加logo图页面
Route::get('logo/{id}/edit','Admin\LogoController@edit');//显示添加logo图页面
Route::put('logo/update/{id}','Admin\LogoController@update');//执行添加logo图页面
Route::delete('logo/{id}','Admin\LogoController@destroy');//执行添加logo图页面

    //==bottom底部公司信息
Route::get('bottom','Admin\BottomController@index');
Route::get('bottom/create','Admin\BottomController@create');
Route::post('bottom/store','Admin\BottomController@store');
Route::get('bottom/{id}/edit','Admin\BottomController@edit');
Route::put('bottom/update/{id}','Admin\BottomController@update');
Route::delete('bottom/{id}','Admin\BottomController@destroy');

    //==上传图片
Route::post('uploads', 'Admin\UploadController@uploads');//图片上传,本地上传
    //文件上传下载
Route::post('upload', 'Admin\UploadController@upload');//图片上传,本地上传
//Route::post('upload', 'Admin\UploadController@uploadImg');//七牛图片上传
//Route::post('uploads', 'Admin\UploadController@uploads');//七牛图片上传

    //==公司文件上传下载
Route::get('shangchuan',"Admin\ShangchuanController@index");//上传显示页
Route::get('shangchuan/create',"Admin\ShangchuanController@create");//添加显示页
Route::post('shangchuan/store',"Admin\ShangchuanController@store");//上执行添加传显示页
Route::get('shangchuan/{id}/edit',"Admin\ShangchuanController@edit");//编辑上传显示页
Route::put('shangchuan/update/{id}',"Admin\ShangchuanController@update");//执行编辑上传显示页
Route::delete('shangchuan/{id}','Admin\ShangchuanController@destroy');//删除
});
<!DOCTYPE HTML>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  	<meta name="keywords" content="uper,吖扑,吖扑科学,apu" />
  	<meta name="description" content="致力于教育产品的公司" />
  	<title>吖扑科学</title>
    <link href="{{asset('static/img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('static/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/xiaoke.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/all.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{asset('static/js/jquery-1.11.3.min.js')}}"></script>
</head>
<body>
@include('vendor.ueditor.assets')
<!-- 中间中央内容开始 -->
    <div id="centent-center-1">
        <div id="centent-center-aa">
            <a href="{{url('/')}}">首页</a><span>|</span>
            <a href="{{url('/study')}}">学习</a><span>|</span>
            <a href="javascript:void(0);">智慧机器</a><span>|</span>
            <a href="javascript:void(0);">{{$learning['name']}}</a>
        </div>
        <div class="centent-center-ab">
            @foreach($course_video as $v)
                <p id="gaishu">概述<a href="javascript:void(0);">作者:{{$v->name }}</a></p>
                <div class="centent-center-ab-1">
                    <video controls loop src="{{ env('QINIU_DOMAIN')}}/{{$v->video}}"></video>
                </div>
            @endforeach
            <div class="tackabout">
                <div class="tack-about">
                    <ul>
                        <li class="add"><a href="javascript:;">介绍</a></li>
                        <li><a href="javascript:;">讨论区</a></li>
                        <li><a href="javascript:;">发起讨论</a></li>
                    </ul>
                </div>
                <div class="tack-about-center">
                    <ul>
                         @foreach($course_video as $v)
                        <!-- 小节课程介绍开始 -->
                                <li class="about-center" style="display:block;">
                                <p class="centent-tit">{{$v->introduce }}</p>
                         @endforeach
                            <div class="centent-keche" id="keche">课程表</div>
                            <div class="centent-center-ac">
                                <ul>
                                    @foreach($course as $v)
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ env('QINIU_DOMAIN')}}/{{$v->picture}}" alt="">
                                            </a>
                                            <p>{{$v->name}}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="centent-center-ad">
                                @foreach($course as $v)
                                    <ol>
                                        <li title="关于智能硬件的趣味入门课，零基础起点去往神奇的发现之旅">{{$v->number}}<a href="javascript:void(0);">{{$v->Course}}</a>{{$v->Generalization}}</li>
                                    </ol>
                                @endforeach
                            </div>
                            <div class="centent-keche" id="jian">使用建议</div>
                                    <div class="centent-center-ae">
                                        @foreach($course as $v)
                                            <p class="centent-ti">{{$v->title}}</p>
                                            <p class="centent-ti-1">
                                                {{$v->introduction}}
                                            </p>
                                            <p class="centent-ti-2">
                                                <a href="javascript:void(0);">{{$v->Practical}}</a>
                                                <a href="javascript:void(0);">{{$v->download}}</a>
                                                <a href="javascript:void(0);">{{$v->link}}</a>
                                            </p>
                                        @endforeach
                                    </div>
                                    <div class="centent-keche">电子清单</div>
                        </li>
                        <!-- 小节课程介绍结束 -->
                        <!-- 讨论区开始 -->
                        <li class="about-center" id="sdd">
                            <div class="about-center-1">
                                <p>讨论区 <a href="javascript:void(0);">讨论区使用规则</a></p>
                                <span>欢迎进入课程讨论区，你可以与本课程的老师和同学在这里交流。如果你有课程相关的问题，请发到老师答疑区；经验、思考、创意、作品、转帖请发到综合讨论区。欢迎分享，鼓励原创，杜绝广告，请大家共同维护一个包容、积极、相互支持的交流氛围，谢谢。了解更多请点击“讨论区使用规则”</span>
                            </div>
                            <div class="about-center-2" >
                                <ul>
                                    <li>
                                        @foreach($discus as $v)
                                        <div class="about-center-3" >
                                                    <!-- 问答内容开始 -->
                                                    <div class="about-center-aa">
                                                        <div class="about-center-4">
                                                            <a class="toux" href="javascript:void(0);">
                                                                <img src="{{asset('static/img/tou.png')}}" alt="">
                                                            </a>
                                                            <span class="touname">
                                                        <a href="javascript:void(0);">{{ $v->type->name == null ?  $v->type->email : $v->type->name}}</a>
                                                        <span class="touV"></span>
                                                    </span>
                                                            <span class="toudata">{{$v->create_at}}</span>
                                                            <span class="toudata">针对: : {{$v->type_name->name }}</span>
                                                            <span class="toutalk"></span>

                                                        </div>
                                                        <div class="about-center-5">
                                                    <span class="talk-cen">
                                                        <span class="talk-cen-li talk-cen-1">置顶</span>
                                                        <span class="talk-cen-li talk-cen-2">精华</span>
                                                        <span class="talk-cen-li talk-cen-3">老师参与</span>
                                                    </span>
                                                            <a href="javascript:void(0);">{{$v->title }}<?php echo $v['content']?></a>
                                                        </div>
                                                        <div class="about-center-6">
                                                            <!-- 登录后出现开始 -->
                                                            <div class="pinglun-ca">
                                                                <a class="pinglun-cb" href="javascript:;"><i class="fa fa-plus"></i>关注</a>
                                                                <a class="pinglun-cb" href="javascript:;"><i class="fa fa-reply"></i>回复</a>
                                                            </div>
                                                            <!-- 登录后出现结束 -->
                                                            <div class="about-center-7">
                                                                <span class="s-fc2 fc2-1">（<label class="numlis">100</label>）</span>
                                                                <span class="s-fc2 fc2-2 fc2-aa fc2-ab">（<label class="numli">1</label>）</span>
                                                                <span class="s-fc2 fc2-3">（<label class="num">0</label>）</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- 问答内容结束 -->
                                                    <!-- 评论回复区开始 -->
                                                    <div class="about-ying">
                                                        <div class="ab-y">
                                                            <div class="about-yin-1">
                                                                <h5>所有回复<span>(1)</span></h5>
                                                                <div class="about-yin-2">
                                                                    <!-- 评论内容开始 -->
                                                                    <div class="about-center-aa">
                                                                        <div class="about-center-4">
                                                                            <a class="toux" href="javascript:void(0);">
                                                                                <img src="{{asset("static/img/big.jpg")}}" alt="">
                                                                            </a>
                                                                            <span class="touname">
                                                                        <a href="javascript:void(0);">sjsdjudhf</a>
                                                                    </span>
                                                                        </div>
                                                                        <div class="about-center-5">
                                                                            <a href="javascript:void(0);">有相关学习资料吗</a>
                                                                        </div>
                                                                        <div class="about-center-6">
                                                                            <div class="pinglun">
                                                                                <div class="datati">2018-1-1</div>
                                                                                <div class="about-center-7">
                                                                                    <span class="s-fc2 fc2-2 fc2-4">评论（<label class="numli">1</label>）</span>
                                                                                    <span class="s-fc2 fc2-3">赞（<label class="num">0</label>）</span><span class="s-fc2" style="margin-left:5px">|</span>
                                                                                    <span class="s-fc2">举报</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- 评论内容结束 -->
                                                                    <div class="ping-fe">
                                                                        <!-- 回复区开始 -->
                                                                        <div class="ping-fa">
                                                                            <div class="ping-fa-1">
                                                                                <textarea name="notetxt" class="ping-fb"></textarea>
                                                                            </div>
                                                                            <div class="ping-fa-2"></div>
                                                                            <div class="rich-opt f-cb">
                                                                                <label class="j-anony f-fl"><input type="checkbox" hidefocus="true" class="j-anonycheck">&nbsp;&nbsp;匿名</label>
                                                                                <a hidefocus="true" class="j-edit-btn f-fr editbtn" id="auto-id-1520384330929"><span class="j-btn-text">评论</span></a>
                                                                                <a hidefocus="true" class="j-close-btn cancelbtn f-fr" id="auto-id-1520384330930">取消</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- 回复区结束 -->
                                                                        <div class="ping-fg">
                                                                            <div class="ping-fa-2"></div>
                                                                            <div class="ping-fg-1">
                                                                                <div class="ping-dg-2">
                                                                                    <!-- 三级评论区开始 -->
                                                                                    <div class="about-center-aa about-center-ab">
                                                                                        <div class="about-center-4">
                                                                                    <span class="touname">
                                                                                        <a class="touname-1" href="javascript:void(0);">sjsdjudhf</a>
                                                                                        <span class="touname-2">:</span>
                                                                                        <a href="javascript:void(0);">有相关学习资料吗</a>
                                                                                    </span>
                                                                                        </div>
                                                                                        <div class="about-center-6">
                                                                                            <div class="pinglun pinglun-1">
                                                                                                <div class="datati">2018-1-1</div>
                                                                                                <div class="about-center-7">
                                                                                                    <span class="s-fc2 fc2-2 fc2-5">评论（<label class="numli">0</label>）</span>
                                                                                                    <span class="s-fc2 fc2-3">赞（<label class="num">0</label>）</span><span class="s-fc2" style="margin-left:5px">|</span>
                                                                                                    <span class="s-fc2">举报</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- 三级评论区结束 -->
                                                                                    <!-- 小回复区开始 -->
                                                                                    <div class="ping-fa ping-ac">
                                                                                        <div class="ping-ad">
                                                                                            评论
                                                                                            <a href="javescript:;">kjcbhjsdfg</a>
                                                                                            <span>:</span>
                                                                                        </div>
                                                                                        <div class="ping-fa-1">
                                                                                            <textarea name="notetxt" class="ping-fb"></textarea>
                                                                                        </div>
                                                                                        <div class="rich-opt f-cb">
                                                                                            <label class="j-anony f-fl"><input type="checkbox" hidefocus="true" class="j-anonycheck">&nbsp;&nbsp;匿名</label>
                                                                                            <a hidefocus="true" class="j-edit-btn f-fr editbtn" id="auto-id-1520384330929"><span class="j-btn-text">评论</span></a>
                                                                                            <a hidefocus="true" class="j-close-btn cancelbtn f-fr" id="auto-id-1520384330930">取消</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- 小回复区结束 -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="about-ying-1">
                                                                <div class="bianyiqi" id="bi-q">
                                                                    <h3>回复</h3>
                                                                    <div class="bianyiqi-1">我是编译器</div>
                                                                    <div class="anony f-fs0 s-fc2">
                                                                        <label for="j-anony niming">
                                                                            <input id="j-anon" class="cb" type="checkbox">匿名
                                                                        </label>
                                                                        <a href="javascript:;" class="fabu">发布</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- 评论回复区结束 -->
                                                </div>
                                        @endforeach
                                    </li>
                                    <li>
                                        <div class="about-center-3">
                                            <!-- 问答内容开始 -->
                                            <div class="about-center-aa">
                                                <div class="about-center-4">
                                                    <a class="toux" href="javascript:void(0);">
                                                        <img src="{{asset('static/img/tou.png')}}" alt="">
                                                    </a>
                                                    <span class="touname">
                                                        <a href="javascript:void(0);">秦明</a>
                                                        <span class="touV"></span>
                                                    </span>
                                                    <span class="toudata">1月30</span>
                                                    <span class="toutalk">【综合讨论区】</span>
                                                </div>
                                                <div class="about-center-5">
                                                    <span class="talk-cen">
                                                        <span class="talk-cen-li talk-cen-1">置顶</span>
                                                        <span class="talk-cen-li talk-cen-2">精华</span>
                                                        <span class="talk-cen-li talk-cen-3">老师参与</span>
                                                    </span>
                                                    <a href="javascript:void(0);">课程配套的练习素材怎么获取？</a>
                                                </div>
                                                <div class="about-center-6">
                                                    <!-- 登录后出现开始 -->
                                                    <div class="pinglun-ca">
                                                        <a class="pinglun-cb" href="javascript:;"><i class="fa fa-plus"></i>关注</a>
                                                        <a class="pinglun-cb" href="javascript:;"><i class="fa fa-reply"></i>回复</a>
                                                    </div>
                                                    <!-- 登录后出现结束 -->
                                                    <div class="about-center-7">
                                                        <span class="s-fc2 fc2-1">（<label class="numlis">0</label>）</span>
                                                        <span class="s-fc2 fc2-2 fc2-aa">（<label class="numli">0</label>）</span>
                                                        <span class="s-fc2 fc2-3">（<label class="num">0</label>）</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 问答内容结束 -->
                                            <!-- 评论回复区开始 -->
                                            <div class="about-ying">
                                                <div class="ab-y">
                                                    <div class="about-yin-1">
                                                        <h5>所有回复<span>(1)</span></h5>
                                                        <div class="about-yin-2">
                                                            <!-- 评论内容开始 -->
                                                            <div class="about-center-aa">
                                                                <div class="about-center-4">
                                                                    <a class="toux" href="javascript:void(0);">
                                                                        <img src="{{asset('/static/img/big.jpg')}}" alt="">
                                                                    </a>
                                                                    <span class="touname">
                                                                        <a href="javascript:void(0);">sjsdjudhf</a>
                                                                    </span>
                                                                </div>
                                                                <div class="about-center-5">
                                                                    <a href="javascript:void(0);">有相关学习资料吗</a>
                                                                </div>
                                                                <div class="about-center-6">
                                                                    <div class="pinglun">
                                                                        <div class="datati">2018-1-1</div>
                                                                        <div class="about-center-7">
                                                                            <span class="s-fc2 fc2-2 fc2-4">评论（<label class="numli">0</label>）</span>
                                                                            <span class="s-fc2 fc2-3">赞（<label class="num">0</label>）</span><span class="s-fc2" style="margin-left:5px">|</span>
                                                                             <span class="s-fc2">举报</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- 评论内容结束 -->
                                                            <div class="ping-fe">
                                                                <!-- 回复区开始 -->
                                                                <div class="ping-fa">
                                                                    <div class="ping-fa-1">
                                                                        <textarea name="notetxt" class="ping-fb"></textarea>
                                                                    </div>
                                                                    {{--<div class="ping-fa-2"></div>--}}
                                                                    <div class="rich-opt f-cb">
                                                                        <label class="j-anony f-fl"><input type="checkbox" hidefocus="true" class="j-anonycheck">&nbsp;&nbsp;匿名</label>                     
                                                                        <a hidefocus="true" class="j-edit-btn f-fr editbtn" id="auto-id-1520384330929"><span class="j-btn-text">评论</span></a>
                                                                        <a hidefocus="true" class="j-close-btn cancelbtn f-fr" id="auto-id-1520384330930">取消</a>
                                                                    </div>
                                                                </div>
                                                                <!-- 回复区结束 -->
                                                                <div class="ping-fg">
                                                                    <div class="ping-fa-2"></div>
                                                                    <div class="ping-fg-1">
                                                                        <div class="ping-dg-2">
                                                                            <!-- 三级评论区开始 -->
                                                                            <div class="about-center-aa about-center-ab">
                                                                                <div class="about-center-4">
                                                                                    <span class="touname">
                                                                                        <a class="touname-1" href="javascript:void(0);">sjsdjudhf</a>
                                                                                        <span class="touname-2">:</span>
                                                                                        <a href="javascript:void(0);">有相关学习资料吗</a>
                                                                                    </span>
                                                                                </div>
                                                                                <div class="about-center-6">
                                                                                    <div class="pinglun pinglun-1">
                                                                                        <div class="datati">2018-1-1</div>
                                                                                        <div class="about-center-7">
                                                                                            <span class="s-fc2 fc2-2 fc2-5">评论（<label class="numli">0</label>）</span>
                                                                                            <span class="s-fc2 fc2-3">赞（<label class="num">0</label>）</span><span class="s-fc2" style="margin-left:5px">|</span>
                                                                                             <span class="s-fc2">举报</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- 三级评论区结束 -->
                                                                            <!-- 小回复区开始 -->
                                                                            <div class="ping-fa ping-ac">
                                                                                <div class="ping-ad">
                                                                                    评论
                                                                                    <a href="javescript:;">kjcbhjsdfg</a>
                                                                                    <span>:</span>
                                                                                </div>
                                                                                <div class="ping-fa-1">
                                                                                    <textarea name="notetxt" class="ping-fb"></textarea>
                                                                                </div>
                                                                                <div class="rich-opt f-cb">
                                                                                    <label class="j-anony f-fl"><input type="checkbox" hidefocus="true" class="j-anonycheck">&nbsp;&nbsp;匿名</label>
                                                                                    <a hidefocus="true" class="j-edit-btn f-fr editbtn" id="auto-id-1520384330929"><span class="j-btn-text">评论</span></a>
                                                                                    <a hidefocus="true" class="j-close-btn cancelbtn f-fr" id="auto-id-1520384330930">取消</a>
                                                                                </div>
                                                                            </div>
                                                                            <!-- 小回复区结束 -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                    <div class="about-ying-1">
                                                        <div class="bianyiqi" id="bi-q">
                                                            <h3>回复</h3>
                                                            <div class="bianyiqi-1">我是编译器</div>
                                                            <div class="anony f-fs0 s-fc2">
                                                                <label for="j-anony niming">
                                                                    <input id="j-anony" class="cb" type="checkbox">匿名
                                                                </label>
                                                                <a href="javascript:;" class="fabu">发布</a>
                                                            </div>
                                                        </div>
                                                    </div>     
                                                </div> 
                                            </div>
                                            <!-- 评论回复区结束 -->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- 讨论区结束 -->
                        <!-- 发起讨论区开始 -->
                        <li class="about-center">
                             <div class="about-center-1">
                                <p>发起讨论 <a href="javascript:void(0);">进去论坛</a></p>
                                <div class="talk-list">
                                    <p class="talk-p">选择你要发起讨论的版块</p>
                                    <div class="talk-list-1">
                                        <ul>
                                            <li class="talk-lis lis-1 add">
                                                <div class="talk-lis-1 talk-t"></div>
                                                <div class="talk-lis-2">
                                                    <h3>老师答疑区</h3>
                                                    <p class="lis-li" title="将学习过程中关于课程内容、学习方法、应用效果等问题发布在本区，课程讲师和同学将会为你答疑解惑。">将学习过程中关于课程内容、学习方法、应用效果等问题发布在本区，课程讲师和同学将会为你答疑解惑。</p>
                                                </div>
                                            </li>
                                            <li class="talk-lis lis-2">
                                                <div class="talk-lis-1 talk-u"></div>
                                                <div class="talk-lis-2">
                                                    <h3>综合讨论区</h3>
                                                    <p class="lis-li" title="欢迎分享，鼓励原创，无论是你的学习体验、想法、工作生活经验，还是好书、好文章、好资源，都可发在这里。">欢迎分享，鼓励原创，无论是你的学习体验、想法、工作生活经验，还是好书、好文章、好资源，都可发在这里。</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="talk-list-2" id="dadas">
                                        <ul>
                                            <li class="talk-list-cen" style="display:block;">
                                                <form id="form1" onsubmit="return false" action="##" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                                    <input  type="hidden" name="create_at">
                                                    <input  type="hidden" name="homeuser_id">
                                                <p>老师答疑区</p>
                                                <div class="list-cen">
                                                    <span>针对</span>
                                                    <div class="list-cen-1">
                                                        <select  name="learning_id">
                                                            @foreach($learnin as $v)
                                                            <option  value="{{$v->id}}">{{$v->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <span style="margin-left:15px;">发起讨论</span>
                                                </div>
                                                <h5>选择课程，讨论帖将归属于全局课程；选择课时，讨论帖将归属于课时</h5>
                                                <div class="title">
                                                    <p class="tit"><em class="f-sign">*</em>标题</p>
                                                    <div class="j-tit">
                                                        <div class="u-cmtwrp" id="auto-id-1520135625455">
                                                            <div class="u-cmtedtip2">
                                                                <div class="f-fs0 s-fc2 j-ic f-fl" style="display:none" id="yan">
                                                                    <div>还可以输入<b class="s-fc1" id="maths">100</b>字
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="u-cmtedit f-cb" style="z-index:102;">
                                                                <div class="wrap f-cb">
                                                                    <textarea name="title" class="j-ic mtxt" id="textli"></textarea>
                                                                </div>
                                                                <label class="j-ic hint" for="notetxt" id="auto-id-1520135625461"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="g-tit">
                                                    <div class="g-tit-1" id="buchong-1">
                                                        补充详细说明<i id="buleft-1" class="fa fa-caret-right caret-1"></i>
                                                        <i id="bubott-1" style="display:none" class="fa fa-caret-down caret-2"></i>
                                                    </div>
                                                    <!-- 编译器开始 -->
                                                    <div class="g-tit-2" id="bianyi-1">
                                                        <script type="text/javascript">
                                                            var ue = UE.getEditor('container');
                                                            ue.ready(function() {
                                                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                                            });
                                                        </script>
                                                        <!-- 编辑器容器 -->
                                                        <textarea name="content"  id="container" type="text/plain"></textarea>
                                                    </div>

                                                    <!-- 编译器结束 -->
                                                </div>
                                                <div class="anony f-fs0 s-fc2">
                                                    <label for="j-anony">
                                                        <input id="j-anony" class="cb" type="checkbox">匿名发帖
                                                    </label>
                                                </div>
                                                    <button style="width: 80px;height: 55px;background: red; color: #fff;" onclick="DoSubmit()">发布</button>
                                                </form>
                                            </li>
                                            <script>
                                                function DoSubmit() {
                                                    $.ajax({
                                                        type:'post',
                                                        dataType:'json',
                                                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                                                        url:'{{URL("/Lesson/store")}}',
                                                        data: $('#form1').serialize(),
                                                        success:function(data){
                                                            // console.log(data);
                                                            if(data.error_code==1){
                                                                $(".layer-view").show();
                                                            }
                                                            if(data.error_code==2){
                                                                alert('标题不能为空');
                                                            }
                                                            if(data.error_code==3){
                                                                $("#textli").val("");
                                                                $("#container").val("");
                                                                bbt();
                                                                bbtt();
                                                            }
                                                        }
                                                    })
                                                }
                                            </script>
                                            <script>
                                                function bbt(){
                                                    // var parent = $(this);
                                                    // console.log(parent);
                                                    $.ajax({
                                                        type:"get",
                                                        url:'{{URL("/Lesson/show")}}',
                                                        dataType:"json",
                                                        //data:"switch=" + parent.attr('id'),
                                                        success:function(data) {
                                                            if (data.error_code == 1) {
                                                                console.log(data);
                                                            for (var i = 0; i < data.info.length; i++) {
                                                                $('.about-center-2 ul').append('<li><div class="about-center-3">' +
                                                                    '<div class="about-center-aa"><div class="about-center-4">' +
                                                                    '<a class="toux" href="javascript:;">' +
                                                                    '<img src="../static/img/tou.png" alt=""></a>' +
                                                                    '<span class="touname"><a href="javascript:void(0);">' + data.info[i].type['email'] + '</a>' +
                                                                    '<span class="touV"></span></span><span class="toudata">' + data.info[i].create_at + '</span>' +
                                                                    '<span class="touV"></span></span><span class="toudata">' + data.info[i].type_name['name'] + '</span>' +
                                                                    '<span class="toutalk">【综合讨论区】</span></div><div class="about-center-5">' +
                                                                    '<span class="talk-cen"><span class="talk-cen-li talk-cen-1">置顶</span>' +
                                                                    '<span class="talk-cen-li talk-cen-2">精华</span>' +
                                                                    '<span class="talk-cen-li talk-cen-3">老师参与</span></span>' +
                                                                    '<a href="javascript:void(0);">'+ data.info[i].title +'</a></div>' +
                                                                    // '<a href="javascript:void(0);"> ''</a></div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</li>')
                                                                }
                                                             }
                                                        }
                                                    })
                                                }

                                            </script>
                                            <script>
                                                function bbtt(){
                                                     $(".tack-about ul li").eq($("#sdd").index(this) + 2).click();
                                                }
                                            </script>

                                            <li class="talk-list-cen">
                                                <form id="form2" onsubmit="return false" action="##" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                                    <input  type="hidden" name="create_at">
                                                    <input  type="hidden" name="homeuser_id">
                                                <div class="title">
                                                    <p class="tit"><em class="f-sign">*</em>主题</p>
                                                    <div class="j-tit">
                                                        <div class="u-cmtwrp" id="auto-id-1520135625455">
                                                            <div class="u-cmtedtip2">
                                                                <div class="f-fs0 s-fc2 j-ic f-fl" style="display:none" id="yan-1">
                                                                    <div>还可以输入<b class="s-fc1" id="maths-1">100</b>字
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="u-cmtedit f-cb" style="z-index:102;">
                                                                <div class="wrap f-cb">
                                                                    <textarea name="title" class="j-ic mtxt" id="textli-1"></textarea>
                                                                </div>
                                                                <label class="j-ic hint" for="notetxt" id="auto-id-152013562546"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="g-tit">
                                                    <div class="g-tit-1" id="buchong">
                                                        补充详细说明<i id="buleft" class="fa fa-caret-right caret-1"></i>
                                                        <i id="bubott" style="display:none" class="fa fa-caret-down caret-2"></i>
                                                    </div>
                                                    <!-- 编译器开始 -->
                                                    <div class="g-tit-2" id="bianyi">
                                                        <script type="text/javascript">
                                                            var ue = UE.getEditor('container1');
                                                            ue.ready(function() {
                                                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                                            });
                                                        </script>

                                                        <!-- 编辑器容器 -->
                                                        <script id="container1"   name="content" type="text/plain"></script>
                                                    </div>
                                                    <!-- 编译器结束 -->
                                                </div>
                                                <div class="anony f-fs0 s-fc2">
                                                    <label for="j-anony">
                                                        <input id="j-anon" class="cb" type="checkbox">匿名发帖
                                                    </label>
                                                </div>
                                                    <div class="btns">
                                                        <button style="width: 80px;height: 55px;background: red; color: #fff;" onclick="DoRelease()">发布</button>
                                                </div>
                                                </form>
                                                <script>
                                                    function DoRelease() {
                                                        $.ajax({
                                                            type:'post',
                                                            dataType:'json',
                                                            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                                                            url:'{{URL("/Release/store")}}',
                                                            data: $('#form2').serialize(),
                                                            success:function(data){
                                                                console.log(data);
                                                                if(data.error_code==1){
                                                                    $(".layer-view").show();
                                                                    // window.location='/home/login';
                                                                }
                                                                if(data.error_code==2){
                                                                    alert('标题和能容不能为空');
                                                                }
                                                                if(data.error_code==3){
                                                                    $("#textli").val("")
                                                                    //window.location='/home/login';
                                                                }
                                                            }


                                                        })
                                                    }
                                                </script>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- 发起讨论区结束 -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- 中间中央内容结束 -->
<!-- 登陆注册弹框开始 -->
    <div class="layer-view" style="display:none">
        <div class="box-wrapper">
            <div class="close">×</div>
            <div class="tab-container">

                <div class="tab-nav">
                    <a href="javascript:;" class="active">手机登录</a>
                    <a href="javascript:;">手机注册</a>
                    <span></span>
                </div>
                <div class="tab-content">

                    <!-- 手机号登录 -->
                    <div id="plogin">
                        <input type="text" name="telphone" maxlength="11" placeholder="请输入您的手机号" class="input-writer telphone">

                        <input type="password" name="pwd" placeholder="请输入您的密码" class="input-writer pwd">

                        <p class="formTip">&nbsp;</p>

                        <a href="javascript:;" class="btn submit-btn">登录</a>

                        <div class="other-opter">
                            <label>
                                <input type="checkbox" name=""> 保持登录
                            </label>

                            <a href="##">忘记密码？</a>

                            <a href="##" class="txt">立即注册</a>
                        </div>
                    </div>

                    <!-- 手机号注册 -->
                    <div id="pregister" style="display: none;">
                        <div class="input-box">
                            <input type="text" name="telphone" maxlength="11" placeholder="请输入您的手机号" class="input-writer telphone">
                            <button class="get-code" onclick="timeCount()">获取验证码</button>
                        </div>

                        <input type="text" name="codemsg" placeholder="请输入收到的验证码" class="input-writer code-msg">

                        <input type="password" name="pwd" placeholder="请输入您的密码" class="input-writer pwd">
                        <p class="formTip">&nbsp;</p>
                        <a href="javascript:;" class="btn submit-btn">注册</a>
                        <div class="other-opter">
                            <label>
                                <input type="checkbox" name=""> 同意使用协议
                            </label>

                            <a href="##" class="txt">返回登录</a>
                        </div>
                    </div>
                </div>

                <!-- 底部登录方式 -->
                <div class="login-other">
                    <a href="##">QQ账号登录</a>
                    <a href="##">微信登录</a>
                </div>
            </div>
        </div>
    </div>
<!-- 登陆注册弹框结束 -->
</body>
<script src="{{asset('static/js/index.js')}}"></script>
<script>
    var Time=60,  t;
    var c=Time
    function timeCount(){
        $("#pregister .get-code").html("" + c + "s");
        $("#pregister .get-code").addClass("disabled");
        c=c-1;
        t=setTimeout("timeCount()",1000)
        if(c<0){
            c=Time;
            stopCount();
            $("#pregister .get-code").html("发送校验码");
            $("#pregister .get-code").removeClass("disabled");
        }
    }
    function stopCount(){
        clearTimeout(t);
    } 
</script>
<script>
function lass(lic,onli){
    var lica = $(lic);
    // console.log(lica)
    for(var i=0;i<lica.length;i++){
        var index = 0;
        lica[i].setAttribute('gett',i);
        lica[i].onclick=function(obj){
            index = this.getAttribute('gett');
            // alert(index);
        $(onli).eq(index).css("display")=="none" ?  $(onli).eq(index).css('display','block'): $(onli).eq(index).css('display','none');
        }
    }
}
lass($(".fc2-aa"),$(".ab-y"));
lass($(".fc2-4"),$(".ping-fe"));
lass($(".fc2-5"),$(".ping-ac"));
// lass($(".fc2-ab"),$(".pinglun-ca"));
</script>
<script>
    three();
</script>
</html> 
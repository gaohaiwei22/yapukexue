<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="uper,吖扑,吖扑科学,apu" />
    <meta name="description" content="致力于教育产品的公司" />
    <title>吖扑科学</title>
    <link href="{{asset('static/img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('static/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/xiaoke.css')}}">
    {{--<link rel="stylesheet" href="{{asset('static/css/boot.css')}}">--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{asset('static/js/jquery-1.11.3.min.js')}}"></script>
    {{--<script src="{{asset('static/js/bootstrap.min.js')}}"></script>--}}
</head>
<body>
<!-- 头部导航开始 -->
<header>
    <!-- 移动端头部开始 -->
    <div class="container-fluid">
        <div class="nav-a">
            <a href="{{url('/')}}">
                <img src="{{ env('QINIU_DOMAIN')}}/{{$logo['logo']}}" alt="">
            </a>
        </div>
        <div class="navbar-header">
            <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <!-- 移动端头部结束 -->
    <!-- pc端头部开始 -->
    <div id="header" class="header-top">
        <!-- 导航左侧开始 -->
        <div class="header-left">
            <ul>
                @foreach($navigation as $v)
                    <li><a href="{{url("$v->url")}}">{{$v->name}}<span>{{$v->names}}</span></a></li>
                @endforeach
                {{--<li><a href="javascript:;">首页<span>HOME</span></a></li>--}}
                {{--<li><a href="javascript:;">商城<span>SHOP</span></a></li>--}}
                {{--<li><a href="javascript:;">学习<span>LEARN</span></a></li>--}}
                {{--<li><a href="javascript:;">支持<span>SUPPORT</span></a></li>--}}
                {{--<li><a href="javascript:;">合作案例<span>FORUM</span></a></li>--}}
            </ul>
        </div>
        <!-- 导航左侧结束 -->
        <!-- 导航中间开始 -->
        <div class="header-center">
            <a href="{{url('/')}}">
                <img src="{{ env('QINIU_DOMAIN')}}/{{$diagram->picname}}" alt="上图">

                <img src="{{ env('QINIU_DOMAIN')}}/{{$diagram->pic}}" alt="下图">
            </a>
        </div>
        <!-- 导航中间结束 -->
        <!-- 导航右侧开始 -->
        <div class="header-right">
            <div class="header-right-left">
                @foreach($rightnavigation as $v)
                    <a href="{{url('/')}}">{{$v->name}}<span>{{$v->names}}</span></a>
                @endforeach
            </div>
            <div class="header-right-right">
                <!-- 登陆注册购物车开始 -->
                @if(session('homeuser')=="")
                    <div class="right-top">
                        <div class="right-top-sign">
                            <a class="sign" href="{{url('home/login')}}">登陆</a>
                            <a href="{{url('home/register')}}">注册</a>
                        </div>
                        <span class="span">|</span>
                        <div class="right-top-shop">
                            <a href="javascript:void(0);" class="shop-cart">
                                <i class="fa fa-shopping-cart cart-li"></i>
                                <i class="cart-math"></i>
                            </a>
                            <a href="javascript:void(0);">
                                购物车</a>
                        </div>
                    </div>
                    <!-- 登陆注册购物车结束 -->
                    <!-- 登陆后和购物车后开始 -->
                @else
                    <div class="right-sign">
                        <div class="right-sign-in">
                            <div class="right-sign-in-1">
                                <a class="sign-1" id="sign-first" href=" ">{{session('homeuser')->name == null ? session('homeuser')->email : session('homeuser')->name}}</a>
                                <!-- 下拉框内容开始 -->
                                <div class="sign-delis">
                                    <div class="sign-delis-1">
                                        <div class="sign-delis-tu">
                                            <a href="javascript:void(0);" class="sign-delis-first" href="javascript:void(0);">
                                                <img src="./static/img/favicon.ico" alt="">
                                            </a>
                                        </div>
                                        <div class="sign-delis-tit">
                                            <div class="sign-delis-tit-1">
                                                <a href="javascript:void(0);">账号管理</a>
                                                <span>|</span>
                                                <a href="{{url('/home/logout')}}">退出</a>
                                            </div>
                                            <p>普通会员</p >
                                        </div>
                                    </div>
                                    <div class="sign-delis-2">
                                        <a class="delis-btn" href="javascript:void(0);">查看你的信息</a>
                                    </div>
                                </div>
                                <!-- 下拉框内容结束 -->
                            </div>
                            <a class="sign-second" href="javascript:void(0)"><i>11</i>消息</a>
                        </div>
                        <span class="span-1">|</span>
                        <div class="right-shop-in">
                            <div class="shop-in">
                                <a class="shop-cart-in">
                                    <i class="fa fa-shopping-cart cart-li-in"></i>
                                    <i class="cart-math-in">3</i>
                                </a>
                                <a href="javascript:void(0);">购物车</a>
                            </div>
                            <div class="shop-center">
                                <ul>
                                    <li>
                                        <a class="shop-center-li" href="javascript:void(0);">
                                            <img src="./static/img/chanpin.jpg" alt="">
                                        </a>
                                        <div class="shop-center-lis">
                                            <a href="javascript:void(0);">元器件小风铃</a>
                                            <p>的胡椒粉混合角度出发呵呵电话</p>
                                        </div>
                                        <div class="shop-center-btn">
                                            <button type="button" class="ttu4-1">
                                                <span class="ttu4-2"></span>
                                                <span class="ttu4-3"></span>
                                            </button>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="shop-center-li" href="javascript:void(0);">
                                            <img src="./static/img/chanpin.jpg" alt="">
                                        </a>
                                        <div class="shop-center-lis">
                                            <a href="javascript:void(0);">元器件小风铃</a>
                                            <p>的胡椒粉混合角度出发呵呵电话</p>
                                        </div>
                                        <div class="shop-center-btn">
                                            <button type="button" class="ttu4-1">
                                                <span class="ttu4-2"></span>
                                                <span class="ttu4-3"></span>
                                            </button>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="shop-center-li" href="javascript:void(0);">
                                            <img src="./static/img/chanpin.jpg" alt="">
                                        </a>
                                        <div class="shop-center-lis">
                                            <a href="javascript:void(0);">元器件小风铃</a>
                                            <p>的胡椒粉混合角度出发呵呵电话</p>
                                        </div>
                                        <div class="shop-center-btn">
                                            <button type="button" class="ttu4-1">
                                                <span class="ttu4-2"></span>
                                                <span class="ttu4-3"></span>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            @endif
            <!-- 登陆后和购物车后结束 -->
                <!-- 搜索开始 -->
                <div class="right-right">
                    <form action="{{URL('/study')}}/{{$v->id}}/details" method="get" >
                        <input class="inputText" id="id_card" name="product_name" placeholder="SEARCH" type="text" value="" >
                        <button id="btn">
                            <img src="{{asset('static/img/fangda.png')}}" alt="">
                        </button>
                    </form>
                </div>
                <!-- 搜索结束 -->
            </div>
        </div>
        <!-- 导航右侧结束 -->
    </div>
    <!-- pc端头部结束 -->
</header>
<!-- 头部导航结束 -->
<!-- 学习页面中间内容开始 -->
<div id="center">
    <div id="centent">
        <!-- 中间左侧内容开始 -->
        <div id="centent-left">
            <div class="centent-left-w">
                <div class="centent-left">
                    <a class="centent-left-1" href="{{url('/study')}}">
                        <img src="{{ env('QINIU_DOMAIN')}}/{{$product_table['product_picture']}}" alt="">
                    </a>
                    <a class="centent-left-2" href="{{url('/study')}}" target="showframe">{{$product_table['product_name']}} {{$product_table['alias']}}</a>
                    <p>{{$product_table['product_details']}}</p>
                        <div class="centent-left-3">
                        <div class="left-aa"><span>适用年龄 AGE OF </span><span class="left-aa-1">{{ $product_table['age'] }}&nbsp;+ </span></div>
                        <div class="left-ab">
                            <p>编程支持</p>
                            <p>upDuino编程软件 原生Arduino IDE</p>
                        </div>
                    </div>
                </div>
                <div class="centent-left-aa">
                    @foreach($introduction as $v)
                    <a href="{{$v->address}}">{{$v->summary}}</a>
                    @endforeach
                </div>
                <div class="centent-left-ab" id="Oli">
                    {{--课节--}}
                    <p>在线学习</p>
                    @foreach($Learning as $k => $v)
                    <a href="javascript:void(0)" ipath="{{URL('/Lesson')}}/{{$v->id}}/Lesson" class="study" id="{{ $v->id }}" >{{$v->curriculum}}<span>{{$v->name}}</span></a>
                    @endforeach
                </div>
                <div class="centent-left-ac">
                    <p>资源下载</p>
                    <a href="javascript:void(0);">教程（PDF）</a>
                    <a href="javascript:void(0);">授课资料（PPT）</a>
                    <a href="javascript:void(0);">编程软件</a>
                    <a href="javascript:void(0);">视频教程（MP4）</a>
                </div>
                <div class="centent-left-ad">
                    <p>支持</p>
                    <a href="javascript:void(0);">介绍资料</a>
                    <a href="javascript:void(0);">投标</a>
                    <a href="javascript:void(0);">预算</a>
                    <a href="javascript:void(0);">案例集</a>
                </div>
            </div>
        </div>
        <!-- 中间左侧内容结束 -->
        <!-- 中间中央内容开始 -->
        <div id="centent-center">
            <div id="centent-center-aa">
                <a href="{{url('/')}}">首页</a><span>|</span>
                <a href="{{url('/study')}}">学习</a><span>|</span>
                <a href="javascript:void(0);">智慧机器</a>
            </div>
            {{--<script>--}}
                {{--$(function () {--}}
                    {{--$('.study').on('click',function () {--}}
                        {{--var parent = $(this);--}}
                        {{--console.log(parent);--}}
                        {{--$.ajax({--}}
                            {{--type:"get",--}}
                            {{--url:'{{url('/getcategorydata')}}',--}}
                            {{--data:"switch=" + parent.attr('id'),--}}
                            {{--dataType:"json",--}}
                            {{--success:function(data) {--}}
                                {{--console.log(data);--}}
                            {{--}--}}
                        {{--})--}}
                    {{--})--}}
                {{--})--}}
            {{--</script>--}}
            <div class="centent-center-ab" >
                @foreach($Totalcourse as $v)
                <p id="gaishu">概述<a href="javascript:void(0);">作者:{{$v->name}}</a></p>
                    <div class="centent-center-ab-1">
                    <video controls loop src="{{ env('QINIU_DOMAIN')}}/{{$v->video}}"></video>
                </div>
                <p class="centent-tit">{{$v->introduce}}</p>
                @endforeach

                    <div class="centent-keche" id="keche">课程表</div>
                {{--图片课程--}}
                <div class="centent-center-ac">
                    @foreach($curriculum as $v)
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <img src="{{ env('QINIU_DOMAIN')}}/{{$v->picture}}" alt="">
                            </a>
                            <p>{{$v->name}}</p>
                        </li>
                    </ul>
                    @endforeach
                </div>
            {{--数字课程--}}
                <div class="centent-center-ad">
                    @foreach($curriculum as $v)
                    <ol>
                        <li>{{ $v->number }}<a href="javascript:void(0);">{{ $v->Course }}</a>{{ $v->Generalization }}</li>
                    </ol>
                    @endforeach
                </div>

                <div class="centent-keche" id="jian">使用建议</div>
                <div class="centent-center-ae">
                    @foreach($curriculum as $v)
                    <p class="centent-ti">{{ $v->title }}</p>
                    <p class="centent-ti-1">
                       {{ $v->introduction }}
                    </p>
                        <p class="centent-ti-2">
                            <a href="javascript:void(0);">{{ $v->Practical }}</a>

                            <a href="javascript:void(0);">{{ $v->link }}</a>

                            <a href="javascript:void(0);">{{ $v->download }}</a>
                        </p>
                    @endforeach
                </div>
                <div class="centent-keche">电子清单</div>

            </div>
        </div>
        <!-- 中间中央内容结束 -->
        <!-- 中间右侧内容开始 -->

        <div id="centent-right">
            @foreach($product as $v)
            <div class="centent-right-aa">
                <a href="javascript:void(0);" class="centent-right-aa-1">
                    <img src="{{ env('QINIU_DOMAIN')}}/{{$v->product_picture}}" alt="">
                </a>
                <a href="javascript:void(0);" class="centent-right-aa-2">{{$v->name}}</a>
                <p>{{ $v->introduce }}</p>
                <div class="centent-right-aa-3">
                    <span>￥{{ $v->Price }}</span>
                    <button name="buttn" value="加入">加入购物车</button>
                    <button name="buttn"  class="butt">已加入</button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- 中间右侧内容结束 -->
    </div>
</div>
<!-- 学习页面中间内容结束 -->
<!-- 尾部开始 -->
<footer>
    <div id="footer">
        <div class="footer">
            <!-- 尾部左侧开始 -->
            <div class="footer-left">
                <p class="foot">{{$bottom->phone}}</p>
                <p class="foot-li">{{$bottom->address}}  </p>
                <p class="foot-li">{{$bottom->englishaddress}}</p>
                <span>{{$bottom->edition}}</span>
            </div>
            <!-- 尾部左侧结束 -->
            <!-- 尾部右侧开始 -->
            <div class="footer-right">
                <a href="javascript:void(0);">
                    <img src="{{ env('QINIU_DOMAIN')}}/{{$bottom->image}}" alt="">
                </a>
            </div>
            <!-- 尾部右侧结束 -->
        </div>
    </div>
</footer>
<!-- 尾部结束 -->
</body>
<script src="{{ URL::asset('static/js/index.js')}}"></script>
<script>
    Lunbo();

</script>
</html>
<style>
    #iframe1{
        width:100%;
        height:auto;
        background:#fff;
        margin-top:5px;
        box-shadow:0px 0px 5px #ccc;
        margin-bottom:20px;
        padding:20px;
    }
</style>
<script>
    function changeFrameHeight(){
        // var height = window.frames["iframe1"].document.body.scrollHeight;
        // var ifHeight = $(window.top.document).find("#iframe1").css({height:height});
        var iframe = document.getElementById("iframe1");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
            // console.log(height);
        }catch (ex){}
        $(window.parent.document).find("#iframe1").css({height:height});
    }
    window.setInterval("changeFrameHeight()", 1);

    var oDaily=document.getElementById('Oli');
    var oLi=oDaily.getElementsByTagName('a');
    // console.log(oLi);
    for(var i=0;i<oLi.length;i++){
        oLi[i].count = i;
        // oLi[i].ipath = i;
        oLi[i].onclick = function(obj){
            // alert(i)
            var ti=$(this).attr('ipath');
            // alert(ti);
            $('#centent-center').html("<iframe id='iframe1' name='iframe1' src='"+ti+"' name='topFrame' id='topFrame' frameborder='no' border='0' scrolling='no' onload='changeFrameHeight()'></iframe>");
        }
    }
</script>

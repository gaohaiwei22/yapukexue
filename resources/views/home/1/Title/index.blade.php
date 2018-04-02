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
                    <img src="{{ env('QINIU_DOMAIN')}}/{{$logo->logo}}" alt="">
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
                                <a class="sign-1" id="sign-first" href=" ">{{session('homeuser')->name}}</a>
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
                        <form action="{{url('/')}}" method="get" >
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
<!-- 中间内容开始 -->
    <div id="center">
        <div class="center">
        <!-- 轮播图开始 -->
            <div class="banner">
                <div class="banner-ba" id="banner">
                    <ul class="banner-lun">
                        <li  class="active">
                            <a href="{{url('/')}}">
                                <img src= "{{ env('QINIU_DOMAIN')}}/{{$carousely->picture}}" alt="First slide" style="width:100%">
                            </a>
                        </li>
                        @foreach($carousel as $k =>$v)
                            <li >
                                <a href="{{url('/')}}">
                                    <img src="{{ env('QINIU_DOMAIN')}}/{{$v->picture}}" alt="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div id="banner-left"><</div>
                    <div id="banner-right">></div>
                </div>
                <div class="banner-li" id="banner-list">
                    <ul>
                        <li class="listactive"></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>

        <!-- 轮播图结束 -->
        <!-- 中间产品开始 -->
            <div class="center-center">
                <div class="center-nav">
                    @foreach($title as $v)
                    <a href="javascript:void(0);">
                        {{$v->title}}<span>{{$v->name}}</span>
                        <span>{{$v->names}}</span>
                    </a>
                    @endforeach
                </div>
                <div class="center-list">
                    @if(!$product_table->count()) 您搜索的数据不存在 @else
                    <ul>
                        @foreach($product_table as $v)
                        <li>
                            <a class="center-img" href="javascript:void(0);">
                                <img src="{{ env('QINIU_DOMAIN')}}/{{$v->product_picture}}" alt="">
                            </a>
                            <a class="center-title" href="javascript:void(0);">
                                {{$v->product_name}}
                                <span>{{$v->alias}}</span>
                            </a>
                            <dl>
                                <dt>{{$v->product_details}}</dt>
                                {{--<dt>使用图形化编程驱动智能硬件</dt>--}}
                                {{--<dt>制作有趣的互动项目</dt>--}}
                            </dl>
                            <p>智能制造<span>/</span>图形化编程<span>/</span>单片机应用</p>
                            <div class="center-btn">
                                <a href="{{URL('/video_table')}}/{{$v->id}}/details">开始学习</a> | <a href="{{URL('/product_table')}}/{{$v->id}}/details">购买</a>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    @endif
                </div>
                <div class="box-footer clearfix">
                    {!! $product_table->appends($params)->render() !!}
                </div>
            </div>
        <!-- 中间产品开始 -->
        </div>
    </div>
<!-- 中间内容结束 -->
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
<script src="{{asset('static/js/index.js')}}"></script>
<script>
    Lunbo();

</script>
</html>
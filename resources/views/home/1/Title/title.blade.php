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
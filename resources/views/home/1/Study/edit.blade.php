 <!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  	<meta name="keywords" content="uper,吖扑,吖扑科学,apu" />
  	<meta name="description" content="致力于教育产品的公司" />
  	<title>吖扑科学</title>
	<link href="{{asset('static/img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
  	<link rel="stylesheet" href="{{asset("static/css/index.css")}}">
  	<link rel="stylesheet" href="{{asset("static/css/reset.css")}}">
  	<link rel="stylesheet" href="{{asset("static/css/all.css")}}">
  	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{asset("static/js/jquery-1.11.3.min.js")}}"></script>
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
<!-- 学习页面中间内容开始 -->
    <div id="center">
        <div id="centent">
            <!-- 中间左侧内容开始 -->
            <div id="centent-left">
                <div class="centent-left-w">
                    <div class="centent-left">
                        <a class="centent-left-1" href="">
                            <img src="{{ env('QINIU_DOMAIN')}}/{{$product_table->product_picture}}" alt="">
                        </a>
                        <a class="centent-left-2" href="2.html" target="showframe">智慧机器 课程套件</a>
                        <p>8个妙趣横生的项目就在盒子中，老师们 可以使用它们开设电子编程和结构设计 的相关课程，如果你是一名零基础的创 意物件爱好者，这将是一套特非常好的自学入门课程。</p>
                        <div class="centent-left-3">
                            <div class="left-aa"><span>适用年龄 AGE OF</span><span class="left-aa-1">8+</span></div>
                            <div class="left-ab">
                                <p>编程支持</p>
                                <p>upDuino编程软件 原生Arduino IDE</p>
                            </div>
                        </div>
                    </div>
                    <div class="centent-left-aa">
                        <p>概述</p>
                        <a href="#keche">课程表</a>
                        <a href="#jian">使用建议</a>
                        <a href="./study/center.html">元器件清单</a>
                    </div>
                    <div class="centent-left-ab" id="Oli">
                        <p>在线学习</p>
                        <a href="javascript:void(0)" ipath="./study/1.html" class="lisca">第一课<span>点亮世界</span></a>
                        <a href="javascript:void(0);" ipath="./study/2.html">第二课<span>超级信号灯</span></a>
                        <a href="javascript:void(0);" ipath="./study/3.html">第三课<span>奶油报复机</span></a>
                        <a href="javascript:void(0);">第四课<span>招财猫</span></a>
                        <a href="javascript:void(0);">第五课<span>阳光花房</span></a>
                        <a href="javascript:void(0);">第六课<span>阳光花房2</span></a>
                        <a href="javascript:void(0);">第七课<span>智能那灯光系统</span></a>
                        <a href="javascript:void(0);">第八课<span>测温仪</span></a>
                        <a href="javascript:void(0);">第九课<span>浇水控制台</span></a>
                        <a href="javascript:void(0);">第十课<span>智能浇花系统</span></a>
                        <a href="javascript:void(0);">第十一课<span>气象站</span></a>
                        <a href="javascript:void(0);">第十二课<span>坐姿检测仪</span></a>
                        <a href="javascript:void(0);">第十三课<span>灯光与爆炸系统</span></a>
                        <a href="javascript:void(0);">第十四课<span>测谎仪</span></a>
                        <a href="javascript:void(0);">第十五课<span>自由设计</span></a>
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
                    <a href="javascript:void(0);">首页</a><span>|</span>
                    <a href="javascript:void(0);">学习</a><span>|</span>
                    <a href="javascript:void(0);">智慧机器</a>
                </div>
                <div class="centent-center-ab">
                    <p id="gaishu">概述<a href="javascript:void(0);">作者吖扑科学</a></p>
                    <div class="centent-center-ab-1">
                        <video controls loop src="./static/img/yapukexue.mp4"></video>
                    </div>
                    <p class="centent-tit">无论你是谁，在从事什么岗位，都可以通过这个盒子制作一些有趣的东西，在这个过程中，你会掌握很多和机器交互相关的技术知识 <br>将来，当你需要设计一件作品来表达你对世界的看法，这些知识会给你极大的帮助和灵感</p>
                    <i class="centent-tit-1">零基础起点的15节神奇又有趣的课程，除了准备一台电脑用于编程学习外，你不必再准备任何其余的设备和材料</i>
                    <div class="centent-keche" id="keche">课程表</div>
                    <div class="centent-center-ac">
                        <ul>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="./static/img/g1.jpg" alt="">
                                </a>
                                <p>超级信号灯</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="./static/img/g2.jpg" alt="">
                                </a>
                                <p>阳光花房</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="./static/img/g3.jpg" alt="">
                                </a>
                                <p>招财猫</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="./static/img/g4.jpg" alt="">
                                </a>
                                <p>测谎仪</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="./static/img/g5.jpg" alt="">
                                </a>
                                <p>坐姿仪提示器</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="./static/img/g6.jpg" alt="">
                                </a>
                                <p>气象站</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="./static/img/g7.jpg" alt="">
                                </a>
                                <p>坐姿检测仪</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="./static/img/g8.jpg" alt="">
                                </a>
                                <p>奶油报复机</p>
                            </li>
                        </ul>
                    </div>
                    <div class="centent-center-ad">
                        <ol>
                            <li>01<a href="javascript:void(0);">点亮世界</a>关于智能硬件的趣味入门课，零基础起点去往神奇的发现之旅</li>
                            <li>02<a href="javascript:void(0);">超级信号灯</a>原来计算机程序就是把我们想让机器做的事情叙述出来嘛</li>
                            <li>03<a href="javascript:void(0);">奶油报复机</a>哈，一个超有才的互动项目，制作它并试试你的运气吧</li>
                            <li>04<a href="javascript:void(0);">招财猫</a>一只看见人就会摇摆打招呼的可爱机械猫</li>
                            <li>05<a href="javascript:void(0);">阳光花房</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>06<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>07<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>08<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>09<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>10<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>11<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>12<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>13<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>14<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                            <li>15<a href="javascript:void(0);">阳光花房2</a>学习是为了更好的生活，现在知识就可以改良花盆啦</li>
                        </ol>
                    </div>
                    <div class="centent-keche" id="jian">使用建议</div>
                    <div class="centent-center-ae">
                        <p class="centent-ti">"我是一名学校老师"</p>
                        <p class="centent-ti-1">
                            《智慧机器》课程适合面向小学五六年级和初中个一二年级开展创新课程使用，本套课程可归类为“智能制造”、“数学造物”、“互动设计”等学科。<br>
                            课程难度适中，内容编排科学，好玩有趣。课程经过几十家学校落地验证和4次版本更新，内容成熟可靠，是各类院校开展创新教育的不二之选。<br>
                            课程共计十五节，每节课程1.5小时（2*45分钟），一般情况下，可供学生整个学期使用（点击查看下学期内容）。
                        </p>
                        <p class="centent-ti-2">
                            <a href="javascript:void(0);">下载授课资料</a>
                            <span>|</span>
                            <a href="javascript:void(0);">下载编程软件</a>
                            <span>|</span>
                            <a href="javascript:void(0);">购买套件</a>
                            <span>|</span>
                            <a href="javascript:void(0);">在线备课</a>
                        </p>
                    </div>
                    <div class="centent-center-ae">
                        <p class="centent-ti">"我是培训机构"</p>
                        <p class="centent-ti-1">
                            《智慧机器》课程适合面向小学五六年级和初中个一二年级开展创新课程使用，本套课程可归类为“智能制造”、“数学造物”、“互动设计”等学科。<br>
                            课程难度适中，内容编排科学，好玩有趣。课程经过几十家学校落地验证和4次版本更新，内容成熟可靠，是各类院校开展创新教育的不二之选。<br>
                            课程共计十五节，每节课程1.5小时（2*45分钟），一般情况下，可供学生整个学期使用（点击查看下学期内容）。
                        </p>
                        <p class="centent-ti-2">
                            <a href="javascript:void(0);">下载授课资料</a>
                            <span>|</span>
                            <a href="javascript:void(0);">下载编程软件</a>
                            <span>|</span>
                            <a href="javascript:void(0);">购买套件</a>
                            <span>|</span>
                            <a href="javascript:void(0);">在线备课</a>
                        </p>
                    </div>
                    <div class="centent-center-ae">
                        <p class="centent-ti">"我是爱好者"</p>
                        <p class="centent-ti-1">
                            《智慧机器》课程适合面向小学五六年级和初中个一二年级开展创新课程使用，本套课程可归类为“智能制造”、“数学造物”、“互动设计”等学科。<br>
                            课程难度适中，内容编排科学，好玩有趣。课程经过几十家学校落地验证和4次版本更新，内容成熟可靠，是各类院校开展创新教育的不二之选。
                        </p>
                        <p class="centent-ti-2">
                            <a href="javascript:void(0);">下载授课资料</a>
                            <span>|</span>
                            <a href="javascript:void(0);">购买套件</a>
                            <span>|</span>
                            <a href="javascript:void(0);">在线学习</a>
                        </p>
                    </div>
                    <div class="centent-keche">电子清单</div>
                </div>
            </div>
            <!-- 中间中央内容结束 -->
            <!-- 中间右侧内容开始 -->
            <div id="centent-right">
                <div class="centent-right-aa">
                    <a href="javascript:void(0);" class="centent-right-aa-1">
                        <img src="./static/img/chanpin.jpg" alt="">
                    </a>
                    <a href="javascript:void(0);" class="centent-right-aa-2">光敏电阻传感器</a>
                    <p>模拟量传感器，检测和反馈光线强度的变化</p>
                    <div class="centent-right-aa-3">
                        <span>￥39</span>
                        <button name="buttn" value="加入">加入购物车</button>
                        <button name="buttn"  class="butt">已加入</button>
                    </div>
                </div>
                <div class="centent-right-aa">
                    <a href="javascript:void(0);" class="centent-right-aa-1">
                        <img src="./static/img/chanpin.jpg" alt="">
                    </a>
                    <a href="javascript:void(0);" class="centent-right-aa-2">光敏电阻传感器</a>
                    <p>模拟量传感器，检测和反馈光线强度的变化</p>
                    <div class="centent-right-aa-3">
                        <span>￥39</span>
                        <button>加入购物车</button>
                    </div>
                </div>
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
                    <p class="foot">400-600-6666</p>
                    <p class="foot-li">北京吖扑信息科技有限公司  </p>
                    <p class="foot-li">Beijing uper Information Technology Co., Ltd</p>
                    <span>京ICP备15050568号-1</span>
                </div>
                <!-- 尾部左侧结束 -->
                <!-- 尾部右侧开始 -->
                <div class="footer-right">
                    <a href="javascript:void(0);">
                        <img src="./static/img/erwei.jpg" alt="">
                    </a>
                </div>
                <!-- 尾部右侧结束 -->
            </div>
        </div>
    </footer>
<!-- 尾部结束 -->  
</body>
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
<script src="./static/js/index.js"></script>
<script>
function changeFrameHeight(){  
    var height = window.frames["iframe1"].document.body.scrollHeight;
    // alert(height);
    var ifHeight = $(window.top.document).find("#iframe1").css({height:height});
}
var oDaily=document.getElementById('Oli');
var oLi=oDaily.getElementsByTagName('a');
console.log(oLi);
    for(var i=0;i<oLi.length;i++){
    oLi[i].count = i;
    // oLi[i].ipath = i;
    oLi[i].onclick = function(obj){
        // alert(this.ipath);
        var ti=$(this).attr('ipath');
        // alert(ti);
        $('#centent-center').html("<iframe id='iframe1' name='iframe1' src='"+ti+"' name='topFrame' id='topFrame' frameborder='no' border='0' scrolling='no' onload='changeFrameHeight()' ></iframe>");
    }
}
</script>
</html>
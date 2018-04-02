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
@include('home.Title.title')
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
                                    <a href="{{URL('/study')}}/{{$v->id}}/details">开始学习</a> | <a href="{{URL('/product_table')}}/{{$v->id}}/details">购买</a>
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
@include('home.Bottom.bottom')
<!-- 尾部结束 -->
</body>
<script src="{{asset('static/js/index.js')}}"></script>
<script>
    Lunbo();

</script>
</html>
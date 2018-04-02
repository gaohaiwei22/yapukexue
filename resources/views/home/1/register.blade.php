<!DOCTYPE html>
<!-- saved from url=(0063)https://account.cnblogs.com/?ReturnUrl=https://www.cnblogs.com/ -->
<html lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <title>用户注册</title>
    <!--优先加载字体-->
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{url('js/nav-iconfont.js')}}"></script>
    <!--css-->
    <link rel="shortcut icon" href="https://common.cnblogs.com/favicon.ico" type="image/x-icon">
    <link href="{{url('css/layout.min.css')}}" rel="stylesheet">
    <script src="{{url('js/jquery-1.8.3.min.js')}}" type="text/javascript"></script>
    <link href="{{url('css/signup.min.css')}}" rel="stylesheet">

<style type="text/css"></style>
    <script charset="UTF-8" async="" src="{{url('css/gettype.php')}}"></script>
    <script charset="UTF-8" async="" src="{{url('js/geetest.5.10.10.js')}}"></script>
    <script charset="UTF-8" src="{{url('css/get.php')}}"></script>
    <link rel="stylesheet" href="{{url('css/style_https.3.2.0.css')}}">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <nav class="navbar-fixed-top nav-box navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('/')}}" class="no-style">
                    <img src="{{asset('static/img/1506249700.png')}}" style="width:150px;height:45px;">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right nav-main-icon">
                    <li>
                        <a href="{{url('/')}}" class="no-style">
                            <svg class="icon-home">
                                <use xlink:href="#icon-home"></use>
                            </svg>
                            首 页
                        </a>
                    </li>
                        <li>
                            <a href="{{url('/home/login')}}">
                                <svg>
                                    <use xlink:href="#icon-signin"></use>
                                </svg>
                                登 录
                            </a>
                        </li>
                    <li>
                        <a href="{{url('/home/register')}}" id="signUpMenu">
                            <svg>
                                <use xlink:href="#icon-signup"></use>
                            </svg>
                            注 册
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/home/register')}}" id="assistMenu">
                            <svg>
                                <use xlink:href="#icon-assist"></use>
                            </svg>
                            帮 助
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!---body-->
    <div class="container body-box" style="height: 564px;">
        <!--css-->
<div class="center-block body-content">
    <!--头部提示-->
    <div class="hidden-xs title-top col-sm-12">
        注册新用户
        <hr class="head-hr">
    </div>




	<!--表单-->
    <form class="form-horizontal col-sm-8 form-padding" role="form" id="registerForm" method="post" action="{{url('/home/store')}}" novalidate="novalidate" name="myform" onsubmit="return doSubmit()";>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-space-top hidden-xs"></div>
        <!--每一行-->
		<div class="form-group">
            <div class="col-sm-2 control-label">
                <label class="w4-4" for="email">邮箱账号</label>
            </div>
            <div class="col-sm-10 has-feedback has-error">
                <input class="form-control input-validation-error" placeholder="邮箱账号" type="text" data-val="true" data-val-length="请输入正确的邮箱账号" name="email" value="" onblur="checkAccount()" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">
                <label class="w4-4" for="PhoneNum">手机号码</label>
            </div>
            <div class="col-sm-10 has-feedback has-error">
                <input class="form-control input-validation-error" placeholder="激活帐户需要手机短信验证" type="text" name="phone" id="Verification" onblur="checkPhone()">
            </div>
        </div>

		 <div class="form-group">
           <div class="col-sm-5 control-label"></div>
            <div class="col-sm-7 has-feedback has-error">

                <input class="form-control input-validation-error" placeholder="获取手机短信验证码" type="text"   name="code" value=""  style="width:69%;float:left">
                {{--<input type="button" style="height:32px;width:120px;" value="点击发送验证码" onclick="sendCode(this)" />--}}
				<a href="javascript:void(0);"><button type="button" onclick="return settime()" >获取验证码</button></a>
            </div>
			</div>
			<script>
					 function DoSubmit()
					 {
						//alert('ok')
						var tel = $("input[name='phone']").val();
						//alert(tel);
						$.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
							url:"{{url('/home/message')}}",
							type:"post",
							data:'phone='+tel,
							success:function(data){
								if(data ==  1){
									alert("手机已注册请登录");
								}else{
									alert('验证码已发送');
								}
							},
							error:function(){
								alert('服务器，错误');
							}
						})
                         sendCode(thisBtn)
					}
				</script>
        <script type="text/javascript">
            var clock = '';
            var nums = 60;
            var btn;
            function sendCode(thisBtn){
                btn = thisBtn;
                btn.disabled = true; //将按钮置为不可点击
                btn.value = nums+'秒后可重新获取';
                clock = setInterval(doLoop, 1000); //一秒执行一次
            }
            function doLoop(){
                nums--;
                if(nums > 0){
                    btn.value = nums+'秒后可重新获取';
                }else{
                    clearInterval(clock); //清除js定时器
                    btn.disabled = false;
                    btn.value = '点击发送验证码';
                    nums = 60; //重置时间
                }
            }
        </script>
        <div class="space-line-height hidden-xs"></div>
        <div class="form-group">
            <div class="col-sm-2 control-label">
                <label class="w4-2" for="Password">密码</label>
            </div>
            <div class="col-sm-10 has-feedback has-error">
                <input class="form-control input-validation-error" placeholder="至少8位，必须包含字母、数字、特殊字符" type="password" id="Password" name="password" onblur="checkPassword()">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">
                <label class="w4-4" for="ConfirmPassword">确认密码</label>
            </div>
            <div class="col-sm-10 has-feedback">
                <input class="form-control valid" placeholder="请输入确认密码" type="password"  name="password2" onblur="checkPassword2()">
                <span class="text-danger field-validation-valid" data-valmsg-for="ConfirmPassword" data-valmsg-replace="true"></span>
                <span class="glyphicon form-control-feedback"></span>
            </div>
        </div>

        <!-- Modal -->


        <!--注册按钮-->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <span class="col-sm-12 ajax-error"></span>
                <button id="submitBtn" type="submit"  class="btn ladda-button center-block cnblogs-btn-blue" data-style="zoom-in"><span class="ladda-label">注册</span></button>
            </div>
        </div>

        <!--协议提示-->
        <div class="col-sm-offset-2 register-sign">
            *点击 “注册” 按钮，即表示您同意并愿意遵守 <a class="look-agreeon" target="_blank" href="https://passport.cnblogs.com/agreement.html">用户协议</a>。
        </div>
        <!--hidden-->
        <input type="hidden" id="RegisterFrom" name="RegisterFrom" value="https://www.cnblogs.com/">
        <input type="hidden" id="PublicKey" name="PublicKey" value="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCp0wHYbg/NOPO3nzMD3dndwS0MccuMeXCHgVlGOoYyFwLdS24Im2e7YyhB0wrUsyYf0/nhzCzBK8ZC9eCWqd0aHbdgOQT6CuFQBMjbyGYvlVYU2ZP7kG9Ft6YV6oc9ambuO7nPZh+bvXH0zDKfi02prknrScAKC0XhadTHT3Al0QIDAQAB">
    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8PhlBN8IFxtHhqIV3s0LCDnLFgoiBLe34Wm6FhBO04_R7cBDtFagmg8poJVel2He3-cJ5QwRDQU8ndvf-0Uo-vJFU_3JUOoBZ0aG_nKNV4QPJajK_0-oOQ_S6GL9ezjorLe5hxYpoRq_dgr41I0WT5g">
	</form>
	<script>
    function doSubmit(){
        return checkAccount() && checkPhone() &&  checkPassword() && checkPassword2();
    }
	//判断手机是否合法
    function checkAccount(){
        //获取手机输入的信息
        var email = document.myform.email.value;
        $("input[name='email']").nextAll("span").remove();
        //判断手机是否合法
        if(email.match(/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/)==null){
            $("<span style='color:red;'>邮箱不合法请重新输入</span>").insertAfter("input[name='email']");
            return false;
        }
        //执行ajax判断
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{url('/home/store')}}",
            type:"post",
            data:"email="+email,
            datatype:"text",
            success:function(data){
                if(data.error_code==1){
                   $("<span style='color:red;'>您输入的邮箱"+email+"已存在</span>").insertAfter("input[name='email']");
                    document.myform.phone.value = "";
                    return false;
                }
                if(data==2){
                    $("<span style='color:red;'>邮箱不可用</span>").insertAfter("input[name='email']");
                    return false;
                }else{
                    $("<span style='color:green;'>邮箱可用</span>").insertAfter("input[name='email']");
                }
            }
        });
        return true;
    }
    //判断手机是否合法
    function checkPhone(){
        //获取手机输入的信息
        var phone = document.myform.phone.value;
        $("input[name='phone']").nextAll("span").remove();
        //判断手机是否合法
        if(phone.match(/^1[34578]\d{9}$/)==null){
            $("<span style='color:red;'>手机不合法请重新输入</span>").insertAfter("input[name='phone']");
            return false;
        }
        //执行ajax判断
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{url('/home/store')}}",
            type:"post",
            data:"phone="+phone,
            datatype:"text",
            success:function(data){
				console.log('返回数据',data);
                if(data==1){
                   $("<span style='color:red;'>您输入的手机号"+phone+"已存在</span>").insertAfter("input[name='phone']");
                    document.myform.phone.value = "";
                    return false;
                }
                if(data==2){
                    $("<span style='color:red;'>手机号不可用</span>").insertAfter("input[name='phone']");
                    return false;
                }else{
                    $("<span style='color:green;'>手机可用</span>").insertAfter("input[name='phone']");
                }
            }
        });
        return true;
    }
    //密码验证
    function checkPassword(){
        //获取用户的输入密码
        var password = document.myform.password.value;
        $("input[name='password']").nextAll('span').remove();
        if(password==""){
            $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='password']");
            return false;
        }
        if(password.match(/^[A-Za-z0-9_]{6,20}$/)==null){
            $("<span style='color:red'>密码不合法请重新输入</span>").insertAfter("input[name='password']");
            return false;
        }else{
            $("<span style='color:green'>可用</span>").insertAfter("input[name='password']");
        }

        return true;
    }
    //确认密码验证
    function checkPassword2()
    {
        //获取确认密码
        var password2 = document.myform.password2.value;
        var password = document.myform.password.value;
        $("input[name='password2']").nextAll("span").remove();
        if(password2.length == 0){
            $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='password2']");
            return false
        }
        if(password2 != password){
            $("<span style='color:red'>两次密码不一致请重新输入</span>").insertAfter("input[name='password2']");
            document.myform.password2.value ="";
            return false;
        }else{
            $("<span style='color:green'>密码一致</span>").insertAfter("input[name='password2']");
            return true;
        }

        return true;
    }
    //设置300秒有效时间
    // var countdown=300;
    //定时器
    function settime(obj) {
        var phone = document.myform.phone.value;
        if (phone == "") {
            $("<span style='color:red;'>手机不能为空</span>").insertAfter("input[name='phone']");
            return false;
        }
        DoSubmit()
    }
    //     if (countdown == 0) {
    //         obj.removeAttribute("disabled");
    //         obj.value="获取验证码";
    //         countdown = 300;
    //         return;
    //     } else {
    //         obj.setAttribute("disabled", true);
    //         obj.value="重新发送(" + countdown + ")";
    //         countdown--;
    //         if(countdown == 299){
    //             send2();
    //         }
    //     }
    //     setTimeout(function() {settime(obj) },1000)
    // }
	</script>
    <div class="hidden-xs col-sm-4 side-img-box">
        <div class="side-line">
            <div></div>
        </div>
        <img src="{{asset('static/img/registersideimg.png')}}">
    </div>
</div>

    </div>
    <!--footer-->
    <br style="clear:both">
    <div id="footer_bottom" class="text-center" style="display: block;">
        <div><a href="https://www.cnblogs.com/AboutUS.aspx" class="hidden-xs">关于博客园</a><a href="https://www.cnblogs.com/ContactUs.aspx" class="hidden-xs">联系我们</a>©2004-2017<a href="https://www.cnblogs.com/">博客园</a><span class="hidden-xs">保留所有权利</span> Powered by ASP.NET Core on Linux</div>
    </div>


        <script src="{{url('js/_layout.min.js')}}"></script>


    <script src="{{url('js/gt.js')}}"></script>
    <script src="{{url('js/signup.min.js')}}"></script>



</body></html>
// 轮播图开始
function Lunbo(){
    var Lun = document.getElementById('banner');
    var Lunli = Lun.children[0].children;
    // console.log(Lunli);
    var Lis = document.getElementById('banner-list').children[0].children;
    // console.log(Lis);
    var left = document.getElementById('banner-left');
    var right = document.getElementById('banner-right');
    var index = 0;
    var runbo;
    function autoRun(){
        if(runbo){
            return;
        }
        runbo = setInterval(function(){
            Lunli[index].removeAttribute('class');
            Lis[index].removeAttribute('class');
            index++;
            if(index== Lunli.length){
                index=0;
            }
            Lunli[index].setAttribute('class','active');
            Lis[index].setAttribute('class','listactive');
        },5000);
    }
    autoRun();
    Lun.onmouseover = function(){
        clearInterval(runbo);
        runbo = undefined;
        // 左右箭头显示
        left.style.display = 'block';
        right.style.display = 'block';
    }
    Lun.onmouseout = function(){
        autoRun();
        left.style.display = 'none';
        right.style.display = 'none';
    }
    for(var i=0;i<Lis.length;i++){
        Lis[i].setAttribute('data-index',i);
        Lis[i].onmouseover =function(){
            Lunli[index].removeAttribute('class');
            Lis[index].removeAttribute('class');
            index = this.getAttribute('data-index');
            Lunli[index].setAttribute('class','active');
            Lis[index].setAttribute('class','listactive');
        }
    }
    left.onclick = function(){
        // 对于轮播图自身
        // 当前元素隐藏
        Lunli[index].removeAttribute('class');
        Lis[index].removeAttribute('class');
        // 当前的索引-1
        index--;
        // 最小值临界判定
        if(index<0){
            // 赋值为最大值 = 长度 - 1
            index = Lunli.length - 1;
        }
        // 上一张显示
        Lunli[index].setAttribute('class','active');
        Lis[index].setAttribute('class','listactive');
    }
    // 右侧箭头
    right.onclick = function(){
        // 当前隐藏
        Lunli[index].removeAttribute('class');
        Lis[index].removeAttribute('class');
        // 索引++
        index++;
        // 最大值
        if(index==Lunli.length){
            // 重新赋值为0
            index = 0;
        }
        // 下一张显示
        Lunli[index].setAttribute('class','active');
        Lis[index].setAttribute('class','listactive');
    }
}

// 轮播图结束

//=========================================================================

// 点击按钮事件开始
function butn(){
$('.navbar-toggle').on('click',function(){      
         $('.header-top').slideToggle();
        // $('.header-top').css("display")=="none" ?  $('.header-top').css('display','block'): $('.header-top').css('display','none');
    })
}
butn();
// 点击按钮事件结束

// 头部导航登陆后下拉菜单开始
// 登陆后下拉
function xiala1(){
    $('.right-sign-in-1').mouseover(function(){
        $('.sign-delis').css('display','block');
    })
    $('.right-sign-in-1').mouseout(function(){
        $('.sign-delis').css('display','none');
    })
}
xiala1();
// 购物车下拉
function xiala2(){
    $('.right-shop-in').mouseover(function(){
        $('.shop-center').css('display','block');
    })
    $('.right-shop-in').mouseout(function(){
        $('.shop-center').css('display','none');
    })
}
xiala2();
// 头部导航登陆后下拉菜单结束

//=========================================================================

// 首页回到顶部开始
function backtop(){
    $(window).bind("scroll",function(){
        var sTop = $(window).scrollTop();
        var sTop = parseInt(sTop);
        if (sTop >= 230) {  
            if (!$("#backTop").is(":visible")) {  
                try {  
                    $("#backTop").slideDown();  
                    } catch (e) {  
                    $("#backTop").show();  
                }                        
            }     
        }  
        else {  
            if ($("#backTop").is(":visible")) {  
                try {  
                    $("#backTop").slideUp();  
                    } catch (e) {  
                    $("#backTop").hide();  
                }                         
            }  
        }   
    });  
}
// 首页回到顶部结束

//=========================================================================

// 小节课程介绍开始
function myfunction(li,menu_tab){
    li.click(function(){
        var index=$(this).index();
        li.eq(index).addClass("add").siblings("li").removeClass("add");
        menu_tab.eq(index).fadeIn(1000).show().siblings().fadeOut(1000).hide();  
    });
}
myfunction($(".tack-about ul li"),$(".tack-about-center .about-center"));
myfunction($(".talk-list-1 ul li"),$(".talk-list-2 .talk-list-cen"));
// 小节课程介绍结束
/*封装的选项卡*/
//=========================================================================

// 弹框开始

    function three(){
            $(function () {
                    // 显示弹窗
                    $(".fc2-1 , .j-publish").click(function () {
                        $(".layer-view").show();
                    });
                //关闭弹窗
                $(".close", ".layer-view").click(function () {
                    $(".layer-view .box-wrapper").addClass("closeAnima");
                    setTimeout(function() {
                        $(".layer-view").hide();
                        $(".layer-view .box-wrapper").removeClass("closeAnima");
                    }, 330);
                });
                $(".tab-nav a").hover(function () {
                    $(".tab-nav span").css('transform', 'translate('+ $(this).index() * 100 +'%)');
                    $(this).addClass("active").siblings().removeClass("active");
                },function () {
                });
                $(".tab-nav a").click(function () {
                    $(".tab-nav span").css('transform', 'translate('+ $(this).index() * 100 +'%)');
                    $(this).addClass("active").siblings().removeClass("active");
                    $(".tab-content > div").eq($(this).index()).show().css('transform', 'translate(0%)').siblings().hide().css('transform', 'translate(-115%, 0)');
                });
                // 聚焦
                if($(".telphone")) {
                    $(".telphone").focus();
                }
                // 登录验证
                $("#plogin .submit-btn").click(function () {

                    var telphone = $("#plogin .telphone");
                    var pwd = $("#plogin .pwd");

                    if(!isTelSuccess(telphone)) {
                        return false;
                    }
                    if(!isPwdSuccess(pwd)) {
                        return false;
                    }
                    return true;
                });
                // 注册
                $("#pregister .submit-btn").click(function () {
                    var telphone = $("#pregister .telphone");
                    var codemsg = $("#pregister .code-msg");
                    var pwd = $("#pregister .pwd");

                    if(!isTelSuccess(telphone)) {
                        return false;
                    }

                    if(!isCodeMsg(codemsg)) {
                        return false;
                    }

                    if(!isPwdSuccess(pwd)) {
                        return false;
                    }
                    return true;
                });
            });

        // 验证手机号
        function isTelSuccess(tel) {
            if(tel.val() == "") {
                $(".formTip").html("手机号码不能为空~");
                tel.focus();
                return false;
            }else {
                $(".formTip").html("&nbsp;");
            }

            var phone = /^1(3|4|5|7|8)\d{9}$/;
            if(!phone.test(tel.val())){
                $(".formTip").html("手机号码格式不正确~");
                tel.focus();
                return false;
            }else{
                $(".formTip").html("&nbsp;");
            }
            return true;
        }
        // 验证密码
        function isPwdSuccess(pwd) {
            if(pwd.val() == "") {
                $(".formTip").html("密码不能为空~");
                pwd.focus();
                return false;
            }else {
                $(".formTip").html("&nbsp;");
            }
            return true;
        }

        // 确认密码
        function checkRepwd(pwdAgain, pwd){
            if(pwdAgain.val() == ""){
                $(".formTip").html("确认密码不能为空~");
                pwdAgain.focus();
                return false;
            }else{
                $(".formTip").html("&nbsp;");
            }

            if(pwdAgain.val() != pwd.val()){
                $(".formTip").html("输入的密码不一致~");
                pwdAgain.focus();
                return false;
            }else{
                $(".formTip").html("&nbsp;");
            }
            return true;
        }

        // 验证验证码
        function isCodeMsg(codemsg) {
            if(codemsg.val() == "") {
                $(".formTip").html("请获取验证码~");
                codemsg.focus();
                return false;
            }else {
                $(".formTip").html("&nbsp;");
            }
            return true;
        }

        // 获取验证码倒计时s
        // var Time=60,  t;
        // var c=Time
        // function timeCount(){
        //     $("#pregister .get-code").html("" + c + "s");
        //     $("#pregister .get-code").addClass("disabled");
        //     c=c-1;
        //     t=setTimeout("timeCount()",1000)
        //     if(c<0){
        //         c=Time;
        //         stopCount();
        //         $("#pregister .get-code").html("发送校验码");
        //         $("#pregister .get-code").removeClass("disabled");
        //     }
        // }
        // function stopCount(){
        //     clearTimeout(t);
        // }

    }
    three()
// 弹框结束




//=========================================================================

// 限制字数开始
function four(){
    $ (function(){
        $('.u-cmtedit .mtxt').focus(function(){
            $('.f-fl').css('display','block');
        })
        $('.u-cmtedit .mtxt').blur(function(){
            $('.f-fl').css('display','none');
        })
    })
    $(function(){
        // 最多100个中文字符
        var maxstrlen = 100;
        // 函数：获取传入的字符串的长度
        function getStrleng(str) {
            var len = 0;
            for (i = 0; (i < str.length) && (len <= maxstrlen * 2); i++) {
                // 如果是键盘码，则为英文字符，占一个字符；否则为中文字符，占两个字符
                if (str.charCodeAt(i) > 0 && str.charCodeAt(i) < 128){
                    len++;
                }
                else{
                    len+=2;
                }
            }
            return len;
        }
        $("#textli").keyup(function(event) {
            len = maxstrlen;
            var str = $(this).val();
            myLen = getStrleng(str);
            if (myLen > len * 2) {
                 $(this).val(str.substring(0, len));
            }
            else {
                $("#maths").html( Math.floor((len * 2 - myLen) / 2));
            }
        });
    });
    $(function(){
        // 最多100个中文字符
        var maxstrlen = 100;
        // 函数：获取传入的字符串的长度
        function getStrleng(str) {
            var len = 0;
            for (i = 0; (i < str.length) && (len <= maxstrlen * 2); i++) {
                // 如果是键盘码，则为英文字符，占一个字符；否则为中文字符，占两个字符
                if (str.charCodeAt(i) > 0 && str.charCodeAt(i) < 128){
                    len++;
                }
                else{
                    len+=2;
                }
            }
            return len;
        }
        $("#textli-1").keyup(function(event) {
            len = maxstrlen;
            var str = $(this).val();
            myLen = getStrleng(str);
            if (myLen > len * 2) {
                 $(this).val(str.substring(0, len));
            }
            else {
                $("#maths-1").html( Math.floor((len * 2 - myLen) / 2));
            }
        });
    });
}
four();
// 限制字数结束

//=========================================================================

// 编译器显示隐藏开始
function five(){
    var seve = $('.g-tit-1');
    // console.log(seve);
    for(var i=0;i<seve.length;i++){
        var index = 0;
        seve[i].setAttribute('sevet',i);
        seve[i].onclick=function(obj){
            index = this.getAttribute('sevet');
            $(".g-tit-2").eq(index).css("display")=="none" ?  $(".g-tit-2").eq(index).css('display','block'): $(".g-tit-2").eq(index).css('display','none');
        }
    }
}
five();
// 编译器显示隐藏结束

//=========================================================================

// 点赞开始
$(function(){
    $(".fc2-3").each(function(index,el){
           // console.log(index)
           // console.log(this)
           $(this).attr('index', index);
           // console.log(el)
    });
 $(".fc2-3").on("click",function(event){
        var nums = ($(this).children('.num').text());
            console.log(nums)
            nums++;
            $(this).children('.num').text(nums);
        // console.log("1")
  // $('.num').text(111);

    })
})

// 点赞结束


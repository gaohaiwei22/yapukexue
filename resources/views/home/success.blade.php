<script>
    var cnt = 3;
    function lod(){
        if(cnt < 0){
            window.location.href = "/home/login/";
        }else{
            document.getElementById("showTime").innerHTML = "注册成功<font color=red>" + cnt + "</font>秒后跳转到登录窗口";
            cnt--;
        }
        setTimeout("lod()",1000);
    }
</script>
<body onload="lod()">
<div id="showTime"></div>
</body>
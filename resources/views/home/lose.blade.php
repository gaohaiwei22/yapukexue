<script>
    var cnt = 3;
    function lod(){
        if(cnt < 0){
            window.location.href = "/home/";
        }else{
            document.getElementById("showTime").innerHTML = "注册失败，<font color=red>" + cnt + "</font>秒后跳转到注册窗口";
            cnt--;
        }
        setTimeout("lod()",1000);
    }
</script>
<body onload="lod()">
<div id="showTime"></div>
</body>
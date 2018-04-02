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
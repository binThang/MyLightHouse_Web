<section>
    <article class="share-area">
        <div class="center">
            <img src="/public/template/app/img/logo.png" alt="등대로고">
            <p>지금 앱 스토어에서 다운로드하세요!<br>
            더 많은 정보를 이용하실 수 있습니다.</p>
            <button id = 'store' type="button">스토어로 이동하기</button>
            <button id = 'app' type="button">앱 실행하기</button>
        </div>
    </article>
</section>

<script>
        $('body').on('click','#app',function(){
            var idx = '<?=$this->idx?>';
            document.location.href = "lighthouse://post_detail?post_id="+idx;
        });
        $('body').on('click','#store',function(){
            document.location.href = "market://details?id=com.ghsoft.android.lighthouse";
        });
</script>


<script type="text/javascript">
    $(function(){
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.searcha();
        }else if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
           window.webkit.messageHandlers.searcha.postMessage();
        }
    });
</script>
<?if($this->count->word)$link = '/'.$this->count->word;else$link='/null';?>

<section>
    <article class="search-area">
        <h2 class="blind">검색 카테고리</h2>
        <div class="info-txt hidden">
            <h3><span id = 'word'>친구</span>&nbsp;검색 결과입니다.</h3>
        </div>
        <ul>
            <li>
                <a href="/search/list/1<?=$link?>/1">
                    <h3>친구</h3>
                    <p class="hashtag">
                        <span>#대인관계</span>
                        <span>#따돌림</span>
                        <span>#소외...</span>
                    </p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->friend?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/2<?=$link?>/1">
                    <h3>가족</h3>
                    <p class="hashtag">
                        <span>#부모님</span>
                        <span>#가정형편</span>
                        <span>#다문화...</span>
                    </p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->family?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/3<?=$link?>/1">
                    <h3>외모</h3>
                    <p class="hashtag"><span>#키</span><span> #다이어트</span><span> #성형...</span></p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->visual?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/4<?=$link?>/1">
                    <h3>학교</h3>
                    <p class="hashtag"><span> #학교폭력</span><span> #선생님 </span><span>#부적응...</span></p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->school?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/5<?=$link?>/1">
                    <h3>공부</h3>
                    <p class="hashtag"><span>#성적 </span><span>#시험</span><span>#공부법...</span></p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->study?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/6<?=$link?>/1">
                    <h3>성격</h3>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->charactera?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/7<?=$link?>/1">
                    <h3>이성</h3>
                    <p class="hashtag"><span>#이성친구</span><span> #성</span><span> #이별...</span></p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->gender?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/8<?=$link?>/1">
                    <h3>꿈</h3>
                    <p class="hashtag"><span>#장래희망</span><span> #진로</span><span> #진학... </span></p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->dream?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/9<?=$link?>/1">
                    <h3>감정</h3>
                    <p class="hashtag"><span>#좌절</span><span> #열등감 </span><span>#트라우마 </span><span>#행복...</span></p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->emotion?></span></p>
                </a>
            </li>
            <li>
                <a href="/search/list/10<?=$link?>/1">
                    <h3>기타</h3>
                    <p class="hashtag"><span>#SNS</span><span> #게임 </span><span>#중독... </span></p>
                    <p><img src="/public/logic/app/img/search_ico.png" alt="검색 수"><span><?=$this->count->ect?></span></p>
                </a>
            </li>
        </ul>
    </article>
</section>

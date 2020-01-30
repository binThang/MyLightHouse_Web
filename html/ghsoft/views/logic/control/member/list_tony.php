<?php
// <input type="radio" name="'.$this->type->method.'_type" value="1" id="tea" checked="checked"><label for="tea">일반 회원</label>
// <input type="radio" name="'.$this->type->method.'_type" value="2" id="stu"'.(($_SESSION[$this->type->method]['type']=='2')?'checked="checked"':'').'><label for="stu">토니 회원</label>
$search='<article class="search">
        <form action="/admin/'.$this->type->method.'/form" data-list="/admin/'.$this->type->method.'/list_tony">
        <fieldset>
            <legend>검색</legend>
            <input type = "text" id = "name">
            <button type="button" id="search_btnaa" data-kind = '.$this->type->method.'><img src="/public/template/control/img/search.png" alt="검색"></button>
            <button type = "button" id = "listset" data-kind = '.$this->type->method.'>전체보기</button>
        </fieldset>
    </form>
</article>';
?>
<?php include VIEW.INDEX_T."list.php"; ?>

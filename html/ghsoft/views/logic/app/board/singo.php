<section>
    <?$board_idx = $_POST['board_idx'];
      $ifreply = $_POST['ifreply'];
    ?>
    <article class="singo-area">
        <div>
            <ul>
                <li><input type="radio" name="singo1" value="" id="singo1"><label for="singo1">욕설 및 비방</label></li>
                <li><input type="radio" name="singo1" value="" id="singo2"><label for="singo2">성적 수치심 유발</label></li>
                <li><input type="radio" name="singo1" value="" id="singo3"><label for="singo3">개인정보 요구</label></li>
                <li><input type="radio" name="singo1" value="" id="singo4"><label for="singo4">상업적 목적의 홍보 및 도배</label></li>
                <li><input type="radio" name="singo1" value="" id="singo5"><label for="singo5">기타</label></li>
            </ul>
        </div>
        <input type = 'hidden' id = 'board_idx' value = '<?=$board_idx?>'>
        <input type = 'hidden' id = 'ifreply' value = '<?=$ifreply?>'>

        <button type="button" name="button" id = 'singo'>신고하기</button>
    </article>
</section>

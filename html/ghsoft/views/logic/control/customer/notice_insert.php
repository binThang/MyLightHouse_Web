<section>
    <article class="title">
        <span>공지사항 등록</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
            <input type="hidden" name="idx" value="<?=$this->idx;?>">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="20%"/>
                        <col width="80%"/>
                    </colgroup>
                    <tbody>
                      <tr>
                         <td>공지사항 제목</td> <td><input type = 'text' id = 'title'></td>
                     </tr>
                     <tr>
                        <td>공지사항 내용</td> <td><textarea id = 'content'></textarea></td>
                    </tr>
                      <tr>
                        <td colspan="2"><button type="button" id="write_notice" class="btn">등록</button>
                       </tr>
                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

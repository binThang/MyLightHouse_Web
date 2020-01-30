<section>
    <article class="title">
        <span>카테고리 등록</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
            <input type="hidden" name="idx" value="<?=$this->idx;?>">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="30%"/>
                        <col width="70%"/>
                    </colgroup>
                    <tbody>
                      <tr>
                         <td>카테고리 이름</td> <td><input type = 'text' id = 'bigcategory'></td>
                     </tr>
                      <tr>
                        <td colspan="2"><button type="button" id="write_bcategory" class="btn">등록</button>
                       </tr>
                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

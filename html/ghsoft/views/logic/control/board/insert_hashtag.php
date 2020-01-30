<section>
    <article class="title">
        <span>해시태그</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
            <input type="hidden" name="idx" value="<?=$this->idx;?>">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="20%"/>
                        <col width="30%"/>
                        <col width="50%"/>
                    </colgroup>
                    <tbody>
                      <tr>
                         <td>해시태그 이름</td>
                         <td><select id = 'category'><?foreach($this->list as $row){?><option value = '<?=$row->category_idx?>'><?=$row->category?></option><?}?></select></td><td><input type = 'text' id = 'hashtag'></td>
                     </tr>
                      <tr>
                          <td colspan="3"><button type="button" id="write_scategory" class="btn">등록</button>
                       </tr>
                       <tr>
                           <td  id = 'hashtagzone' colspan="3">
                       </tr>
                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

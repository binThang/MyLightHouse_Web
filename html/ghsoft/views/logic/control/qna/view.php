<section>
    <article class="title">
        <span>문의 & 제안</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
            <input type="hidden" name="idx" value="<?=$this->idx;?>">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="25%"/>
                        <col width="25%"/>
                        <col width="25%"/>
                        <col width="25%"/>

                    </colgroup>
                    <tbody>
                      <tr style = 'border: 1px; border-style: solid; border-color: black;'>
                         <td>이메일</td> <td class = 'email'><?=$this->data->email?></td>
                         <td>아이디</td> <td ><?=$this->data->member_id?></td>
                     </tr>
                     <tr style = 'border: 1px; border-style: solid; border-color: black;'>
                         <td colspan = 4>문의 내용</td>
                    </tr>
                    <tr style = 'border: 1px; border-style: solid; border-color: black;'>
                        <td colspan = 4><?echo $this->data->content?></td>
                    </tr>
                    <tr style = 'border: 1px; border-style: solid; border-color: black;'>
                        <td colspan = 4>문의 답변</td>
                    </tr>
                    <?if(!$this->data->ifread){?>
                        <tr style = 'border: 1px; border-style: solid; border-color: black;'>
                            <td colspan = 4><textarea id = 'content'></textarea></td>
                            <input type = 'hidden' id = 'qna_idx' value = '<?=$this->data->qna_idx?>'>
                            <input type = 'hidden' id = 'member_idx' value = '<?=$this->data->member_idx?>'>
                        </tr>
                          <tr style = 'border: 1px; border-style: solid; border-color: black;'>
                            <td colspan="4"><button type="button" class="btn" id = 'write_qna'>등록</button>
                           </tr>
                    <?}else{?>
                        <tr>
                            <td style = 'border: 1px; border-style: solid; border-color: black;' colspan = 4><?echo $this->data->ifread?></td>
                        </tr>
                    <?}?>

                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

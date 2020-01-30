<section>
    <article class="title">
        <span>신고내역</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="50%"/>
                        <col width="50%"/>


                    </colgroup>
                    <tbody>
                        <tr>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'>신고 한 사람</td>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'><?=$this->data->member_name?></td>
                        </tr>
                        <tr>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'>신고 당한 사람</td>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'><?=$this->data->member?></td>
                        </tr>
                        <tr>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'>신고 이유</td>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'><?=$this->data->excuse?></td>
                        </tr>

                        <tr>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'>내용</td>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'><?=$this->data->content?></td>
                        </tr>
                        <tr>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'>횟수</td>
                            <td style = 'border: 1px; border-style: solid; border-color: black;'><?=$this->data->count?></td>
                        </tr>

                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

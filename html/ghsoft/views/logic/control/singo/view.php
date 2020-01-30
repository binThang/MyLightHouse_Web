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
                        <col width="20%"/>
                        <col width="60%"/>
                        <col width="20%"/>
                    </colgroup>
                    <tbody>
                        <tr><td>신고 당한 사람</td><td><?=$this->data->member?></td></tr>
                        <tr><td>신고 이유</td><td><?=$this->data->text?></td></tr>
                        <tr><td>내용</td><td><?=$this->data->content?></td></tr>
                        <tr><td>횟수</td><td><?=$this->data->count?></td></tr>

                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

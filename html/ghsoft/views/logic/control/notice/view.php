<section>
    <article class="title">
        <span>공지사항</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="20%"/>
                        <col width="80%"/>

                    </colgroup>
                    <tbody>
                        <tr><td style = 'border: 1px; border-style: solid; border-color: black;'>제목</td><td style = 'border: 1px; border-style: solid; border-color: black;'><?=$this->data->title?></td></tr>
                        <tr><td style = 'border: 1px; border-style: solid; border-color: black;'>내용</td><td style = 'border: 1px; border-style: solid; border-color: black;'><?=$this->data->content?></td></tr>
                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

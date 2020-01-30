<section>
    <article class="title">
        <span>멤버 <?=($this->type->method=='write')?'등록':'수정';?></span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
        <form action="/admin/<?=$this->type->class;?>/<?=($this->type->method=='write')?'insert':'update';?>" data-success="/admin/<?=$this->type->class;?>/list/<?=$this->page?>">
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
                            <th class="center middle"><label for="form_id">아이디</label></th>
                            <td class="center middle"><input type="text" id="form_id" name="id" value="<?=$this->data->member_id;?>" class="req" required="required" <?=($this->data)?'readonly="readonly"':'';?>></td>
                        </tr>
                            <tr>
                                <th class="center middle"><label for="form_id">아이디</label></th>
                                <td class="center middle">
                                    <select name="type" class="req" required="required">
                                        <option value="7" <?=($this->data->member_type==7)?'selected="true"':'';?>>A급 관리자</option>
                                        <option value="5" <?=($this->data->member_type==5)?'selected="true"':'';?>>B급 관리자</option>
                                        <option value="3" <?=($this->data->member_type==3)?'selected="true"':'';?>>C급 관리자</option>
                                        <option value="1" <?=($this->data->member_type==1)?'selected="true"':'';?>>D급 관리자</option>
                                    </select></td>
                            </tr>
                        <tr>
                            <th class="center middle"><label for="form_name">이름</label></th>
                            <td class="center middle"><input type="text" id="form_name" name="name" value="<?=$this->data->member_name;?>" class="req" required="required"></td>
                        </tr>
                        <tr>
                            <th class="center middle"><label for="form_pass">비밀번호</label></th>
                            <td class="center middle"><input type="password" id="form_pass" minlength="8" name="pass" <?=($this->data)?'':'class="req" required="required"';?> placeholder="8자 이상 입력하세요"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="button" id="write_btn" class="btn">등록</button>
                            <button type="submit" class="hidden"></button></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>
    </article>
</section>

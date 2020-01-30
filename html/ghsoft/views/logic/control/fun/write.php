<section>
    <article class="title">
        <span>뻔해도 좋은</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
        <form action="/admin/<?=$this->type->class;?>/<?=($this->type->method=='write')?'insert':'update';?>"   data-success="/admin/<?=$this->type->class;?>/list/<?=$this->page?>" id = 'form' method = 'post'>
            <input type="hidden" name="idx" value="<?=$this->idx;?>">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="33%"/>
                        <col width="33%"/>
                        <col width="33%"/>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td colspan = 3> 400px * 400px 사이즈로 입력해주세요</td>
                        </tr>
                      <tr>
                        <td><label><input type="radio" name = 'kind' checked value = '1' id = 'novideo'>명언</label>
                        <td><label><input type="radio" name = 'kind' value = '2' id = 'novideo_'>글귀</label>
                        <td><label><input type="radio" name = 'kind' value = '3' id = 'videoradio'>영상</label>
                       </tr>
                       <tr>
                         <td>
                          <!-- <div class = 'editor' contenteditable="true">
                          </div> -->
                          <div id = 'imgzone'>

                          </div>
                        </td>
                      </tr>

                       <tr>
                        <td colspan = '3'>
                        <button type = 'button' id = 'photo'><img src = '/public/logic/control/img/camera.png'></button>
                        </td>
                      </tr>
                      <input type = 'file' id = 'file1' class = 'hidden' multiple>
                      <tr>
                         <td>영상 URL </td> <td colspan = '2'><input type = 'text' id = 'video' name = 'video' disabled></td>
                     </tr>
                      <tr>
                        <td colspan="3"><button type="button" id="write_btna" class="btn">등록</button>
                        <!-- <button type="submit"  id="write_btn" class="hidden"></button></td> -->
                       </tr>
                   </tbody>
                </table>
            </fieldset>
            </form>
    </article>
</section>

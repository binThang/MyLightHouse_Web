<section>
    <article class="title">
        <span>뻔해도 좋은</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
            <input type="hidden" name="idx" value="<?=$this->idx;?>">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="20%"/>
                        <col width="20%"/>
                        <col width="20%"/>
                        <col width="20%"/>
                        <col width="20%"/>
                    </colgroup>
                    <tbody>
                       <tr>
                         <td>
                          <!-- <div class = 'editor' contenteditable="true">
                          </div> -->
                          <div id = 'imgzone'>

                          </div>
                        </td>
                      </tr>

                       <tr>
                        <td colspan = '5'>
                        <button type = 'button' id = 'backphoto'><img src = '/public/logic/control/img/camera.png'></button>
                        </td>
                      </tr>
                      <input type = 'file' id = 'backfile' class = 'hidden'>
                      <tr>
                        <td colspan="5"><button type="button" id="write_btnaa" class="btn">등록</button>
                       </tr>
                      <tr>
                          <td>사진첩 리스트</td>
                      </tr>

                   </tbody>
                </table>
            </fieldset>
            <form action="/admin/<?=$this->type->class;?>/insert"   data-success="/admin/<?=$this->type->class;?>/list/<?=$this->page?>" id = 'form' method = 'post'>

            </form>
    </article>
</section>

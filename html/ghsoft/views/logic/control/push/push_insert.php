<section>
    <article class="title">
        <span>푸시 등록</span>
    </article>
    <article id="<?=$this->type->class;?>a" class="write">
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
                         <td>푸시</td> <td><input type = 'text' id = 'title'></td>
                     </tr>
                     <tr>
                       <td colspan = '2'>
                        <!-- <div class = 'editor' contenteditable="true">
                        </div> -->
                        <div id = 'imgzone'>

                        </div>
                      </td>
                     </tr>

                     <tr>
                      <td colspan = '2'>
                          <input type = 'file' id = 'filepush' class = 'hidden' multiple>
                      <button type = 'button' id = 'photopush'><img src = '/public/logic/control/img/camera.png'></button>
                      </td>
                     </tr>
                      <tr>
                        <td colspan="2"><button type="button" id="write_push" class="btn">등록</button>
                       </tr>
                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

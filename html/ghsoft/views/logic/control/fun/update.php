<?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);
?>
<section>
    <article class="title">
        <span>뻔해도 좋은</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
        <form action="/admin/<?=$this->type->class;?>/<?=($this->type->method=='write')?'insert':'update';?>"   data-success="/admin/<?=$this->type->class;?>/list/<?=$this->page?>" id = 'form' method = 'post'>
            <input type="hidden" name="idx" value="<?=$this->idx;?>">
            <input type="hidden" name="funboard_idx" value="<?=$array[5]?>">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <!-- <colgroup>
                        <col width="33%"/>
                        <col width="33%"/>
                        <col width="33%"/>
                    </colgroup> -->
                    <tbody>
                      <tr>
                        <td><label><input type="radio" name = 'kind' <?if($this->data->list->kind == 1){?> checked <?}?> value = '1' id = 'novideo'>명언</label>
                        <td><label><input type="radio" name = 'kind' <?if($this->data->list->kind == 2){?> checked <?}?>  value = '2' id = 'novideo_'>글귀</label>
                        <td><label><input type="radio" name = 'kind' <?if($this->data->list->kind == 3){?> checked <?}?>  value = '3' id = 'videoradio'>영상</label>
                       </tr>
                       <!-- <div class = 'editor' contenteditable="true">
                       </div> -->
                       <tr class = 'imgdiv'><td>이전 파일 : </td></tr>
                       <tr class = 'imgdiv'>
                          <?if($this->data->list->images){?>
                                <?$images = explode(',',$this->data->list->images);
                                $i = 0; while($images[$i]){?>
                                <td><img class = 'click' src = '/public/uploads/mobile/image/<?=$images[$i]?>'>
                                <input type = 'hidden' class = 'img' name = 'img[]' value ='<?=$images[$i]?>'></td>
                          <?$i++;}
?>
                            <?}?>
                        </tr>
                        <tr><td> 새로운 파일 : </td></tr>
                        <tr>
                            <td>
                                <div id = 'imgzone'>

                                </div>
                            </td>
                        </tr>
                    <tr>
                        <td colspan = '3'>
                        <button type = 'button' id = 'photo'><img src = '/public/logic/control/img/camera.png'></button>
                        </td>
                    </tr>
                      <input type = 'file' id = 'file' class = 'hidden' multiple>
                      <tr>
                         <td>영상 URL </td> <td colspan = '2'><input type = 'text' id = 'video' <?if($this->data->list->kind != 3){?>
                             disabled <?}else{?> value = '<?=$this->data->list->video?>'<?}?>></td>
                     </tr>
                      <tr>
                        <td colspan="3"><button type="button" id="write_btna" class="btn" data-kind = 'update'>등록</button>
                        <!-- <button type="submit"  id="write_btn" class="hidden"></button></td> -->
                       </tr>
                   </tbody>
                </table>
            </fieldset>
            <input type = 'hidden' name = 'funboard_idx' value = '<?=$array[5]?>'>
        </form>
    </article>
</section>

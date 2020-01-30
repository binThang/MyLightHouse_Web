<?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);
?>
<section>
    <article class="title">
        <span>도와주신 분, 종료 이미지</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
        <form action="/admin/<?=$this->type->class;?>/<?=($this->type->method=='write')?'insert':'update';?>"   data-success="/admin/<?=$this->type->class;?>/list/<?=$this->page?>" id = 'form' method = 'post'>
            <input type="hidden" name="idx" value="<?=$this->idx;?>">
            <input type="hidden" name="funboard_idx" value="<?=$array[5]?>">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                        <tr>
                            <td>도와주신 분</td> <td>종료 이미지</td>
                        </tr>
                        <tr>
                            <td> 1080px * 1920px 사이즈로 입력해주세요</td>
                            <td> 400px * 400px 사이즈로 입력해주세요</td>
                        </tr>
                        <tr>
                            <td>
                                <div id = 'imgzone1'>
                                    <img src = '/public/uploads/web/image/<?=$this->data->list->img1?>'>
                                </div>
                            </td>
                            <td>
                                <div id = 'imgzone2'>
                                    <img src = '/public/uploads/web/image/<?=$this->data->list->img2?>'>
                                </div>
                            </td>
                        </tr>
                    <tr>
                        <td>
                            <button type = 'button' id = 'photo1'><img src = '/public/logic/control/img/camera.png'></button>
                        </td>
                        <td>
                            <button type = 'button' id = 'photo2'><img src = '/public/logic/control/img/camera.png'></button>
                        </td>

                    </tr>
                      <input type = 'file' id = 'file1' class = 'hidden' multiple>

                   </tbody>
                </table>
            </fieldset>
            <input type = 'hidden' name = 'funboard_idx' value = '<?=$array[5]?>'>
        </form>
    </article>
</section>

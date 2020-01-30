<section>
    <article class="title">
        <span>뻔해도 좋은</span>
    </article>
    <article id="<?=$this->type->class;?>" class="write">
            <fieldset>
                <legend class="blind">등록 폼 형식</legend>
                <table>
                    <caption class="blind">등록 폼</caption>
                    <colgroup>
                        <col width="100%"/>
                    </colgroup>
                    <tbody>
                        <?if($this->data->list->kind != 3){
                            $images = explode(',',$this->data->list->images);
                                $i = 0; while($images[$i]){?>
                                <tr>
                                    <td><img src = '/public/uploads/mobile/image/<?=$images[$i]?>'></td>
                                </tr>
                            <?$i++;}
                        }
                        else{
                            // $video = substr($this->data->list->video,32);

                            $video = substr($this->data->list->video,17);
                            ?>
                            <div class=" relative">
                                <iframe id="player" type="text/html" width="100%" height="700px" src="http://www.youtube.com/embed/<?=$video?>" frameborder="0"></iframe>
                            </div>

                        <?}?>

                   </tbody>
                </table>
            </fieldset>
    </article>
</section>

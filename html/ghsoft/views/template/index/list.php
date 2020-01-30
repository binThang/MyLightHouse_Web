<section>
    <article class="title">
        <span><?=$this->caption;?></span>
    </article>
    <?=$search;?>
    <article id="<?=$this->type->class;?>" class="list">
        <?=$this->content;?>
        <?=$this->pagination;?>
    </article>
</section>

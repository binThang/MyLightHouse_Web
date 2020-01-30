<aside>
    <div class="profile-group center">
        <img src="/public/template/control/img/admin2.png" alt="관리자 아이콘">
        <p><?=$this->admin_type;?></p>
    </div>
    <!--S:admin gnb-->
    <div class="gnb">
        <?php
        foreach ($this->menu as $key => $value) {
            if($value->type==$_SESSION['admin_type']){
            ?>
            <button type="button" class="center"><?=$value->title?></button>
            <ul class="center">
                <?php
                foreach ($value->content as $arr) {
                ?>
                <li><a href="/admin/<?=$arr->link;?>" class="left ajax"><?=$arr->title;?></a></li>
                <?php
                } ?>
            </ul>
            <?php
            }
        }
        ?>
    </div>
</aside>

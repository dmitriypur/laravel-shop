<li class="has-submenu">
    <a href="?id=<?=$id;?>"><?=$category['title'];?></a>
    <?php if(isset($category['childs'])):?>
        <ul class="submenu-nav submenu-nav-mega column-3">
            <?=$this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif;?>
</li>
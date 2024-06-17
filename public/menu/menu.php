<?php
$parent = isset($category['childs']);
?>
<li class="<?= $parent ? 'has-submenu' : ''?>">
    <a href="<?=PATH; ?>/category/<?=$category['alias'];?>"><?=$category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul class="<?= $parent ? 'submenu-nav' : ''?>">
            <?=$this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif;?>
</li>

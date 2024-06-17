<?php
$parent = isset($category['childs']);
?>
<li class="<?= $parent ? 'menu-item-has-children' : ''?>">
    <?php if($parent): ?>
        <span class="mobile-menu-expand"></span>
    <?php endif; ?>
    <a href="<?=PATH; ?>/category/<?=$category['alias'];?>"><?=$tab . $category['title'];?></a>
    <?php if($parent):?>
        <ul class="<?= $parent ? 'sub-menu' : ''?>">
            <?=$this->getMenuHtml($category['childs'], $tab . '&#160;&#160;&#160;&#160;&#160;');?>
        </ul>
    <?php endif;?>
</li>

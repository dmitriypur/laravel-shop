<?php
$parent = isset($category['childs']);

?>
<!--<li class="cat-item">
    <a href="<?php /*=PATH; */?>/category/<?php /*=$category['alias'];*/?>">
        <?php /*=$tab . $category['title'];*/?>
        <?php /*= isset($category['childs']) ? '<span class="toggle-sub-menu">+</span>' : ''; */?>
    </a>

    <?php /*if(isset($category['childs'])): */?>

        <ul class="<?php /*= $parent ? 'submenu-sb' : ''*/?>">
            <?php /*=$this->getMenuHtml($category['childs'], $tab . '.&#160;');*/?>
        </ul>
    <?php /*endif;*/?>
</li>-->
<?php foreach($category['childs'] as $item): ?>
    <li class="<?= $parent ? 'menu-item-has-children' : ''?>">
        <a href="<?= PATH;?>/category/<?=$item['alias'];?>"><?=$item['title'];?></a>
    </li>
<?php endforeach; ?>
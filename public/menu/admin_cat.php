<?php
$parent = isset($category['childs']);
if(!$parent){
    $delete = '<a href="' . ADMIN . '/category/delete?id=' . $id . '" class="text-danger delete"><i class="fas fa-times"></i></a>';
}else{
    $delete = '<i class="fas fa-times text-gray"></i>';
}
?>
<p class="item-p">
    <a href="<?=ADMIN?>/category/edit?id=<?=$id?>" class="list-group-item"><?=$tab . $category['title']?></a>
    <span><?=$delete?></span>
</p>
<?php if($parent): ?>
    <div class="list-group">
        <?=$this->getMenuHtml($category['childs'], $tab . '&#160;&#160;&#160;&#160;&#160;'); ?>
    </div>
<?php endif; ?>
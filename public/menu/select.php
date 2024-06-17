<?php
$parent = \ishop\App::$app->getProperty('parent_id') ?: '';
$select = $id == $parent ? ' selected' : '';
$disabled = isset($_GET['id']) && $id == $_GET['id'] ? ' disabled' : '';
?>

<option value="<?=$id;?>"<?=$select?><?=$disabled?>><?= $tab . '&#160;' . $category['title'];?></option>
<?php if(isset($category['childs'])): ?>
    <?=$this->getMenuHtml($category['childs'], $tab . '-');?>
<?php endif;?>
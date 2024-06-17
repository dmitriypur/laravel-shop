<?php if ($products): ?>
    <?php foreach ($products as $product): ?>
        <?php
        $art = '<span>(YS-' . $product['id'] . ')</span>';
        ?>
        <li data-id="<?= $product['id'] ?>"><a href="<?= PATH ?>/product/<?= $product['alias'] ?>"><?= upper($product['title']) ?> <?=$art?></a></li>
    <?php endforeach; ?>
<?php else:?>
    <p>Ничего не нашли</p>
<?php endif; ?>
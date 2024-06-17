<?php if(!empty($_SESSION['cart'])): ?>
    <ul class="aside-cart-product-list">
    <?php foreach ($_SESSION['cart'] as $id => $item):?>
        <li class="product-list-item">
            <a href="#" data-id="<?=$id;?>" data-cart="modal" class="remove text-danger">×</a>
            <a href="<?= PATH ?>/product/<?= $item['alias']; ?>">
                <img src="<?= PATH ?>/<?= $item['img']; ?>" width="90" height="110" alt="Image-HasTech">
                <span class="product-title"><?= upper($item['title']); ?></span>
            </a>
            <span class="product-price"><?= $item['qty'] . ' × '. number_format($item['price'], 0, '', ' '); ?>р.</span>
        </li>
    <?php endforeach; ?>
    </ul>
    <p class="cart-qty"><span>Кол-во: </span><span class="cart-qty-count"><?=$_SESSION['cart.qty']; ?></span></p>
    <p class="cart-total"><span>Сумма:</span><span class="amount"><?=number_format($_SESSION['cart.sum'], 0, '', ' '); ?>р.</span></p>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif;?>

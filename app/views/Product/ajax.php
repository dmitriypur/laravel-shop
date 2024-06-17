<div class="col-lg-6 col-md-6 col-12">
    <div class="thumb">
        <picture>
            <source srcset="<?= PATH ?>/<?= toWebp($product['img']) ?>" type="image/webp">
            <img src="<?= PATH ?>/<?= $product['img'] ?>" width="570" height="541" alt="<?= $product['title']?>-<?= $product['id'] ?>">
        </picture>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-12">
    <div class="content">
        <h4 class="title"><?=$product['title']?> <span>(Арт: YS-<?=$product['id']?>)</span></h4>
        <div class="prices">
            <?php if ($product['old_price']): ?>
            <del class="price-old"><?=$product['old_price']?> р</del>
            <?php endif; ?>
            <span class="price"><?=$product['price']?> р</span>
        </div>
        <div class="quick-view-select">
            <div class="quick-view-select-item">
                <label for="forSize" class="form-label">Размер:</label>
                <select class="form-select" id="forSize" name="mod-size" required>
                    <?php foreach ($attrs as $item): ?>
                        <option class="size-item" data-title="<?= $item['value'] ?>" data-id="<?= $item['id'] ?>" value="<?= $item['id'] ?>"><?= $item['value'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="action-top">
            <div class="pro-qty">
                <input type="text" id="quantity20" title="Quantity" name="qty" value="1"/>
            </div>
            <a rel="nofollow" class="btn btn-black add-cart" data-id="<?= $product['id']; ?>"
               href="<?= PATH ?>/cart/add?id=<?= $product['id']; ?>">В корзину</a>
        </div>
    </div>
</div>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказ</title>
</head>
<body>
<h1>Ваш заказ в магазине <?= \ishop\App::$app->getProperty('shop_name') ?></h1>
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <td>Название</td>
        <td>Цена</td>
        <td>Кол-во</td>
    </tr>
    <?php foreach ($_SESSION['cart'] as $item): ?>
        <tr>
            <td><?= $item['title'] ?></td>
            <td><?= $item['price'] ?></td>
            <td><?= $item['qty'] ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td>Сумма: <?= $_SESSION['cart.sum']; ?></td>
    </tr>
</table>
<p>Спасибо за ваш заказ. В ближайшее время наш менеджер свяжется с вами</p>

</body>
</html>
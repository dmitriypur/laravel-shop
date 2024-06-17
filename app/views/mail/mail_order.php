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
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <td>Название</td>
        <td>Цена</td>
        <td>Кол-во</td>
    </tr>
    <?php foreach ($_SESSION['cart'] as $item): ?>
        <tr>
            <td><?=$item['title']?></td>
            <td><?=$item['price']?></td>
            <td><?=$item['qty']?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td>Сумма: <?= $_SESSION['cart.sum']; ?></td>
    </tr>
</table>
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <td>Имя</td>
        <td>Телефон</td>
        <td>email</td>
    </tr>
        <tr>
            <td><?= $_SESSION['user']['name']?></td>
            <td><?= $_SESSION['user']['phone']?></td>
            <td><?= $_SESSION['user']['email']?></td>
        </tr>
</table>
</body>
</html>
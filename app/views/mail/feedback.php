<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сообщение с сайта</title>
</head>
<body>
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <td >Имя</td>
        <td>Телефон</td>
        <td>E-mail</td>
        <td>Сообщение</td>
    </tr>
    <tr>
        <td><?= $_SESSION['message']['name'] ?></td>
        <td><?= $_SESSION['message']['phone'] ?></td>
        <td><?= $_SESSION['message']['email'] ?></td>
        <td><?= $_SESSION['message']['text'] ?></td>
    </tr>
</table>
</body>
</html>
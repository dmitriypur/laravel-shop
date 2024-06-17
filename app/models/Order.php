<?php

namespace app\models;

use ishop\App;
use PHPMailer\PHPMailer\PHPMailer;
use RedBeanPHP\R;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class Order extends AppModel
{

    public array $attributes = [
        'user_id' => '',
        'note' => '',
        'payment' => '',
        'shipping' => '',
    ];

    public function saveOrder($data){
        foreach($data as $name => $value){
            $this->attributes[$name] = $value;
        }
        $order_id = $this->save('order');
        self::saveOrderProduct($order_id);
        return $order_id;
    }

    public static function saveOrderProduct($order_id){
        $sql_part = '';
        foreach($_SESSION['cart'] as $product_id => $product){
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}),";
        }
        $sql_part = rtrim($sql_part, ',');

        R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sql_part");
    }

    public static function mailOrder($order_id, $user_email){
        $smtp = "smtp://my-ishop@yandex.ru:vykgolmqyvzvygcy@smtp.yandex.ru:587";
        $transport = Transport::fromDsn($smtp);
        $mailer = new Mailer($transport);

        ob_start();
        require APP . "/views/mail/mail_order.php";
        $body = ob_get_clean();

        ob_start();
        require APP . "/views/mail/mail_client.php";
        $body_client = ob_get_clean();

        $email = (new Email())
            ->from(new Address(App::$app->getProperty('smtp_login'), App::$app->getProperty('shop_name')))
            ->to(App::$app->getProperty('admin_email'))
            ->subject("Заказ в магазине Боцы. Номер заказа {$order_id}")
            ->text('Лови писмецо!!!')
            ->html("$body");

        $email_client = (new Email())
            ->from(new Address(App::$app->getProperty('smtp_login'), App::$app->getProperty('shop_name')))
            ->to($user_email)
            ->subject("Заказ в магазине Боцы. Номер заказа {$order_id}")
            ->text('Лови писмецо!!!')
            ->html("$body_client");

        $mailer->send($email);
        $mailer->send($email_client);

        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);

        $_SESSION['success'] = "Спасибо за ваш заказ. В ближайшее время наш менеджер свяжется с вами";
    }

}
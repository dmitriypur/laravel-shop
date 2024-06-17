<?php

namespace app\models;

use ishop\App;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class Mail extends AppModel
{
    public array $attributes = [
        'name' => '',
        'phone' => '',
        'email' => '',
        'text' => '',
    ];

    public array $rules = [
        'required' => [
            ['phone'],
            ['name'],
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['name', 2],
            ['phone', 5]
        ],
        'numeric' => [
            ['phone']
        ]
    ];

    public static function send($data)
    {
        $smtp = "smtp://my-ishop@yandex.ru:vykgolmqyvzvygcy@smtp.yandex.ru:587";
        $transport = Transport::fromDsn($smtp);
        $mailer = new Mailer($transport);

        ob_start();
        require APP . "/views/mail/feedback.php";
        $body = ob_get_clean();

        $email = (new Email())
            ->from(new Address(App::$app->getProperty('smtp_login'), App::$app->getProperty('shop_name')))
            ->to(App::$app->getProperty('admin_email'))
            ->subject("Сообщение со страницы Контакты")
            ->text('Лови писмецо!!!')
            ->html("$body");

        $mailer->send($email);
        echo json_encode(['success' => "Ваше сообщение отправлено!"]);
    }
}
<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);
if (stristr($uri, '/public/') == TRUE) {

    if (file_exists(__DIR__ . '/public' . $uri)) {

    } else {

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $actual_link = str_replace('public/', '', $actual_link);
        header("HTTP/1.0 404 Not Found");
        header("Location: " . $actual_link . "",true, 301);
        exit();
        return false;
    }
}

new \ishop\App();
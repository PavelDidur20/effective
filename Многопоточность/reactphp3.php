<?php
require __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;
use React\Http\Browser;

$loop = Loop::get();
$client = new Browser($loop);

echo "Отправляем запрос…\n";

$client->get('https://jsonplaceholder.typicode.com/todos/1')
    ->then(function (Psr\Http\Message\ResponseInterface $response) {
        echo "Код ответа: ", $response->getStatusCode(), "\n";
        echo "Тело:\n", (string)$response->getBody(), "\n";
    }, function (Exception $e) {
        echo "Ошибка: ", $e->getMessage(), "\n";
    });

$loop->run();

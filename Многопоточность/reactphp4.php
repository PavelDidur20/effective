<?php
require __DIR__ . '/../vendor/autoload.php';

use React\EventLoop\Loop;
use React\Http\Browser;
use React\Promise\PromiseInterface;

$loop   = Loop::get();
$client = new Browser($loop);

$urls = [
    'https://catfact.ninja/fact',
    'https://jsonplaceholder.typicode.com/posts/2',
    'https://jsonplaceholder.typicode.com/posts/3',
];

$promises = [];
foreach ($urls as $u) {
    $promises[] = $client->get($u)
        ->then(fn($response) => [
            'url'    => $u,
            'status' => $response->getStatusCode(),
        ]);
}

\React\Promise\all($promises)
    ->then(function (array $results) {
        foreach ($results as $r) {
            echo "{$r['url']} → {$r['status']}\n";
        }
    }, function($e) {
        echo "Ошибка: {$e}\n";
    });

$loop->run();

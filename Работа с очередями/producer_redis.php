<?php
require 'vendor/autoload.php';

$redis = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'redis',
    'port'   => 6379,
]);

$queueName = 'my_queue';

$message = [
    'id' => uniqid(),
    'text' => 'Блаблабла' . date('Y-m-d H:i:s'),
    'created_at' => time()
];

$redis->rpush($queueName, json_encode($message));

echo "Сообщение отправлено в очередь:\n";
print_r($message);
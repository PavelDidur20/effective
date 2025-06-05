<?php
require 'vendor/autoload.php';

$redis = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'redis',
    'port'   => 6379,
]);

$queueName = 'my_queue';

echo "Ожидание сообщений в очереди '$queueName'...\n";

while (true) {

    $message = $redis->blpop($queueName, 0);
    

    $data = json_decode($message[1], true);
    
    echo "\n Получено сообщение:\n";
    print_r($data);
    
    echo "Обработка сообщения ID: {$data['id']}...\n";
 
    
    echo "Сообщение ID: {$data['id']} успешно обработано\n";
}
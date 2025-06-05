<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;



$host = 'rabbitmq';        
$port = 5672;              
$user = 'guest';           
$pass = 'guest';           
            

$connection = new AMQPStreamConnection($host, $port, $user, $pass );
$channel = $connection->channel();

$callback = function (AMQPMessage $msg) {
  global $channel;
  echo 'Сообщение получено и записано в лог', $msg->body, "\n";
  file_put_contents(__DIR__ . '/rabbitmq_consumer.log', $msg->body, FILE_APPEND);
  $channel->basic_ack($msg->delivery_info['delivery_tag']);
};

$channel->basic_consume(
    'task_queue',
    '',
    false,
    false,
    false,
    false,
    $callback,
);

while (count($channel->callbacks)) {
    $channel->wait();
}


$channel->close();
$connection->close();
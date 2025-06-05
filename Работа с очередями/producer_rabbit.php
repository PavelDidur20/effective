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
$channel->queue_declare('task_queue', false, false, false, false);

$msg = new AMQPMessage('Сообщение 123');
$channel->basic_publish($msg, '', 'hello');

echo "Сообщение отправлено в RabbitMQ'\n";

$channel->close();
$connection->close();
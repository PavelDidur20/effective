<?php
if (! extension_loaded('swoole')) {
    die("УВвув\n");
}

$http = new Swoole\Http\Server("0.0.0.0", 9501);

$http->on('request', function ($req, $res) {
    $res->header("Content-Type", "text/plain");
    $res->end("Привет от swool, это неблокирующий ответ\n");
});

$http->start();

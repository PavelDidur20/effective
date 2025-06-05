<?php
if (! extension_loaded('swoole')) {
    die("цувцувn");
}
Swoole\Timer::tick(5000, function($timerId) {
    echo "[{$timerId}] Привет " . date('H:i:s') . "\n";
});

Swoole\Event::wait();

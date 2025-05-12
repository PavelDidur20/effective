<?php
namespace Zadacha1;
trait Loggable {
    public function log(string $message): void {
        echo "[LOG]: {$message}\n";
    }
}
<?php
namespace App\Traits;
trait Logger
{
    public function log(string $message)
    {
        echo $message;
    }
}
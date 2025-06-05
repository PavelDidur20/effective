<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Core/bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function($t){
    $t->increments('id');
    $t->string('name');
    $t->string('email');
    $t->string('password');
    $t->timestamps();
});
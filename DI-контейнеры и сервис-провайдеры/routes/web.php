<?php
namespace App\Routes;

use App\Models\User;
use App\Controllers\UserController;
use App\Core\Container;
use App\Providers\UserServiceProvider;

return  [

       'users' => function()
    {
        $container = new Container();
        $container->set(UserServiceProvider::class, fn($c) => new UserServiceProvider($c));

        
        $userController = new UserController($container);
        $userController->show();
        
    },
    
    'add_user' => function()
    {
        
        User::updateOrCreate([
            'name' => 'Vasya',
            'email' => 'vasya@email.ru',
            'password' => password_hash('1111', PASSWORD_DEFAULT),
        ]);
    }
    
];
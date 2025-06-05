<?php
namespace App\Routes;

use App\Models\User;


return  [
    'users' => function()
    {
        $userController =  new \App\Controllers\UserController();
        $userController->show();
    },
    
    'users1' => function()
    {
        $userController = new \App\Controllers\UserController();
        $userController->showWithService();
        
    },

       'users2' => function()
    {
        $userController = new \App\Controllers\UserController();
        $userController->showWithDIandRepository();
        
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
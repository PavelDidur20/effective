<?php
namespace App\Controllers;

use App\Core\View;
use App\Services\UserService;
use App\Repositories\UserRepository;

class UserController
{
    public function __construct()
    {

    }

    public function show()
    {
        $users = \App\Models\User::getAll();
        $title = 'Main Title';
        View::render("users", ['users' => $users, 'title' => $title]);
    }

    public function showWithService()
    {
        $users = UserService::getUsers();
        View::render("users", ['users' => $users, 'title' => 'smthing']);   
    }

    public function showWithDIandRepository()
    {
        $service = new UserService(new UserRepository());
        View::render("users",['users' => $service->getUsersWithRepository(), 'title' => 'smthing'] );
    }

}
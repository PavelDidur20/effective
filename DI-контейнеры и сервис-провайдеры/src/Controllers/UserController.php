<?php
namespace App\Controllers;

use App\Core\View;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserService;
use App\Repositories\UserRepository;
use App\Core\Container;
use App\Providers\UserServiceProvider;

class UserController
{
    private $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function show()
    {
        $this->container->get(UserServiceProvider::class);
        $service = $this->container->get(UserService::class);
        $users = $service->getUsers();
        
        View::render("users",['users' => $users, 'title' => 'smthing'] );
    }

}
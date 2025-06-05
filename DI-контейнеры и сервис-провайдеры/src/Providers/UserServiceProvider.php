<?php
namespace App\Providers;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Core\Container;
use App\Services\UserService;

class UserServiceProvider
{
    public function __construct (Container $container)
    {
        $container->set(UserRepositoryInterface::class, 
                                fn() => new UserRepository());


        $container->set(UserService::class, 
            fn() => new UserService($container->get(UserRepositoryInterface::class)));
    }
}

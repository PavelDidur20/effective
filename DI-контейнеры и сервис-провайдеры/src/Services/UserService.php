<?php
namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


class UserService
{

    public function __construct(private UserRepositoryInterface $users)
    {
     
    }
    
    public function getUsers()
    {
        return $this->users->getAll();
    }
}
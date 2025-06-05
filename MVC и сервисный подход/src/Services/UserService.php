<?php
namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


class UserService
{

    public function __construct(private UserRepositoryInterface $users)
    {
     
    }
    
    public static function getUsers(): Collection
    {
        return \App\Models\User::getAll();
    }
    public function getUsersWithRepository()
    {
        return $this->users->getAll();
    }
}
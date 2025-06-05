<?php
namespace App\Repositories;
use App\Models\User;
class UserRepository implements UserRepositoryInterface
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {

        return User::all();
    }
}
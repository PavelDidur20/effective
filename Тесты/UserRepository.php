<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{

    public function getAll(): Collection
    {
        return User::all();
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
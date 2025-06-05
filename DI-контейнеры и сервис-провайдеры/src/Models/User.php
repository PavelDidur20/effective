<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $fillable = ['name', 'email', 'password'];
    public static function getAll(): Collection
    {
        return User::all();
    }



} 
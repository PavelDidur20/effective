<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = new \App\Models\User();
        $user->name = "Иван";
        $user->email = "ivan@example.com";
        $user->password = bcrypt("secret");
        $user->save();
        return $user->name . "Записан успешно";
    }
}

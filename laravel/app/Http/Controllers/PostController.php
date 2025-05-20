<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
      $post = \App\Models\Post::find(1);
        return "Имя автора поста " . $post->user->name;
    }
}

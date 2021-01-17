<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Post;

class PostController extends Controller
{
    public function post(Post $post){

        return view('user.post', \compact('post'));
    }
}

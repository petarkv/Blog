<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Post;
use App\Model\User\Category;
use App\Model\User\Tag;


class HomeController extends Controller
{
    public function index(){

        $posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(3);
        return view('user.blog', \compact('posts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blog',\compact('posts'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts();
        return view('user.blog',\compact('posts'));
    }
}

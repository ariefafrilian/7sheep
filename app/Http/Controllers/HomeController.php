<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        if ($request->ajax()) {
            return 'ajax';
        } else {
            $posts = Post::latest()->take(20)->get();
            return view('home', compact('posts'));
        }
    }
}

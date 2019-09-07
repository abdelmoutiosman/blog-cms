<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function __construct(){
        $this->middleware(['auth','verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function index()
//    {
//        return view('home');
//    }
    public function dashboard()
    {
        $category=Category::all();
        $post=Post::all();
        $tag=Tag::all();
        $user=User::all();
        $trashed=Post::onlyTrashed()->get();

        return view('dashboard',compact('category','post','tag','user','trashed'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class SiteUIController extends Controller
{

    public function index()
    {
        $settings=Setting::first();
        $categories=Category::take(4)->get();
        $posts=Post::all();
        $first_post=Post::orderBy('created_at','desc')->first();
        $second_post=Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $third_post=Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
        $fourth_post=Post::orderBy('created_at','desc')->skip(3)->take(1)->get()->first();
        $laravel=Category::find(1);
        $ruby=Category::find(4);
        $flutter=Category::find(3);
        $tags=Tag::all();
        return view('index',compact('settings','categories','posts','first_post','second_post','third_post','fourth_post','laravel','ruby','flutter','tags'));
    }
    public function showPost($slug)
    {
        $post=Post::where('slug',$slug)->first();
        $next_page=Post::where('id','>',$post->id)->min('id');
        $prev_page=Post::where('id','<',$post->id)->max('id');
        $settings=Setting::first();
        $categories=Category::take(4)->get();
        $tags=Tag::all();
        return view('posts.show',compact('post','settings','categories','tags'))->with('next',Post::find($next_page))->with('prev',Post::find($prev_page));
    }
    public function category($id)
    {
        $category=Category::find($id);
        $categories=Category::take(4)->get();
        $posts=Post::find($id);
        $settings=Setting::first();
        $tags=Tag::all();
        return view('categories.category',compact('category','tags','settings','categories','posts'));
    }
    public function tagFunction($id)
    {
        $tag=Tag::find($id);
        $categories=Category::take(4)->get();
        $posts=Post::find($id);
        $settings=Setting::first();
        $tags=Tag::all();
        return view('tags.tag',compact('tag','tags','posts','settings','categories'));
    }
}

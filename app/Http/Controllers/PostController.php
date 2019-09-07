<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Post::all();
        return view('posts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        if($categories->count()==0){
            return redirect()->route('category.create');
        }
        $tags=Tag::all();
        if($tags->count()==0){
            return redirect()->route('tag.create');
        }
        return view('posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required',
                'content'=>'required',
                'category_id'=>'required|exists:categories,id',
                'featured'=>'required|mimes:png,jpeg,jpg',
                'tag'=>'required|array',
            ]);
        if($request->hasFile('featured')) {
            $path = public_path();
            $destinationPath = $path.'/uploads/posts/'; // upload path
            $logo = $request->file('featured');
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $name = time().''. rand(11111, 99999).'.'.$extension; // renameing image
            $logo->move($destinationPath, $name); // uploading file to given path
        }
        $post=Post::create([
            'title'      =>  $request->title,
            'content'    =>  $request->input('content'),
            'category_id'=>  $request->category_id,
            'featured'   =>  'uploads/posts/'.$name,
            'slug'       =>  str_slug($request->title),
            'user_id'    =>  Auth::id()
        ]);
        $post->tags()->attach($request->tag);
        $post->save();
        flash()->success("Added Successfuly");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.edit',compact('model','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $this->validate($request, [
            'title'    => 'required',Rule::unique('posts', 'title')->ignore($post->id),
            'featured' => 'required|mimes:jpeg,jpg,png',
            'tag'=>'required|array',
        ]);
        if($request->hasFile('featured')) {
            if(file_exists($post->featured))
                unlink($post->featured);
            $path = public_path();
            $destinationPath = $path.'/uploads/posts/'; // upload path
            $logo = $request->file('featured');
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111, 99999).'.'.$extension; // renameing imag
            $logo->move($destinationPath, $name);// uploading file to given path
            $post->featured = 'uploads/posts/'.$name;
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->slug = str_slug($request->input('title'));
        $post->tags()->sync($request->tag);
        $post->save();
        flash()->success("Edited Successfuly");
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        flash()->success("Deleted Successfuly");
        return redirect(route('post.index'));
    }
    public function trashed()
    {
        $post=Post::onlyTrashed()->get();
        return view('posts.softdeleted',compact('post'));
    }
    public function hdelete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        if(file_exists($post->featured))
            unlink($post->featured);
        $post->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        flash()->success("Restored Successfuly");
        return redirect(route('post.index'));
    }
}

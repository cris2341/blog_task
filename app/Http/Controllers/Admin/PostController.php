<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.post.index', compact('posts'), compact('categories'));
    }
    public function create()
    {
        $categories = Category::get();
        return view('admin.post.create', compact('categories'));
    }
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        
        $post = new Post;
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->save();

        if($request->input('categories')) :
            $post->categories()->attach($request->input('categories'));
        endif;

        return redirect('admin/posts')->with('message','Post Added Succesfully', $post);
    }

    public function edit($post_id)
    {
        $post = Post::find($post_id);
        $categories = Category::get();
        return view('admin.post.edit',compact('post'),compact('categories'));
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();
        
        $post = Post::find($post_id);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->update();

        $post->categories()->detach();
        if($request->input('categories')) :
            $post->categories()->attach($request->input('categories'));
        endif;

        return redirect('admin/posts')->with('message','Post Updated Succesfully', $post);
    }
    
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        if($post)
        {
            $post->delete();
            return redirect('admin/posts')->with('message','Post Deleted Succesfully');
        }
        else 
        {
            $post->delete();
            return redirect('admin/posts')->with('message','No Post Id Found');
        }
    }

}

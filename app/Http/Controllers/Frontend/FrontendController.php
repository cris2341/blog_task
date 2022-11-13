<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function all_posts()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(3);
        return view('frontend.post.all_posts',compact('posts'));
    }

    public function viewCategoryPost($category_id)
    {
        $category = Category::where('id',$category_id)->first();
        if($category)
        {
            $category_posts = $category->posts()->paginate(3);
            return view('frontend.post.index',compact('category','category_posts'));
        }
        else
        {
            return redirect('/');
        }
    }
}

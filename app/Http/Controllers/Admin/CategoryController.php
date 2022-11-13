<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->save();

        return redirect('admin/category')->with('message','Category Added Succesfully');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->update();

        return redirect('admin/category')->with('message','Category Updated Succesfully');
    }

    public function destroy($category_id)
    {
        $category = Category::find($category_id);
        if($category)
        {
            $category->delete();
            return redirect('admin/category')->with('message','Category Deleted Succesfully');
        }
        else 
        {
            $category->delete();
            return redirect('admin/category')->with('message','No Category Id Found');
        }
    }
    
}

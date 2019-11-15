<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('backend.admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191|unique:categories',
        ]);

        if ($request->hasFile('img')) {

            $image = $request->file('img');

            $image_name = strtolower(rand(10000, 999999).'_'.$image->getClientOriginalName());

            Image::make($image)->save(public_path('images/category/'.$image_name));

            $request['image'] = $image_name;
        }

        $request['slug'] = Str::slug($request->name);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('successMsg', 'Category created successfully');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }

    public function changeStatus(Category $category){
        dd($category->toArray());
    }
}

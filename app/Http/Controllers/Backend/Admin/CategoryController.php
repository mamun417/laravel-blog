<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Category;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('posts')->latest()->get();

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
            'img' => 'mimes:jpg,jpeg,bmp,png|max:1024'
        ]);

        $slug = Str::slug($request->name);

        if ($request->hasFile('img')) {

            $image = $request->file('img');

            //image upload for header
            $image_name = CommonController::imageUpload(
                $slug, false, $image,'category', ['width' => '1600', 'height' => '479']
            );

            //image upload for slider
            CommonController::imageUpload(
                $slug = false, $image_name, $image,'category/slider', ['width' => '500', 'height' => '333']
            );

            $request['image'] = $image_name;
        }

        $request['slug'] = $slug;

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('successMsg', 'Category created successfully');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('backend.admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:191|unique:categories,name,'.$category->id,
            'img' => 'mimes:jpg,jpeg,bmp,png|max:200'
        ]);

        $slug = Str::slug($request->name);

        if ($request->hasFile('img')) {

            $image = $request->file('img');

            //image upload for header
            $image_name = CommonController::imageUpload(
                $slug, false, $image,'category', ['width' => '1600', 'height' => '479'], $category->image
            );

            //image upload for slider
            CommonController::imageUpload(
                $slug = false, $image_name, $image,'category/slider', ['width' => '500', 'height' => '333'], $category->image
            );

            $request['image'] = $image_name;
        }

        $request['slug'] = $slug;

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('successMsg', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        // delete old image
        CommonController::deleteImage('category', $category->image);
        CommonController::deleteImage('category/slider', $category->image);

        $category->delete();

        return back()->with('successMsg', 'Category delete successfully');
    }

    public function changeStatus(Category $category){

        $status = $category->status ? 0 : 1;

        $update = $category->update(['status' => $status]);

        return back()->with('successMsg', 'Category publication status changed successfully');
    }

    public function getCategoryList(){

        $term = request('term');

        $categories = Category::where('status', 1)
            ->where('name', 'LIKE', "%$term%")
            ->select('name', 'id')
            ->take(20)->get();

        $new_categories = [];

        foreach ($categories as $category){
            $new_categories[] = ['value' => $category->id, 'text' => $category->name];
        }

        return response()->json($new_categories);
    }
}

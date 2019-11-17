<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
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
            'img' => 'mimes:jpg,jpeg,bmp,png|max:200'
        ]);

        $slug = Str::slug($request->name);

        if ($request->hasFile('img')) {

            $image = $request->file('img');

            $currentDate = Carbon::now()->toDateString();

            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // check is exits directory
            if (!Storage::disk('public')->exists('category')){

                Storage::disk('public')->makeDirectory('category');
            }

            // resize image for category and upload
            $category_image = Image::make($image)->resize(1600, 479)->save();
            Storage::disk('public')->put('category/'.$image_name, $category_image);

            // check is exits directory
            if (!Storage::disk('public')->exists('category/slider')){

                Storage::disk('public')->makeDirectory('category/slider');
            }

            // resize image for category slider and upload
            $slider_image = Image::make($image)->resize(500, 333)->save();
            Storage::disk('public')->put('category/slider/'.$image_name, $slider_image);

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

            $currentDate = Carbon::now()->toDateString();

            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // check is exits directory
            if (!Storage::disk('public')->exists('category')){

                Storage::disk('public')->makeDirectory('category');
            }

            // resize image for category and upload
            $category_image = Image::make($image)->resize(1600, 479)->save();
            Storage::disk('public')->put('category/'.$image_name, $category_image);

            // check is exits directory
            if (!Storage::disk('public')->exists('category/slider')){

                Storage::disk('public')->makeDirectory('category/slider');
            }

            // resize image for category slider and upload
            $slider_image = Image::make($image)->resize(500, 333)->save();
            Storage::disk('public')->put('category/slider/'.$image_name, $slider_image);

            $request['image'] = $image_name;

            // delete old image
            if (Storage::disk('public')->exists('category/'.$category->image)){

                Storage::disk('public')->delete('category/'.$category->image);
            }

            if (Storage::disk('public')->exists('category/slider/'.$category->image)){

                Storage::disk('public')->delete('category/slider/'.$category->image);
            }
        }

        $request['slug'] = $slug;

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('successMsg', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('successMsg', 'Category delete successfully');
    }

    public function changeStatus(Category $category){

        $status = $category->status ? 0 : 1;

        $update = $category->update(['status' => $status]);

        if ($update) {
            return back()->with('successMsg', 'Category publication status changed successfully');
        }
    }
}

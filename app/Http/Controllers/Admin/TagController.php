<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->get();

        return view('backend.admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.admin.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        $request['slug'] = Str::slug($request->name);

        $create = Tag::create($request->all());

        return redirect()->route('admin.tags.index')->with('successMsg', 'Tag created successfully');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        //
    }

    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        if ($tag->delete()){
            return back()->with('successMsg', 'Tag delete successfully');
        }
    }
}

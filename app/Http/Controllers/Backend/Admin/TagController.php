<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('posts')->take(2)->get();

        return view('backend.admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.admin.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191|unique:tags',
        ]);

        $request['slug'] = Str::slug($request->name);

        Tag::create($request->all());

        return redirect()->route('admin.tags.index')->with('successMsg', 'Tag created successfully');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('backend.admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|max:191|unique:tags,name,'.$tag->id,
        ]);

        $request['slug'] = Str::slug($request->name);

        $tag->update($request->all());

        return redirect()->route('admin.tags.index')->with('successMsg', 'Tag updated successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with('successMsg', 'Tag delete successfully');
    }

    public function changeStatus(Tag $tag){

        $status = $tag->status ? 0 : 1;

        $tag->update(['status' => $status]);

        return redirect()->route('admin.tags.index')->with('successMsg', 'Tag status changed successfully');
    }

    public function getTagList(){

        $term = request('term');

        $tags = Tag::where('status', 1)
            ->where('name', 'LIKE', "%$term%")
            ->select('name', 'id')
            ->take(20)->get();

        $new_tags = [];

        foreach ($tags as $tag){
            $new_tags[] = ['value' => $tag->id, 'text' => $tag->name];
        }

        return response()->json($new_tags);
    }
}

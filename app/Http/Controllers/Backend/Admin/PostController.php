<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Category;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Notifications\AuthorPostApproved;
use App\Notifications\AuthorPostCreate;
use App\Notifications\NewPostCreateNotify;
use App\Post;
use App\Subscriber;
use App\Tag;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Notification;
use Storage;
use Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('backend.admin.post.index', compact('posts'));
    }

    public function pendingList()
    {
        $posts = Post::where('is_approved', false)->with('user')->latest()->get();

        return view('backend.admin.post.pending', compact('posts'));
    }

    public function changeApproveStatus(Post $post){

        $approve = $post->is_approved ? 0 : 1;

        $post->update(['is_approved' => $approve]);

        //send notification to author
        $post->user->notify(new AuthorPostApproved($post));

        //send notification to subscriber
        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber){
            Notification::send($subscriber, new NewPostCreateNotify($post));
        }

        return back()->with('successMsg', 'Post approve status changed successfully');
    }

    public function create()
    {
        $categories = [];
        $tags = [];

        return view('backend.admin.post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191|unique:posts',
            'img' => 'mimes:jpg,jpeg,bmp,png|max:1024',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required'
        ]);

        $request['user_id'] = Auth::id();
        $slug = Str::slug($request->title);

        if ($request->hasFile('img')) {

            $image = $request->file('img');

            $image_name = CommonController::imageUpload(
                $slug, false, $image,'post', ['width' => '1600', 'height' => '1066']
            );

            $request['image'] = $image_name;
        }

        $request['slug'] = $slug;
        $request['status'] = $request->status ? 1 : 0;
        $request['is_approved'] = true;

        $post = Post::create($request->all());

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        //send notification to subscriber
        $subscribers = Subscriber::all();

       /* foreach ($subscribers as $subscriber){*/
            Notification::send($subscribers, new NewPostCreateNotify($post));
        /*}*/

        return redirect()->route('admin.posts.index')->with('successMsg', 'Post created successfully');
    }

    public function show(Post $post)
    {
        return view('backend.admin.post.view', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = $post->categories()->active()->get();

        $tags = $post->tags()->active()->get();

        return view('backend.admin.post.edit', compact('post','categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:191|unique:posts,title,'.$post->id,
            'img' => 'mimes:jpg,jpeg,bmp,png|max:1024',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required'
        ]);

        $request['user_id'] = Auth::id();
        $slug = Str::slug($request->title);

        if ($request->hasFile('img')) {

            $image = $request->file('img');

            $image_name = CommonController::imageUpload(
                $slug, false, $image,'post', ['width' => '1600', 'height' => '1066'], $post->image
            );

            $request['image'] = $image_name;
        }

        $request['slug'] = $slug;
        $request['status'] = $request->status ? 1 : 0;

        $post->update($request->all());

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.index')->with('successMsg', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        CommonController::deleteImage('post', $post->image);

        $post->categories()->detach();
        $post->tags()->detach();

        $post->delete();

        return back()->with('successMsg', 'Post delete successfully');
    }

    public function changeStatus(Post $post){

        $status = $post->status ? 0 : 1;

        $post->update(['status' => $status]);

        return back()->with('successMsg', 'Post publication status changed successfully');
    }

    public function getLatestTen(){

        $categories = Category::latest()->pluck('name', 'id')->toArray();

        $categories = [];
        $categories[0] = ['value'=>'34', 'text'=>'iuhyui'];

        return response()->json($categories);
    }
}

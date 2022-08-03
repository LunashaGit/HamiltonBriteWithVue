<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CommentaryPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Post/Index', [
            'posts' => Post::latest()->paginate(12),
            'categories' => Category::all()
        ]);

    }

    public function show(Post $post, CommentaryPost $comments, User $user)
    {
        return Inertia::render('Post/Post', [
            'post' => $post,
            'comments' => $comments::latest()->paginate(1000),
            'users' => User::latest()->paginate(1000)
        ]);
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'title' => 'required|min:8|max:50',
            'category_id' => 'required',
            'body' => 'required|max:500',
            'excerpt' => 'required|max:50',
            'date_start' => 'required',
            'date_end' => 'required',
            'start_hour' => 'required',
            'end_hour' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'address' => 'required',
        ]);

        $file = $request->file('image');
        $imageName = time().'.'.$request->image->extension();
        $attributes['image'] = $imageName;
        $file->storeAs('public/images', $imageName);
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = $attributes['title'];
        $attributes['slug'] = str_replace(" ", "-", $attributes['slug']);

        Post::create($attributes);

        return redirect('/')->with('success', 'Your Event has been created.');
    }
}

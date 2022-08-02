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
}

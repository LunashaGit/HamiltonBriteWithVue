<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentaryPostController extends Controller
{
    public function store(Post $post)
    {
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'comment' => request('comment')
        ]);

        return back();
    }

}

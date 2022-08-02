<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Index', [
            'users' => User::latest()->paginate(5),
        ]);
    }
    public function show($username)
    {
        return Inertia::render('User/User', [
            'user' => User::where('username', $username)->first()
        ]);
    }

    public function showAPI($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->bio = $request->bio;

        /*$file = $request->file('image');
        $imageName = time().'.'.$request->image->extension();
        $user->profile_picture = $imageName;
        $file->storeAs('public/images', $imageName);*/

        $user->save();

        return Redirect::route('dashboard');
    }

}

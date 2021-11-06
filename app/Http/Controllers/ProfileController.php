<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::whereUsername($username)->firstOrFail();
        return view('public.profile', compact('user'));
    }

    public function show($username){
        $user = User::select('id')->whereUsername($username)->firstOrFail();
        $posts = Post::with('comments','comments.user', 'comments.image', 'image')
            ->whereAuthorId($user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return (PostResource::collection($posts));
    }

    public function edit($username){
        $user = User::whereUsername($username)->firstOrFail();
        return view('profile.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $username){
        $user = User::whereUsername($username)->firstOrFail();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $image = $request->file('user_image');
        if($image){
            $user->image = $this->setImage($image);
        }
        $user->save();
        return redirect()->route('profile.edit', $user->username)->withSuccess("Your profile has been updated.");
    }

    private function setImage($image): string
    {
        $rand = mt_rand(100000, 999999);
        $name = auth()->user()->username . "__" . time() . "_" . $rand . "." . $image->getClientOriginalExtension();
        $name = str_replace(" ", "", $name);
        $image->move(public_path() . '/users/', $name);

        return asset('users/' . $name);
    }
}

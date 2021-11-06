<?php

namespace App\Http\Controllers;

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
}

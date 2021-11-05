<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('comments','comments.user', 'comments.image', 'image')->orderBy('created_at', 'desc')->get();
        return (PostResource::collection($posts));
    }
}

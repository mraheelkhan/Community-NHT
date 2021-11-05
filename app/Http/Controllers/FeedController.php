<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(){
        $posts = Post::with('image')->orderBy('created_at', 'desc')->get();
        return view('public.feed.index', compact('posts'));
    }
}

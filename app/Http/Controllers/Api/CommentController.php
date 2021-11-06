<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Models\Attachment;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request){
        $image = $request->file('image');
        $comment = $this->setComment($request);
        if($image){
            $this->setImage($image, $comment);
        }
        return [
            'success' => true,
            'message' => 'Post successfully created'
        ];
    }

    public function show(Request $request, $post_id){
        $post = Post::findOrFail($post_id);
        return $post->comments;
    }
    /**
     * @param $image
     * @return Attachment
     */
    private function setImage($image, Comment $comment): Attachment
    {
        $rand = mt_rand(100000, 999999);
        $name = time() . "_" . $rand . "." . $image->getClientOriginalExtension();
        $name = str_replace(" ", "", $name);
        $image->move(public_path() . '/postcomments/', $name);

        $image = new Attachment;
        $image->type = 'image';
        $image->filename = $name;
        $image->comment_id = $comment->id;
        $image->save();
        return $image;
    }

    /**
     * @param $request
     * @param $image
     * @return Post
     */
    private function setComment(Request $comment): Comment
    {
        $comment = Comment::create([
            'description' => $comment->description,
            'post_id' => $comment->post_id,
        ]);
        return $comment;
    }
}

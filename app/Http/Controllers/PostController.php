<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Attachment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(PostStoreRequest $request) : array
    {
        $image = $request->file('image');
        $post = $this->setPost($request);
        if($image){
            $this->setImage($image, $post);
        }
        return [
            'success' => true,
            'message' => 'Post successfully created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

    }

    /**
     * @param $image
     * @return Attachment
     */
    private function setImage($image, Post $post): Attachment
    {
        $rand = mt_rand(100000, 999999);
        $name = time() . "_" . $rand . "." . $image->getClientOriginalExtension();
        $name = str_replace(" ", "", $name);
        $image->move(public_path() . '/postimages/', $name);

        $image = new Attachment;
        $image->type = 'image';
        $image->filename = $name;
        $image->post_id = $post->id;
        $image->save();
        return $image;
    }

    /**
     * @param $request
     * @param $image
     * @return Post
     */
    private function setPost(Request $description): Post
    {
        $post = Post::create([
            'description' => $description->description,
        ]);
        return $post;
    }
}

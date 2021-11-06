<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeStoreRequest;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function store(LikeStoreRequest $request)
    {
        /**
         * @param is_like
         * @return string
         * is_like is string due JS FormData
         */
        if($request->is_like == 'true'){
            $this->setLike($request);
        } else {
            $this->setDislike($request);
        }
        return [
            'success' => true,
            'message' => 'You have liked a post.'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }

    /**
     * @param $request
     * @return Like
     */
    private function setLike(Request $request): Like
    {
        $like = Like::create([
            'post_id' => $request->post_id,
        ]);
        return $like;
    }

    private function setDislike(LikeStoreRequest $request): bool
    {
        $like = Like::where('post_id', $request->post_id)->firstOrFail();
        $like->delete();
        if($like){
            return true;
        }
        return false;
    }
}

<?php

namespace App\Http\Resources;

use App\Models\Like;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'free_description' => $this->free_description,
            'image' => ($this->image->filename) ? asset("postimages/" . $this->image->filename) : null,
            'full_name' => ucwords($this->user->fullname),
            'user_image' => ucwords($this->user->image),
            'comments' => $this->comments,
            'likes_count' => count($this->likes),
            'is_liked' => (auth()->check() ?
                          Like::where('post_id', $this->id)->where('user_id', auth()->user()->id)->exists() :
                          false) ,
            'created_at' => $this->created_at->diffForHumans(),
            'is_created_by_auth' => (auth()->check() ? ($this->author_id == auth()->user()->id ? true : false) : false)
        ];
    }

}

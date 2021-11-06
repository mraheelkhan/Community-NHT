<?php

namespace App\Http\Resources;

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
            'comments' => $this->comments,
            'likes_count' => count($this->likes),
            'created_at' => $this->created_at->diffForHumans(),
            'is_auth' => auth()->check(),
        ];
    }

}

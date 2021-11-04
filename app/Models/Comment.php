<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        self::creating(function($post){
            $post->author_id = auth()->id;
        });
    }
}

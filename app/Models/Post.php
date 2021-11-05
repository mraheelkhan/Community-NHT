<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['description', 'image', 'author_id'];
    protected $appends = ['free_description'];
    protected static function boot()
    {
        parent::boot();
        self::creating(function($post){
            $post->author_id = auth()->user()->id;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id')->withDefault();
    }

    public function image(): HasOne
    {
        return $this->hasOne(Attachment::class, 'post_id', 'id')->withDefault();
    }

    public function images(): HasMany
    {
        return $this->hasMany(Attachment::class, 'post_id', 'id');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    public function likes() : HasMany
    {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }

    public function getFreeDescriptionAttribute(): string{
        return (empty($this->attributes['description']) ? '' : $this->attributes['description']);
    }



}

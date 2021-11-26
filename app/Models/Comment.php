<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'post_id'];
    protected $appends = ['image_url', 'commenter_full_name', 'free_description', 'created_at_human_diff'];
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
        return $this->hasOne(Attachment::class, 'comment_id', 'id')->withDefault();
    }

    public function getImageUrlAttribute(): ?string
    {
        return ($this->image->filename) ? (asset("postcomments/" . $this->image->filename)) : null;
    }

    public function getCommenterFullNameAttribute(): string
    {
        return $this->user->fullname;
    }

    public function getFreeDescriptionAttribute(): string{
        return (empty($this->attributes['description']) ? '' : $this->attributes['description']);
    }

    public function getCreatedAtHumanDiffAttribute(): string{
        $created_at = $this->attributes['created_at'];
        // return Carbon::create($created_at)->diffForHumans();
        return Carbon::create($created_at)->format('d M Y');
    }
}

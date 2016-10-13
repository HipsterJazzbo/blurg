<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Post $post) {
            if (!isset($post->slug)) {
                $slug = str_slug($post->title);

                // Make sure the slug isn't taken
                $i = 1;

                while (Post::where('slug', '=', $slug)->exists()) {
                    $slug = str_slug($post->title).'-'.$i;

                    $i++;
                }

                $post->slug = $slug;
            }

            if (!isset($post->user_id)) {
                $post->user_id = auth()->user()->getKey();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExcerptAttribute()
    {
        return str_limit($this->body ?? '');
    }
}

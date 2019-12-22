<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Post $post){
            $post->forceFill([
                'user_id' => auth()->id()
            ]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

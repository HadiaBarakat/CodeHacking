<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title',
      'body',
      'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($post) { // before delete() method call this
            unlink(public_path().$post->image->url);
            $post->image()->delete();
        });
    }
}

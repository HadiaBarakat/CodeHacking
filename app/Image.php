<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    private $imagesDirectory = '/images/';
    public static $placeholderImage = '/images/placeholder.png';

    protected $fillable = [
      'url', 'imageable_id', 'imageable_type'
    ];

    public function imageable(){
        return $this->morphTo();
    }

    public function getUrlAttribute($value){
        return $this->imagesDirectory . $value;
    }
}

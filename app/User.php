<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    private $imagesDirectory = "/images/";

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_id', 'is_active', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function isAdmin(){
        return ($this->role->name == 'admin');
    }

    public function isActive(){
        return ($this->is_active);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($user) { // before delete() method call this
            unlink(public_path().$user->image->url);
            $user->image()->delete();
        });
    }

}

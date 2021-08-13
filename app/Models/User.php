<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function likes(){
        return $this->belongsToMany(Post::class, 'likes')->withTimestamps()->whereNull(['deleted_at'])->withPivot(['deleted_at']);
    }

    public function likesWithTrashed(){
        return $this->belongsToMany(Post::class, 'likes')->withTimestamps()->withPivot(['deleted_at']);
    }

    public function recievedLikesCount(){
        $postId = $this->posts->pluck('id');
        return \DB::table('likes')->whereIn('post_id', $postId)->whereNull(['deleted_at'])->count();
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = \Hash::make($password);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likedBy(){
        return $this->belongsToMany(User::class, 'likes')->withTimestamps()->whereNull(['deleted_at'])->withPivot(['deleted_at']);
    }

    public function likedByWithTrashed(){
        return $this->belongsToMany(User::class, 'likes')->withTimestamps()->withPivot(['deleted_at']);
    }

    public function isLikedBy(User $user){
        return $this->likedBy->contains('id', $user->id);
    }
}

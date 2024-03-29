<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $fillable = [
        "text",
        "user_id",
        "post_id",
        'posted_at'
    ];

    protected $dates = [
        'posted_at'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

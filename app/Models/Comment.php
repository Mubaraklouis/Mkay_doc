<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function posts(){
        return $this->belongsTo(Post::class,'post_id');
    }
    use HasFactory;
}

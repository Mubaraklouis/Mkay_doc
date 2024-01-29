<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function users(){
      return $this->belongsTo(User::class,'user_id');
    }

    protected $cast=[

    ];

    protected $fillable =['post_id','user_id','body'];


    use HasFactory;


}

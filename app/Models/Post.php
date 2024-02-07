<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/*
* users(): get all the users of a particular post
* comment(): get all the comments on a post
*/
class Post extends Model
{


    protected $cast =[

    ];
    public function comments()
    {
        //one to many relationship
      return $this->hasMany(Comment::class,'post_id',);
    }

    public function users()
    {
        //many to many relationship
        return $this->belongsToMany(User::class);
    }

    //creating an accessor

    public function getTitlesAttribute()
    {
        return strtoupper($this->title);
    }
   protected $fillable =['title','body'];

    use HasFactory;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'subtitle', 'content'];

    public function author(){

        return $this->belongsTo(User::class, 'user_id','id');
    }
}
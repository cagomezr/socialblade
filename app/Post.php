<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function Post(){
		return $this->hasMany('App\Post');
	}
    public function Comment(){
		 $this->belongsTo('App\User');
	}
}

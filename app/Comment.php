<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public  function Post{
		  $this->belongsTo('App\Post');
	}
	public function Comment(){
		 $this->belongsTo('App\User');
	}
}

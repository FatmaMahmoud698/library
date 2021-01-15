<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name','bio','img'];
    //Author hasMany Books
    public function books(){
    	return $this->hasMany('App\Book');
    }
}

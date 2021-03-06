<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     protected $fillable = ['name','desc','img','price','author_id'];
     //book belongs to one author
     public function author(){
     	return $this->belongsTo('App\Author');
     }
     //book belongs to many category
     public function categories(){
        return $this->belongsToMany('App\Category');
    }
}

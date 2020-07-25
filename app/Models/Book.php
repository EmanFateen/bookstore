<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   
    protected $dates = ['published_at'];


    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'book_author', 'book_id', 'author_id');
    }
}

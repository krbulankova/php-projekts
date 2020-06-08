<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'author_id', 'description', 'price', 'year', 'image', 'display'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

}

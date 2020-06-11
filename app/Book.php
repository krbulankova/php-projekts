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

    public function jsonSerialize()
    {
        return [
            'id' => intval($this->id),
            'author' => $this->author->name,
            'topic' => $this->topic->name,
            'name' => $this->name,
            'description' => $this->description,
            'price' => number_format($this->price, 2),
            'year' => intval($this->year),
            'image' => asset('images/' . $this->image),
        ];
    }
}

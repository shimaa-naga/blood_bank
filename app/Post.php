<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('id', 'title', 'image', 'category_id', 'content');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function favourites()
    {
        return $this->hasMany('App\Favourite');
    }

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model 
{

    protected $table = 'favourites';
    public $timestamps = true;
    protected $fillable = array('client_id', 'post_id');

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}
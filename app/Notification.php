<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'body', 'order_id');

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

}
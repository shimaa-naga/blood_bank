<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'number_of_bags', 'hospital_name', 'latitude', 'longitude', 'blood_type', 'city_id', 'phone', 'details', 'client_id');

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

}
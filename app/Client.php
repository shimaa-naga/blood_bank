<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model as Eloquent;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'dob', 'phone', 'password', 'donation_last_date', 'city_id', 'blood_type', 'blood_type_id', 'pin_code', 'is_active');

    protected $hidden = [
        'password', 'api_token',
    ];


    public function blood_types()
    {
        return $this->belongsToMany('App\Blood_type');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Blood_type');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Governorate');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

}
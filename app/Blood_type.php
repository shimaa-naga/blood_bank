<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood_type extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function clients_blood_type()
    {
        return $this->hasMany('App\Client', 'blood_type_id');
    }

}
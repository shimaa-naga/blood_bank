<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_notification extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('id', 'notification_id', 'is_read');
    protected $visible = array('client_id');

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('site_name', 'about', 'phone', 'email', 'android_app_url', 'ios_app_url', 'facebook_url', 'whatsapp_url', 'instgram_url', 'youtube_url', 'twitter_url');

}
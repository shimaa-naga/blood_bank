<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('id', 'title', 'image', 'category_id', 'content');
    protected $appends = array('thumbnail_full_path', 'is_favourite');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }



    public function getThumbnailFullPathAttribute()
    {

        return asset($this->thumbnail);
    }

    public function getIsVafouriteAttribute()
    {
        $favourite = request()->user()->whereHas('favourites', function($query){
            $query->where('client_post.post_id', $this->id);
        })->first();

        if($favourite)
        {
            return true;
        }
        return false;
    }


}
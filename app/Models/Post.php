<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
 
    protected $fillable = array('user_id', 'title', 'content', 'thumbnail', 'publish_date', 'category_id');
    


    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
 

    public function user()
    {
    	return $this->belongsTo('App\User'); 

    }	 
 

    public function favorite()
    {
    	return $this->belongsToMany(Client::class);

    }	 
}
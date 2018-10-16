<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
 
    protected $fillable = array('client_id', 'title', 'content', 'thumbnail', 'publish_date', 'category_id');
    


    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
 

    public function client()
    {
    	return $this->belongsTo(Client::class); 

    }	 
 

    public function favorite()
    {
    	return $this->belongsToMany(Client::class);

    }	 
}
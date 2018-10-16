<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model 
{
 
    protected $fillable = ['phone', 'email', 'about_app', 'facebook_url', 'twitter_url', 'youtube_url', 'whatsapp', 'instagram_url', 'google_url'];

}
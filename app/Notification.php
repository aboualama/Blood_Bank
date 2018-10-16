<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{ 

    protected $fillable = ['title', 'content', 'donation_request_id'];

}
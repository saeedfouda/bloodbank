<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'icon' , 'facebook_url', 'twitter_url', 'youtube_url', 'whatsapp_url', 'google_url', 'about_app');

}

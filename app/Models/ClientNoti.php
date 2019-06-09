<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientNoti extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('client_id', 'notification_id', 'is_read');

}
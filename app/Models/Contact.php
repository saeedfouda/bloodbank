<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('phone', 'title', 'client_id',  'message' , 'is_read');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}

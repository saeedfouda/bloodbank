<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governorate_id');

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }



}

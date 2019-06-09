<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('name' , 'blood_type_id', 'client_id', 'age', 'bags_number', 'hospital_name', 'hospital_address', 'longitud', 'latitud', 'phone', 'city_id', 'body');

    public function BloodType()
    {
        return $this->belongsTo('App\Models\BloodType' ,  'blood_type_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}

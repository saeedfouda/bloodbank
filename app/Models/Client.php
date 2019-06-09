<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email','governorate_id' , 'birth_of_date', 'blood_type_id', 'phone', 'password', 'city_id', 'last_donation_date',"pin_code","active");

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function bloodtypes()
    {
        return $this->belongsToMany('App\Models\BloodType','blood_type_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function cities()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Mologidels\Governorate');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    protected $hidden = [
        'password' , 'api_token'
    ];

}

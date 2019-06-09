<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'body', 'image', 'category_id');
    protected $appends = ['favorite'];


    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function getFavoriteAttribute()
    {

        if(auth('client')->user()){
            $id = auth('client')->user()->id;
            $cliend = Client::find($id);

            $postsIds = $cliend->posts()->pluck('post_id')->toArray();

            if(in_array($this->id,$postsIds)){
                return $value = true;

            }else{

                return $value = false;
            }

        }

    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = "profile";
    protected  $primaryKey = "id";

    public function user()
    {
        return $this->belongsTo('App\User','id','user_id');
    }
}

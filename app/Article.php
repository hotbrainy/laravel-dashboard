<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';
    protected $primaryKey = 'article_id';


    public function Owner()
    {
        return $this->belongsTo('App\User');
    }
}

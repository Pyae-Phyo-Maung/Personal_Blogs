<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['category_id','image','title','content'];

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
}

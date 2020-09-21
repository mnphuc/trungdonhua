<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //
    protected $categories = 'categories';
    public function products(){
        return $this->hasMany('App\products', 'categories_id', 'id');
    }
}

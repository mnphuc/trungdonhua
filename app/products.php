<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //

    protected $products = 'products';
    public function categories(){
        return $this->belongsTo('App\categories', 'categories_id', 'id');
    }
    public function order_detaill(){
        return $this->hasMany('App\order_detaill', 'product_id', 'id');
    }
}

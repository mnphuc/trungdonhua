<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detaill extends Model
{
    //
    protected $order_detaill = 'order_detaill';

    public function orders(){
        return $this->belongsTo('App/orders', 'order_id', 'id');
    }
    public function products(){
        return $this->belongsTo('App/products', 'product_id', 'id');
    }
}

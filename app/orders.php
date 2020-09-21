<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //
    protected $orders = 'orders';
    public function order_detaill(){
        return $this->hasMany('App\order_detaill', 'order_id', 'id');
    }
}

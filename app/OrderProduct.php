<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $primaryKey = 'id_order';
    protected $table = "order_products";

    public function Product(){
        return $this->belongsTo(Product::class);
    }

    public function Order(){
        return $this->belongsTo(Order::class);
    }

    public function Status(){
        return $this->belongsTo(Statu::class);
    }
}

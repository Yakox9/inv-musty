<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";




    public function Status()
    {
        return $this->belongsTo(Statu::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
    public function OrderProducts(){
        return $this->hasMany(OrderProduct::class);
    }
}

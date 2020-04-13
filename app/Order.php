<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'date','delivery_date','id_client','id_user','id_status',
    ];


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


    public function createOrder($request){
        $order = new Order();
        $order->date = $request->date;
        $order->delivery_date = $request->delivery_date;
        $order->id_client = $request->id_client;
        $order->id_user = $request->id_user;
        $order->id_status = $request->id_status;
        $order->save();
    }

    public function updateOrder($request,$order){
        $order->date = $request->date;
        $order->delivery_date = $request->delivery_date;
        $order->id_client = $request->id_client;
        $order->id_user = $request->id_user;
        $order->id_status = $request->id_status;
        $order->update();
    }
}

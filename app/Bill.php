<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    protected $table = "bills";

    protected $fillable = [
        "date",
        "iva",
        "total",
        "id_currency",
        "id_order"
    ];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    public function Currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function createBill($request){
        $bill = new Bill();
        $bill->date = $request->date;
        $bill->iva = $request->iva;
        $bill->total = $request->total;
        $bill->id_currency = $request->currency;
        $bill->id_order = $request->order;
        $bill->save();
    }

    public function updateBill($request,$bill){
        $bill->date = $request->date;
        $bill->iva = $request->iva;
        $bill->total = $request->total;
        $bill->id_currency = $request->currency;
        $bill->id_order = $request->order;
        $bill->update();
    }
}

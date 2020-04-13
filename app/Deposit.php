<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = "deposits";

    protected $fillable = [
        'quantity','date','id_product','id_raw_material',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function RawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }

    public function createDeposit($request){
        $deposit = new Deposit();
        $deposit->date = $request->date;
        $deposit->id_product = $request->product;
        $deposit->id_raw_material = $request->raw_material;
        $deposit->quantity = $request->quantity;
        $deposit->save();
    }

    public function updateDeposit($request,$deposit){
        $deposit->date = $request->date;
        $deposit->id_product = $request->product;
        $deposit->id_raw_material = $request->raw_material;
        $deposit->quantity = $request->quantity;
        $deposit->update();
    }
}

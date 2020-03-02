<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = "deposits";


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

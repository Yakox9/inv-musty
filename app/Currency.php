<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = "currencies";


    public function Order()
    {
        return $this->hasMany(Bill::class);
    }

    public function createCurrency($request){
        $currency = new Currency();
        $currency->name = $request->name;
        $currency->change = $request->change;
        $currency->save();
    }
    
    public function updateCurrency($request,$currency){
        $currency->name = $request->name;
        $currency->change = $request->change;
        $currency->update();
    }

}
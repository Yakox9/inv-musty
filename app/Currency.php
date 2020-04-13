<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = "currencies";

    protected $fillable = [
        'name', 'change',
    ];
    public function Order()
    {
        return $this->hasMany(Bill::class);
    }

    public static function createCurrency($request){
        $currency = new Currency();
        $currency->name = $request->name;
        $currency->change = $request->change;
        $currency->save();
        return $currency;
    }

    public function updateCurrency($request,$currency){
        if($request->name){
            $currency->name = $request->name;
        }
        if($currency->change){
            $currency->change = $request->change;
        }
        $currency->update();
    }

}

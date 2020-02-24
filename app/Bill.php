<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    protected $table = "bills";


    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    public function Currency()
    {
        return $this->belongsTo(Currency::class);
    }
}

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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = "type_products";

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}

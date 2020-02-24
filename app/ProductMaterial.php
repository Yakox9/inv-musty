<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    protected $primaryKey = 'id_product';
    protected $table = "product_materials";

    public function Product(){
        return $this->belongsTo(Product::class);
    }

    public function RawMaterial(){
        return $this->belongsTo(RawMaterial::class,'id_raw_material');
    }


}

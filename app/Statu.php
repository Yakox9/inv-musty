<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    protected $table = "status";



    public function TypeStatus()
    {
        return $this->belongsTo(TypeStatu::class);
    }
    public function OrderProducts(){
        return $this->hasMany(OrderProduct::class);
    }
    public function Orders(){
        return $this->hasMany(Order::class);
    }
    public function RawMaterials(){
        return $this->hasMany(RawMaterial::class);
    }
    public function Products(){
        return $this->hasMany(Product::class);
    }

}

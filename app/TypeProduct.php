<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = "type_products";

    protected $fillable = [
        'name',
   ];

    public function Product()
    {
        return $this->hasMany(Product::class);
    }

    public function createTypeProduct($request){
        $TP = new TypeProduct();
        $TP->name = $request->name;
        $TP->save();
    }

    public function updateTypeProduct($request,$typeProduct){
        $typeProduct->name=$request->name;
        $typeProduct->update();
    }
}

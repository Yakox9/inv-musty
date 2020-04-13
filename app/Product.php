<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";

    protected $fillable = [
        'name','price','id_status','id_type_product',
   ];

    public function TypoProduct(){
        return $this->belongsTo(TypeProduct::class);
    }

    public function Status(){
        return $this->belongsTo(Statu::class);
    }

    public function OrderProducts(){
        return $this->hasMany(OrderProduct::class);
    }

    public function Deposit()
    {
        return $this->hasMany(Deposit::class);
    }


    public function createProduct($request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->id_status = $request->status;
        $product->id_type_product = $request->typeProduct;
        $product->save();
    }

    public function updateProduct($request,$product){
        $product->name = $request->name;
        $product->price = $request->price;
        $product->id_status = $request->status;
        $product->id_type_product = $request->typeProduct;
        $product->update();
    }

}

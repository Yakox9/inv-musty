<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    protected $table = "status";

    protected $fillable = [
        'name', 'id_type_status',
   ];

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



    public function createStatus($request){
        $status = new Statu();
        $status->name= $request->name;
        $status->id_type_status = $request->type_status;
        $status->save();
    }

    public function updateStatus($request,$status){
        $status->name= $request->name;
        $status->id_type_status = $request->type_status;
        $status->update();
    }
}

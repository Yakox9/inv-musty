<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    protected $table="raw_materials";




    public function Provider(){
        return $this->belongsTo(Provider::class);
    }

    public function TypeRawMaterial(){
        return $this->belongsTo(TypeRawMaterial::class);
    }

    public function Status(){
        return $this->belongsTo(Statu::class);
    }
    public function ProductMaterials()
    {
        return $this->hasMany(ProductMaterial::class);
    }
    public function Deposit()
    {
        return $this->hasMany(Deposit::class);
    }


    public function createRawMaterial($request){
        $rawMaterial = new RawMaterial();
        $rawMaterial->name = $request->name ;
        $rawMaterial->id_status = $request->status;
        $rawMaterial->id_type_raw_materials = $request->type_raw_material;
        $rawMaterial->id_provider = $request->provider;
        $rawMaterial->save();
    }

    public function updateRawMaterial($request,$rawMaterial){
        $rawMaterial->name = $request->name ;
        $rawMaterial->id_status = $request->status;
        $rawMaterial->id_type_raw_materials = $request->type_raw_material;
        $rawMaterial->id_provider = $request->provider;
        $rawMaterial->update();
    }

}

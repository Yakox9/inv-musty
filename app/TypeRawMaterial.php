<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRawMaterial extends Model
{
    protected $table="type_raw_materials";

    public function RawMaterial()
    {
        return $this->hasMany(RawMaterial::class);
    }


    public function createTypeRawMaterial($request){
        $TS = new TypeRawMaterial();
        $TS->name = $request->name;
        $TS->save();
    }

    public function updateTypeRawMaterial($request,$typeRawMaterial){
        $typeRawMaterial->name=$request->name;
        $typeRawMaterial->update();
    }
}

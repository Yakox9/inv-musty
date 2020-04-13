<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    protected $table="raw_materials";

    protected $fillable = [
        'name','id_status','id_type_raw_materials','id_provider',
   ];


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

}

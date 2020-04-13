<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRawMaterial extends Model
{
    protected $table="type_raw_materials";

    protected $fillable = [
        'name',
   ];

    public function RawMaterial()
    {
        return $this->hasMany(RawMaterial::class);
    }
}

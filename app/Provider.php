<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\People;
class Provider extends Model
{
    protected $table = "providers";

    public function People()
    {
        return $this->hasOne(People::class, 'id');
    }

    public function createProvider($request){
        $people = new People();
        $people->name = $request->name;
        $people->ic = $request->ic;
        $people->save();

        $provider = new Prodiver();
        $provider->rif = $request->rif;
        $provider->phone_number = $request->phone_number;
        $provider->id = $people->id;
        $provider->save();
    }

    public function updateProvider($request,$provider){
        $people = $provider->People();
        $people->name = $request->name;
        $people->ic = $request->ic;
        $provider->rif = $request->rif;
        $provider->phone_number = $request->phone_number;
        $people->update();
        $provider->update();
    }

    public function rawMaterials()
    {
        return $this->hasMany(RawMaterial::class);
    }
}

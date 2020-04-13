<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\People;
use Illuminate\Http\Response;
class Provider extends Model
{
    protected $table = "providers";

    protected $fillable = [
        'rif', 'phone_number',
   ];


    public static function createProvider($request){
        $people = new People();
        $people->name = $request->name;
        $people->ic = $request->ic;
        $people->save();
        $provider = new Provider();
        $provider->id = $people->id;
        $provider->rif = $request->rif;
        $provider->phone_number = $request->phone_number;
        $provider->save();
        $provider->name = $people->name;
        $provider->ic =$people->ic;
       // $obj = array_merge($provider,$people);
       // $provider = array_unique($obj);
        return $provider;
    }

    public function updateProvider($request,$provider){
        $people = People::findOrFail($provider->id);
        $people->name = $request->name;
        $people->ic = $request->ic;
        $provider->rif = $request->rif;
        $provider->phone_number = $request->phone_number;
        $people->update();
        $provider->update();

        $provider->name = $people->name;
        $provider->ic =$people->ic;
        return $provider;
    }

    public function rawMaterials()
    {
        return $this->hasMany(RawMaterial::class);
    }

    public function People()
    {
        return $this->hasOne(People::class, 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\People;
class Client extends Model
{
    protected $table = "clients";

    protected $fillable = [
        'phone_number', 'address',
   ];

    public function People()
    {
        return $this->hasOne(People::class, 'id');
    }


    public function createClient($request){
        $people = new People();
        $people->name = $request->name;
        $people->ic = $request->ic;
        $people->save();
        $client = new Client();
        $client->phone_number= $request->phone_number;
        $client->address= $request->address;
        $client->id = $people->id;
        $client->save();

        $client->name = $people->name;
        $client->ic =$people->ic;
        return $client;
    }

    public function updateClient($request,$client){
        $people = People::findOrFail($client->id);
        $people->name = $request->name;
        $people->ic = $request->ic;
        $client->phone_number= $request->phone_number;
        $client->address= $request->address;
        $client->update();
        $people->update();

        $client->name = $people->name;
        $client->ic =$people->ic;
        return $client;
    }
}

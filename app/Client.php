<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";

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
    }

    public function updateClient($request,$client){
        $people = $client->People();
        $people->name = $request->name;
        $people->ic = $request->ic;
        $client->phone_number= $request->phone_number;
        $client->address= $request->address;   
        $client->update();
        $people->update();
    }
}

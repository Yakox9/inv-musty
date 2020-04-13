<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeStatu extends Model
{
    protected $table = "type_status";

    protected $fillable = [
        'name',
   ];

    public function Status()
    {
        return $this->hasMany(Statu::class);
    }

    public static function createTypeStatus($request){
        $TS = new TypeStatu();
        $TS->name = $request->name;
        return $TS;
    }

    public function updateTypeStatus($request,$typeStatus){
        $typeStatus->name=$request->name;
        $typeStatus->update();
        return $typeStatus;
    }
}

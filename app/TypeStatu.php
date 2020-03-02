<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeStatu extends Model
{
    protected $table = "type_status";

    public function Status()
    {
        return $this->hasMany(Statu::class);
    }

    public static function createTypeStatus($request){
        $TS = new TypeStatu();
        $TS->name = $request->name;
        try{

            $TS->save();
            return true;
        }catch (Exception $e) {
            return false;
        }
    }

    public function updateTypeStatus($request,$typeStatus){
        $typeStatus->name=$request->name;
        try{
            $typeStatus->update();
            return true;
        }catch (Exception $e) {
            return false;
        }
    }
}

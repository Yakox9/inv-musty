<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";



    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function createRole($request){
        $role = new Role();
        $role->name = $request->name;
        $role->save();
    }

    public function updateRole($request,$role){
        $role->name = $request->name;
        $role->update();  
    }

}



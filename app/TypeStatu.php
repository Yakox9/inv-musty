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
}

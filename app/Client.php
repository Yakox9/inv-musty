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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = "providers";

    public function People()
    {
        return $this->hasOne(People::class, 'id');
    }
}

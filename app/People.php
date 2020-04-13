<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    protected $table= "peoples";

    protected $fillable = [
        'name', 'ic',
    ];
    public function User()
    {
        return $this->hasOne(User::class, 'id');
    }
    public function Client()
    {
        return $this->hasOne(Client::class, 'id');
    }
    public function Provider()
    {
        return $this->hasOne(Provider::class, 'id');
    }
}

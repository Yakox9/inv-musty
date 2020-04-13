<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\People;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table="users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','username','id_role',
    ];


    public function People()
    {
        return $this->hasOne(People::class, 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createUser($request){
        $people = new People();
        $people->name = $request->name;
        $people->ic = $request->ic;
        $people->save();

        $user = new User();
        $user->email = $request->email;
        $user->id=$people->id;
        $user->password= bcrypt($request->password);
        $user->id_role= $request->id_role;
        $user->username=$request->username;
        $user->save();
        $user->name =$people->name;
        $user->name=$people->ic;

        return $user;
    }

    public function updateUser($request,$user){
        $people = People::findOrFail($user->id);
        $user->email = $request->email;
        $user->id_role= $request->role;
        if($request->password !=null){
            $user->password= bcrypt($request->password);
        }
        $people->name = $request->name;
        $people->ic = $request->ic;
        $user->update();
        $people->update();
        $user->name =$people->name;
        $user->name=$people->ic;
        return $user;
    }
}

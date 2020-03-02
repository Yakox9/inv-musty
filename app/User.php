<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\People;
class User extends Authenticatable
{
    use Notifiable;

    protected $table="users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function createUser($request){
        $people = new People();
        $people->name = $request->name;
        $people->ic = $request->ic;
        $people->save();

        $user = new User();
        $user->email = $request->email;
        $user->id=$people->id;
        $user->password= bcrypt($request->password);
        $user->id_role= $request->role;
        $user->save();
    }

    public function updateUser($request,$user){
        $people = $user->People();
        $user->email = $request->email;
        $user->id_role= $request->role;
        if($request->password !=null){
            $user->password= bcrypt($request->password);
        }
        $people->name = $request->name;
        $people->ic = $request->ic;
        $user->update();
        $people->update();
    }

    public function authUser($request){
        $user = User::where('username','=',$request->username)->first();
        if(!isset($user)){
            return bcrypt(2);
        }else{
            if($user->password == bcrypt($request->password)){
                return bcrypt(1);
            }else{
                return bcrypt(0);
            }
        }    
    }
}

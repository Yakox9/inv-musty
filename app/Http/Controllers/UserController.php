<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{


    public function login(Request $request){
        $data =[
            'username' =>  $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            $user = Auth::user();
            $loginData['token'] = $user->createToken('imtoken')->accessToken;
            return response()->json([
                "message"=>"Bienvenido.",
                "data"=>$loginData
            ], 200);
        }else{
            return response()->json(["message"=>"Username or Password Invalid."], 401);
        }

    }

    public function register(Request $request){
       $user = User::createUser($request);
       $loginData['token'] = $user->createToken('imtoken')->accessToken;
        return response()->json([
            "message" =>"Welcome, User Created Success.",
            "data"=>$loginData,
            "status"=> 200
        ], 200);
    }

}

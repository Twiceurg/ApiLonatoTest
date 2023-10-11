<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserRessource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    //
    public function register(RegisterRequest $request){

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
         ]);
         //attibuer le role
         $user_role = Role::where(['name' => 'user'])->first();
         if($user_role){
            $user->assignRole($user_role);
         }

         return new UserRessource($user);

    }
}

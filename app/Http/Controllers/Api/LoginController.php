<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserRessource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login( LoginRequest $request){
        // la connection de l utilisateur
        if (!Auth::attempt($request->only('email','password'))) {
            # code...
            Helper::sendError('L email ou le mots de pass incorecte');
        }
        // renvoyer une reponse
        return new UserRessource(auth()->user());

    }
}

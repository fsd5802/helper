<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\auth\RegisterRequest;
class RegisterController extends Controller
{
   function register()
   {
     return view("errors.404");
   }
   function handleRegister(RegisterRequest $request)
   {
    $data = $request->all();
    $data['password'] = \Hash::make($data['password']);
    $user = User::create($data);
    return $user ? redirect(getRoute('login')) : redirect()->back();
     
   }
}

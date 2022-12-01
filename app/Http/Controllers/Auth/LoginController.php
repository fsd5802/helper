<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    function index()
    {
      // dd(10);
      return view('user.auth.login');
    }
    function handleLogin(Request $request)
    {
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
      {
        return redirect(url(app()->getLocale().'/admin/'));
      }
      else
      {
          return redirect()->back();
      }
    }
    function logout()
    {
      Auth::logout();
      return redirect(getRoute('login'));
    }
 
}

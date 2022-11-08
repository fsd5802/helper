<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $admins = User::orderBy('id', 'desc')->take(5)->get();
        $services = Service::orderBy('id', 'desc')->take(5)->get();
        $contacts = Contact::orderBy('id', 'desc')->take(5)->get();
        return view('admin.dashboard', ['admins'=>$admins , 'services'=>$services ,'contacts'=>$contacts]);
    }
}

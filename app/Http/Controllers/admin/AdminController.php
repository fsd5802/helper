<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\auth\RegisterRequest;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::paginate(paginationNumber());
        return view("admin.admins.index" , ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admins.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
       $data = $request->all();
       $data['password'] = \Hash::make($data['password']);
       $user = User::create($data);
       return $user ? redirect(getRoute('admins.index')) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale ,  $id)
    {
        $user = User::findorfail($id);
        return view("admin.admins.show" , ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale ,  $id)
    {
        $user = User::findorfail($id);
        return view("admin.admins.edit" , ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $locale ,RegisterRequest $request , $id)
    {
        $data = $request->all();
        $admin = User::findorfail($id);
        $data['password'] = \Hash::make($data['password']);
        $admin->fill($data)->save();
        return $admin ? redirect(getRoute('admins.index')) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale ,  $user)
    {
        $user = User::findorfail($user);
        $user->delete();
        return redirect()->back();
    }
}

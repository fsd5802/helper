<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use Illuminate\Http\Request;
use App\Http\Requests\admin\IconRequest;
class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Icon::paginate(paginationNumber());
        return view("admin.icons.index" , ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.icons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IconRequest $request)
    {
     
        $icon = Icon::create($request->all());
        return $icon ? redirect(getRoute('icons.index')) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale , Icon $icon)
    {
        return view("admin.icons.show" , ['icon'=>$icon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale , Icon $icon)
    {
        return view("admin.icons.edit" , ['icon'=>$icon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale , IconRequest $request, Icon $icon)
    {
      $icon->fill($request->all())->save();
      return $icon ? redirect(getRoute('icons.index')) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale , Icon $icon)
    {
        $icon->delete();
        return redirect()->back();
    }
}

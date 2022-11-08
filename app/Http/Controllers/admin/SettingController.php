<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use  App\Http\Requests\admin\SettingRequest;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::withTranslation()->paginate(paginationNumber());
       return view("admin.settings.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.settings.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {  
            $data['image'] = upload_image($request->file('image') , 'settings_' , 'Settings') ;
        } 
        else
        {
            $data['image'] = "defaults/service.jpg";
        }
        if($request->hasFile('logo'))
        {
            $data['logo'] = upload_image($request->file('logo') ,'settings_' , 'Settings') ;
        } 
        else
        {
            $data['image'] = "defaults/service.jpg";
        }
        $setting = Setting::create($data);
        return $setting ? redirect(getRoute('settings.index')) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale ,Setting $setting)
    {
        return view("admin.settings.show" , ['setting'=>$setting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale ,Setting $setting)
    {
        return view("admin.settings.edit" , ['setting'=>$setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale ,SettingRequest $request, Setting $setting)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = upload_image($request->file('image') ,'settings_' , 'Settings') ;
        } 
        else
        {
            $data['image'] =$setting->image;
        }
        if($request->hasFile('logo'))
        {
            $data['logo'] = upload_image($request->file('logo') ,'settings_' , 'Settings') ;
        } 
        else
        {
            $data['logo'] =$setting->logo;
        }
        $setting->fill($data)->save();
        return $setting ? redirect(getRoute('settings.index')) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale , Setting $setting)
    {
        $setting->deleteTranslations();
        $setting->delete();
        return redirect()->back();
    }
}

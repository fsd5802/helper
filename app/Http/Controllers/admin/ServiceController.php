<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\admin\ServiceRequest;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::withTranslation()->paginate(paginationNumber());
        return view("admin.services.index" , ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("admin.services.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {  
            $data['image'] = upload_image($request->file('image') , '_services_' , 'Services') ;
        } 
        else
        {
            $data['image'] = "defaults/service.jpg";
        }
        $service = Service::create($data);
        return $service ? redirect(getRoute('services.index')) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale  , Service  $service)
    {
       return view("admin.services.show" , ['service'=>$service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale , Service  $service)
    {
        return view("admin.services.edit" , ['service'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale , ServiceRequest $request, Service  $service)
    {
        $data = $request->all();

        if($request->hasFile('image'))
        {
           
            $data['image'] = upload_image($request->file('image') , '_services_' , 'Services') ;
        } 
        else
        {
            $data['image'] =$service->image;
        }
        $service->fill($data)->save();
        return $service ? redirect(getRoute('services.index')) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale ,Service  $service)
    {
        $service->deleteTranslations();
        $service->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\admin\SliderRequest;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::paginate(paginationNumber());
        return view("admin.sliders.index" , ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.sliders.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {  
            $data['image'] = upload_image($request->file('image') , '_sliders_' , 'Sliders') ;
        } 
        else
        {
            $data['image'] = "defaults/service.jpg";
        }
        $slider= Slider::create($data);
        return $slider ? redirect(getRoute('sliders.index')) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale , Slider $slider)
    {
        return view("admin.sliders.show",['slider'=>$slider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale , Slider $slider)
    {
        return view("admin.sliders.edit" , ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $locale ,SliderRequest $request , Slider $slider)
    {
        $data = $request->all();

        if($request->hasFile('image'))
        {
           
            $data['image'] = upload_image($request->file('image') , '_sliders_' , 'Sliders') ;
        } 
        else
        {
            $data['image'] =$slider->image;
        }
        $slider->fill($data)->save();
        return $slider ? redirect(getRoute('sliders.index')) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale , Slider $slider)
    {
        $slider->delete();
        return redirect()->back();
    }
}

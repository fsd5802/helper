<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testmonial;
use Illuminate\Http\Request;
use App\Http\Requests\admin\TestmonialRequest;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Testmonial::withTranslation()->paginate(paginationNumber());
        return view("admin.testimonials.index" , ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.testimonials.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestmonialRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {  
            $data['image'] = upload_image($request->file('image') , '_testmonials_' , 'Testmonials') ;
        } 
        else
        {
            $data['image'] = "defaults/service.jpg";
        }
        $testmonial = Testmonial::create($data);
        return $testmonial ? redirect(getRoute('testmonials.index')) : redirect()->back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale , Testmonial $testmonial)
    {
      return view("admin.testimonials.show" , ['testmonial'=>$testmonial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale , Testmonial $testmonial)
    {
        return view("admin.testimonials.edit" , ['testmonial'=>$testmonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestmonialRequest $request, $locale, $id)
    {
       $data = $request->all();
        if($request->hasFile('image'))
        {  
            $data['image'] = upload_image($request->file('image') , '_testmonials_' , 'Testmonials') ;
        } 
        // else
        // {
        //     $data['image'] = "defaults/service.jpg";
        // }
        $testmonial = Testmonial::findOrFail($id);
        $testmonial->fill($data)->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale , Testmonial $testmonial)
    {
        $testmonial->deleteTranslations();
        $testmonial->delete();
        return redirect()->back();
    }
}

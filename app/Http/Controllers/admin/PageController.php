<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\admin\PageRequest;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //for about us
    public  function createAbout()
    {
        $data = Page::where('identifier',"aboutus")->first();
        return view("admin.pages.create", ['data'=>$data,'identifier' =>"aboutus" , 'save'=>'pages.saveAbout']);
    }
    public  function saveAbout(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        $allImages = [];
        if($request->hasFile('image'))
        {
            $images = $request->file('image');
            foreach($images as $image)
            {
                $new = upload_image($image, 'pages_', 'Pages');
                array_push($allImages, $new);
            }
            $data['image'] = json_encode($allImages);
        }
        else
        {
            unset($data['image']);
        }
        $page->fill($data)->save();
        return $page ? redirect(getRoute("pages.createAbout")) : redirect()->back();
    }

    //FOR PORTOFOLIO
    public  function createPortfolio()
    {
        $data = Page::where('identifier',"portfolio")->first();
        return view("admin.pages.create", ['identifier' =>"portfolio" , 'data'=>$data, 'save'=>'pages.savePortfolio']);
    }
    public  function savePortfolio(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        $page->fill($data)->save();
        return $page ? redirect(getRoute("pages.createPortfolio")) : redirect()->back();
    }
     //FOR service
     public  function createService()
     {
        $data = Page::where('identifier',"service")->first();
         return view("admin.pages.create", ['identifier' =>"service" , 'data'=>$data, 'save'=>'pages.saveService']);
     }
     public  function saveService(PageRequest $request)
     {
        $page  =  Page::where('identifier',$request->identifier)->first();
         $data =$request->all();
         $page->fill($data)->save();
         return $page ? redirect(getRoute("pages.createService")) : redirect()->back();
     }

    //FOR blog
    public  function createBlog()
    {
        $data = Page::where('identifier',"blog")->first();
        return view("admin.pages.create", ['identifier' =>"blog" , 'data'=>$data, 'save'=>'pages.saveBlog']);
    }
    public  function saveBlog(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        if( $page != null)
        {
            $page->fill($data)->save();
        }
        else 
        {
            $page = Page::create($data);
        }
      
        return $page ? redirect(getRoute("pages.createBlog")) : redirect()->back();
    }

    //FOR Plan
    public  function createPlan()
    {
        $data = Page::where('identifier',"plan")->first();
        return view("admin.pages.create", ['identifier' =>"plan" , 'data'=>$data, 'save'=>'pages.savePlan']);
    }
    public  function savePlan(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        if( $page != null)
        {
            $page->fill($data)->save();
        }
        else 
        {
            $page = Page::create($data);
        }
    
        return $page ? redirect(getRoute("pages.createPlan")) : redirect()->back();
    }

    //FOR customer
    public  function createCustomer()
    {
        $data = Page::where('identifier',"customer")->first();
        return view("admin.pages.create", ['identifier' =>"customer" , 'data'=>$data, 'save'=>'pages.saveCustomer']);
    }
    public  function saveCustomer(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        if( $page != null)
        {
            $page->fill($data)->save();
        }
        else 
        {
            $page = Page::create($data);
        }
    
        return $page ? redirect(getRoute("pages.createCustomer")) : redirect()->back();
    }

    //FOR vision
    public  function createVision()
    {
        $data = Page::where('identifier',"vision")->first();
        return view("admin.pages.create", ['identifier' =>"vision" , 'data'=>$data, 'save'=>'pages.saveVision']);
    }
    public  function saveVision(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        $allImages = [];
        if($request->hasFile('image'))
        {
            $images = $request->file('image');
            foreach($images as $image)
            {
                $new = upload_image($image, 'pages_', 'Pages');
                array_push($allImages, $new);
            }
            $data['image'] = json_encode($allImages);
        }
        else
        {
            unset($data['image']);
        }
        if( $page != null)
        {
            $page->fill($data)->save();
        }
        else 
        {
            $page = Page::create($data);
        }
    
        return $page ? redirect(getRoute("pages.createVision")) : redirect()->back();
    }

    //FOR mission
    public  function createMission()
    {
        $data = Page::where('identifier',"mission")->first();
        return view("admin.pages.create", ['identifier' =>"mission" , 'data'=>$data, 'save'=>'pages.saveMission']);
    }
    public  function saveMission(PageRequest $request)
    {
        // dd($request);
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        $allImages = [];
        if($request->hasFile('image'))
        {
            $images = $request->file('image');
            foreach($images as $image)
            {
                $new = upload_image($image, 'pages_', 'Pages');
                array_push($allImages, $new);
            }
            $data['image'] = json_encode($allImages);
        }
        else
        {
            unset($data['image']);
        }
        if( $page != null)
        {
            $page->fill($data)->save();
        }
        else 
        {
            $page = Page::create($data);
        }
    
        return $page ? redirect(getRoute("pages.createMission")) : redirect()->back();
    }
    //FOR quality
    public  function createQuality()
    {
        $data = Page::where('identifier',"quality")->first();
        return view("admin.pages.create", ['identifier' =>"quality" , 'data'=>$data, 'save'=>'pages.saveQuality']);
    }
    public  function saveQuality(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        $allImages = [];
        if($request->hasFile('image'))
        {
            $images = $request->file('image');
            foreach($images as $image)
            {
                $new = upload_image($image, 'pages_', 'Pages');
                array_push($allImages, $new);
            }
            $data['image'] = json_encode($allImages);
        }
        else
        {
            unset($data['image']);
        }
        if( $page != null)
        {
            $page->fill($data)->save();
        }
        else 
        {
            $page = Page::create($data);
        }
    
        return $page ? redirect(getRoute("pages.createQuality")) : redirect()->back();
    }
    //FOR partner
    public  function createPartner()
    {
        $data = Page::where('identifier',"partner")->first();
        return view("admin.pages.create", ['identifier' =>"partner" , 'data'=>$data, 'save'=>'pages.savePartner']);
    }
    public  function savePartner(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        $allImages = [];
        if($request->hasFile('image'))
        {
            $images = $request->file('image');
            foreach($images as $image)
            {
                $new = upload_image($image, 'pages_', 'Pages');
                array_push($allImages, $new);
            }
            $data['image'] = json_encode($allImages);
        }
        else
        {
            unset($data['image']);
        }
        if( $page != null)
        {
            $page->fill($data)->save();
        }
        else 
        {
            $page = Page::create($data);
        }
    
        return $page ? redirect(getRoute("pages.createPartner")) : redirect()->back();
    }
    //FOR team
    public  function createTeam()
    {
        $data = Page::where('identifier',"team")->first();
        return view("admin.pages.create", ['identifier' =>"team" , 'data'=>$data, 'save'=>'pages.saveTeam']);
    }
    public  function saveTeam(PageRequest $request)
    {
        $page  =  Page::where('identifier',$request->identifier)->first();
        $data =$request->all();
        $allImages = [];
        if($request->hasFile('image'))
        {
            $images = $request->file('image');
            foreach($images as $image)
            {
                $new = upload_image($image, 'pages_', 'Pages');
                array_push($allImages, $new);
            }
            $data['image'] = json_encode($allImages);
        }
        else
        {
            unset($data['image']);
        }
        if( $page != null)
        {
            $page->fill($data)->save();
        }
        else 
        {
            $page = Page::create($data);
        }
    
        return $page ? redirect(getRoute("pages.createTeam")) : redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale , Page $page)
    {
        return view("admin.pages.show" , ['page'=>$page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale , Page $page)
    {
        return view("admin.pages.show",['page'=>$page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale , PageRequest $request, Page $page)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale , Page $page)
    {
        $page->deleteTranslations();
        $page->delete();
        return redirect()->back();
    }
}

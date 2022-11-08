<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Work;
use App\Http\Requests\admin\BlogRequest;
use View;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware(function($request, $next){
            $works = Work::withTranslation()->get();
            View::share('works', $works);
       
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::withTranslation()->paginate(paginationNumber());
       return view("admin.blogs.index" , ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
          $data = $request->all();
          if($request->hasFile('image'))
          {  
              $data['image'] = upload_image($request->file('image') , '_blogs_' , 'Blogs') ;
          } 
          else
          {
              $data['image'] = "defaults/service.jpg";
          }
          $blog = Blog::create($data);
          return $blog ? redirect(getRoute('blogs.index')) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale , Blog $blog)
    {
        return view("admin.blogs.show" , ['blog'=>$blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale , Blog $blog)
    {
        return view("admin.blogs.edit" , ['blog' =>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request,$locale , Blog $blog)
    {
        $data = $request->all();

        if($request->hasFile('image'))
        {
           
            $data['image'] = upload_image($request->file('image') , '_blogs_' , 'Blogs') ;
        } 
        else
        {
            $data['image'] =$blog->image;
        }
        $blog->fill($data)->save();
        return $blog ? redirect(getRoute('blogs.index')) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale , Blog $blog)
    {
        $blog->deleteTranslations();
        $blog->delete();
        return redirect()->back();
    }
}

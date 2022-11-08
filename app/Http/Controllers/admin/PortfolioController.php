<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Requests\admin\PortfolioRequest;
use View;
class PortfolioController extends Controller
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
        $data = Portfolio::withTranslation()->paginate(paginationNumber());
       return view("admin.portfolios.index" , ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("admin.portfolios.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {  
            $data['image'] = upload_image($request->file('image') , '_portfolios_' , 'Portfolios') ;
        } 
        else
        {
            $data['image'] = "defaults/service.jpg";
        }
        $portfolio = Portfolio::create($data);
        return $portfolio ? redirect(getRoute('portfolios.index')) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale , Portfolio $portfolio)
    {
      return view("admin.portfolios.show" , ['portfolio' => $portfolio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale , Portfolio $portfolio)
    {
          return view("admin.portfolios.edit" , ['portfolio' => $portfolio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(  $locale , PortfolioRequest $request, Portfolio  $portfolio)
    {
       
        $data = $request->all();

        if($request->hasFile('image'))
        {
           
            $data['image'] = upload_image($request->file('image') , '_portfolios_' , 'Portfolios') ;
        } 
        else
        {
            $data['image'] =$portfolio->image;
        }
        $portfolio->fill($data)->save();
        return $portfolio ? redirect(getRoute('portfolios.index')) : redirect()->back();
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale , Portfolio $portfolio)
    {
        $portfolio->deleteTranslations();
        $portfolio->delete();
        return redirect()->back();
    }
}

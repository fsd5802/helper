<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
Route::group(['prefix' => '{locale}' ,  'middleware' => ['SwitchLanguage','IsAdmin']] , function(){

    Route::group(['prefix' => 'admin'] , function(){

        //my routes for admin will be here;
        Route::get('/' , [App\Http\Controllers\admin\HomeController::class , 'index']);

        //for blogs works
        Route::resource('blogs' , 'App\Http\Controllers\admin\BlogController');

          //for Works
        Route::resource('works' , 'App\Http\Controllers\admin\WorkController');

        //for blogs works
        Route::resource('portfolios' , 'App\Http\Controllers\admin\PortfolioController');

        //for testimonials
        Route::resource('testmonials' , 'App\Http\Controllers\admin\TestimonialController');

        //for sliders
        Route::resource('sliders' , 'App\Http\Controllers\admin\SliderController');

        //for admins
        Route::resource('admins' , 'App\Http\Controllers\admin\AdminController');

        //for services
        Route::resource('services' , 'App\Http\Controllers\admin\ServiceController');

        //for contactus
        Route::resource('contacts' , 'App\Http\Controllers\admin\ContactController');

        //for plans
        Route::resource('plans' , 'App\Http\Controllers\admin\PlanController');

        //for settings
        Route::resource('settings' , 'App\Http\Controllers\admin\SettingController');

        Route::resource('invoices' , 'App\Http\Controllers\admin\InvoiceController');
      
        // Route::resource('invoice', InvoiceController::class);


       //for icons
       Route::resource('icons' , 'App\Http\Controllers\admin\IconController');
       Route::resource('/product','App\Http\Controllers\admin\ProductController');

       //for pages about
       Route::get('pages/about/create' , 'App\Http\Controllers\admin\PageController@createAbout')->name("pages.createAbout");
       Route::post('pages/about/store' , 'App\Http\Controllers\admin\PageController@saveAbout')->name("pages.saveAbout");

       //for pages portfolio
       Route::get('pages/portfolio/create' , 'App\Http\Controllers\admin\PageController@createPortfolio')->name("pages.createPortfolio");
       Route::post('pages/portfolio/store' , 'App\Http\Controllers\admin\PageController@savePortfolio')->name("pages.savePortfolio");

        //for pages service
       Route::get('pages/service/create' , 'App\Http\Controllers\admin\PageController@createService')->name("pages.createService");
       Route::post('pages/service/store' , 'App\Http\Controllers\admin\PageController@saveService')->name("pages.saveService");


       //for pages blog
       Route::get('pages/blog/create' , 'App\Http\Controllers\admin\PageController@createBlog')->name("pages.createBlog");
       Route::post('pages/blog/store' , 'App\Http\Controllers\admin\PageController@saveBlog')->name("pages.saveBlog");

       //for pages Plan
       Route::get('pages/plan/create' , 'App\Http\Controllers\admin\PageController@createPlan')->name("pages.createPlan");
       Route::post('pages/plan/store' , 'App\Http\Controllers\admin\PageController@savePlan')->name("pages.savePlan");

       //for pages customer
       Route::get('pages/customer/create' , 'App\Http\Controllers\admin\PageController@createCustomer')->name("pages.createCustomer");
       Route::post('pages/customer/store' , 'App\Http\Controllers\admin\PageController@saveCustomer')->name("pages.saveCustomer");

       //for pages vision
       Route::get('pages/vision/create' , 'App\Http\Controllers\admin\PageController@createVision')->name("pages.createVision");
       Route::post('pages/vision/store' , 'App\Http\Controllers\admin\PageController@saveVision')->name("pages.saveVision");

      //for pages mission
      Route::get('pages/mission/create' , 'App\Http\Controllers\admin\PageController@createMission')->name("pages.createMission");
      Route::post('pages/mission/store' , 'App\Http\Controllers\admin\PageController@saveMission')->name("pages.saveMission");

      //for pages quality
      Route::get('pages/quality/create' , 'App\Http\Controllers\admin\PageController@createQuality')->name("pages.createQuality");
      Route::post('pages/quality/store' , 'App\Http\Controllers\admin\PageController@saveQuality')->name("pages.saveQuality");

      //for pages partener
      Route::get('pages/partner/create' , 'App\Http\Controllers\admin\PageController@createPartner')->name("pages.createPartner");
      Route::post('pages/partner/store' , 'App\Http\Controllers\admin\PageController@savePartner')->name("pages.savePartner");

      //for pages team
      Route::get('pages/team/create' , 'App\Http\Controllers\admin\PageController@createTeam')->name("pages.createTeam");
      Route::post('pages/team/store' , 'App\Http\Controllers\admin\PageController@saveTeam')->name("pages.saveTeam");
      
      Route::get('orders' , 'App\Http\Controllers\admin\OrderController@orders')->name("orders");

    });
});



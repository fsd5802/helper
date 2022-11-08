<?php

// use App\Http\Controllers\user\InvoiceFrontController;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => '{locale}' , 'middleware' => 'SwitchLanguage'] , function(){

    Route::get('/' , [App\Http\Controllers\user\HomeController::class , 'index']);

    Route::get('/aboutus' , [App\Http\Controllers\user\HomeController::class , 'aboutus'])->name("aboutus");
    Route::get('/customers' , [App\Http\Controllers\user\HomeController::class , 'customers'])->name("customers");
    Route::get('/works' , [App\Http\Controllers\user\HomeController::class , 'works'])->name("works");
    Route::get('/services' , [App\Http\Controllers\user\HomeController::class , 'services'])->name("services");
    Route::get('/services/{id}' , [App\Http\Controllers\user\HomeController::class , 'single_service'])->name("single_service");
    Route::get('/blogs' , [App\Http\Controllers\user\HomeController::class , 'blogs'])->name("blogs");
    Route::get('/blogs/{id}' , [App\Http\Controllers\user\HomeController::class , 'single_blog'])->name("single_blog");

    //contact us form :
    Route::get('/contactus' , [App\Http\Controllers\user\HomeController::class , 'getContactUs'])->name("getContactUs");
    Route::post('/contactus' , [App\Http\Controllers\user\HomeController::class , 'handleContactUs'])->name("handleContactUs");

    //planss
    Route::get('/plans' , [App\Http\Controllers\user\HomeController::class , 'plans'])->name("plans");
    Route::get('/products' , [App\Http\Controllers\user\ProductController::class , 'products'])->name("products");
    Route::get('/product/{id}' , [App\Http\Controllers\user\ProductController::class , 'single_product'])->name("single_product");
    Route::get('/add_cart/{id}' , [App\Http\Controllers\user\ProductController::class , 'add_to_cart'])->name("add_to_cart");
    Route::get('/cart' , [App\Http\Controllers\user\ProductController::class , 'cart'])->name("cart");
    Route::get('/checkOut' , [App\Http\Controllers\user\ProductController::class , 'checkOut'])->name("checkOut");
    Route::post('/post_checkout' , [App\Http\Controllers\user\ProductController::class , 'post_checkout'])->name("post_checkout");
    Route::post('/invoice_checkout' , [App\Http\Controllers\user\ProductController::class , 'invoice_checkout'])->name("invoice_checkout");


    // //from jetstream
    // Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    //test register
    // Route::post('/register' ,[App\Http\Controllers\Auth\RegisterController::class , 'handleRegister'] )->name("handleRegister");

    Route::get('routes', function () {
        $routeCollection = Route::getRoutes();
        
        echo "<table style='width:100%'>";
        echo "<tr>";
        echo "<td width='10%'><h4>HTTP Method</h4></td>";
        echo "<td width='10%'><h4>Route</h4></td>";
        echo "<td width='10%'><h4>Name</h4></td>";
        echo "<td width='70%'><h4>Corresponding Action</h4></td>";
        echo "</tr>";
        foreach ($routeCollection as $value) {
            echo "<tr>";
            echo "<td>" . $value->methods()[0] . "</td>";
            echo "<td>" . $value->uri() . "</td>";
            echo "<td>" . $value->getName() . "</td>";
            echo "<td>" . $value->getActionName() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    });

    Route::get('/cancel_payment' , [App\Http\Controllers\user\ProductController::class , 'cancel_payment'])->name("cancel_payment");
    Route::get('/success_payment' , [App\Http\Controllers\user\ProductController::class , 'success_payment'])->name("success_payment");


    Route::resource('invoice', App\Http\Controllers\user\InvoiceFrontController::class);
    Route::get('success_invoice/{id}' , [App\Http\Controllers\user\InvoiceFrontController::class , 'success_invoice'])->name("success_invoice");
    Route::get('/cancel_invoice/{id}' , [App\Http\Controllers\user\InvoiceFrontController::class , 'cancel_invoice'])->name("cancel_invoice");
    Route::get('payment_request/{id}/{seeion_id}' , [App\Http\Controllers\user\InvoiceFrontController::class , 'step2'])->name("invoice_step2");

});
//login part
    Route::get('/login' ,[App\Http\Controllers\Auth\LoginController::class , 'index'] )->name("login");
    Route::get('/cancel/{id}' , [App\Http\Controllers\user\ProductController::class , 'cancel'])->name("cancel");
    Route::get('/success/{id}' , [App\Http\Controllers\user\ProductController::class , 'success'])->name("success");
    Route::post('/login-from' ,[App\Http\Controllers\Auth\LoginController::class , 'handleLogin'] )->name('handleLogin');

    
    
    
    Route::get('/logout' ,[App\Http\Controllers\Auth\LoginController::class , 'logout'] )->name("logout");
// Route::get('/register' ,[App\Http\Controllers\Auth\RegisterController::class , 'register'] )->name("register");


// Route::get('/login' , function(){
//     return view("errors.404");
// })->name("login_admin");

//to redirect for home if he dosnt enter any lang
Route::get('/', function () {

    return redirect(app()->getLocale());
});




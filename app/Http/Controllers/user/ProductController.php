<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Cart;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::get();
        return view('user.products', compact('products'));
    }

    public function add_to_cart($local, $id)
    {
        $product = Product::find($id);

        Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
        ));
        $cartCollection = Cart::getContent();
        return redirect(getRoute('products'))->with(['message' => 'product added to cart']);

    }

    public function cart()
    {
        $cartCollection = Cart::getContent();
        // return redirect()->back();
        $total_price = \Cart::getTotal();
        return view('user.cart', compact('cartCollection', 'total_price'));
    }

    public function checkOut($local)
    {
        $total_price = \Cart::getTotal();

        return view('user.checkOut', compact('total_price'));
    }

    public function post_checkout($local, Request $request)
    {
        $amount = \Cart::getTotal();
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->total_price =$amount ;
        $order->status = "pending";
        $order->save();
        $order_id = ($order->id)*10;
        $cartCollection = Cart::getContent();

        foreach ($cartCollection as $item) {
            $orderDetails = new OrderDetail();
            $orderDetails->product_id = $item->id;
            $orderDetails->total = $item->price * $item->quantity;
            $orderDetails->quantity = $item->quantity;
            $orderDetails->order_id = $order->id;
            $orderDetails->save();
        }
        
            if (isset($_POST['ahly'])) {
        $username='merchant.MARWANGROUP';
        $password='21aaeea3f3a99f36191b7274cdeecb37';
        $url = 'https://nbe.gateway.mastercard.com/api/rest/version/61/merchant/MARWANGROUP/session';
        $data = array("apiOperation" => "CREATE_CHECKOUT_SESSION",
        "interaction" => array ("operation" => "PURCHASE" ,"returnUrl" =>"https://marwan.tech/success/".$order->id,"cancelUrl" => "https://marwan.tech/cancel/".$order->id),
        "order" => array ("currency" => "EGP" ,"id" => $order_id,"amount" => $amount)
            );
        $postdata = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $result = curl_exec($ch);
        curl_close($ch);
        $seeion_id = json_decode($result)->session->id ;
            }
            elseif (isset($_POST['marawan'])) {
                $username='merchant.TESTEGPTEST';
                $password='c622b7e9e550292df400be7d3e846476';
                $url = 'https://test-nbe.gateway.mastercard.com/api/rest/version/65/merchant/TESTEGPTEST/session';
                
                $data = array("apiOperation" => "INITIATE_CHECKOUT",
                    "interaction" => array ("operation" => "AUTHORIZE" ,"returnUrl" =>"https://marwan.tech/success/".$order->id,"cancelUrl" => "https://marwan.tech/cancel/".$order->id),
                    "order" => array ("currency" => "EGP" ,"id" => $order_id,"amount" => $amount,"description"=>'description')
                    );
                    
                
                    
                    
                    
                $postdata = json_encode($data);
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
                $result = curl_exec($ch);
                curl_close($ch);
                $seeion_id = json_decode($result)->session->id ;


                $newUrl = 'https://test-nbe.gateway.mastercard.com/api/rest/version/65/merchant/TESTEGPTEST/session/'.$seeion_id;

                $data_two = array("apiOperation" => "UPDATE_SESSION",
                    "order" => array ("currency" => "EGP" ,"id" => $order_id,"amount" => $amount)
                );
                
                
                 $postdata_two = json_encode($data_two);
                $ch = curl_init($newUrl);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata_two);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
                $result = curl_exec($ch);
 
                curl_close($ch);

                // $seeion_id = json_decode($result)->session->id ;
                

                 return view('user.marwan_payment',compact('seeion_id'));


               
                # Save-button was clicked
            }
        
        






        return view('user.payment',compact('seeion_id','order_id','amount'));
    }
    public function invoice_checkout($local, Request $request)
    {
        $request->validate([        
            'name' =>"required",
            'email' =>"required|email",
            'phone' =>"required|numeric",
            'product_id' =>"required",
            'price' =>"required|numeric",],
            [
            'name.required' => trans("custom_validation.name_req"),
            'phone.required' => trans("custom_validation.phone_req"),
            'email.required' => trans("custom_validation.email_req"),
            'product_id.required' => trans("custom_validation.product_req"),
            'price.required' => trans("custom_validation.msg_req"),
    ]);
    
    $data=$request->all();     
    $last_invoice = Invoice::create($data);
        
        $username='merchant.MARWANGROUP';
        $password='21aaeea3f3a99f36191b7274cdeecb37';
        $url = 'https://nbe.gateway.mastercard.com/api/rest/version/61/merchant/MARWANGROUP/session';
        $data = array("apiOperation" => "CREATE_CHECKOUT_SESSION",
        "interaction" => array ("operation" => "PURCHASE" ,"returnUrl" =>"https://marwan.tech/success_invoice/".$last_invoice->id,"cancelUrl" => "https://marwan.tech/cancel_invoice/".$last_invoice->id),
        "order" => array ("currency" => "EGP" ,"id" => $last_invoice->id,"amount" => $last_invoice->price)
            );
        $postdata = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $result = curl_exec($ch);
        curl_close($ch);
        $seeion_id = json_decode($result)->session->id ;
        $order_id=$last_invoice->id;
        $amount=$last_invoice->price;
        
        return view('user.payment',compact('seeion_id','order_id','amount'));
    }
    
    public function cancel($id){
        $order = Order::find($id);
        $order->status = 'cancelled';
        $order->save();
        Cart::clear();
        
        return redirect(getRoute('cancel_payment'));
    }
    
    public function cancel_payment($local){
        return view('user.cancel_payment');
    }
    
    public function success($id){
        $order = Order::find($id);
        $order->status = 'success';
        $order->save();
        $cartCollection = Cart::getContent();
        foreach ($cartCollection as $item) {
            $product = Product::findOrFail($item->id);
            $product->count = $product->count - $item->quantity;
            $product->save();
        }
                Cart::clear();

        return redirect(getRoute('success_payment'));
    }
    public function success_payment(){
        return view('user.success_payment');
    }
}

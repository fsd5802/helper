<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use App\http\Requests\user\InvoiceRequest;


class InvoiceFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $flag=null!=$request->input('flag')?$request->input('flag'):null;
        $products=Product::get();
        return view('user.invoice',compact('products','flag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $username='merchant.TESTEGPTEST';
        $password='c622b7e9e550292df400be7d3e846476';
        $url = 'https://test-nbe.gateway.mastercard.com/api/rest/version/63/merchant/TESTEGPTEST/session';
        $data = array(
            "session" => array ( "authenticationLimit"=> 25)
            );

        //create session
        $postdata = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $result1 = curl_exec($ch);
        curl_close($ch);
        $seeion_id = json_decode($result1)->session->id ;
        // dd($seeion_id);


        //update session
        $newUrl = 'https://test-nbe.gateway.mastercard.com/api/rest/version/63/merchant/TESTEGPTEST/session/'.$seeion_id;

         $data_two = array(
            "apiOperation" => "UPDATE_SESSION",
            "order" => array (
                "currency" => "EGP" ,
                // "id" => '11'.$last_invoice->id,
                "amount" => $last_invoice->price
            ),
        );

        $postdata_two = json_encode($data_two);
        $ch2 = curl_init($newUrl);
        // curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $postdata_two);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch2, CURLOPT_USERPWD, "$username:$password");
        $result2 = curl_exec($ch2);
        curl_close($ch2);
        // dd($result2);


        return view('user.marwan_payment',compact('seeion_id', 'last_invoice'));

    }


    public function step2 ($locale, $id, $seeion_id)
    {

        $invoice = Invoice::find($id);
        //Auth session
        $username='merchant.TESTEGPTEST';
        $password='c622b7e9e550292df400be7d3e846476';
        $authUrl = 'https://test-nbe.gateway.mastercard.com/api/rest/version/63/merchant/TESTEGPTEST/order/11'.$invoice->id.'/transaction/1';

        $data_three = array(
            "apiOperation" => "INITIATE_AUTHENTICATION",
            "authentication" => array(
                "acceptVersions" => "3DS1,3DS2",
                "channel" => "PAYER_BROWSER",
                "purpose" => "PAYMENT_TRANSACTION"
                        ),
            "order"=> array(
                "currency"=> "EGP"
                        ),
            "session" => array (
                "id" => $seeion_id
            ),
        );


        $postdata_three = json_encode($data_three);
        $ch3 = curl_init($authUrl);
        // curl_setopt($ch3, CURLOPT_POST, 1);
        curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch3, CURLOPT_POSTFIELDS, $postdata_three);
        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch3, CURLOPT_USERPWD, "$username:$password");
        $result3 = curl_exec($ch3);

        curl_close($ch3);
        $result3;
        sleep(10);
        // dd($result3);
        $data_four = array(
                    "apiOperation"=> "AUTHENTICATE_PAYER",
                    "order"=> array(
                            "amount"=> $invoice->price,
                            "currency"=> "EGP"
                                ),
                    "session"=> array(
                        "id"=> $seeion_id
                    ),
                    "device" => array (
                       "browserDetails" => array (
                             "javaEnabled"=> "false",
                             "language"=> "json",
                             "screenHeight"=> "1000",
                             "screenWidth"=> "400",
                             "timeZone"=> "+200",
                             "colorDepth"=> "20",
                             "acceptHeaders"=> "512",
                             "3DSecureChallengeWindowSize"=> "250_X_400"
                             ),
                        "browser"=> "Chrome",
                        "ipAddress"=> "192.0.1.1"
                        ),
                    );


                $postdata_four = json_encode($data_four);
                // dd($postdata_four);
                $ch4 = curl_init($authUrl);
                // curl_setopt($ch3, CURLOPT_POST, 1);
                curl_setopt($ch4, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch4, CURLOPT_POSTFIELDS, $postdata_four);
                curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch4, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch4, CURLOPT_USERPWD, "$username:$password");
                $result4 = curl_exec($ch4);
                curl_close($ch4);
                $result4decode = json_decode( $result4, true );

                if (isset($result4decode['authentication'])){
                     $transaction_id = $result4decode['authentication']['3ds']['transactionId'];
                } else {
                    dd($result4);
//                    return redirect()->route('cancel_invoice', ['ar', $invoice->id ]);
                }


                // dd($transaction_id);

                // //Pay
                $payUrl = 'https://test-nbe.gateway.mastercard.com/api/rest/version/63/merchant/TESTEGPTEST/order/'.$invoice->id.'/transaction/1';

                $data_five = array(
                    "apiOperation" => "PAY",
                    "order" => array (
                        "currency" => "EGP",
                        "amount" => $invoice->price
                        ),
                    "session" => array (
                        "id" => $seeion_id
                        ),
                    "sourceOfFunds" => array (
                        "type" =>"CARD"
                        ),
                    "authentication" => array (
                        "3ds" =>array (
                            "acsEci" => "02",
                            "authenticationToken" => "jHyn+7YFi1EUAREAAAAvNUe6Hv8=",
                            "transactionId" => $transaction_id
                            ),
                            "3ds2"=>array(
                                "transactionStatus"=>"Y"
                                )
                                ),
                );


                $data_five = json_encode($data_five);
                $ch5 = curl_init($payUrl);
                // curl_setopt($ch5, CURLOPT_POST, 1);
                curl_setopt($ch5, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch5, CURLOPT_POSTFIELDS, $data_five);
                curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch5, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch5, CURLOPT_USERPWD, "$username:$password");
                $result5 = curl_exec($ch5);

                curl_close($ch5);
                // dd($result5 );
                $result5;
                $result5decode = json_decode( $result5, true );
                 if( isset($result5decode['result']) && $result5decode['result'] == "SUCCESS" ) {
                     return redirect()->route('success_invoice', ['ar', $invoice->id ]);
                 }else {
                     dd('pay error',$result5);
//                     return redirect()->route('cancel_invoice', ['ar', $invoice->id ]);
                 }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function cancel_invoice($loacle, $id){
        $invoice=Invoice::findOrFail($id);
        $invoice->update(["status"=>"canceled"]);
        return view('user.cancel_payment');
    }

    public function success_invoice($loacle, $id){
        $invoice=Invoice::findOrFail($id);
        $invoice->update(["status"=>"success"]);
        return view('user.success_payment');
    }



}

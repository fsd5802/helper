@extends('layouts.master')
@section('title')
    payment
@endsection
@section('content')
@include('user.includes.header' , ['header_name' =>'payment' , 'link_name' => 'services' ])

        <script src="https://nbe.gateway.mastercard.com/checkout/version/61/checkout.js"
                data-error="error callback"
                data-cancel="cancel callback">
        </script>
        <script type="text/javascript">
            function errorCallback(error) {
                console.log(JSON.stringify(error));
            }
            function cancelCallback() {
                console.log('Payment cancelled');
            }
            function completeCallback() {
                console.log('Payment completed');
            }
            Checkout.configure({
                session: {
                    id: '{{$seeion_id}}'
                },
                order: {
                    amount: function () {
                        //Dynamic calculation of amount
                        return {{$amount}} + 0;
                    },
                    currency: 'EGP',
                    description: 'Ordered goods',
                    id: {{$order_id}},
                },
                 interaction: {
                    operation: 'PURCHASE',
                    merchant: {
                         name: 'Marwan Tech',
                         address: {
                             line1: '200 Sample St',
                             line2: '1234 Example Town'
                        }
                    }
                },
            });
        </script>
        
        
    <section class="str-feature-section str-feature-section-page">
        <div class="container">
            <div class="str-feature-content">
                <div class="container">
                    <div class="content">        
        
        
                        <div class="row text-center">
                            <div Class="col-12">
                                  <div class="str-feature-icon"><img src="https://marwan.tech/storage/1.png" style="width:400px">
                                        </div>
                                {{-- <input type="button" class="btn btn-primary" value="Pay with Lightbox" onclick="Checkout.showLightbox();" /> --}}
                                <input type="button" class="btn btn-primary" value="Pay with Payment Page" onclick="Checkout.showPaymentPage();" />
                            </div>
                        </div>
                      
                  </div>
                </div>

            </div>
        </div>
    </section>      
      
      @endsection

 

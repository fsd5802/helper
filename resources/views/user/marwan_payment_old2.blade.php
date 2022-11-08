@extends('layouts.master')
@section('title')
    Check out
@endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.services') , 'link_name' => 'services' ])

    <section class="p-5">
        <div class="container text-center">
            <div id="embed-target"> </div> 
              <input type="button" class="btn btn-primary" value="ابدا عملية الدفع " onclick="Checkout.showEmbeddedPage('#embed-target');" />
              {{-- <input type="button" value="Pay with Payment Page" onclick="Checkout.showPaymentPage();" /> --}}
        </div>
    </section>
@endsection
@push('js-footer')
<script src="https://test-nbe.gateway.mastercard.com/static/checkout/checkout.min.js" data-error="errorCallback" data-cancel="cancelCallback"></script>
        <script type="text/javascript">
            function errorCallback(error) {
                  console.log(JSON.stringify(error));
            }
            function cancelCallback() {
                  console.log('Payment cancelled');
            }
            Checkout.configure({
              session: { 
            	id: '{{$seeion_id}}'
       			},
				    merchant: "TESTEGPTEST",
              interaction: {
                    merchant: {
                        name: 'Marwan',
                        address: {
                            line1: '200 Sample St',
                            line2: '1234 Example Town'            
                        }    
                    }
               }
            });
        </script>
@endpush

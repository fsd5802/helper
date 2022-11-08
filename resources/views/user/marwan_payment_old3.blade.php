@extends('layouts.master')
@section('title')
    Check out
@endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.services') , 'link_name' => 'services' ])

    <section class="p-5">
        <div class="container">
           <div id="threedsChallengeRedirect" xmlns="http://www.w3.org/1999/html">
                <form id="threedsChallengeRedirectForm" method="POST"
                    action="https://mtf.gateway.mastercard.com/acs/mastercard/v2/prompt" target="challengeFrame"> 
                    <input type="hidden" name="creq" value="{{ $method_data }}" /> 
                </form>
                <iframe id="challengeFrame" name="challengeFrame" width="1200" height="600"></iframe>
                <script id="authenticate-payer-script"> 
                    var e = document.getElementById("threedsChallengeRedirectForm"); 
                    if (e) { 
                        e.submit(); 
                        if (e.parentNode !== null) { 
                            e.parentNode.removeChild(e);
                        }
                    } 
                </script>
            </div>
        </div>
    </section>
@endsection
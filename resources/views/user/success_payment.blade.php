@extends('layouts.master')
@section('title')
    payment success
@endsection
@section('content')
@include('user.includes.header' , ['header_name' =>'payment success' , 'link_name' => 'services' ])

        
    <section class="str-feature-section str-feature-section-page">
        <div class="container">
            <div class="str-feature-content">
                <div class="container">
                    <div class="content">        
        
        
                        <div class="row">
                            <div Class="col-12 text-center">
                                <i class="fas fa-check" style="font-size:50px; color:green;"></i>
                                <h3>Payment Success</h3>
                                <a href="/" class="btn btn-primary text-white">Go To Home</a>
                            </div>
                        </div>
                      
                  </div>
                </div>

            </div>
        </div>
    </section>      
@endsection

 

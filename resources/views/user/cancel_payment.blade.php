@extends('layouts.master')
@section('title')
    payment cancel
@endsection
@section('content')
@include('user.includes.header' , ['header_name' =>'payment cancel' , 'link_name' => 'services' ])

        
    <section class="str-feature-section str-feature-section-page">
        <div class="container">
            <div class="str-feature-content">
                <div class="container">
                    <div class="content">        
        
        
                        <div class="row">
                            <div Class="col-12 text-center">
                                <h3>Payment cancelled</h3>
                                <a href="{{getRoute('invoices.create')}}" class="btn btn-primary text-white"> go to store</a>
                            </div>
                        </div>
                      
                  </div>
                </div>

            </div>
        </div>
    </section>      
@endsection

 

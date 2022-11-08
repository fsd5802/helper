@extends('layouts.master')
@section('title') products  @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.services') , 'link_name' => 'services' ])

<section class="str-feature-section str-feature-section-page">
    <div class="container">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        <div class="str-feature-content">
            <div class="row">
                @if (count($products) >0)
                    @foreach ( $products as $product )
                        <div class="col-lg-4 col-md-6">
                            <div class="str-feature-box wow fadeFromUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <a href="{{ getRoute("single_product", $product->id) }}">
                                    <div class="str-hover-icon text-center"><i class="fas fa-plus"></i></div>
                                    <div class="str-feature-icon-text text-center">
                                        <div class="str-feature-icon"><img src="https://marwan.tech/storage/Services/_services_514-1640779713.png" alt="{{ $product->name }}">
                                        </div>
                                    </a>
                                        <div class="str-feature-text str-headline">
                                            <h3>{{ $product->name }}</h3>
                                            <div class="str-feature-list ul-li-block">
                                              <p>{!! strip_tags(Str::limit($product->description, 150 ,'...')) !!}</p>
                                              <span>السعر :  {{ $product->price }}</span></a><br>
                                              <a class="add_to_cart" href="{{getRoute('add_to_cart', $product->id)}}">
                                                <i class="fa fa-cart-arrow-down"></i>
                                                <span>أضف إلى السلة</span></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <div class="totals-content">
                <div class="text-center">
                    <a href="{{getRoute('cart')}}" class="btn btn-primary" style="color: white">got to cart ({{count( \Cart::getContent())}}) </a>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection

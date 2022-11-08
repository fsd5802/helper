@extends('layouts.master')
@section('title') cart  @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.services') , 'link_name' => 'services' ])

<section class="str-feature-section str-feature-section-page">
    <div class="container">

        <div class="str-feature-content">
            <div class="row">
                @if (count($cartCollection) >0)
                    @foreach (Cart::getContent() as $row )
                        <div class="col-lg-4 col-md-6">
                            <div class="str-feature-box wow fadeFromUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <a href="{{ getRoute("single_product", $row->id) }}">
                                    <div class="str-hover-icon text-center"><i class="fas fa-plus"></i></div>
                                    <div class="str-feature-icon-text text-center">
                                        <div class="str-feature-icon"><img src="https://marwan.tech/storage/Services/_services_514-1640779713.png" alt="{{ $row->name }}">
                                        </div>
                                    </a>
                                        <div class="str-feature-text str-headline">
                                            <h3>{{ $row->name }}</h3>
                                            <div class="str-feature-list ul-li-block">
                                              <p>{!! strip_tags(Str::limit((product_details($row->id)->description), 150 ,'...')) !!}</p>
                                              <a class="add_to_cart" href="{{getRoute('add_to_cart',$row->id)}}">
                                                <i class="fa fa-cart-arrow-down"></i>
                                                <span>أضف إلى السلة</span></a><br>
                                                <span>السعر : {{$row->price}}</span></a><br>
                                                <span>  عدد الوحدات : {{$row->quantity}}</span></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <div class="totals-content">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>المجموع الكلي</td>
                          <td id="totalPrice">{{$total_price}} EGP</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="{{getRoute('checkOut')}}" class="btn btn-primary" style="color: white">check out </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

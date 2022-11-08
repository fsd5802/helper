@extends('layouts.master')
@section('title')
    Check out
@endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.services') , 'link_name' => 'services' ])

    <section class="str-feature-section str-feature-section-page">
        <div class="container">
            <div class="str-feature-content">
                <div class="container">
                    <div class="content">
                        <!--alerts-->
                        <!--form-->
                        <div class="checkout-form">
                            <div class="title">
                                <h4>معلومات الدفع</h4>
                            </div>
                            <form action="{{getRoute('post_checkout')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">الاسم *</label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">الهاتف *</label>
                                            <input class="form-control" type="number" name="phone" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">العنوان *</label>
                                            <input class="form-control" type="text" name="address" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="title">
                                    <h4>معلومات المنتج</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>اسم المنتج</th>
                                                <th>السعر</th>
                                                <th>الكمية</th>
                                                <th>المجموع</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count(Cart::getContent()) > 0)
                                                @foreach (Cart::getContent() as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->price}}</td>
                                                        <td class="amount">{{$row->quantity}}</td>
                                                        <td> {{$row->quantity * $row->price}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td>المجموع الكلي</td>
                                                <td class="all-total"><span>{{$total_price}}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="checkout-btn">
                                        <div class="outer-btn">
                                            <button class="btn btn-primary" name="ahly" type="submit"><img src="https://marwan.tech/storage/1.png" style="width:30px">  الدفع من خلال البنك الاهلي</button>
                                            <!--<button class="btn btn-primary" name="marawan"  type="submit"><img src="https://marwan.tech/storage/Settings/settings_152-1639569616.png" style="width:30px">  الدفع من خلال مروان جروب </button>-->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

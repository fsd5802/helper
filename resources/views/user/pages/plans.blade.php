@extends('layouts.master')
@section('title') @lang('user.header.plans') @endsection
@section('content')
@include('user.includes.header' , ['header_name' => __('user.header.plans') , 'link_name' => 'plans' ])



@if(count($plans) >0)
<section class="s2-pricing_section" id="s2-pricing">
  <div class="container-fluid">
    <div class="saas_two_section_title saas2-headline text-center"><span class="title_tag">{{ pages('plan')->name }}</span>
      <h3>{!! pages('plan')->desc !!}</h3>
    </div>
    <!-- /section title-->

    <div class="s2-pricing_content">
      <div class="row justify-content-md-center">
        @foreach($plans as $plan)
        <div class="col-lg-3 col-md-6 wow fadeFromLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms"
          style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeFromLeft;">
          <div class="s2-pricing_item">
            <div class="s2-pricing_price relative-position clearfix">
              <div class="pricing_icon  float-left text-center">
                <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="m509.472656 259.800781c1.632813-2.449219 2.527344-5.417969 2.527344-8.363281v-236.367188c.003906-8.199218-6.859375-15.070312-15.035156-15.070312h-235.902344c-6.914062 0-13.113281 4.949219-14.65625 11.703125l-69.167969 302.890625c-7.230469 6.433594-13.390625 8.175781-21.199219 10.378906-11.878906 3.347656-26.660156 7.515625-43.347656 27.667969-16.375 19.78125-18.917968 36.898437-21.160156 52.007813-1.980469 13.351562-3.546875 23.898437-14.558594 37.199218-10.640625 12.847656-18.375 14.925782-29.078125 17.800782-12.332031 3.316406-27.683593 7.4375-44.429687 27.667968-5.300782 6.402344-4.417969 15.902344 1.96875 21.214844 2.808594 2.332031 6.210937 3.46875 9.59375 3.46875 4.320312 0 8.605468-1.855469 11.578125-5.445312 10.640625-12.847657 18.371093-14.925782 29.074219-17.800782 12.335937-3.3125 27.6875-7.4375 44.433593-27.667968 16.375-19.777344 18.917969-36.898438 21.160157-52.003907 1.984374-13.355469 3.550781-23.902343 14.5625-37.203125 10.703124-12.929687 18.101562-15.015625 28.347656-17.902344 9.886718-2.789062 21.789062-6.15625 35.121094-18.824218l301.011718-69.023438c3.710938-.851562 7.046875-3.15625 9.15625-6.328125zm-239.816406-214.820312 88.097656 88.273437-140.382812 140.664063zm27.703125-14.847657h163.308594l-81.65625 81.816407zm81.65625 124.425782 88.097656 88.277344-228.476562 52.386718zm21.261719-21.304688 81.652344-81.816406v163.636719zm0 0">
                  </path>
                </svg>
              </div>
              <div class="s2-pricing_text"><span>{{ $plan->name }}</span><strong>${{ $plan->price }}</strong></div>
              <div class="s2-icon_bg">
                <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="m509.472656 259.800781c1.632813-2.449219 2.527344-5.417969 2.527344-8.363281v-236.367188c.003906-8.199218-6.859375-15.070312-15.035156-15.070312h-235.902344c-6.914062 0-13.113281 4.949219-14.65625 11.703125l-69.167969 302.890625c-7.230469 6.433594-13.390625 8.175781-21.199219 10.378906-11.878906 3.347656-26.660156 7.515625-43.347656 27.667969-16.375 19.78125-18.917968 36.898437-21.160156 52.007813-1.980469 13.351562-3.546875 23.898437-14.558594 37.199218-10.640625 12.847656-18.375 14.925782-29.078125 17.800782-12.332031 3.316406-27.683593 7.4375-44.429687 27.667968-5.300782 6.402344-4.417969 15.902344 1.96875 21.214844 2.808594 2.332031 6.210937 3.46875 9.59375 3.46875 4.320312 0 8.605468-1.855469 11.578125-5.445312 10.640625-12.847657 18.371093-14.925782 29.074219-17.800782 12.335937-3.3125 27.6875-7.4375 44.433593-27.667968 16.375-19.777344 18.917969-36.898438 21.160157-52.003907 1.984374-13.355469 3.550781-23.902343 14.5625-37.203125 10.703124-12.929687 18.101562-15.015625 28.347656-17.902344 9.886718-2.789062 21.789062-6.15625 35.121094-18.824218l301.011718-69.023438c3.710938-.851562 7.046875-3.15625 9.15625-6.328125zm-239.816406-214.820312 88.097656 88.273437-140.382812 140.664063zm27.703125-14.847657h163.308594l-81.65625 81.816407zm81.65625 124.425782 88.097656 88.277344-228.476562 52.386718zm21.261719-21.304688 81.652344-81.816406v163.636719zm0 0">
                  </path>
                </svg>
              </div>
            </div>
            <div class="plans_checked s2-pricing_list ul-li-block">
               {!! $plan->checkeddec !!} 
            </div>
            <div style="border-bottom: 1px solid #e6e8e9;" class="mt-4"></div>
            <div class="plans_unchecked s2-pricing_list ul-li-block">
               {!! $plan->uncheckeddec !!}      
            </div>
            <div class="s2-pricing_btn"><a href="{{ getRoute("getContactUs") }}"><i class="fas fa-cloud-download-alt"></i>@lang('user.helper.try_now')</a></div>
          </div>
        </div>
        @endforeach
      </div>
      {{ $plans->links('vendor.pagination.custom_user') }} 
    </div>
  </div>
</section>
@endif
@endsection
@section('js')
    <script>
    $('.plans_checked ul li').prepend('<div class="s2-pricing_list_icon  s2-checked  float-left text-center"></div>');
    $('.plans_unchecked ul li').prepend('<div class="s2-pricing_list_icon  s2-unchecked  float-left text-center"></div>');
    </script>
@endsection
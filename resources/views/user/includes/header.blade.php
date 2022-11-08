@if($header_name && $link_name)
<section class="saasio-breadcurmb-section" id="saasio-breadcurmb">
    <div class="container">
      <div class="breadcurmb-title text-center">
        <h2>{{$header_name }}</h2>
      </div>
      <div class="breadcurmb-item-list text-center ul-li">
        <ul class="saasio-page-breadcurmb">
          <li><a href="{{ url("/".app()->getLocale()) }}">@lang("user.home")</a></li>
          <li><a href="{{ getRoute( $link_name) }}">{{ $header_name }}</a></li>
        </ul>
      </div>
    </div>
  </section>
  @endif
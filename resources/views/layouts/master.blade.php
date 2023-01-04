<!DOCTYPE html>
@if(app()->getLocale() == "ar")
<html lang="ar" dir="rtl">
@else
<html lang="en" >
@endif
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>

    <meta name="description" content="@if(setting()->small_desc != null) {!! setting()->small_desc !!}
    @else Delta Information Technology, Import & Export based Riyadh ( Kingdom of Saudi Arabia) Delta Information Technology are a leading IT, Telecommunication and Security Sustem Infrastructure Product, Services and Solution.
    @endif">
    <meta name="keywords" content="web design, web development">
    <meta name="author" content="Marwan Group">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Marwan Group For Information And Technology">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://marwan.tech">
    <meta property="og:image" content="{{ asset(setting()->logo) }}">

    <link rel="apple-touch-icon" href="{{ 'favicon.ico' }}">


    <link rel="icon" href="{{ 'favicon.ico' }}" type="image/x-icon">
    <!--
    Add the code snippet above to the sites listed to display your badge:
    http://deltaitech.com
    -->
    {{--
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/bootstrap.min.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/fontawesome-all.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/jquery.mCustomScrollbar.min.css") }}">-->

    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/flaticon.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/flaticon-3.css") }}">-->


    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/animate.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/aos.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/slick.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/slick-theme.css") }}"> -->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/jquery.fancybox.min.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/smm.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/crm.css") }}">-->
    <!--<link rel="stylesheet" href="{{ asset("assets/user/css/owl.carousel.css") }}">--> --}}
    <link rel="stylesheet" href="{{ asset("assets/user/css/vendor.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/user/css/style.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/user/css/over-style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/user/css/custom.css") }}">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @if(app()->getLocale() == "ar")
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;800&display=swap" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @endif
    @stack('css')
    @stack('js')

</head>
<body class="str-home {{'lang-'.app()->getLocale() }}">
<!--preloader - start-->
    <div class="str-preloader" id="preloader">
          <div class="up"><a class="str-scrollup text-center" id="scrollup" href="#"><i class="fas fa-angle-up"></i></a></div>
    </div>

  @include('user.includes.navbar')
  @yield("header")
  @yield('content')
  @include('user.includes.footer')
    {{-- side partener with google  --}}



<!-- Add the code snippet above to the sites listed to display your badge:
    http://deltaitech.com
    https://marwan.tech/ -->
    <script src="{{ asset("assets/user/js/jquery.js") }}"></script>
    {{--
    <!--<script src="{{ asset("assets/user/js/popper.min.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/appear.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/bootstrap.min.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/aos.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/owl.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/wow.min.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/pagenav.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/parallax-scroll.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/jquery.paroller.min.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/jquery.barfiller.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/slick.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/jquery.fancybox.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/smm.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/crm.js") }}"></script>-->
    <!--<script src="{{ asset("assets/user/js/jquery.mCustomScrollbar.concat.min.js") }}"></script>-->
    --}}
    <script src="{{ asset("assets/user/js/vendor.min.js") }}"></script>
    <script src="{{ asset("assets/user/js/script.js") }}"></script>
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'a754131573743f3d40b12cf4ff0ad9841879e841';
        window.smartsupp||(function(d) {
          var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
          s=d.getElementsByTagName('script')[0];c=d.createElement('script');
          c.type='text/javascript';c.charset='utf-8';c.async=true;
          c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>



    @yield('js')
    @stack('js-footer')
</body>
</html>

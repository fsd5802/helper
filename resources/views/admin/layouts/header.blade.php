<!DOCTYPE html>
@if(app()->getLocale() == 'ar')
<html direction="rtl" dir="rtl" style="direction: rtl" >
	@else
	<html direction="ltr" dir="ltr" style="direction: ltr" >
	@endif
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<link rel="icon" href="{{ '/favicon.ico' }}" type="image/x-icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" />
		<!--end::Fonts-->
		<link href="{{ asset('admin') }}/assets/css/charts.min.css" rel="stylesheet" type="text/css" />

		@if(app()->getLocale() == 'ar')
			<!--begin::Page Vendors Styles(used by this page)-->
			<link href="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
			<!--end::Page Vendors Styles-->
			<!--begin::Global Theme Styles(used by all pages)-->
			<link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
			<!--end::Global Theme Styles-->
			<!--begin::Layout Themes(used by all pages)-->
			<link href="{{ asset('admin') }}/assets/css/themes/layout/header/base/light.rtl.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/themes/layout/header/menu/light.rtl.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/themes/layout/brand/dark.rtl.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/themes/layout/aside/dark.rtl.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/new-style-ar.css" rel="stylesheet" type="text/css" />
		@else
			<!--begin::Page Vendors Styles(used by this page)-->
			<link href="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
			<!--end::Page Vendors Styles-->
			<!--begin::Global Theme Styles(used by all pages)-->
			<link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

			<!--end::Global Theme Styles-->
			<!--begin::Layout Themes(used by all pages)-->
			<link href="{{ asset('admin') }}/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
			<link href="{{ asset('admin') }}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		@endif
        <link href="{{ asset('admin') }}/assets/css/custom.css" rel="stylesheet" type="text/css" />
		<script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('admin') }}/assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

		<!--end::Layout Themes-->
		<title>@yield('title')</title>
        <style>
            *{
                font-family: 'Tajawal', sans-serif;
            }
        </style>
	</head>
	<!--end::Head-->

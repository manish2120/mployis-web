<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>

<title>@yield('title', 'MPLOYIS')</title>
<meta charset="utf-8" />
<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
<meta property="og:url" content="https://keenthemes.com/metronic" />
<meta property="og:site_name" content="Keenthemes | Metronic" />
<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{ asset('frontend/assets/media/logos/Mployis.png') }}"type="image/x-icon" />

<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->

<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{ asset('frontend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/assets/css/style.header.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

@stack('custom_styles')

{{-- begin::CDN --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
{{-- end::CDN --}}

</head>
<!--end::Head-->

<body id="kt_body" class="bg-body">

  @if(!isset($hideHeader) || !$hideHeader)
  @include('frontend.layouts.partials.header')
  @endif

  @yield('content')

  @if (!isset($hideFooter) || !$hideFooter)
  @include('frontend.layouts.partials.footer')
  @endif

  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}

  <!--begin::Javascript-->

  <!--begin::Global Javascript Bundle(used by all pages)-->
  <script src="{{ asset('frontend/assets/plugins/global/plugins.bundle.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/scripts.bundle.js') }}"></script>
  <!--end::Global Javascript Bundle-->

  <!--begin::Page Vendors Javascript(used by this page)-->
  <script src="{{url('frontend/assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
  <script src="{{url('frontend/assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
  <!--end::Page Vendors Javascript-->

  <!--begin::Page Custom Javascript(used by this page)-->
  <script src="{{url('frontend/assets/js/custom/landing.js')}}"></script>
  <script src="{{url('frontend/assets/js/custom/pages/pricing/general.js')}}"></script>
  <!--end::Page Custom Javascript-->

  <!--end::Javascript-->
  @stack('scripts')
  @stack('custom_scripts')

</body>
</html>
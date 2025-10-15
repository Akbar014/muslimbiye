<!DOCTYPE html>
<html lang="ban">

<head>
    <!--<title>@yield('title') | @lang('site.website_title') | @lang('site.muslimbie_slogan_1') @lang('site.muslimbie_slogan_2') @lang('site.muslimbie_slogan_3')</title>-->
    <title>@yield('title')</title>
    @include('frontend_new.layouts.components.meta')
    @include('frontend_new.layouts.components.css')
    <style>
        .bg-secondary-color-alter {
          background-color:  transparent linear-gradient(217deg, #1f0785 0%, #FF2ADE 100%) 0% 0% no-repeat padding-box;
      }
      
      .od-footer-content {
          background-color:  transparent linear-gradient(217deg, #1f0785 0%, #FF2ADE 100%) 0% 0% no-repeat padding-box;;
      }
    </style>
</head>

<body>

    @include('frontend_new.layouts.components.nav')

    @yield('content')

    <div id="od_toasts"></div>

    @include('frontend_new.layouts.components.footer')   
    @include('frontend_new.layouts.components.js')

</body>

</html>

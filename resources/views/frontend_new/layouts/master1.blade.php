<!DOCTYPE html>
<html lang="ban">

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;j.src="https://sst.muslimbiye.com.bd/anqfaymzea.js?"+i;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','t=CAFHKi0sSzomXShYNy9RVxdYSENIRwIfXAgPHhUICxMIHB9DGg4LXwMB');</script>
<!-- End Google Tag Manager -->

    <title>@yield('title') </title>
    @include('frontend_new.layouts.components.meta1')
    @include('frontend_new.layouts.components.css1')
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://sst.muslimbiye.com.bd/ns.html?id=GTM-KG8R5NN7" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript)-->
 
    @include('frontend_new.layouts.components.nav1')

    @yield('content')

    <div id="od_toasts"></div>

    @include('frontend_new.layouts.components.footer1')

    @include('frontend_new.layouts.components.js1')

</body>

</html>

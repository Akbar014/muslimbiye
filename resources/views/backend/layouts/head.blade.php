<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> @yield('title') | {{ config('app.name') }}</title>
<meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="laravel, laravel-boilerplate">
<meta name="author" content="Riyadh Ahmed">
<meta name="msapplication-tap-highlight" content="no">
<meta name="robots" content="index, follow">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicons -->
{{-- <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}"> --}}


<link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">

<!-- Override CSS file - add your own CSS rules -->
<link rel="stylesheet" href="{{ asset('/assets/css/custom_admin_style.css') }}">

{{-- multiselect --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/css/bootstrap-multiselect.min.css"
    rel="stylesheet">

{{-- oticka admin panel --}}
<link rel="stylesheet" href="{{ asset('assets') }}/css/app.min.css">
<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
<link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
<!-- Custom style CSS -->
<link rel="stylesheet" href="{{ asset('assets') }}/css/custom.css">
<link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets') }}/img/favicon.ico' />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<!-- Sweet Alert library -->
<link rel="stylesheet" href="{{ asset('/assets/plugins/sweet-alert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/iCheck/all.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/datepicker/datepicker3.css') }}">

<script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<script>
    var CSRF_TOKEN = "{{ csrf_token() }}";
</script>

@yield('css')

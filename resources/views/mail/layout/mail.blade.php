@php
    $setting = App\Models\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<title>@yield('title')</title>-->
    <title>MuslimBiye</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .navbar {
            background: white;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #d4d4d4;
            box-shadow: 0px 3px 5px #d4d4d4;
        }
        .main_image {
            margin: 0 auto;
            width: 120px;
            display: inline-block;
        }
        .footer {
            border-top: 1px solid #d4d4d4;
            padding: 10px;
            margin-top: 30px;
            font-size: 10px;
            color: #585858;
            text-align: center;
        }
        .footer a {
            color: blue;
            text-decoration: none;
        }
        .content {
            padding: 20px;
            line-height: 24px;
        }
        .otp {
          display: inline-block;
          background-color: #ebebeb;
          padding: 10px;
          margin: 10px auto;
          font-size: 20px; 
          font-weight: bold;
          color: #404040;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <!--<img src="{{ url('storage/' . $setting->logo ?? 'assets/logo/updated_logo.png') }}" alt="Muslim Biye"-->
        <!--    class="main_image" />-->
            <img src="{{ $setting->logo ? url('storage/' . $setting->logo) : asset('assets/logo/updated_logo.png') }}" 
            alt="Muslim Biye" class="main_image" />

    </div>
    <div class="content">
        @yield('content')
    </div>

    <div class="footer">
        <a href="{{ route('frontend.home') }}">
            MuslimBiye.com.bd
        </a>
    </div>
</body>

</html>

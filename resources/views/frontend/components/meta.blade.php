@php
    $setting = App\Models\Setting::first();
@endphp
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="title" content="@yield('title') | মুসলিম বিয়ে - MuslimBie | শুদ্ধ সমাজ বিনির্মাণে জীবনসঙ্গী অনুসন্ধানের বিশ্বস্ত প্ল্যাটফর্ম">
<meta name="description" content="ওয়েবসাইটটি তাদের জন্য, যারা ঘটক থেকে দূরে থেকে নিজেদের জানাশোনা কিংবা আত্বীয়স্বজনের মাধ্যমে সহজেই সুন্দরভাবে সুন্নতি বিয়েতে আগ্রহী।" />
<meta name="keywords" content="MuslimBie, MuslimBie, MuslimBiegroupBD, বিয়ে, মুসলিম বিয়ে, সর্বপ্রথম, পাত্র, পাত্রী, পাত্রপাত্রী, বর, পাত্রী, বিয়েশাদী, @yield('meta_key')" />
<meta name="csrf-token" content="{{csrf_token()}}" />
<link rel="icon" type="image/x-icon" href="{{url('storage/'.$setting->favicon)}}">


<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.muslimbie.com">
<meta property="og:title" content="@yield('title') | মুসলিম বিয়ে - MuslimBie | শুদ্ধ সমাজ বিনির্মাণে জীবনসঙ্গী অনুসন্ধানের বিশ্বস্ত প্ল্যাটফর্ম ">
<meta property="og:description" content="ওয়েবসাইটটি তাদের জন্য, যারা ঘটক থেকে দূরে থেকে নিজেদের জানাশোনা কিংবা আত্বীয়স্বজনের মাধ্যমে সহজেই সুন্দরভাবে সুন্নতি বিয়েতে আগ্রহী।">
<meta property="og:image" content="{{env('APP_URL', 'https://muslimbie.com')}}/@yield('meta_img', 'assets/frontend/res/images/og_image.png')">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://www.muslimbie.com">
<meta property="twitter:title" content="@yield('title') | মুসলিম বিয়ে - MuslimBie | শুদ্ধ সমাজ বিনির্মাণে জীবনসঙ্গী অনুসন্ধানের বিশ্বস্ত প্ল্যাটফর্ম">
<meta property="twitter:description" content="ওয়েবসাইটটি তাদের জন্য, যারা ঘটক থেকে দূরে থেকে নিজেদের জানাশোনা কিংবা আত্বীয়স্বজনের মাধ্যমে সহজেই সুন্দরভাবে সুন্নতি বিয়েতে আগ্রহী।">
<meta property="twitter:image" content="{{env('APP_URL', 'https://muslimbie.com')}}/@yield('meta_img', 'assets/frontend/res/images/og_image.png')">

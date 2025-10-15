<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="description" content="">
<meta name="keywords" content="">


<!-- Open Graph / Facebook / Messenger -->
<meta property="og:title" content="Muslim Biye | মুসলিম বিয়ে ">
<meta property="og:description" content="বরকতময় জীবনের প্রথম পদক্ষেপ।"> 
<meta property="og:image" content="{{ asset('/assets/frontend_new/images/faviconpng_final.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">

<!-- WhatsApp and others often also use these -->
<meta name="twitter:card"  content="Muslim Biye | মুসলিম বিয়ে ">
<meta name="twitter:title"  content="Muslim Biye | মুসলিম বিয়ে ">
<meta name="twitter:description"  content="বরকতময় জীবনের প্রথম পদক্ষেপ।">
<meta name="twitter:image" content="{{ asset('/assets/frontend_new/images/faviconpng_final.png') }}">





<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HEFE6R4F3B"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'G-HEFE6R4F3B');
</script>

{{-- 

Stream name
MuslimBie

Stream URL
https://muslimbie.com

Stream ID
10399806096

Measurement ID
G-HEFE6R4F3B



use App\Services\GoogleAnalyticsService;
$analytics = new GoogleAnalyticsService();
$report = $analytics->getReport('482373820');
dd($report);


muslimbie-454019-2b22f8385e93.json
--}}



@yield('meta')

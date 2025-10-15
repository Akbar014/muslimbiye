{{-- google font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Raleway:wght@200;300;400;500;600;700&family=Poppins&family=Roboto:wght@300&Baloo+Da+2:wght@400&display=swap"
    rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}">

{{-- chosen --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" />

{{-- google icons --}}
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,0" />

{{-- main tailwind css --}}
<link rel="stylesheet" href="{{ asset('assets/frontend/res/css/main.min.css')."?".rand() }}" />
{{-- toastr --}}
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<style>
    body {
        font-family: 'Nunito', sans-serif;
    }

    main {
        max-width: 600px;
        width: 100%;
        margin: 0 auto;
    }

    .slide-read-more {
        overflow: hidden;
    }

    .slide-read-more-button {
        cursor: pointer;
        text-align: right;
        margin-top: 8px;
        color: #488A8A;
        display: none;
    }

    /* .lg\:col-span-7.mb-8::-webkit-scrollbar {
  display: none;
}
.lg\:col-span-7.mb-8{
    height: 1200px;
    overflow: scroll;
    overflow-x: hidden;
} */
</style>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
{{-- chosen --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
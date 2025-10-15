@extends('frontend.layouts.master')
@section('title', 'মুসলিম বিয়ে - MuslimBie')
@section('content')
    <header class="bg-primary-light-color">
        @include('frontend.index.components.header')
        @include('frontend.components.search')
    </header>


    <div class="w-full lg:w-4/5 px-2 lg:px-0 mx-auto mt-8">
        <div class="grid lg:grid-cols-12 gap-x-7 mb-24">
            @include('frontend.index.components.sidebar')
            @include('frontend.index.components.posts')
        </div>
    </div>
    <div class="w-screen h-screen fixed top-0 left-0 raleway hidden bg-black/40 modal-bg contact-modal z-50">
        <div class="nav-gap"></div>
        <div class="modal-container max-w-3xl bg-white mx-auto mt-16 hindShiliguri rounded-xl overflow-hidden">
            <div class="modal-header text-center bg-secondary-color text-white font-bold text-2xl py-2.5 relative">
                @lang('site.communication_means')
            </div>
            <div class="modal-body px-6 md:px-20 py-6 ">
                <div class="text-center">
                    <div class="inline-flex mx-auto text-base">
                        <img src="{{ asset('assets/frontend/res/images/icons/phone.svg') }}" class="w-3" alt="phone">
                        <span class="!mx-1 font-semibold" id="biodata_phone_number"></span>
                        <span class="!mx-1 font-light" id="biodata_phone_owner"></span>
                    </div><br />
                    <div class="inline-flex mx-auto text-base">
                        <img src="{{ asset('assets/frontend/res/images/icons/envalope.svg') }}" class="w-3"
                            alt="email">
                        <span class="!mx-1 font-semibold" id="biodata_email"></span>
                    </div>
                </div>
                <p class="text-center mt-5 text-slate-600">
                    * @lang('site.call_if')<br/>
                    * @lang('site.confirm_by_phone')<br/>
                    * @lang('site.photo_share_permission')
                </p>
                <button class="!mx-auto block bg-secondary-color text-white mt-8 px-3.5 py-1.5 rounded-md"
                    onclick="okayBtn()">@lang('site.okay')</button>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
    <style>
        /* .swiper {
                                    width: 100%;
                                } */

        .swiper-controller {
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            padding: 5px;
            border-radius: 50%;
            background: white;
            position: static;
            margin: 0;
            box-shadow: 0px 2px 8px rgba(47, 3, 12, 0.15);
            height: 30px;
            width: 30px;
        }

        .swiper-button-prev::after,
        .swiper-button-next::after {
            font-size: 16px;
            font-weight: 600;
            color: #600116;
        }

        .swiper-pagination {
            width: auto !important;
            position: static;
        }

        .swiper-pagination-bullet {
            transition: all 0.3s linear;
        }

        .swiper-pagination-bullet-active {
            background: #600116;
            width: 20px;
            border-radius: 4px;
        }

        .vjs-big-play-button {
            background-color: transparent !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%);
            background-image: url("{{ asset('assets/frontend/res/images/icons/circle.svg') }}") !important;
            background-repeat: no-repeat !important;
            background-size: 60px !important;
            background-position: 50% 35% !important;
            border: none !important;
        }

        .vjs-big-play-button:before {
            content: "" !important;
            display: none !important;
        }

        .vjs-big-play-button:hover {
            background-color: transparent !important;
            opacity: 0.7 !important;
        }

        .chosen-single {
            font-family: "kalpurush", sans-serif;
            margin-top: 14px;
            background: transparent !important;
            border: 0 !important;
            box-shadow: 0 0 0 #000 !important;
            font-size: 14px;
        }

        .chosen-single>div {
            display: none !important;
        }

        .chosen-search-input {
            color: #222 !important;
            font-size: 15px !important;
            font-family: "kalpurush", sans-serif !important;
            margin-top: 2px !important;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            autoplay: {
                delay: 5000,
            },
            slidesPerView: 1,
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });


        $("#districtMultiple").chosen({
            no_results_text: "Oops, nothing found!",
        })

        $("#marriage_statusMultiple").chosen({
            no_results_text: "Oops, nothing found!"
        })

        $("#want_occupationMultiple").chosen({
            no_results_text: "Oops, nothing found!"
        })

        function showModal(biodata_phone_number, biodata_phone_owner, biodata_email) {
            document.getElementById('biodata_phone_number').innerHTML = biodata_phone_number;
            document.getElementById('biodata_email').innerHTML = biodata_email;
            document.getElementById('biodata_phone_owner').innerHTML =`(${biodata_phone_owner})`;
            $(".contact-modal").removeClass('hidden');
        }
        function okayBtn() {
            $(".contact-modal").addClass('hidden');
        }
    </script>
@endsection

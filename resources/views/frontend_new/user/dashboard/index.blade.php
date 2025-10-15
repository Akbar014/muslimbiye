@php
    $user = Auth::guard('user')->user();
    $biodata = App\Models\Biodata::where(['user_id' => $user->id, 'deleted' => '0', 'admin_created' => '0'])->first();
@endphp
@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main overflow-hidden">
        <div class="od-user-account-container overflow-hidden">
            <div class="od-row overflow-hidden">
                @include('frontend_new.user.components.sidebar')
                <div class="odd-content overflow-hidden">
                    <div class="od-row overflow-hidden">
                        <div class="od-col-12 od-col-sm-12 od-col-md-4 odd-home-card hide-od-xl overflow-hidden">
                            <div class="odd-home-card-inner overflow-hidden">
                                <div class="odd-home-card-content overflow-hidden">
                                    <div class="odd-user-info hmm">
                                        <img src="{{ asset('assets/images/users/' . ($user->gender == '1' ? 'nikab.PNG' : 'islamicMan.jpg')) }}"
                                            alt="{{ $user->gender == '1' ? 'Fem' : 'M' }}ale-Avatar"
                                            class="!mx-auto rounded-full">


                                        <div class="odd-bio-status-wrap">
                                            <h3></h3>
                                            <div class="odd-bio-status">
                                                @if (!$biodata)
                                                    <span class="od-incomplete"> <a
                                                            href="{{ route('user.edit_biodata.index') }}"
                                                            class="fw-bold">@lang('site.no_biodata')</a></span>
                                                @elseif ($biodata->status == '0')
                                                    <span class="od-incomplete">@lang('site.incomplete')</span>
                                                @elseif($biodata->status == '1')
                                                    <span class="od-incomplete">@lang('site.complete')</span>
                                                @elseif($biodata->status == '2')
                                                    <span class="od-incomplete">@lang('site.approved')</span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="od-preview-biodata-link">
                                            <a class="od-button" href="{{ route('user.my_biodata') }}">@lang('site.my_biodata')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="od-row">
                        @if (!$incomplete_biodata || $incomplete_biodata->status == '0')
                            <div class="od-col-12 od-col-sm-12 od-col-md-12  connection package">
                                <div class="odd-home-card-inner  lg:!py-16 !py-8 ">
                                    <div class="odd-home-card-content">
                                        <div class="flex lg:flex-row flex-col gap-8 items-center justify-center w-full ">
                                            <a href="{{ route('user.edit_biodata.index') }}"
                                                class="bg-[#631a53] !no-underline !text-white lg:w-80 w-72 h-16 !px-4 text-center  text-[1.2rem] md:text-[1rem] drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md text-xl flex items-center justify-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem"
                                                    viewBox="0 0 16 16">
                                                    <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z" />
                                                </svg>@lang('site.create_biodata')
                                            </a>
                                            <a href="{{ getSettings() ? getSettings()->social_youtube : '#' }}"
                                                target="_BLANK"
                                                class="!no-underline border-[2px] border-red-600 bg-white lg:w-80 w-72 h-16 !px-4 text-center  text-[1.2rem] md:text-[1rem] drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md text-xl text-red-600 flex items-center justify-center gap-2">
                                                <i class="fa fa-youtube-play text-red-600 text-4xl" aria-hidden="true"></i>
                                                @lang('site.how_to')
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($coupon_usages && $coupon_usages->connection_remain > 0)
                            <div class="od-col-12 odd-home-card ignorelist">
                                <div class="bg-green-100 !p-5 !m-3 w-full rounded-lg shadow-lg !mb-10">
                                    @lang('site.coupon_message', ['connection_amount' => EnToBn($coupon_usages->connection_amount), 'connection_remain' => EnToBn($coupon_usages->connection_remain)])
                                </div>
                            </div>
                        @endif
                        
                        @if ($biodata)
                            <div class="od-col-12 od-col-sm-6 od-col-md-4 odd-home-card ignorelist">
                                <div
                                    class="flex flex-col items-center justify-between bg-gradient-to-br from-[#FEF5F9] to-white !p-5 !m-3 min-h-[150px] w-full rounded-lg shadow-lg">
                                    <img src="{{ asset('assets/images/users/' . ($user->gender == '1' ? 'generalFemale.jpg' : 'smile.png')) }}"
                                        alt="{{ $user->gender == '1' ? 'Fem' : 'M' }}ale-Avatar" class=" w-20 rounded-full">
                                    <div class="odd-bio-status-wrap flex items-center justify-center text-center">
                                        <div>
                                            <h3 class="!text-[#631a53]">{{ $user->name }}</h3>
                                            <a href="{{ route('user.edit_biodata.index') }}"
                                                class="!no-underline">@lang('site.edit_biodata')</a>
                                            {{-- <a href="{{ route('user.settings') }}" class="!no-underline">@lang('site.edit_profile')</a> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                        <div
                            class="od-col-12 od-col-sm-12 od-col-md-4 odd-home-card !rounded-md !bg-[#631a53] connection package">
                            <div class="odd-home-card-inner !bg-[#631a53] ">
                                <div class="odd-home-card-content flex flex-col items-center">
                                    <div class="w-[40%]">
                                        <span class="count-number">{{ EnToBn($user->connection) }}</span>
                                        <div class="text-white">@lang('site.connection')</div>
                                    </div>
                                    <div>
                                        <p>@lang('site.connection_cost2')</p>
                                        <a class="!bg-[#fff] !text-black"
                                            href="{{ route('user.buy_connection') }}">@lang('site.buy_connection')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="od-col-12 od-col-sm-6 od-col-md-4 odd-home-card visited">
                            <div class="odd-home-card-inner">
                                <div class="odd-home-card-content flex flex-col items-center gap-3">
                                    <div>
                                        <span
                                            class="count-number !text-[#631a53] ">{{ $user->biodata() ? EnToBn($user->biodata()->visit_count) : 0 }}</span>
                                        <h3 class="!text-[#631a53]">@lang('site.visit_count')</h3>
                                    </div>
                                    <div>
                                        <p class="text-left">@lang('site.your_biodata_visit_count')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="od-col-12 od-col-sm-6 od-col-md-4 odd-home-card shortlistYou">
                            <div class="odd-home-card-inner">
                                <div class="odd-home-card-content flex flex-col items-center gap-3">
                                    <div>
                                        <span
                                            class="count-number  !text-[#631a53]">{{ $user->biodata() ? EnToBn($user->biodata()->favorite_count()) : 0 }}</span>
                                        <h3 class=" !text-[#631a53]">@lang('site.your_biodata_favourite')</h3>
                                    </div>
                                    <p class="text-center">@lang('site.your_biodata_favourite_2')</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="od-col-12 od-col-sm-6 od-col-md-4 odd-home-card shortlist">
                            <a href="{{ route('user.favourite') }}" class="odd-home-card-inner">
                                <div class="odd-home-card-content od-text-align-right flex flex-col items-center gap-3">
                                    <div class="text-center">
                                        <span
                                            class="count-number !text-[#631a53]">{{ EnToBn(count($user->favorite_list())) }}</span>
                                        <h3 class="!text-[#631a53]">@lang('site.favourite_list')</h3>
                                    </div>
                                    <p class="text-center">@lang('site.your_favourite_biodata')</p>
                                </div>
                            </a>
                        </div>

                        <div class="od-col-12 od-col-sm-12 od-col-md-4 odd-home-card purchased">
                            <a href="{{ route('user.my_purchases') }}" class="odd-home-card-inner">
                                <div class="odd-home-card-content od-text-align-right flex flex-col items-center gap-3">
                                    <div class="text-center">
                                        <span
                                            class="count-number !text-[#631a53]">{{ EnToBn(count($user->purchase_list())) }}</span>
                                        <h3 class="!text-[#631a53]">@lang('site.my_purchases')</h3>
                                    </div>
                                    <p class="text-center">@lang('site.my_purchases_info')</p>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
{{-- app.blade.php --}}
<!--@auth-->
<!--    @if(auth()->user()->is_approved != 1)-->
<!--        <div id="approvalModal" class="custom-modal">-->
<!--            <div class="custom-modal-content">-->
<!--                <span id="closeModalBtn" class="close-btn">&times;</span>-->
<!--                <h2>Account Pending</h2>-->
<!--                <p>বায়োডাটা দেখতে আপনার বায়োডাটা সাবমিট করুন।</p> -->
<!--            </div>-->
<!--        </div>-->
<!--    @endif-->
<!--@endauth-->

<style>
    .custom-modal {
    display: none; 
    position: fixed; 
    z-index: 9999; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    background: rgba(0,0,0,0.5); 
    justify-content: center; 
    align-items: center;
}

.custom-modal-content {
    background: #fff; 
    padding: 20px; 
    border-radius: 8px; 
    text-align: center;
    width: 400px;
    max-width: 90%;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

.close-btn {
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
} 

</style>

<!--@auth-->
<!--    @if(auth()->user()->is_approved != 1)-->
<!--        <script>-->
<!--            document.addEventListener("DOMContentLoaded", function () {-->
<!--                let modal = document.getElementById("approvalModal");-->
<!--                let closeBtn = document.getElementById("closeModalBtn");-->

                
<!--                modal.style.display = "flex";-->

               
<!--                closeBtn.onclick = function () {-->
<!--                    modal.style.display = "none";-->
<!--                };-->

               
<!--                window.onclick = function (event) {-->
<!--                    if (event.target === modal) {-->
<!--                        modal.style.display = "none";-->
<!--                    }-->
<!--                };-->
<!--            });-->
<!--        </script>-->
<!--    @endif-->
<!--@endauth-->

@auth
    @if(auth()->user()->is_approved != 1)
        <div id="approvalModal" class="custom-modal">
            <div class="custom-modal-content">
                <span id="closeModalBtn" class="close-btn">&times;</span>
                <h1 style="
    background: linear-gradient(217deg, #1f0785 0%, #af2199 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
">
    মুসলিম বিয়ে
</h1>

                <p style="color: black";> আপনার বায়োডাটা সাবমিট করুন।</p>
                <p style="color: black;">!!! বায়োডাটা সাবমিট করলে আপনি পাচ্ছেন ১০ টি এক্সক্লুসিভ কানেকশন একদম ফ্রি !!!<p>
                <a href="{{ route('user.edit_biodata.index') }}" class="bg-[#631a53] !no-underline !text-white lg:w-full w-full h-10 !px-4 text-center  text-[1.2rem] md:text-[1rem] drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md text-xl flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 16 16">
                        <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z"></path>
                    </svg>বায়োডাটা তৈরি করুন
                </a>
                   
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let modal = document.getElementById("approvalModal");
                let closeBtn = document.getElementById("closeModalBtn");

                // Check korbo sessionStorage te already closed kina
                if (!sessionStorage.getItem("approvalModalClosed")) {
                    modal.style.display = "flex";
                }

                closeBtn.onclick = function () {
                    modal.style.display = "none";
                    // ekbar cross korle flag set kore dibo
                    sessionStorage.setItem("approvalModalClosed", "true");
                };
 
                window.onclick = function (event) {
                    if (event.target === modal) {
                        modal.style.display = "none";
                        sessionStorage.setItem("approvalModalClosed", "true");
                    }
                };
            });
        </script> 
<!--        @auth-->
<!--    @if(auth()->user()->is_approved != 1)-->
<!--        <script>-->
<!--            document.addEventListener("DOMContentLoaded", function () {-->
<!--                let modal = document.getElementById("approvalModal");-->
<!--                let closeBtn = document.getElementById("closeModalBtn"); -->

                
<!--                modal.style.display = "flex";-->

               
<!--                closeBtn.onclick = function () {-->
<!--                    modal.style.display = "none";-->
<!--                };-->

               
<!--                window.onclick = function (event) {-->
<!--                    if (event.target === modal) {-->
<!--                        modal.style.display = "none";-->
<!--                    }-->
<!--                };-->
<!--            });-->
<!--        </script>-->
<!--    @endif-->
<!--@endauth-->

    @endif
@endauth



@endsection

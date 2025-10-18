@php
$addressList = getAddress();
$setting = App\Models\Setting::first();
@endphp
@extends('frontend_new.layouts.master1')
@section('title', 'Muslim Biye | মুসলিম বিয়ে')
@section('content')

<!-- header sections start  -->
<header class="header_mains-divclc">
    <div class="container">
        <div class="row center_header-sec">
            <div class="col-md-6">
                <div class="left_matri_headers">
                    <!-- <img src="{{ asset('assets') }}/svg/heart_banner-set.svg" alt="heart_banner-set" />
                    <h6>100% SECURE</h6> -->
                    <h1 style="color: white; font-family: Baloo Da 2, sans-serif;">
                        @lang('site.muslimbie')
                    </h1>

                    <!-- <h1 style="color: white">
                        The Most Reliable Matrimonial Platform for Bangladeshis
                    </h1> -->
                    <h4>
                        @lang('site.motto')
                    </h4>
                    <p style="color:white;">
                        @lang('site.content')
                    </p>
                    <span style="color:#ffe000; font-size: 20px;">@lang('site.speech')</span><br>
                    <span style="color:white;">- @lang('site.speech_person')</span>
                    <!-- <h4>
                        Find Your Perfect Match with Bangladesh's Most Trusted
                        Matrimonial Service
                    </h4> -->
                    <!-- <a href="#" class="btn_register-ht"
                  ><img src="register-icon.svg" alt="" />Create Account</a -->
                    <a href="{{ route('user.edit_biodata.index') }}" class="btn_register-ht"><img
                            src="{{ asset('assets') }}/svg/login-icon.svg" alt="" /> @lang('site.create_biodata')</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="heart-animation-area">
                    <img src="{{ asset('assets') }}/newImages/heart12.png" alt="Floating Heart" class="heart heart1" />
                    <img src="{{ asset('assets') }}/newImages/heart12.png" alt="Floating Heart" class="heart heart2" />
                    <img src="{{ asset('assets') }}/newImages/car.png" alt="Floating Heart" class="heart heart3" />
                </div>
            </div>
        </div>
    </div>
</header>
</div>

<!-- Search section start  -->
<div class="register-frm-ds">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <div class="search_registerBG">
                    <form action="{{ route('frontend.searchSubmit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4 col-sm-6 col-xs-12 cust-pdn">
                                <label class="search-label">@lang('site.i_am_looking_for') </label>
                                <div class="left">
                                    <div class="custom-select-wrapper">
                                        <select name="bride_groom" id="Looking" class="custom-select sources">
                                            <option value="">@lang('site.please_select')</option>
                                            <option value="all">@lang('site.all_biodata')</option>
                                            <option value="groom">@lang('site.groom_biodata')</option>
                                            <option value="bride">@lang('site.bride_biodata')</option>
                                        </select>



                                        <div class="custom-select sources">
                                            <span class="custom-select-trigger"
                                                id="Looking_change">@lang('site.please_select')</span>
                                            <div class="custom-options">
                                                <span class="custom-option undefined" data-value="For"></span>
                                                <span class="custom-option undefined"
                                                    data-value="all">@lang('site.all_biodata')</span>
                                                <span class="custom-option undefined"
                                                    data-value="groom">@lang('site.groom_biodata')</span>
                                                <span class="custom-option undefined"
                                                    data-value="bride">@lang('site.bride_biodata')</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 col-sm-6 col-xs-12 cust-pdn">
                                <label class="search-label">@lang('site.marital_status') </label>
                                <div class="left">
                                    <div class="custom-select-wrapper">
                                        <select name="marital_status" id="Looking2" class="custom-select sources">
                                            <option value="">@lang('site.please_select')</option>
                                            <option value="all">@lang('site.all_biodata')</option>
                                            <option value="unmarried">@lang('site.unmarried')</option>
                                            <option value="married">@lang('site.married')</option>
                                            <option value="divorced">@lang('site.divorced')</option>
                                            <option value="widow">@lang('site.widow')</option>
                                            <option value="widower">@lang('site.widower')</option>
                                        </select>



                                        <div class="custom-select sources">
                                            <span class="custom-select-trigger"
                                                id="Looking2_change">@lang('site.please_select')</span>
                                            <div class="custom-options">
                                                <!-- <span class="custom-option undefined" data-value="all"></span> -->
                                                <span class="custom-option undefined"
                                                    data-value="all">@lang('site.all')</span>
                                                <span class="custom-option undefined"
                                                    data-value="unmarried">@lang('site.unmarried')</span>
                                                <span class="custom-option undefined"
                                                    data-value="married">@lang('site.married')</span>
                                                <span class="custom-option undefined"
                                                    data-value="divorced">@lang('site.divorced')</span>
                                                <span class="custom-option undefined"
                                                    data-value="widow">@lang('site.widow')</span>
                                                <span class="custom-option undefined"
                                                    data-value="widower">@lang('site.widower')</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-6 col-xs-12 cust-pdn">
                                <label class="search-label">@lang('site.biodata_type')</label>
                                <div class="left">
                                    <div class="custom-select-wrapper">
                                        <select name="biodata_type" id="lookig3" class="custom-select sources">
                                            <option value="">@lang('site.please_select')</option>
                                            <option value="all">@lang('site.all_biodata')</option>
                                            <option value="general">@lang('site.groom_biodata')</option>
                                            <option value="deen">@lang('site.bride_biodata')</option>
                                        </select>

                                        <div class="custom-select sources">
                                            <span class="custom-select-trigger"
                                                id="Looking3_change">@lang('site.please_select')</span>
                                            <div class="custom-options">
                                                <!-- <span class="custom-option undefined" data-value="all"></span> -->
                                                <span class="custom-option undefined"
                                                    data-value="bride">@lang('site.all')</span>
                                                <span class="custom-option undefined"
                                                    data-value="general">@lang('site.general')</span>
                                                <span class="custom-option undefined"
                                                    data-value="deen">@lang('site.alem_alema')</span>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-2 col-sm-6 col-xs-12 cust-pdn " style="display:none;">
                                <label class="search-label">@lang('site.parmanent_address')</label>
                                <idv class="left">
                                    <div class="custom-select-wrapper">
                                        <input type="hidden" name="district" id="district" value="" class="address_name"
                                            required>

                                        <div class="custom-select sources">
                                            <span class="custom-select-trigger" id="address_display">
                                                @lang('site.please_select')</span>

                                            <div class="custom-options address_dropdown">
                                                <div class="custom-option country_btn" data-country="bangladesh">
                                                    @lang('site.bangladesh')
                                                </div>

                                                @foreach ($addressList as $divisionId => $division)
                                                <div class="custom-option division_btn"
                                                    data-division-id="{{ $divisionId }}">
                                                    {{ App::getLocale() == 'en' ? $division['name'] : __('districts.' . $division['name']) }}
                                                    <div class="division_districts hidden">
                                                        @foreach ($division['districts'] as $districtId => $district)
                                                        <div class="custom-option district_btn"
                                                            data-district-id="{{ $districtId }}"
                                                            data-division-id="{{ $divisionId }}">
                                                            {{ App::getLocale() == 'en' ? $district['name'] : __('districts.' . $district['name']) }}
                                                            <div class="district_subdistricts hidden">
                                                                @foreach ($district['subdistricts'] as $subdistrictId =>
                                                                $subdistrict)
                                                                <div class="custom-option subdistrict_btn"
                                                                    data-value="{{ $subdistrict['value'] }}">
                                                                    {{ App::getLocale() == 'en' ? $subdistrict['name'] : __('districts.' . $subdistrict['name']) }}
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                            </div>


                            <style>
                            .custom-modal {
                                display: none;
                                position: fixed;
                                z-index: 9999;
                                left: 0;
                                top: 0;
                                width: 100%;
                                height: 100%;
                                background: rgba(0, 0, 0, 0.5);
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
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
                            }

                            .close-btn {
                                float: right;
                                font-size: 24px;
                                font-weight: bold;
                                cursor: pointer;
                            }
                            </style>

                            <div class="col-md-1 col-sm-12 col-xs-12 pad-0 hidden-sm hidden-xs"
                                style="padding-left: 0px">
                                <div class="search-button">
                                    <!-- Search Button -->
                                    @if (Auth::guard('user')->check())
                                    @php
                                    $user = Auth::guard('user')->user();
                                    $userBioStatus = App\Models\Biodata::where('user_id', $user->id)->value('status');
                                    @endphp
                                    @if($userBioStatus != 0)
                                    <button type="submit" class="searchnow" onclick="find_match()"
                                        style="cursor:pointer;">
                                        @lang('site.search')
                                    </button>
                                    @else
                                    <a type="text" class="searchnow" onclick="registerModal()" style="cursor:pointer;">
                                        @lang('site.search')
                                    </a>
                                    @endif
                                    @else
                                    <a class=" searchnow od-button signin-button" onclick="loginAlertModal()"
                                        style="cursor:pointer;">
                                        @lang('site.search')
                                    </a>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group col-sm-12 col-xs-12 land-search hidden-lg hidden-md">
                                <div class="left">
                                    <!--<button-->
                                    <!--    type="submit"-->
                                    <!--    class="searchnow"-->
                                    <!--    id="submibt-btn"-->
                                    <!--    style="cursor:pointer;"-->
                                    <!--    onclick="find_match()">-->
                                    <!--    <img src="{{ asset('assets') }}/{{ asset('assets') }}/svg/search-resul-icon.svg" alt="" />-->
                                    <!--    &nbsp;@lang('site.search')-->
                                    <!--</button>-->
                                    @if (Auth::guard('user')->check())
                                    @php
                                    $user = Auth::guard('user')->user();
                                    $userBioStatus = App\Models\Biodata::where('user_id', $user->id)->value('status');
                                    @endphp
                                    @if($userBioStatus != 0)
                                    <button type="submit" class="searchnow" onclick="find_match()"
                                        style="cursor:pointer;">
                                        @lang('site.search')
                                    </button>
                                    @else
                                    <a type="text" class="searchnow" onclick="registerModal()" style="cursor:pointer;">
                                        @lang('site.search')
                                    </a>
                                    @endif
                                    @else
                                    <a class=" searchnow od-button signin-button" onclick="loginAlertModal()"
                                        style="cursor:pointer;">
                                        @lang('site.search')
                                    </a>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div id="approvalModal" class="custom-modal">
                            <div class="custom-modal-content">
                                <span id="closeModalBtn" class="close-btn">&times;</span>
                                <h2 style="
                                    background: linear-gradient(217deg, #1f0785 0%, #af2199 100%);
                                    -webkit-background-clip: text;
                                    -webkit-text-fill-color: transparent;    padding: 5px; 
                                ">
                                    মুসলিম বিয়ে
                                </h2>

                                <p style="color: black;"> আপনার বায়োডাটা সাবমিট করুন।</p>
                                <p style="color: black;">!!! বায়োডাটা সাবমিট করলে আপনি পাচ্ছেন ১০ টি এক্সক্লুসিভ কানেকশন
                                    একদম ফ্রি !!!
                                <p>
                                    <button class="btn btn-info mt-2 create-bio">

                                        <a href="{{ route('user.edit_biodata.index') }}"
                                            class="col-span-12 sm:col-span-6 bg-button-color !text-white font-bold text-center drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md gap-2 p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline !text-[1rem] sm:!text-[1.2rem]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem"
                                                viewBox="0 0 16 16">
                                                <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z"></path>
                                            </svg> বায়োডাটা তৈরি করুন
                                        </a>
                                    </button>

                            </div>
                        </div>

                        <div id="loginAlertModal" class="custom-modal">
                            <div class="custom-modal-content">
                                <span id="closeModalBtn2" class="close-btn">&times;</span>
                                <h3 style="
                                    background: linear-gradient(217deg, #1f0785 0%, #af2199 100%);
                                    -webkit-background-clip: text;
                                    -webkit-text-fill-color: transparent;    padding: 5px;  
                                ">
                                    মুসলিম বিয়ে
                                </h3>

                                <!--<p style="color: black;">  বায়োডাটা দেখতে লগইন করুন।</p>-->
                                <!--<p style="color: black;">!!! বায়োডাটা সাবমিট করলে আপনি পাচ্ছেন ১০ টি এক্সক্লুসিভ কানেকশন একদম ফ্রি !!!<p>-->

                                <p style="color: black" ;> একটি বিশ্বস্ত ও নিরাপদ পরিবেশ বজায় রাখতে আমরা শুধুমাত্র
                                    ভেরিফায়েড সদস্যদের বায়োডাটা প্রদর্শন করি। তাই অন্যদের বায়োডাটা দেখতে হলে আপনার
                                    বায়োডাটা সাবমিট করুন!</p>

                                <p style="color: black;margin-bottom: 6px;">!!! বায়োডাটা এপ্রুভ হলে আপনি পাবেন ৳১,০০০
                                    মূল্যের ১০টি এক্সক্লুসিভ কানেকশন — একদম ফ্রি !!!
                                <p>
                                    <button class="btn btn-info mt-4 create-bio">

                                        <a href="{{ route('user.auth.login') }}"
                                            class="col-span-12 sm:col-span-6 bg-button-color !text-white font-bold text-center drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md gap-2 p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline !text-[1rem] sm:!text-[1.2rem]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem"
                                                viewBox="0 0 16 16">
                                                <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z"></path>
                                            </svg> &nbsp বায়োডাটা সাবমিট করুন
                                        </a>
                                    </button>

                            </div>
                        </div>

                        <script>
                        function registerModal() {
                            let modal = document.getElementById("approvalModal");
                            let closeBtn = document.getElementById("closeModalBtn");

                            // Modal দেখাবো
                            modal.style.display = "flex";

                            // Close button click করলে
                            closeBtn.onclick = function() {
                                modal.style.display = "none";
                            };

                            // Window click করলে (modal er বাইরে)
                            window.onclick = function(event) {
                                if (event.target === modal) {
                                    modal.style.display = "none";
                                }
                            };
                        }

                        function loginAlertModal() {
                            let modal = document.getElementById("loginAlertModal");
                            let closeBtn = document.getElementById("closeModalBtn2");

                            // Modal দেখাবো
                            modal.style.display = "flex";

                            // Close button click করলে
                            closeBtn.onclick = function() {
                                modal.style.display = "none";
                            };

                            // Window click করলে (modal er বাইরে)
                            window.onclick = function(event) {
                                if (event.target === modal) {
                                    modal.style.display = "none";
                                }
                            };
                        }
                        </script>


                        <!--<div
                                class="form-group col-md-1 col-sm-6 col-xs-12 hidden-sm hidden-xs">
                                <div class="to_labl-form">To</div>
                            </div>
                            <div
                                class="form-group col-md-2 col-sm-6 col-xs-12 land-ageto cust-pdn">
                                <label class="search-label"></label>
                                <div class="left">
                                    <div class="custom-select-wrapper">
                                        <select
                                            name="to_age"
                                            id="ageto"
                                            class="custom-select sources"
                                            style="display: none">
                                            <option value="18" title="18 Year">18 Year</option>
                                            <option value="19" title="19 Year">19 Year</option>
                                            <option value="20" title="20 Year">20 Year</option>
                                            <option value="21" title="21 Year">21 Year</option>
                                            <option value="22" title="22 Year">22 Year</option>
                                            <option value="23" title="23 Year">23 Year</option>
                                            <option value="24" title="24 Year">24 Year</option>
                                            <option value="25" title="25 Year">25 Year</option>
                                            <option value="26" title="26 Year">26 Year</option>
                                            <option value="27" title="27 Year">27 Year</option>
                                            <option value="28" title="28 Year">28 Year</option>
                                            <option value="29" title="29 Year">29 Year</option>
                                            <option selected="" value="30" title="30 Year">
                                                30 Year
                                            </option>
                                            <option value="31" title="31 Year">31 Year</option>
                                            <option value="32" title="32 Year">32 Year</option>
                                            <option value="33" title="33 Year">33 Year</option>
                                            <option value="34" title="34 Year">34 Year</option>
                                            <option value="35" title="35 Year">35 Year</option>
                                            <option value="36" title="36 Year">36 Year</option>
                                            <option value="37" title="37 Year">37 Year</option>
                                            <option value="38" title="38 Year">38 Year</option>
                                            <option value="39" title="39 Year">39 Year</option>
                                            <option value="40" title="40 Year">40 Year</option>
                                            <option value="41" title="41 Year">41 Year</option>
                                            <option value="42" title="42 Year">42 Year</option>
                                            <option value="43" title="43 Year">43 Year</option>
                                            <option value="44" title="44 Year">44 Year</option>
                                            <option value="45" title="45 Year">45 Year</option>
                                            <option value="46" title="46 Year">46 Year</option>
                                            <option value="47" title="47 Year">47 Year</option>
                                            <option value="48" title="48 Year">48 Year</option>
                                            <option value="49" title="49 Year">49 Year</option>
                                            <option value="50" title="50 Year">50 Year</option>
                                            <option value="51" title="51 Year">51 Year</option>
                                            <option value="52" title="52 Year">52 Year</option>
                                            <option value="53" title="53 Year">53 Year</option>
                                            <option value="54" title="54 Year">54 Year</option>
                                            <option value="55" title="55 Year">55 Year</option>
                                            <option value="56" title="56 Year">56 Year</option>
                                            <option value="57" title="57 Year">57 Year</option>
                                            <option value="58" title="58 Year">58 Year</option>
                                            <option value="59" title="59 Year">59 Year</option>
                                            <option value="60" title="60 Year">60 Year</option>
                                            <option value="61" title="61 Year">61 Year</option>
                                            <option value="62" title="62 Year">62 Year</option>
                                            <option value="63" title="63 Year">63 Year</option>
                                            <option value="64" title="64 Year">64 Year</option>
                                            <option value="65" title="65 Year">65 Year</option>
                                        </select>
                                        <div class="custom-select sources">
                                            <span class="custom-select-trigger" id="ageto_change">30 Year</span>
                                            <div class="custom-options">
                                                <span
                                                    class="custom-option undefined"
                                                    data-value="18">18 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="19">19 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="20">20 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="21">21 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="22">22 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="23">23 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="24">24 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="25">25 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="26">26 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="27">27 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="28">28 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="29">29 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="30">30 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="31">31 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="32">32 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="33">33 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="34">34 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="35">35 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="36">36 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="37">37 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="38">38 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="39">39 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="40">40 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="41">41 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="42">42 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="43">43 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="44">44 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="45">45 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="46">46 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="47">47 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="48">48 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="49">49 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="50">50 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="51">51 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="52">52 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="53">53 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="54">54 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="55">55 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="56">56 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="57">57 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="58">58 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="59">59 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="60">60 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="61">61 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="62">62 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="63">63 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="64">64 Year</span><span
                                                    class="custom-option undefined"
                                                    data-value="65">65 Year</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-xs-12 cust-pdn">
                                <label class="search-label">Religion</label>
                                <div class="left">
                                    <div class="custom-select-wrapper">
                                        <select
                                            name="religion"
                                            id="Religion"
                                            class="custom-select sources"
                                            style="display: none">
                                            <option
                                                class="list"
                                                value="0"
                                                selected=""
                                                title="Select Religion">
                                                Select Religion
                                            </option>
                                            <option value="32" title="Buddhist">Buddhist</option>
                                            <option value="30" title="Christian">
                                                Christian
                                            </option>
                                            <option value="1" title="Hindu">Hindu</option>
                                            <option value="112" title="Intercaste">
                                                Intercaste
                                            </option>
                                            <option value="108" title="Ishai">Ishai</option>
                                            <option value="77" title="Jain">Jain</option>
                                            <option value="3" title="Muslim">Muslim</option>
                                            <option value="111" title="Parsi">Parsi</option>
                                            <option value="4" title="Sikh">Sikh</option>
                                        </select>
                                        <div class="custom-select sources">
                                            <span
                                                class="custom-select-trigger"
                                                id="Religion_change">Select Religion</span>
                                            <div class="custom-options">
                                                <span class="custom-option list" data-value="0">Select Religion</span><span
                                                    class="custom-option undefined"
                                                    data-value="32">Buddhist</span><span
                                                    class="custom-option undefined"
                                                    data-value="30">Christian</span><span
                                                    class="custom-option undefined"
                                                    data-value="1">Hindu</span><span
                                                    class="custom-option undefined"
                                                    data-value="112">Intercaste</span><span
                                                    class="custom-option undefined"
                                                    data-value="108">Ishai</span><span
                                                    class="custom-option undefined"
                                                    data-value="77">Jain</span><span
                                                    class="custom-option undefined"
                                                    data-value="3">Muslim</span><span
                                                    class="custom-option undefined"
                                                    data-value="111">Parsi</span><span
                                                    class="custom-option undefined"
                                                    data-value="4">Sikh</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->



                </div>
                </form>



                <!-- <form action="{{ route('frontend.searchSubmit') }}" method="POST"
                    class="!p-0 od-search-option bg-white search_form">
                    <div class="!p-[50px] w-full">
                        <div class="row !gap-y-3">
                            @csrf
                            <div class="lg:col-span-4 col-span-12  od-search-fields">
                                <div class="text-[1.2rem] md:text-[1rem] text-[#522b79] !mb-2">@lang('site.i_am_looking_for')</div>
                                <div
                                    class="od-search-option-input border-[1px]  rounded-md border-slate-300 search_box_container relative">
                                    <select class="rounded-md !bg-white !border-0 cursor-pointer dropdown_no_arrow"
                                        name="bride_groom">
                                        <option value="">@lang('site.please_select')</option>
                                        <option value="all">@lang('site.all_biodata')</option>
                                        <option value="groom">@lang('site.groom_biodata')</option>
                                        <option value="bride">@lang('site.bride_biodata')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="lg:col-span-4 col-span-12 od-search-fields">
                                <div class="text-[1.2rem] md:text-[1rem] text-[#522b79] !mb-2">@lang('site.marital_status')</div>
                                <div
                                    class="od-search-option-input border-[1px]  rounded-md border-slate-300 search_box_container relative">
                                    <select class="rounded-md !bg-white !border-0 cursor-pointer dropdown_no_arrow"
                                        name="marital_status">
                                        <option value="">@lang('site.please_select')</option>
                                        <option value="unmarried">@lang('site.unmarried')</option>
                                        <option value="married">@lang('site.married')</option>
                                        <option value="divorced">@lang('site.divorced')</option>
                                        <option value="widow">@lang('site.widow')</option>
                                        <option value="widower">@lang('site.widower')</option>
                                        <option value="all">@lang('site.all')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="lg:col-span-4 col-span-12 od-search-fields">
                                <div class="text-[1.2rem] md:text-[1rem] text-[#522b79] !mb-2">@lang('site.biodata_type')</div>
                                <div
                                    class="od-search-option-input border-[1px]  rounded-md border-slate-300  search_box_container relative">
                                    <select
                                        class="rounded-md !bg-white border-[1px] cursor-pointer dropdown_no_arrow !border-[#cbd5e1]"
                                        name="biodata_type">
                                        <option value="">@lang('site.please_select')</option>
                                        <option value="all">@lang('site.all')</option>
                                        <option value="general">@lang('site.general')</option>
                                        <option value="deen">@lang('site.alem_alema')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="lg:col-span-4 col-span-12 od-search-fields">
                                <div class="text-[1.2rem] md:text-[1rem] text-[#522b79] !mb-2">@lang('site.parmanent_address')</div>
                                <div
                                    class="od-search-option-input border-[1px] rounded-md border-slate-300 search_box_container relative address_container">
                                    <input type="hidden" name="district" id="district" value=""
                                        class="address_name" required>
                                    <button type="button"
                                        class="od-biodata-search-control dropdown-field address_menu_button"
                                        style="display: flex; align-items: center; height: 100%; width: 100%; padding: 0 15px; cursor: pointer"
                                        aria-haspopup="true" aria-expanded="true">
                                        <span class="text-slate-400 inline-block">
                                            @lang('site.please_select_address')
                                        </span>
                                    </button>
                                    <div
                                        class="address_menu_dropdown z-10 min-h-[300px] overflow-hidden hidden origin-top-right absolute left-0 !mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                        <div class="!py-1 h-full w-full">
                                            <div
                                                class="absolute top-0 left-0 w-full h-full bg-white z-100 duration-300 country_container">
                                                <div
                                                    class="cursor-pointer flex justify-between w-full !px-4 !py-2 text-sm text-gray-700 hover:bg-gray-100 country_btn">
                                                    @lang('site.bangladesh')
                                                    <svg class="w-5 h-5 -rotate-90" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                            {{-- <div
                                                    class="block !px-4 !py-2 hover:bg-gray-100 text-primary-color cursor-pointer text-sm remove_division">
                                                    <i class="fa fa-long-arrow-left"></i> Back To Previous
                                                </div> --}}
                                            @foreach ($addressList as $divisionId => $division)
                                            <div class="group">
                                                {{-- division buttons --}}
                                                <div data-divisionId="{{ $divisionId }}"
                                                    class="cursor-pointer flex justify-between w-full !px-4 !py-2 text-sm text-gray-700 hover:bg-gray-100 division_btn">
                                                    {{ App::getLocale() == 'en' ? $division['name'] : __('districts.' . $division['name']) }}
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>

                                                {{-- district list under divisions --}}
                                                <div
                                                    class="absolute left-full duration-300 h-full top-0 w-full bg-white rounded-md district_container_{{ $divisionId }} district_container z-20">
                                                    <div class="h-full w-full overflow-y-scroll">
                                                        <div
                                                            class="block !px-4 !py-2 hover:bg-gray-100 text-primary-color cursor-pointer text-sm remove_district">
                                                            <i class="fa fa-long-arrow-left"></i> Back To Previous
                                                        </div>
                                                        @foreach ($division['districts'] as $districtId => $district)
                                                        <div>

                                                            {{-- district buttons --}}
                                                            <div class="parent block !px-4 !py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer district_btn"
                                                                data-districtId="{{ $districtId }}"
                                                                data-divisionId="{{ $divisionId }}">
                                                                <div class="flex items-center justify-between">
                                                                    {{ App::getLocale() == 'en' ? $district['name'] : __('districts.' . $district['name']) }}
                                                                    <svg class="w-5 h-5" viewBox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                            </div>

                                                            {{-- subdistrict list under district --}}
                                                            <div
                                                                class="absolute left-full duration-300 h-full top-0 w-full bg-white rounded-md subdistrict_container_{{ $districtId }}_{{ $divisionId }} subdistrict_container z-30">
                                                                <div class="h-full w-full overflow-y-scroll">
                                                                    <div
                                                                        class="block !px-4 !py-2 hover:bg-gray-100 text-primary-color cursor-pointer text-sm remove_subdistrict">
                                                                        <i class="fa fa-long-arrow-left"></i>
                                                                        Back To Previous
                                                                    </div>
                                                                    @foreach ($district['subdistricts'] as $subdistrictId => $subdistrict)
                                                                    <div data-value="{{ $subdistrict['value'] }}"
                                                                        class="subdistrict_btn cursor-pointer block !px-4 !py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                        {{ App::getLocale() == 'en' ? $subdistrict['name'] : __('districts.' . $subdistrict['name']) }}
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="lg:col-span-4 col-span-12 od-search-fields">
                                    <div class="text-[1.2rem] md:text-[1rem] text-[#522b79] !mb-2">@lang('site.biodata_no')</div>
                                    <div class="od-search-option-input">
                                        <input type='text'
                                            class="od-biodata-search-control outline-none h-full w-full !px-3 border-[#d5d5d5] border-[1px] rounded-[10px]"
                                            name="biodata_no" placeholder="@lang('site.type_biodata_no')" />
                                    </div>
                                </div> --}}
                            <div class="col-span-12 lg:col-span-4 lg:!mt-[35px] xl:!mt-[40px]">
                                <button type="submit"
                                    class="bg-secondary-color rounded-md !px-10 hover:bg-primary-color duration-300 text-white !py-2 lg:py-[6px] xl:py-3 w-full lg:w-auto">
                                    <i class="fa fa-search"></i> @lang('site.search')
                                </button>
                            </div>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
</div>
<!-- Biodata Submit section -->

<!-- ============== App downlode section start =============== -->
<!-- ========================================================= -->
<div class="submit_bio">
    <div class="app-away-main-sd">
        <div class="container">
            <div class="row app-away-deskcenter">
                <!-- Left Side: Content -->
                <div class="col-lg-6">
                    <div class="mockup-bg position-relative">
                        <img src="{{ asset('/assets/frontend_new/images/without-female.png') }}" alt=""
                            class="app-bg" />
                        <img src="{{ asset('assets') }}/svg/app-bg-round.svg" alt="" class="r-set-appbg" />
                    </div>
                    <div class="app-play-stres text-center mt-2 hidden-lg hidden-md">

                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="app-content-aways">

                        <h3 class="!mb-5 !mt-5 " style="color: #505050ff;"> @lang('site.submit_biodata')
                            <br>
                        </h3>
                        <h1 class="!mb-5 !mt-5 " style="color: #FF2ADE;"> @lang('site.submit_biodata2')
                            <br>
                        </h1>
                        <span class="completly_free">@lang('site.completly_free')</span>

                        <div class="s-away-icn mt-5">

                            <button class="btn btn-info mt-2 create-bio">

                                <a href="{{ route('user.edit_biodata.index') }}"
                                    class="col-span-12 sm:col-span-6 bg-button-color !text-white font-bold text-center drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md gap-2 p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline !text-[1rem] sm:!text-[1.2rem]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem"
                                        viewBox="0 0 16 16">
                                        <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z" />
                                    </svg> @lang('site.create_biodata')
                                </a>
                            </button>
                            <button class="btn btn-info mt-2 how-to-create-bio">

                                <a href="{{ getSettings() ? getSettings()->social_youtube : '#' }}" target="_BLANK"
                                    class="col-span-12 sm:col-span-6 border-[2px] border-red-600 bg-white  text-center  drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md text-xl !text-red-600  gap-2  !text-[1rem] sm:!text-[1.2rem] !p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline">
                                    <i class="fa fa-youtube-play text-red-600 text-4xl" aria-hidden="true"></i>
                                    @lang('site.how_to')
                                </a>

                            </button>



                        </div>
                        <p class="submit_last_line">
                            <!-- Stay connected with Muslim Biye for finding your perfect match -->
                            @lang('site.submit_last_line')

                        </p>
                        <div class="app-play-stres hidden-sm hidden-xs">

                            <!-- <a target="_blank" href="#"><img src="{{ asset('assets') }}/newImages/app-store.png" alt="App Store" /></a>
                        <a target="_blank" href="#"><img src="{{ asset('assets') }}/newImages/google-play.png" alt="Google Play" /></a> -->
                        </div>
                    </div>
                </div>

                <!-- Right Side: Image -->



            </div>
        </div>

        <!-- Decorative Shapes -->
        <div class="app-left-shape">
            <img src="{{ asset('assets') }}/svg/app-bg-round-1.svg" alt="" />
        </div>
        <div class="app-right-shape">
            <img src="{{ asset('assets') }}/svg/app-bg-round-1.svg" alt="" />
        </div>
    </div>
</div>
<!-- ========================================================= -->
<!-- =============== App downlode section end =================== -->

<!-- Biodata Submit section -->


<!-- millions of happy stories section start  -->
<div class="last_added_seactions">
    <div class="container">
        <div class="last_added_roundbg">
            <div class="row">
                <div class="seaction_rdtitle">
                    <h2> {!! __('site.find_soulmate') !!} <span></span></h2>
                    <h1> {!! __('site.find_soulmate2') !!} </h1>


                </div>

                <!-- All card here in this div -->
                <div class="last_slider-profiles owl-carousel owl-theme">
                    <!-- card 1 -->
                    <div class="items">
                        <div class="main_profile-sfkl">
                            <div class="contet_last-detilsd contet_last-detilsd_1">

                                <h4>@lang('site.create_biodata')</h4>
                                <p>
                                    @lang('site.easy_to_create')<br />
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="main_profile-sfkl">
                            <!-- <img src="{{ asset('assets') }}/newImages/mayur.png" alt="" class="last_prf-img" /> -->
                            <div class="contet_last-detilsd">
                                <!-- <h4>Mayur Tamhanekar &amp; Dr. Vishakha Annareddy</h4> -->
                                <h4>@lang('site.find_biodata')</h4>
                                <p>
                                    @lang('site.find_biodata_text')<br />
                                    <!-- <a href="#" class="more">Read More</a> -->
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="main_profile-sfkl">
                            <!-- <img src="{{ asset('assets') }}/newImages/mayur.png" alt="" class="last_prf-img" /> -->
                            <div class="contet_last-detilsd">
                                <!-- <h4>Mayur Tamhanekar &amp; Dr. Vishakha Annareddy</h4> -->
                                <h4>@lang('site.contact_us')</h4>
                                <p>
                                    @lang('site.contact_us_page')<br />
                                    <!-- <a href="#" class="more">Read More</a> -->
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="main_profile-sfkl">
                            <!-- <img src="{{ asset('assets') }}/newImages/mayur.png" alt="" class="last_prf-img" /> -->
                            <div class="contet_last-detilsd contet_last-detilsd_4">
                                <!-- <h4>Mayur Tamhanekar &amp; Dr. Vishakha Annareddy</h4> -->
                                <h4>@lang('site.marrage_complete')</h4>
                                <p>
                                    @lang('site.marrage_complete_text')<br />
                                    <!-- <a href="#" class="more">Read More</a> -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- millions of happy stories section start  -->



<!-- ========================================================= -->
<!-- ============== offer section =============== -->
<!-- ========================================================= -->
<div class="mega-offer-section">
    <div class="app-away-main-sd">
        <div class="container">
            <div class="row app-away-deskcenter">
                <div class="col-lg-5 mega-offer-mobile">
                    <div class="mockup-bg position-relative">
                        <img src="{{ asset('assets') }}/newImages/mega-offer.webp" alt="" class="app-bg" />
                        <img src="{{ asset('assets') }}/svg/app-bg-round.svg" alt="" class="r-set-appbg" />
                    </div>

                </div>

                <div class="col-lg-7 ">
                    <div class="app-content-aways">
                        <img width="50" class="mega-offer-img" src="{{ asset('assets') }}/newImages/mega-offer.gif"
                            alt="" class="last_prf-img" />
                        <spna class="mega-offer"> মেগা অফার </spna>

                        <h2 class="offer-title" style="color: #A51F97;"> @lang('site.ten_exclusive') </h2>
                        <h4 style="color: #505050ff;">
                            @lang('site.offer_details1') <br>
                            @lang('site.offer_details2')

                        </h4>


                        <div class="s-away-icn">

                            <button class="btn btn-info create-bio">

                                <a href="{{ route('user.edit_biodata.index') }}"
                                    class="col-span-12 sm:col-span-6 bg-button-color !text-white font-bold text-center drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md gap-2 p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline !text-[1rem] sm:!text-[1.2rem]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem"
                                        viewBox="0 0 16 16">
                                        <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z" />
                                    </svg> @lang('site.create_biodata_now')
                                </a>
                            </button>
                            <!--<a href="{{ route('user.edit_biodata.index') }}" class="btn_register-ht"><img src="{{ asset('assets') }}/svg/login-icon.svg" alt="" /> @lang('site.create_biodata')</a>-->
                        </div>
                        <h4 style="color: #505050ff;"> ১০টি কানেকশন — পছন্দের ১০টি বায়োডাটার অভিভাবকের সাথে সরাসরি
                            যোগাযোগের সুযোগ, আনলিমিটে
                            মেয়াদে!
                        </h4>

                        <h4> @lang('site.offer_title') </h4>


                        <p style="color: #A51F97;">
                            <!-- We are here to help you get the perfect match -->
                            <!-- @lang('site.offer_last_line') -->
                        <div class="app-play-stres hidden-sm hidden-xs">
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 mega-offer-pc">
                    <div class="mockup-bg position-relative">
                        <img src="{{ asset('assets') }}/newImages/mega-offer.webp" alt="" class="app-bg" />
                        <img src="{{ asset('assets') }}/svg/app-bg-round.svg" alt="" class="r-set-appbg" />
                    </div>

                </div>

            </div>
        </div>

        <div class="app-left-shape">
            <img src="{{ asset('assets') }}/svg/app-bg-round-1.svg" alt="" />
        </div>
        <div class="app-right-shape">
            <img src="{{ asset('assets') }}/svg/app-bg-round-1.svg" alt="" />
        </div>
    </div>
</div>
<!-- ========================================================= -->
<!-- =============== Offer section =================== -->
<!-- ========================================================= -->




<!-- Section 1: statistics section  -->
<!-- <div class="lccc-section-mains">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 b-righcity">
                <div class="sret-titles">
                    <h3><span class="count"> {{ $totalBiodataCount }} </span>+</h3>
                    <p> @lang('site.total_bride_groom_stat') </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 b-righcity">
                <div class="sret-titles">
                    <h3><span class="count">{{ $totalGroomBiodataCount }} </span></h3>
                    <p>@lang('site.total_groom_stat')</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 b-righcity">
                <div class="sret-titles">
                    <h3><span class="count">{{ $totalBrideBiodataCount }}</span></h3>
                    <p> @lang('site.total_bride_stat') </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="sret-titles">
                    <h3><span class="count">{{ $totalSuccessCount }}</span> @if ($totalSuccessCount > 0)
                        <span>+</span>
                        @endif
                    </h3>
                    <p>@lang('site.total_marrage_stat')</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Section 1: statistics section  -->





<!-- ========================================================= -->
<!-- ============== Money back section =============== -->
<!-- ========================================================= -->
<div class="app-away-main-sd money-back-guarantee">
    <div class="container">
        <div class="row app-away-deskcenter">

            <!-- Left Side: Image -->
            <div class="col-lg-6">
                <div class="mockup-bg position-relative">
                    <img width="90%" src="{{ asset('assets') }}/newImages/money-back-guaranteed.webp" alt=""
                        class="app-bg" />
                    <img src="{{ asset('assets') }}/svg/app-bg-round.svg" alt="" class="r-set-appbg" />
                </div>
                <div class="app-play-stres text-center mt-2 hidden-lg hidden-md">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="app-content-aways">
                    <h2 style="color: #FF2ADE;"> @lang('site.moneyback_title') </h2>

                    <h3 style="color: #505050ff;"> @lang('site.moneyback_details1') </h3> <br>

                    </h4>
                    <div class="s-away-icn">

                        <button class="btn btn-info how-to-create-bio">

                            <a href="/refund_policy"
                                class="col-span-12 sm:col-span-6 bg-button-color !text-white font-bold text-center drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md gap-2 p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline !text-[1rem] sm:!text-[1.2rem]">

                                </svg>@lang('site.know_more')
                            </a>
                        </button>
                    </div>
                    <p style="color: #505050ff;">
                        @lang('site.moneyback_last_line')
                    <div class="app-play-stres hidden-sm hidden-xs">

                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Decorative Shapes -->
    <div class="app-left-shape">
        <img src="{{ asset('assets') }}/svg/app-bg-round-1.svg" alt="" />
    </div>
    <div class="app-right-shape">
        <img src="{{ asset('assets') }}/svg/app-bg-round-1.svg" alt="" />
    </div>
</div>
<!-- ========================================================= -->
<!-- =============== Money back section =================== -->
<!-- ========================================================= -->





<!-- Section 2: Find your Special Someone -->
<!-- Find your Special Someone section start -->
<div class="why-we-ara">
    <div class="find-someone-section">
        <div class="container">
            <!-- Section Title -->

            <!-- Steps -->
            <div class="row" style="margin-top: 50px">
                <!-- Step 1: Create Profile -->
                <div class="col-md-3">
                    <div class="step-box">
                        <div class="icon-container">
                            <img src="{{ asset('assets') }}/svg/find1.svg" alt="Create Profile Icon" />
                        </div>
                        <h3>@lang('site.perfect_match_title')</h3>

                        <p>@lang('site.perfect_match')</p>
                    </div>
                </div>

                <!-- Step 2: Browse Profiles -->
                <div class="col-md-3">
                    <div class="step-box">
                        <div class="icon-container">
                            <img src="{{ asset('assets') }}/svg/find2.svg" alt="Browse Profiles Icon" />
                        </div>
                        <!-- <h3> L3ayer Verified</h3> -->
                        <h3> @lang('site.verify_title') </h3>

                        <p>@lang('site.verify')</p>
                    </div>
                </div>

                <!-- Step 3: Connect -->
                <div class="col-md-3">
                    <div class="step-box">
                        <div class="icon-container">
                            <img src="{{ asset('assets') }}/svg/final-secure.png" alt="Secure Icon" />
                        </div>
                        <h3>@lang('site.secure_title')</h3>

                        <p>@lang('site.secure')</p>
                    </div>
                </div>

                <!-- Step 4: Interact -->
                <div class="col-md-3">
                    <div class="step-box">
                        <div class="icon-container">

                            <img src="{{ asset('assets') }}/svg/halal_logo1.png" alt="halal Icon" />
                        </div>
                        <!-- <h3>100% Halal</h3> -->
                        <h3>@lang('site.halal_title')</h3>

                        <p>@lang('site.halal')</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Find your Special Someone section end -->




<!-- trying our Mobile App section start  -->
<!-- <div class="app_bg_Sectionsf">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="left_appBg_content text-center">
                    <img src="{{ asset('assets') }}/newImages/mobile-app.png" alt="" class="app_mockupsd" />
                    <h4>Happiness is <span>just an app</span> away!</h4>
                    <div class="siply_app_df">
                        Simple | Fast | Convenient | Safe &amp; Secure
                    </div>
                    <div class="_app_plays-icons">
                        <a target="_blank" href="#"><img src="{{ asset('assets') }}/newImages/playstore-img-bg.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->



<!-- modul popup  -->

<!----footer start-- -->

<!-- download apps buttons sticky  -->
<!-- <a target="_blank" href="#" class="sticky-btn-download"
      ><img
        src="{{ asset('assets') }}/newImages/playstore_sticky.png"
        style="position: relative; right: 12px"
      />Download App</a> -->

<!-- ---progress bottom to top--- -->

<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="
            transition: stroke-dashoffset 10ms linear;
            stroke-dasharray: 307.919, 307.919;
            stroke-dashoffset: 307.919;
          "></path>
    </svg>
</div>

<!-- =========== Footer Start  =========== -->

<!-- ========================================================= -->
<!-- ============== নতুন ভিডিও মডেলের HTML কোড =============== -->
<!-- ========================================================= -->

<!--<div class="video-modal-overlay" id="videoModal">-->
<!--    <div class="video-modal-content">-->
<!--        Modal Header-->
<!--        <div class="modal-header">-->
<!--            <div>-->
<!--                <span class="announcement-text">Announcement</span>-->
<!--            </div>-->
<!--            <button class="modal-close-btn" id="closeModalBtn">&times;</button>-->
<!--        </div>-->

<!--        Modal Video-->
<!--        <div class="modal-video-container">-->
<!--            <video controls autoplay muted loop>-->
<!--                গুরুত্বপূর্ণ: এখানে আপনার নিজের ভিডিও ফাইলের পথ দিন-->
<!--                <source src="video/announcement.mp4" type="video/mp4" />-->
<!--                Your browser does not support the video tag.-->
<!--            </video>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!-- Modal -->
<!--<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-dialog-centered modal-lg">-->
<!--    <div class="modal-content">-->

<!--      <div class="modal-header">-->
<!--        <h5 class="modal-title" id="videoModalLabel">Announcement</h5>-->
<!--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--      </div>-->

<!--      <div class="modal-body text-center">-->
<!--        <video controls autoplay muted loop style="width:100%; border-radius:10px;">-->
<!--            <source src="{{ asset('video/announcement.mp4') }}" type="video/mp4" />-->
<!--            Your browser does not support the video tag.-->
<!--        </video>-->
<!-- চাইলে নিচে extra টেক্সট দিতে পারেন -->
<!-- <p class="mt-3">মুসলিম বিয়েতে আপনাকে স্বাগতম।</p> -->
<!--      </div>-->

<!--    </div>-->
<!--  </div>-->


<div class="login-modal-overlay" id="loginModal">
    <div class="video-modal-content">
        Modal Header
        <div class="modal-header">
            <div>
                <span class="announcement-text">Announcement</span>
            </div>
            <button class="modal-close-btn" id="closeModalBtn">&times;</button>
        </div>

        Modal Video
        <div class="modal-video-container">
            <p>মুসলিম বিয়েতে আপনাকে স্বাগতম।</p>
            <h3>বায়োডাটা দেখতে অনুগ্রহ করে লগিন করুন।</h3>
        </div>
    </div>
</div>


<!-- ========================================================= -->
<!-- ============== নতুন ভিডিও মডেল এখানে শেষ ================ -->
<!-- ========================================================= -->

<!-- =========== Footer End  =========== -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "@lang('site.please_select')",
        allowClear: true,
        multiple: true,
    });
});
</script>


<script>
document.getElementById('closeModalBtn').addEventListener('click', function() {
    document.getElementById('videoModal').style.display = 'none';
});
</script>



@endsection
@php
$addressList = getAddress();
$setting = App\Models\Setting::first();
@endphp
@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
<div class="od-content-main">
    <section class="bg-banner-color !pb-0">
        <div class="od-top-bg-content-container min-h-[800px] !pb-4">
            <div class="od-top-bg-content">
                <div class="od-top-bg-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-span-12 md:col-span-12">
                                <h1 class="!text-white !text-center lg:!text-[5rem]">
                                    <!--@lang('site.bangladeshi_matrimony')-->
                                    <span class="!text-primary-color second_text">@lang('site.muslimbie')</span>
                                </h1>
                                <h2 class="!text-center lg:!text-[2rem] !text-slate-200 font-bold">@lang('site.motto')
                                </h2>
                            </div>
                            <div class="col-span-12 md:col-span-12">
                                <div class="home-hadith-sec !text-center"
                                    style="background: url('{{ asset('public/assets/images/mb-transparent_w.png') }}'); background-size: contain; background-position:center; background-repeat:no-repeat">
                                    <img src="{{ asset('public/assets/images/stylish_uline_w.png') }}" alt="uline"
                                        class="w-40 ">
                                    <div>
                                        <p>@lang('site.speech')</p>
                                        <span>- @lang('site.speech_person')</span>
                                    </div>
                                    <img src="{{ asset('public/assets/images/stylish_uline_w.png') }}" alt="uline"
                                        class="w-40  rotate-180">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('frontend.searchSubmit') }}" method="POST"
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
                </form>

                
            </div>
        </div>
    </section>
    <section class="od-section od-home-call-to-action lg:!py-20">
        <div class="!mx-auto lg:px-24 !px-0">
            <div class="row !gap-5 !mt-5">
                <div class="col-span-12 {{-- md:col-span-7 --}}">
                    <h2 class="!mb-5 !mt-5 "> @lang('site.submit_biodata')
                        <span>@lang('site.completly_free')</span>
                    </h2>
                    {{-- <span class="inline-block !mb-[30px] !mt-[10px] lg:!text-left">
                            <span class="text-primary-color text-center">@lang('site.all_personal') </span>
                            @lang('site.personal_info_query')
                            <a href="{{ route('frontend.tos') }}" class="text-primary-color hover:underline">@lang('site.click_here')
                    <i class="fa fa-external-link"></i>
                    </a>
                    </span> --}}
                    <div class="flex gap-2 items-center justify-center w-full ">
                        <div class="row !gap-5">
                            <a href="{{ route('user.edit_biodata.index') }}"
                                class="col-span-12 sm:col-span-6 bg-button-color !text-white font-bold text-center drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md gap-2 p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline !text-[1rem] sm:!text-[1.2rem]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem"
                                    viewBox="0 0 16 16">
                                    <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z" />
                                </svg> @lang('site.create_biodata')
                            </a>
                            <a href="{{ getSettings() ? getSettings()->social_youtube : '#' }}" target="_BLANK"
                                class="col-span-12 sm:col-span-6 border-[2px] border-red-600 bg-white  text-center  drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md text-xl !text-red-600  gap-2  !text-[1rem] sm:!text-[1.2rem] !p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline">
                                <i class="fa fa-youtube-play text-red-600 text-4xl" aria-hidden="true"></i>
                                @lang('site.how_to')
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Home offer -->

    <!-- How it works -->


    <!-- Home offer -->

    @if ($setting->show_statistics == '1')
    <!-- Statictics -->
    <section class="od-section bg-primary-color-10 !py-16">
        <div class="od-container">
            <div class="od-section-widget-container">
                <div class="od-section-widget-items od-row">
                    <div class="od-col-12">
                        <h2> <span>@lang('site.muslimbie')</span>'@lang('site.s') @lang('site.success_stat')</h2>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div class="od-section-widget-item-content "
                            style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <img src="{{ asset('assets/frontend_new/images/muslim2.PNG') }}" alt="Couple Icon"
                                class="w-[35%] rounded-full">
                            <h4>@lang('site.total_bride_groom_stat')</h4>
                            <h3><span class="od-count">{{ $totalBiodataCount }}</span></h3>

                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div class="od-section-widget-item-content"
                            style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <img src="{{ asset('assets/frontend_new/images/islamicMan.jpg') }}" alt="Male Icon"
                                class="w-[30%] rounded-full">
                            <h4>@lang('site.total_groom_stat')</h4>
                            <h3><span class="od-count">{{ $totalGroomBiodataCount }}</span></h3>

                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div class="od-section-widget-item-content"
                            style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <img src="{{ asset('assets/frontend_new/images/nikab.PNG') }}" alt="Female Icon"
                                class="w-[30%] rounded-full">
                            <h4>@lang('site.total_bride_stat')</h4>
                            <h3><span class="od-count">{{ $totalBrideBiodataCount }}</span></h3>

                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div class="od-section-widget-item-content"
                            style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <img src="{{ asset('assets/frontend_new/images/wedding.png') }}"
                                class="w-[40%] rounded-full" alt="Success Icon">
                            <h4>@lang('site.total_marrage_stat')</h4>
                            <h3><span class="od-count">{{ $totalSuccessCount }}</span>
                                @if ($totalSuccessCount > 0)
                                <span>+</span>
                                @endif
                            </h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif



    <!--জীবনসঙ্গী খুজবেন -->
    <section class="od-section hiw-section !py-16">
        <div class="od-container">
            <div class="od-section-widget-container">
                <div class="od-section-widget-items od-row">
                    <div class="od-col-12">
                        <h2> {!! __('site.find_soulmate') !!}</h2>
                    </div>
                    <div class=" od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-create-biodata.svg') }}"
                                alt="Create Biodata Icon">
                            <h3 class="!text-white">@lang('site.create_biodata')</h3>
                            <p class="!text-white">@lang('site.easy_to_create')</p>
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-search.svg') }}"
                                alt="Search Icon">
                            <h3 class="!text-white">@lang('site.find_biodata')</h3>
                            <p class="!text-white">@lang('site.find_biodata_text')</p>
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-contact.svg') }}"
                                alt="Contact Icon">
                            <h3 class="!text-white">@lang('site.contact_us')
                            </h3>
                            <p class="!text-white">@lang('site.contact_us_page')
                            </p>
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-success.svg') }}"
                                alt="Success Icon">
                            <h3 class="!text-white">@lang('site.marrage_complete')
                            </h3>
                            <p class="!text-white">@lang('site.marrage_complete_text')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="od-section hiw-section !py-16">
        <div class="od-container">
            <div class="od-section-widget-container">
                <div class="od-section-widget-items od-row">
                    <div class="od-col-12">
                        <h2> {!! __('site.find_soulmate') !!}</h2>
                    </div>
                    <div class=" od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-create-biodata.svg') }}"
                                alt="Create Biodata Icon">
                            <h3 class="!text-white">@lang('site.create_biodata')</h3>
                            <p class="!text-white">@lang('site.easy_to_create')</p>
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-search.svg') }}"
                                alt="Search Icon">
                            <h3 class="!text-white">@lang('site.find_biodata')</h3>
                            <p class="!text-white">@lang('site.find_biodata_text')</p>
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-contact.svg') }}"
                                alt="Contact Icon">
                            <h3 class="!text-white">@lang('site.contact_us')
                            </h3>
                            <p class="!text-white">@lang('site.contact_us_page')
                            </p>
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-success.svg') }}"
                                alt="Success Icon">
                            <h3 class="!text-white">@lang('site.marrage_complete')
                            </h3>
                            <p class="!text-white">@lang('site.marrage_complete_text')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="od-section hiw-section !py-16">
        <div class="od-container">
            <div class="od-section-widget-container">
                <div class="od-section-widget-items od-row">
                    
                    <div class="od-col-12">
                        <h2> Best match maker </h2>
                    </div>

                    <hr>
                    <!-- <div class=" od-section-widget-item od-col-12 od-col-sm-6 od-col-md-4">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-create-biodata.svg') }}"
                                alt="Create Biodata Icon">
                            
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-4">
                        <div
                            class="bg-gradient-to-r !h-[310px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-search.svg') }}"
                                alt="Search Icon">
                        </div>
                    </div> -->
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-4">
                        <div
                            class=" !h-[30px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-contact.svg') }}"
                                alt="Contact Icon">
                                <h6>Perfect match </h6>
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-4">
                        <div
                            class="bg-gradient-to-r !h-[30px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-contact.svg') }}"
                                alt="Contact Icon">
                                <h6>Perfect match </h6>
                        </div>
                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-4">
                        <div
                            class="bg-gradient-to-r !h-[30px] bg-button-color !text-white od-section-widget-item-content">
                            <img src="{{ asset('assets/frontend_new/images/images-hiw-contact.svg') }}"
                                alt="Contact Icon">
                                <h6>Perfect match </h6>
                        </div>
                    </div>
                    <!-- <hr> -->
                  
                </div>
            </div>
        </div>
    </section>






    <section class="od-section bg-primary-color-10 !py-16">
        <div class="od-container">
            <div class="od-section-widget-container">
                <div class="od-section-widget-items od-row p-2">
                    <div class="od-col-12 ">
                        <!-- <h2> <span>@lang('site.muslimbie')</span>'@lang('site.s') @lang('site.success_stat')</h2> -->

                    </div>
                    <!-- <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                                <div class="od-section-widget-item-content "
                                    style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                    <img src="{{ asset('assets/frontend_new/images/muslim2.PNG') }}" alt="Couple Icon"
                                        class="w-[35%] rounded-full">
                                    <h4>@lang('site.total_bride_groom_stat')</h4>
                                    <h3><span class="od-count">{{ $totalBiodataCount }}</span></h3>

                                </div>
                            </div>
                            <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                                <div class="od-section-widget-item-content"
                                    style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                    <img src="{{ asset('assets/frontend_new/images/islamicMan.jpg') }}" alt="Male Icon"
                                        class="w-[30%] rounded-full">
                                    <h4>@lang('site.total_groom_stat')</h4>
                                    <h3><span class="od-count">{{ $totalGroomBiodataCount }}</span></h3>

                                </div>
                            </div>
                            <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                                <div class="od-section-widget-item-content"
                                    style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                    <img src="{{ asset('assets/frontend_new/images/nikab.PNG') }}" alt="Female Icon"
                                        class="w-[30%] rounded-full">
                                    <h4>@lang('site.total_bride_stat')</h4>
                                    <h3><span class="od-count">{{ $totalBrideBiodataCount }}</span></h3>

                                </div>
                            </div>
                            <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-3">
                                <div class="od-section-widget-item-content"
                                    style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                    <img src="{{ asset('assets/frontend_new/images/wedding.png') }}"
                                        class="w-[40%] rounded-full" alt="Success Icon">
                                    <h4>@lang('site.total_marrage_stat')</h4>
                                    <h3><span class="od-count">{{ $totalSuccessCount }}</span>
                                        @if ($totalSuccessCount > 0)
                                            <span>+</span>
                                        @endif
                                    </h3>
                                </div>

                            </div> -->

                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-6">
                        <h1>মেগা অফার </h1>
                        <p>🌟 মেগা অফার: শুধুমাত্র প্রথম ৩,০০০ জনের জন্য!</p>
                        <p>❌ আপনি মিস করছেন ১০টি এক্সক্লুসিভ কানেকশন!</p>
                        <p> 🎁 তবে এখনো সুযোগ আছে — একেবারে ফ্রিতে পেতে পারেন।</p>
                        <button class="bg-gradient-to-r from-pink-500 to-rose-500 text-white p-2  rounded-full shadow-lg hover:from-pink-600 hover:to-rose-600 transition duration-300" style="background-color: #AD277C;">
                            ক্লিক করুন এখনই
                        </button>

                    </div>
                    <div class="od-section-widget-item od-col-12 od-col-sm-6 od-col-md-6 flex justify-end items-center" style="background-image:url(''); background-repeat:no-repeat; background-size:contain">
                        <img src="https://e7.pngegg.com/pngimages/708/978/png-clipart-special-offer-signage-illustration-gold-badge-special-offer-badge-blue-text-thumbnail.png" class="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>







</div>




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
@endsection
@php
    $setting = App\Models\Setting::first();
@endphp
<nav class="fixed top-0 left-0 w-full">
    @if (env('DEBUG_NOTICE', false))
        <div class="bg-black text-white text-center p-2 text-xs md:text-sm">
            প্রিয় মেম্বারগণ! ওয়েবসাইটের ডেভলপমেন্ট চলতে থাকায় সাময়িক সমস্যা হতে পারে। সেজন্য আমরা আন্তরিকভাবে দুঃখিত!
            কোন ধরণের সমস্যায় পড়লে অনুগ্রহ করে আমাদের <a href="https://www.facebook.com/muslimbiebd" target="_BLANK"
                class="text-red-300">ফেসবুক পেইজে</a> যোগাযোগ করুন।
        </div>
    @endif
    <div class="top-nav bg-secondary-color">
        <div class="lg:w-4/5 px-2 lg:px-0 mx-1 sm:mx-auto py-4 text-white flex items-center">
            <div class="inline-block raleway font-[400] ">
                <img src="{{ asset('assets/frontend/res/images/icons/envelop.svg') }}" alt="envelop"
                    class="text-xs inline" />
                <span class="align-baseline pl-1">
                    {{ $setting->email }}
                </span>
            </div>
            <div class="ml-auto inline-flex  raleway font-[400]">
                <a target="_blank" href="{{ $setting->social_facebook }}"><img class="inline-block ml-2 sm:ml-4 pb-1"
                        src="{{ asset('assets/frontend/res/images/icons/facebook.svg') }}" /></a>
                <a target="_blank" href="{{ $setting->social_insta }}"><img class="inline-block ml-2 sm:ml-4 pb-1"
                        src="{{ asset('assets/frontend/res/images/icons/instagram.svg') }}" /></a>
                <a target="_blank" href="{{ $setting->social_youtube }}"><img class="inline-block ml-2 sm:ml-4 pb-1"
                        src="{{ asset('assets/frontend/res/images/icons/youtube.svg') }}" /></a>
                <a target="_blank" href="{{ $setting->social_linkedin }}"><img class="inline-block ml-2 sm:ml-4 pb-1"
                        src="{{ asset('assets/frontend/res/images/icons/linkedin.svg') }}" /></a>
                <span class="dropdown cursor-pointer mr-3 sm:mr-0"><img class="inline-block ml-4 sm:ml-10 pb-1 mr-2"
                        src="{{ asset('assets/frontend/res/images/icons/global.svg') }}" />
                    <span class="hidden md:inline">
                        {{
                            App::getLocale() == 'en' ? 'English' : 'বাংলা'
                        }}
                    </span>
                    <img class="inline-block ml-1 pb-1"
                        src="{{ asset('assets/frontend/res/images/icons/expand.svg') }}" />
                    <ul class="dropdown-container bg-white rounded drop-shadow-2xl">
                        <li class="p-2 hover:bg-slate-200 rounded">
                            <a href="{{route('frontend.lang','en')}}" class="text-black">
                                <img class="inline-block ml-1 pb-1 mr-2"
                                    src="{{ asset('assets/frontend/res/images/icons/en.png') }}" />
                                English
                            </a>
                        </li>
                        <li class="p-2 hover:bg-slate-200 rounded">
                            <a href="{{route('frontend.lang','bn')}}" class="text-black">
                                <img class="inline-block ml-1 pb-1 mr-2"
                                    src="{{ asset('assets/frontend/res/images/icons/bn.png') }}" />
                                বাংলা
                            </a>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </div>
    <div class="main-nav mx-1 lg:mx-auto py-7 shadow-md bg-white">
        <div class="lg:w-4/5 px-2 lg:px-0 mx-auto">
            <div class="flex items-center relative raleway">
                <div class="main_logo inline-block">
                    <a href="{{ route('frontend.home') }}">
                        <img src="{{ url('storage/' . $setting->logo ?? 'assets/images/logo/main_logo.svg') }}"
                            class="w-10" alt="MuslimBie" />

                    </a>
                </div>
                <div class="ml-auto lg:hidden">
                    <label for="right_bar_menu"
                        class="material-symbols-outlined text-secondary-color text-3xl cursor-pointer">
                        menu
                    </label>
                </div>
                <input type="checkbox" class="hidden" id="right_bar_menu" />
                <div class="right_bar ml-auto fixed lg:static w-2/3 lg:w-auto lg:h-auto bg-primary-color lg:bg-white">
                    <label for="right_bar_menu"
                        class="material-symbols-outlined lg:hidden text-4xl text-white cursor-pointer py-5 px-3">
                        close
                    </label>
                    <a href="{{ route('frontend.home') }}"
                        class="font-[700] text-white lg:text-primary-color pl-7 block lg:inline-block text-center lg:text-left p-2]">@lang('site.home')</a>
                    <span
                        class="cursor-pointer text-white lg:text-dark-color pl-7 lg:hover:text-black dropdown block lg:inline-block text-center lg:text-left p-2">
                        @lang('site.biodata')
                        <img class="hidden lg:inline-block ml-1 pb-1"
                            src="{{ asset('assets/frontend/res/images/icons/expand_dark.svg') }}" />
                        <img class="inline-block lg:hidden ml-1 pb-1"
                            src="{{ asset('assets/frontend/res/images/icons/expand.svg') }}" />
                        <ul class="dropdown-container bg-white rounded drop-shadow-2xl nav-dropdown">
                            <li class="p-2 hover:bg-slate-200 rounded">
                                <a href="{{ route('frontend.search_slug', 'Groom') }}"
                                    class="text-black inline-block w-full">
                                    <img class="inline-block ml-1 pb-1 mr-2"
                                        src="{{ asset('assets/frontend/res/images/icons/groom.svg') }}" />
                                        @lang('site.groom')
                                </a>
                            </li>
                            <li class="p-2 hover:bg-slate-200 rounded">
                                <a href="{{ route('frontend.search_slug', 'Bride') }}"
                                    class="text-black inline-block w-full">
                                    <img class="inline-block ml-1 pb-1 mr-2"
                                        src="{{ asset('assets/frontend/res/images/icons/bride.svg') }}" />
                                        @lang('site.bride')
                                </a>
                            </li>
                        </ul>
                    </span>
                    <a href="{{ route('frontend.success') }}"
                        class="text-white lg:text-dark-color pl-7 lg:hover:text-black  block lg:inline-block text-center lg:text-left p-2">@lang('site.success_story')</a>
                    <a href="#"
                        class="text-white lg:text-dark-color pl-7 lg:hover:text-black block lg:inline-block text-center lg:text-left p-2">@lang('site.tutorial')</a>
                    <span
                        class="cursor-pointer text-white lg:text-dark-color pl-7 lg:hover:text-black dropdown block lg:inline-block text-center lg:text-left p-2">
                        @lang('site.about_us')
                        <img class="hidden lg:inline-block ml-1 pb-1"
                            src="{{ asset('assets/frontend/res/images/icons/expand_dark.svg') }}" />
                        <img class="inline-block lg:hidden ml-1 pb-1"
                            src="{{ asset('assets/frontend/res/images/icons/expand.svg') }}" />
                        <ul class="dropdown-container bg-white rounded drop-shadow-2xl nav-dropdown">
                            <li class="p-2 hover:bg-slate-200 rounded">
                                <a href="{{ route('frontend.mission') }}" class="text-black inline-block w-full">
                                    @lang('site.mission')
                                </a>
                            </li>
                            <li class="p-2 hover:bg-slate-200 rounded inline-block w-full">
                                <a href="{{ route('frontend.vision') }}" class="text-black inline-block w-full">
                                    @lang('site.vision')
                                </a>
                            </li>
                            <li class="p-2 hover:bg-slate-200 rounded">
                                <a href="{{ route('frontend.tos') }}" class="text-black inline-block w-full">
                                    @lang('site.terms_and_conditions')
                                </a>
                            </li>
                            <li class="p-2 hover:bg-slate-200 rounded">
                                <a href="{{ route('frontend.privacy_policy') }}"
                                    class="text-black inline-block w-full">
                                    @lang('site.privacy_policy')
                                </a>
                            </li>
                            <li class="p-2 hover:bg-slate-200 rounded">
                                <a href="{{ route('frontend.admin_info') }}" class="text-black inline-block w-full">
                                    @lang('site.admin_info')
                                </a>
                            </li>
                            <li class="p-2 hover:bg-slate-200 rounded">
                                <a href="{{ route('frontend.achievement') }}" class="text-black inline-block w-full">
                                    @lang('site.achievement')
                                </a>
                            </li>
                        </ul>
                    </span>
                    <span
                        class="text-white lg:text-dark-color pl-7 hover:text-black dropdown lg:pr-10 block lg:inline text-center lg:text-left p-2 cursor-pointer">
                        <img src="{{ asset('assets/frontend/res/images/icons/user.svg') }}"
                            class="w-4 lg:inline-block hidden" alt="user" />
                        <img src="{{ asset('assets/frontend/res/images/icons/user_white.svg') }}"
                            class="w-4 inline-block lg:hidden" alt="user" />
                        <img class="hidden lg:inline-block ml-1 pb-1"
                            src="{{ asset('assets/frontend/res/images/icons/expand_dark.svg') }}" />
                        <img class="inline-block lg:hidden ml-1 pb-1"
                            src="{{ asset('assets/frontend/res/images/icons/expand.svg') }}" />
                        <ul class="dropdown-container bg-white rounded drop-shadow-2xl nav-dropdown">
                            @if (Auth::guard('admin')->check())
                                <li class="p-2 hover:bg-slate-200 rounded">
                                    <a href="{{ route('admin.dashboard') }}" class="text-black inline-block w-full">
                                        @lang('site.dashboard')
                                    </a>
                                </li>
                                <li class="p-2 hover:bg-slate-200 rounded">
                                    <a href="{{ URL::to('/admin_login/logout') }}"
                                        class="text-black inline-block w-full">
                                        @lang('site.logout')
                                    </a>
                                </li>
                            @else
                                <li class="p-2 hover:bg-slate-200 rounded">
                                    <a href="{{ route('user.auth.login') }}" class="text-black inline-block w-full">
                                        @lang('site.login')
                                    </a>
                                </li>
                                <li class="p-2 hover:bg-slate-200 rounded">
                                    <a href="{{ route('register') }}" class="text-black inline-block w-full">
                                        @lang('site.register')
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </span>
                    <a href="{{ route('frontend.biodata') }}"
                        class="!py-3.5 px-3 bg-white lg:bg-secondary-color text-primary-color lg:text-white font-[700] block lg:inline-block text-center rounded">@lang('site.make_biodata')</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="nav-gap @if (env('DEBUG_NOTICE', false)) mt-16 md:mt-10 @endif"></div>

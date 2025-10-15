@extends('frontend_new.layouts.master')
@section('content')
    <div class="row !gap-0 border-b-2 border-white">
        <div class="col-span-12 md:col-span-6 bg-primary-color-10">
            @yield('auth')
        </div>
        <style>
            @media (max-width: 767px) {
    .hide-on-mobile {
        display: none !important;
    }
}
        </style>
        <div class="col-span-12 md:col-span-6 bg-secondary-color-alter !py-40 flex justify-center hide-on-mobile ">
            <div class="home-hadith-sec flex flex-col md:max-w-[70%]"
                style="background: url('{{ asset('assets/frontend_new/images/mb-transparent_w.png') }}'); background-size: contain; background-position:center; background-repeat:no-repeat">
                <img src="{{ asset('assets/frontend_new/images/stylish_uline_w.png') }}" alt="uline" class="w-40 !mr-auto">
                <div class="w-full">
                    <p>@lang('site.speech')</p>
                    <span>- @lang('site.speech_person')</span>
                </div>
                <img src="{{ asset('assets/frontend_new/images/stylish_uline_w.png') }}" alt="uline"
                    class="w-40 !ml-auto rotate-180">
            </div>
        </div>
    </div>


    {{-- <div class="od-content-main">
        <section id="od_user_login">
            <div class="od-user-login-form-container">
                <div class="od-card">
                    <div class="od-card-body">
                        <h2 class="od__box_title od-text-align-center">অ্যাকাউন্টে লগইন করুন</h2>


                        <div class="od-form-group-container">
                            <!-- <div class="od-form-group-container od-pt-40 od-manually-panel  od-display-none "> -->

                            <form method="post"
                                action="{{ route('admin.auth.loginAdmin') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="od-form-group-container">
                                    <div class="od-form-group-label od-pb-5">
                                        <div class="od-form-label">ইমেইল অথবা মোবাইল নাম্বার</div>
                                    </div>
                                    <div class="od-form-group-input">
                                        <input type="text" name="email" value="{{ old('email') }}" required
                                            class="od-form-control od-w-100" placeholder="@lang('site.email_or_phone')" autofocus>
                                    </div>
                                    @error('email')
                                        <span class="text-red-600" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="od-form-group-container">
                                    <div class="od-form-group-label od-pb-5">
                                        <div class="od-form-label">পাসওয়ার্ড</div>
                                    </div>
                                    <div class="od-form-group-input">
                                        <input type="password" class="od-form-control od-w-100"
                                            placeholder="@lang('site.password')" name="password" required>
                                        @error('password')
                                            <span class="text-red-600" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <div class="od-display-flex">
                                            <div class="od-form-label od-mt-5">
                                                <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>মনে রাখুন</label>
                                            </div>
                                            <div class="od-form-label od-mt-5 od-margin-left-auto">
                                                <a href="{{ route('password.request') }}">পাসওয়ার্ড ভুলে
                                                    গেছেন?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="od-form-submit-button">
                                    <button class="od-button" type="submit"><span>&nbsp;</span>লগইন করুন</button>
                                </div>
                            </form>
                        </div>
                        <div class="od-form-group-container">
                            <div class="od-separator"><span class="od-bg-white od-form-label od-pl-15 od-pr-15">অথবা</span>
                            </div>
                        </div>
                        <div class="od-form-group-container">
                            <div class="od-social-network">
                                <div class="od-social-login-container">
                                    <div class="od-button od-btn-google">
                                        <a href="{{ route('frontend.googleLogin') }}">
                                            গুগল দিয়ে এগিয়ে যান
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="od-form-group-container">
                            <div class="od-text-align-center od-create-account od-pt-10">
                                <div class="od-form-label od-pb-15">আপনার কোন অ্যাকাউন্ট নেই?</div>
                                <div class="od-form-label od-button btn-success">
                                    <a href="{{ route('register') }}"><span>&nbsp;</span>একাউন্ট তৈরী করুন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}
@endsection

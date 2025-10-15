@extends('frontend_new.layouts.master')
@section('title', 'Register')

@section('content')
    {{-- <div class="od-content-main">
        <section id="od_user_registration">
            <div class="od-user-registration-form-container">
                <div class="od-card">
                    <div class="od-card-body">
                        <h2 class="od__box_title od-text-align-center">অ্যাকাউন্ট তৈরী করুন</h2>
                        <div class="od-form-group-container ">
                            <form method="post" action="{{ route('UserRegister') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="od-form-group-container">
                                    <div class="od-form-group-label od-pb-5">
                                        <div class="od-form-label">নাম</div>
                                    </div>
                                    <div class="od-form-group-input">
                                        <input type="text" name="name" class="od-form-control od-w-100"
                                            value="{{ old('name') }}" placeholder="@lang('site.write_your_name')" required
                                            autocomplete="name" autofocus>

                                    </div>
                                </div>


                                <!-- New feild start -->
                                <div class="od-form-group-container">
                                    <div class="od-form-group-label od-pb-5">
                                        <div class="od-form-label">লিঙ্গগত পরিচয়</div>
                                    </div>
                                    <div class="od-form-group-input">
                                        <select name="gender" required>
                                            <option value="">লিঙ্গ নির্বাচন করুন</option>
                                            <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>পুরুষ
                                            </option>
                                            <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>নারী
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="od-form-group-container otp otp email-otp-container">
                                    <div class="od-form-group-label od-pb-5">
                                        <div class="od-form-label">ইমেইল</div>
                                    </div>
                                    <div class="od-full-email-otp-container">
                                        <div class="od-form-group-input">
                                            <input type="text" name="email" class="od-form-control has-btn"
                                                value="{{ old('email') }}" placeholder="@lang('site.email_address')" required
                                                autocomplete="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="od-form-group-container otp mobile-otp-container">
                                    <div class="od-form-group-label od-pb-5">
                                        <div class="od-form-label">মোবাইল নাম্বার</div>
                                    </div>
                                    <div class="od-full-mobile-otp-container">
                                        <div class="od-form-group-input">
                                            <input type="tel" name="phone" class="od-form-control has-btn"
                                                value="{{ old('phone') }}" placeholder="@lang('site.phone_number')" required
                                                autocomplete="phone" minlength="10">
                                        </div>
                                    </div>
                                </div>
                                <!-- New feild end -->

                                <div class="od-form-group-container">
                                    <div class="od-form-group-label od-pb-5">
                                        <div class="od-form-label">পাসওয়ার্ড</div>
                                    </div>
                                    <div class="od-form-group-input">
                                        <input type="password" name="password" class="od-form-control od-w-100"
                                            placeholder="@lang('site.password')" required autocomplete="new-password"
                                            minlength="8">
                                        <div class="od-pass-note">ন্যূনতম ৮ অক্ষরে লিখুন</div>
                                    </div>
                                </div>
                                <div class="od-form-group-container">
                                    <div class="od-form-group-label od-pb-5">
                                        <div class="od-form-label">পাসওয়ার্ড নিশ্চিত করুন</div>
                                    </div>
                                    <div class="od-form-group-input">
                                        <input type="password" class="od-form-control od-w-100" name="password_confirmation"
                                            placeholder="@lang('site.confirm_password')" minlength="8" required
                                            autocomplete="password_confirmation">
                                        <div class="od-pass-note">ন্যূনতম ৮ অক্ষরে লিখুন</div>
                                    </div>
                                </div>

                                <div class="od-form-group-container">
                                    <div class="od-control-group-container od-terms-conditions">
                                        <label>
                                            <input class="form-check-input" type="checkbox" name="agree" id="agree"
                                                {{ old('agree') ? 'checked' : '' }} onchange="submitCheck()">
                                            <span class="od-form-label">
                                                @lang('site.i_agree_to_all_the') <a href="{{ route('frontend.tos') }}"
                                                    class="text-secondary-color font-semibold">@lang('site.term')</a>
                                                @lang('site.and') <a href="{{ route('frontend.privacy_policy') }}"
                                                    class="text-secondary-color font-semibold">@lang('site.privacy_policy')</a>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="od-form-submit-button">
                                    <button class="od-button disabled:!cursor-not-allowed disabled:opacity-70 " disabled='true' id="submitBtn" type="submit"><span>&nbsp;</span>অ্যাকাউন্ট তৈরী
                                        করুন</button>
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
                                        <a href="https://ordhekdeen.com/oauth/google">
                                            গুগল দিয়ে এগিয়ে যান
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="od-form-group-container">
                            <div class="od-pt-10">
                                <div class="od-text-align-center od-login-account">
                                    <div class="od-form-label">ইতিমধ্যে একটি অ্যাকাউন্ট আছে?</div>
                                    <div class="od-form-label">
                                        <a class="text-secondary-color" href="{{route('user.auth.login')}}">আপনার অ্যাকাউন্টে লগইন করুন</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}

    {{-- <div class="search_section max-w-lg !my-10 !p-5 !mx-auto raleway" style="max-width: 600px;">
        <div class="customGrid gap-5 items-center">
            <div class="col-span-12">
                <div class="">
                    <div class="text-2xl text-center !py-3 raleway font-semibold text-slate-700 !mb-3">@lang('site.sign_up')</div>

                    <form method="POST" action="{{ route('UserRegister') }}" class="customGrid gap-3">
                        <div class="col-span-12 !mt-4">
                            <a href="{{ route('frontend.googleLogin')}}"
                                class="block item_filter opacity-75 text-center hover:bg-slate-200 duration-300 ease-in"
                                style="font-family: Raleway,sans-serif;">
                                <img class="inline-block w-4"
                                    src="{{ asset('assets/frontend/res/images/icons/google.png') }}">
                                    @lang('site.continue_google')
                            </a>
                        </div>
                        <div class="col-span-12 !mt-4 !py-2 text-center center_line">
                            <span>
                                <b>@lang('site.or')</b>
                            </span>
                        </div>
                        <div class="col-span-12 !mb-3">
                            @csrf
                            <label for="name">@lang('site.name')</label>
                            <input id="name" type="text"
                                class="item_filter w-full @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="@lang('site.name')" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback text-red-600" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-6 !mb-3">
                            <label for="email">@lang('site.email_address')</label>
                            <input id="email" type="email"
                                class="item_filter w-full @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="@lang('site.email_address')" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback text-red-600" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-6 !mb-3">
                            <label for="phone">@lang('site.phone_number')</label>
                            <input id="phone" type="number"
                                class="item_filter w-full @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" placeholder="@lang('site.phone_number')" required autocomplete="phone" minlength="10">

                            @error('phone')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-6 !mb-3">
                            <label for="password">@lang('site.password')</label>
                            <input id="password" type="password"
                                class="item_filter w-full @error('password') is-invalid @enderror" name="password"
                                placeholder="@lang('site.password')" required autocomplete="new-password" minlength="8">

                            @error('password')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-6 !mb-3">
                            <label for="password-confirm">@lang('site.confirm_password')</label>
                            <input id="password-confirm" type="password" class="item_filter w-full"
                                name="password_confirmation" placeholder="@lang('site.confirm_password')" minlength="8" required autocomplete="new-password">
                        </div>
                        <div class="col-span-12 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="agree" id="agree"
                                    {{ old('agree') ? 'checked' : '' }} onchange="submitCheck()">

                                <label class="form-check-label" for="agree">
                                    @lang('site.i_agree_to_all_the') <a href="{{route('frontend.tos')}}" class="text-secondary-color font-semibold">@lang('site.term')</a> @lang('site.and') <a href="{{route('frontend.privacy_policy')}}" class="text-secondary-color font-semibold">@lang('site.privacy_policy')</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-12">
                            <button type="submit" class="bg-secondary-color block w-full text-white !py-3 rounded font-bold" id="submitBtn" disabled>
                                @lang('site.create_free_account')
                            </button>
                        </div>
                        <div class="col-span-12 !my-6 text-center">
                            @lang('site.already_have_account') <a href="{{route('user.auth.login')}}" class="text-secondary-color font-bold">@lang('site.login')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('js')
    <script>
        function submitCheck() {
            let submitBtn = $('#submitBtn');
            if ($('#agree').prop('checked')) {
                submitBtn.prop('disabled', false)
            } else {
                submitBtn.prop('disabled', true)
            }
        }
        $('#agree').prop('checked', false);
    </script>
@endsection

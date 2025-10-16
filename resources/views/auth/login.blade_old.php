@extends('auth.layouts.auth')
@section('title', 'Login')

@section('auth')
    <form action="{{ route('user.auth.loginUser') }}" method="POST" class="flex items-center justify-center h-full w-full">
        @csrf
        <div class="od-search-fields flex flex-col min-w-96 bg-white !p-10 rounded-md shadow-sm drop-shadow-md ">
            <div class="od-search-option-label">@lang('site.email_or_phone')</div>
            <div class="od-search-option-input">
                <input type="text"
                    class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('mail_phone') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]"
                    value="{{ old('mail_phone') }}" name="mail_phone" placeholder="@lang('site.email_or_phone') @lang('site.type')">
            </div>
            @error('mail_phone')
                <span class="text-red-600 inline-block !mt-1" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <div class="!mt-2">
                <button type="submit"
                    class="bg-secondary-color text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none hover:drop-shadow-lg shadow-slate-400 duration-100 group">
                    @lang('site.continue')
                    <i class="fa fa-arrow-right !ms-0 group-hover:ms-1 duration-100" aria-hidden="true"></i>
                </button>
            </div>

            <!--<div class="!mt-10">-->
            <!--    <a href="{{ route('frontend.googleLogin') }}" target="_blank" rel="noopener noreferrer"-->
            <!--        class="!py-2 !px-3 border border-slate-300 block text-center w-full hover:text-slate-700 rounded-sm !no-underline">-->
            <!--        <img class="inline-block w-4 !mr-2" src="{{ asset('assets/frontend/res/images/icons/google.png') }}">-->
            <!--        @lang('site.login_google')-->
            <!--    </a>-->
            <!--</div>-->
        </div>
    </form>
@endsection

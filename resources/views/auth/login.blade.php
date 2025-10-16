@extends('auth.layouts.auth')
@section('title', 'Login')

@section('auth')
<form action="{{ route('user.auth.loginUser') }}" method="POST" class="flex items-center justify-center h-full w-full" novalidate>
    @csrf

    {{-- pass through optional redirect if set in session (set by controller) --}}
    @if(session()->has('redirect'))
        <input type="hidden" name="redirect" value="{{ session('redirect') }}">
    @endif

    <div class="od-search-fields flex flex-col min-w-96 bg-white !p-10 rounded-md shadow-sm drop-shadow-md">

        {{-- Page-level flash / generic errors --}}
        @if ($errors->has('email_or_phone'))
            <div class="mb-3 text-red-600 text-sm">
                {{ $errors->first('email_or_phone') }}
            </div>
        @endif
        @if (session('status'))
            <div class="mb-3 text-green-700 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <label for="mail_phone" class="od-search-option-label mb-1">
            @lang('site.email_or_phone')
        </label>

        <div class="od-search-option-input">
            <input
                id="mail_phone"
                name="mail_phone"
                type="text"
                value="{{ old('mail_phone') }}"
                placeholder="@lang('site.email_or_phone') @lang('site.type')"
                autocomplete="username"
                inputmode="email"
                class="od-biodata-search-control outline-none h-full w-full !px-3 border-[1px] rounded-[10px]
                       {{ $errors->has('mail_phone') ? 'border-red-500' : 'border-[#d5d5d5]' }}"
                autofocus
            >
        </div>

        @error('mail_phone')
            <span class="text-red-600 inline-block mt-1 text-sm" role="alert">
                {{ $message }}
            </span>
        @enderror

        {{-- Sometimes the controller returns a generic 'mail_phone' style error under a different key --}}
        @error('email')   <span class="text-red-600 inline-block mt-1 text-sm">{{ $message }}</span> @enderror
        @error('phone')   <span class="text-red-600 inline-block mt-1 text-sm">{{ $message }}</span> @enderror

        <div class="mt-3">
            <button type="submit"
                class="bg-secondary-color text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none hover:drop-shadow-lg shadow-slate-400 duration-100 group w-full">
                @lang('site.continue')
                <i class="fa fa-arrow-right !ms-0 group-hover:ms-1 duration-100" aria-hidden="true"></i>
            </button>
        </div>

        {{-- If you later re-enable Google login, keep it below with clear separation --}}
        {{-- 
        <div class="mt-6">
            <a href="{{ route('frontend.googleLogin') }}" class="py-2 px-3 border border-slate-300 block text-center w-full hover:text-slate-700 rounded-sm no-underline">
                <img class="inline-block w-4 mr-2" src="{{ asset('assets/frontend/res/images/icons/google.png') }}">
                @lang('site.login_google')
            </a>
        </div>
        --}}
    </div>
</form>
@endsection

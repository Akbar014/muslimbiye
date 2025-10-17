@extends('auth.layouts.auth')
@section('title', __('site.reset_password'))

@section('auth')
<form action="{{ route('forgot.password.reset.submit') }}" method="POST" class="flex items-center justify-center h-full w-full">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="od-search-fields flex flex-col min-w-96 bg-white !p-10 rounded-md shadow-sm drop-shadow-md">

        {{-- Title --}}
        {{-- <h2 class="text-xl font-semibold text-slate-800 mb-4">@lang('site.reset_password')</h2> --}}

        {{-- Email --}}
        <label class="od-search-option-label mb-1" for="email">@lang('site.email_address')</label>
        <div class="relative od-search-option-input">
            <input
                id="email" type="email" name="email"
                value="{{ old('email', $email ?? '') }}"
                placeholder="@lang('site.enter_email')"
                class="od-biodata-search-control outline-none h-full w-full !px-3 pr-12
                       {{ $errors->has('email') ? 'border-red-500' : 'border-[#d5d5d5]' }}
                       border-[1px] rounded-[10px]" />
        </div>
        @error('email')
            <span class="text-red-600 inline-block mt-1" role="alert">{{ $message }}</span>
        @enderror

        {{-- New Password --}}
        <label class="od-search-option-label mt-4 mb-1" for="password">@lang('site.new_password')</label>
        <div class="relative od-search-option-input">
            <input
                id="password" type="password" name="password"
                placeholder="@lang('site.enter_new_password')" autocomplete="new-password"
                class="od-biodata-search-control outline-none h-full w-full !px-3 pr-16
                       {{ $errors->has('password') ? 'border-red-500' : 'border-[#d5d5d5]' }}
                       border-[1px] rounded-[10px]" />
            {{-- Show/Hide button centered --}}
            {{-- <button type="button"
                class="absolute inset-y-0 right-0 flex items-center gap-1 px-3 text-slate-500 hover:text-slate-700 text-sm select-none"
                onclick="const p=document.getElementById('password'); 
                         p.type=p.type==='password'?'text':'password'; 
                         this.querySelector('span').textContent=(p.type==='password'?'@lang('site.show')':'@lang('site.hide)')">
                <i class="fa fa-eye"></i>
                <span>@lang('site.show')</span>
            </button> --}}
        </div>
        @error('password')
            <span class="text-red-600 inline-block mt-1" role="alert">{{ $message }}</span>
        @enderror

        {{-- Confirm Password --}}
        <label class="od-search-option-label mt-5 mb-1" for="password_confirmation">@lang('site.confirm_password')</label>
        <div class="relative od-search-option-input mb-3">
            <input
                id="password_confirmation" type="password" name="password_confirmation"
                placeholder="@lang('site.confirm_password_placeholder')" autocomplete="new-password"
                class="od-biodata-search-control outline-none h-full w-full !px-3 pr-12
                       {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-[#d5d5d5]' }}
                       border-[1px] rounded-[10px]" />
        </div>
        @error('password_confirmation')
            <span class="text-red-600 inline-block mt-1" role="alert">{{ $message }}</span>
        @enderror

        {{-- Actions --}}
        <div class="mt-5 flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4">
            <button type="submit"
                class="bg-secondary-color text-white !py-2 !px-3 rounded-sm cursor-pointer
                       drop-shadow-none hover:drop-shadow-lg shadow-slate-400 duration-100
                       inline-flex items-center justify-center gap-2">
                @lang('site.reset_password')
                <i class="fa fa-check" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</form>
@endsection

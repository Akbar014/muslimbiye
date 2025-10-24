@extends('auth.layouts.auth')
@section('title', __('site.verify_otp'))

@section('auth')
<form action="{{ route('forgot.password.reset.submit') }}" method="POST" class="flex items-center justify-center h-full w-full">
    @csrf
    {{-- এই ধাপে কেবল OTP verify হবে --}}
    <input type="hidden" name="verify_only" value="1">
    <input type="hidden" name="email" value="{{ $email }}">   {{-- এখানে +88phone থাকবে --}}
    <input type="hidden" name="token" value="{{ $token }}">   {{-- URL-এ থাকা OTP --}}

    <div class="od-search-fields flex flex-col min-w-96 bg-white !p-10 rounded-md shadow-sm drop-shadow-md">
        <div class="text-lg font-semibold mb-2">@lang('site.verify_otp')</div>
        <p class="text-sm text-gray-500 mb-4">
            @lang('site.otp_sent_to') <span class="font-medium">{{ $email }}</span>
        </p>

        <label class="od-search-option-label mb-1" for="otp">@lang('site.enter_otp')</label>
        <div class="od-search-option-input">
            <input
                id="otp" type="text" name="otp"
                value=""
                placeholder="@lang('site.six_digit_code')"
                class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('otp') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]" />
        </div>
        @error('otp')
            <span class="text-red-600 inline-block mt-1" role="alert">{{ $message }}</span>
        @enderror

        @if(session('success')) <div class="text-green-600 text-sm mt-2">{{ session('success') }}</div> @endif
        @if(session('error'))   <div class="text-red-600 text-sm mt-2">{{ session('error') }}</div> @endif

        <div class="mt-4">
            <button type="submit"
                class="bg-secondary-color text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none hover:drop-shadow-lg shadow-slate-400 duration-100 inline-flex items-center gap-2">
                @lang('site.verify_otp')
                <i class="fa fa-check" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</form>
@endsection

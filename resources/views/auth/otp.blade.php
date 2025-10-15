@extends('auth.layouts.auth')
@section('title', 'Get OTP')

@section('auth')
    <form action="{{ route('user.auth.otp') }}" method="POST" class="flex items-center justify-center h-full w-full">
        @csrf
        @if (isset($email))
            <input type="hidden" value="{{ $email }}" name="email" />
        @endif
        @if (isset($phone))
            <input type="hidden" value="{{ $phone }}" name="phone" />
        @endif
        <div class="od-search-fields flex flex-col min-w-96 bg-white !p-10 rounded-md shadow-sm drop-shadow-md ">
            <div class="od-search-option-label">@lang('site.type_otp')</div>
            <div class="od-search-option-input">
                <input type="number"
                    class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('otp') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]"
                    value="{{ old('otp') }}" name="otp" placeholder="@lang('site.type_otp')">
            </div>
            @error('otp')
                <span class="text-red-600 inline-block !mt-1" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <span class="text-sm">@lang('site.check_otp')</span>
            <div class="!mt-2">
                <button type="submit"
                    class="bg-secondary-color text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none hover:drop-shadow-lg shadow-slate-400 duration-100 group">
                    @lang('site.continue')
                    <i class="fa fa-arrow-right !ms-0 group-hover:ms-1 duration-100" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

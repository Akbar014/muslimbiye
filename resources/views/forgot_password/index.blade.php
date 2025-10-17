@extends('auth.layouts.auth')
@section('title', 'Forgot Password')

@section('auth')
    <form action="{{ route('forgot.password.submit') }}" method="POST" class="flex items-center justify-center h-full w-full">
        @csrf
        <div class="od-search-fields flex flex-col min-w-96 bg-white !p-10 rounded-md shadow-sm drop-shadow-md ">
            <div class="od-search-option-label"> @lang('site.email_address')</div>
            <div class="od-search-option-input">
                <input type="email"
                    class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('email') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]"
                    value="{{ old('email') }}" name="email" placeholder="@lang('site.your_email_address')">
            </div>
            @error('email')
                <span class="text-red-600 inline-block !mt-1" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <div class="!mt-2">
                <button type="submit"
                    class="bg-secondary-color text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none hover:drop-shadow-lg shadow-slate-400 duration-100 group">
                    @lang('site.send_reset_link')
                    <i class="fa fa-arrow-right !ms-0 group-hover:ms-1 duration-100" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form>
@endsection
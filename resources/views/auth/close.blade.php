@extends('frontend.layouts.master')
@section('title', 'Login')

@section('content')
    <div class="search_section w-96 !my-10 !p-5 !mx-auto raleway">
        <div class="customGrid gap-5 items-center">
          <div class="col-span-12">
            <div class="text-2xl raleway !py-3 font-semibold text-slate-700 !mb-3 text-center">{{ __('Login Successful') }}</div>
          </div>
            <div class="col-span-12 offset-md-4">
                <button type="button" onclick="window.open('', '_self', ''); window.close();" class="bg-secondary-color block w-full text-white !py-3 rounded font-bold">
                    {{ __('Close Window') }}
                </button>
            </div>
        </div>
    </div>
@endsection

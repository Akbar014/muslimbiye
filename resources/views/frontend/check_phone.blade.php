@extends('frontend.layouts.master')
@section('title', 'Add Your Phone Number to Continue.')
@section('content')
    <div class="customContainer my-8">
        <h3 class="text-center text-2xl font-bold raleway capitalize">Please add your phone number.</h3>
        <form action="{{route('frontend.addPhone')}}" method="POST" class="search_section w-96 my-10 p-5 mx-auto raleway">
          @csrf
            <div class="customGrid mb-3">
                <div class="col-span-12">
                    <label for="phone" class="col-span-12 mt-8">{{ __('Phone Number') }}</label>
                    <input id="phone" type="number"
                        class="item_filter w-full @error('phone') border-red-600-important text-red-600 @enderror"
                        name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number"
                        autofocus>
                    @error('phone')
                        <span class="text-red-600" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-span-12 mt-4">
                    <button type="submit" class="bg-secondary-color block w-full text-white py-3 rounded font-bold">
                        {{ __('Add Phone Number') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

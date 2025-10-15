@extends('auth.layouts.auth')
@section('title', 'New Registration')

@section('auth')
    <form action="{{ route('user.auth.registerUser') }}" method="POST" class="flex items-center justify-center h-full w-full">
        @csrf
        <input type="hidden" name="verified_by" value="{{ $user->verified_by }}">
        <div class="od-search-fields flex flex-col min-w-96 bg-white !p-10 rounded-md shadow-sm drop-shadow-md ">
            <div class="!mt-4">
                <div class="od-search-option-label">@lang('site.write_your_name')</div>
                <div class="od-search-option-input">
                    <input type="text"
                        class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('name') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]"
                        value="{{ old('name') }}" name="name" placeholder="@lang('site.write_your_name')">
                </div>
                @error('name')
                    <span class="text-red-600 inline-block !mt-1" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            @if ($user->verified_by == 'email')
                <input type="hidden" value="{{ $user->email }}" name="email" />
                <div class="!mt-4">
                    <div class="od-search-option-label">@lang('site.phone_number') <small>(@lang('site.include_88'))</small></div>
                    <div class="od-search-option-input">
                        <input type="text"
                            class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('phone') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]"
                            value="{{ old('phone') }}" name="phone" placeholder="@lang('site.phone_number')">
                    </div>
                    @error('phone')
                        <span class="text-red-600 inline-block !mt-1" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            @elseif($user->verified_by == 'phone')
                <input type="hidden" value="{{ $user->phone }}" name="phone" />
                <div class="!mt-4">
                    <div class="od-search-option-label">@lang('site.your_email_address')</div>
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
                </div>
            @endif
            <div class="!mt-4">
                <div class="od-search-option-label">@lang('site.type_password')</div>
                <div class="od-search-option-input">
                    <input type="password"
                        class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('password') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]"
                        value="{{ old('password') }}" name="password" placeholder="@lang('site.type_password')">
                </div>
                @error('password')
                    <span class="text-red-600 inline-block !mt-1" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="!mt-4">
                <div class="od-search-option-label">@lang('site.confirm_password')</div>
                <div class="od-search-option-input">
                    <input type="password"
                        class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]"
                        value="{{ old('password_confirmation') }}" name="password_confirmation"
                        placeholder="@lang('site.confirm_password')">
                </div>
                @error('password_confirmation')
                    <span class="text-red-600 inline-block !mt-1" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
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

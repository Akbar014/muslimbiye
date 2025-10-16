@extends('auth.layouts.auth')
@section('title', 'Type Your Password')

@section('auth')
    <form action="{{ route('user.auth.existingUserLogin') }}" method="POST"
        class="flex items-center justify-center h-full w-full">
        @csrf
        <input type="hidden" name="email" value="{{ $user->email }}">
        <input type="hidden" name="phone" value="{{ $user->phone }}">
        <div class="od-search-fields ! !flex-col !min-w-96 bg-white !p-10 rounded-md shadow-sm drop-shadow-md ">
            <h1 class="!text-secondary-color text-2xl !mb-5">@lang('site.welcome') {{ $user->name }}</h1>
            <div class="od-search-option-label">@lang('site.type_password')</div>
            {{-- <div class="od-search-option-input relative">
                <input type="password"
                    class="od-biodata-search-control outline-none h-full w-full !px-3 {{ $errors->has('password') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px]"
                    value="{{ old('password') }}" name="password" placeholder="@lang('site.type_password')">
                <!-- Eye Icon to Show/Hide Password -->
                <span onclick="togglePassword()" class="absolute inset-y-0 right-3 flex items-center cursor-pointer">
                    <i id="eyeIcon" class="fas fa-eye text-gray-500"></i>
                </span>
            </div>
          --}}
            <div class="od-search-option-input relative">
                <input type="password"
                    class="od-biodata-search-control outline-none !relative h-full w-full !px-3 {{ $errors->has('password') ? 'border-red-500' : 'border-[#d5d5d5]' }} border-[1px] rounded-[10px] pr-10"
                    value="{{ old('password') }}" name="password" placeholder="@lang('site.type_password')" id="passwordInput">

                <!-- Eye Icon to Show/Hide Password (Positioned Inside the Input) -->
                <span onclick="togglePassword()"
                    class="absolute inset-y-0 right-3 !-top-[5%] flex items-center cursor-pointer">
                    <i id="eyeIcon" class="fas fa-eye text-gray-500"></i>
                </span>
            </div>
            @error('password')
                <span class="text-red-600 inline-block !mt-1" role="alert">
                    {{ $message }}
                </span>
            @enderror
            {{-- <a href="#" class="text-sm text-secondary-color-alter !no-underline">@lang('site.forgot_password')</a> --}}

                        {{-- <a href="{{ route('forgot.password') }}"
               class="text-sm text-secondary-color font-medium hover:underline transition-all duration-150">
               @lang('site.forgot_password')
            </a> --}}

            <div class="!mt-2 flex items-center justify-between">
                <button type="submit"
                    class="bg-secondary-color-alter text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none !no-underline hover:drop-shadow-lg shadow-slate-400 duration-100 group">
                    @lang('site.continue')
                    <i class="fa fa-arrow-right !ms-0 group-hover:ms-1 duration-100" aria-hidden="true"></i>
                </button>

                <a style="color: #fff" href="{{ route('forgot.password') }}"
                class="bg-secondary-color text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none hover:drop-shadow-lg shadow-slate-400 duration-100 group !no-underline ms-4 inline-block">
                @lang('site.forgot_password')
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </a>
            </div>

        </div>
    </form>
@endsection
@section('js')
    @if (isset($err))
        @foreach ($err as $error)
            <script>
                toastr.error("{{ $error }}")
            </script>
        @endforeach
    @endif
@endsection
<!-- Link to Font Awesome CDN (for Eye Icon) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script>
    function togglePassword() {
        var passwordInput = document.getElementById("passwordInput");
        var eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash"); // Change to eye-slash icon when showing password
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye"); // Change back to eye icon when hiding password
        }
    }
</script>

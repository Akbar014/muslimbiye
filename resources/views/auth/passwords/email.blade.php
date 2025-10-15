@extends('frontend_new.layouts.master')

@section('content')
    <div class="od-content-main">
        <section id="od_password_reset">
            <div class="od-pass-reset-form-container">
                <div class="od-card">
                    <div class="od-card-body">
                        <h2 class="od__box_title od-text-align-center">Reset Password</h2>


                        <form action="" method="POST">
                            <input type="hidden" name="_token" id="_token"
                                value="5rYTVBqUdBLIeOVYpKdkS3QJ5YTz9OLMIZJtP3Gp">
                            <div class="od-form-group-container">
                                <div class="od-form-group-label od-pb-5">
                                    <div class="od-form-label">Email address</div>
                                </div>
                                <div class="od-form-group-input">
                                    <input type="text" name="email" class="od-form-control od-w-100"
                                        placeholder="Enter your valid email address">
                                </div>
                            </div>
                            <div class="od-form-submit-button od-text-align-center od-display-flex">
                                <button class="od-button submit-to-reset-password" type="submit">Send Password Reset
                                    Link</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="search_section w-96 my-10 p-5 mx-auto raleway">
        <div class="customGrid gap-5 items-center">
            <div class="col-span-12">
                <div class="text-2xl raleway py-3 font-semibold text-slate-700 mb-3 text-center">
                    @lang('site.reset_password')
                </div>
                <div>
                    @if (env('RESET_PASSWORD_FEATURE', true))
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="customGrid mb-3">
                                <label for="email" class="col-span-12 mt-8">@lang('site.email_address')</label>

                                <div class="col-span-12">
                                    <input id="email" type="email"
                                        class="item_filter w-full @error('email') border-red-600-important text-red-600 @enderror"
                                        name="email" placeholder="@lang('site.your_email_address')" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="text-red-600" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="customGrid mb-0">
                                <div class="col-span-12 offset-md-4">
                                    <button type="submit"
                                        class="bg-secondary-color block w-full text-white py-3 rounded font-bold">
                                        @lang('site.send_password_link')
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        @lang('site.password_reset')
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
@endsection

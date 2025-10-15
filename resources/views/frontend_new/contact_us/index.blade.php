@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">
        <section id="od_contact_us">
            @include('frontend_new.components.page_header', [
                'headline' => __('site.contact_us'),
            ])
            <div class="od-contact-us-form-content">
                <div class="od-contact-us-form-top od-text-align-center">
                    <p>
                        @lang('site.contact_query');
                    </p>
                    <p>
                        @lang('site.we_will_contact')
                    </p>
                </div>
                <div class="od-contact-us-form">
                    <div class="od-contact-us-form-container">
                        <div class="od-card">
                            <div class="od-card-body">
                                <form id="contactUSForm" method="post" action="{{route('frontend.contact_submission')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="od-form-group-container">
                                        <div class="od-form-group-label">
                                            <label>@lang('site.name')</label>
                                        </div>
                                        <div class="od-form-group-input">
                                            <input type="text" name="name" />
                                        </div>
                                    </div>
                                    <div class="od-form-group-container">
                                        <div class="od-form-group-label">
                                            <label>@lang('site.email')</label>
                                        </div>
                                        <div class="od-form-group-input">
                                            <input type="email" name="email" />
                                        </div>
                                    </div>
                                    <div class="od-form-group-container">
                                        <div class="od-form-group-label">
                                            <label>@lang('site.subject')</label>
                                        </div>
                                        <div class="od-form-group-input">
                                            <input type="text" name="subject" />
                                        </div>
                                    </div>
                                    <div class="od-form-group-container">
                                        <div class="od-form-group-label">
                                            <label>@lang('site.message')</label>
                                        </div>
                                        <div class="od-form-group-input">
                                            <textarea name="message"></textarea>
                                        </div>
                                    </div>

                                    <div class="od-form-submit-button od-text-align-right">
                                        <button class="od-button" type="submit">
                                            @lang('site.send')
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

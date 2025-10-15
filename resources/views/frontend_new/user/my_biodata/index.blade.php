@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">
        <div class="od-user-account-container">
            <div class="od-row">
                @include('frontend_new.user.components.sidebar')
                <div class="odd-content">
                    <div class="odd-content-inner each-bio-container">
                        <div class="odd-content-title">
                            <div class="od-row !px-5 !mb-5">
                                <div class="od-col-12 od-col-md-4 top-preview-bio-action ">
                                    <a  class="od-button !px-8 !py-3 !bg-[#ad277c] ">Preview Biodataaaa</a>
                                </div>
                                <div class="od-col-12 od-col-md-8">
                                    <div class="od-row top-preview-bio-action  padding-0 !mx-auto !text-right">
                                        <div class="od-col-12">
                                            <input type="hidden" name="_token" id="_token"
                                                value="5rYTVBqUdBLIeOVYpKdkS3QJ5YTz9OLMIZJtP3Gp">
                                            <a href="{{ route('user.edit_biodata.index') }}"
                                                class="od-button !bg-[#ad277c] !px-8 !py-3">Edit More</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @include('frontend_new.components.biodata_details', [
                            'biodata' => $biodata,
                            'self' => true,
                        ])
                        <div class="od-row preview-bio-action">
                            <div class="od-col-12">
                                <a href="{{ route('user.edit_biodata.index') }}" class="od-button !bg-[#ad277c]">Edit More</a>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection

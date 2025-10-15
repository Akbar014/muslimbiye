@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">

        <div class="od-biodatas-container">
            <div class="od-row !mt-10">
                <div class="od-col-12">
                    <div class="odbc-head">
                        <div class="odbc-title-group">
                            <!--<h1 class="text-4xl text-secondary-color">@lang('site.all_biodata')</h1>-->
                            <h1 class="text-4xl text-secondary-color">সার্চ রেজাল্ট</h1>
                            <!--<p class="result-found result-found__desktop">{{ $totalCount }} @lang('site.biodata_found')!</p>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="od-row">
                @forelse ($result as $biodata)
                    @include('frontend_new.layouts.components.biodata_card', ['biodata' => $biodata])
                @empty
                    <div class="od-col-12">
                        <div class="text-center">@lang('site.biodata_not_found')</div>
                    </div>
                @endforelse

            </div>

            <div class="od-row od-col-12">
                <div class="pagination !mx-3 !mb-20 text-center relative">
                    @if ($result->previousPageUrl() != null)
                        <div class="left_arrow" style="display: inline-block">
                            <a href="{{ route('frontend.search') }}{{ $result->previousPageUrl() }}"
                                class="hoverable-btn bg-secondary-color hover:bg-primary-color ease-in-out duration-200 !text-white rounded-1 !py-2 !px-4 raleway  font-[700] inline-block !my-5 !mx-auto !no-underline">
                                <img class="inline-block !mr-2 sm:ml-4"
                                    src="{{ asset('assets/frontend/res/images/icons/arrow_left_small.svg') }}" />
                                @lang('site.previous_page')
                            </a>
                        </div>
                    @endif
                    @if ($result->nextPageUrl() != null)
                        <div class="right_arrow" style="display: inline-block">
                            <a href="{{ route('frontend.search') }}{{ $result->nextPageUrl() }}"
                                class="hoverable-btn bg-secondary-color hover:bg-primary-color ease-in-out duration-200 !text-white rounded-1 !py-2 !px-4 raleway  font-[700] inline-block !my-5 !mx-auto !no-underline">@lang('site.next_page')
                                <img class="inline-block !ml-2 sm:ml-4"
                                    src="{{ asset('assets/frontend/res/images/icons/arrow_right_small.svg') }}" />
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

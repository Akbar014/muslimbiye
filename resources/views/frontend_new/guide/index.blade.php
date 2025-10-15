@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">
        <section id="od_faq_container">
            @include('frontend_new.components.page_header', ['headline' => __('site.guide')])
            <div class="od-faq-content-main">
                <div class="od-container">
                    <div class="od-faq-content">
                        <div class="od-faq-item-list-content ">

                            @foreach ($guides as $guide)
                                <div class="od-accordion ">
                                    <div class="od-group">
                                        <a class="od-accordion-link " href="#">
                                            @if (App::getLocale() == 'en')
                                                {{ $guide->question_en }}
                                            @else
                                                {{ $guide->question_bn }}
                                            @endif
                                        </a>
                                        <div class="od-body-part text-[1rem] !md:text-[0.8rem]">
                                            @if (App::getLocale() == 'en')
                                                {!! $guide->answer_en !!}
                                            @else
                                                {!! $guide->answer_bn !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

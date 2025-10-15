@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">
        <section id="od_faq_container">
            @include('frontend_new.components.page_header', ['headline' => __('site.faq')])
            <div class="od-faq-content-main">
                <div class="od-container">
                    <div class="od-faq-content">
                        <div class="od-faq-item-list-content">

                            @foreach ($faqs as $faq)
                                <div class="od-accordion">
                                    <div class="od-group">
                                        <a class="od-accordion-link " href="#">
                                            @if (App::getLocale() == 'en')
                                                {{ $faq->question_en }}
                                            @else
                                                {{ $faq->question_bn }}
                                            @endif

                                        </a>
                                        <div class="od-body-part text-[1rem] !md:text-[0.8rem]">
                                            @if (App::getLocale() == 'en')
                                                {!! $faq->answer_en !!}
                                            @else
                                                {!! $faq->answer_bn !!}
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

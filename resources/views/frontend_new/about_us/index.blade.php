@extends('frontend_new.layouts.master')
@section('title', $title)
@section('content')
    <div class="od-content-main page_content">
        <section id="od_page_container">
            @include('frontend_new.components.page_header', ["headline"=>__('site.about_us')])
            <div class="od-page-content-main">
                <div class="od-container">
                    <div class="BlogContainer px-5">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

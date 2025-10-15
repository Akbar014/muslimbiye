@extends('frontend_new.layouts.master')
@section('title', $title)
@section('content')
    <div class="od-content-main">
        <section class="dynamic_content">
            {!! $content !!}
        </section>
    </div>
@endsection

@section('css')
<style>
    .od-content-main {
        margin: 20px;
    }
</style>
@endsection

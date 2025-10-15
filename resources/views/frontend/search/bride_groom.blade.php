@extends('frontend.layouts.master')
@section('title')
@lang('site.search_result')
@endsection
@section('content')

    {{-- <header class="bg-primary-light-color mt-20">
        @include('frontend.components.search')
    </header> --}}

    <h2 class="text-4xl text-center raleway font-[700] mb-16 mt-8 text-slate-800">@lang('site.all') @lang('site.'.strtolower($slug))</h2>

    @include('frontend.search.components.search_results')


    @section('css')
        {{-- <style>
            .pagination {
                display: flex;
                justify-content: center;
            }

            .left {
                margin: auto;
            }

            .right {
                align-self: flex-end;
            }
        </style> --}}
    @endsection


@endsection

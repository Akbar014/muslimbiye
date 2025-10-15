@php
    $user = Auth::guard('user')->user();
@endphp
@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">
        <div class="od-user-account-container">
            <div class="od-row">
                @include('frontend_new.user.components.sidebar')
                @include('frontend_new.user.my_purchases.purchases')
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
    </script>
@endsection

@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">
        <div class="od-user-account-container">
            <div class="od-row">
                @include('frontend_new.user.components.sidebar')
                @include('frontend_new.user.settings.settings')
            </div>
        </div>
    </div>
@endsection

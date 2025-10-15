@extends('frontend_new.layouts.master')
@section('title', 'Delete Biodata')
@section('content')
    <div class="od-content-main">
        <div class="od-user-account-container">
            <div class="od-row">
                @include('frontend_new.user.components.sidebar')
                @include('frontend_new.user.settings.delete.delete')
            </div>
        </div>
    </div>
@endsection

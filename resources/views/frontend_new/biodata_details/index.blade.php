@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | Biodata No - '. $biodata->code)
@section('content')
    <div class="od-content-main">
        <div class="od-public-biodata-container">
            <div class="od-container">
                <div class="odd-content-inner each-bio-container">
                    @include('frontend_new.components.biodata_details', ['biodata' => $biodata])
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layouts.master')
@section('title', 'Family Details')
@section('content') @php
    $brotherNames = json_decode($biodata->brotherName) ?? [];
    $brotherEduQualifications = json_decode($biodata->brotherEduQualification) ?? [];
    $brotherOccupations = json_decode($biodata->brotherOccupation) ?? [];
    $brotherMarritalStatuses = json_decode($biodata->brotherMarritalStatus) ?? [];
    $sisterNames = json_decode($biodata->sisterName) ?? [];
    $sisterEduQualifications = json_decode($biodata->sisterEduQualification) ?? [];
    $sisterOccupations = json_decode($biodata->sisterOccupation) ?? [];
    $sisterMarritalStatuses = json_decode($biodata->sisterMarritalStatus) ?? [];
    $paternalUncleNames = json_decode($biodata->paternalUncleName) ?? [];
    $paternalUncleEduQualifications = json_decode($biodata->paternalUncleEduQualification) ?? [];
    $paternalUncleOccupations = json_decode($biodata->paternalUncleOccupation) ?? [];
    $paternalUncleMarritalStatuses = json_decode($biodata->paternalUncleMarritalStatus) ?? [];
    $maternalUncleNames = json_decode($biodata->maternalUncleName) ?? [];
    $maternalUncleEduQualifications = json_decode($biodata->maternalUncleEduQualification) ?? [];
    $maternalUncleOccupations = json_decode($biodata->maternalUncleOccupation) ?? [];
    $maternalUncleMarritalStatuses = json_decode($biodata->maternalUncleMarritalStatus) ?? [];
@endphp <div class="customContainer raleway"> @include('frontend.components.biodata_nav', ['active' => '2']) <h2
            class="text-center my-8 text-4xl font-bold">@lang('site.details_family')</h2>
        <form action="{{ route('frontend.personalInfoProcessThirdStep') }}" class="preventEnter" method="post">
            @csrf <div class="mb-3 font-semibold"> @lang('site.siblings_name_details')* </div>
            <div class="customGrid gap-4">
                <div class="col-span-12"> <label for="brotherNumber" class="font-medium">@lang('site.select_brothers')*</label> <select
                        name="brotherNumber" id="brotherNumber"
                        class="brotherCounter w-full item_filter item_filter_biodata placeholder-dark-color input_arrow"
                        required>
                        <option {{ $biodata->brotherNumber == '0' || old('brotherNumber') == '0' ? 'selected' : '' }}
                            value="0">@lang('site.none')</option>
                        <option {{ $biodata->brotherNumber == '1' || old('brotherNumber') == '1' ? 'selected' : '' }}
                            value="1">@lang('site.1') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '2' || old('brotherNumber') == '2' ? 'selected' : '' }}
                            value="2">@lang('site.2') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '3' || old('brotherNumber') == '3' ? 'selected' : '' }}
                            value="3">@lang('site.3') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '4' || old('brotherNumber') == '4' ? 'selected' : '' }}
                            value="4">@lang('site.4') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '5' || old('brotherNumber') == '5' ? 'selected' : '' }}
                            value="5">@lang('site.5') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '6' || old('brotherNumber') == '6' ? 'selected' : '' }}
                            value="6">@lang('site.6') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '7' || old('brotherNumber') == '7' ? 'selected' : '' }}
                            value="7">@lang('site.7') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '8' || old('brotherNumber') == '8' ? 'selected' : '' }}
                            value="8">@lang('site.8') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '9' || old('brotherNumber') == '9' ? 'selected' : '' }}
                            value="9">@lang('site.9') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '10' || old('brotherNumber') == '10' ? 'selected' : '' }}
                            value="10">@lang('site.1')@lang('site.0') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '11' || old('brotherNumber') == '11' ? 'selected' : '' }}
                            value="11">@lang('site.1')@lang('site.1') @lang('site.person')</option>
                        <option {{ $biodata->brotherNumber == '12' || old('brotherNumber') == '12' ? 'selected' : '' }}
                            value="12">@lang('site.1')@lang('site.2') @lang('site.person')</option>
                    </select> </div>
            </div>
            <div class="customGrid gap-4 mt-3" id="brotherContainer">
                @if (count($brotherNames) > 0)
                    @foreach ($brotherNames as $key => $brotherName)
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.brother_name_title')</label> <input
                                type="text" placeholder="@lang('site.brother_name')" name="brotherName[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $brotherName }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.expected_education') <span
                                    class="font-extrabold">*</span></label> <input type="text"
                                placeholder="@lang('site.expected_education')" name="brotherEduQualification[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $brotherEduQualifications[$key] }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.profession')<span
                                    class="font-extrabold">*</span></label> <input type="text"
                                placeholder="@lang('site.profession')" name="brotherOccupation[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $brotherOccupations[$key] }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.marital_status')<span
                                    class="font-extrabold">*</span></label> <select name="brotherMarritalStatus[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow" required>
                                <option value="">@lang('site.select_one')</option>
                                <option {{ $brotherMarritalStatuses[$key] == 'single' ? 'selected' : '' }} value="single">
                                    @lang('site.single')</option>
                                <option {{ $brotherMarritalStatuses[$key] == 'widowed' ? 'selected' : '' }}
                                    value="widowed">@lang('site.widowed')</option>
                                <option {{ $brotherMarritalStatuses[$key] == 'separated' ? 'selected' : '' }}
                                    value="separated">@lang('site.separated')</option>
                                <option {{ $brotherMarritalStatuses[$key] == 'divorced' ? 'selected' : '' }}
                                    value="divorced">@lang('site.divorced')</option>
                                <option {{ $brotherMarritalStatuses[$key] == 'married' ? 'selected' : '' }}
                                    value="married">@lang('site.married')</option>
                            </select> </div>
                    @endforeach
                @endif
            </div>
            <div class="customGrid gap-4">
                <div class="col-span-12"> <label for="sisterNumber" class="font-medium">@lang('site.select_sisters')</label> <select
                        name="sisterNumber" id="sisterNumber"
                        class="sisterCounter w-full item_filter item_filter_biodata placeholder-dark-color input_arrow"
                        required>
                        <option {{ $biodata->sisterNumber == '0' || old('sisterNumber') == '0' ? 'selected' : '' }}
                            value="0">@lang('site.none')</option>
                        <option {{ $biodata->sisterNumber == '1' || old('sisterNumber') == '1' ? 'selected' : '' }}
                            value="1"> @lang('site.1') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '2' || old('sisterNumber') == '2' ? 'selected' : '' }}
                            value="2"> @lang('site.2') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '3' || old('sisterNumber') == '3' ? 'selected' : '' }}
                            value="3"> @lang('site.3') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '4' || old('sisterNumber') == '4' ? 'selected' : '' }}
                            value="4"> @lang('site.4') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '5' || old('sisterNumber') == '5' ? 'selected' : '' }}
                            value="5"> @lang('site.5') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '6' || old('sisterNumber') == '6' ? 'selected' : '' }}
                            value="6"> @lang('site.6') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '7' || old('sisterNumber') == '7' ? 'selected' : '' }}
                            value="7"> @lang('site.7') @lang('site.person') </option>
                        <option {{ $biodata->sisterNumber == '8' || old('sisterNumber') == '8' ? 'selected' : '' }}
                            value="8"> @lang('site.8') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '9' || old('sisterNumber') == '9' ? 'selected' : '' }}
                            value="9"> @lang('site.9') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '10' || old('sisterNumber') == '10' ? 'selected' : '' }}
                            value="10">@lang('site.1')@lang('site.0') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '11' || old('sisterNumber') == '11' ? 'selected' : '' }}
                            value="11">@lang('site.1')@lang('site.1') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '12' || old('sisterNumber') == '12' ? 'selected' : '' }}
                            value="12">@lang('site.1')@lang('site.2') @lang('site.person')</option>
                        <option {{ $biodata->sisterNumber == '13' || old('sisterNumber') == '13' ? 'selected' : '' }}
                            value="13">@lang('site.1')@lang('site.3') @lang('site.person')</option>
                    </select> </div>
            </div>
            <div class="customGrid gap-4 mt-3" id="sisterContainer">
                @if (count($sisterNames) > 0) @php
                    $biscCounter = 0;
                    $idIteration = 200;
                @endphp @foreach ($sisterNames as $key => $sisterName)
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.sister_name_title')</label> <input
                                type="text" placeholder="@lang('site.sister_name')" name="sisterName[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $sisterName }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.expected_education') <span
                                    class="font-extrabold">*</span></label> <input type="text"
                                placeholder="@lang('site.expected_education')" name="sisterEduQualification[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $sisterEduQualifications[$key] }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.profession')<span
                                    class="font-extrabold">*</span></label> <input type="text"
                                placeholder="@lang('site.profession')" name="sisterOccupation[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $sisterOccupations[$key] }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.marital_status')<span
                                    class="font-extrabold">*</span></label>
                            <select name="sisterMarritalStatus[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow mb-3"
                                onchange="
                                    if(this.value=='married'){
                                        $('#brotherInLawStatusContainer_{{ $idIteration }}').removeClass('hidden')
                                        $('#brotherInLawStatusContainer_{{ $idIteration }} input').attr('required','')
                                    } else {
                                        $('#brotherInLawStatusContainer_{{ $idIteration }}').addClass('hidden');
                                        $('#brotherInLawStatusContainer_{{ $idIteration }} input').val('')
                                        $('#brotherInLawStatusContainer_{{ $idIteration }} input').removeAttr('required')
                                    }"
                                required>
                                <option value="">@lang('site.select_one')</option>


                                <option {{ $sisterMarritalStatuses[$key] == 'single' ? 'selected' : '' }} value="single">
                                    @lang('site.single')</option>
                                <option {{ $sisterMarritalStatuses[$key] == 'widowed' ? 'selected' : '' }}
                                    value="widowed">@lang('site.widowed')</option>
                                <option {{ $sisterMarritalStatuses[$key] == 'separated' ? 'selected' : '' }}
                                    value="separated">@lang('site.separated')</option>
                                <option {{ $sisterMarritalStatuses[$key] == 'divorced' ? 'selected' : '' }}
                                    value="divorced">@lang('site.divorced')</option>
                                <option {{ $sisterMarritalStatuses[$key] == 'married' ? 'selected' : '' }}
                                    value="married">@lang('site.married')</option>

                            </select>
                            <div id="brotherInLawStatusContainer_{{ $idIteration++ }}"
                                class="{{ $sisterMarritalStatuses[$key] == 'married' ? '' : 'hidden' }}"> <label
                                    for="" class="font-medium">@lang('site.write_about_brotherinlaw')<span
                                        class="font-extrabold">*</span></label> <input type="text"
                                    class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                    name="brotherInLawStatus[]"
                                    value="{{ json_decode($biodata->brotherInLawStatus)[$biscCounter++] ?? '' }}"
                                    placeholder="@lang('site.250_words')" maxlength="250"
                                    {{ $sisterMarritalStatuses[$key] == 'married' ? 'required' : '' }} /> </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="customGrid gap-4 mt-5">
                <div class="col-span-12"> <label class="font-bold" for="form3Example3c">@lang('site.family_status')</label> </div>
                <div class="mb-3 col-span-6"> <label class="" for="form3Example3c">@lang('site.financial_status')<span
                            class="font-extrabold">*</span></label> <select name="financialStatus"
                        value="{{ $biodata->financialStatus }}"
                        class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow" required>
                        <option value="">@lang('site.select_any')</option>
                        <option
                            {{ $biodata->financialStatus == 'upper_class' || old('financialStatus') == 'upper_class' ? 'selected' : '' }}
                            value="upper_class">@lang('site.upper_class')</option>
                        <option
                            {{ $biodata->financialStatus == 'upper_middleclass' || old('financialStatus') == 'upper_middleclass' ? 'selected' : '' }}
                            value="upper_middleclass">@lang('site.upper_middleclass')</option>
                        <option
                            {{ $biodata->financialStatus == 'middleclass' || old('financialStatus') == 'middleclass' ? 'selected' : '' }}
                            value="middleclass">@lang('site.middleclass')</option>
                        <option
                            {{ $biodata->financialStatus == 'lower_middleclass' || old('financialStatus') == 'lower_middleclass' ? 'selected' : '' }}
                            value="lower_middleclass">@lang('site.lower_middleclass')</option>
                        <option
                            {{ $biodata->financialStatus == 'lower_class' || old('financialStatus') == 'lower_class' ? 'selected' : '' }}
                            value="lower_class">@lang('site.lower_class')</option>
                        <option
                            {{ $biodata->financialStatus == 'poor' || old('financialStatus') == 'poor' ? 'selected' : '' }}
                            value="poor">@lang('site.poor')</option>
                    </select> @error('financialStatus')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-span-6"> <label class="" for="form3Example3c">@lang('site.social_status')<span
                            class="font-extrabold">*</span></label> <select name="socialStatus"
                        value="{{ $biodata->socialStatus }}"
                        class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow" required>
                        <option value="">@lang('site.select_any')</option>
                        <option
                            {{ $biodata->socialStatus == 'honored' || old('socialStatus') == 'honored' ? 'selected' : '' }}
                            value="honored">@lang('site.honored')</option>
                        <option
                            {{ $biodata->socialStatus == 'influential' || old('socialStatus') == 'influential' ? 'selected' : '' }}
                            value="influential">@lang('site.influential')</option>
                        <option
                            {{ $biodata->socialStatus == 'respected' || old('socialStatus') == 'respected' ? 'selected' : '' }}
                            value="respected">@lang('site.respected')</option>
                        <option
                            {{ $biodata->socialStatus == 'honored_influential' || old('socialStatus') == 'honored_influential' ? 'selected' : '' }}
                            value="honored_influential">@lang('site.honored_influential')</option>
                        <option
                            {{ $biodata->socialStatus == 'respected_influential' || old('socialStatus') == 'respected_influential' ? 'selected' : '' }}
                            value="respected_influential">@lang('site.respected_influential')</option>
                        <option
                            {{ $biodata->socialStatus == 'honored_respected' || old('socialStatus') == 'honored_respected' ? 'selected' : '' }}
                            value="honored_respected">@lang('site.honored_respected')</option>
                        <option
                            {{ $biodata->socialStatus == 'average' || old('socialStatus') == 'average' ? 'selected' : '' }}
                            value="average">@lang('site.average')</option>
                    </select> @error('socialStatus')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-span-12">
                    <p>@lang('site.uncles_details')</p>
                </div>
            </div>
            <div class="customGrid gap-4">
                <div class="col-span-12"> <label for="paternalUncleNumber"
                        class="font-medium">@lang('site.select_paternal_uncle')*</label> <select name="paternalUncleNumber"
                        id="paternalUncleNumber"
                        class="paternalUncleCounter w-full item_filter item_filter_biodata placeholder-dark-color input_arrow"
                        required>
                        <option
                            {{ $biodata->paternalUncleNumber == '0' || old('paternalUncleNumber') == '0' ? 'selected' : '' }}
                            value="0">@lang('site.none')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '1' || old('paternalUncleNumber') == '1' ? 'selected' : '' }}
                            value="1">@lang('site.1') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '2' || old('paternalUncleNumber') == '2' ? 'selected' : '' }}
                            value="2">@lang('site.2') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '3' || old('paternalUncleNumber') == '3' ? 'selected' : '' }}
                            value="3">@lang('site.3') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '4' || old('paternalUncleNumber') == '4' ? 'selected' : '' }}
                            value="4">@lang('site.4') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '5' || old('paternalUncleNumber') == '5' ? 'selected' : '' }}
                            value="5">@lang('site.5') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '6' || old('paternalUncleNumber') == '6' ? 'selected' : '' }}
                            value="6">@lang('site.6') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '7' || old('paternalUncleNumber') == '7' ? 'selected' : '' }}
                            value="7">@lang('site.7') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '8' || old('paternalUncleNumber') == '8' ? 'selected' : '' }}
                            value="8">@lang('site.8') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '9' || old('paternalUncleNumber') == '9' ? 'selected' : '' }}
                            value="9">@lang('site.9') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '10' || old('paternalUncleNumber') == '10' ? 'selected' : '' }}
                            value="10">@lang('site.1')@lang('site.0') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '11' || old('paternalUncleNumber') == '11' ? 'selected' : '' }}
                            value="11">@lang('site.1')@lang('site.1') @lang('site.person')</option>
                        <option
                            {{ $biodata->paternalUncleNumber == '12' || old('paternalUncleNumber') == '12' ? 'selected' : '' }}
                            value="12">@lang('site.1')@lang('site.2') @lang('site.person')</option>
                    </select> </div>
            </div>
            <div class="customGrid gap-4 mt-3" id="paternalUncleContainer">
                @if (count($paternalUncleNames) > 0)
                    @foreach ($paternalUncleNames as $key => $paternalUncleName)
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.uncle_paternal_name_title')</label>
                            <input type="text" placeholder="@lang('site.uncle_paternal_name')" name="paternalUncleName[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $paternalUncleName }}" required>
                        </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.educational_qualification') <span
                                    class="font-extrabold">*</span></label> <input type="text"
                                placeholder="@lang('site.educational_qualification')" name="paternalUncleEduQualification[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $paternalUncleEduQualifications[$key] }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.profession')<span
                                    class="font-extrabold">*</span></label> <input type="text"
                                placeholder="@lang('site.profession')" name="paternalUncleOccupation[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $paternalUncleOccupations[$key] }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.marital_status')<span
                                    class="font-extrabold">*</span></label> <select name="paternalUncleMarritalStatus[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow" required>
                                <option value="">@lang('site.select_one')</option>
                                <option {{ $paternalUncleMarritalStatuses[$key] == 'single' ? 'selected' : '' }}
                                    value="single">@lang('site.single')</option>
                                <option {{ $paternalUncleMarritalStatuses[$key] == 'widowed' ? 'selected' : '' }}
                                    value="widowed">@lang('site.widowed')</option>
                                <option {{ $paternalUncleMarritalStatuses[$key] == 'separated' ? 'selected' : '' }}
                                    value="separated">@lang('site.separated')</option>
                                <option {{ $paternalUncleMarritalStatuses[$key] == 'divorced' ? 'selected' : '' }}
                                    value="divorced">@lang('site.divorced')</option>
                                <option {{ $paternalUncleMarritalStatuses[$key] == 'married' ? 'selected' : '' }}
                                    value="married">@lang('site.married')</option>
                            </select> </div>
                    @endforeach
                @endif
            </div>
            <div class="customGrid gap-4">
                <div class="col-span-12"> <label for="maternalUncleNumber"
                        class="font-medium">@lang('site.select_maternal_uncle')*</label> <select name="maternalUncleNumber"
                        id="maternalUncleNumber"
                        class="maternalUncleCounter w-full item_filter item_filter_biodata placeholder-dark-color input_arrow">
                        <option
                            {{ $biodata->maternalUncleNumber == '0' || old('maternalUncleNumber') == '0' ? 'selected' : '' }}
                            value="0"> @lang('site.none')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '1' || old('maternalUncleNumber') == '1' ? 'selected' : '' }}
                            value="1"> @lang('site.1') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '2' || old('maternalUncleNumber') == '2' ? 'selected' : '' }}
                            value="2"> @lang('site.2') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '3' || old('maternalUncleNumber') == '3' ? 'selected' : '' }}
                            value="3"> @lang('site.3') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '4' || old('maternalUncleNumber') == '4' ? 'selected' : '' }}
                            value="4"> @lang('site.4') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '5' || old('maternalUncleNumber') == '5' ? 'selected' : '' }}
                            value="5"> @lang('site.5') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '6' || old('maternalUncleNumber') == '6' ? 'selected' : '' }}
                            value="6"> @lang('site.6') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '7' || old('maternalUncleNumber') == '7' ? 'selected' : '' }}
                            value="7"> @lang('site.7') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '8' || old('maternalUncleNumber') == '8' ? 'selected' : '' }}
                            value="8"> @lang('site.8') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '9' || old('maternalUncleNumber') == '9' ? 'selected' : '' }}
                            value="9"> @lang('site.9') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '10' || old('maternalUncleNumber') == '10' ? 'selected' : '' }}
                            value="10">@lang('site.1')@lang('site.0') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '11' || old('maternalUncleNumber') == '11' ? 'selected' : '' }}
                            value="11">@lang('site.1')@lang('site.1') @lang('site.person')</option>
                        <option
                            {{ $biodata->maternalUncleNumber == '12' || old('maternalUncleNumber') == '12' ? 'selected' : '' }}
                            value="12">@lang('site.1')@lang('site.2') @lang('site.person')</option>
                    </select> </div>
            </div>
            <div class="customGrid gap-4 mt-3" id="maternalUncleContainer">
                @if (count($maternalUncleNames) > 0)
                    @foreach ($maternalUncleNames as $key => $maternalUncleName)
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.uncle_maternal_name_title')</label>
                            <input type="text" placeholder="@lang('site.uncle_maternal_name')" name="maternalUncleName[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $maternalUncleName }}" required>
                        </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.educational_qualification') <span
                                    class="font-extrabold">*</span></label> <input type="text"
                                placeholder="@lang('site.educational_qualification')" name="maternalUncleEduQualification[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $maternalUncleEduQualifications[$key] }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.profession')<span
                                    class="font-extrabold">*</span></label> <input type="text"
                                placeholder="@lang('site.profession')" name="maternalUncleOccupation[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                value="{{ $maternalUncleOccupations[$key] }}" required> </div>
                        <div class="col-span-3"> <label for="" class="font-medium">@lang('site.marital_status')<span
                                    class="font-extrabold">*</span></label> <select name="maternalUncleMarritalStatus[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow" required>
                                <option value="">@lang('site.select_one')</option>
                                <option {{ $maternalUncleMarritalStatuses[$key] == 'single' ? 'selected' : '' }}
                                    value="single">@lang('site.single')</option>
                                <option {{ $maternalUncleMarritalStatuses[$key] == 'widowed' ? 'selected' : '' }}
                                    value="widowed">@lang('site.widowed')</option>
                                <option {{ $maternalUncleMarritalStatuses[$key] == 'separated' ? 'selected' : '' }}
                                    value="separated">@lang('site.separated')</option>
                                <option {{ $maternalUncleMarritalStatuses[$key] == 'divorced' ? 'selected' : '' }}
                                    value="divorced">@lang('site.divorced')</option>
                                <option {{ $maternalUncleMarritalStatuses[$key] == 'married' ? 'selected' : '' }}
                                    value="married">@lang('site.married')</option>
                            </select> </div>
                    @endforeach
                @endif
            </div>
            <div class="customGrid gap-4 mt-5">
                <div class="col-span-6"> <a href="{{ route('frontend.personalinfo') }}"
                        class="inline-block bg-secondary-color rounded text-white py-2 px-5 text-lg mb-4" type="submit">
                        <span class="flex font-bold"> <img
                                src="{{ asset('assets/frontend/res/images/icons/arrow_left_small.svg') }}"
                                alt="" class="w-4 mr-2"> @lang('site.back') </span> </a> </div>
                <div class="col-span-6"> <button
                        class="block ml-auto bg-secondary-color rounded text-white py-2 px-5 text-lg mb-4" type="submit">
                        <span class="flex  font-bold"> @lang('site.save_and_continue') <img
                                src="{{ asset('assets/frontend/res/images/icons/arrow_right_small.svg') }}"
                                alt="" class="w-4 ml-2"> </span> </button> </div>
            </div>

        </form>
    </div>

    <script>
        $(".brotherCounter ").on("change", function() {
            let brotherNumber = $("#brotherNumber").val() !== "" ? parseInt($("#brotherNumber").val()) : 0;
            let brotherContainer = $("#brotherContainer");
            let brotherCount = 0;
            let inputString = "";
            while (brotherNumber > brotherCount) {
                inputString += selectiveInputs(++brotherCount, "@lang('site.brothers')", "brother");
            }
            brotherContainer.html(inputString);
        });
        $(".sisterCounter ").on("change", function() {
            let sisterNumber = $("#sisterNumber").val() !== "" ? parseInt($("#sisterNumber").val()) : 0;
            let sisterContainer = $("#sisterContainer");
            let sisterCount = 0;
            let inputString = "";
            while (sisterNumber > sisterCount) {
                inputString += selectiveInputs(++sisterCount, "@lang('site.sisters')", "sister");
            }
            sisterContainer.html(inputString);
        });

        $(".paternalUncleCounter ").on("change", function() {
            let paternalUncleNumber = $("#paternalUncleNumber").val() !== "" ? parseInt($("#paternalUncleNumber")
                .val()) : 0;
            let paternalContainer = $("#paternalUncleContainer");
            let paternalUncleCount = 0;
            let inputString = "";
            while (paternalUncleNumber > paternalUncleCount) {
                inputString += selectiveInputs(++paternalUncleCount, "@lang('site.uncle_paternal')", "paternalUncle");
            }
            paternalContainer.html(inputString);
        });
        $(".maternalUncleCounter ").on("change", function() {
            let maternalUncleNumber = $("#maternalUncleNumber").val() !== "" ? parseInt($("#maternalUncleNumber")
                .val()) : 0;
            let maternalUncleContainer = $("#maternalUncleContainer");
            let maternalUncleCount = 0;
            let inputString = "";
            while (maternalUncleNumber > maternalUncleCount) {
                inputString += selectiveInputs(++maternalUncleCount, "@lang('site.uncle_maternal')", "maternalUncle");
            }
            maternalUncleContainer.html(inputString);
        });

        function selectiveInputs(i, name, tag) {
            return `
            <div class="col-span-3">
                <label for="" class="font-medium">${name} @lang('site._name_title')</label>
                <input type="text" placeholder="${name} @lang('site._name')" name="${tag}Name[]" class="w-full item_filter item_filter_biodata placeholder-dark-color" required>
            </div>
            <div class="col-span-3">
                <label for="" class="font-medium">@lang('site.educational_qualification')<span class="font-extrabold">*</span></label>
                <input type="text" placeholder="@lang('site.educational_qualification')" name="${tag}EduQualification[]" class="w-full item_filter item_filter_biodata placeholder-dark-color" required>
            </div>
            <div class="col-span-3">
                <label for="" class="font-medium">@lang('site.profession')<span class="font-extrabold">*</span></label>
                <input type="text" placeholder="@lang('site.profession')" name="${tag}Occupation[]" class="w-full item_filter item_filter_biodata placeholder-dark-color" required>
            </div>
            <div class="col-span-3">
                <label for="" class="font-medium">@lang('site.marital_status')<span class="font-extrabold">*</span></label>
                <select name="${tag}MarritalStatus[]" class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow mb-3" onchange="
                if(this.value=='married') { 
                    $('#brotherInLawStatusContainer_${i}').removeClass('hidden') 
                    $('#brotherInLawStatusContainer_${i} input').attr('required','')
                } else {  
                    $('#brotherInLawStatusContainer_${i}').addClass('hidden');  
                    $('#brotherInLawStatusContainer_${i} input').val('') 
                    $('#brotherInLawStatusContainer_${i} input').removeAttr('required')
                }" >
                    <option value="">@lang('site.select_one')</option>
                    <option value="single">@lang('site.single')</option>
                    <option value="widowed">@lang('site.widowed')</option>
                    <option value="separated">@lang('site.separated')</option>
                    <option value="divorced">@lang('site.divorced')</option>
                    <option value="married">${tag=='sister'?'@lang('site.f_married')':'@lang('site.married')'}</option>
                </select>
                ${tag=='sister'
                    ?`<div id="brotherInLawStatusContainer_${i}" class="hidden">
                            <label for="" class="font-medium">@lang('site.write_about_brotherinlaw')<span class="font-extrabold">*</span></label>
                            <input type="text" class="w-full item_filter item_filter_biodata placeholder-dark-color" name="brotherInLawStatus[]" placeholder="@lang('site.250_words')" maxlength="250" />
                        </div>`:''}
            </div>`;
        }
    </script>
@endsection

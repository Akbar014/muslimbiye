@php
    $want_district = json_decode($biodata->want_district??'[]');
    $want_complexion = json_decode($biodata->want_complexion??'[]');
    $want_maritualStatus = json_decode($biodata->want_maritualStatus??'[]');
    
    $want_district_old = old('want_district') ?? [];
    $want_complexion_old = old('want_complexion') ?? [];
    $want_maritualStatus_old = old('want_maritualStatus') ?? [];
@endphp

@extends('frontend.layouts.master')
@section('title', 'Requirement')
@section('content')
    <div class="customContainer raleway">
        @include('frontend.components.biodata_nav', ['active' => '4'])
        <h2 class="text-center my-8 text-4xl font-bold">@lang($biodata->bride_groom === 'Bride' ? 'site.expected_groom' : 'site.expected_bride')
        </h2>
        <form action="{{ route('frontend.personalInfoProcessFifthStep') }}" class="preventEnter" method="post">
            @csrf
            <div class="customGrid gap-4">
                <div class="col-span-4">
                    <div class="mb-3">
                        <label class="" for="form3Example1c">@lang('site.age_minimum_maximum')</label>
                        <input type="text" name="want_age" value="{{ $biodata->want_age ?? old('want_age') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.specify_age_range')" maxlength="255"/>
                        @error('want_age')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-4">
                    <div class="d-flex flex-customGrid gap-4 align-items-center mb-4">
                        <div class="mb-3">
                            <label class="" for="form3Example1c">@lang('site.height')</label>
                            <input type="text" placeholder="@lang('site.specify_height_range')" name="want_height"
                                value="{{ $biodata->want_height ?? old('want_height') }}"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color" />
                            @error('want_height')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-span-4">
                    <div class="d-flex flex-customGrid gap-4 align-items-center mb-4">
                        <div class="mb-3">
                            <label for="form3Example1c">@lang('site.weight')</label>
                            <input type="text" name="want_weight"
                                value="{{ $biodata->want_weight ?? old('want_weight') }}"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                placeholder="@lang('site.specify_weight_range')" min="30" max="130" />
                            @error('want_weight')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="customGrid gap-4">
                <div class="col-span-6">
                    <div class="d-flex flex-customGrid gap-4 align-items-center mb-4">
                        <div class="mb-3">
                            <label class="" for="form3Example1c">@lang('site.complexion_multiple')</label>
                            <select id="want_complexion_multiple" name="want_complexion[]" value="{{ $biodata->want_complexion }}"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color chosen-select complexion_multiple input_arrow"
                                data-placeholder="@lang('site.select_multiple')" multiple>
                                <option {{ in_array('bright_fair', $want_complexion_old) ? 'selected' : '' }}
                                    {{ in_array('bright_fair', $want_complexion) ? 'selected' : '' }} value="bright_fair">
                                    @lang('site.bright_fair')</option>
                                <option {{ in_array('fair', $want_complexion_old) ? 'selected' : '' }}
                                    {{ in_array('fair', $want_complexion) ? 'selected' : '' }} value="fair">
                                    @lang('site.fair')</option>
                                <option {{ in_array('light-mediam', $want_complexion_old) ? 'selected' : '' }}
                                    {{ in_array('light-mediam', $want_complexion) ? 'selected' : '' }}
                                    value="light-mediam">@lang('site.light-mediam')</option>
                                <option {{ in_array('mediam', $want_complexion_old) ? 'selected' : '' }}
                                    {{ in_array('mediam', $want_complexion) ? 'selected' : '' }} value="mediam">
                                    @lang('site.mediam')</option>
                                <option {{ in_array('light-dark', $want_complexion_old) ? 'selected' : '' }}
                                    {{ in_array('light-dark', $want_complexion) ? 'selected' : '' }} value="light-dark">
                                    @lang('site.light-dark')</option>
                                <option {{ in_array('dark', $want_complexion_old) ? 'selected' : '' }}
                                    {{ in_array('dark', $want_complexion) ? 'selected' : '' }} value="dark">
                                    @lang('site.dark')</option>

                            </select>
                            @error('want_complexion')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="col-span-6">
                    <div class="flex-customGrid gap-4 align-items-center mb-4">
                        <div class="mb-3">
                            <label class="" for="maritualStatus">@lang('site.marital_status_multiple')</label>
                            <select name="want_maritualStatus[]"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color chosen-select input_arrow"
                                data-placeholder="@lang('site.select_multiple')" id="maritualStatus" multiple>
                                <option
                                    {{ in_array('Single', $want_maritualStatus_old) ? 'selected' : '' }} {{ in_array('Single', $want_maritualStatus) ? 'selected' : '' }}
                                    value="Single">@lang($biodata->bride_groom == 'Bride' ? 'site.single' : 'site.f_single') </option>
                                <option
                                    {{ in_array('Widowed', $want_maritualStatus_old) ? 'selected' : '' }} {{ in_array('Widowed', $want_maritualStatus) ? 'selected' : '' }}
                                    value="Widowed">@lang($biodata->bride_groom == 'Bride' ? 'site.widowed' : 'site.f_widowed') </option>
                                @if ($biodata->bride_groom === 'Bride')
                                    <option
                                        {{ in_array('Separated', $want_maritualStatus_old) ? 'selected' : '' }} {{ in_array('Separated', $want_maritualStatus) ? 'selected' : '' }}
                                        value="Separated">@lang('site.separated') </option>
                                @endif
                                <option
                                    {{ in_array('Divorced', $want_maritualStatus_old) ? 'selected' : '' }} {{ in_array('Divorced', $want_maritualStatus) ? 'selected' : '' }} value="Divorced">
                                    @lang($biodata->bride_groom == 'Bride' ? 'site.divorced' : 'site.f_divorced') </option>
                                @if ($biodata->bride_groom != 'Groom')
                                    <option
                                        {{ in_array('Married', $want_maritualStatus_old) ? 'selected' : '' }} {{ in_array('Married', $want_maritualStatus) ? 'selected' : '' }}
                                        value="Married"> @lang('site.married') </option>
                                @endif
                                <option
                                    {{ in_array('Converted', $want_maritualStatus_old) ? 'selected' : '' }} {{ in_array('Converted', $want_maritualStatus) ? 'selected' : '' }} value="Converted">
                                    @lang($biodata->bride_groom == 'Bride' ? 'site.converted' : 'site.f_converted') </option>
                            </select>
                            @error('want_maritualStatus')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="customGrid gap-4">
                <div class="col-span-6">
                    <div class="mb-3">
                        <label class="" for="form3Example1c">@lang('site.educational_qualification')<span
                                class="font-extrabold">*</span></label>
                        <input type="text" name="want_education"
                            value="{{ $biodata->want_education ?? old('want_education') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.expected_education')" />
                        @error('want_education')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="mb-3">
                        <label class="block" for="form3Example3c">@lang('site.profession') <span
                                class="font-bold">*</span></label>
                        <input type="text" name="want_occupation"
                            value="{{ $biodata->want_occupation ?? old('want_occupation') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.expected_profession')" />
                        @error('want_occupation')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>



            <div class="customGrid gap-4">
                <div class="col-span-6">
                    <div class="d-flex flex-customGrid gap-4 align-items-center mb-4">
                        <div class="mb-3">
                            <label class="" for="form3Example1c">@lang('site.multiple_district')</label>
                            <select name="want_district[]" class="w-full item_filter item_filter_biodata placeholder-dark-color chosen-select"
                                data-placeholder="@lang('site.select_multiple')" id="want_district_multiple" required multiple>
                                <option {{ in_array('all', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('all', $want_district) ? 'selected' : '' }} value="all">@lang('site.all_bd')
                                </option>
                                <option {{ in_array('Bagerhat', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Bagerhat', $want_district) ? 'selected' : '' }} value="Bagerhat">
                                    @lang('site.bagerhat')</option>
                                <option {{ in_array('Bandarban', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Bandarban', $want_district) ? 'selected' : '' }} value="Bandarban">
                                    @lang('site.bandarban')</option>
                                <option {{ in_array('Barguna', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Barguna', $want_district) ? 'selected' : '' }} value="Barguna">
                                    @lang('site.barguna')</option>
                                <option {{ in_array('Barisal', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Barisal', $want_district) ? 'selected' : '' }} value="Barisal">
                                    @lang('site.barisal')</option>
                                <option {{ in_array('Bhola', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Bhola', $want_district) ? 'selected' : '' }} value="Bhola">
                                    @lang('site.bhola')</option>
                                <option {{ in_array('Bogra', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Bogra', $want_district) ? 'selected' : '' }} value="Bogra">
                                    @lang('site.bogra')</option>
                                <option {{ in_array('Brahmanbaria', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Brahmanbaria', $want_district) ? 'selected' : '' }} value="Brahmanbaria">
                                    @lang('site.brahmanbaria')</option>
                                <option {{ in_array('Chandpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Chandpur', $want_district) ? 'selected' : '' }} value="Chandpur">
                                    @lang('site.chandpur')</option>
                                <option {{ in_array('Chittagong', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Chittagong', $want_district) ? 'selected' : '' }} value="Chittagong">
                                    @lang('site.chittagong')</option>
                                <option {{ in_array('Chuadanga', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Chuadanga', $want_district) ? 'selected' : '' }} value="Chuadanga">
                                    @lang('site.chuadanga')</option>
                                <option {{ in_array('Comilla', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Comilla', $want_district) ? 'selected' : '' }} value="Comilla">
                                    @lang('site.comilla')</option>
                                <option {{ in_array('Cox', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Cox', $want_district) ? 'selected' : '' }} value="CoxBazar">
                                    @lang('site.coxbazar')</option>
                                <option {{ in_array('Dhaka', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Dhaka', $want_district) ? 'selected' : '' }} value="Dhaka">
                                    @lang('site.dhaka')</option>
                                <option {{ in_array('Dinajpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Dinajpur', $want_district) ? 'selected' : '' }} value="Dinajpur">
                                    @lang('site.dinajpur')</option>
                                <option {{ in_array('Faridpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Faridpur', $want_district) ? 'selected' : '' }} value="Faridpur">
                                    @lang('site.faridpur')</option>
                                <option {{ in_array('Feni', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Feni', $want_district) ? 'selected' : '' }} value="Feni">
                                    @lang('site.feni')</option>
                                <option {{ in_array('Gaibandha', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Gaibandha', $want_district) ? 'selected' : '' }} value="Gaibandha">
                                    @lang('site.gaibandha')</option>
                                <option {{ in_array('Gazipur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Gazipur', $want_district) ? 'selected' : '' }} value="Gazipur">
                                    @lang('site.gazipur')</option>
                                <option {{ in_array('Gopalganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Gopalganj', $want_district) ? 'selected' : '' }} value="Gopalganj">
                                    @lang('site.gopalganj')</option>
                                <option {{ in_array('Habiganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Habiganj', $want_district) ? 'selected' : '' }} value="Habiganj">
                                    @lang('site.habiganj')</option>
                                <option {{ in_array('Jaipurhat', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Jaipurhat', $want_district) ? 'selected' : '' }} value="Jaipurhat">
                                    @lang('site.jaipurhat')</option>
                                <option {{ in_array('Jamalpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Jamalpur', $want_district) ? 'selected' : '' }} value="Jamalpur">
                                    @lang('site.jamalpur')</option>
                                <option {{ in_array('Jessore', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Jessore', $want_district) ? 'selected' : '' }} value="Jessore">
                                    @lang('site.jessore')</option>
                                <option {{ in_array('Jhalokati', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Jhalokati', $want_district) ? 'selected' : '' }} value="Jhalokati">
                                    @lang('site.jhalokati')</option>
                                <option {{ in_array('Jhenaidah', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Jhenaidah', $want_district) ? 'selected' : '' }} value="Jhenaidah">
                                    @lang('site.jhenaidah')</option>
                                <option {{ in_array('Khagrachari', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Khagrachari', $want_district) ? 'selected' : '' }} value="Khagrachari">
                                    @lang('site.khagrachari')</option>
                                <option {{ in_array('Khulna', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Khulna', $want_district) ? 'selected' : '' }} value="Khulna">
                                    @lang('site.khulna')</option>
                                <option {{ in_array('Kishoreganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Kishoreganj', $want_district) ? 'selected' : '' }} value="Kishoreganj">
                                    @lang('site.kishoreganj')</option>
                                <option {{ in_array('Kurigram', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Kurigram', $want_district) ? 'selected' : '' }} value="Kurigram">
                                    @lang('site.kurigram')</option>
                                <option {{ in_array('Kushtia', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Kushtia', $want_district) ? 'selected' : '' }} value="Kushtia">
                                    @lang('site.kushtia')</option>
                                <option {{ in_array('Lakshmipur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Lakshmipur', $want_district) ? 'selected' : '' }} value="Lakshmipur">
                                    @lang('site.lakshmipur')</option>
                                <option {{ in_array('Lalmonirhat', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Lalmonirhat', $want_district) ? 'selected' : '' }} value="Lalmonirhat">
                                    @lang('site.lalmonirhat')</option>
                                <option {{ in_array('Madaripur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Madaripur', $want_district) ? 'selected' : '' }} value="Madaripur">
                                    @lang('site.madaripur')</option>
                                <option {{ in_array('Magura', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Magura', $want_district) ? 'selected' : '' }} value="Magura">
                                    @lang('site.magura')</option>
                                <option {{ in_array('Manikganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Manikganj', $want_district) ? 'selected' : '' }} value="Manikganj">
                                    @lang('site.manikganj')</option>
                                <option {{ in_array('Maulvibazar', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Maulvibazar', $want_district) ? 'selected' : '' }} value="Maulvibazar">
                                    @lang('site.maulvibazar')</option>
                                <option {{ in_array('Meherpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Meherpur', $want_district) ? 'selected' : '' }} value="Meherpur">
                                    @lang('site.meherpur')</option>
                                <option {{ in_array('Munshiganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Munshiganj', $want_district) ? 'selected' : '' }} value="Munshiganj">
                                    @lang('site.munshiganj')</option>
                                <option {{ in_array('Mymensingh', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Mymensingh', $want_district) ? 'selected' : '' }} value="Mymensingh">
                                    @lang('site.mymensingh')</option>
                                <option {{ in_array('Naogaon', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Naogaon', $want_district) ? 'selected' : '' }} value="Naogaon">
                                    @lang('site.naogaon')</option>
                                <option {{ in_array('Narail', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Narail', $want_district) ? 'selected' : '' }} value="Narail">
                                    @lang('site.narail')</option>
                                <option {{ in_array('Narayanganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Narayanganj', $want_district) ? 'selected' : '' }} value="Narayanganj">
                                    @lang('site.narayanganj')</option>
                                <option {{ in_array('Narsingdi', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Narsingdi', $want_district) ? 'selected' : '' }} value="Narsingdi">
                                    @lang('site.narsingdi')</option>
                                <option {{ in_array('Natore', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Natore', $want_district) ? 'selected' : '' }} value="Natore">
                                    @lang('site.natore')</option>
                                <option {{ in_array('Nawabganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Nawabganj', $want_district) ? 'selected' : '' }} value="Nawabganj">
                                    @lang('site.nawabganj')</option>
                                <option {{ in_array('Netrokona', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Netrokona', $want_district) ? 'selected' : '' }} value="Netrokona">
                                    @lang('site.netrokona')</option>
                                <option {{ in_array('Nilphamari', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Nilphamari', $want_district) ? 'selected' : '' }} value="Nilphamari">
                                    @lang('site.nilphamari')</option>
                                <option {{ in_array('Noakhali', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Noakhali', $want_district) ? 'selected' : '' }} value="Noakhali">
                                    @lang('site.noakhali')</option>
                                <option {{ in_array('Pabna', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Pabna', $want_district) ? 'selected' : '' }} value="Pabna">
                                    @lang('site.pabna')</option>
                                <option {{ in_array('Panchagarh', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Panchagarh', $want_district) ? 'selected' : '' }} value="Panchagarh">
                                    @lang('site.panchagarh')</option>
                                <option {{ in_array('Patuakhali', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Patuakhali', $want_district) ? 'selected' : '' }} value="Patuakhali">
                                    @lang('site.patuakhali')</option>
                                <option {{ in_array('Pirojpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Pirojpur', $want_district) ? 'selected' : '' }} value="Pirojpur">
                                    @lang('site.pirojpur')</option>
                                <option {{ in_array('Rajbari', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Rajbari', $want_district) ? 'selected' : '' }} value="Rajbari">
                                    @lang('site.rajbari')</option>
                                <option {{ in_array('Rajshahi', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Rajshahi', $want_district) ? 'selected' : '' }} value="Rajshahi">
                                    @lang('site.rajshahi')</option>
                                <option {{ in_array('Rangamati', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Rangamati', $want_district) ? 'selected' : '' }} value="Rangamati">
                                    @lang('site.rangamati')</option>
                                <option {{ in_array('Rangpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Rangpur', $want_district) ? 'selected' : '' }} value="Rangpur">
                                    @lang('site.rangpur')</option>
                                <option {{ in_array('Satkhira', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Satkhira', $want_district) ? 'selected' : '' }} value="Satkhira">
                                    @lang('site.satkhira')</option>
                                <option {{ in_array('Shariatpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Shariatpur', $want_district) ? 'selected' : '' }} value="Shariatpur">
                                    @lang('site.shariatpur')</option>
                                <option {{ in_array('Sherpur', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Sherpur', $want_district) ? 'selected' : '' }} value="Sherpur">
                                    @lang('site.sherpur')</option>
                                <option {{ in_array('Sirajganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Sirajganj', $want_district) ? 'selected' : '' }} value="Sirajganj">
                                    @lang('site.sirajganj')</option>
                                <option {{ in_array('Sunamganj', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Sunamganj', $want_district) ? 'selected' : '' }} value="Sunamganj">
                                    @lang('site.sunamganj')</option>
                                <option {{ in_array('Sylhet', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Sylhet', $want_district) ? 'selected' : '' }} value="Sylhet">
                                    @lang('site.sylhet')</option>
                                <option {{ in_array('Tangail', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Tangail', $want_district) ? 'selected' : '' }} value="Tangail">
                                    @lang('site.tangail')</option>
                                <option {{ in_array('Thakurgaon', $want_district_old) ? 'selected' : '' }}
                                    {{ in_array('Thakurgaon', $want_district) ? 'selected' : '' }} value="Thakurgaon">
                                    @lang('site.thakurgaon')</option>
                            </select>
                            @error('want_district')
                                <div class="text-red-600" id="want_district_error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="col-span-6">
                    <div class="d-flex flex-customGrid gap-4 align-items-center mb-4">
                        <div class="mb-3">
                            <label class="" for="form3Example1c">@lang('site.current_address')<span
                                    class="font-extrabold">*</span></label>
                            <input type="text" name="want_location"
                                value="{{ $biodata->want_location ?? old('want_location') }}"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                placeholder="@lang('site.current_location')" />
                            @error('want_location')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-customGrid gap-4 align-items-center mb-4">
                <div class="mb-3">
                    <label class="" for="form3Example1c">@lang('site.special_qualities')</label>
                    <input type="text" name="want_special_qualities"
                        value="{{ $biodata->want_special_qualities ?? old('want_special_qualities') }}"
                        class="w-full item_filter item_filter_biodata placeholder-dark-color"
                        placeholder="@lang('site.within_100')" maxlength="1000" />
                    @error('want_special_qualities')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="customGrid gap-4 mt-5">
                <div class="col-span-6">
                    <a href="{{ route('frontend.brideGroomMoreDetails') }}"
                        class="inline-block bg-secondary-color rounded text-white py-2 px-5 text-lg mb-4" type="submit">
                        <span class="flex font-bold">
                            <img src="{{ asset('assets/frontend/res/images/icons/arrow_left_small.svg') }}"
                                alt="" class="w-4 mr-2">
                            @lang('site.back')
                        </span>
                    </a>
                </div>
                <div class="col-span-6">
                    <button class="block ml-auto bg-secondary-color rounded text-white py-2 px-5 text-lg mb-4"
                        type="submit">
                        <span class="flex  font-bold">
                            @lang('site.save_and_continue')
                            <img src="{{ asset('assets/frontend/res/images/icons/arrow_right_small.svg') }}"
                                alt="" class="w-4 ml-2">
                        </span>
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection

@section('js')
    <script>
        $("#want_district_multiple").chosen({
            no_results_text: "Oops, nothing found!",
            max_selected_options: 5
        })

        $("#want_complexion_multiple").chosen({
            no_results_text: "Oops, nothing found!"
        })
        $("#maritualStatus").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>
@endsection

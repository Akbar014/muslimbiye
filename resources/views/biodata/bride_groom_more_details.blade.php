@extends('frontend.layouts.master')
@section('title')
    The basic idea about the
    @if ($biodata->bride_groom === 'Bride')
        Bride
    @else
        Groom
    @endif
@endsection
@section('content')
    <div class="customContainer raleway">
        @include('frontend.components.biodata_nav', ['active' => '3'])

        <h2 class="text-center my-8 text-4xl font-bold">
            @lang($biodata && $biodata->bride_groom === 'Bride' ? 'site.details_bride' : 'site.details_groom')
        </h2>
        <form action="{{ route('frontend.personalInfoProcessForthStep') }}" method="post" class="preventEnter">
            @csrf
            <div class="customGrid gap-4">
                <div class="col-span-6">
                    <div class="mb-3">
                        <label class="block" for="form3Example3c">@lang('site.marriage_concept_brief')</label>
                        <input type="text" name="concept_about"
                            value="{{ $biodata->concept_about ?? old('concept_about') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.within_100_maximum')" maxlength="100" />
                        @error('concept_about')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="mb-3">
                        <label class="block" for="form3Example3c">

                            @lang($biodata->bride_groom === 'Bride' ? 'site.veil_bride' : 'site.veil_groom')


                        </label>
                        <input type="text" name="vail" value="{{ $biodata->vail ?? old('vail') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.within_150')" maxlength="150" required />
                        @error('vail')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @if ($biodata->bride_groom !== 'Bride')
                    <div class="col-span-6">
                        <div class="mb-3">
                            <label class="block" for="form3Example3c">@lang('site.wife_job_after_marriage') <span
                                    class="font-bold">*</span></label>
                            <input type="text" name="job_permission"
                                value="{{ $biodata->job_permission ?? old('job_permission') }}"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                placeholder="@lang('site.within_150')" maxlength="150" required />
                            @error('job_permission')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif

                @if ($biodata->bride_groom === 'Bride')
                    <div class="col-span-6">
                        <div class="mb-3">
                            <label class="block" for="form3Example3c">@lang('site.job_after_marriage')<span
                                    class="font-bold">*</span></label>
                            <input type="text" maxlength="150" name="job_join"
                                value="{{ $biodata->job_join ?? old('job_join') }}"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                placeholder="@lang('site.within_150')" required />
                            @error('job_join')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif

                @if ($biodata->bride_groom !== 'Bride')
                    <div class="col-span-6">
                        <div class="col-span-6">
                            <div class="mb-3">
                                <label class="block" for="form3Example3c">@lang('site.beard')<span
                                        class="font-bold">*</span></label>
                                &nbsp;
                                &nbsp;
                                <label class="flex items-center mr-3 mt-2  biodata-radio cursor-pointer">
                                    <input class="w-5 h-5 border-gray-300" type="radio" name="beards"
                                        {{ $biodata->beards == '1' || old('beards') == '1' ? 'checked' : '' }}
                                        id="inlineRadio1" value="1" required>
                                    <span class="ml-2 text-gray-900" for="inlineRadio1">@lang('site.yes')</span>
                                </label>
                                <label class="flex items-center mr-3 mt-2  biodata-radio cursor-pointer">
                                    <input class="w-5 h-5 border-gray-300" type="radio" name="beards"
                                        {{ $biodata->beards == '0' || old('beards') == '0' ? 'checked' : '' }}
                                        id="inlineRadio2" value="0">
                                    <span class="ml-2 text-gray-900" for="inlineRadio2">@lang('site.no')</span>
                                </label>
                                @error('beards')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-span-6">
                    <div class="col-span-6">
                        <div class="mb-3">
                            <label class="block" for="tv_watch">@lang('site.watch_tv_music') <span class="font-bold">*</span></label>
                            <input type="text" id="tv_watch" name="tv_watch"
                                value="{{ $biodata->tv_watch ?? old('tv_watch') }}"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color"
                                placeholder="@lang('site.within_150')" maxlength="150" required />
                            @error('tv_watch')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="mb-3">
                        <label class="block" for="form3Example3c">@lang('site.recite_quran_correctly')<span
                                class="font-black">*</span></label>
                        <input type="text" id="music_listen" name="music_listen"
                            value="{{ $biodata->music_listen ?? old('music_listen') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.within_150')" maxlength="150" required />
                        @error('music_listen')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="mb-3">
                        <label class="block" for="form3Example3c">@lang('site.physical_mental_issue')<span
                                class="font-black">*</span></label>
                        <input type="text" id="physical_disability" name="physical_disability"
                            value="{{ $biodata->physical_disability ?? old('physical_disability') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.within_150')" maxlength="150" required />
                        @error('physical_disability')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-6">
                    <div class="mb-3">
                        <label class="block" for="form3Example3c">@lang('site.perform_five_times_salah')<span
                                class="font-black">*</span></label>
                        <input type="text" id="salat" name="salat"
                            value="{{ $biodata->salat ?? old('salat') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.within_150')" maxlength="150" required />
                        @error('salat')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-6">
                    <div class="mb-3">
                        <label class="block" for="form3Example3c">@lang('site.religious_effort')<span
                                class="font-black">*</span></label>
                        <input type="text" name="dini_mehonot"
                            value="{{ $biodata->dini_mehonot ?? old('dini_mehonot') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.within_150')" required maxlength="150" />
                        @error('dini_mehonot')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="customGrid gap-4 mt-5">
                <div class="col-span-6">
                    <a href="{{ route('frontend.familyDetails') }}"
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

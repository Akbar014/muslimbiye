@extends('frontend.layouts.master')
@section('title', 'Fillup New Biodata')
@section('content')
    <div class="bg-primary-light-color">
        <div class="customContainer raleway">
            <h4 class="text-center mb-14 mt-24 text-4xl font-bold hindShiliguri">
                @lang('site.biodata')
                <span class="text-primary-color">@lang('site.bio_for_muslims')</span>
            </h4>
            <form action="{{ route('frontend.personalInfoProcessFirstStep') }}" method="post">
                @csrf
            <div class="customGrid gap-4">
                <div class="col-span-8">

                        <div class="text-justify">
                            <div class="font-bold text-2xl mb-4">@lang('site.read_before_fill_up')</div>
                            <ul class="text-slate-600 biodata_rules ml-4 text-base leading-8"> 
                                <li>@lang('site.must_give_names')</li>
                                <li>@lang('site.must_fill_stars')</li>
                                <li>@lang('site.must_inform_guardian')</li>
                                <li>@lang('site.must_give_numbers')</li>
                            </ul>
                            <div class="font-bold italic text-lg">@lang('site.info_verification')</div>
                        </div>

                </div>
                <div class="col-span-4">
                    <img src="{{ asset('assets/frontend/res/images/icons/follow_1.svg') }}" alt="Follow"
                        class="w-80 md:w-full mx-auto" />
                </div>
                <div class="col-span-12 pt-8">
                    <div class="customGrid gap-4">
                        <div class="col-span-3">
                            <div class="ml-4">
                                <label class="block mb-4" for="form3Example3c">@lang('site.bio_for_bride_groom')<span
                                        class="text-red-600">*</span></label>
                                <label for="inlineRadio1" class="flex items-center biodata-radio cursor-pointer">
                                    @if ($biodata != null)
                                        <input class="w-5 h-5 border-gray-300"
                                            {{ $biodata->bride_groom == 'Bride' ? 'checked' : '' }} type="radio"
                                            name="bride_groom" id="inlineRadio1" value="Bride">
                                    @else
                                        <input class="w-5 h-5 border-gray-300" type="radio" name="bride_groom"
                                            id="inlineRadio1"  {{ old('bride_groom') == 'Bride' ? 'checked' : '' }} value="Bride">
                                    @endif

                                    <span class="ml-2 text-gray-900">@lang('site.bride')</span>
                                </label>
                                <span class="inline-block mx-2">
                                    বা
                                </span>
                                <label for="inlineRadio2" class="flex items-center  biodata-radio cursor-pointer">
                                    @if ($biodata != null)
                                        <input class="w-5 h-5 border-gray-300" type="radio" name="bride_groom"
                                            {{ $biodata->bride_groom == 'Groom' ? 'checked' : '' }} id="inlineRadio2"
                                            value="Groom">
                                    @else
                                        <input class="w-5 h-5 border-gray-300" type="radio" name="bride_groom"
                                            id="inlineRadio2" {{ old('bride_groom') == 'Groom' ? 'checked' : '' }} value="Groom">
                                    @endif

                                    <span class="ml-2 text-gray-900">@lang('site.groom')</span>
                                </label>
                                @error('bride_groom')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-3">
                            {{-- <div class="ml-4">
                                <label class="block mb-4" for="form3Example3c">@lang('site.select_language')<span
                                        class="text-red-600">*</span></label>
                                <label for="inlineRadio3" class="flex items-center biodata-radio bg-gray-100">
                                    <input class="w-5 h-5 border-gray-300"
                                        {{App::getLocale() == 'bn' ? 'checked':''}} type="radio"
                                         id="inlineRadio3" value="Bangla" disabled>

                                    <span class="ml-2 text-gray-900">বাংলা</span>
                                </label>
                                <span class="inline-block mx-2">
                                    বা
                                </span>
                                <label for="inlineRadio4" class="flex items-center  biodata-radio  bg-gray-100">
                                    <input class="w-5 h-5 border-gray-300" type="radio"  {{App::getLocale() == 'en' ? 'checked':''}} id="inlineRadio4"
                                        value="English" disabled>
                                    <span class="ml-2 text-gray-900">English</span>
                                </label>
                                @error('language')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <input type="hidden" name="language" value="{{App::getLocale() == 'bn' ? 'Bangla':'English'}}">
                        </div>


                        <div class="col-span-6">
                            <label class="block mb-4" for="maritualStatus">@lang('site.bio_for_whom')<span
                                    class="text-red-600">*</span></label>
                            <select name="person_name" class="w-full item_filter item_filter_biodata text-dark-color input_arrow"
                                id="maritualStatus">

                                @if ($biodata != null)
                                    <option {{ $biodata->person_name == 'Self' ? 'selected' : '' }} value="Self">@lang('site.self')</option>
                                    <option {{ $biodata->person_name == 'Brother' ? 'selected' : '' }} value="Brother">@lang('site.brother')</option>
                                    <option {{ $biodata->person_name == 'Sister' ? 'selected' : '' }} value="Sister">@lang('site.sister')</option>
                                    <option {{ $biodata->person_name == 'Father' ? 'selected' : '' }} value="Father">@lang('site.father')</option>
                                    <option {{ $biodata->person_name == 'Mother' ? 'selected' : '' }} value="Mother">@lang('site.mother')</option>
                                    <option {{ $biodata->person_name == 'Uncle' ? 'selected' : '' }} value="Uncle">@lang('site.uncle')</option>
                                    <option {{ $biodata->person_name == 'Aunt' ? 'selected' : '' }} value="Aunt">@lang('site.aunt')</option>
                                    <option {{ $biodata->person_name == 'Other' ? 'selected' : '' }} value="Other">@lang('site.other')</option>
                                @else
                                    <option {{old('person_name') == 'Self' ? 'selected' : '' }} value="Self">@lang('site.self')</option>
                                    <option {{old('person_name') == 'Brother' ? 'selected' : '' }} value="Brother">@lang('site.brother')</option>
                                    <option {{old('person_name') == 'Sister' ? 'selected' : '' }} value="Sister">@lang('site.sister')</option>
                                    <option {{old('person_name') == 'Father' ? 'selected' : '' }} value="Father">@lang('site.father')</option>
                                    <option {{old('person_name') == 'Mother' ? 'selected' : '' }} value="Mother">@lang('site.mother')</option>
                                    <option {{old('person_name') == 'Uncle' ? 'selected' : '' }} value="Uncle">@lang('site.uncle')</option>
                                    <option {{old('person_name') == 'Aunt' ? 'selected' : '' }} value="Aunt">@lang('site.aunt')</option>
                                    <option {{old('person_name') == 'Other' ? 'selected' : '' }} value="Other">@lang('site.other')</option>
                                @endif

                            </select>
                            @error('person_name')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-12 py-4 text-center">
                            <button class="inline-block bg-secondary-color rounded text-white py-2 px-10 text-lg"
                                type="submit">@lang('site.next_page')</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
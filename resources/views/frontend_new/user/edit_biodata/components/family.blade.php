div<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.family_information')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1' ? route('admin.biodata.family') : route('user.edit_biodata.family');
        @endphp
        <form method="POST" action="{{ $routeUrl }}" class="od-row od-justify-content-spaceBetween">
            @csrf
            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.father_name_only') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="fathers_name" id="fathers_name" class="od-field-type__textbox"
                        placeholder="@lang('site.father_name')" value="{{ isset($family) ? $family->fathers_name : '' }}" required />
                </div>

                {{-- <div class="od-field-desc od-pt-10">
                    <p>@lang('site.authorities only')</p>
                </div> --}}
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.father_status')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" id="father_status" name="father_status" required>
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($family) && $family->father_status == 'alive' ? 'selected' : '' }}
                            value="alive">@lang('site.yes')</option>
                        <option {{ isset($family) && $family->father_status == 'dead' ? 'selected' : '' }}
                            value="dead">@lang('site.no')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field od-multitag-field-container">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.father_occupation')
                        <small>(@lang('site.father_occupation_before_death'))</small><span class="od-required-label">*</span></label>
                </div>
                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="father_profession" id="father_profession" class="od-field-type__textbox"
                        placeholder="" value="{{ isset($family) ? $family->father_profession : '' }}" required />
                </div>
                <div class="od-field-desc od-pt-10">
                    <p>
                        {!! __('site.father_occupation_description') !!}
                    </p>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.mother_name_only') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="mothers_name" id="mothers_name"
                        value="{{ isset($family) ? $family->mothers_name : '' }}" class="od-field-type__textbox"
                        placeholder="@lang('site.mother_name')" required />
                </div>

                {{-- <div class="od-field-desc od-pt-10">
                    <p>@lang('site.authorities only')</p>
                </div> --}}
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="20">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.mother_status')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" id="mother_status" name="mother_status" required>
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($family) && $family->mother_status == 'alive' ? 'selected' : '' }}
                            value="alive">@lang('site.yes')</option>
                        <option {{ isset($family) && $family->mother_status == 'dead' ? 'selected' : '' }}
                            value="dead">@lang('site.no')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.mother_occupation') <small>(@lang('site.mother_occupation_before_death'))</small>
                        <span class="od-required-label">*</span></label>
                </div>
                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="mother_profession" id="mother_profession" required
                        value="{{ isset($family) ? $family->mother_profession : '' }}" class="od-field-type__textbox"
                        placeholder="" />
                </div>
            </div>




            {{-- ভাই --}}
            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.how_many_brother')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" onchange="handleFamily('ভাইয়ের', 'brother', this.value)"
                        style="width: 100%" id="total_brother" name="total_brother" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($family) && $family->total_brother == '0' ? 'selected' : '' }} value="0">
                            @lang('site.no_brother')</option>
                        <option {{ isset($family) && $family->total_brother == '1' ? 'selected' : '' }} value="1">
                            {{ EnToBn('1') }}</option>
                        <option {{ isset($family) && $family->total_brother == '2' ? 'selected' : '' }} value="2">
                            {{ EnToBn('2') }}</option>
                        <option {{ isset($family) && $family->total_brother == '3' ? 'selected' : '' }} value="3">
                            {{ EnToBn('3') }}</option>
                        <option {{ isset($family) && $family->total_brother == '4' ? 'selected' : '' }} value="4">
                            {{ EnToBn('4') }}</option>
                        <option {{ isset($family) && $family->total_brother == '5' ? 'selected' : '' }} value="5">
                            {{ EnToBn('5') }}</option>
                        <option {{ isset($family) && $family->total_brother == '6' ? 'selected' : '' }} value="6">
                            {{ EnToBn('6') }}</option>
                        <option {{ isset($family) && $family->total_brother == '7' ? 'selected' : '' }} value="7">
                            {{ EnToBn('7') }}</option>
                        <option {{ isset($family) && $family->total_brother == '8' ? 'selected' : '' }} value="8">
                            {{ EnToBn('8') }}</option>
                        <option {{ isset($family) && $family->total_brother == '9' ? 'selected' : '' }} value="9">
                            {{ EnToBn('9') }}</option>
                        <option {{ isset($family) && $family->total_brother == '10' ? 'selected' : '' }}
                            value="10">{{ EnToBn('10') }}</option>
                    </select>
                </div>
            </div>
            <div id="brother_container" style="width: 100%">
                @if (isset($family))
                    @php
                        $prefix = __('site.brothers');
                        $tag = 'brother';
                    @endphp
                    @foreach (json_decode($family->brothers) as $key => $item)
                        <div class="row" data-{{ $tag }}-id="{{ $key }}">
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">{{ $prefix }}
                                            @lang('site.name')
                                            <span class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_names[]" id="{{ $tag }}_names" required
                                            value="{{ $item->name }}" class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.write_name')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.educational_qualification') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_educations[]"
                                            id="{{ $tag }}_educations" value="{{ $item->education }}"
                                            class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.educational_qualification')" required /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.b_occupation') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_jobs[]" id="{{ $tag }}_jobs"
                                            value="{{ $item->job }}" class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.profession')" required /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.marital_status') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-drop_down_select_box"> <select
                                            class="form-control select2" style="width: 100%"
                                            id="{{ $tag }}_merital_status"
                                            name="{{ $tag }}_merital_status[]" required >
                                            <option value="">@lang('site.please_select')</option>
                                            <option {{ $item->merital_status == 'single' ? 'selected' : '' }}
                                                value="single">@lang('site.single')</option>
                                            <option {{ $item->merital_status == 'widowed' ? 'selected' : '' }}
                                                value="widowed">@lang('site.widowed')</option>
                                            <option {{ $item->merital_status == 'separated' ? 'selected' : '' }}
                                                value="separated">@lang('site.separated')</option>
                                            <option {{ $item->merital_status == 'divorced' ? 'selected' : '' }}
                                                value="divorced">@lang('site.divorced')</option>
                                            <option {{ $item->merital_status == 'married' ? 'selected' : '' }}
                                                value="married">@lang('site.married')</option>
                                        </select> </div>
                                </div>

                                <!--- extra field --->
                                <div id="extra_field_{{ $tag }}_{{ $i }}"
                                    class="{{ $tag }}_extra_field"
                                    style="display: {{ $item->merital_status == 'married' ? 'block' : 'none' }};">
                                    <div class="od-form-group-container required-field">
                                        <div class="od-form-group-label">
                                            <label>{{ $prefix }}
                                                @lang('site.wifes')
                                                @lang('site.profession')</label>
                                        </div>
                                        <div class="od-form-group-input od-custom-drop_down_select_box">
                                            <input type="text" name="{{ $tag }}_spause_profession[]"
                                                id="{{ $tag }}_spouse_profession_${i}"
                                                value="{{ $item->spause_profession }}" class="od-field-type__textbox"
                                                placeholder="{{ $prefix }} @lang('site.wifes')
                                                @lang('site.profession')" />
                                        </div>
                                    </div>
                                    <div class="od-form-group-container required-field">
                                        <div class="od-form-group-label">
                                            <label>{{ $prefix }}
                                                @lang('site.wifes')
                                                @lang('site.educational_qualification')</label>
                                        </div>
                                        <div class="od-form-group-input od-custom-drop_down_select_box">
                                            <input type="text" name="{{ $tag }}_spouse_education[]"
                                                id="{{ $tag }}_spouse_education_${i}"
                                                value="{{ $item->spouse_education }}" class="od-field-type__textbox"
                                                placeholder="{{ $prefix }} @lang('site.wifes')
                                                @lang('site.educational_qualification')" />
                                        </div>
                                    </div>
                                </div>
                                <!--- extra field end --->
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            {{-- বোন --}}
            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.how_many_sister')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select onchange="handleFamily('@lang('site.sisters')', 'sister', this.value)" required
                        class="form-control select2" style="width: 100%" id="total_sister" name="total_sister">
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($family) && $family->total_sister == '0' ? 'selected' : '' }} value="0">
                            @lang('site.no_sister')</option>
                        <option {{ isset($family) && $family->total_sister == '1' ? 'selected' : '' }} value="1">
                            {{ EnToBn('1') }}</option>
                        <option {{ isset($family) && $family->total_sister == '2' ? 'selected' : '' }} value="2">
                            {{ EnToBn('2') }}</option>
                        <option {{ isset($family) && $family->total_sister == '3' ? 'selected' : '' }} value="3">
                            {{ EnToBn('3') }}</option>
                        <option {{ isset($family) && $family->total_sister == '4' ? 'selected' : '' }} value="4">
                            {{ EnToBn('4') }}</option>
                        <option {{ isset($family) && $family->total_sister == '5' ? 'selected' : '' }} value="5">
                            {{ EnToBn('5') }}</option>
                        <option {{ isset($family) && $family->total_sister == '6' ? 'selected' : '' }} value="6">
                            {{ EnToBn('6') }}</option>
                        <option {{ isset($family) && $family->total_sister == '7' ? 'selected' : '' }} value="7">
                            {{ EnToBn('7') }}</option>
                        <option {{ isset($family) && $family->total_sister == '8' ? 'selected' : '' }} value="8">
                            {{ EnToBn('8') }}</option>
                        <option {{ isset($family) && $family->total_sister == '9' ? 'selected' : '' }} value="9">
                            {{ EnToBn('9') }}</option>
                        <option {{ isset($family) && $family->total_sister == '10' ? 'selected' : '' }}
                            value="10"> {{ EnToBn('10') }}</option>
                    </select>
                </div>
            </div>
            <div id="sister_container" style="width: 100%">
                @if (isset($family))
                    @php
                        $prefix = __('site.sisters');
                        $tag = 'sister';
                    @endphp
                    @foreach (json_decode($family->sisters) as $key => $item)
                        <div class="row" data-{{ $tag }}-id="{{ $key }}">
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">{{ $prefix }}
                                            @lang('site.name')
                                            <span class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_names[]" id="{{ $tag }}_names"
                                            value="{{ $item->name }}" class="od-field-type__textbox" required
                                            placeholder="{{ $prefix }} @lang('site.write_name')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.educational_qualification') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_educations[]"
                                            id="{{ $tag }}_educations" value="{{ $item->education }}" required
                                            class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.educational_qualification')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.profession') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_jobs[]" id="{{ $tag }}_jobs"
                                            value="{{ $item->job }}" class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.profession')" required /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.marital_status')<span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-drop_down_select_box"> <select
                                            class="form-control select2" style="width: 100%"
                                            id="{{ $tag }}_merital_status"
                                            name="{{ $tag }}_merital_status[]" required >
                                            <option value="">@lang('site.please_select')</option>
                                            <option {{ $item->merital_status == 'single' ? 'selected' : '' }}
                                                value="single">@lang('site.single')</option>
                                            <option {{ $item->merital_status == 'widowed' ? 'selected' : '' }}
                                                value="widowed">@lang('site.widowed')</option>
                                            <option {{ $item->merital_status == 'separated' ? 'selected' : '' }}
                                                value="separated">@lang('site.separated')</option>
                                            <option {{ $item->merital_status == 'divorced' ? 'selected' : '' }}
                                                value="divorced">@lang('site.divorced')</option>
                                            <option {{ $item->merital_status == 'married' ? 'selected' : '' }}
                                                value="married">@lang('site.married')</option>
                                        </select> </div>
                                </div>

                                <!--- extra field --->
                                <div id="extra_field_{{ $tag }}_{{ $i }}"
                                    class="{{ $tag }}_extra_field"
                                    style="display: {{ $item->merital_status == 'married' ? 'block' : 'none' }};">
                                    <div class="od-form-group-container required-field">
                                        <div class="od-form-group-label">
                                            <label>{{ $prefix }}
                                                @lang('site.husbands')
                                                @lang('site.profession')</label>
                                        </div>
                                        <div class="od-form-group-input od-custom-drop_down_select_box">
                                            <input type="text" name="{{ $tag }}_spause_profession[]"
                                                id="{{ $tag }}_spouse_profession_${i}"
                                                value="{{ $item->spause_profession }}"
                                                class="od-field-type__textbox"
                                                placeholder="{{ $prefix }} @lang('site.husbands')
                                                @lang('site.profession')" />
                                        </div>
                                    </div>
                                    <div class="od-form-group-container required-field">
                                        <div class="od-form-group-label">
                                            <label>{{ $prefix }}
                                                @lang('site.husbands')
                                                @lang('site.educational_qualification')</label>
                                        </div>
                                        <div class="od-form-group-input od-custom-drop_down_select_box">
                                            <input type="text" name="{{ $tag }}_spouse_education[]"
                                                id="{{ $tag }}_spouse_education_${i}"
                                                value="{{ $item->spouse_education }}" class="od-field-type__textbox"
                                                placeholder="{{ $prefix }} @lang('site.husbands')
                                                @lang('site.educational_qualification')" />
                                        </div>
                                    </div>
                                </div>
                                <!--- extra field end --->
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            {{-- চাচা --}}
            <div class="od-form-group-container">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.how_many_paternal_uncle')
                    </label>
                </div>
                
                <!--onchange="handleFamily('@lang('site.paternal_uncle')', 'paternal_uncle', this.value)"-->
                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%"
                        id="total_paternal_uncle" name="total_paternal_uncle" >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '0' ? 'selected' : '' }}
                            value="0">@lang('site.no_paternal_uncle')</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '1' ? 'selected' : '' }}
                            value="1">{{ EnToBn('1') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '2' ? 'selected' : '' }}
                            value="2">{{ EnToBn('2') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '3' ? 'selected' : '' }}
                            value="3">{{ EnToBn('3') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '4' ? 'selected' : '' }}
                            value="4">{{ EnToBn('4') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '5' ? 'selected' : '' }}
                            value="5">{{ EnToBn('5') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '6' ? 'selected' : '' }}
                            value="6">{{ EnToBn('6') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '7' ? 'selected' : '' }}
                            value="7">{{ EnToBn('7') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '8' ? 'selected' : '' }}
                            value="8">{{ EnToBn('8') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '9' ? 'selected' : '' }}
                            value="9">{{ EnToBn('9') }}</option>
                        <option {{ isset($family) && $family->total_paternal_uncle == '10' ? 'selected' : '' }}
                            value="10">{{ EnToBn('10') }}</option>
                    </select>
                </div>
            </div>
            <div id="paternal_uncle_container" style="width: 100%">
                @if (isset($family))
                    @php
                        $prefix = __('site.paternal_uncle');
                        $tag = 'paternal_uncle';
                    @endphp
                    @foreach (json_decode($family->paternal_uncles) as $key => $item)
                        <div class="row" data-{{ $tag }}-id="{{ $key }}">
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">{{ $prefix }}
                                            @lang('site.name')
                                            <span class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_names[]" id="{{ $tag }}_names"
                                            value="{{ $item->name }}" class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.write_name')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.educational_qualification') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_educations[]"
                                            id="{{ $tag }}_educations" value="{{ $item->education }}"
                                            class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.educational_qualification')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.profession') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_jobs[]" id="{{ $tag }}_jobs"
                                            value="{{ $item->job }}" class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.profession')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.marital_status') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-drop_down_select_box"> <select
                                            class="form-control select2" style="width: 100%"
                                            id="{{ $tag }}_merital_status"
                                            name="{{ $tag }}_merital_status[]">
                                            <option value="">@lang('site.please_select')</option>
                                            <option {{ $item->merital_status == 'single' ? 'selected' : '' }}
                                                value="single">@lang('site.single')</option>
                                            <option {{ $item->merital_status == 'widowed' ? 'selected' : '' }}
                                                value="widowed">@lang('site.widowed')</option>
                                            <option {{ $item->merital_status == 'separated' ? 'selected' : '' }}
                                                value="separated">@lang('site.separated')</option>
                                            <option {{ $item->merital_status == 'divorced' ? 'selected' : '' }}
                                                value="divorced">@lang('site.divorced')</option>
                                            <option {{ $item->merital_status == 'married' ? 'selected' : '' }}
                                                value="married">@lang('site.married')</option>
                                        </select> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{-- মামা --}}
            <div class="od-form-group-container">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.how_many_maternal_uncle')
                        {{-- <span class="od-required-label">*</span> --}}
                    </label>
                </div>
                
                <!--onchange="handleFamily('@lang('site.maternal_uncle')', 'maternal_uncle', this.value)"-->
                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%"
                        id="total_maternal_uncle" name="total_maternal_uncle">
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '0' ? 'selected' : '' }}
                            value="0">@lang('site.no_maternal_uncle')</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '1' ? 'selected' : '' }}
                            value="1">{{ EnToBn('1') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '2' ? 'selected' : '' }}
                            value="2">{{ EnToBn('2') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '3' ? 'selected' : '' }}
                            value="3">{{ EnToBn('3') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '4' ? 'selected' : '' }}
                            value="4">{{ EnToBn('4') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '5' ? 'selected' : '' }}
                            value="5">{{ EnToBn('5') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '6' ? 'selected' : '' }}
                            value="6">{{ EnToBn('6') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '7' ? 'selected' : '' }}
                            value="7">{{ EnToBn('7') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '8' ? 'selected' : '' }}
                            value="8">{{ EnToBn('8') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '9' ? 'selected' : '' }}
                            value="9">{{ EnToBn('9') }}</option>
                        <option {{ isset($family) && $family->total_maternal_uncle == '10' ? 'selected' : '' }}
                            value="10">{{ EnToBn('10') }}</option>
                    </select>
                </div>
            </div>
            <div id="maternal_uncle_container" style="width: 100%">
                @if (isset($family))
                    @php
                        $prefix = __('site.how_many_maternal_uncle');
                        $tag = 'maternal_uncle';
                    @endphp
                    @foreach (json_decode($family->maternal_uncles) as $key => $item)
                        <div class="row" data-{{ $tag }}-id="{{ $key }}">
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">{{ $prefix }}
                                            @lang('site.name')
                                            <span class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_names[]" id="{{ $tag }}_names"
                                            value="{{ $item->name }}" class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.write_name')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.educational_qualification') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_educations[]"
                                            id="{{ $tag }}_educations" value="{{ $item->education }}"
                                            class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.educational_qualification')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.profession') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-text_box"> <input type="text"
                                            name="{{ $tag }}_jobs[]" id="{{ $tag }}_jobs"
                                            value="{{ $item->job }}" class="od-field-type__textbox"
                                            placeholder="{{ $prefix }} @lang('site.profession')" /> </div>
                                </div>
                            </div>
                            <div class="col-span-12 md:col-span-3">
                                <div class="od-form-group-container required-field">
                                    <div class="od-form-group-label"><label
                                            class="text-[1.2rem] md:text-[1rem]">@lang('site.marital_status') <span
                                                class="od-required-label">*</span></label> </div>
                                    <div class="od-form-group-input od-custom-drop_down_select_box"> <select
                                            class="form-control select2" style="width: 100%"
                                            id="{{ $tag }}_merital_status"
                                            name="{{ $tag }}_merital_status[]">
                                            <option value="">@lang('site.please_select')</option>
                                            <option {{ $item->merital_status == 'single' ? 'selected' : '' }}
                                                value="single">@lang('site.single')</option>
                                            <option {{ $item->merital_status == 'widowed' ? 'selected' : '' }}
                                                value="widowed">@lang('site.widowed')</option>
                                            <option {{ $item->merital_status == 'separated' ? 'selected' : '' }}
                                                value="separated">@lang('site.separated')</option>
                                            <option {{ $item->merital_status == 'divorced' ? 'selected' : '' }}
                                                value="divorced">@lang('site.divorced')</option>
                                            <option {{ $item->merital_status == 'married' ? 'selected' : '' }}
                                                value="married">@lang('site.married')</option>
                                        </select> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.family_financial_status')
                        <span class="od-required-label">*</span></label>
                </div>
                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" id="family_status"
                        name="family_status" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($family) && $family->family_status == 'upper_class' ? 'selected' : '' }}
                            value="upper_class">@lang('site.upper_class')</option>
                        <option
                            {{ isset($family) && $family->family_status == 'higher_middle_class' ? 'selected' : '' }}
                            value="higher_middle_class">@lang('site.upper_middleclass')</option>
                        <option {{ isset($family) && $family->family_status == 'middle_class' ? 'selected' : '' }}
                            value="middle_class">@lang('site.middle_class')</option>
                        <option
                            {{ isset($family) && $family->family_status == 'lower_middle_class' ? 'selected' : '' }}
                            value="lower_middle_class">@lang('site.lower_middleclass')</option>
                        <option {{ isset($family) && $family->family_status == 'lower_class' ? 'selected' : '' }}
                            value="lower_class">@lang('site.lower_class')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.financial_status')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-multi_line_text_area">
                    <textarea id="financial_status" name="financial_status" class="od-field-type__multiline" placeholder="" required >{{ isset($family) ? $family->financial_status : '' }}</textarea>
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        <b>@lang('site.family_financial_status_example')</b>@lang('site.kufu_example')
                    </p>
                </div>
            </div>
            @if (isset($general) && $general->biodata_type == 'deen')
                <div class="od-form-group-container required-field">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.deen_environment') <span
                                class="od-required-label">*</span></label>
                    </div>
                    <div class="od-form-group-input od-custom-multi_line_text_area">
                        <textarea id="family_environment" name="family_environment" class="od-field-type__multiline" placeholder="" required >{{ isset($family) ? $family->family_environment : '' }}</textarea>
                    </div>
                    <div class="od-field-desc od-pt-10">
                        <p> @lang('site.deen_example')
                        </p>
                    </div>
                </div>
            @endif
            @include('frontend_new.user.edit_biodata.components.submit')
        </form>
    </div>
</div>


<script>
    
    $(document).ready(function() {
        $("[data-required='true']").each(function() {
            if ($(this).is(":visible")) {
                $(this).attr("required", true);
            } else {
                $(this).removeAttr("required");
            }
        });
    });
</script>
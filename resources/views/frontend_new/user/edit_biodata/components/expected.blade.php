<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.expected_life_partner')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1' ? route('admin.biodata.expected') : route('user.edit_biodata.expected');
        @endphp
        <form action="{{ $routeUrl }}" method="POST" class="od-row od-justify-content-spaceBetween">
            @csrf
            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="50">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.b_exp_age') <span
                            class="od-required-label">*</span></label>
                </div>

                @php
                    $ages = explode(';', isset($expected) ? $expected->expected_age : '18;24');
                    $min = $ages[0] ?? '18';
                    $max = $ages[1] ?? '24';
                @endphp
                @if ($biodata->admin_created == '1')
                    <div class="wrapper mt-1.5">
                        <div class="slider">
                            <div class="progress"></div>
                            <div class="toolTipMin ageTooltip px-4 py-px rounded bg-primary-color text-white"><span
                                    class="tooltipVal minToolTipVal text-sm roboto">18</span><span
                                    class="tooltipCorner"></span>
                            </div>
                            <div class="toolTipMax ageTooltip px-4 py-px rounded bg-primary-color text-white"><span
                                    class="tooltipVal maxToolTipVal text-sm roboto">26</span><span
                                    class="tooltipCorner"></span>
                            </div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" min="18" max="70"
                                value="{{ $min }}">
                            <input type="range" class="range-max" min="18" max="70"
                                value="{{ $max }}">
                            <input type="hidden" name="expected_age"
                                value="{{ isset($expected) ? $expected->expected_complexion : '18;26' }}" >
                        </div>
                    </div>
                @else
                    <div class="od-form-group-input od-custom-range_slider">
                        <span class="irs irs--flat js-irs-0 hidden" style="display:none">
                            <span class="irs">
                                <span class="irs-line" tabindex="0"></span>
                                <span class="irs-min">{{ EnToBn(18) }}</span>
                                <span class="irs-max">{{ EnToBn(70) }}</span>
                                <span class="irs-from">{{ EnToBn(0) }}</span>
                                <span class="irs-to">{{ EnToBn(0) }}</span>
                                <span class="irs-single">{{ EnToBn(0) }}</span>
                            </span>
                            <span class="irs-grid"></span>
                            <span class="irs-bar"></span>
                            <span class="irs-shadow shadow-from"></span>
                            <span class="irs-shadow shadow-to"></span>
                            <span class="irs-handle from">
                                <i></i>
                                <i></i>
                                <i></i>
                            </span>
                            <span class="irs-handle to type_last">
                                <i></i>
                                <i></i>
                                <i></i>
                            </span>
                        </span>
                        <input class="od-range-slider irs-hidden-input" type="hidden" data-type="double"
                            data-grid="false" data-min="18" data-max="70" data-step="1"
                            data-from="{{ $min }}" data-to="{{ $max }}" tabindex="-1" readonly=""
                            id="expected_age" name="expected_age" />

                        <input type="hidden" class="od-hf-range-slider-value" value="18-26" />
                    </div>
                @endif
            </div>

            <div class="od-form-group-container required-field od-multitag-field-container" data-visibility="yes"
                data-field_id="51">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.complexion') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" id="expected_complexion"
                        name="expected_complexion" required>
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($expected) && $expected->expected_complexion == 'black' ? 'selected' : '' }}
                            value="black">@lang('site.black')</option>
                        <option {{ isset($expected) && $expected->expected_complexion == 'mediam' ? 'selected' : '' }}
                            value="mediam">@lang('site.mediam')</option>
                        <option
                            {{ isset($expected) && $expected->expected_complexion == 'light_mediam' ? 'selected' : '' }}
                            value="light_mediam">@lang('site.light_mediam')</option>
                        <option {{ isset($expected) && $expected->expected_complexion == 'fair' ? 'selected' : '' }}
                            value="fair">@lang('site.fair')</option>
                        <option
                            {{ isset($expected) && $expected->expected_complexion == 'bright_fair' ? 'selected' : '' }}
                            value="bright_fair">@lang('site.bright_fair')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.height') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="expected_height"
                        value="{{ isset($expected) ? $expected->expected_height : '' }}" id="expected_height"
                        class="od-field-type__textbox" placeholder="{!! EnToBn("5'1&quot; - 5'10&quot;") !!}" required />
                </div>

                {{-- <div class="od-field-desc od-pt-10">
                    <p>
                        <span style="font-weight: bolder">'@lang('site.any')'</span>&nbsp;@lang('site.or')<span
                            style="font-weight: bolder">&nbsp;'@lang('site.suitable')'</span>&nbsp;@lang('site.not_acceptable')&nbsp;<br />
                    </p>
                </div> --}}
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="53">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.educational_qualification')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="expected_education" id="expected_education"
                        class="od-field-type__textbox" placeholder=""
                        value="{{ isset($expected) ? $expected->expected_education : '' }}" required />
                </div>
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="54">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.district') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="expect_district" id="expect_district"
                        value="{{ isset($expected) ? $expected->expect_district : '' }}"
                        class="od-field-type__textbox" placeholder="" required  />
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        <b>'@lang('site.any_district')', '@lang('site.any')'</b> @lang('site.not_acceptables')
                    </p>
                </div>
            </div>

            <div class="bride_groom_groom_open od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-conditional-field-visible-2 od-biodata-conditional-field od-multitag-field-container"
                style="display:none">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.marital_status') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select
                        class="od-field-type__selectbox form-control select2 od-profile-field-select-control select2-hidden-accessible"
                        style="width: 100%" id="groom_expected_marital_status" name="groom_expected_marital_status" required >
                        <option value="">Select One</option>
                        <option
                            {{ isset($expected) && $expected->groom_expected_marital_status == 'unmarried' ? 'selected' : '' }}
                            value="unmarried">@lang('site.unmarried')</option>
                        <option
                            {{ isset($expected) && $expected->groom_expected_marital_status == 'divorced' ? 'selected' : '' }}
                            value="divorced">@lang('site.divorced')</option>
                        <option
                            {{ isset($expected) && $expected->groom_expected_marital_status == 'widow' ? 'selected' : '' }}
                            value="widow">@lang('site.widow')</option>
                    </select>
                </div>
            </div>

            <div class="bride_groom_bride_open od-form-group-container od-conditional-field-4 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-multitag-field-container"
                style="display: none">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.marital_status') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select
                        class="od-field-type__selectbox form-control select2 od-profile-field-select-control select2-hidden-accessible"
                        style="width: 100%" id="bride_expected_marital_status" name="bride_expected_marital_status" required >
                        <option value="">@lang('site.please_select')</option>
                        <option
                            {{ isset($expected) && $expected->bride_expected_marital_status == 'unmarried' ? 'selected' : '' }}
                            value="unmarried">@lang('site.unmarried')</option>
                        <option
                            {{ isset($expected) && $expected->bride_expected_marital_status == 'f_single' ? 'selected' : '' }}
                            value="f_single">@lang('site.f_single')</option>
                        <option
                            {{ isset($expected) && $expected->bride_expected_marital_status == 'divorced' ? 'selected' : '' }}
                            value="divorced">@lang('site.divorced')</option>
                        <option
                            {{ isset($expected) && $expected->bride_expected_marital_status == 'widower' ? 'selected' : '' }}
                            value="widower">@lang('site.widower')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="157">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.b_occupation') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="expected_profession"
                        value="{{ isset($expected) ? $expected->expected_profession : '' }}" id="expected_profession"
                        class="od-field-type__textbox" placeholder="" required />
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        <b>'@lang('site.any')'</b> @lang('site.or') <span
                            style="font-weight: bolder">&nbsp;'@lang('site.suitable')'</span> @lang('site.or')
                        <b>'@lang('site.any_halal_profession')'</b> <span>&nbsp;'@lang('site.not_allowed')'</span>
                    </p>
                </div>
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="56">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.financial_status')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="expected_financial_status"
                        value="{{ isset($expected) ? $expected->expected_financial_status : '' }}" 
                        id="expected_financial_status" class="od-field-type__textbox" placeholder="" required />
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.write_specific')<br />
                    </p>
                </div>
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="57">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.characteristics')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-multi_line_text_area">
                    <textarea id="expected_features" name="expected_features" class="od-field-type__multiline" placeholder="" required >{{ isset($expected) ? $expected->expected_features : '' }}</textarea>
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.expectation_details')<br />
                    </p>
                </div>
            </div>
            @include('frontend_new.user.edit_biodata.components.submit')
        </form>
    </div>
</div>

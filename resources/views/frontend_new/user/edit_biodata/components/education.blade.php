<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.educational_qualification')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1'
                    ? route('admin.biodata.education')
                    : route('user.edit_biodata.education');
        @endphp
        <form method="POST" action="{{ $routeUrl }}" class="" id="myForm">
            @csrf
            {{-- education field --}}
            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.educational_medium')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select onchange="formsController(this)" class="form-control select2" style="width: 100%"
                        name="education_medium" id="education_medium" required>
                        <option value="">@lang('site.please_select')</option>
                        <option value="general">@lang('site.general')</option>
                        <option value="qawmi">@lang('site.qawmi')</option>
                        <option value="alia">@lang('site.alia')</option>
                    </select>
                </div>

            </div>

            {{-- General highest education --}}
            <div class="education_medium_general_open education_medium_alia_open !mb-4"
                style="display:none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.highest_educational_qualification')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" onchange="formsController(this)" style="width: 100%"
                        name="general_highest_education" id="general_highest_education" required >
                        <option value="">@lang('site.please_select')</option>
                        <option value="below_ssc">@lang('site.below_ssc')</option>
                        <option value="ssc">@lang('site.ssc')</option>
                        <option value="hsc">@lang('site.hsc')</option>
                        <option value="diploma_running">@lang('site.diploma_running')</option>
                        <option value="diploma">@lang('site.diploma')</option>
                        <option value="honors_running">@lang('site.honors_running')</option>
                        <option value="honors">@lang('site.honors')</option>
                        <option value="masters">@lang('site.masters')</option>
                        <option value="doctorate">@lang('site.doctorate')</option>
                    </select>
                </div>
            </div>

            {{-- general highest school study --}}
            <div class="general_highest_education_below_ssc_open !mb-4" style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.highest_class')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" name="general_highest_school_study"
                        id="general_highest_school_study" required >
                        <option value="">@lang('site.please_select')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '10' ? 'selected' : '' }}
                            value="10">@lang('site.10th')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '9' ? 'selected' : '' }}
                            value="9">@lang('site.9th')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '8' ? 'selected' : '' }}
                            value="8">@lang('site.8th')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '7' ? 'selected' : '' }}
                            value="7">@lang('site.7th')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '6' ? 'selected' : '' }}
                            value="6">@lang('site.6th')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '5' ? 'selected' : '' }}
                            value="5">@lang('site.5th')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '4' ? 'selected' : '' }}
                            value="4">@lang('site.4th')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '3' ? 'selected' : '' }}
                            value="3">@lang('site.3rd')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '2' ? 'selected' : '' }}
                            value="2">@lang('site.2nd')</option>
                        <option
                            {{ isset($education) && $education->general_highest_school_study == '1' ? 'selected' : '' }}
                            value="1">@lang('site.1st')</option>
                    </select>
                </div>
            </div>

            {{-- ssc year --}}
            <div class="general_highest_education_ssc_open general_highest_education_hsc_open general_highest_education_diploma_running_open general_highest_education_diploma_open general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.ssc_year')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->ssc_year : '' }}"
                        class="od-field-type__textbox" name="ssc_year" id="ssc_year" placeholder="{{ EnToBn('2012') }}" required />
                </div>
            </div>

            {{-- ssc dept --}}
            <div style="display: none; width: 100%"
                class="general_highest_education_ssc_open general_highest_education_hsc_open general_highest_education_diploma_running_open general_highest_education_diploma_open general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close !mb-4">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"><!-- এস.এস.সি --> @lang('site.department') <span
                            class="od-required-label">*</span></label>
                </div>
                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" name="ssc_dept" id="ssc_dept" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($education) && $education->ssc_dept == 'science' ? 'selected' : '' }}
                            value="science">@lang('site.science')</option>
                        <option {{ isset($education) && $education->ssc_dept == 'business_studies' ? 'selected' : '' }}
                            value="business_studies">@lang('site.business_studies')</option>
                        <option {{ isset($education) && $education->ssc_dept == 'humanities' ? 'selected' : '' }}
                            value="humanities">@lang('site.humanities')</option>
                        <option {{ isset($education) && $education->ssc_dept == 'vocational' ? 'selected' : '' }}
                            value="vocational">@lang('site.vocational')</option>
                    </select>
                </div>
            </div>

            {{-- ssc result --}}
            <div class="general_highest_education_ssc_open general_highest_education_hsc_open general_highest_education_diploma_running_open general_highest_education_diploma_open general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"><!-- এস.এস.সি --> @lang('site.result') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" name="ssc_result" id="ssc_result" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($education) && $education->ssc_result == 'all_A+' ? 'selected' : '' }}
                            value="all_A+">A+ (@lang('site.all_subject'))</option>
                        <option {{ isset($education) && $education->ssc_result == 'A+' ? 'selected' : '' }}
                            value="A+">A+</option>
                        <option {{ isset($education) && $education->ssc_result == 'A' ? 'selected' : '' }}
                            value="A">A</option>
                        <option {{ isset($education) && $education->ssc_result == 'A-' ? 'selected' : '' }}
                            value="A-">A-</option>
                        <option {{ isset($education) && $education->ssc_result == 'B' ? 'selected' : '' }}
                            value="B">B</option>
                        <option {{ isset($education) && $education->ssc_result == 'C' ? 'selected' : '' }}
                            value="C">C</option>
                        <option {{ isset($education) && $education->ssc_result == 'D' ? 'selected' : '' }}
                            value="D">D</option>
                    </select>
                </div>
            </div>

            {{-- hsc study running --}}
            <div class="general_highest_education_ssc_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.hsc_year')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" name="hsc_study_running" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($education) && $education->hsc_study_running == 'hsc_1st' ? 'selected' : '' }}
                            value="hsc_1st">HSC @lang('site.1st_year')</option>
                        <option {{ isset($education) && $education->hsc_study_running == 'hsc_2nd' ? 'selected' : '' }}
                            value="hsc_2nd">HSC @lang('site.hsc_2nd')</option>
                        <option
                            {{ isset($education) && $education->hsc_study_running == 'hsc_no_result' ? 'selected' : '' }}
                            value="hsc_no_result">@lang('site.hsc_no_result')</option>
                        <option
                            {{ isset($education) && $education->hsc_study_running == 'ssc_only' ? 'selected' : '' }}
                            value="ssc_only">@lang('site.ssc_only')</option>
                    </select>
                </div>
            </div>

            {{-- study after ssc --}}
            <div class="general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.ssc_after')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" onchange="formsController(this)" id="study_after_ssc"
                        name="study_after_ssc" style="width: 100%" required >
                        <option value="">@lang('site.please_select')</option>
                        <option value="hsc">HSC</option>
                        <option value="diploma">@lang('site.diploma')</option>
                    </select>
                </div>
            </div>

            {{-- hsc pass year --}}
            <div class="general_highest_education_hsc_open study_after_ssc_hsc_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.hsc_year')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->hsc_pass_year : '' }}"
                        class="od-field-type__textbox" name="hsc_pass_year" placeholder="{{ EnToBn('2014') }}" required  />
                </div>
            </div>

            {{-- hsc dept --}}
            <div class="general_highest_education_hsc_open !mb-4 study_after_ssc_hsc_open education_medium_close"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"><!-- এইচ.এস.সি --> @lang('site.department') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" name="hsc_dept" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($education) && $education->hsc_dept == 'science' ? 'selected' : '' }}
                            value="science">@lang('site.science')</option>
                        <option {{ isset($education) && $education->hsc_dept == 'business_studies' ? 'selected' : '' }}
                            value="business_studies">@lang('site.business_studies')</option>
                        <option {{ isset($education) && $education->hsc_dept == 'humanities' ? 'selected' : '' }}
                            value="humanities">@lang('site.humanities')</option>
                        <option {{ isset($education) && $education->hsc_dept == 'vocational' ? 'selected' : '' }}
                            value="vocational">@lang('site.vocational')</option>
                    </select>
                </div>
            </div>

            {{-- hsc result --}}
            <div class="general_highest_education_hsc_open !mb-4 study_after_ssc_hsc_open education_medium_close"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"><!-- এইচ.এস.সি --> @lang('site.result') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" name="hsc_result" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($education) && $education->hsc_result == 'all_A+' ? 'selected' : '' }}
                            value="all_A+">A+ (@lang('site.all_subject'))</option>
                        <option {{ isset($education) && $education->hsc_result == 'A+' ? 'selected' : '' }}
                            value="A+">A+</option>
                        <option {{ isset($education) && $education->hsc_result == 'A' ? 'selected' : '' }}
                            value="A">
                            A</option>
                        <option {{ isset($education) && $education->hsc_result == 'A-' ? 'selected' : '' }}
                            value="A-">A-</option>
                        <option {{ isset($education) && $education->hsc_result == 'B' ? 'selected' : '' }}
                            value="B">
                            B</option>
                        <option {{ isset($education) && $education->hsc_result == 'C' ? 'selected' : '' }}
                            value="C">
                            C</option>
                        <option {{ isset($education) && $education->hsc_result == 'D' ? 'selected' : '' }}
                            value="D">
                            D</option>
                    </select>
                </div>
            </div>


            {{-- diploma subject --}}
            <div class="general_highest_education_diploma_running_open general_highest_education_diploma_open study_after_ssc_diploma_open !mb-4 education_medium_close"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.diploma_subject')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->diploma_subject : '' }}"
                        class="od-field-type__textbox" name="diploma_subject" placeholder="@lang('site.diploma_example')" required  />
                </div>
            </div>

            {{-- diploma institution --}}
            <div class="general_highest_education_diploma_running_open general_highest_education_diploma_open study_after_ssc_diploma_open !mb-4 education_medium_close"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.institute_name')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->diploma_institution : '' }}"
                        class="od-field-type__textbox" name="diploma_institution" placeholder="@lang('site.politechnique_example')" required />
                </div>
            </div>


            {{-- diploma which year right now --}}
            <div class="general_highest_education_diploma_running_open !mb-4 education_medium_close"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.study_now')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->diploma_current_year : '' }}"
                        class="od-field-type__textbox" placeholder="" name="diploma_current_year" required />
                </div>
            </div>

            {{-- diploma passing year --}}
            <div class="general_highest_education_diploma_open study_after_ssc_diploma_open !mb-4 education_medium_close"
                style="display: none; width: 100%;">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.passing_year') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->diploma_passing_year : '' }}"
                        class="od-field-type__textbox" placeholder="{{ EnToBn('2026') }}"
                        name="diploma_passing_year" required />
                </div>
            </div>

            {{-- honors subject --}}
            <div class="general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open !mb-4 education_medium_close"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.graduate_subject')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->honors_subject : '' }}"
                        class="od-field-type__textbox" name="honors_subject" placeholder="@lang('site.bsc_example')" required />
                </div> 
            </div>

            {{-- honors institution --}}
            <div class="general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open !mb-4 education_medium_close"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"> @lang('site.institute_name')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->honors_instutution : '' }}"
                        class="od-field-type__textbox" name="honors_instutution" placeholder="@lang('site.textile_example')" required />
                </div>
            </div>

            {{-- honors passing year --}}
            <div class="general_highest_education_honors_open general_highest_education_masters_open education_medium_close general_highest_education_doctorate_open !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"> @lang('site.passing_year') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->honors_passing_year : '' }}"
                        class="od-field-type__textbox" placeholder="{{ EnToBn('2018') }}" name="honors_passing_year" required />
                </div>
            </div>

            {{-- honors study year --}}
            <div class="general_highest_education_honors_running_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"> @lang('site.study_now')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->honors_study_year : '' }}"
                        class="od-field-type__textbox" placeholder="" name="honors_study_year" required  />
                </div>
            </div>

            {{-- masters subject --}}
            <div class="general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.kamil_subject')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->masters_subject : '' }}"
                        class="od-field-type__textbox" placeholder="@lang('site.msc_example')" name="masters_subject" required />
                </div>
            </div>

            {{-- masters institution --}}
            <div class="general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.institute_name')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->masters_institution : '' }}"
                        class="od-field-type__textbox" placeholder="@lang('site.textile_example')" name="masters_institution" required />
                </div>
            </div>

            {{-- masters passing year --}}
            <div class="general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"> @lang('site.passing_year') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->masters_passing_year : '' }}"
                        class="od-field-type__textbox" placeholder="{{ EnToBn('2020') }}" name="masters_passing_year" required />
                </div>
            </div>

            {{-- doctorate subject --}}
            <div class=" general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.doctorate_subject')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->doctorate_passing_year : '' }}"
                        class="od-field-type__textbox" placeholder="" name="doctorate_passing_year"  required />
                </div>
            </div>

            {{-- doctorate institution --}}
            <div class=" general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"> @lang('site.institute_name')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->doctorate_institution : '' }}"
                        class="od-field-type__textbox" placeholder="" name="doctorate_institution" required />
                </div>
            </div>

            {{-- doctorate passing year --}}
            <div class="general_highest_education_doctorate_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"> @lang('site.passing_year') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->doctorate_passing_year : '' }}"
                        class="od-field-type__textbox" placeholder="" name="doctorate_passing_year" required  />
                </div>
            </div>

            {{-- Qawmi highest education --}}
            <div class="education_medium_qawmi_open !mb-4" style="display: none; width: 100%;">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.highest_educational_qualification')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" onchange="formsController(this)"
                        id="qawmi_education_qualification" name="qawmi_education_qualification" required >
                        <option value="">@lang('site.please_select')</option>
                        <option value="primary_deen">@lang('site.primary_deen')</option>
                        <option value="ibtedai">@lang('site.ibtedai')</option>
                        <option value="mutawassitah">@lang('site.mutawassitah')</option>
                        <option value="sanabia_ulya">@lang('site.sanabia_ulya')</option>
                        <option value="fazilat">@lang('site.fazilat')</option>
                        <option value="takmil">@lang('site.takmil')</option>
                        <option value="takhassus">@lang('site.takhassus')</option>
                    </select>
                </div>
            </div>

            {{-- ibtedai madrasa --}}
            <div class="qawmi_education_qualification_ibtedai_open !mb-4" style="display: none;width:100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.ibtedai_madrasa')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->ibtedai_madrasa : '' }}"
                        class="od-field-type__textbox" placeholder="" name="ibtedai_madrasa" required />
                </div>
            </div>

            {{-- mutawassitah madrasa --}}
            <div class="qawmi_education_qualification_mutawassitah_open !mb-4" style="display: none;width:100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.mutawassitah_madrasa')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->mutawassitah_madrasa : '' }}"
                        class="od-field-type__textbox" placeholder="" name="mutawassitah_madrasa" required />
                </div>
            </div>

            {{-- sanabia_ulya madrasa --}}
            <div class="qawmi_education_qualification_sanabia_ulya_open !mb-4" style="display: none;width:100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.sanabia_ulya_madrasa')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->sanabia_ulya_madrasa : '' }}"
                        class="od-field-type__textbox" placeholder="" name="sanabia_ulya_madrasa" required />
                </div>
            </div>

            {{-- fazilat madrasa --}}
            <div class="qawmi_education_qualification_fazilat_open !mb-4" style="display: none;width:100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.fazilat_madrasa')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->fazilat_madrasa : '' }}"
                        class="od-field-type__textbox" placeholder="" name="fazilat_madrasa" required  />
                </div>
            </div>

            {{-- takmil madrasa --}}
            <div class="qawmi_education_qualification_takmil_open qawmi_education_qualification_takhassus_open education_medium_close !mb-4"
                style="display: none; width:100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.takmil_madrasa')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->takmil_madrasa : '' }}"
                        class="od-field-type__textbox" placeholder="" name="takmil_madrasa" required />
                </div>
            </div>

            {{-- qawmi result --}}
            <div class="qawmi_education_qualification_ibtedai_open qawmi_education_qualification_mutawassitah_open qawmi_education_qualification_sanabia_ulya_open qawmi_education_qualification_fazilat_open qawmi_education_qualification_takmil_open qawmi_education_qualification_takhassus_open education_medium_close !mb-4"
                style="display: none; width:100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.result') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" name="qawmi_result" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($education) && $education->qawmi_result == 'mumtaz' ? 'selected' : '' }}
                            value="mumtaz">@lang('site.mumtaz')</option>
                        <option {{ isset($education) && $education->qawmi_result == 'zayed_ziddan' ? 'selected' : '' }}
                            value="zayed_ziddan">@lang('site.zayed_ziddan')</option>
                        <option {{ isset($education) && $education->qawmi_result == 'zayed' ? 'selected' : '' }}
                            value="zayed">@lang('site.zayed')</option>
                        <option {{ isset($education) && $education->qawmi_result == 'makbul' ? 'selected' : '' }}
                            value="makbul">@lang('site.makbul')</option>
                    </select>
                </div>
            </div>

            {{-- qawmi passing year --}}
            <div class="qawmi_education_qualification_ibtedai_open qawmi_education_qualification_mutawassitah_open qawmi_education_qualification_sanabia_ulya_open qawmi_education_qualification_fazilat_open qawmi_education_qualification_takmil_open qawmi_education_qualification_takhassus_open education_medium_close !mb-4"
                style="display: none; width:100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.passing_year') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->qawmi_passing_year : '' }}"
                        class="od-field-type__textbox" placeholder="{{ EnToBn('2010') }}" name="qawmi_passing_year" required />
                </div>
            </div>

            {{-- takhassus madrasa --}}
            <div class="qawmi_education_qualification_takhassus_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.takhassus_madrasa')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->takhassus_madrasa : '' }}"
                        class="od-field-type__textbox" placeholder="" name="takhassus_madrasa" required />
                </div>
            </div>

            {{-- takhassus subject --}}
            <div class="qawmi_education_qualification_takhassus_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"> @lang('site.takhassus_subject') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->takhassus_subject : '' }}"
                        class="od-field-type__textbox" placeholder="" name="takhassus_subject" required />
                </div>
            </div>

            {{-- takhassus result --}}
            <div class="qawmi_education_qualification_takhassus_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.result') <span
                            class="od-required-label">*</span></label>
                </div>
                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" name="takhassus_result" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($education) && $education->takhassus_result == 'mumtaz' ? 'selected' : '' }}
                            value="mumtaz">@lang('site.mumtaz')</option>
                        <option
                            {{ isset($education) && $education->takhassus_result == 'zayed_ziddan' ? 'selected' : '' }}
                            value="zayed_ziddan">@lang('site.zayed_ziddan')</option>
                        <option {{ isset($education) && $education->takhassus_result == 'zayed' ? 'selected' : '' }}
                            value="zayed">@lang('site.zayed')</option>
                        <option {{ isset($education) && $education->takhassus_result == 'makbul' ? 'selected' : '' }}
                            value="makbul">@lang('site.makbul')</option>
                    </select>
                </div>
            </div>

            {{-- takhassus passing year --}}
            <div class="qawmi_education_qualification_takhassus_open education_medium_close !mb-4"
                style="display: none; width: 100%">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]"> @lang('site.passing_year') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" value="{{ isset($education) ? $education->takhassus_passing_year : '' }}"
                        class="od-field-type__textbox" placeholder="{{ EnToBn('2020') }}" name="takhassus_passing_year" required />
                </div>
            </div>

            <div class="education_medium_general_open education_medium_qawmi_open education_medium_alia_open !mb-4 !w-full"
                style="display: none">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.others_educational_qualifications') </label>
                </div>

                <div class="od-form-group-input od-custom-multi_line_text_area">
                    <textarea id="others_educational_qualifications" name="others_educational_qualifications"
                        class="od-field-type__multiline" placeholder="" >{{ isset($education) ? $education->others_educational_qualifications : '' }}</textarea>
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.other_qualification_details')
                    </p>
                </div>
            </div>

            <div class="!mb-4">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.deen_titles') </label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2 !w-full" style="width: 100%" name="deen_designations" >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($education) && $education->deen_designations == 'hafiz' ? 'selected' : '' }}
                            value="hafiz">@lang('site.hafiz')</option>
                        <option {{ isset($education) && $education->deen_designations == 'mawlana' ? 'selected' : '' }}
                            value="mawlana">@lang('site.mawlana')</option>
                        <option {{ isset($education) && $education->deen_designations == 'mufti' ? 'selected' : '' }}
                            value="mufti">@lang('site.mufti')</option>
                        <option
                            {{ isset($education) && $education->deen_designations == 'mufassir' ? 'selected' : '' }}
                            value="mufassir">@lang('site.mufassir')</option>
                        <option {{ isset($education) && $education->deen_designations == 'adib' ? 'selected' : '' }}
                            value="adib">@lang('site.adib')</option>
                    </select>
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.deen_title_description')<br />
                    </p>
                </div>
            </div>
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



// $("#myForm").on("submit", function (e) {
//     let isValid = true;

//     // সব data-required ফিল্ড চেক করবো
//     $("[data-required='true']").each(function () {
//         let $field = $(this); 

//         // যদি ফিল্ড hidden থাকে → skip
//         if (!$field.is(":visible")) {
//             return true; // continue
//         }

//         // visible হলে কিন্তু খালি → submit আটকাবো
//         if ($field.val().trim() === "") {
//             isValid = false;
//             $field.focus(); // ফিল্ডে ফোকাস যাবে
//             alert($field.attr("name") + " is required!");
//             return false; // break
//         }
//     });

//     if (!isValid) {
//         e.preventDefault(); // form submit আটকানো হবে
//     }
// });


</script>
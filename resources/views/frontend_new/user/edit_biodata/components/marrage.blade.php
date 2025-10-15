<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.marital_info')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1' ? route('admin.biodata.marrage') : route('user.edit_biodata.marrage');
        @endphp
        <form action="{{ $routeUrl }}" method="POST">
            @csrf

            <div id="for_groom" class="bride_groom_groom_open od-row od-justify-content-spaceBetween"
                style="display: none;">
                {{-- wife_died_reason --}}
                <div class="marital_status_widower_open od-form-group-container od-conditional-field-9 od-conditional-field-id-3 od-biodata-conditional-field-track required-field"
                    style="display: none" id="wife_died_reason">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.wife_died')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-multi_line_text_area">
                        <textarea name="wife_died_reason" class="od-field-type__multiline" placeholder="" required >{{ isset($marrage) ? $marrage->wife_died_reason : '' }}</textarea>
                    </div>

                    <div class="od-field-desc od-pt-10">
                        <p>
                            @lang('site.wife_died_details')<br />
                        </p>
                    </div>
                </div>

                {{-- why_marry_after_marrage --}}
                <div class="marital_status_married_open od-form-group-container od-conditional-field-6 od-conditional-field-id-3 od-biodata-conditional-field-track required-field"
                    id="why_marry_after_marrage" style="display: none">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.married_again')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-multi_line_text_area">
                        <textarea name="why_marry_after_marrage" class="od-field-type__multiline" placeholder="" required >{{ isset($marrage) ? $marrage->why_marry_after_marrage : '' }}</textarea>
                    </div>

                    <div class="od-field-desc od-pt-10">
                        <p>
                            @lang('site.wife_agree_details')<br />
                        </p>
                    </div>
                </div>


                {{-- wife_and_childrens --}}
                <div class="marital_status_married_open od-form-group-container od-conditional-field-6 od-conditional-field-id-3 od-biodata-conditional-field-track required-field"
                    id="wife_and_childrens" style="display: none">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.current_wife_and_childrens')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-multi_line_text_area">
                        <textarea name="wife_and_childrens" class="od-field-type__multiline" placeholder="" required >{{ isset($marrage) ? $marrage->wife_and_childrens : '' }}</textarea>
                    </div>
                </div>


                {{-- wife_cover --}}
                @if (isset($general) && $general->biodata_type == 'deen')
                    <div class="od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-conditional-field-visible-2 od-biodata-conditional-field"
                        id="wife_cover">
                        <div class="od-form-group-label">
                            <label class="text-[1.2rem] md:text-[1rem]">@lang('site.wife_veil')
                                <span class="od-required-label">*</span></label>
                        </div>

                        <div class="od-form-group-input od-custom-text_box">
                            <input type="text" name="wife_cover" class="od-field-type__textbox" placeholder=""
                                value="{{ isset($marrage) ? $marrage->wife_cover : '' }}" required />
                        </div>
                    </div>
                @endif

                {{-- wife_study --}}
                <div class="od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-conditional-field-visible-2 od-biodata-conditional-field"
                    id="wife_study">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.wife_study')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="wife_study" class="od-field-type__textbox"
                            value="{{ isset($marrage) ? $marrage->wife_study : '' }}" placeholder="" required />
                    </div>
                </div>

                {{-- wife_job --}}
                <div class="od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-conditional-field-visible-2 od-biodata-conditional-field"
                    id="wife_job">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.wife_work')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="wife_job" class="od-field-type__textbox" placeholder=""
                            value="{{ isset($marrage) ? $marrage->wife_job : '' }}" required />
                    </div>
                </div>

                {{-- where_live --}}
                <div class="od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-conditional-field-visible-2 od-biodata-conditional-field"
                    id="where_live">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.wife_take')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="where_live" class="od-field-type__textbox"
                            value="{{ isset($marrage) ? $marrage->where_live : '' }}" placeholder="" required  />
                    </div>
                </div>

                @if (isset($general) && $general->biodata_type == 'deen')
                    {{-- expectetions_from_wife --}}
                    <div class="od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-conditional-field-visible-2 od-biodata-conditional-field"
                        id="expectetions_from_wife">
                        <div class="od-form-group-label">
                            <label class="text-[1.2rem] md:text-[1rem]">@lang('site.wife_gift') <span
                                    class="od-required-label">*</span></label>
                        </div>

                        <div class="od-form-group-input od-custom-text_box">
                            <input type="text" name="expectetions_from_wife"
                                value="{{ isset($marrage) ? $marrage->expectetions_from_wife : '' }}"
                                class="od-field-type__textbox" placeholder="" required  />
                        </div>
                    </div>
                @endif


            </div>
            <div id="for_bride" class="bride_groom_bride_open od-row od-justify-content-spaceBetween"
                style="display: none;">
                {{-- husband_died_reason --}}
                <div class="marital_status_widow_open od-form-group-container od-conditional-field-8 od-conditional-field-id-3 od-biodata-conditional-field-track required-field"
                    id="husband_died_reason" style="display: none">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.hasband_died')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-multi_line_text_area">
                        <textarea name="husband_died_reason" class="od-field-type__multiline" placeholder="" required >{{ isset($marrage) ? $marrage->husband_died_reason : '' }}</textarea>
                    </div>

                    <div class="od-field-desc od-pt-10">
                        <p>
                            @lang('site.wife_died_details')<br />
                        </p>
                    </div>
                </div>


                {{-- job_interested --}}
                <div class="od-form-group-container od-conditional-field-4 od-conditional-field-id-2 od-biodata-conditional-field-track required-field"
                    id="job_interested">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.interested_to_work_after_marrage')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="job_interested"
                            value="{{ isset($marrage) ? $marrage->job_interested : '' }}"
                            class="od-field-type__textbox" placeholder="" required  />
                    </div>
                </div>

                {{-- continue_study --}}
                <div class="od-form-group-container od-conditional-field-4 od-conditional-field-id-2 od-biodata-conditional-field-track required-field"
                    id="continue_study">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.study_after_marrage')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="continue_study"
                            value="{{ isset($marrage) ? $marrage->continue_study : '' }}"
                            class="od-field-type__textbox" placeholder="" required  />
                    </div>
                </div>

                {{-- continue_job --}}
                <div class="od-form-group-container od-conditional-field-4 od-conditional-field-id-2 od-biodata-conditional-field-track"
                    id="continue_job">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.work_after_marrage') </label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="continue_job"
                            value="{{ isset($marrage) ? $marrage->continue_job : '' }}"
                            class="od-field-type__textbox" placeholder="" required />
                    </div>

                    <div class="od-field-desc od-pt-10">
                        <p>@lang('site.wife_work_details')<br /></p>
                    </div>
                </div>

            </div>


            <div class="od-row od-justify-content-spaceBetween">
                {{-- marrage_divorce_date_reason --}}
                <div class="od-form-group-container od-conditional-field-7 od-conditional-field-id-3 od-biodata-conditional-field-track required-field marital_status_divorced_open"
                    style="display: none;" id="marrage_divorce_date_reason">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.divorce_reason')<span
                                class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-multi_line_text_area">
                        <textarea name="marrage_divorce_date_reason" class="od-field-type__multiline" placeholder="" required >{{ isset($marrage) ? $marrage->marrage_divorce_date_reason : '' }}</textarea>
                    </div>

                    {{-- <div class="od-field-desc od-pt-10">
                        <p>
                            <b>সন্তান থাকলে তাদের বয়স ও কার দায়িত্বে আছে লিখবেন।</b> এছাড়া
                            অন্যান্য বিষয় থাকলে লিখবেন।<br />
                        </p>
                    </div> --}}
                </div>

                {{-- guardian_accept --}}
                <div class="od-form-group-container required-field" id="guardian_accept">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.parent_agree')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" value="{{ isset($marrage) ? $marrage->guardian_accept : '' }}"
                            name="guardian_accept" class="od-field-type__textbox" placeholder="" required  />
                    </div>
                </div>


                {{-- marrage_concept --}}
                <div class="od-form-group-container od-conditional-field-6 od-conditional-field-id-3 od-biodata-conditional-field-track required-field od-conditional-field-visible-3 od-biodata-conditional-field"
                    id="marrage_concept">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.thought_marrage')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-multi_line_text_area">
                        <textarea name="marrage_concept" class="od-field-type__multiline" placeholder="" required>{{ isset($marrage) ? $marrage->marrage_concept : '' }}</textarea>
                    </div>
                </div>

                @include('frontend_new.user.edit_biodata.components.submit')
            </div>
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

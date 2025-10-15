<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.personal_information')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1' ? route('admin.biodata.personal') : route('user.edit_biodata.personal');
        @endphp
        <form action="{{ $routeUrl }}" method="POST" enctype="multipart/form-data"
            class="od-row od-justify-content-spaceBetween">
            @csrf
            @if (isset($general) && $general->biodata_type == 'deen')
                @if (isset($general) && $general->bride_groom == 'bride')
                    <div class="bride_groom_bride_open od-form-group-container required-field" data-visibility="yes"
                        data-field_id="69">
                        <div class="od-form-group-label">
                            <label class="text-[1.2rem] md:text-[1rem]">@lang('site.outside_dress')
                                <span class="od-required-label">*</span></label>
                        </div>

                        <div class="od-form-group-input od-custom-text_box">
                            <input type="text" name="dressup" id="dressup" class="od-field-type__textbox"
                                placeholder="" value="{{ isset($personal) ? $personal->dressup : '' }}" required />
                        </div>

                        <div class="od-field-desc od-pt-10">
                            <p>
                                @lang('site.in_case_of_bride')
                                "<b>@lang('site.wear_niqab')</b>" @lang('site.or')
                                "<b>@lang('site.wear_no_niqab')</b>" @lang('site.or')
                                "<b>@lang('site.wear_mask')</b>" @lang('site.or')
                                "<b>@lang('site.wear_kamiz')</b>"
                            </p>
                        </div>
                    </div>
                    <div
                        class="bride_groom_bride_open od-form-group-container od-conditional-field-4 od-conditional-field-id-2 od-biodata-conditional-field-track required-field">
                        <div class="od-form-group-label">
                            <label class="text-[1.2rem] md:text-[1rem]">@lang('site.veiled_niqab')</label>
                        </div>

                        <div class="od-form-group-input od-custom-text_box">
                            <input type="text" name="niqab_info" id="niqab_info"
                                value="{{ isset($personal) ? $personal->niqab_info : '' }}"
                                class="od-field-type__textbox" placeholder="@lang('site.about_3_years')" required />
                        </div>

                        <div class="od-field-desc od-pt-10">
                            <p>
                                @lang('site.wear_niqab_stuff')
                                "<b>@lang('site.no_niqab')</b>" @lang('site.or')
                                "<b>@lang('site.wear_mask')</b>"
                            </p>
                        </div>
                    </div>
                @endif


                @if (isset($general) && $general->bride_groom == 'groom')
                    <div
                        class="bride_groom_groom_open od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track od-conditional-field-visible-2 od-biodata-conditional-field">
                        <div class="od-form-group-label">
                            <label class="text-[1.2rem] md:text-[1rem]">@lang('site.beard_when') <span
                                    class="od-required-label">*</span></label>
                        </div>

                        <div class="od-form-group-input od-custom-text_box">
                            <input type="text" name="beard_info" id="beard_info" class="od-field-type__textbox"
                                placeholder="" value="{{ isset($personal) ? $personal->beard_info : '' }}" required />
                        </div>

                        <div class="od-field-desc od-pt-10">
                            <p>
                                @lang('site.beard_year')
                                <b>@lang('site.beard_biological')</b>
                            </p>
                        </div>
                    </div>
                    <div class="bride_groom_groom_open od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track od-conditional-field-visible-2 od-biodata-conditional-field"
                        data-conditional_target="show" style="" data-field_id="73" data-visibility="yes">
                        <div class="od-form-group-label">
                            <label class="text-[1.2rem] md:text-[1rem]">@lang('site.takhnu') <span
                                    class="od-required-label">*</span></label>
                        </div>

                        <div class="od-form-group-input od-custom-text_box">
                            <input type="text" name="above_ankle_info" id="above_ankle_info"
                                class="od-field-type__textbox" placeholder=""
                                value="{{ isset($personal) ? $personal->above_ankle_info : '' }}" required />
                        </div>
                    </div>
                @endif


                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="75">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.prayer')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="namaz_info" id="namaz_info" class="od-field-type__textbox"
                            placeholder="" value="{{ isset($personal) ? $personal->namaz_info : '' }}" required />
                    </div>

                    <div class="od-field-desc od-pt-10">
                        <p>
                            @lang('site.answer_clearly')
                            <b>@lang('site.namaz_year')</b><br />
                        </p>
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="77">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.kaza_prayer')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="namaz_waqt_info" id="namaz_waqt_info" class="od-field-type__textbox"
                            placeholder="" value="{{ isset($personal) ? $personal->namaz_waqt_info : '' }}" required  />
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="78">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.b_veil')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="mahram_info"
                            value="{{ isset($personal) ? $personal->mahram_info : '' }}" id="mahram_info"
                            class="od-field-type__textbox" placeholder="" required />
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="79">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.b_recite_quran_correctly')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="quran_info"
                            value="{{ isset($personal) ? $personal->quran_info : '' }}" id="quran_info"
                            class="od-field-type__textbox" placeholder="" required />
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="80">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.custom_madhhab')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-drop_down_select_box">
                        <select
                            class="od-field-type__selectbox form-control select2 od-profile-field-select-control select2-hidden-accessible"
                            style="width: 100%" id="fiqh_info" name="fiqh_info" required >
                            <option value="">@lang('site.please_select')</option>
                            <option {{ isset($personal) && $personal->fiqh_info == 'hanafi' ? 'selected' : '' }}
                                value="hanafi">@lang('site.hanafi')</option>
                            <option {{ isset($personal) && $personal->fiqh_info == 'maleki' ? 'selected' : '' }}
                                value="maleki">@lang('site.maleki')</option>
                            <option {{ isset($personal) && $personal->fiqh_info == 'shafeyi' ? 'selected' : '' }}
                                value="shafeyi">@lang('site.shafeyi')</option>
                            <option {{ isset($personal) && $personal->fiqh_info == 'hamboli' ? 'selected' : '' }}
                                value="hamboli">@lang('site.hamboli')</option>
                            <option {{ isset($personal) && $personal->fiqh_info == 'ahle_hadis' ? 'selected' : '' }}
                                value="ahle_hadis">@lang('site.ahle_hadis')</option>
                        </select>
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="82">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.movie_serial')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="enternainment_info" id="enternainment_info"
                            class="od-field-type__textbox" placeholder=""
                            value="{{ isset($personal) ? $personal->enternainment_info : '' }}" required  />
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="83">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.physical_mental_issue')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="disablity_info" id="disablity_info"
                            class="od-field-type__textbox" placeholder=""
                            value="{{ isset($personal) ? $personal->disablity_info : '' }}" required />
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="84">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.deen_mehnat')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="deen_mehnot_info" id="deen_mehnot_info"
                            class="od-field-type__textbox" placeholder=""
                            value="{{ isset($personal) ? $personal->deen_mehnot_info : '' }}" required />
                    </div>

                    <div class="od-field-desc od-pt-10">
                        <p>@lang('site.tableague')</p>
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="86">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.mazar')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="mazar_concept_info" id="mazar_concept_info"
                            class="od-field-type__textbox" placeholder=""
                            value="{{ isset($personal) ? $personal->mazar_concept_info : '' }}" required  />
                    </div>
                </div>

                <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="87">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.islami_books')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="islami_books" id="islami_books" class="od-field-type__textbox"
                            placeholder="" value="{{ isset($personal) ? $personal->islami_books : '' }}" required />
                    </div>
                </div>

                <div class="od-form-group-container required-field">
                    <div class="od-form-group-label">
                        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.alems')
                            <span class="od-required-label">*</span></label>
                    </div>

                    <div class="od-form-group-input od-custom-text_box">
                        <input type="text" name="favourite_alem" id="favourite_alem"
                            class="od-field-type__textbox" placeholder=""
                            value="{{ isset($personal) ? $personal->favourite_alem : '' }}"  required />
                    </div>
                </div>


            @endif

            <div class="od-form-group-container od-multitag-field-container">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.category_select')
                    </label>
                </div>

                <div class="od-form-group-input">
                    <select
                        class="select2 rounded-md !bg-white border-[1px] cursor-pointer dropdown_no_arrow !border-[#cbd5e1]"
                        style="width: 100%; height: 100%;" id="person_category" name="person_category[]" multiple>
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($personal) && $personal->person_category == 'disabled' ? 'selected' : '' }}
                            value="disabled">@lang('site.physical_disabled')</option>  
                        <option {{ isset($personal) && $personal->person_category == 'infertile' ? 'selected' : '' }}
                            value="infertile">@lang('site.infertile')</option>
                        <option {{ isset($personal) && $personal->person_category == 'new' ? 'selected' : '' }}
                            value="new">@lang('site.new')</option>
                        <option {{ isset($personal) && $personal->person_category == 'orphan' ? 'selected' : '' }}
                            value="orphan">@lang('site.orphan')</option>
                        <option {{ isset($personal) && $personal->person_category == 'masna' ? 'selected' : '' }}
                            value="masna">@lang('site.masna')</option>
                        <option {{ isset($personal) && $personal->person_category == 'tableague' ? 'selected' : '' }}
                            value="tableague">@lang('site.tableague_only')</option>
                    </select>
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.category_example')
                    </p>
                </div>
            </div>
            <div class="od-form-group-container od-conditional-field-1278 od-conditional-field-id-190 od-biodata-conditional-field-track required-field"
                style="display: none" id="new_details">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.conversion_story')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-multi_line_text_area">
                    <textarea id="become_muslim" name="become_muslim" class="od-field-type__multiline" placeholder="" required >{{ isset($personal) ? $personal->become_muslim : '' }}</textarea>
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.conversion_details')<br />
                    </p>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.your_hobbies')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-multi_line_text_area">
                    <textarea id="hobby" name="hobby" class="od-field-type__multiline" placeholder=""  required >{{ isset($personal) ? $personal->hobby : '' }}</textarea>
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.write_details')
                    </p>
                </div>
            </div>

            <div class="od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-conditional-field-visible-2 od-biodata-conditional-field"
                data-conditional_target="show" style="">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.bride_groom_phone_number')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="phone_number" id="phone_number" class="od-field-type__textbox"
                        placeholder="01700-000000" value="{{ isset($personal) ? $personal->phone_number : '' }}" required />
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.bride_groom_phone_number_details')
                    </p>
                </div>
            </div>

            <div class="od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field od-conditional-field-visible-2 od-biodata-conditional-field"
                data-conditional_target="show" style="" data-field_id="198" data-visibility="yes">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.grooms_photo')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input image_uploader-container">
                    <label class="od-uploader-container">
                        <div class="od-uploader-panel-wrap">
                            <span class="fa fa-upload"></span> &nbsp;
                            <span>@lang('site.click_to_upload')</span>
                        </div>
                        <input type="file" class="image-uploader od-display-none" name="photo"
                            id="photo" required />
                    </label>
                    <div>
                        <img class="w-20 max-h-20 hidden cursor-pointer" title="Click To Remove" id="photo_viewer"
                            accept="image/*">
                    </div>
                    @if (isset($personal) && $personal->photo)
                    <h2>Prev image</h2>
                        <div class="mt-5">
                            <div>@lang('site.previous_image')</div>
                            <img class="w-20 max-h-20" src="{{ asset('storage/app/public/' . $personal->photo) }}">
                        </div>
                    @endif
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        <b>
                            @lang('site.photo_details')
                        </b>
                        @lang('site.photo_details2')
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
</script>

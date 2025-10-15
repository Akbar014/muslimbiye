<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.professional_info')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1'
                    ? route('admin.biodata.professional')
                    : route('user.edit_biodata.professional');
        @endphp
        <form action="{{ $routeUrl }}" method="POST" class="od-row od-justify-content-spaceBetween">
            @csrf
            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.profession') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select
                        class="od-field-type__selectbox form-control select2 od-profile-field-select-control select2-hidden-accessible"
                        style="width: 100%" id="profession" name="profession" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($professional) && $professional->profession == 'imam' ? 'selected' : '' }}
                            value="imam">@lang('site.imam')</option>
                        <option
                            {{ isset($professional) && $professional->profession == 'madrasa_teacher' ? 'selected' : '' }}
                            value="madrasa_teacher">@lang('site.madrasateacher')</option>
                        <option {{ isset($professional) && $professional->profession == 'teacher' ? 'selected' : '' }}
                            value="teacher">@lang('site.generalteacher')</option>
                        <option {{ isset($professional) && $professional->profession == 'Engineer' ? 'selected' : '' }}
                            value="Engineer">@lang('site.engineer')</option>
                        <option
                            {{ isset($professional) && $professional->profession == 'businessman' ? 'selected' : '' }}
                            value="businessman">@lang('site.businessman')</option>
                        <option {{ isset($professional) && $professional->profession == 'govt_Job' ? 'selected' : '' }}
                            value="govt_Job">@lang('site.govtemployee')</option>
                        <option
                            {{ isset($professional) && $professional->profession == 'private_job' ? 'selected' : '' }}
                            value="private_job">@lang('site.privateemployee')</option>
                        <option
                            {{ isset($professional) && $professional->profession == 'freelancer' ? 'selected' : '' }}
                            value="freelancer">@lang('site.freelancer')</option>
                        <option {{ isset($professional) && $professional->profession == 'doctor' ? 'selected' : '' }}
                            value="doctor">@lang('site.doctor')</option>
                        <option
                            {{ isset($professional) && $professional->profession == 'medical_student' ? 'selected' : '' }}
                            value="medical_student">@lang('site.medical_student')</option>
                        <option {{ isset($professional) && $professional->profession == 'student' ? 'selected' : '' }}
                            value="student">@lang('site.student')</option>
                        <option
                            {{ isset($professional) && $professional->profession == 'immigrant' ? 'selected' : '' }}
                            value="immigrant">@lang('site.immigrant')</option>
                        <option {{ isset($professional) && $professional->profession == 'others' ? 'selected' : '' }}
                            value="others">@lang('site.others')</option>
                        <option {{ isset($professional) && $professional->profession == 'jobless' ? 'selected' : '' }}
                            value="jobless">@lang('site.jobless')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.profession_description')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-multi_line_text_area">
                    <textarea id="profession_details" name="profession_details" class="od-field-type__multiline" placeholder="" required >{{ isset($professional) ? $professional->profession_details : '' }}</textarea>
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.profession_details_description')
                    </p>
                </div>
            </div>

            <div class="od-form-group-container" data-visibility="yes" data-field_id="48">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.monthly_income') <span class="od-required-label">*</span> </label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="monthly_income" id="monthly_income" class="od-field-type__textbox"
                        placeholder="@lang('site.2000_taka')"
                        value="{{ isset($professional) ? $professional->monthly_income : '' }}"  required />
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
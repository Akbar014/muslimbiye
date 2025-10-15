<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.commitment')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1' ? route('admin.biodata.commitment') : route('user.edit_biodata.commitment');
        @endphp
        <form action="{{ $routeUrl }}" method="POST"
            class="od-row od-justify-content-spaceBetween">
            @csrf
            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="60">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.parent_knowledge') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select
                        class="od-field-type__selectbox form-control select2 od-profile-field-select-control select2-hidden-accessible"
                        style="width: 100%" id="gurdian_aknowledgement" name="gurdian_aknowledgement" required >
                        <option value="">@lang('site.please_select')</option>
                        <option
                            {{ isset($commitment) && $commitment->gurdian_aknowledgement == 'yes' ? 'selected' : '' }}
                            value="yes">@lang('site.yes')</option>
                        <option
                            {{ isset($commitment) && $commitment->gurdian_aknowledgement == 'no' ? 'selected' : '' }}
                            value="no">@lang('site.no')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="61">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.testify')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select
                        class="od-field-type__selectbox form-control select2 od-profile-field-select-control select2-hidden-accessible"
                        style="width: 100%" id="all_data_valid" name="all_data_valid" required >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($commitment) && $commitment->all_data_valid == 'yes' ? 'selected' : '' }}
                            value="yes">@lang('site.yes')</option>
                        <option {{ isset($commitment) && $commitment->all_data_valid == 'no' ? 'selected' : '' }}
                            value="no">@lang('site.no')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="62">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.not_responsible')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select
                        class="od-field-type__selectbox form-control select2 od-profile-field-select-control select2-hidden-accessible"
                        style="width: 100%" id="responsibility" name="responsibility" required>
                        <option value="">@lang('site.please_select')</option>
                        <option {{ isset($commitment) && $commitment->responsibility == 'yes' ? 'selected' : '' }}
                            value="yes">@lang('site.yes')</option>
                        <option {{ isset($commitment) && $commitment->responsibility == 'no' ? 'selected' : '' }}
                            value="no">@lang('site.no')</option>
                    </select>
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
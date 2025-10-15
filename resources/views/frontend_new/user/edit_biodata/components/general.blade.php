<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.general_info')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1' ? route('admin.biodata.general') : route('user.edit_biodata.general');
        @endphp
        <form action="{{ $routeUrl }}" method="POST" class="od-row od-justify-content-spaceBetween">
            @csrf
            <input type="hidden" name="biodata_type" value="{{ $general->biodata_type }}">
            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.biodata') <span
                            class="od-required-label">*</span></label>
                </div>
                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select
                        class="od-biodata-gender-field od-field-type__selectbox form-control select2 od-profile-field-select-control od-biodata-advanced-count-field select2-hidden-accessible"
                        style="width: 100%" name="bride_groom" id="bride_groom" onchange="formsController(this)">
                        <option value="">@lang('site.please_select')</option>
                        <option value="groom" {{ old('bride_groom') == 'groom' ? 'selected' : '' }}>@lang('site.groom_biodata')
                        </option>
                        <option value="bride" {{ old('bride_groom') == 'bride' ? 'selected' : '' }}>@lang('site.bride_biodata')
                        </option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.marital_status') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select
                        class="od-field-type__selectbox form-control select2 od-profile-field-select-control od-biodata-advanced-count-field select2-hidden-accessible"
                        style="width: 100%" name="marital_status" id="marital_status" onchange="formsController(this)"
                        >
                        <option value="">@lang('site.please_select')</option>
                        <option value="unmarried" {{ old('marital_status') == 'unmarried' ? 'selected' : '' }}>
                            @lang('site.unmarried')</option>
                        <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>
                            @lang('site.married')
                        </option>
                        <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>
                            @lang('site.divorced')
                        </option>
                        <option value="widow" {{ old('marital_status') == 'widow' ? 'selected' : '' }}>
                            @lang('site.widowed')
                        </option>
                        <option value="widower" {{ old('marital_status') == 'widower' ? 'selected' : '' }}>
                            @lang('site.widower')
                        </option>
                    </select>
                </div>
            </div>

            <!--<div class="od-form-group-container required-field">-->
            <!--    <div class="od-form-group-label">-->
            <!--        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.date_of_birth') <span-->
            <!--                class="od-required-label">*</span></label>-->
            <!--    </div>-->
            <!--    <div class="od-form-group-input od-custom-datepicker">-->
            <!--        <input type="text" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"-->
            <!--            class="od-datepicker od-field-type__datepicker" name="birthdate" inputmode="numeric"-->
            <!--            value="{{ isset($general) && $general->birthdate ? \Carbon\Carbon::parse($general->birthdate)->format('d/m/Y') : '' }}"-->
            <!--             />-->
            <!--    </div>-->
            <!--    <div class="od-field-desc od-pt-10">-->
            <!--        <p>-->
            <!--            {!! __('site.original_dob') !!}<br />-->
            <!--        </p>-->
            <!--    </div>-->
            <!--</div>-->
            
            <!--<div class="od-form-group-container required-field">-->
            <!--    <div class="od-form-group-label">-->
            <!--        <label class="text-[1.2rem] md:text-[1rem]">@lang('site.date_of_birth') <span-->
            <!--                class="od-required-label">*</span></label>-->
            <!--    </div>-->

            <!--    <div class="od-form-group-input ">-->
            <!--        <input type="tel" id="birthdate" name="birthdate" inputmode="numeric"-->
            <!--            value="{{ isset($general) && $general->birthdate ? \Carbon\Carbon::parse($general->birthdate)->format('d/m/Y') : '' }}" />-->
            <!--             <input type="date" name="birthdate" class="form-control" value="{{  $general->birthdate }}"  /> -->
                
            <!--    </div>-->

            <!--    <div class="od-field-desc od-pt-10">-->
            <!--        <p>-->
            <!--            {!! __('site.original_dob') !!}<br />-->
            <!--        </p>-->
            <!--    </div>-->
            <!--</div>-->
            
            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.date_of_birth') <span class="od-required-label">*</span></label>
                </div>
            
                <div class="od-form-group-input flex gap-2"> 
                    <input type="number" name="day" class="form-control w-[80px]" placeholder="DD" min="1" max="31"  style="border: 1px solid #80808052; padding-left: 5px; border-radius: 3px;"
                           value="{{ isset($general) ? \Carbon\Carbon::parse($general->birthdate)->day : '' }}" />
            
                    <input type="number" name="month" class="form-control w-[80px]" placeholder="MM" min="1" max="12" style="border: 1px solid #80808052; padding-left: 5px; border-radius: 3px;"
                           value="{{ isset($general) ? \Carbon\Carbon::parse($general->birthdate)->month : '' }}" />
            
                    <input type="number" name="year" class="form-control w-[100px]" placeholder="YYYY" style="border: 1px solid #80808052; padding-left: 5px; border-radius: 3px;"
                           value="{{ isset($general) ? \Carbon\Carbon::parse($general->birthdate)->year : '' }}" />
                </div>
            
                <div class="od-field-desc od-pt-10">
                    <p>{!! __('site.original_dob') !!}<br /></p>
                </div>
            </div>


            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.height') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" id="height" name="height">
                        <option value="">@lang('site.please_select')</option>
                        <option {{ old('height') == '<4' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '<4' ? 'selected' : '' }} value="<4">
                            @lang('site.less_than_4')</option>
                        <option {{ old('height') == '4.0' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.0' ? 'selected' : '' }} value="4">
                            {{ EnToBn("4'") }} </option>
                        <option {{ old('height') == '4.1' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.1' ? 'selected' : '' }} value="4.1">
                            {{ EnToBn("4' 1''") }}</option>
                        <option {{ old('height') == '4.2' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.2' ? 'selected' : '' }} value="4.2">
                            {{ EnToBn("4' 2''") }}</option>
                        <option {{ old('height') == '4.3' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.3' ? 'selected' : '' }} value="4.3">
                            {{ EnToBn("4' 3''") }}</option>
                        <option {{ old('height') == '4.4' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.4' ? 'selected' : '' }} value="4.4">
                            {{ EnToBn("4' 4''") }}</option>
                        <option {{ old('height') == '4.5' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.5' ? 'selected' : '' }} value="4.5">
                            {{ EnToBn("4' 5''") }}</option>
                        <option {{ old('height') == '4.6' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.6' ? 'selected' : '' }} value="4.6">
                            {{ EnToBn("4' 6''") }}</option>
                        <option {{ old('height') == '4.7' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.7' ? 'selected' : '' }} value="4.7">
                            {{ EnToBn("4' 7''") }}</option>
                        <option {{ old('height') == '4.8' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.8' ? 'selected' : '' }} value="4.8">
                            {{ EnToBn("4' 8''") }}</option>
                        <option {{ old('height') == '4.9' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.9' ? 'selected' : '' }} value="4.9">
                            {{ EnToBn("4' 9''") }}</option>
                        <option {{ old('height') == '4.10' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.10' ? 'selected' : '' }} value="4.10">
                            {{ EnToBn("4' 10''") }}</option>
                        <option {{ old('height') == '4.11' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '4.11' ? 'selected' : '' }} value="4.11">
                            {{ EnToBn("4' 11''") }}</option>
                        <option {{ old('height') == '5.0' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.0' ? 'selected' : '' }} value="5">
                            {{ EnToBn("5'") }} </option>
                        <option {{ old('height') == '5.1' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.1' ? 'selected' : '' }} value="5.1">
                            {{ EnToBn("5' 1''") }}</option>
                        <option {{ old('height') == '5.2' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.2' ? 'selected' : '' }} value="5.2">
                            {{ EnToBn("5' 2''") }}</option>
                        <option {{ old('height') == '5.3' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.3' ? 'selected' : '' }} value="5.3">
                            {{ EnToBn("5' 3''") }}</option>
                        <option {{ old('height') == '5.4' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.4' ? 'selected' : '' }} value="5.4">
                            {{ EnToBn("5' 4''") }}</option>
                        <option {{ old('height') == '5.5' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.5' ? 'selected' : '' }} value="5.5">
                            {{ EnToBn("5' 5''") }}</option>
                        <option {{ old('height') == '5.6' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.6' ? 'selected' : '' }} value="5.6">
                            {{ EnToBn("5' 6''") }}</option>
                        <option {{ old('height') == '5.7' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.7' ? 'selected' : '' }} value="5.7">
                            {{ EnToBn("5' 7''") }}</option>
                        <option {{ old('height') == '5.8' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.8' ? 'selected' : '' }} value="5.8">
                            {{ EnToBn("5' 8''") }}</option>
                        <option {{ old('height') == '5.9' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.9' ? 'selected' : '' }} value="5.9">
                            {{ EnToBn("5' 9''") }}</option>
                        <option {{ old('height') == '5.10' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.10' ? 'selected' : '' }} value="5.10">
                            {{ EnToBn("5' 10''") }}</option>
                        <option {{ old('height') == '5.11' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '5.11' ? 'selected' : '' }} value="5.11">
                            {{ EnToBn("5' 11''") }}</option>
                        <option {{ old('height') == '6.0' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.0' ? 'selected' : '' }} value="6">
                            {{ EnToBn("6'") }} </option>
                        <option {{ old('height') == '6.1' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.1' ? 'selected' : '' }} value="6.1">
                            {{ EnToBn("6' 1''") }}</option>
                        <option {{ old('height') == '6.2' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.2' ? 'selected' : '' }} value="6.2">
                            {{ EnToBn("6' 2''") }}</option>
                        <option {{ old('height') == '6.3' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.3' ? 'selected' : '' }} value="6.3">
                            {{ EnToBn("6' 3''") }}</option>
                        <option {{ old('height') == '6.4' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.4' ? 'selected' : '' }} value="6.4">
                            {{ EnToBn("6' 4''") }}</option>
                        <option {{ old('height') == '6.5' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.5' ? 'selected' : '' }} value="6.5">
                            {{ EnToBn("6' 5''") }}</option>
                        <option {{ old('height') == '6.6' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.6' ? 'selected' : '' }} value="6.6">
                            {{ EnToBn("6' 6''") }}</option>
                        <option {{ old('height') == '6.7' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.7' ? 'selected' : '' }} value="6.7">
                            {{ EnToBn("6' 7''") }}</option>
                        <option {{ old('height') == '6.8' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.8' ? 'selected' : '' }} value="6.8">
                            {{ EnToBn("6' 8''") }}</option>
                        <option {{ old('height') == '6.9' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.9' ? 'selected' : '' }} value="6.9">
                            {{ EnToBn("6' 9''") }}</option>
                        <option {{ old('height') == '6.10' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.10' ? 'selected' : '' }} value="6.10">
                            {{ EnToBn("6' 10''") }}</option>
                        <option {{ old('height') == '6.11' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '6.11' ? 'selected' : '' }} value="6.11">
                            {{ EnToBn("6' 11''") }}</option>
                        <option {{ old('height') == '7.0' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '7.0' ? 'selected' : '' }} value="7">
                            {{ EnToBn("7'") }} </option>
                        <option {{ old('height') == '>7' ? 'selected' : '' }}
                            {{ isset($general) && $general->height == '>7' ? 'selected' : '' }} value=">7">
                            @lang('site.more_than_7')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.complexion') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" id="complexion" name="complexion"
                        >
                        <option value="">@lang('site.please_select')</option>
                        <option {{ old('complexion') == 'black' ? 'selected' : '' }}
                            {{ isset($general) && $general->complexion == 'black' ? 'selected' : '' }}
                            value="black">@lang('site.black')</option>
                        <option {{ old('complexion') == 'mediam' ? 'selected' : '' }}
                            {{ isset($general) && $general->complexion == 'mediam' ? 'selected' : '' }}
                            value="mediam">@lang('site.mediam')</option>
                        <option {{ old('complexion') == 'light_mediam' ? 'selected' : '' }}
                            {{ isset($general) && $general->complexion == 'light_mediam' ? 'selected' : '' }}
                            value="light_mediam">@lang('site.light_mediam')</option>
                        <option {{ old('complexion') == 'fair' ? 'selected' : '' }}
                            {{ isset($general) && $general->complexion == 'fair' ? 'selected' : '' }} value="fair">
                            @lang('site.fair')</option>
                        <option {{ old('complexion') == 'bright_fair' ? 'selected' : '' }}
                            {{ isset($general) && $general->complexion == 'bright_fair' ? 'selected' : '' }}
                            value="bright_fair">@lang('site.bright_fair')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">ওজন <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" id="weight" name="weight">
                        <option value="">@lang('site.please_select')</option>
                        <option {{ old('weight') == '<30' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '<30' ? 'selected' : '' }} value="<30">
                            @lang('site.less_than_30')</option>
                        <option {{ old('weight') == '30' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '30' ? 'selected' : '' }} value="30">
                            {{ EnToBn('30') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '31' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '31' ? 'selected' : '' }} value="31">
                            {{ EnToBn('31') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '32' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '32' ? 'selected' : '' }} value="32">
                            {{ EnToBn('32') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '33' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '33' ? 'selected' : '' }} value="33">
                            {{ EnToBn('33') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '34' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '34' ? 'selected' : '' }} value="34">
                            {{ EnToBn('34') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '35' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '35' ? 'selected' : '' }} value="35">
                            {{ EnToBn('35') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '36' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '36' ? 'selected' : '' }} value="36">
                            {{ EnToBn('36') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '37' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '37' ? 'selected' : '' }} value="37">
                            {{ EnToBn('37') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '38' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '38' ? 'selected' : '' }} value="38">
                            {{ EnToBn('38') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '39' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '39' ? 'selected' : '' }} value="39">
                            {{ EnToBn('39') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '40' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '40' ? 'selected' : '' }} value="40">
                            {{ EnToBn('40') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '41' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '41' ? 'selected' : '' }} value="41">
                            {{ EnToBn('41') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '42' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '42' ? 'selected' : '' }} value="42">
                            {{ EnToBn('42') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '43' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '43' ? 'selected' : '' }} value="43">
                            {{ EnToBn('43') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '44' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '44' ? 'selected' : '' }} value="44">
                            {{ EnToBn('44') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '45' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '45' ? 'selected' : '' }} value="45">
                            {{ EnToBn('45') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '46' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '46' ? 'selected' : '' }} value="46">
                            {{ EnToBn('46') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '47' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '47' ? 'selected' : '' }} value="47">
                            {{ EnToBn('47') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '48' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '48' ? 'selected' : '' }} value="48">
                            {{ EnToBn('48') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '49' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '49' ? 'selected' : '' }} value="49">
                            {{ EnToBn('49') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '50' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '50' ? 'selected' : '' }} value="50">
                            {{ EnToBn('50') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '51' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '51' ? 'selected' : '' }} value="51">
                            {{ EnToBn('51') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '52' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '52' ? 'selected' : '' }} value="52">
                            {{ EnToBn('52') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '53' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '53' ? 'selected' : '' }} value="53">
                            {{ EnToBn('53') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '54' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '54' ? 'selected' : '' }} value="54">
                            {{ EnToBn('54') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '55' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '55' ? 'selected' : '' }} value="55">
                            {{ EnToBn('55') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '56' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '56' ? 'selected' : '' }} value="56">
                            {{ EnToBn('56') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '57' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '57' ? 'selected' : '' }} value="57">
                            {{ EnToBn('57') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '58' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '58' ? 'selected' : '' }} value="58">
                            {{ EnToBn('58') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '59' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '59' ? 'selected' : '' }} value="59">
                            {{ EnToBn('59') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '60' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '60' ? 'selected' : '' }} value="60">
                            {{ EnToBn('60') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '61' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '61' ? 'selected' : '' }} value="61">
                            {{ EnToBn('61') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '62' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '62' ? 'selected' : '' }} value="62">
                            {{ EnToBn('62') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '63' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '63' ? 'selected' : '' }} value="63">
                            {{ EnToBn('63') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '64' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '64' ? 'selected' : '' }} value="64">
                            {{ EnToBn('64') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '65' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '65' ? 'selected' : '' }} value="65">
                            {{ EnToBn('65') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '66' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '66' ? 'selected' : '' }} value="66">
                            {{ EnToBn('66') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '67' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '67' ? 'selected' : '' }} value="67">
                            {{ EnToBn('67') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '68' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '68' ? 'selected' : '' }} value="68">
                            {{ EnToBn('68') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '69' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '69' ? 'selected' : '' }} value="69">
                            {{ EnToBn('69') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '70' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '70' ? 'selected' : '' }} value="70">
                            {{ EnToBn('70') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '71' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '71' ? 'selected' : '' }} value="71">
                            {{ EnToBn('71') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '72' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '72' ? 'selected' : '' }} value="72">
                            {{ EnToBn('72') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '73' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '73' ? 'selected' : '' }} value="73">
                            {{ EnToBn('73') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '74' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '74' ? 'selected' : '' }} value="74">
                            {{ EnToBn('74') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '75' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '75' ? 'selected' : '' }} value="75">
                            {{ EnToBn('75') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '76' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '76' ? 'selected' : '' }} value="76">
                            {{ EnToBn('76') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '77' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '77' ? 'selected' : '' }} value="77">
                            {{ EnToBn('77') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '78' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '78' ? 'selected' : '' }} value="78">
                            {{ EnToBn('78') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '79' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '79' ? 'selected' : '' }} value="79">
                            {{ EnToBn('79') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '80' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '80' ? 'selected' : '' }} value="80">
                            {{ EnToBn('80') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '81' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '81' ? 'selected' : '' }} value="81">
                            {{ EnToBn('81') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '82' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '82' ? 'selected' : '' }} value="82">
                            {{ EnToBn('82') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '83' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '83' ? 'selected' : '' }} value="83">
                            {{ EnToBn('83') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '84' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '84' ? 'selected' : '' }} value="84">
                            {{ EnToBn('84') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '85' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '85' ? 'selected' : '' }} value="85">
                            {{ EnToBn('85') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '86' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '86' ? 'selected' : '' }} value="86">
                            {{ EnToBn('86') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '87' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '87' ? 'selected' : '' }} value="87">
                            {{ EnToBn('87') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '88' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '88' ? 'selected' : '' }} value="88">
                            {{ EnToBn('88') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '89' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '89' ? 'selected' : '' }} value="89">
                            {{ EnToBn('89') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '90' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '90' ? 'selected' : '' }} value="90">
                            {{ EnToBn('90') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '91' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '91' ? 'selected' : '' }} value="91">
                            {{ EnToBn('91') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '92' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '92' ? 'selected' : '' }} value="92">
                            {{ EnToBn('92') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '93' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '93' ? 'selected' : '' }} value="93">
                            {{ EnToBn('93') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '94' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '94' ? 'selected' : '' }} value="94">
                            {{ EnToBn('94') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '95' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '95' ? 'selected' : '' }} value="95">
                            {{ EnToBn('95') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '96' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '96' ? 'selected' : '' }} value="96">
                            {{ EnToBn('96') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '97' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '97' ? 'selected' : '' }} value="97">
                            {{ EnToBn('97') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '98' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '98' ? 'selected' : '' }} value="98">
                            {{ EnToBn('98') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '99' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '99' ? 'selected' : '' }} value="99">
                            {{ EnToBn('99') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '100' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '100' ? 'selected' : '' }} value="100">
                            {{ EnToBn('100') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '101' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '101' ? 'selected' : '' }} value="101">
                            {{ EnToBn('101') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '102' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '102' ? 'selected' : '' }} value="102">
                            {{ EnToBn('102') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '103' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '103' ? 'selected' : '' }} value="103">
                            {{ EnToBn('103') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '104' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '104' ? 'selected' : '' }} value="104">
                            {{ EnToBn('104') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '105' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '105' ? 'selected' : '' }} value="105">
                            {{ EnToBn('105') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '106' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '106' ? 'selected' : '' }} value="106">
                            {{ EnToBn('106') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '107' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '107' ? 'selected' : '' }} value="107">
                            {{ EnToBn('107') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '108' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '108' ? 'selected' : '' }} value="108">
                            {{ EnToBn('108') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '109' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '109' ? 'selected' : '' }} value="109">
                            {{ EnToBn('109') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '110' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '110' ? 'selected' : '' }} value="110">
                            {{ EnToBn('110') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '111' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '111' ? 'selected' : '' }} value="111">
                            {{ EnToBn('111') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '112' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '112' ? 'selected' : '' }} value="112">
                            {{ EnToBn('112') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '113' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '113' ? 'selected' : '' }} value="113">
                            {{ EnToBn('113') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '114' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '114' ? 'selected' : '' }} value="114">
                            {{ EnToBn('114') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '115' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '115' ? 'selected' : '' }} value="115">
                            {{ EnToBn('115') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '116' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '116' ? 'selected' : '' }} value="116">
                            {{ EnToBn('116') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '117' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '117' ? 'selected' : '' }} value="117">
                            {{ EnToBn('117') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '118' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '118' ? 'selected' : '' }} value="118">
                            {{ EnToBn('118') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '119' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '119' ? 'selected' : '' }} value="119">
                            {{ EnToBn('119') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '120' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '120' ? 'selected' : '' }} value="120">
                            {{ EnToBn('120') }} @lang('site.kg')</option>
                        <option {{ old('weight') == '>120' ? 'selected' : '' }}
                            {{ isset($general) && $general->weight == '>120' ? 'selected' : '' }} value=">120">
                            @lang('site.more_than_120')</option>
                    </select>
                </div>
            </div>

            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.blood_group') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-drop_down_select_box">
                    <select class="form-control select2" style="width: 100%" id="blood_group" name="blood_group"
                        >
                        <option value="">নির্বাচন করুন</option>
                        <option {{old('blood_group')=='A+'?'selected':''}} {{ isset($general) && $general->blood_group == 'A+' ? 'selected' : '' }} value="A+">A+</option>
                        <option {{old('blood_group')=='A-'?'selected':''}} {{ isset($general) && $general->blood_group == 'A-' ? 'selected' : '' }} value="A-">A-</option>
                        <option {{old('blood_group')=='B+'?'selected':''}} {{ isset($general) && $general->blood_group == 'B+' ? 'selected' : '' }} value="B+">B+</option>
                        <option {{old('blood_group')=='B-'?'selected':''}} {{ isset($general) && $general->blood_group == 'B-' ? 'selected' : '' }} value="B-">B-</option>
                        <option {{old('blood_group')=='AB+'?'selected':''}} {{ isset($general) && $general->blood_group == 'AB+' ? 'selected' : '' }} value="AB+">AB+</option>
                        <option {{old('blood_group')=='AB-'?'selected':''}} {{ isset($general) && $general->blood_group == 'AB-' ? 'selected' : '' }} value="AB-">AB-</option>
                        <option {{old('blood_group')=='O+'?'selected':''}} {{ isset($general) && $general->blood_group == 'O+' ? 'selected' : '' }} value="O+">O+</option>
                        <option {{old('blood_group')=='O-'?'selected':''}} {{ isset($general) && $general->blood_group == 'O-' ? 'selected' : '' }} value="O-">O-</option>
                        <option {{old('blood_group')=='N/A'?'selected':''}} {{ isset($general) && $general->blood_group == 'N/A' ? 'selected' : '' }} value="N/A">@lang('site.dont_know')</option>
                    </select>
                </div>
            </div>
            @include('frontend_new.user.edit_biodata.components.submit')
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--<script type="text/javascript" src="https://muslimbie.com/assets/frontend_new/js/jquery-jquery.inputmask.min.js"></script>-->

<script>
    // $(document).ready(function() {
    //     $('.select2').select2({
    //         placeholder: "@lang('site.please_select')",
    //         allowClear: true
    //     });
    // });
</script>

<!--<script>-->
<!--const input = document.getElementById('birthdate');-->
<!--const mask = "dd/mm/yyyy";-->

<!--// --- Bangla → English digit convert ----->
<!--function bn2en(str) {-->
<!--    const bn = "০১২৩৪৫৬৭৮৯";-->
<!--    const en = "0123456789";-->
<!--    return str.replace(/[০-৯]/g, d => en[bn.indexOf(d)]);-->
<!--}-->

<!--function setCursorPosition(el, pos) {-->
<!--    requestAnimationFrame(() => {-->
<!--        el.setSelectionRange(pos, pos);-->
<!--    });-->
<!--}-->

<!--input.addEventListener("focus", () => {-->
<!--    if (input.value === "") {-->
<!--        input.value = mask;-->
<!--    }-->
<!--    let firstD = input.value.indexOf("d");-->
<!--    if (firstD !== -1) setCursorPosition(input, firstD);-->
<!--});-->

<!--input.addEventListener("beforeinput", (e) => {-->
<!--    if (!/[0-9\u09E6-\u09EF]/.test(e.data) && e.inputType !== "deleteContentBackward") {-->
<!--        e.preventDefault();-->
<!--        return;-->
<!--    }-->

<!--    let start = input.selectionStart;-->
<!--    let valueArr = input.value.split("");-->

<!--    if (e.inputType === "deleteContentBackward") {-->
<!--        let pos = start - 1;-->
<!--        while (pos >= 0 && valueArr[pos] === "/") pos--;-->
<!--        if (pos >= 0) {-->
<!--            valueArr[pos] = mask[pos];-->
<!--            input.value = valueArr.join("");-->
<!--            setCursorPosition(input, pos);-->
<!--        }-->
<!--        e.preventDefault();  -->
<!--    } else {-->
<!--        while (start < mask.length && mask[start] === "/") start++;-->
<!--        if (start < mask.length) {-->
            <!--// --- Bangla digit কে English এ convert করো ----->
<!--            let digit = bn2en(e.data);-->
<!--            valueArr[start] = digit;-->
<!--            input.value = valueArr.join("");-->

            <!--// --- Auto skip logic ----->
<!--            let nextPos = start + 1;-->
<!--            if (nextPos === 2 || nextPos === 5) {-->
<!--                nextPos++;-->
<!--            }-->
<!--            setCursorPosition(input, nextPos);-->
<!--        }-->
<!--        e.preventDefault();-->
<!--    }-->
<!--});-->
<!--</script>-->

<script>
    // ইনপুট ফিল্ড এবং মাস্ক সেটআপ
const input = document.getElementById('birthdate');
const mask = "dd/mm/yyyy";

// --- বাংলা থেকে ইংরেজি ডিজিট কনভার্ট ---
function bn2en(str) {
    const bn = "০১২৩৪৫৬৭৮৯";
    const en = "0123456789";
    return str.replace(/[০-৯]/g, d => en[bn.indexOf(d)]);
}

// --- ইনপুট নরমালাইজ করা ---
function normalizeValue(value) {
    let clean = bn2en(value).replace(/[^0-9]/g, ""); // শুধু ডিজিট রাখে
    let result = mask.split('');
    let digitIndex = 0;

    for (let i = 0; i < mask.length && digitIndex < clean.length; i++) {
        if (mask[i] !== '/') {
            result[i] = clean[digitIndex++];
        }
    }
    return result.join('');
}

// --- কার্সর পজিশন সেট করা ---
function setCursorPosition(el, pos) {
    requestAnimationFrame(() => {
        el.focus();
        try {
            el.setSelectionRange(pos, pos);
        } catch (e) {
            console.warn('Cursor positioning failed:', e);
        }
    });
}

// --- পরবর্তী ভ্যালিড কার্সর পজিশন পাওয়া ---
function getNextCursorPosition(value, start) {
    let pos = start;
    while (pos < mask.length && mask[pos] === "/") pos++;
    return pos < mask.length ? pos : mask.length;
}

// --- মাস্ক ইনিশিয়ালাইজ করা ---
function initMask() {
    if (!input.value || input.value === mask) {
        input.value = mask;
        setCursorPosition(input, 0);
    }
}

// --- ফোকাস ইভেন্ট: কার্সর প্রথম ভ্যালিড পজিশনে ---
input.addEventListener("focus", () => {
    requestAnimationFrame(() => {
        if (input.value === mask) {
            setCursorPosition(input, 0);
        } else {
            let pos = 0;
            for (let i = 0; i < input.value.length; i++) {
                if (input.value[i] === '_' || (mask[i] !== '/' && input.value[i] === mask[i])) {
                    pos = i;
                    break;
                }
            }
            setCursorPosition(input, pos);
        }
    });
});

// --- টাইপিং/ডিলিট লজিক ---
input.addEventListener("beforeinput", (e) => {
    // ক্রস বাটন বা ক্লিয়ার হ্যান্ডলিং
    if (e.inputType === "deleteContentBackward" && input.value === "") {
        e.preventDefault();
        input.value = mask;
        setCursorPosition(input, 0);
        return;
    }

    // শুধু ডিজিট অ্যালাউ (বাংলা/ইংরেজি)
    if (e.data && !/[0-9\u09E6-\u09EF]/.test(e.data)) {
        e.preventDefault();
        return;
    }

    let start = input.selectionStart || 0;
    let valueArr = input.value.split("");

    if (e.inputType === "deleteContentBackward") {
        e.preventDefault();
        let pos = start - 1;
        while (pos >= 0 && valueArr[pos] === "/") pos--;
        if (pos >= 0) {
            valueArr[pos] = mask[pos];
            input.value = valueArr.join("");
            setCursorPosition(input, pos);
        }
    } else if (e.data) {
        e.preventDefault();
        while (start < mask.length && mask[start] === "/") start++;
        if (start < mask.length) {
            let digit = bn2en(e.data);
            valueArr[start] = digit;
            input.value = valueArr.join("");
            let nextPos = getNextCursorPosition(input.value, start + 1);
            setCursorPosition(input, nextPos);
        }
    }
});

// --- পেস্ট ইভেন্ট হ্যান্ডলিং ---
input.addEventListener("paste", (e) => {
    e.preventDefault();
    let pastedData = (e.clipboardData || window.clipboardData).getData("text");
    pastedData = bn2en(pastedData).replace(/[^0-9/]/g, "");
    if (/^\d{0,2}\/?\d{0,2}\/?\d{0,4}$/.test(pastedData)) {
        input.value = normalizeValue(pastedData);
        setCursorPosition(input, input.value.length);
    } else {
        input.value = mask;
        setCursorPosition(input, 0);
    }
});

// --- ইনপুট ক্লিয়ার হ্যান্ডলিং ---
input.addEventListener("input", (e) => {
    // ক্রস বাটন চেক
    if (e.inputType === "deleteContentBackward" && input.value === "") {
        input.value = mask;
        setCursorPosition(input, 0);
        return;
    }

    let cleanValue = bn2en(input.value).replace(/[^0-9/]/g, "");
    if (!/^\d{0,2}\/?\d{0,2}\/?\d{0,4}$/.test(cleanValue)) {
        input.value = mask;
        setCursorPosition(input, 0);
    } else {
        input.value = normalizeValue(input.value);
        let pos = getNextCursorPosition(input.value, input.selectionStart || 0);
        setCursorPosition(input, pos);
    }
});

// --- ব্লার: মাস্ক থাকলে খালি করা ---
input.addEventListener("blur", () => {
    if (input.value === mask || input.value.match(/^[_\/]+$/)) {
        input.value = "";
    }
});

// --- ফলব্যাক: ডিভাইসে সমস্যা হলে টাইপ পরিবর্তন ---
function setupFallback() {
    // Infinix Smart 8 বা অন্যান্য সমস্যাযুক্ত ডিভাইসের জন্য ফলব্যাক
    if (/Infinix|Android/i.test(navigator.userAgent) && !input.value) {
        input.type = "date";
        input.removeEventListener("beforeinput", input.beforeinputHandler);
        input.removeEventListener("paste", input.pasteHandler);
        input.removeEventListener("input", input.inputHandler);
        input.removeEventListener("focus", input.focusHandler);
        input.removeEventListener("blur", input.blurHandler);
    } else {
        initMask();
    }
}

// --- ইভেন্ট হ্যান্ডলার সংরক্ষণ ---
input.beforeinputHandler = input.addEventListener.bind(input, "beforeinput");
input.pasteHandler = input.addEventListener.bind(input, "paste");
input.inputHandler = input.addEventListener.bind(input, "input");
input.focusHandler = input.addEventListener.bind(input, "focus");
input.blurHandler = input.addEventListener.bind(input, "blur");

// --- ইনিশিয়ালাইজ ---
setupFallback();
</script>
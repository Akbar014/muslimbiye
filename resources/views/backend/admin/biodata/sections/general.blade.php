<div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST"
        action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.general') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-row !mt-2 !pl-5">
            <input type="hidden" name="term_1" value="1">
            <input type="hidden" name="term_2" value="2">
            <input type="hidden" name="term_3" value="3">

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.biodata_type'),
                'slug' => 'biodata_type',
                'div_css' => 'col-md-4',
                'input_value' => isset($data) ? $data->general()->biodata_type : '',
                'required' => true,
                'additional' => "onchange='formsController(this)'",
                'input_options' => [
                    'general' => __('site.general'),
                    'deen' => __('site.deendar'),
                ],
            ])
            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.bride_groom'),
                'slug' => 'bride_groom',
                'div_css' => 'col-md-4',
                'input_value' => isset($data) ? $data->general()->bride_groom : '',
                'required' => true,
                'additional' => "onchange='formsController(this)'",
                'input_options' => [
                    'groom' => __('site.groom'),
                    'bride' => __('site.bride'),
                ],
            ])

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.marital_status'),
                'slug' => 'marital_status',
                'div_css' => 'col-md-4',
                'input_value' => isset($data) ? $data->general()->marital_status : '',
                'required' => true,
                // 'additional' => "onchange='formsController(this)'",
                'input_options' => [
                    'unmarried' => __('site.unmarried'),
                    'widow' => __('site.widow'),
                    'divorced' => __('site.divorced'),
                    'married' => __('site.married'),
                ],
            ])



            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.birthdate'),
                'placeholder' => __('site.birthdate'),
                'input_type' => 'date',
                'slug' => 'birthdate',
                'div_css' => 'col-md-4',
                'input_value' => isset($data)
                    ? \Carbon\Carbon::parse($data->general()->birthdate)->format('Y-m-d')
                    : '',
                'required' => true,
            ])


            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.marital_status'),
                'slug' => 'marital_status',
                'div_css' => 'col-md-4',
                'input_value' => isset($data) ? $data->general()->marital_status : '',
                'required' => true,
                // 'additional' => "onchange='formsController(this)'",
                'input_options' => [
                    'unmarried' => __('site.unmarried'),
                    'widow' => __('site.widow'),
                    'divorced' => __('site.divorced'),
                    'married' => __('site.married'),
                ],
            ])

            <div class="col-md-4 !pt-3">
                <div class="d-flex flex-row align-items-center !mb-4">
                    <div class="form-outline flex-fill !mb-0">
                        <label class="form-label" for="form3Example1c">Height<span style="color: red;">*</span></label>
                        <select name="height" class="form-control" required>
                            <option value="">উচ্চতা নির্বাচন করুন</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '<4' ? 'selected' : '' }}
                                value="<4">৪
                                ফুটের কম</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.0' ? 'selected' : '' }}
                                value="4">৪′
                            </option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.1' ? 'selected' : '' }}
                                value="4.1">৪′
                                ১″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.2' ? 'selected' : '' }}
                                value="4.2">৪′
                                ২″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.3' ? 'selected' : '' }}
                                value="4.3">৪′
                                ৩″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.4' ? 'selected' : '' }}
                                value="4.4">৪′
                                ৪″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.5' ? 'selected' : '' }}
                                value="4.5">৪′
                                ৫″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.6' ? 'selected' : '' }}
                                value="4.6">৪′
                                ৬″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.7' ? 'selected' : '' }}
                                value="4.7">৪′
                                ৭″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.8' ? 'selected' : '' }}
                                value="4.8">৪′
                                ৮″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.9' ? 'selected' : '' }}
                                value="4.9">৪′
                                ৯″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.10' ? 'selected' : '' }}
                                value="4.10">৪′
                                ১০″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '4.11' ? 'selected' : '' }}
                                value="4.11">৪′
                                ১১″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.0' ? 'selected' : '' }}
                                value="5">৫′
                            </option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.1' ? 'selected' : '' }}
                                value="5.1">৫′
                                ১″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.2' ? 'selected' : '' }}
                                value="5.2">৫′
                                ২″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.3' ? 'selected' : '' }}
                                value="5.3">৫′
                                ৩″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.4' ? 'selected' : '' }}
                                value="5.4">৫′
                                ৪″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.5' ? 'selected' : '' }}
                                value="5.5">৫′
                                ৫″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.6' ? 'selected' : '' }}
                                value="5.6">৫′
                                ৬″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.7' ? 'selected' : '' }}
                                value="5.7">৫′
                                ৭″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.8' ? 'selected' : '' }}
                                value="5.8">৫′
                                ৮″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.9' ? 'selected' : '' }}
                                value="5.9">৫′
                                ৯″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.10' ? 'selected' : '' }}
                                value="5.10">৫′
                                ১০″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '5.11' ? 'selected' : '' }}
                                value="5.11">৫′
                                ১১″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.0' ? 'selected' : '' }}
                                value="6">৬′
                            </option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.1' ? 'selected' : '' }}
                                value="6.1">৬′
                                ১″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.2' ? 'selected' : '' }}
                                value="6.2">৬′
                                ২″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.3' ? 'selected' : '' }}
                                value="6.3">৬′
                                ৩″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.4' ? 'selected' : '' }}
                                value="6.4">৬′
                                ৪″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.5' ? 'selected' : '' }}
                                value="6.5">৬′
                                ৫″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.6' ? 'selected' : '' }}
                                value="6.6">৬′
                                ৬″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.7' ? 'selected' : '' }}
                                value="6.7">৬′
                                ৭″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.8' ? 'selected' : '' }}
                                value="6.8">৬′
                                ৮″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.9' ? 'selected' : '' }}
                                value="6.9">৬′
                                ৯″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.10' ? 'selected' : '' }}
                                value="6.10">৬′
                                ১০″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '6.11' ? 'selected' : '' }}
                                value="6.11">৬′
                                ১১″</option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '7.0' ? 'selected' : '' }}
                                value="7">৭′
                            </option>
                            <option
                                {{ isset($data) && $data->general() != null && $data->general()->height == '>7' ? 'selected' : '' }}
                                value=">7">৭
                                ফুটের বেশি</option>
                        </select>
                        @error('height')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4 !pt-3">
                <div class="d-flex flex-row align-items-center !mb-4">
                    <div class="form-outline flex-fill !mb-0">
                        <label class="form-label" for="form3Example1c">Complexion</label>
                        <select type="text" name="complexion"
                            value="{{ isset($data) && $data->general()->complexion }}" class="form-control">
                            <option value="">গাত্রবর্ণ নির্বাচন করুন</option>
                            <option
                                {{ (isset($data) && $data->general()->complexion == 'bright_fair') || old('complexion') == 'bright_fair' ? 'selected' : '' }}
                                value="bright_fair">উজ্জ্বল ফর্সা</option>
                            <option
                                {{ (isset($data) && $data->general()->complexion == 'fair') || old('complexion') == 'fair' ? 'selected' : '' }}
                                value="fair">ফর্সা</option>
                            <option
                                {{ (isset($data) && $data->general()->complexion == 'light_mediam') || old('complexion') == 'light_mediam' ? 'selected' : '' }}
                                value="light_mediam">উজ্জ্বল শ্যামলা</option>
                            <option
                                {{ (isset($data) && $data->general()->complexion == 'mediam') || old('complexion') == 'mediam' ? 'selected' : '' }}
                                value="mediam">শ্যামলা</option>
                            <option
                                {{ (isset($data) && $data->general()->complexion == 'black') || old('complexion') == 'black' ? 'selected' : '' }}
                                value="black">কালো</option>
                        </select>
                        @error('complexion')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4 !pt-3">
                <div class="d-flex flex-row align-items-center !mb-4">
                    <div class="form-outline flex-fill !mb-0">
                        <label class="form-label" for="form3Example1c">Weight<span style="color: red;">*</span></label>
                        <input type="number" placeholder="KG only" name="weight"
                            value="{{ isset($data) ? $data->general()->weight : '' }}" class="form-control"
                            min="30" max="130" required />
                        @error('presentAddress')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4 !pt-3">
                <div class="d-flex flex-row align-items-center !mb-4">
                    <div class="form-outline flex-fill !mb-0">
                        <label class="form-label" for="bloodGroup">Blood Group</label>
                        <select class="form-control" name="blood_group" id="bloodGroup">
                            <option {{ isset($data) && $data->general()->blood_group == 'A+' ? 'selected' : '' }}
                                value="A+">A+
                            </option>
                            <option {{ isset($data) && $data->general()->blood_group == 'A-' ? 'selected' : '' }}
                                value="A-">A-
                            </option>
                            <option {{ isset($data) && $data->general()->blood_group == 'O+' ? 'selected' : '' }}
                                value="O+">O+
                            </option>
                            <option {{ isset($data) && $data->general()->blood_group == 'O-' ? 'selected' : '' }}
                                value="O-">O-
                            </option>
                            <option {{ isset($data) && $data->general()->blood_group == 'B+' ? 'selected' : '' }}
                                value="B+">B+
                            </option>
                            <option {{ isset($data) && $data->general()->blood_group == 'B-' ? 'selected' : '' }}
                                value="B-">B-
                            </option>
                            <option {{ isset($data) && $data->general()->blood_group == 'AB+' ? 'selected' : '' }}
                                value="AB+">AB+
                            </option>
                            <option {{ isset($data) && $data->general()->blood_group == 'AB-' ? 'selected' : '' }}
                                value="AB-">AB-
                            </option>
                        </select>

                    </div>
                </div>
            </div>
            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'general'])
        </div>
    </form>
</div>

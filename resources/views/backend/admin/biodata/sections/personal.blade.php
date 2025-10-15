<div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.personal') }}"
        enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-row !mt-2 !pl-5">
            @if (isset($data) && $data->general()->biodata_type == 'deen')
                @if (isset($data) && $data->general()->bride_groom == 'bride')
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.outside_dress'),
                        'placeholder' => __('site.outside_dress'),
                        'slug' => 'dressup',
                        'div_css' => 'col-md-12 bride_groom_bride_open',
                        'input_value' => isset($data) ? $data->personal()->dressup : '',
                        'required' => true,
                    ])
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.veiled_niqab'),
                        'placeholder' => __('site.about_3_years'),
                        'slug' => 'niqab_info',
                        'div_css' => 'col-md-12 bride_groom_bride_open',
                        'input_value' => isset($data) ? $data->personal()->niqab_info : '',
                        'required' => true,
                    ])
                @endif


                @if (isset($data) && $data->general()->bride_groom == 'groom')
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.beard_when'),
                        'placeholder' => __('site.beard_when'),
                        'slug' => 'beard_info',
                        'div_css' => 'col-md-12 bride_groom_groom_open',
                        'input_value' => isset($data) ? $data->personal()->beard_info : '',
                        'required' => true,
                    ])
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.takhnu'),
                        'placeholder' => __('site.takhnu'),
                        'slug' => 'above_ankle_info',
                        'div_css' => 'col-md-12 bride_groom_groom_open',
                        'input_value' => isset($data) ? $data->personal()->above_ankle_info : '',
                        'required' => true,
                    ])
                @endif
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.prayer'),
                    'placeholder' => __('site.prayer'),
                    'slug' => 'namaz_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->namaz_info : '',
                    'required' => true,
                ])
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.kaza_prayer'),
                    'placeholder' => __('site.kaza_prayer'),
                    'slug' => 'namaz_waqt_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->namaz_waqt_info : '',
                    'required' => true,
                ])
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.b_veil'),
                    'placeholder' => __('site.b_veil'),
                    'slug' => 'mahram_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->mahram_info : '',
                    'required' => true,
                ])
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.b_recite_quran_correctly'),
                    'placeholder' => __('site.b_recite_quran_correctly'),
                    'slug' => 'quran_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->quran_info : '',
                    'required' => true,
                ])

                @include('backend.layouts.components.inputs.select', [
                    'title' => __('site.custom_madhhab'),
                    'slug' => 'fiqh_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->family()->fiqh_info : '',
                    'required' => true,
                    'input_options' => [
                        '' => __('site.please_select'),
                        'hanafi' => __('site.hanafi'),
                        'maliki' => __('site.maliki'),
                        'shafie' => __('site.shafie'),
                        'hambali' => __('site.hambali'),
                        'ahle_hadis' => __('site.ahle_hadis'),
                    ],
                    // 'additional' => "onchange='formsController(this)'",
                ])

                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.movie_serial'),
                    'placeholder' => __('site.movie_serial'),
                    'slug' => 'enternainment_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->enternainment_info : '',
                    'required' => true,
                ])
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.physical_mental_issue'),
                    'placeholder' => __('site.physical_mental_issue'),
                    'slug' => 'disablity_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->disablity_info : '',
                    'required' => true,
                ])
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.deen_mehnat'),
                    'placeholder' => __('site.deen_mehnat'),
                    'slug' => 'deen_mehnot_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->deen_mehnot_info : '',
                    'required' => true,
                ])
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.mazar'),
                    'placeholder' => __('site.mazar'),
                    'slug' => 'mazar_concept_info',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->mazar_concept_info : '',
                    'required' => true,
                ])
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.islami_books'),
                    'placeholder' => __('site.islami_books'),
                    'slug' => 'islami_books',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->islami_books : '',
                    'required' => true,
                ])
                @include('backend.layouts.components.inputs.input', [
                    'title' => __('site.alems'),
                    'placeholder' => __('site.alems'),
                    'slug' => 'favourite_alem',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->favourite_alem : '',
                    'required' => true,
                ])

                @include('backend.layouts.components.inputs.textarea', [
                    'title' => __('site.conversion_story'),
                    'placeholder' => __('site.conversion_story'),
                    'slug' => 'become_muslim',
                    'div_css' => 'col-md-12',
                    'input_value' => isset($data) ? $data->personal()->become_muslim : '',
                    'required' => true,
                ])

            @endif
            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.category_select'),
                'slug' => 'person_category',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? json_decode($data->personal()->person_category ?? []) : [],
                'required' => true,
                'multiple' => true,
                'input_options' => [
                    // '' => __('site.please_select'),
                    'physical_disabled' => __('site.physical_disabled'),
                    'infertile' => __('site.infertile'),
                    'new' => __('site.new'),
                    'orphan' => __('site.orphan'),
                    'masna' => __('site.masna'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])


            @include('backend.layouts.components.inputs.textarea', [
                'title' => __('site.conversion_story'),
                'placeholder' => __('site.conversion_story'),
                'slug' => 'become_muslim',
                'div_css' => 'col-md-12',
                'style' => 'display: none',
                'mainSectionId' => 'new_details',
                'input_value' => isset($data) ? $data->personal()->become_muslim : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.textarea', [
                'title' => __('site.your_hobbies'),
                'placeholder' => __('site.your_hobbies'),
                'slug' => 'hobby',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->personal()->hobby : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.bride_groom_phone_number'),
                'placeholder' => __('site.bride_groom_phone_number'),
                'slug' => 'phone_number',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->personal()->phone_number : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.file', [
                'title' => __('site.grooms_photo'),
                'placeholder' => __('site.grooms_photo'),
                'slug' => 'photo',
                'div_css' => 'col-md-12',
                'file_accept' => 'image/*',
                'previous_file' => isset($data) ? asset('storage/app/public/' . $data->personal()->photo) : null,
                'required' => true,
            ])
            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'personal'])
        </div>
    </form>
</div>

<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.education') }}"
        enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-row !mt-2 !pl-5">

            @include('backend.layouts.components.inputs.select', [
                'title' => 'আপনার শিক্ষা মাধ্যম',
                'slug' => 'education_medium',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->education()->education_medium : '',
                'required' => true,
                'style' => 'display:none',
                'input_options' => [
                    'general' => 'জেনারেল',
                    'qawmi' => 'কওমী',
                    'alia' => 'আলিয়া',
                ],
            ])


            @include('backend.layouts.components.inputs.select', [
                'title' => 'সর্বোচ্চ শিক্ষাগত যোগ্যতা',
                'slug' => 'general_highest_education',
                'div_css' => 'col-md-12 education_medium_general_open education_medium_alia_open',
                'input_value' => isset($data) ? $data->education()->general_highest_education : '',
                'required' => true,
                'input_options' => [
                    'below_ssc' => "এস.এস.সি'র নিচে",
                    'ssc' => 'এস.এস.সি',
                    'hsc' => 'এইচ.এস.সি',
                    'diploma_running' => 'ডিপ্লোমা চলমান',
                    'diploma' => 'ডিপ্লোমা',
                    'honors_running' => 'স্নাতক চলমান',
                    'honors' => 'স্নাতক',
                    'masters' => 'স্নাতকোত্তর',
                    'doctorate' => 'ডক্টরেট',
                ],
                'additional' => "onchange='formsController(this)'",
            ])


            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => 'আপনি কোন ক্লাস পর্যন্ত পড়াশুনা করেছেন?',
                'slug' => 'general_highest_school_study',
                'div_css' => 'col-md-12 general_highest_education_below_ssc_open',
                'input_value' => isset($data) ? $data->education()->general_highest_school_study : '',
                'required' => true,
                'input_options' => [
                    '10' => '১০ম',
                    '9' => '৯ম',
                    '8' => '৮ম',
                    '7' => '৭ম',
                    '6' => '৬ষ্ঠ',
                    '5' => '৫ম',
                    '4' => '৪র্থ',
                    '3' => '৩য়',
                    '2' => '২য়',
                    '1' => '১ম',
                ],
            ])


            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => 'এস.এস.সি / দাখিল / সমমান পাসের সন',
                'placeholder' => 'এস.এস.সি / দাখিল / সমমান পাসের সন',
                'slug' => 'ssc_year',
                'div_css' =>
                    'col-md-4 general_highest_education_ssc_open general_highest_education_hsc_open general_highest_education_diploma_running_open general_highest_education_diploma_open general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->ssc_year : '',
                'required' => true,
            ])


            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => 'বিভাগ',
                'slug' => 'ssc_dept',
                'div_css' =>
                    'col-md-4 general_highest_education_ssc_open general_highest_education_hsc_open general_highest_education_diploma_running_open general_highest_education_diploma_open general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->ssc_dept : '',
                'required' => true,
                'input_options' => [
                    'science' => 'বিজ্ঞান বিভাগ',
                    'business_studies' => 'ব্যবসা বিভাগ',
                    'humanities' => 'মানবিক বিভাগ',
                    'vocational' => 'ভোকেশনাল',
                ],
            ])


            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => 'ফলাফল',
                'slug' => 'ssc_result',
                'div_css' =>
                    'col-md-4 general_highest_education_ssc_open general_highest_education_hsc_open general_highest_education_diploma_running_open general_highest_education_diploma_open general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->ssc_result : '',
                'required' => true,
                'input_options' => [
                    'all_A+' => 'A+ (All Subjects)',
                    'A+' => 'A+',
                    'A' => 'A',
                    'A-' => 'A-',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                ],
            ])


            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => 'এইচ.এস.সি / আলিম / সমমান কোন বর্ষে পড়ছেন ?',
                'slug' => 'hsc_study_running',
                'div_css' => 'col-md-12 general_highest_education_ssc_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->hsc_study_running : '',
                'required' => true,
                'input_options' => [
                    'hsc_1st' => 'HSC প্রথম বর্ষ',
                    'hsc_2nd' => 'HSC দ্বিতীয় বর্ষ',
                    'hsc_no_result' => 'এখনো HSC রেজাল্ট দেয় নি',
                    'ssc_only' => 'SSC এর পর আর পড়াশোনা করা হয় নি',
                ],
            ])


            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => 'SSC পরে কোন মাধ্যমে পড়াশুনা করেছেন?',
                'slug' => 'study_after_ssc',
                'div_css' =>
                    'col-md-12 general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->study_after_ssc : '',
                'required' => true,
                'input_options' => [
                    'hsc' => 'HSC',
                    'diploma' => 'ডিপ্লোমা',
                ],
                'additional' => "onchange='formsController(this)'",
            ])




            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => 'এইচ.এস.সি / আলিম / সমমান পাসের সন',
                'placeholder' => 'এইচ.এস.সি / আলিম / সমমান পাসের সন',
                'slug' => 'hsc_pass_year',
                'div_css' =>
                    'col-md-4 general_highest_education_hsc_open study_after_ssc_hsc_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->hsc_pass_year : '',
                'required' => true,
            ])


            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => 'বিভাগ',
                'slug' => 'hsc_dept',
                'div_css' =>
                    'col-md-4 general_highest_education_hsc_open !mb-4 study_after_ssc_hsc_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->hsc_dept : '',
                'required' => true,
                'input_options' => [
                    'science' => 'বিজ্ঞান বিভাগ',
                    'business_studies' => 'ব্যবসা বিভাগ',
                    'humanities' => 'মানবিক বিভাগ',
                    'vocational' => 'ভোকেশনাল',
                ],
            ])


            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => 'ফলাফল',
                'slug' => 'hsc_result',
                'div_css' =>
                    'col-md-4 general_highest_education_hsc_open !mb-4 study_after_ssc_hsc_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->hsc_result : '',
                'required' => true,
                'input_options' => [
                    'all_A+' => 'A+ (All Subjects)',
                    'A+' => 'A+',
                    'A' => 'A',
                    'A-' => 'A-',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                ],
            ])


            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => 'ডিপ্লোমা কোন বিষয়ে পড়েছেন?',
                'placeholder' => 'ডিপ্লোমা ইন টেক্সটাইল ইঞ্জিনিয়ারিং',
                'slug' => 'diploma_subject',
                'div_css' =>
                    'col-md-12 general_highest_education_diploma_running_open general_highest_education_diploma_open study_after_ssc_diploma_open !mb-4 education_medium_close',
                'input_value' => isset($data) ? $data->education()->diploma_subject : '',
                'required' => true,
            ])


            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => 'ডিপ্লোমা শিক্ষাপ্রতিষ্ঠানের নাম',
                'placeholder' => 'ঢাকা পলিটেকনিক ইনস্টিটিউট',
                'slug' => 'diploma_institution',
                'div_css' =>
                    'col-md-12 general_highest_education_diploma_running_open general_highest_education_diploma_open study_after_ssc_diploma_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->diploma_institution : '',
                'required' => true,
            ])


            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => 'এখন কোন বর্ষে পড়ছেন?',
                'placeholder' => 'এখন কোন বর্ষে পড়ছেন?',
                'slug' => 'diploma_current_year',
                'div_css' => 'col-md-12 general_highest_education_diploma_running_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->diploma_current_year : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.passing_year'),
                'placeholder' => __('site.passing_year'),
                'slug' => 'diploma_passing_year',
                'div_css' =>
                    'col-md-12 general_highest_education_diploma_open study_after_ssc_diploma_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->diploma_passing_year : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.graduate_subject'),
                'placeholder' => __('site.graduate_subject'),
                'slug' => 'honors_subject',
                'div_css' =>
                    'col-md-12 general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->honors_subject : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.institute_name'),
                'placeholder' => __('site.institute_name'),
                'slug' => 'honors_instutution',
                'div_css' =>
                    'col-md-12 general_highest_education_honors_running_open general_highest_education_honors_open general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->honors_instutution : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.passing_year'),
                'placeholder' => __('site.passing_year'),
                'slug' => 'honors_passing_year',
                'div_css' =>
                    'col-md-12 general_highest_education_honors_open general_highest_education_masters_open education_medium_close general_highest_education_doctorate_open',
                'input_value' => isset($data) ? $data->education()->honors_passing_year : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.study_now'),
                'placeholder' => __('site.study_now'),
                'slug' => 'honors_study_year',
                'div_css' => 'col-md-12 general_highest_education_honors_running_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->honors_study_year : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.kamil_subject'),
                'placeholder' => __('site.kamil_subject'),
                'slug' => 'masters_subject',
                'div_css' =>
                    'col-md-12 general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->masters_subject : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.institute_name'),
                'placeholder' => __('site.institute_name'),
                'slug' => 'masters_institution',
                'div_css' =>
                    'col-md-12 general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->masters_institution : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.passing_year'),
                'placeholder' => __('site.passing_year'),
                'slug' => 'masters_passing_year',
                'div_css' =>
                    'col-md-12 general_highest_education_masters_open general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->masters_passing_year : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.doctorate_subject'),
                'placeholder' => __('site.doctorate_subject'),
                'slug' => 'doctorate_passing_year',
                'div_css' => 'col-md-12 general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->doctorate_passing_year : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.institute_name'),
                'placeholder' => __('site.institute_name'),
                'slug' => 'doctorate_institution',
                'div_css' => 'col-md-12 general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->doctorate_institution : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.passing_year'),
                'placeholder' => __('site.passing_year'),
                'slug' => 'doctorate_passing_year',
                'div_css' => 'col-md-12 general_highest_education_doctorate_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->doctorate_passing_year : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => __('site.highest_educational_qualification'),
                'placeholder' => __('site.highest_educational_qualification'),
                'slug' => 'qawmi_education_qualification',
                'div_css' => 'col-md-12 education_medium_qawmi_open',
                'input_value' => isset($data) ? $data->education()->qawmi_education_qualification : '',
                'required' => true,
                'additional' => "onchange='formsController(this)'",
                'input_options' => [
                    'primary_deen' => __('site.primary_deen'),
                    'ibtedai' => __('site.ibtedai'),
                    'mutawassitah' => __('site.mutawassitah'),
                    'sanabia_ulya' => __('site.sanabia_ulya'),
                    'fazilat' => __('site.fazilat'),
                    'takmil' => __('site.takmil'),
                    'takhassus' => __('site.takhassus'),
                ],
            ])

            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.ibtedai_madrasa'),
                'placeholder' => __('site.ibtedai_madrasa'),
                'slug' => 'ibtedai_madrasa',
                'div_css' => 'col-md-12 qawmi_education_qualification_ibtedai_open',
                'input_value' => isset($data) ? $data->education()->ibtedai_madrasa : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.mutawassitah_madrasa'),
                'placeholder' => __('site.mutawassitah_madrasa'),
                'slug' => 'mutawassitah_madrasa',
                'div_css' => 'col-md-12 qawmi_education_qualification_mutawassitah_open',
                'input_value' => isset($data) ? $data->education()->mutawassitah_madrasa : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.sanabia_ulya_madrasa'),
                'placeholder' => __('site.sanabia_ulya_madrasa'),
                'slug' => 'sanabia_ulya_madrasa',
                'div_css' => 'col-md-12 qawmi_education_qualification_sanabia_ulya_open',
                'input_value' => isset($data) ? $data->education()->sanabia_ulya_madrasa : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.fazilat_madrasa'),
                'placeholder' => __('site.fazilat_madrasa'),
                'slug' => 'fazilat_madrasa',
                'div_css' => 'col-md-12 qawmi_education_qualification_fazilat_open',
                'input_value' => isset($data) ? $data->education()->fazilat_madrasa : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.takmil_madrasa'),
                'placeholder' => __('site.takmil_madrasa'),
                'slug' => 'takmil_madrasa',
                'div_css' =>
                    'col-md-12 qawmi_education_qualification_takmil_open qawmi_education_qualification_takhassus_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->takmil_madrasa : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => __('site.result'),
                'placeholder' => __('site.result'),
                'slug' => 'qawmi_result',
                'div_css' =>
                    'col-md-12 qawmi_education_qualification_ibtedai_open qawmi_education_qualification_mutawassitah_open qawmi_education_qualification_sanabia_ulya_open qawmi_education_qualification_fazilat_open qawmi_education_qualification_takmil_open qawmi_education_qualification_takhassus_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->qawmi_result : '',
                'required' => true,
                'input_options' => [
                    'mumtaz' => __('site.mumtaz'),
                    'zayed_ziddan' => __('site.zayed_ziddan'),
                    'mutawassitah' => __('site.mutawassitah'),
                    'zayed' => __('site.zayed'),
                    'makbul' => __('site.makbul'),
                ],
            ])


            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.passing_year'),
                'placeholder' => __('site.passing_year'),
                'slug' => 'qawmi_passing_year',
                'div_css' =>
                    'col-md-12 qawmi_education_qualification_ibtedai_open qawmi_education_qualification_mutawassitah_open qawmi_education_qualification_sanabia_ulya_open qawmi_education_qualification_fazilat_open qawmi_education_qualification_takmil_open qawmi_education_qualification_takhassus_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->qawmi_passing_year : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.takhassus_madrasa') . ' ' . __('site.name'),
                'placeholder' => __('site.takhassus_madrasa') . ' ' . __('site.name'),
                'slug' => 'takhassus_madrasa',
                'div_css' => 'col-md-12 qawmi_education_qualification_takhassus_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->takhassus_madrasa : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.takhassus_subject'),
                'placeholder' => __('site.takhassus_subject'),
                'slug' => 'takhassus_subject',
                'div_css' => 'col-md-12 qawmi_education_qualification_takhassus_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->takhassus_subject : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => __('site.result'),
                'placeholder' => __('site.result'),
                'slug' => 'takhassus_result',
                'div_css' => 'col-md-12 qawmi_education_qualification_takhassus_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->takhassus_result : '',
                'required' => true,
                'additional' => "onchange='formsController(this)'",
                'input_options' => [
                    'mumtaz' => __('site.mumtaz'),
                    'zayed_ziddan' => __('site.zayed_ziddan'),
                    'mutawassitah' => __('site.mutawassitah'),
                    'zayed' => __('site.zayed'),
                    'makbul' => __('site.makbul'),
                ],
            ])

            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.passing_year'),
                'placeholder' => __('site.passing_year'),
                'slug' => 'takhassus_passing_year',
                'div_css' => 'col-md-12 qawmi_education_qualification_takhassus_open education_medium_close',
                'input_value' => isset($data) ? $data->education()->takhassus_passing_year : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.input', [
                'style' => 'display:none',
                'title' => __('site.others_educational_qualifications'),
                'placeholder' => __('site.others_educational_qualifications'),
                'slug' => 'others_educational_qualifications',
                'div_css' =>
                    'col-md-12 education_medium_general_open education_medium_qawmi_open education_medium_alia_open',
                'input_value' => isset($data) ? $data->education()->others_educational_qualifications : '',
                'required' => true,
            ])


            @include('backend.layouts.components.inputs.select', [
                'style' => 'display:none',
                'title' => __('site.deen_titles'),
                'placeholder' => __('site.deen_titles'),
                'slug' => 'deen_designations',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->education()->deen_designations : '',
                'required' => true,
            
                'input_options' => [
                    '' => __('site.please_select'),
                    'hafiz' => __('site.hafiz'),
                    'mawlana' => __('site.mawlana'),
                    'mufti' => __('site.mufti'),
                    'mufassir' => __('site.mufassir'),
                    'adib' => __('site.adib'),
                ],
            ])







            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'education'])




        </div>
    </form>
</div>
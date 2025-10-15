<div class="tab-pane fade" id="marrage" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.marrage') }}"
        enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-row !mt-2 !pl-5">

            <div id="for_groom" class="bride_groom_groom_open col-12" style="display: none;">
                <div class="form-row">
                    @include('backend.layouts.components.inputs.textarea', [
                        'title' => __('site.wife_died'),
                        'placeholder' => __('site.wife_died'),
                        'slug' => 'wife_died_reason',
                        'style' => 'display: none',
                        'div_css' => 'col-md-12 marital_status_widower_open',
                        'input_value' => isset($data) ? $data->marrage()->wife_died_reason : '',
                        'required' => true,
                    ])

                    @include('backend.layouts.components.inputs.textarea', [
                        'title' => __('site.married_again'),
                        'placeholder' => __('site.married_again'),
                        'slug' => 'why_marry_after_marrage',
                        'style' => 'display: none',
                        'div_css' => 'col-md-12 marital_status_married_open',
                        'input_value' => isset($data) ? $data->marrage()->why_marry_after_marrage : '',
                        'required' => true,
                    ])


                    @include('backend.layouts.components.inputs.textarea', [
                        'title' => __('site.current_wife_and_childrens'),
                        'placeholder' => __('site.current_wife_and_childrens'),
                        'slug' => 'wife_and_childrens',
                        'style' => 'display: none',
                        'div_css' => 'col-md-12 marital_status_married_open',
                        'input_value' => isset($data) ? $data->marrage()->wife_and_childrens : '',
                        'required' => true,
                    ])


                    @if (isset($data) && $data->general()->biodata_type == 'deen')
                        @include('backend.layouts.components.inputs.input', [
                            'title' => __('site.wife_veil'),
                            'placeholder' => __('site.wife_veil'),
                            'slug' => 'wife_cover',
                            'div_css' => 'col-md-12',
                            'input_value' => isset($data) ? $data->marrage()->wife_cover : '',
                            'required' => true,
                        ])
                    @endif


                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.wife_study'),
                        'placeholder' => __('site.wife_study'),
                        'slug' => 'wife_study',
                        'div_css' => 'col-md-12',
                        'input_value' => isset($data) ? $data->marrage()->wife_study : '',
                        'required' => true,
                    ])
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.wife_work'),
                        'placeholder' => __('site.wife_work'),
                        'slug' => 'wife_job',
                        'div_css' => 'col-md-12',
                        'input_value' => isset($data) ? $data->marrage()->wife_job : '',
                        'required' => true,
                    ])
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.wife_take'),
                        'placeholder' => __('site.wife_take'),
                        'slug' => 'where_live',
                        'div_css' => 'col-md-12',
                        'input_value' => isset($data) ? $data->marrage()->where_live : '',
                        'required' => true,
                    ])

                    @if (isset($data) && $data->general()->biodata_type == 'deen')
                        @include('backend.layouts.components.inputs.input', [
                            'title' => __('site.wife_gift'),
                            'placeholder' => __('site.wife_gift'),
                            'slug' => 'expectetions_from_wife',
                            'div_css' => 'col-md-12',
                            'input_value' => isset($data) ? $data->marrage()->expectetions_from_wife : '',
                            'required' => true,
                        ])
                    @endif
                </div>
            </div>

            <div id="for_bride" class="bride_groom_bride_open col-12" style="display: none;">
                <div class="form-row">
                    @include('backend.layouts.components.inputs.textarea', [
                        'title' => __('site.hasband_died'),
                        'placeholder' => __('site.hasband_died'),
                        'slug' => 'husband_died_reason',
                        'div_css' => 'col-md-12 bride_groom_bride_open',
                        'style' => 'display: none',
                        'input_value' => isset($data) ? $data->marrage()->husband_died_reason : '',
                        'required' => true,
                    ])
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.interested_to_work_after_marrage'),
                        'placeholder' => __('site.interested_to_work_after_marrage'),
                        'slug' => 'job_interested',
                        'div_css' => 'col-md-12',
                        'input_value' => isset($data) ? $data->marrage()->job_interested : '',
                        'required' => true,
                    ])
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.study_after_marrage'),
                        'placeholder' => __('site.study_after_marrage'),
                        'slug' => 'continue_study',
                        'div_css' => 'col-md-12',
                        'input_value' => isset($data) ? $data->marrage()->continue_study : '',
                        'required' => true,
                    ])
                    @include('backend.layouts.components.inputs.input', [
                        'title' => __('site.work_after_marrage'),
                        'placeholder' => __('site.work_after_marrage'),
                        'slug' => 'continue_job',
                        'div_css' => 'col-md-12',
                        'input_value' => isset($data) ? $data->marrage()->continue_job : '',
                        'required' => true,
                    ])
                </div>
            </div>


            @include('backend.layouts.components.inputs.textarea', [
                'title' => __('site.divorce_reason'),
                'placeholder' => __('site.divorce_reason'),
                'slug' => 'marrage_divorce_date_reason',
                'style' => 'display: none',
                'div_css' => 'col-md-12 marital_status_divorced_open',
                'input_value' => isset($data) ? $data->marrage()->marrage_divorce_date_reason : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.parent_agree'),
                'placeholder' => __('site.parent_agree'),
                'slug' => 'guardian_accept',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->marrage()->guardian_accept : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.textarea', [
                'title' => __('site.thought_marrage'),
                'placeholder' => __('site.thought_marrage'),
                'slug' => 'marrage_concept',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->marrage()->marrage_concept : '',
                'required' => true,
            ])

            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'marrage'])

        </div>
    </form>
</div>

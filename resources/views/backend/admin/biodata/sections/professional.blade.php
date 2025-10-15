<div class="tab-pane fade" id="professional" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.professional') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-row !mt-2 !pl-5">

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.profession'),
                'slug' => 'profession',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->professional()->profession : '',
                'required' => true,
                'input_options' => [
                    'madrasa_teacher' => __('site.madrasateacher'),
                    'teacher' => __('site.generalteacher'),
                    'engineer' => __('site.engineer'),
                    'businessman' => __('site.businessman'),
                    'govt_Job' => __('site.govtemployee'),
                    'private_job' => __('site.privateemployee'),
                    'freelancer' => __('site.freelancer'),
                    'doctor' => __('site.doctor'),
                    'medical_student' => __('site.medical_student'),
                    'student' => __('site.student'),
                    'immigrant' => __('site.immigrant'),
                    'others' => __('site.others'),
                    'jobless' => __('site.jobless'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])

            @include('backend.layouts.components.inputs.textarea', [
                'title' => __('site.profession_description'),
                'placeholder' => __('site.profession_description'),
                'slug' => 'profession_details',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->professional()->profession_details : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.monthly_income'),
                'placeholder' => __('site.monthly_income'),
                'slug' => 'monthly_income',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->professional()->monthly_income : '',
                'required' => true,
            ])










            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'professional'])
        </div>
    </form>
</div>

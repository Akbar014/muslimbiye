<div class="tab-pane fade" id="expected" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.expected') }}"
        enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-row !mt-2 !pl-5">

            @php
                $agesData = [];
                for ($i = 18; $i <= 70; $i++) {
                    $agesData[$i] = EnToBn($i);
                }

                $ages = explode(';', isset($data) ? $data->expected()->expected_age : '18;24');
                $min = $ages[0] ?? '18';
                $max = $ages[1] ?? '24';
            @endphp

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.b_exp_age') . ' (' . __('site.minimum') . ')',
                'slug' => 'expected_age_min',
                'div_css' => 'col-md-6',
                'input_value' => $min,
                'required' => true,
                'input_options' => $agesData,
                'additional' => "onchange='update_expected_age()'",
            ])
            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.b_exp_age') . ' (' . __('site.maximum') . ')',
                'slug' => 'expected_age_max',
                'div_css' => 'col-md-6',
                'input_value' => $max,
                'required' => true,
                'input_options' => $agesData,
                'additional' => "onchange='update_expected_age()'",
            ])

            <input type="hidden" name="expected_age" id="expected_age"
                value="{{ isset($data) ? $data->expected()->expected_age : '18;24' }}">

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.complexion'),
                'slug' => 'expected_complexion',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->expected()->expected_complexion : '',
                'required' => true,
                'input_options' => [
                    'black' => __('site.black'),
                    'mediam' => __('site.mediam'),
                    'light_mediam' => __('site.light_mediam'),
                    'fair' => __('site.fair'),
                    'bright_fair' => __('site.bright_fair'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])

            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.height'),
                'placeholder' => __('site.height'),
                'slug' => 'expected_height',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->expected()->expected_height : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.educational_qualification'),
                'placeholder' => __('site.educational_qualification'),
                'slug' => 'expected_education',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->expected()->expected_education : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.district'),
                'placeholder' => __('site.district'),
                'slug' => 'expect_district',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->expected()->expect_district : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.marital_status'),
                'slug' => 'groom_expected_marital_status',
                'div_css' => 'col-md-12 bride_groom_groom_open',
                'input_value' => isset($data) ? $data->expected()->groom_expected_marital_status : '',
                'required' => true,
                'input_options' => [
                    'unmarried' => __('site.unmarried'),
                    'divorced' => __('site.divorced'),
                    'widow' => __('site.widow'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])
            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.marital_status'),
                'slug' => 'bride_expected_marital_status',
                'div_css' => 'col-md-12 bride_groom_bride_open',
                'input_value' => isset($data) ? $data->expected()->bride_expected_marital_status : '',
                'required' => true,
                'input_options' => [
                    'unmarried' => __('site.unmarried'),
                    'married' => __('site.married'),
                    'divorced' => __('site.divorced'),
                    'widow' => __('site.widower'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])

            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.b_occupation'),
                'placeholder' => __('site.b_occupation'),
                'slug' => 'expected_profession',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->expected()->expected_profession : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.financial_status'),
                'placeholder' => __('site.financial_status'),
                'slug' => 'expected_financial_status',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->expected()->expected_financial_status : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.textarea', [
                'title' => __('site.characteristics'),
                'placeholder' => __('site.characteristics'),
                'slug' => 'expected_features',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->expected()->expected_features : '',
                'required' => true,
            ])


            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'expected'])
        </div>
    </form>
</div>

<script>
    let expected_age_min = document.getElementById('expected_age_min');
    let expected_age_max = document.getElementById('expected_age_max');
    let expected_age = document.getElementById('expected_age');

    function update_expected_age() {
        if (expected_age_min.value < expected_age_max.value) {
            expected_age.value = `${expected_age_min.value};${expected_age_max.value}`
        } else {
            toastr.error('Minimum Age Should Be Less than Maximum Age.')
        }
    }
</script>

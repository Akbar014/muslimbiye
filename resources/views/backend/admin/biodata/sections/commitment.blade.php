<div class="tab-pane fade" id="commitment" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.commitment') }}"
        enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-row !mt-2 !pl-5">

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.parent_knowledge'),
                'slug' => 'gurdian_aknowledgement',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->commitment()->gurdian_aknowledgement : '',
                'required' => true,
                'input_options' => [
                    'yes' => __('site.yes'),
                    'no' => __('site.no'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])
            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.testify'),
                'slug' => 'all_data_valid',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->commitment()->all_data_valid : '',
                'required' => true,
                'input_options' => [
                    'yes' => __('site.yes'),
                    'no' => __('site.no'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])
            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.not_responsible'),
                'slug' => 'responsibility',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->commitment()->responsibility : '',
                'required' => true,
                'input_options' => [
                    'yes' => __('site.yes'),
                    'no' => __('site.no'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])

            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'commitment'])

        </div>
    </form>
</div>

<script></script>

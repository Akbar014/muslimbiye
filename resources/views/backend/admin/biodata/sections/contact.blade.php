<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.contact') }}"
        enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-row !mt-2 !pl-5">

            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.brides_name'),
                'placeholder' => __('site.brides_name'),
                'slug' => 'bride_name',
                'div_css' => 'col-md-12 bride_groom_bride_open',
                'input_value' => isset($data) ? $data->contact()->bride_name : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.grooms_name'),
                'placeholder' => __('site.grooms_name'),
                'slug' => 'groom_name',
                'div_css' => 'col-md-12 bride_groom_bride_open',
                'input_value' => isset($data) ? $data->contact()->groom_name : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.gurdian_name'),
                'placeholder' => __('site.gurdian_name'),
                'slug' => 'gurdian_name',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->contact()->gurdian_name : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.parents_phone_number'),
                'placeholder' => __('site.parents_phone_number'),
                'slug' => 'gurdian_phone',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->contact()->gurdian_phone : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.parents_whatsapp_number'),
                'placeholder' => __('site.parents_whatsapp_number'),
                'slug' => 'gurdian_whatsapp',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->contact()->gurdian_whatsapp : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.gurdian_relation'),
                'placeholder' => __('site.gurdian_relation'),
                'slug' => 'gurdian_relation',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->contact()->gurdian_relation : '',
                'required' => true,
            ])
            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.your_email_address'),
                'placeholder' => __('site.your_email_address'),
                'slug' => 'biodata_email',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->contact()->biodata_email : '',
                'required' => true,
            ])
            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'contact'])
        </div>
    </form>
</div>

<script></script>

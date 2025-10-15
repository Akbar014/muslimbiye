<div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.family') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-row !mt-2 !pl-5">

            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.father_name_only'),
                'placeholder' => __('site.father_name_only'),
                'slug' => 'fathers_name',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->fathers_name : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.father_status'),
                'slug' => 'father_status',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->father_status : '',
                'required' => true,
                'input_options' => [
                    'alive' => __('site.yes'),
                    'dead' => __('site.no'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])

            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.father_occupation'),
                'placeholder' => __('site.father_occupation'),
                'slug' => 'father_profession',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->father_profession : '',
                'required' => true,
            ])


            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.mother_name_only'),
                'placeholder' => __('site.mother_name_only'),
                'slug' => 'mothers_name',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->mothers_name : '',
                'required' => true,
            ])

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.mother_status'),
                'slug' => 'mother_status',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->mother_status : '',
                'required' => true,
                'input_options' => [
                    'alive' => __('site.yes'),
                    'dead' => __('site.no'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])

            @include('backend.layouts.components.inputs.input', [
                'title' => __('site.mother_occupation'),
                'placeholder' => __('site.mother_occupation'),
                'slug' => 'mother_profession',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->mother_profession : '',
                'required' => true,
            ])





            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.how_many_brother'),
                'slug' => 'total_brother',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->total_brother : '',
                'required' => true,
                'input_options' => [
                    '0' => EnToBn('0'),
                    '1' => EnToBn('1'),
                    '2' => EnToBn('2'),
                    '3' => EnToBn('3'),
                    '4' => EnToBn('4'),
                    '5' => EnToBn('5'),
                    '6' => EnToBn('6'),
                    '7' => EnToBn('7'),
                    '8' => EnToBn('8'),
                    '9' => EnToBn('9'),
                    '10' => EnToBn('10'),
                ],
                'additional' => "onchange='handleFamily(`ভাইয়ের`, `brother`, this.value)'",
            ])

            <div class="col-12" id="brother_container">
                @if (isset($data))
                    @php
                        $prefix = __('site.brothers');
                        $tag = 'brother';
                    @endphp
                    @foreach (json_decode($data->family()->brothers) as $key => $item)
                        <div class="row" data-{{ $tag }}-id="{{ $key }}">
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.name'),
                                'placeholder' => $prefix . ' ' . __('site.name'),
                                'slug' => $tag . '_names[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->name : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.educational_qualification'),
                                'placeholder' => $prefix . ' ' . __('site.educational_qualification'),
                                'slug' => $tag . '_educations[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->education : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.b_occupation'),
                                'placeholder' => $prefix . ' ' . __('site.b_occupation'),
                                'slug' => $tag . '_jobs[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->job : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.select', [
                                'title' => $prefix . ' ' . __('site.marital_status'),
                                'placeholder' => $prefix . ' ' . __('site.marital_status'),
                                'slug' => $tag . '_merital_status[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->merital_status : '',
                                'required' => true,
                                'input_options' => [
                                    '' => __('site.please_select'),
                                    'single' => __('site.single'),
                                    'widowed' => __('site.widowed'),
                                    'separated' => __('site.separated'),
                                    'divorced' => __('site.divorced'),
                                    'married' => __('site.married'),
                                ],
                            ])
                        </div>
                    @endforeach
                @endif
            </div>



            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.how_many_sister'),
                'slug' => 'total_sister',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->total_sister : '',
                'required' => true,
                'input_options' => [
                    '0' => EnToBn('0'),
                    '1' => EnToBn('1'),
                    '2' => EnToBn('2'),
                    '3' => EnToBn('3'),
                    '4' => EnToBn('4'),
                    '5' => EnToBn('5'),
                    '6' => EnToBn('6'),
                    '7' => EnToBn('7'),
                    '8' => EnToBn('8'),
                    '9' => EnToBn('9'),
                    '10' => EnToBn('10'),
                ],
                'additional' => "onchange='handleFamily(`বোনের`, `sister`, this.value)'",
            ])

            <div class="col-12" id="sister_container">
                @if (isset($data))
                    @php
                        $prefix = __('site.sisters');
                        $tag = 'sister';
                    @endphp
                    @foreach (json_decode($data->family()->sisters) as $key => $item)
                        <div class="row" data-{{ $tag }}-id="{{ $key }}">
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.name'),
                                'placeholder' => $prefix . ' ' . __('site.name'),
                                'slug' => $tag . '_names[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->name : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.educational_qualification'),
                                'placeholder' => $prefix . ' ' . __('site.educational_qualification'),
                                'slug' => $tag . '_educations[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->education : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.b_occupation'),
                                'placeholder' => $prefix . ' ' . __('site.b_occupation'),
                                'slug' => $tag . '_jobs[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->job : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.select', [
                                'title' => $prefix . ' ' . __('site.marital_status'),
                                'placeholder' => $prefix . ' ' . __('site.marital_status'),
                                'slug' => $tag . '_merital_status[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->merital_status : '',
                                'required' => true,
                                'input_options' => [
                                    '' => __('site.please_select'),
                                    'single' => __('site.single'),
                                    'widowed' => __('site.widowed'),
                                    'separated' => __('site.separated'),
                                    'divorced' => __('site.divorced'),
                                    'married' => __('site.married'),
                                ],
                            ])
                        </div>
                    @endforeach
                @endif
            </div>


            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.how_many_paternal_uncle'),
                'slug' => 'total_paternal_uncle',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->total_paternal_uncle : '',
                'required' => true,
                'input_options' => [
                    '0' => EnToBn('0'),
                    '1' => EnToBn('1'),
                    '2' => EnToBn('2'),
                    '3' => EnToBn('3'),
                    '4' => EnToBn('4'),
                    '5' => EnToBn('5'),
                    '6' => EnToBn('6'),
                    '7' => EnToBn('7'),
                    '8' => EnToBn('8'),
                    '9' => EnToBn('9'),
                    '10' => EnToBn('10'),
                ],
                'additional' => "onchange='handleFamily(`চাচার`, `paternal_uncle`, this.value)'",
            ])

            <div class="col-12" id="paternal_uncle_container">
                @if (isset($data))
                    @php
                        $prefix = __('site.paternal_uncle');
                        $tag = 'paternal_uncle';
                    @endphp
                    @foreach (json_decode($data->family()->paternal_uncles) as $key => $item)
                        <div class="row" data-{{ $tag }}-id="{{ $key }}">
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.name'),
                                'placeholder' => $prefix . ' ' . __('site.name'),
                                'slug' => $tag . '_names[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->name : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.educational_qualification'),
                                'placeholder' => $prefix . ' ' . __('site.educational_qualification'),
                                'slug' => $tag . '_educations[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->education : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.b_occupation'),
                                'placeholder' => $prefix . ' ' . __('site.b_occupation'),
                                'slug' => $tag . '_jobs[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->job : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.select', [
                                'title' => $prefix . ' ' . __('site.marital_status'),
                                'placeholder' => $prefix . ' ' . __('site.marital_status'),
                                'slug' => $tag . '_merital_status[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->merital_status : '',
                                'required' => true,
                                'input_options' => [
                                    '' => __('site.please_select'),
                                    'single' => __('site.single'),
                                    'widowed' => __('site.widowed'),
                                    'separated' => __('site.separated'),
                                    'divorced' => __('site.divorced'),
                                    'married' => __('site.married'),
                                ],
                            ])
                        </div>
                    @endforeach
                @endif
            </div>

            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.how_many_maternal_uncle'),
                'slug' => 'total_maternal_uncle',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->total_maternal_uncle : '',
                'required' => true,
                'input_options' => [
                    '0' => EnToBn('0'),
                    '1' => EnToBn('1'),
                    '2' => EnToBn('2'),
                    '3' => EnToBn('3'),
                    '4' => EnToBn('4'),
                    '5' => EnToBn('5'),
                    '6' => EnToBn('6'),
                    '7' => EnToBn('7'),
                    '8' => EnToBn('8'),
                    '9' => EnToBn('9'),
                    '10' => EnToBn('10'),
                ],
                'additional' => "onchange='handleFamily(`মামার`, `maternal_uncle`, this.value)'",
            ])

            <div class="col-12" id="maternal_uncle_container">
                @if (isset($data))
                    @php
                        $prefix = __('site.maternal_uncle');
                        $tag = 'maternal_uncle';
                    @endphp
                    @foreach (json_decode($data->family()->maternal_uncles) as $key => $item)
                        <div class="row" data-{{ $tag }}-id="{{ $key }}">
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.name'),
                                'placeholder' => $prefix . ' ' . __('site.name'),
                                'slug' => $tag . '_names[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->name : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.educational_qualification'),
                                'placeholder' => $prefix . ' ' . __('site.educational_qualification'),
                                'slug' => $tag . '_educations[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->education : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.input', [
                                'title' => $prefix . ' ' . __('site.b_occupation'),
                                'placeholder' => $prefix . ' ' . __('site.b_occupation'),
                                'slug' => $tag . '_jobs[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->job : '',
                                'required' => true,
                            ])
                            @include('backend.layouts.components.inputs.select', [
                                'title' => $prefix . ' ' . __('site.marital_status'),
                                'placeholder' => $prefix . ' ' . __('site.marital_status'),
                                'slug' => $tag . '_merital_status[]',
                                'div_css' => 'col-md-3',
                                'input_value' => isset($data) ? $item->merital_status : '',
                                'required' => true,
                                'input_options' => [
                                    '' => __('site.please_select'),
                                    'single' => __('site.single'),
                                    'widowed' => __('site.widowed'),
                                    'separated' => __('site.separated'),
                                    'divorced' => __('site.divorced'),
                                    'married' => __('site.married'),
                                ],
                            ])
                        </div>
                    @endforeach
                @endif
            </div>





            @include('backend.layouts.components.inputs.select', [
                'title' => __('site.family_financial_status'),
                'slug' => 'family_status',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->family_status : '',
                'required' => true,
                'input_options' => [
                    'upper_class' => __('site.upper_class'),
                    'higher_middle_class' => __('site.upper_middleclass'),
                    'middle_class' => __('site.middle_class'),
                    'lower_middle_class' => __('site.lower_middleclass'),
                    'lower_class' => __('site.lower_class'),
                ],
                // 'additional' => "onchange='formsController(this)'",
            ])




            @include('backend.layouts.components.inputs.textarea', [
                'title' => __('site.financial_status'),
                'placeholder' => __('site.financial_status'),
                'slug' => 'financial_status',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->family()->financial_status : '',
                'required' => true,
            ])












        </div>
        @include('backend.admin.biodata.sections.submitBtn', ['type' => 'family'])
    </form>
</div>


<script>
    function handleFamily(prefix, tag, value) {
        let html = value != 0 ? `<div>
                            <b>জ্যেষ্ঠতার ক্রমানুসারে ${prefix} বিবরণ লিখুন।</b>
                        </div>` : "";

        for (let i = 0; i < value; i++) {
            html += `
                <div class="row" data-${tag}-id="${i}">
  <div class="mb-4 !pt-3 col-md-3" >
    <label for="${tag}_names[]"
      >${prefix} নাম <span class="text-danger">*</span></label
    >
    <input
      type="text"
      class="form-control !mt-2"
      id="${tag}_names[]"
      name="${tag}_names[]"
      placeholder="${prefix} নাম"
      required=""
    />
    <span id="error_${tag}_names[]" class="has-error text-danger"></span>
  </div>
  <div class="mb-4 !pt-3 col-md-3" >
    <label for="${tag}_educations[]"
      >${prefix} শিক্ষাগত যোগ্যতা <span class="text-danger">*</span></label
    >
    <input
      type="text"
      class="form-control !mt-2"
      id="${tag}_educations[]"
      name="${tag}_educations[]"
      placeholder="${prefix} শিক্ষাগত যোগ্যতা"
      required=""
    />
    <span id="error_${tag}_educations[]" class="has-error text-danger"></span>
  </div>
  <div class="mb-4 !pt-3 col-md-3" >
    <label for="${tag}_jobs[]"
      >${prefix} পেশা <span class="text-danger">*</span></label
    >
    <input
      type="text"
      class="form-control !mt-2"
      id="${tag}_jobs[]"
      name="${tag}_jobs[]"
      placeholder="${prefix} পেশা"
      required=""
    />
    <span id="error_${tag}_jobs[]" class="has-error text-danger"></span>
  </div>
  <div class="mb-4 !pt-3 select_container col-md-3" >
    <label for="${tag}_merital_status[]"
      >${prefix} বৈবাহিক অবস্থা <span class="text-danger">*</span></label
    >
    <select
      class="form-control cursor-pointer !mt-2"
      id="${tag}_merital_status[]"
      name="${tag}_merital_status[]"
      style="cursor: pointer"
      selected=""
    >
      <option value="">@lang('site.please_select')</option>
      <option value="single">@lang('site.unmarried')</option>
      <option value="widowed">@lang('site.widowed')</option>
      <option value="separated">@lang('site.separated')</option>
      <option value="divorced">@lang('site.divorced')</option>
      <option value="married">@lang('site.married')</option>
    </select>
    <span
      id="error_${tag}_merital_status[]"
      class="has-error text-danger"
    ></span>
  </div>

  <style>
    .select_container .dropdown-toggle {
      padding: 0.75rem 1rem;
    }

    .select_container .filter-multi-select > .dropdown-menu > .filter > button {
      font-size: 23px;
      margin-top: 1px;
    }
  </style>
</div>

                `;
        }

        document.getElementById(`${tag}_container`).innerHTML = html;
    }
</script>

@php
    $addressList = getAddress();
@endphp

<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="home-tab3">
    <form method="POST" action="{{ isset($data) ? route('admin.biodata.update', $data->id) : route('user.edit_biodata.address') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="form-row !mt-2 !pl-5">
            <div class="col-md-4 !pt-3">
                <label class="form-label" for="form3Example1c">@lang('site.permanent_address')<span
                        style="color: red;">*</span></label>
                <div class="position-relative inline-block text-left w-full address_container">
                    <input type="hidden" name="parmanent_zella" id="parmanent_zella" class="address_name"
                        value="{{ isset($data) ? $data->address()->parmanent_zella : '' }}" required>
                    <button type="button" class="form-control text-left address_menu_button !mt-2" aria-haspopup="true"
                        aria-expanded="true">
                        @if (isset($data) && $data->address()->parmanent_zella)
                            <div class="d-flex align-items-center justify-content-between w-full">
                                @php
                                    $addr = explode(', ', $data->address()->parmanent_zella);
                                    foreach ($addr as $key => $value) {
                                        $addr[$key] = __('districts.' . $value);
                                    }
                                @endphp
                                <span>{{ implode(', ', $addr) }}</span>
                                <i class="fa fa-times text-secondary cursor-pointer zella_remover"></i>
                            </div>
                        @else
                            <span class="text-slate-400 inline-block">
                                @lang('site.select_district')
                            </span>
                        @endif
                    </button>

                    <div class="address_menu_dropdown d-none position-absolute"
                        style="background: #fff; width: 100%; height: 300px; overflow-x: hidden; z-index: 99; overflow-y: scroll;">
                        <div class="!py-1 h-100 w-100">
                            @foreach ($addressList as $divisionId => $division)
                                <div class="group">
                                    <div data-divisionId="{{ $divisionId }}"
                                        class="cursor-pointer d-flex justify-content-between align-items-center !px-4 !py-2 division_btn"
                                        style="cursor: pointer;">
                                        @lang('districts.' . $division['name'])
                                        <svg style="width: 20px" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>

                                    <div class="position-absolute w-full district_container_{{ $divisionId }} district_container z-20"
                                        style="left: 100%; top: 0px; height: 100%; width: 100%; cursor: pointer; overflow-x: hidden; overflow-y: scroll; background: #fff">
                                        <div class="h-full w-full">
                                            <div
                                                class="cursor-pointer d-flex justify-content-left !mt-3 align-items-center !px-4 !py-2 remove_district">
                                                <i class="fa fa-long-arrow-left"></i> @lang('site.back_to_previous')
                                            </div>
                                            @foreach ($division['districts'] as $districtId => $district)
                                                <div>
                                                    <div class="cursor-pointer d-flex justify-content-between align-items-center !px-4 !py-2 district_btn"
                                                        data-districtId="{{ $districtId }}"
                                                        data-divisionId="{{ $divisionId }}">
                                                        @lang('districts.' . $district['name'])
                                                        <svg style="width: 20px;" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>

                                                    <div class="position-absolute w-full subdistrict_container_{{ $districtId }}_{{ $divisionId }} subdistrict_container z-30"
                                                        style="left: 100%; top: 0px; height: 100%; width: 100%; cursor: pointer; overflow-x: hidden; overflow-y: scroll; background: #fff">
                                                        <div class="h-full w-full">
                                                            <div
                                                                class="cursor-pointer d-flex justify-content-left !mt-3 align-items-center !px-4 !py-2 remove_subdistrict">
                                                                <i class="fa fa-long-arrow-left"></i> @lang('site.back_to_previous')
                                                            </div>
                                                            @foreach ($district['subdistricts'] as $subdistrictId => $subdistrict)
                                                                <div data-value="{{ $subdistrict['value'] }}"
                                                                    class="subdistrict_btn cursor-pointer d-flex justify-content-left !mt-3 align-items-center !px-4 !py-2">
                                                                    @lang('districts.' . $subdistrict['name'])
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('backend.layouts.components.inputs.input', [
                'title' => 'Parmanent Address',
                'placeholder' => 'Parmanent Address',
                'slug' => 'parmanent_address',
                'div_css' => 'col-md-8 !pt-3',
                'input_value' => isset($data) ? $data->address()->parmanent_address : '',
                'required' => true,
            ])

            <div class="col-12">
                <input type="checkbox" name="present_address_same" id="present_address_same"
                    onchange="hidePresentAddress(this.checked)"
                    {{ isset($data) && $data->address()->present_address_same == 'on' ? 'checked' : '' }} />
                <label class="text-[1.2rem] md:text-[1rem]" style="cursor: pointer;"
                    for="present_address_same">@lang('site.same_as_parmanent') <span style="color: red;">*</span></label>
            </div>


            <div class="col-12" id="present_address_container">
                <div class="row">
                    <div class="col-md-4 !pt-3">
                        <label class="form-label" for="form3Example1c">@lang('site.present_address') <span
                                style="color: red;">*</span></label>
                        <div class="position-relative inline-block text-left w-full address_container">
                            <input type="hidden" name="present_zella" id="present_zella" class="address_name"
                                value="{{ isset($data) ? $data->address()->present_zella : '' }}" required>
                            <button type="button" class="form-control text-left address_menu_button !mt-2"
                                aria-haspopup="true" aria-expanded="true">
                                @if (isset($data) && $data->address()->present_zella)
                                    <div class="d-flex align-items-center justify-content-between w-full">
                                        @php
                                            $addr = explode(', ', $data->address()->present_zella);
                                            foreach ($addr as $key => $value) {
                                                $addr[$key] = __('districts.' . $value);
                                            }
                                        @endphp

                                        <span>{{ implode(', ', $addr) }}</span>
                                        <i class="fa fa-times text-secondary cursor-pointer zella_remover"></i>
                                    </div>
                                @else
                                    <span class="text-slate-400 inline-block">
                                        @lang('site.same_as_parmanent')
                                    </span>
                                @endif
                            </button>

                            <div class="address_menu_dropdown d-none position-absolute"
                                style="background: #fff; width: 100%; height: 300px; overflow-x: hidden; z-index: 99; overflow-y: scroll;">
                                <div class="!py-1 h-100 w-100">
                                    @foreach ($addressList as $divisionId => $division)
                                        <div class="group">
                                            <div data-divisionId="{{ $divisionId }}"
                                                class="cursor-pointer d-flex justify-content-between align-items-center !px-4 !py-2 division_btn"
                                                style="cursor: pointer;">
                                                @lang('districts.' . $division['name'])
                                                <svg style="width: 20px" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <div class="position-absolute w-full district_container_{{ $divisionId }} district_container z-20"
                                                style="left: 100%; top: 0px; height: 100%; width: 100%; cursor: pointer; overflow-x: hidden; overflow-y: scroll; background: #fff">
                                                <div class="h-full w-full">
                                                    <div
                                                        class="cursor-pointer d-flex justify-content-left !mt-3 align-items-center !px-4 !py-2 remove_district">
                                                        <i class="fa fa-long-arrow-left"></i> @lang('site.back_to_previous')
                                                    </div>
                                                    @foreach ($division['districts'] as $districtId => $district)
                                                        <div>
                                                            <div class="cursor-pointer d-flex justify-content-between align-items-center !px-4 !py-2 district_btn"
                                                                data-districtId="{{ $districtId }}"
                                                                data-divisionId="{{ $divisionId }}">
                                                                @lang('districts.' . $district['name'])
                                                                <svg style="width: 20px;" viewBox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </div>

                                                            <div class="position-absolute w-full subdistrict_container_{{ $districtId }}_{{ $divisionId }} subdistrict_container z-30"
                                                                style="left: 100%; top: 0px; height: 100%; width: 100%; cursor: pointer; overflow-x: hidden; overflow-y: scroll; background: #fff">
                                                                <div class="h-full w-full">
                                                                    <div
                                                                        class="cursor-pointer d-flex justify-content-left !mt-3 align-items-center !px-4 !py-2 remove_subdistrict">
                                                                        <i class="fa fa-long-arrow-left"></i>
                                                                        @lang('site.back_to_previous')
                                                                    </div>
                                                                    @foreach ($district['subdistricts'] as $subdistrictId => $subdistrict)
                                                                        <div data-value="{{ $subdistrict['value'] }}"
                                                                            class="subdistrict_btn cursor-pointer d-flex justify-content-left !mt-3 align-items-center !px-4 !py-2">
                                                                            @lang('districts.' . $subdistrict['name'])
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('backend.layouts.components.inputs.input', [
                        'title' => 'Present Address',
                        'placeholder' => 'Present Address',
                        'slug' => 'present_address',
                        'div_css' => 'col-md-8',
                        'input_value' => isset($data) ? $data->address()->present_address : '',
                        'required' => true,
                    ])
                </div>
            </div>

            @include('backend.layouts.components.inputs.input', [
                'title' => 'Where Raised',
                'placeholder' => 'Where Raised',
                'slug' => 'where_raised',
                'div_css' => 'col-md-12',
                'input_value' => isset($data) ? $data->address()->where_raised : '',
                'required' => true,
            ])


            @include('backend.admin.biodata.sections.submitBtn', ['type' => 'address'])


        </div>
    </form>
</div>

@extends('backend.layouts.master')
@section('title', 'Biodata')
@section('content')
    @php
        $user = Auth::guard('admin')->user();
        $marritalStatusCount = 0;
    @endphp
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>{{ $page_name }}</div>
            </div>
        </div>
    </div>
    <div class="section_wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item m-auto">
                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#general" role="tab"
                                    aria-controls="home" aria-selected="false">General
                                    Data</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#address" role="tab"
                                    aria-controls="home" aria-selected="false">Address</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#education" role="tab"
                                    aria-controls="home" aria-selected="false">Education</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#family" role="tab"
                                    aria-controls="home" aria-selected="false">Family</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#personal" role="tab"
                                    aria-controls="home" aria-selected="false">Personal</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#professional" role="tab"
                                    aria-controls="home" aria-selected="false">Professional</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#marrage" role="tab"
                                    aria-controls="home" aria-selected="false">Marrage</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#expected" role="tab"
                                    aria-controls="home" aria-selected="false">Expected</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#commitment" role="tab"
                                    aria-controls="home" aria-selected="false">Commitment</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="home" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            @include('backend.admin.biodata.sections.general')
                            @include('backend.admin.biodata.sections.address')
                            @include('backend.admin.biodata.sections.education')
                            @include('backend.admin.biodata.sections.family')
                            @include('backend.admin.biodata.sections.personal')
                            @include('backend.admin.biodata.sections.professional')
                            @include('backend.admin.biodata.sections.marrage')
                            @include('backend.admin.biodata.sections.expected')
                            @include('backend.admin.biodata.sections.commitment')
                            @include('backend.admin.biodata.sections.contact')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('css')
    <style>
        .bootstrap-select {
            padding: 0px !important;
        }

        .bootstrap-select .dropdown-toggle {
            background: transparent;
            padding: 0.5rem 0.8rem !important;
            box-shadow: 0px 0px 0px transparent !important;
            font-weight: normal;
        }

        .bootstrap-select .dropdown-toggle:hover,
        .bootstrap-select .dropdown-toggle:active {
            background: transparent !important;
            border-color: #e3eaef !important;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
@endsection
@section('js')
    <script>
        let address_containers = document.querySelectorAll('.address_container');
        address_containers.forEach(address_container => {
            let hiddenInput = address_container.querySelector('.address_name');
            let addressMenuButton = address_container.querySelector('.address_menu_button');
            let addressMenuDropdown = address_container.querySelector('.address_menu_dropdown');
            let divisionBtns = address_container.querySelectorAll('.division_btn');
            let districtBtns = address_container.querySelectorAll('.district_btn');
            let zella_remover = address_container.querySelector('.zella_remover');


            addressMenuButton.addEventListener('click', function() {
                addressMenuDropdown.classList.toggle('d-none');
            });

            divisionBtns.forEach(divisionBtn => {
                divisionBtn.addEventListener('click', function() {
                    address_container.querySelector(
                            `.district_container_${divisionBtn.getAttribute('data-divisionId')}`)
                        .style.left = "0px";
                })
            })

            districtBtns.forEach(districtBtn => {
                districtBtn.addEventListener('click', function() {
                    address_container.querySelector(
                            `.subdistrict_container_${districtBtn.getAttribute('data-districtId')}_${districtBtn.getAttribute('data-divisionId')}`
                        )
                        .style.left = "0px";
                })
            })

            address_container.querySelectorAll('.country_btn').forEach(countryBtn => {
                countryBtn.addEventListener('click', function() {
                    address_container.querySelector('.country_container').style.left = "100%";
                })
            });

            address_container.querySelectorAll('.remove_district').forEach(districtRemoveBtn => {
                districtRemoveBtn.addEventListener('click', function() {
                    address_container.querySelectorAll('.district_container').forEach(
                        districtContainer =>
                        districtContainer.style
                        .left = "100%");
                })
            });

            address_container.querySelectorAll('.remove_subdistrict').forEach(subDistrictRemoveBtn => {
                subDistrictRemoveBtn.addEventListener('click', function() {
                    address_container.querySelectorAll('.subdistrict_container').forEach(
                        subDistrictContainer =>
                        subDistrictContainer.style
                        .left = "100%");
                })
            });


            address_container.querySelectorAll('.subdistrict_btn').forEach(subdistrictBtn => {
                subdistrictBtn.addEventListener('click', function() {
                    let submitValue = subdistrictBtn.getAttribute('data-value');
                    hiddenInput.value = submitValue;
                    let submitValueSplit = submitValue.split(', ');

                    if (!isEnglish) {
                        submitValueSplit = submitValueSplit.map(i => {
                            return districtsBn[i];
                        })
                    }


                    addressMenuButton.innerHTML = `
                    <div class="d-flex align-items-center justify-content-between w-full">
                        <span>${submitValueSplit.join(', ')}</span>
                        <i class="fa fa-times text-secondary cursor-pointer zella_remover"></i>
                    </div>
                `;
                    addressMenuDropdown.classList.toggle('d-none');
                    zella_remover = address_container.querySelector('.zella_remover');
                    zella_remover.addEventListener('click', function() {
                        hiddenInput.value = null;
                        addressMenuButton.innerHTML = `
                        <span class="text-slate-400">
                            ঠিকানা নির্বাচন করুন
                        </span>
                    `;
                    });
                    address_container.querySelectorAll('.subdistrict_container').forEach(
                        subDistrictContainer =>
                        subDistrictContainer.style
                        .left = "100%");
                    address_container.querySelectorAll('.district_container').forEach(
                        districtContainer =>
                        districtContainer.style
                        .left = "100%");
                })
            })

            if (zella_remover) {
                zella_remover.addEventListener('click', function() {
                    hiddenInput.value = null;
                    addressMenuButton.innerHTML = `
                    <span class="text-slate-400">
                        ঠিকানা নির্বাচন করুন
                    </span>
                `;
                });
            }


        });


        // Event listener for change event on Select2
        $('#person_category').on('change', function() {

            const selectedValues = $(this).val(); // Get selected values as an array
            if (selectedValues.includes("new")) {
                $("#new_details").css('display', 'block');
            } else {
                $("#new_details").css('display', 'none');
            }
        });
    </script>


    <script>
        function callTrigger(id, value) {

            let selector = document.getElementById(id);
            selector.value = value;
            selector.dispatchEvent(new Event('change'));
        }


        function isHidden(element) {
            while (element) {
                if (window.getComputedStyle(element).display === 'none' || element.classList.contains('hidden')) {
                    return true;
                }
                element = element.parentElement;
            }
            return false;
        }

        function updateRequiredFields() {
            document.querySelectorAll('input[required], select[required], textarea[required]').forEach(field => {
                if (isHidden(field)) {
                    field.dataset.required = "true"; // Store original state
                    field.removeAttribute('required');
                } else if (field.dataset.required === "true") {
                    field.setAttribute('required', 'required');
                }
            });
        }

        // Run initially to fix already hidden fields
        updateRequiredFields();

        function formsController(selector) {

            // Run when the form changes (like select box change)
            selector.addEventListener('change', updateRequiredFields);


            let selectorID = selector.id;
            let selectorValue = selector.value;
            document.querySelectorAll(`[class*="${selectorID}_"]`).forEach(item => {
                item.style.display = 'none';
                item.required = false;
            })
            document.querySelectorAll(`.${selectorID}_${selectorValue}_open`).forEach(item => {
                item.style.display = 'block';
                item.required = true;
            })
        }

        function hidePresentAddress(checked) {
            document.getElementById('present_address_container').style.display = `${checked?'none':'block'}`
            document.getElementById('present_address').required = !checked;
            document.getElementById('present_zella').required = !checked;
        }
    </script>



    @if (isset($data) && $data->address()->present_address_same == 'on')
        <script>
            hidePresentAddress(true)
        </script>
    @endif
    @if (isset($data) && $data->education()->education_medium)
        <script>
            callTrigger('education_medium', "{{ $data->education()->education_medium }}");
        </script>
    @endif
    @if (isset($data) && $data->education()->general_highest_education)
        <script>
            callTrigger('general_highest_education', "{{ $data->education()->general_highest_education }}");
        </script>
    @endif
    @if (isset($data) && $data->education()->study_after_ssc)
        <script>
            callTrigger('study_after_ssc', "{{ $data->education()->study_after_ssc }}");
        </script>
    @endif
    @if (isset($data) && $data->education()->qawmi_education_qualification)
        <script>
            callTrigger('qawmi_education_qualification', "{{ $data->education()->qawmi_education_qualification }}");
        </script>
    @endif
    @if (isset($data) && $data->general()->bride_groom)
        <script>
            callTrigger('bride_groom', "{{ $data->general()->bride_groom }}");
        </script>
    @endif
    @if (isset($data) && $data->general()->marital_status)
        <script>
            callTrigger('marital_status', "{{ $data->general()->marital_status }}");
        </script>
    @endif
    @if (session()->has('next'))
        <script>
            let clickerBtn = document.querySelector(`a[href="#{{ session('next') }}"]`); //.dispatchEvent(new Event
            clickerBtn.click();
        </script>
    @endif
@endsection

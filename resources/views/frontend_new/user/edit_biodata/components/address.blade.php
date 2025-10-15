

<div class="od-biodata-form-content nav_page">
    <div class="oddb-title ">
        <h2 class="text-secondary-color-alter text-center">@lang('site.address')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1' ? route('admin.biodata.address') : route('user.edit_biodata.address');
        @endphp
        <form method="POST" action="{{ $routeUrl }}" class="od-row od-justify-content-spaceBetween">
            @csrf
            
            
            <div class="od-form-group-container required-field">

                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">{!! __('site.permanent_address') !!} <span
                            class="od-required-label">*</span></label>
                </div>

               <div class="relative inline-block text-left w-full address_container">
                {{-- Hidden input where full address will be stored --}}
                <input type="hidden" name="parmanent_zella" id="parmanent_zella"
                    value="{{ isset($address) ? $address->parmanent_zella : '' }}" required />
            
                {{-- Address Select Button --}}
                <button type="button"
                    class="inline-flex justify-left w-full rounded-md border border-gray-300 shadow-sm !px-4 !py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none address_menu_button"
                    aria-haspopup="true" aria-expanded="true">
            
                    @if (isset($address) && $address->parmanent_zella)
                        <div class="flex items-center justify-between w-full">
                            <span id="selected_address_text">{{ $address->parmanent_zella }}</span>
                            <i class="fa fa-times text-secondary cursor-pointer zella_remover p-2"></i>
                        </div> 
                    @else
                        <span id="selected_address_text" class="text-slate-400 inline-block text-[1.2rem] md:text-[1rem]">
                            নির্বাচন করুন
                        </span>
                    @endif
                </button>
                
            
                {{-- Dropdown area --}}
                <div
                    class="address_menu_dropdown hidden absolute left-0 mt-2 w-60 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                    <div class="py-1 country_container overflow-y-auto max-h-[350px]" style="height: 200px;
                        width: 118px;
                        padding: 5px;
                        overflow: auto;">
                        {{-- Initial view: Bangladesh select --}} 
                        <div
                            class="cursor-pointer flex justify-between items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 country_btn">
                            @lang('site.bangladesh')
                            <svg class="w-5 h-5 -rotate-90" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>


                <div class="od-form-group-input od-custom-text_box !mb-4">
                    <input type="text" name="parmanent_address" id="parmanent_address"
                        class="od-field-type__textbox text-[1.2rem] md:text-[1rem]" placeholder="ঠিকানা লিখুন"
                        value="{{ isset($address) ? $address->parmanent_address : '' }}" required />
                </div>
                <div class="od-field-desc od-pt-10">
                    <p>@lang('site.address_details')<br />
                    </p>
                </div>
            </div>


            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.present_address') <span class="od-required-label">*</span></label>
                </div>
                
                {{-- Checkbox for same as permanent --}}
                <div class="od-location-checkbox-container">
                    <label>
                        <input type="checkbox" name="present_address_same" onchange="hidePresentAddress(this.checked)"
                            {{ isset($address) && $address->present_address_same == 'on' ? 'checked' : '' }} />
                        <span class="inline-block !ms-2">@lang('site.same_as_parmanent')</span>
                    </label>
                </div>
            
                {{-- Present Address Container --}}
                <div class="relative inline-block text-left w-full" id="present_address_container">
            
                    <div class="relative inline-block text-left w-full address_container">
                        {{-- Hidden input to store selected address --}}
                        <input type="hidden" name="present_zella" id="present_zella" value="{{ isset($address) ? $address->present_zella : '' }}" required />
            
                        {{-- Address select button --}}
                        <button type="button"
                            class="inline-flex justify-left w-full rounded-md border border-gray-300 shadow-sm !px-4 !py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none address_menu_button"
                            aria-haspopup="true" aria-expanded="true">
            
                            @if(isset($address) && $address->present_zella)
                                <div class="flex items-center justify-between w-full">
                                    <span id="present_selected_address_text">{{ $address->present_zella }}</span>
                                    <i class="fa fa-times text-secondary cursor-pointer zella_remover p-2"></i>
                                </div>
                            @else
                                <span id="present_selected_address_text" class="text-slate-400 inline-block text-[1.2rem] md:text-[1rem]">
                                    @lang('site.select_district') 
                                    <!--বাংলাদেশ-->
                                </span>
                            @endif
                        </button>
            
                        {{-- Dropdown --}}
                        <div class="address_menu_dropdown hidden absolute left-0 mt-2 w-60 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1 country_container overflow-y-auto max-h-[350px]" style="height: 200px;
    width: 118px;
    padding: 5px;
    overflow: auto;">
                                {{-- Initial country selection --}}
                                <div class="cursor-pointer flex justify-between items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 country_btn">
                                    @lang('site.bangladesh')
                                    <svg class="w-5 h-5 -rotate-90" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    {{-- Optional text field for address details --}}
                    <div class="od-form-group-input od-custom-text_box !mb-4">
                        <input type="text" name="present_address" id="present_address"
                            class="od-field-type__textbox text-[1.2rem] md:text-[1rem]"
                            placeholder="ঠিকানা লিখুন"
                            value="{{ isset($address) ? $address->present_address : '' }}" required />
                    </div>
            
                    <div class="od-field-desc od-pt-10">
                        <p>@lang('site.address_details')</p>
                    </div>
                </div>
            </div>


            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem]">@lang('site.where_raised')<span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="where_raised" id="where_raised"
                        class="od-field-type__textbox text-[1.2rem] md:text-[1rem]" placeholder="@lang('site.please_describe')"
                        value="{{ isset($address) ? $address->where_raised : '' }}" required />
                </div>
            </div>

            @include('frontend_new.user.edit_biodata.components.submit')
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




<script>
$(document).ready(function () {
    function initAddressDropdown(buttonSelector, hiddenInputSelector, displaySpanSelector) {
        let selectedDivision = null;
        let selectedDistrict = null;
        let selectedUpazila = null;

        const $container = $(buttonSelector).closest('.address_container');

        // Toggle dropdown
        // $container.on('click', '.address_menu_button', function() {
        //     $(this).siblings('.address_menu_dropdown').toggleClass('hidden');
        // });
        
        $container.on('click', '.address_menu_button', function(e){
            e.stopPropagation(); // prevent dropdown hide
            const $hiddenInput = $container.find('input[type=hidden]');
            const $displaySpan = $container.find('span#selected_address_text, span#present_selected_address_text');
        
            // Clear value and reset text
            $hiddenInput.val('');
            $displaySpan.text('নির্বাচন করুন');
        
            // Optional: dropdown toggle না করতে চাইলে নিচের line কমেন্ট বা বাদ দাও
            // $container.find('.address_menu_dropdown').toggleClass('hidden');
        });




        // Country click → load divisions
        $container.on('click', '.country_btn', function() {
            loadDivisions();
        });

        // Division click → load districts
        $container.on('click', '.division_option', function() {
            selectedDivision = { id: $(this).data('id'), name: $(this).data('name') };
            loadDistricts();
        });

        // District click → load upazilas
        $container.on('click', '.district_option', function() {
            selectedDistrict = { id: $(this).data('id'), name: $(this).data('name') };
            loadUpazilas();
        });

        // Upazila click → set full address
        $container.on('click', '.upazila_option', function() {
            selectedUpazila = { id: $(this).data('id'), name: $(this).data('name') };
            const fullAddress = `${selectedUpazila.name}, ${selectedDistrict.name}, ${selectedDivision.name}`;
            $container.find(hiddenInputSelector).val(fullAddress);
            $container.find(displaySpanSelector).text(fullAddress);
            $container.find('.address_menu_dropdown').addClass('hidden');
        });

        // Back buttons
        $container.on('click', '.back-to-division', function() {
            loadDivisions();
        });

        $container.on('click', '.back-to-district', function() {
            loadDistricts();
        });

        // Remove address X
        $container.on('click', '.zella_remover', function(e){
            e.stopPropagation(); 
            $container.find('input[type=hidden]').val('');
            // $container.find('span').text('@lang("site.select_district")');
            $container.find('span').text('নির্বাচন করুন');
        });
        
        $container.on('click', '.address_menu_button', function(e){
            e.stopPropagation();
            const $hiddenInput = $container.find('input[type=hidden]');
            const $displaySpan = $container.find('span#selected_address_text, span#present_selected_address_text');
        
            $hiddenInput.val('');
            $displaySpan.text('নির্বাচন করুন');
        });

        // ===== Functions =====
        function loadDivisions() {
            fetch('/user/divisions')
                .then(res => res.json())
                .then(data => {
                    let html = `<div class="px-4 py-2 text-sm font-semibold">Select Division</div>`;
                    data.forEach(div => {
                        html += `<div class="division_option cursor-pointer px-4 py-2 hover:bg-gray-100 text-sm text-gray-700" 
                                  data-id="${div.id}" data-name="${div.bn_name}">${div.bn_name}</div>`;
                    });
                    $container.find('.country_container').html(html);
                    selectedDivision = null;
                    selectedDistrict = null;
                    selectedUpazila = null;
                });
        }

        function loadDistricts() {
            if (!selectedDivision) return;
            fetch(`/user/districts/${selectedDivision.id}`)
                .then(res => res.json())
                .then(data => {
                    let html = `<div class="block px-4 py-2 hover:bg-gray-100 text-primary-color cursor-pointer text-sm back-to-division">
                                    <i class="fa fa-long-arrow-left"></i> Back
                                </div>`;
                    html += `<div class="px-4 py-2 text-sm font-semibold">Select District</div>`;
                    data.forEach(dis => {
                        html += `<div class="district_option cursor-pointer px-4 py-2 hover:bg-gray-100 text-sm text-gray-700" 
                                  data-id="${dis.id}" data-name="${dis.bn_name}">${dis.bn_name}</div>`;
                    });
                    $container.find('.country_container').html(html);
                    selectedDistrict = null;
                    selectedUpazila = null;
                });
        }

        function loadUpazilas() {
            if (!selectedDistrict) return;
            fetch(`/user/upazilas/${selectedDistrict.id}`)
                .then(res => res.json())
                .then(data => {
                    let html = `<div class="block px-4 py-2 hover:bg-gray-100 text-primary-color cursor-pointer text-sm back-to-district">
                                    <i class="fa fa-long-arrow-left"></i> Back
                                </div>`;
                    html += `<div class="px-4 py-2 text-sm font-semibold">Select Upazila</div>`;
                    data.forEach(upz => {
                        html += `<div class="upazila_option cursor-pointer px-4 py-2 hover:bg-gray-100 text-sm text-gray-700" 
                                  data-id="${upz.id}" data-name="${upz.bn_name}">${upz.bn_name}</div>`;
                    });
                    $container.find('.country_container').html(html);
                    selectedUpazila = null;
                }); 
        }
    } 

    // Initialize both fields
    initAddressDropdown('#parmanent_zella ~ .address_menu_button', '#parmanent_zella', '#selected_address_text');
    initAddressDropdown('#present_zella ~ .address_menu_button', '#present_zella', '#present_selected_address_text');
});
</script>



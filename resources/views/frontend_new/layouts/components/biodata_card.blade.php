<div class="od-col-12 od-col-sm-6 od-col-md-3">
    <div class="odbc-each-biodata-card">
        <div class="odbcebc-head">

            <a href="javascript:void(0);" id="addToFavourites"
                onclick="addToFavourites({{ $biodata->id }}, function(data){
                if(data?.status=='success') {
                    document.getElementById('addToFavourites').style.display = 'none';
                    document.getElementById('removeFromFavourites').style.display = 'flex';
                }
            })"
                class="biodata-shortlisted-icon od-biodata-shortlist od-biodata-shortlist-link"
                style="{{ $biodata->favorite() ? 'display:none' : '' }}">
                <img src="{{ asset('assets/frontend_new/images/shortlist-ico.svg') }}" alt="Shortlisted">
            </a>
            <a href="javascript:void(0);" id="removeFromFavourites"
                onclick="removeFromFavourites({{ $biodata->id }}, function(data){
                if(data?.status=='success') {
                    document.getElementById('removeFromFavourites').style.display = 'none';
                    document.getElementById('addToFavourites').style.display = 'flex';
                }
            })"
                class="biodata-shortlisted-icon od-biodata-shortlist od-biodata-shortlist-link flex items-center justify-center group"
                style="{{ $biodata->favorite() ? '' : 'display:none' }}">
                <i class="fa fa-check !text-white group-hover:!text-secondary-color" aria-hidden="true"></i>
            </a>


            @php
                $image =
                    $biodata->general()->bride_groom == 'bride'
                        ? ($biodata->general()->biodata_type == 'general'
                            ? 'assets/frontend_new/images/generalFemale.jpeg' // general female
                            : 'assets/frontend_new/images/nikab.PNG') // deendar female
                        : ($biodata->general()->biodata_type == 'general'
                            ? 'assets/frontend_new/images/generalMale.jpeg' // general male
                            : 'assets/frontend_new/images/islamicMan.jpg'); // deendar male
            @endphp
            <a href="{{ route('frontend.biodata_details', $biodata->id) }}" target="_blank"
                class="w-[100px] rounded-full">
                <img src="{{ asset($image) }}" alt="Avatar">
                <h2>@lang('site.biodata_no')</h2>
                <h3>{{ $biodata->code }}</h3>
            </a>
        </div>
        <div class="odbcebc-content">

            <div class="each-item">
                <label>@lang('site.date_of_birth')</label>
                <p>{{ \Carbon\Carbon::parse($biodata->general()->birthdate)->format('F Y') }}</p>
            </div>

            <div class="each-item">
                <label>@lang('site.height_only')</label>
                @php
                    $height = explode('.', $biodata->general()->height);
                @endphp
                <p>{{ EnToBn($height[0]) }}′ {{ array_key_exists(1, $height) ? EnToBn($height[1]) : '' }}″</p>
            </div>


            <div class="each-item">
                <label>@lang('site.complexion')</label>
                <p>@lang('site.' . $biodata->general()->complexion)</p>
            </div>


            {{-- <div class="odbcebc-button">
                <a onclick="loginAlertModal()" href="{{ route('frontend.biodata_details', $biodata->id) }}" class="od-button"
                    target="_blank">@lang('site.full_biodata')</a>
            </div> --}}

            {{-- <div class="odbcebc-button">
            <a href="{{ route('frontend.biodata_details', $biodata->id) }}"
                class="od-button"
                onclick="return loginAlertModal(event, '{{ route('frontend.biodata_details', $biodata->id) }}');">
                @lang('site.full_biodata')
            </a>
            </div> --}}



        <div class="odbcebc-button">
            @if ($canViewDetails)
                <a href="{{ route('frontend.biodata_details', $biodata->id) }}"
                class="od-button"
                onclick="return openLoginAlert(event, '{{ route('frontend.biodata_details', $biodata->id) }}');">
                @lang('site.full_biodata')
                </a>
            @else
                <a href="{{ route('user.auth.login') }}"
                class="od-button"
                onclick="return openApproval(event, '{{ route('user.auth.login') }}');">
                @lang('site.full_biodata')
                </a>
            @endif
        </div>


        </div>
    </div>
</div>



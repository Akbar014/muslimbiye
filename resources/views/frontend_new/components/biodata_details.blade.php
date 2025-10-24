@php
    if (Auth::guard('admin')->check()) {
        $user = Auth::guard('admin')->user();
        $isAdmin = 1;
    } else {
        $user = Auth::guard('user')->user();
        $isAdmin = 0;
    }
    $customer = Auth::guard('user')->user();
@endphp
<div class="od-row">
    <div class="od-col-12 od-col-md-12">
        <div class="each-bio-general">
            <div class="each-bio-general-head">
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
                <img src="{{ asset($image) }}" alt="Avatar" class="w-[100px] rounded-full">
                <h2>@lang('site.biodata_no'): <span>{{ $biodata->code }}</span></h2>
            </div>
            <div class="each-bio-general-content">
                <div class="ebgc-item">
                    <label>@lang('site.biodata_type')</label>

                    <p>@lang('site.' . $biodata->general()->biodata_type) @lang('site.biodata')</p>
                </div>
                <div class="ebgc-item">
                    <label>@lang('site.bride_groom')</label>

                    <p>{{ $biodata->general()->bride_groom ? __('site.' . $biodata->general()->bride_groom . '_biodata') : __('site.no_data') }}
                    </p>
                </div>

                <div class="ebgc-item">
                    <label>@lang('site.marital_status')</label>

                    <p>{{ $biodata->general()->marital_status ? __('site.' . $biodata->general()->marital_status) : __('site.no_data') }}
                    </p>
                </div>

                <div class="ebgc-item">
                    <label>@lang('site.date_of_birth')</label>
                    @if ($biodata->general()->birthdate)
                        @php
                            $date = \Carbon\Carbon::parse($biodata->general()->birthdate);
                            $month = $date->format('F');
                            $year = $date->format('Y');
                        @endphp
                        <p>
                            {{ __('site.' . strToLower($month)) }}
                            {{ EnToBn($year) }}
                        </p>
                    @else
                        <p>
                            @lang('site.no_data')
                        </p>
                    @endif
                </div>

                <div class="ebgc-item">
                    <label>@lang('site.height_only')</label>
                    @if ($biodata->general()->height)
                        @php
                            $height = explode('.', $biodata->general()->height);
                        @endphp
                        <p>{{ EnToBn($height[0]) }}′ {{ array_key_exists(1, $height) ? EnToBn($height[1]) : '' }}″</p>
                    @else
                        <p>
                            @lang('site.no_data')
                        </p>
                    @endif
                </div>

                <div class="ebgc-item">
                    <label>@lang('site.complexion')</label>
                    @if ($biodata->general()->complexion)
                        <p>@lang('site.' . $biodata->general()->complexion)</p>
                    @else
                        <p>
                            @lang('site.no_data')
                        </p>
                    @endif
                </div>

                <div class="ebgc-item">
                    <label>@lang('site.b_weight')</label>

                    @if ($biodata->general()->weight)
                        <p>{{ EnToBn($biodata->general()->weight) }} @lang('site.kg')</p>
                    @else
                        <p>
                            @lang('site.no_data')
                        </p>
                    @endif
                </div>

                <div class="ebgc-item">
                    <label>@lang('site.blood_group')</label>

                    @if ($biodata->general()->blood_group)
                        <p>{{ $biodata->general()->blood_group }}</p>
                    @else
                        <p>
                            @lang('site.no_data')
                        </p>
                    @endif
                </div>

                {{-- <div class="ebgc-item">
                    <label>@lang('site.nationality')</label>
                    <p>@lang('site.bangladeshi')</p>
                </div> --}}
            </div>
        </div>
        <div class="each-bio-link-generator !gap-4">
            <a href="javascript:void(0);" id="addToFavourites"
                onclick="addToFavourites({{ $biodata->id }}, function(data){
                  if(data?.status=='success') {
                      document.getElementById('addToFavourites').style.display = 'none';
                      document.getElementById('removeFromFavourites').style.display = 'flex';
                  }
              })"
                style="{{ $biodata->favorite() ? 'display:none' : '' }}"
                class="od-button w-full od-biodata-shortlist od-biodata-shortlist-link !flex !max-w-xl !p-4 px-5 py-3"><i
                    class="fa fa-star-o" aria-hidden="true"></i>
                <span class="whitespace-nowrap">ShortList</span>
            </a>
            <a href="javascript:void(0);" id="removeFromFavourites"
                onclick="removeFromFavourites({{ $biodata->id }}, function(data){
                  if(data?.status=='success') {
                      document.getElementById('removeFromFavourites').style.display = 'none';
                      document.getElementById('addToFavourites').style.display = 'flex';
                  }
              })"
                style="{{ $biodata->favorite() ? '' : 'display:none' }}"
                class="od-button w-full od-biodata-shortlist od-biodata-shortlist-link !p-3"><i class="fa fa-star-o"
                    aria-hidden="true"></i>
                <span class="whitespace-nowrap">ShortListed</span>
            </a>

            <a href="javascript:void(0);" onclick="toastr.success('Copied to clipboard')"
                class="od-button od-biodata-ignoreList od-biodata-ignoreList-link !flex !max-w-xl items-center justify-center !p-4 px-5 py-3 rounded-md bg-blue-600 text-white font-medium shadow-md hover:bg-blue-700 transition-all duration-300 ease-in-out copy-biodata-link">
                <i class="fa fa-files-o" aria-hidden="true"></i>
                <span class="whitespace-nowrap">Copy Link</span>
            </a>

            <p>{{ $biodata }} only id {{ $biodata->id }}</p>

            <input type="hidden" id="copy_biodata_link" value="{{ route('frontend.biodata_details', $biodata->id) }}">
        </div>
    </div>

    <div class="od-col-12 od-col-md-12">
        @if ($biodata->address())
            <div class="each-bio-other">
                <div class="ebo-group">
                    <h3>@lang('site.address') </h3>
                    <div class="ebo-group-content">

                        @if ($biodata->address()->parmanent_zella != null)
                            <div class="ebogc-item ebogc-location">
                                <label>@lang('site.permanent_address')</label>


                                <p>
                                    @php
                                        $parmanent_zella = explode(',', $biodata->address()->parmanent_zella);

                                        // dd($parmanent_zella);
                                        foreach ($parmanent_zella as $key => $value) {
                                            $parmanent_zella[$key] = __('districts.' . trim($value));
                                        }
                                        $parmanent_zella = implode(', ', array_reverse($parmanent_zella));
                                    @endphp
                                    <span>{{ $parmanent_zella }}</span>
                                    <br>
                                    <span>
                                        <b>@lang('site.address'): &nbsp;</b>
                                        {{ $biodata->address()->parmanent_address }}
                                    </span>
                                </p>

                            </div>
                        @endif


                        @if ($biodata->address()->present_zella != null)
                            <div class="ebogc-item ebogc-location">
                                <label>@lang('site.present_address')</label>

                                <p>
                                    @php
                                        $present_zella = explode(',', $biodata->address()->present_zella);

                                        // dd($parmanent_zella);
                                        foreach ($present_zella as $key => $value) {
                                            $present_zella[$key] = __('districts.' . trim($value));
                                        }
                                        $present_zella = implode(', ', array_reverse($present_zella));
                                    @endphp
                                    <span>{{ $biodata->address()->present_address_same === null ? $present_zella : $parmanent_zella }}</span>
                                    <br>
                                    <span>
                                        <b>@lang('site.address'): &nbsp;</b>
                                        {{ $biodata->address()->present_address_same === null ? $biodata->address()->present_address : $biodata->address()->parmanent_address }}
                                    </span>
                                </p>

                            </div>
                        @endif


                        @if ($biodata->address()->where_raised != null)
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.where_raised')?</label>
                                <p>{{ $biodata->address()->where_raised }}</p>

                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @endif
        @if ($biodata->education())
            <div class="each-bio-other">
                <div class="ebo-group">
                    <h3>@lang('site.educational_qualification') </h3>
                    <div class="ebo-group-content">

                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.educational_medium')</label>


                            <p>@lang('site.' . $biodata->education()->education_medium)</p>

                        </div>

                        @if ($biodata->education()->education_medium == 'general' || $biodata->education()->education_medium == 'alia')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.highest_educational_qualification')</label>
                                <p>@lang('site.' . $biodata->education()->general_highest_education)</p>
                            </div>
                        @endif


                        @if ($biodata->education()->general_highest_education == 'below_ssc')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.highest_class')</label>
                                <p>{{ $biodata->education()->general_highest_school_study }}</p>
                            </div>
                        @endif

                        @if (
                            $biodata->education()->general_highest_education == 'ssc' ||
                                $biodata->education()->general_highest_education == 'hsc' ||
                                $biodata->education()->general_highest_education == 'diploma_running' ||
                                $biodata->education()->general_highest_education == 'diploma' ||
                                $biodata->education()->general_highest_education == 'honors_running' ||
                                $biodata->education()->general_highest_education == 'honors' ||
                                $biodata->education()->general_highest_education == 'masters' ||
                                $biodata->education()->general_highest_education == 'doctorate')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.ssc_year')</label>
                                <p>{{ EnToBn($biodata->education()->ssc_year) }}</p>
                            </div>

                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.ssc_division')</label>
                                <p>@lang('site.' . $biodata->education()->ssc_dept)</p>
                            </div>

                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.ssc_result')</label>
                                <p>{{ $biodata->education()->ssc_result }}</p>
                            </div>
                        @endif

                        @if ($biodata->education()->general_highest_education == 'ssc')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.ssc_result')</label>
                                <p>@lang('site.' . $biodata->education()->hsc_study_running)</p>
                            </div>
                        @endif


                        @if (
                            $biodata->education()->general_highest_education == 'honors_running' ||
                                $biodata->education()->general_highest_education == 'honors' ||
                                $biodata->education()->general_highest_education == 'masters' ||
                                $biodata->education()->general_highest_education == 'doctorate')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.ssc_after')</label>
                                <p>@lang('site.' . $biodata->education()->study_after_ssc)</p>
                            </div>
                        @endif


                        @if ($biodata->education()->general_highest_education == 'hsc' || $biodata->education()->study_after_ssc == 'hsc')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.hsc_year')</label>
                                <p>{{ $biodata->education()->hsc_pass_year }}</p>
                            </div>

                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.hsc_division')</label>
                                <p>@lang('site.' . $biodata->education()->hsc_dept)</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.hsc_result')</label>
                                <p>{{ $biodata->education()->hsc_result }}</p>
                            </div>
                        @endif


                        @if (
                            $biodata->education()->general_highest_education == 'diploma_running' ||
                                $biodata->education()->general_highest_education == 'diploma' ||
                                $biodata->education()->study_after_ssc == 'diploma')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.diploma_subject')</label>
                                <p>{{ $biodata->education()->diploma_subject }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.diploma_institution')</label>
                                <p>{{ $biodata->education()->diploma_institution }}</p>
                            </div>
                        @endif



                        @if ($biodata->education()->general_highest_education == 'diploma_running')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.study_now')</label>
                                <p>{{ $biodata->education()->diploma_current_year }}</p>
                            </div>
                        @endif


                        @if (
                            $biodata->education()->general_highest_education == 'diploma' ||
                                $biodata->education()->study_after_ssc == 'diploma')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.diploma_passing_year')</label>
                                <p>{{ $biodata->education()->diploma_passing_year }}</p>
                            </div>
                        @endif
                        @if (
                            $biodata->education()->general_highest_education == 'honors_running' ||
                                $biodata->education()->general_highest_education == 'honors' ||
                                $biodata->education()->general_highest_education == 'masters' ||
                                $biodata->education()->general_highest_education == 'doctorate')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.graduate_subject')</label>
                                <p>{{ $biodata->education()->honors_subject }}</p>
                            </div>

                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.graduate_institution')</label>
                                <p>{{ $biodata->education()->honors_instutution }}</p>
                            </div>
                        @endif




                        @if (
                            $biodata->education()->general_highest_education == 'honors' ||
                                $biodata->education()->general_highest_education == 'masters' ||
                                $biodata->education()->general_highest_education == 'doctorate')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.graduate_passing_year')</label>
                                <p>{{ $biodata->education()->honors_passing_year }}</p>
                            </div>
                        @endif


                        @if ($biodata->education()->general_highest_education == 'honors_running')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.graduate_current_year')</label>
                                <p>{{ $biodata->education()->honors_study_year }}</p>
                            </div>
                        @endif


                        @if (
                            $biodata->education()->general_highest_education == 'masters' ||
                                $biodata->education()->general_highest_education == 'doctorate')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.kamil_subject')</label>
                                <p>{{ $biodata->education()->masters_subject }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.kamil_institute')</label>
                                <p>{{ $biodata->education()->masters_institution }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.kamil_passing_year')</label>
                                <p>{{ $biodata->education()->masters_passing_year }}</p>
                            </div>
                        @endif



                        @if ($biodata->education()->general_highest_education == 'doctorate')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.doctorate_subject')</label>
                                <p>{{ $biodata->education()->doctorate_subject }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.doctorate_institution')</label>
                                <p>{{ $biodata->education()->doctorate_institution }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.doctorate_passing_year')</label>
                                <p>{{ $biodata->education()->doctorate_passing_year }}</p>
                            </div>
                        @endif


                        @if ($biodata->education()->education_medium == 'qawmi')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.highest_educational_qualification')</label>
                                <p>{{ $biodata->education()->qawmi_education_qualification }}</p>
                            </div>
                        @endif

                        @if ($biodata->education()->qawmi_education_qualification == 'ibtedai')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.ibtedai_madrasa')</label>
                                <p>{{ $biodata->education()->ibtedai_madrasa }}</p>
                            </div>
                        @endif

                        @if ($biodata->education()->qawmi_education_qualification == 'mutawassitah')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.mutawassitah_madrasa')</label>
                                <p>{{ $biodata->education()->mutawassitah_madrasa }}</p>
                            </div>
                        @endif
                        @if ($biodata->education()->qawmi_education_qualification == 'sanabia_ulya')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.sanabia_ulya_madrasa')</label>
                                <p>{{ $biodata->education()->sanabia_ulya_madrasa }}</p>
                            </div>
                        @endif
                        @if ($biodata->education()->qawmi_education_qualification == 'fazilat')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.fazilat_madrasa')</label>
                                <p>{{ $biodata->education()->fazilat_madrasa }}</p>
                            </div>
                        @endif
                        @if ($biodata->education()->qawmi_education_qualification == 'takmil')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.takmil_madrasa')</label>
                                <p>{{ $biodata->education()->takmil_madrasa }}</p>
                            </div>
                        @endif

                        @if (
                            $biodata->education()->qawmi_education_qualification == 'takmil' ||
                                $biodata->education()->qawmi_education_qualification == 'ibtedai' ||
                                $biodata->education()->qawmi_education_qualification == 'mutawassitah' ||
                                $biodata->education()->qawmi_education_qualification == 'sanabia_ulya' ||
                                $biodata->education()->qawmi_education_qualification == 'takhassus' ||
                                $biodata->education()->qawmi_education_qualification == 'fazilat')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.result')</label>
                                <p>{{ $biodata->education()->qawmi_result }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.passing_year')</label>
                                <p>{{ $biodata->education()->qawmi_passing_year }}</p>
                            </div>
                        @endif


                        @if ($biodata->education()->qawmi_education_qualification == 'takhassus')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.takhassus_madrasa')</label>
                                <p>{{ $biodata->education()->takhassus_madrasa }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.takhassus_subject')</label>
                                <p>{{ $biodata->education()->takhassus_subject }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.takhassus_result')</label>
                                <p>{{ $biodata->education()->takhassus_result }}</p>
                            </div>
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.takhassus_passing_year')</label>
                                <p>{{ $biodata->education()->takhassus_passing_year }}</p>
                            </div>
                        @endif


                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.others_educational_qualifications')</label>
                            <p>{{ $biodata->education()->others_educational_qualifications }}</p>
                        </div>
                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.deen_titles')</label>
                            <p>{{ $biodata->education()->deen_designations ? __('site.' . $biodata->education()->deen_designations) : __('site.no_data') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($biodata->family())
            <div class="each-bio-other">
                <div class="ebo-group">
                    <h3>@lang('site.family_information') </h3>
                    <div class="ebo-group-content">
                        @if (isset($self) && $self)
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.father_name_only')</label>
                                <p>{{ $biodata->family()->fathers_name }}
                                </p>
                            </div>
                        @endif
                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.father_status')</label>
                            <p>{{ $biodata->family()->father_status == 'alive' ? 'জী, জীবিত' : 'না, মৃত' }}
                            </p>
                        </div>


                        @if ($biodata->family()->father_profession != null)
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.father_occupation')</label>


                                <p>{{ $biodata->family()->father_profession }}</p>

                            </div>
                        @endif

                        @if (isset($self) && $self)
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.mother_name_only')</label>


                                <p>{{ $biodata->family()->mothers_name }}
                                </p>
                            </div>
                        @endif


                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.mother_status')</label>


                            <p>{{ $biodata->family()->mother_status == 'alive' ? 'জী, জীবিত' : 'না, মৃত' }}
                            </p>

                        </div>


                        @if ($biodata->family()->mother_profession != null)
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.mother_occupation')</label>


                                <p>{{ $biodata->family()->mother_profession }}</p>

                            </div>
                        @endif


                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.how_many_brother')</label>
                            <p>{{ EnToBn($biodata->family()->total_brother) }}</p>

                        </div>

                        @if ($biodata->family()->total_brother > 0)
                            <div class="ebogc-item ebogc-multi-line-text-area">
                                <label>@lang('site.brothers_info')</label>


                                <div class="min-w-[50%]">
                                    <ul class="p-3">
                                        @forelse (json_decode($biodata->family()->brothers) as $person)
                                            <li class="pb-2 ml-2">
                                                {{-- <b>{{ $person->name }}</b><br /> --}}
                                                @lang('site.educational_qualification'): {{ $person->education }}<br />
                                                @lang('site.profession'): {{ $person->job }}<br />
                                                @lang('site.marital_status'): @lang('site.' . $person->merital_status)<br />
                                            </li>
                                        @empty
                                            N/A
                                        @endforelse
                                    </ul>
                                </div>

                            </div>
                        @endif


                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.how_many_sister')</label>


                            <p>{{ EnToBn($biodata->family()->total_sister) }}</p>

                        </div>


                        @if ($biodata->family()->total_sister > 0)
                            <div class="ebogc-item ebogc-multi-line-text-area">
                                <label>@lang('site.sisters_info')</label>

                                <div class="min-w-[50%]">
                                    <ul class="p-3">
                                        @forelse (json_decode($biodata->family()->sisters) as $person)
                                            <li class="pb-2 ml-2">
                                                {{-- <b>{{ $person->name }}</b><br /> --}}
                                                @lang('site.educational_qualification'): {{ $person->education }}<br />
                                                @lang('site.profession'): {{ $person->job }}<br />
                                                @lang('site.marital_status'): @lang('site.' . $person->merital_status)<br />
                                            </li>
                                        @empty
                                            N/A
                                        @endforelse
                                    </ul>
                                </div>

                            </div>
                        @endif

                        @if($biodata->family()->total_paternal_uncle > 0 || $biodata->family()->total_paternal_uncle != NULL)
                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.how_many_paternal_uncle')</label>
                            <p>{{ EnToBn($biodata->family()->total_paternal_uncle) }}</p>

                        </div>
                        @endif


                       @if ($biodata->family()->total_paternal_uncle > 0 && !empty(json_decode($biodata->family()->paternal_uncles)))
                            <div class="ebogc-item ebogc-multi-line-text-area">
                                <label>@lang('site.paternal_uncle_info')</label>
                        
                                <div class="min-w-[50%]">
                                    <ul class="p-3">
                                        @forelse (json_decode($biodata->family()->paternal_uncles) as $person)
                                            <li class="pb-2 ml-2">
                                                {{-- <b>{{ $person->name }}</b><br /> --}}
                                                @lang('site.educational_qualification'): {{ $person->education }}<br />
                                                @lang('site.profession'): {{ $person->job }}<br />
                                                @lang('site.marital_status'): @lang('site.' . $person->merital_status)<br />
                                            </li>
                                        @empty
                                            N/A
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        @endif


                    @if($biodata->family()->total_maternal_uncle > 0 || $biodata->family()->total_maternal_uncle != NULL)

                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.how_many_maternal_uncle')</label>


                            <p>{{ EnToBn($biodata->family()->total_maternal_uncle) }}</p>

                        </div>
                        
                    @endif

                    @if ($biodata->family()->total_maternal_uncle > 0 && !empty(json_decode($biodata->family()->maternal_uncles)))
                        <div class="ebogc-item ebogc-multi-line-text-area">
                            <label>@lang('site.maternal_uncle_info')</label>
                    
                            <div class="min-w-[50%]">
                                <ul class="p-3">
                                    @forelse (json_decode($biodata->family()->maternal_uncles) as $person)
                                        <li class="pb-2 ml-2">
                                            {{-- <b>{{ $person->name }}</b><br /> --}}
                                            @lang('site.educational_qualification'): {{ $person->education }}<br />
                                            @lang('site.profession'): {{ $person->job }}<br />
                                            @lang('site.marital_status'): @lang('site.' . $person->merital_status)<br />
                                        </li>
                                    @empty
                                        N/A
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    @endif






                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.family_status')</label>
                            <p>@lang('site.' . $biodata->family()->family_status)</p>
                        </div>


                        <div class="ebogc-item ebogc-multi-line-text-area">
                            <label>@lang('site.financial_status')</label>
                            <p> {{ $biodata->family()->financial_status }}</p>
                        </div>


                        @if (!in_array($biodata->general()->biodata_type, ['general', 'bride', 'groom']))
                            <div class="ebogc-item ebogc-multi-line-text-area">
                                <label>@lang('site.deen_environment')</label>
                                <p>{{ $biodata->family()->family_environment }}</p>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        @endif
        @if ($biodata->personal())
            <div class="each-bio-other">
                <div class="ebo-group">
                    <h3>@lang('site.personal_information') </h3>
                    <div class="ebo-group-content">
                        @if (isset($biodata) && $biodata->general()->bride_groom == 'bride')
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.outside_dress')</label>
                                <p>{{ $biodata->personal()->dressup }}</p>
                            </div>
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.niqab_when')</label>
                                <p>{{ $biodata->personal()->niqab_info }}</p>
                            </div>
                        @endif
                        @if (
                            !in_array($biodata->general()->biodata_type, ['general', 'bride', 'groom']) &&
                                $biodata->general()->bride_groom !== 'bride')
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.beard_when')</label>
                                <p>{{ $biodata->personal()->beard_info }}</p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.takhnu')</label>
                                <p>{{ $biodata->personal()->above_ankle_info }} </p>
                            </div>
                        @endif

                        @if (!in_array($biodata->general()->biodata_type, ['general', 'bride', 'groom']))
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.prayer')</label>
                                <p>{{ $biodata->personal()->namaz_info }}</p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.kaza_prayer')</label>
                                <p>{{ $biodata->personal()->namaz_waqt_info }} </p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.b_veil')</label>
                                <p>{{ $biodata->personal()->mahram_info }}</p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.recite_quran_correctly')</label>
                                <p>{{ $biodata->personal()->quran_info }}</p>
                            </div>

                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.madhhab')</label>
                                <p class="capitalize">
                                    @lang('site.' . (empty($biodata->personal()->fiqh_info) ? 'none' : $biodata->personal()->fiqh_info))
                                </p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.movie_serial')</label>
                                <p>{{ $biodata->personal()->enternainment_info }} </p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.physical_mental_issue')</label>
                                <p>{{ $biodata->personal()->disablity_info }} </p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.deen_mehnat')</label>
                                <p>{{ $biodata->personal()->deen_mehnot_info }} </p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.mazar')</label>
                                <p>{{ $biodata->personal()->mazar_concept_info }} </p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.islami_books')</label>
                                <p>{{ $biodata->personal()->islami_books }}</p>
                            </div>

                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.alems')</label>
                                <p>{{ $biodata->personal()->favourite_alem }} </p>
                            </div>
                        @endif

                        @if ($biodata->personal()->person_category != null && $biodata->personal()->person_category != '[]')
                            <div class="ebogc-item ebogc-multi-line-text-area">
                                <label>@lang('site.category_select')</label>
                                <p>
                                    @foreach (json_decode($biodata->personal()->person_category) as $item)
                                        @lang('site.' . $item),
                                    @endforeach
                                </p>
                            </div>
                        @endif

                        @if (in_array('new', explode(',', $biodata->personal()->person_category)))
                            <div class="ebogc-item ebogc-multi-line-text-area">
                                <label>@lang('site.conversion_story')</label>
                                <p>{{ $biodata->personal()->become_muslim }}</p>
                            </div>
                        @endif


                        <div class="ebogc-item ebogc-multi-line-text-area">
                            <label>@lang('site.your_hobbies')</label>


                            <p>{{ $biodata->personal()->hobby }}</p>

                        </div>

                        @if (isset($self) && $self)
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.grooms_phone')</label>


                                <p>{{ $biodata->personal()->phone_number }}
                                </p>
                            </div>
                        @endif

                        @if (isset($self) && $self)
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.grooms_photo')</label>
                                <p><img class="w-20 max-h-20"
                                        src="{{ asset('storage/app/public/' . $biodata->personal()->photo) }}">
                                </p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @endif
        @if ($biodata->professional())
            <div class="each-bio-other">
                <div class="ebo-group">
                    <h3>@lang('site.professional_info') </h3>
                    <div class="ebo-group-content">

                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.b_occupation')</label>


                            <p>@lang('site.' . $biodata->professional()->profession)</p>

                        </div>


                        <div class="ebogc-item ebogc-multi-line-text-area">
                            <label>@lang('site.profession_description')</label>


                            <p>{{ $biodata->professional()->profession_details }}</p>

                        </div>



                    </div>
                </div>
            </div>
        @endif
        @if ($biodata->marrage())
            <div class="each-bio-other">
                <div class="ebo-group">
                    <h3>@lang('site.marital_info') </h3>
                    <div class="ebo-group-content">

                        @if ($biodata->general()->bride_groom == 'groom')
                            @if ($biodata->marrage()->marital_status == 'widower')
                                <div class="ebogc-item ebogc-text-box">
                                    <label>@lang('site.wife_died')</label>
                                    <p>{{ $biodata->marrage()->wife_died_reason }} </p>
                                </div>
                            @endif
                            @if ($biodata->marrage()->marital_status == 'married')
                                <div class="ebogc-item ebogc-text-box">
                                    <label>@lang('site.married_again')</label>
                                    <p>{{ $biodata->marrage()->why_marry_after_marrage }} </p>
                                </div>
                                <div class="ebogc-item ebogc-text-box">
                                    <label>@lang('site.wives_children')</label>
                                    <p>{{ $biodata->marrage()->wife_and_childrens }} </p>
                                </div>
                            @endif

                            @if ($biodata->general()->biodata_type == 'deen')
                                <div class="ebogc-item ebogc-text-box">
                                    <label>@lang('site.wife_veil')</label>
                                    <p>{{ $biodata->marrage()->wife_cover }} </p>
                                </div>
                            @endif
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.wife_study')</label>
                                <p>{{ $biodata->marrage()->wife_study }} </p>
                            </div>
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.wife_work')</label>
                                <p>{{ $biodata->marrage()->wife_job }} </p>
                            </div>
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.wife_take')</label>
                                <p>{{ $biodata->marrage()->where_live }} </p>
                            </div>
                            @if ($biodata->general()->biodata_type == 'deen')
                                <div class="ebogc-item ebogc-text-box">
                                    <label>@lang('site.wife_gift')</label>
                                    <p>{{ $biodata->marrage()->expectetions_from_wife }} </p>
                                </div>
                            @endif
                        @endif


                        @if ($biodata->general()->bride_groom == 'bride')
                            @if ($biodata->marrage()->marital_status == 'widow')
                                <div class="ebogc-item ebogc-text-box">
                                    <label>@lang('site.hasband_died')</label>
                                    <p>{{ $biodata->marrage()->husband_died_reason }} </p>
                                </div>
                            @endif
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.interested_to_work_after_marrage')</label>


                                <p>{{ $biodata->marrage()->job_interested }} </p>

                            </div>
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.study_after_marrage')</label>


                                <p>{{ $biodata->marrage()->continue_study }} </p>

                            </div>


                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.work_after_marrage')</label>


                                <p>{{ $biodata->marrage()->continue_job }} </p>

                            </div>
                        @endif



                        @if ($biodata->marrage()->marital_status == 'divorced')
                            <div class="ebogc-item ebogc-text-box">
                                <label>@lang('site.divorce_reason')</label>
                                <p>{{ $biodata->marrage()->marrage_divorce_date_reason }} </p>
                            </div>
                        @endif


                        <div class="ebogc-item ebogc-text-box">
                            <label>@lang('site.parent_agree')</label>


                            <p>{{ $biodata->marrage()->guardian_accept }} </p>

                        </div>


                        <div class="ebogc-item ebogc-multi-line-text-area">
                            <label>@lang('site.thought_marrage')</label>


                            <p>{{ $biodata->marrage()->marrage_concept }}</p>

                        </div>

                    </div>
                </div>
            </div>
        @endif
        @if ($biodata->expected())
            <div class="each-bio-other">
                <div class="ebo-group">
                    <h3>@lang('site.expected_life_partner') </h3>
                    <div class="ebo-group-content">

                        <div class="ebogc-item ebogc-range-slider">
                            <label>@lang('site.age')</label>


                            <p>{{ join(' - ', explode(';', $biodata->expected()->expected_age)) }}</p>

                        </div>


                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.complexion')</label>


                            <p>
                                @if ($biodata->expected()->expected_complexion)
                                    @lang('site.' . $biodata->expected()->expected_complexion)
                                @else
                                    @lang('site.no_data')
                                @endif
                            </p>

                        </div>


                        <div class="ebogc-item ebogc-text-box">
                            <label>@lang('site.height_only')</label>


                            <p>{{ $biodata->expected()->expected_height }}</p>

                        </div>


                        <div class="ebogc-item ebogc-text-box">
                            <label>@lang('site.educational_qualification')</label>


                            <p>{{ $biodata->expected()->expected_education }} </p>

                        </div>


                        <div class="ebogc-item ebogc-text-box">
                            <label>@lang('site.district')</label>


                            <p>{{ $biodata->expected()->expect_district }}</p>

                        </div>




                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.marital_status')</label>


                            @if ($biodata->general()->bride_groom == 'bride')
                                <p>@lang('site.' . $biodata->expected()->bride_expected_marital_status)</p>
                            @else
                                <p>@lang('site.' . $biodata->expected()->groom_expected_marital_status)</p>
                            @endif
                        </div>


                        <div class="ebogc-item ebogc-text-box">
                            <label>@lang('site.b_occupation')</label>


                            <p>{{ $biodata->expected()->expected_profession }} </p>

                        </div>


                        <div class="ebogc-item ebogc-text-box">
                            <label>@lang('site.financial_status')</label>


                            <p>{{ $biodata->expected()->expected_financial_status }} </p>

                        </div>


                        <div class="ebogc-item ebogc-multi-line-text-area">
                            <label>@lang('site.expected_life_partner_quality')</label>


                            <p>{{ $biodata->expected()->expected_features }}</p>

                        </div>

                    </div>
                </div>
            </div>
        @endif
        @if ($biodata->commitment())
            <div class="each-bio-other">
                <div class="ebo-group">
                    <h3>@lang('site.agreement') </h3>
                    <div class="ebo-group-content">

                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.parent_knowledge')</label>


                            <p>@lang('site.' . $biodata->commitment()->gurdian_aknowledgement)</p>

                        </div>


                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.testify')</label>


                            <p>@lang('site.' . $biodata->commitment()->all_data_valid)</p>

                        </div>


                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.not_responsible')</label>


                            <p>@lang('site.' . $biodata->commitment()->responsibility)</p>

                        </div>

                    </div>
                </div>
            </div>
        @endif
        @if ($biodata->contact())
            <div class="each-bio-other od-biodata-contact-panel" id="contact">
                <div class="ebo-group">
                    <h3>
                        @lang('site.contact_us')
                        @if ($user && ($isAdmin || $user->checkIfBiodataContactAvailable($biodata->id)) && !isset($self))
                            <i class="fa fa-unlock !text-secondary-600 text-xl" aria-hidden="true"></i><br />
                            <small>@lang('site.unlocked')</small>
                        @endif
                    </h3>
                    @if (isset($self) && $self)
                        @if ($biodata->general()->bride_groom == 'bride')
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.brides_name')</label>
                                <p>{{ $biodata->contact()->bride_name }}</p>
                            </div>
                        @else
                            <div class="ebogc-item ebogc-drop-down-select-box">
                                <label>@lang('site.grooms_name')</label>
                                <p>{{ $biodata->contact()->groom_name }}</p>
                            </div>
                        @endif
                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.parents_phone_number')</label>
                            <p>{{ $biodata->contact()->gurdian_phone }}</p>
                        </div>
                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.parents_whatsapp_number')</label>
                            <p>{{ $biodata->contact()->gurdian_whatsapp }}</p>
                        </div>
                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.gurdian_name')</label>
                            <p>{{ $biodata->contact()->gurdian_name }}</p>
                        </div>
                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.gurdian_relation')</label>
                            <p>{{ $biodata->contact()->gurdian_relation }}</p>
                        </div>
                        <div class="ebogc-item ebogc-drop-down-select-box">
                            <label>@lang('site.email_address')</label>
                            <p>{{ $biodata->contact()->biodata_email }}</p>
                        </div>
                    @else
                        @if (Auth::guard('user')->check() || Auth::guard('admin')->check())
                            @if ($isAdmin || $user->checkIfBiodataContactAvailable($biodata->id))
                                @if ($biodata->general()->bride_groom == 'bride')
                                    <div class="ebogc-item ebogc-drop-down-select-box">
                                        <label>@lang('site.brides_name')</label>
                                        <p>{{ $biodata->contact()->bride_name }}
                                        </p>
                                    </div>
                                @else
                                    <div class="ebogc-item ebogc-drop-down-select-box">
                                        <label>@lang('site.grooms_name')</label>
                                        <p>{{ $biodata->contact()->groom_name }}
                                        </p>
                                    </div>
                                @endif
                                <div class="ebogc-item ebogc-drop-down-select-box">
                                    <label>@lang('site.parents_phone_number')</label>
                                    <p>{{ $biodata->contact()->gurdian_phone }}
                                    </p>
                                </div>
                                <div class="ebogc-item ebogc-drop-down-select-box">
                                    <label>@lang('site.parents_whatsapp_number')</label>
                                    <p>{{ $biodata->contact()->gurdian_whatsapp }}
                                    </p>
                                </div>
                                <div class="ebogc-item ebogc-drop-down-select-box">
                                    <label>@lang('site.gurdian_name')</label>
                                    <p>{{ $biodata->contact()->gurdian_name }}
                                    </p>
                                </div>
                                <div class="ebogc-item ebogc-drop-down-select-box">
                                    <label>@lang('site.gurdian_relation')</label>
                                    <p>{{ $biodata->contact()->gurdian_relation }}
                                    </p>
                                </div>
                                <div class="ebogc-item ebogc-drop-down-select-box">
                                    <label>@lang('site.email_address')</label>
                                    <p><a class="text-secondary-color hover:underline "
                                            href="mailto:{{ $biodata->contact()->biodata_email }}">{{ $biodata->contact()->biodata_email }}</a>
                                    </p>
                                </div>
                            @else
                                <div class="ebo-group-content od-contact-item-border">
                                    <p>@lang('site.caution')</p>
                                    <span>@lang('site.connection_cost')
                                    </span>
                                    <div class="each-bio-contact-link">
                                        <a href="{{ route('user.use_connection', $biodata->id) }}"
                                            class="od-button">@lang('site.show_contact_info')</a>
                                    </div>
                                    <div class="how-to-video">
                                        <a href="https://youtu.be/COa_bCzmt8Y" target="_blank"
                                            class="col-span-12 sm:col-span-6 border-[2px] border-red-600 bg-white  text-center  drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-full text-xl !text-red-600  gap-2  !text-[1rem] sm:!text-[1.2rem] !p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline">
                                            <i class="fa fa-youtube-play text-red-600 text-4xl"
                                                aria-hidden="true"></i>@lang('site.how_to_show_contact_info')</a>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="ebo-group-content od-contact-item-border">
                                <p>@lang('site.login_to_view')</p>
                                <div class="each-bio-contact-link">
                                    <a href="{{ route('user.auth.login', ['redirect' => url()->full()]) }}"
                                        class="od-button">@lang('site.login')</a>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @endif
        @if (
            $customer != null &&
                ($biodata->user_id != $customer->id || $biodata->admin_created == '1') &&
                $biodata->deleted == '0')
            @php
                $report = \App\Models\BiodataReport::where([
                    'user_id' => $customer->id,
                    'biodata_id' => $biodata->id,
                ])->first();
            @endphp
            <div>
                <p class="text-primary-color !mb-4">@lang('site.report_biodata_description')</p>
                <button onclick='$("#report-biodata-form").slideDown(); '
                    class="bg-primary-color text-white cursor-pointer !p-3 rounded-md font-semibold">@lang('site.report_biodata')
                </button>
            </div>
            <div id="report-biodata-form" style="display: none">
                @if (!$report)
                    <form action="{{ route('user.biodata_report', $biodata->id) }}" method="post" class="!mt-5">
                        @csrf
                        <div class="each-bio-other">
                            <div class="ebo-group">
                                <h3>@lang('site.report_biodata') </h3>
                                <div class="!p-5">
                                    <label class="block">@lang('site.report_reason')</label>
                                    <textarea name="report_reason" id="report_reason"
                                        class="w-full h-[100px] !my-3 !p-2 border-[1px] border-slate-200 shadow-slate-50 shadow-sm"
                                        placeholder="@lang('site.report_textarea_placeholder')" maxlength="200" required></textarea>
                                    <button type="submit"
                                        class="bg-primary-color text-white cursor-pointer !p-3 rounded-md font-semibold">@lang('site.submit')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="text-red-500 !font-semibold !mt-4">@lang('site.already_reported')</div>
                @endif
            </div>
        @endif
    </div>
</div>

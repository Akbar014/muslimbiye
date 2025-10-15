<div class="post_area p-5 ">
    <div class="flex">
        <div class="flex flex-auto">
            <div class="post_user w-11 h-10 p-1 border-secondary-color border-2 rounded-full">
                <img src="{{ asset('assets/frontend/res/images/icons/user_male.svg') }}" alt="user"
                    class="w-full max-h-full" />
            </div>
            <div class="ml-2">
                <div class="raleway font-[600] text-dark-color">মুসলিম বিয়ে - MuslimBie</div>
                <div class="raleway text-sm font-[200] text-gray-color">
                    {{ $data->created_at->format('j F, Y, g:i a') }}</div>
            </div>
        </div>
        <div class="inline-block flex-end dropdown">
            <div class="rounded-full hover:bg-slate-100 p-2 cursor-pointer">
                <img src="{{ asset('assets/frontend/res/images/icons/dots.svg') }}" alt="">
            </div>
            <ul class="dropdown-container bg-white rounded drop-shadow-2xl nav-dropdown">
                <li class="p-2 hover:bg-slate-200 rounded">
                    <a onclick="copyClipboard('{{ route('frontend.biodata_details', $data->id) }}')"
                        class="text-black inline-block w-full cursor-pointer">
                        Copy Link
                    </a>
                </li>
                <li class="p-2 hover:bg-slate-200 rounded">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ htmlentities(route('frontend.biodata_details', $data->id)) }}"
                        class="text-black inline-block w-full cursor-pointer">
                        Share to Facebook
                    </a>
                </li>
                <li class="p-2 hover:bg-slate-200 rounded">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ htmlentities(route('frontend.biodata_details', $data->id)) }}"
                        class="text-black inline-block w-full cursor-pointer">
                        Share to Linkedin
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main_post kalpurush mt-3 slide-read-more slide-read-more-{{ $data->id }}">
        <div class="shorifJonota px-3 py-1 requirement_btns text-secondary-color text-lg rounded inline-block">
            @lang($data->bride_groom == 'Groom' ? 'site.g_bride_wanted' : 'site.b_groom_wanted')
        </div>
        <ul class="bullet">
            <li><dfn>@lang($data->bride_groom == 'Groom' ? 'site.g_permanent_address' : 'site.b_permanent_address')</dfn> -
                @lang('site.' . strtolower($data->permanentDistrict))</li>
            <li><dfn>@lang($data->bride_groom == 'Groom' ? 'site.g_birth_year' : 'site.b_birth_year')</dfn> -
                {{ \Carbon\Carbon::parse($data->dateOfBirth)->format('Y') }}</li>
            <li class="cursor-pointer" onclick="copyClipboard('{{ $data->code }}')"><dfn>@lang('site.postcode')</dfn> -
                {{ $data->code }} <span class="text-slate-400 text-sm">(@lang('site.click_to_copy'))</span> </li>
        </ul>
        <div class="shorifJonota px-3 py-1 requirement_btns text-secondary-color text-lg rounded inline-block">
            @lang('site.personal_information')</div>
        <ul class="bullet">
            <li><dfn>@lang('site.father_occupation')</dfn> -
                @lang($data->fatherOccupation != 'other' ? 'site.' . (strtolower($data->fatherOccupation) ?? '') : $data->fatherOccupationCustom)
            </li>
            <li><dfn>@lang('site.mother_occupation')</dfn> -
                @lang($data->motherOccupation != 'other' ? 'site.' . (strtolower($data->motherOccupation) ?? '') : $data->motherOccupationCustom)
            </li>
            <li><dfn>@lang('site.permanent_address')</dfn> - {{ $data->permanentVillage }} ,{{ $data->permanentPostoffice }}
                , {{ $data->permanentThana }}, @lang('site.' . strtolower($data->permanentDistrict))
            </li>
            <li><dfn>@lang('site.present_address')</dfn> - {{ $data->presentVillage }} ,{{ $data->presentPostoffice }} ,
                {{ $data->presentThana }}, @lang('site.' . strtolower($data->presentDistrict))</li>
            <li><dfn>@lang('site.date_of_birth')</dfn> - {{ \Carbon\Carbon::parse($data->dateOfBirth)->format('j F, Y') }}
            </li>
            <li><dfn>@lang('site.height_only')</dfn> - {{ $data->heightFt }}' @lang('site.feet') {{ $data->heightInch }}"
                @lang('site.inch')
                ({{ $data->heightFt * (2.54 * 12) + $data->heightInch }} @lang('site.cm'))
            </li>
            <li><dfn>@lang('site.b_weight')</dfn> - {{ $data->weight }} @lang('site.kg')</li>
            <li><dfn>@lang('site.complexion')</dfn> - @lang('site.' . $data->complexion)</li>
            <li><dfn>@lang('site.blood_group')</dfn> - {{ $data->blood_groop }}</li>
            <li><dfn>@lang('site.educational_qualification')</dfn> - {{ $data->educationalQualification }}</li>
            <li><dfn>@lang('site.profession')</dfn> - @lang('site.' . strtolower($data->occupationWant))</li>
            <li><dfn>@lang('site.marital_status')</dfn> -
                @lang($data->bride_groom == 'Groom' ? 'site.' . strtolower($data->maritualStatusWant) : 'site.f_' . strtolower($data->maritualStatusWant))
            </li>
            @if ($data->divorceReason)
                <li><dfn>@lang('site.b_divorce_reason')</dfn> - {{ $data->divorceReason }}</li>
            @endif
            <li><dfn>@lang('site.political_view')</dfn> - {{ $data->politicalView }}</li>
            <li><dfn>@lang('site.madhhab')</dfn> -
                @lang($data->majhab != 'Others' ? 'site.' . strtolower($data->majhab) : $data->majhabDetails ?? '')
            </li>
            <li><dfn>@lang('site.b_self_description')</dfn> - {{ $data->aboutYourself }}</li>
        </ul>
        <div class="shorifJonota px-3 py-1 requirement_btns text-secondary-color text-lg rounded inline-block">
            @lang('site.family_information')
        </div>
        <ul class="bullet">
            <li>
                <dfn>@lang('site.brother') </dfn> -

                @if ($data->brotherNumber != 0)
                    {{ $data->brotherNumber }} @lang('site.person')
                @else
                    @lang('site.none')
                @endif

                <p>
                    @if ($brotherNameData != null)
                        <ul class="bullet ml-5">
                            @foreach ($brotherNameData as $a => $loop)
                                <li>
                                    @lang('site.educational_qualification') - {{ $brotherEduQualificationData[$a] }}<br />
                                    @lang('site.profession') - {{ $brotherOccupationData[$a] }}<br />
                                    @lang('site.marital_status') - @lang('site.' . strtolower($brotherMarritalStatusData[$a] ?? ''))
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </p>
            </li>
            <li>
                <dfn>@lang('site.sister') </dfn> -
                @if ($data->sisterNumber != 0)
                    {{ $data->sisterNumber }} @lang('site.person')
                @else
                    @lang('site.none')
                @endif
                <p>
                    @if ($sisterNameData != null)
                        <ul class="bullet ml-5">
                            @foreach ($sisterNameData as $a => $loop)
                                <li>
                                    @lang('site.educational_qualification') - {{ $sisterEduQualificationData[$a] }}<br />
                                    @lang('site.profession') - {{ $sisterOccupationData[$a] }}<br />
                                    @lang('site.marital_status') -
                                    @lang('site.f_' . strtolower($sisterMarritalStatusData[$a] ?? ''))
                                    @if ($data->brotherInLawStatus && $sisterMarritalStatusData[$a] == 'married')
                                        <br />
                                        @lang('site.brotherinlaw') {{ json_decode($data->brotherInLawStatus)[$a] }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </p>
            </li>
            <li>
                <dfn>@lang('site.financial_status')</dfn> - @lang('site.' . $data->financialStatus ?? '')
            </li>
            <li>
                <dfn>@lang('site.social_status')</dfn> - @lang('site.' . $data->socialStatus ?? '')
            </li>
            <li>
                <dfn>@lang('site.paternal_uncle') </dfn>
                -
                @if ($data->paternalUncleNumber != 0)
                    {{ $data->paternalUncleNumber }} @lang('site.person')
                @else
                    @lang('site.none')
                @endif
                <p>
                    @if ($paternalUncleNameData != null)
                        <ul class="bullet ml-5">
                            @foreach ($paternalUncleNameData as $a => $loop)
                                <li>
                                    @lang('site.educational_qualification') - {{ $paternalUncleEduQualificationData[$a] }}<br />
                                    @lang('site.profession') - {{ $paternalUncleOccupationData[$a] }}<br />
                                    @lang('site.marital_status') -
                                    @lang('site.' . strtolower($paternalUncleMarritalStatusData[$a] ?? ''))
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </p>
            </li>
            <li>
                <dfn>@lang('site.maternal_uncle') </dfn>
                -
                @if ($data->maternalUncleNumber != 0)
                    {{ $data->maternalUncleNumber }} @lang('site.person')
                @else
                    @lang('site.none')
                @endif
                <p>
                    @if ($maternalUncleNameData != null)
                        <ul class="bullet ml-5">
                            @foreach ($maternalUncleNameData as $a => $loop)
                                <li>
                                    @lang('site.educational_qualification') - {{ $maternalUncleEduQualificationData[$a] }}<br />
                                    @lang('site.profession') - {{ $maternalUncleOccupationData[$a] }}<br />
                                    @lang('site.marital_status') -
                                    @lang('site.' . strtolower($maternalUncleMarritalStatusData[$a] ?? ''))
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </p>
            </li>
        </ul>
        <div class="shorifJonota px-3 py-1 requirement_btns text-secondary-color text-lg rounded inline-block">
            @lang($data->bride_groom === 'Bride' ? 'site.bride_idea' : 'site.groom_idea')</div>
        <ul class="bullet">
            <li>
                <dfn>@lang('site.b_marriage_concept')</dfn>
                - {{ $data->concept_about }}
            </li>
            <li>
                <dfn>@lang('site.b_veil')</dfn>
                - {{ $data->vail }}
            </li>
            <li>
                @if ($data->bride_groom == 'Groom')
                    <dfn>@lang('site.wife_job_after_marriage')</dfn>
                    - {{ $data->job_permission }}
                @elseif ($data->bride_groom == 'Bride')
                    <dfn>@lang('site.b_job_after_marriage')?</dfn>
                    - {{ $data->job_join }}
                @endif

            </li>
            @if ($data->bride_groom == 'Groom')
                <li>
                    <dfn>@lang('site.beard')</dfn>
                    -
                    @if ($data->beards == 1)
                        @lang('site.yeap')
                    @else
                        @lang('site.no')
                    @endif
                </li>
            @endif

            <li>
                <dfn>@lang('site.watch_tv_music')</dfn>
                - {{ $data->tv_watch }}
            </li>
            <li>
                <dfn>@lang('site.recite_quran_correctly')</dfn>
                - {{ $data->music_listen }}
            </li>
            <li>
                <dfn>@lang('site.physical_mental_issue')</dfn>
                - {{ $data->physical_disability }}
            </li>
            <li>
                <dfn>@lang('site.perform_five_times_salah')</dfn>
                - {{ $data->salat }}
            </li>
            <li>
                <dfn>@lang('site.religious_effort')</dfn>
                - {{ $data->dini_mehonot }}
            </li>
        </ul>
        <div class="shorifJonota px-3 py-1 requirement_btns text-secondary-color text-lg rounded inline-block">
            @lang($data->bride_groom === 'Bride' ? 'site.expected_groom' : 'site.expected_bride')</div>
        <ul class="bullet">
            <li><dfn>@lang('site.b_exp_age')</dfn> - {{ $data->want_age }} </li>
            <li><dfn>@lang('site.complexion')</dfn> -
                @php
                    $allComplexions = json_decode($data->want_complexion);
                    $allDistricts = json_decode($data->want_district);
                @endphp
                @if (count($allComplexions) > 0)
                    @foreach ($allComplexions as $key=>$complexionSingle)
                        @lang('site.' . $complexionSingle), 
                    @endforeach
                @endif
            </li>
            <li><dfn>@lang('site.height_only')</dfn> - {{ $data->want_height }}</li>
            <li><dfn>@lang('site.b_weight')</dfn> - {{ $data->want_weight }}</li>
            <li><dfn>@lang('site.marital_status')</dfn> -
                @foreach (json_decode($data->want_maritualStatus) as $maritualStatus)
                    @lang($data->bride_groom == 'Groom' ? 'site.f_' . strtolower($maritualStatus) : 'site.' . strtolower($maritualStatus))
                    ,
                @endforeach
            </li>
            <li><dfn>@lang('site.educational_qualification')</dfn> - {{ $data->want_education }}</li>
            <li><dfn>@lang('site.district')</dfn> -
                @if (count($allDistricts) > 0)
                    @foreach ($allDistricts as $districtSingle)
                        @lang('site.' . strtolower($districtSingle)),
                    @endforeach
                @endif
            </li>
            <li><dfn>@lang('site.present_address')</dfn> - {{ $data->want_location }}</li>
            <li><dfn>@lang('site.profession')</dfn> - {{ $data->want_occupation }}</li>
            <li><dfn>@lang('site.b_exp_special_qualities')</dfn> - {{ $data->want_special_qualities }}</li>
        </ul>
        <div class="shorifJonota px-3 py-1 requirement_btns text-secondary-color text-lg rounded inline-block">
            @lang('site.communication_means')</div>
        <ul class="bullet">
            <li><dfn>@lang('site.guardians_acknowledgement')</dfn> -
                @if ($data->marage_plan == 'yes')
                    @lang('site.yeap')
                @elseif ($data->marage_plan == 'no')
                    @lang('site.no')
                @endif
            </li>
            <li><dfn>@lang('site.about_biodata_on_website')</dfn> -
                @if ($data->allow_post_blog == 'yes')
                    @lang('site.yeap')
                @elseif ($data->allow_post_blog == 'no')
                    @lang('site.no')
                @endif
            </li>
        </ul>
        <div class="shorifJonota px-3 py-1 requirement_btns text-secondary-color text-lg rounded inline-block">
            @lang('site.special_note')</div>
        <ul class="bullet">
            <li><dfn>@lang('site.call_if')</li>
            <li><dfn>@lang('site.confirm_by_phone')</li>
            <li><dfn>@lang('site.photo_share_permission')</dfn>
            </li>
        </ul>
        <div class="mt-8 mb-3">
            @if (Auth::guard('admin')->check())
                <button onclick="showModal('{{ $data->phone_no_1 }}','@lang('site.' . $data->relation_1)','{{ $data->email }}')"
                    class="bg-secondary-color text-white font-bold hindShiliguri py-2.5 px-4 rounded">@lang('site.click_here')</button>
            @else
                <a class="bg-secondary-color text-white font-bold hindShiliguri py-2.5 px-4 rounded cursor-pointer"
                    onclick="triggerNewWindow('{{ route('user.auth.login', ['newtab']) }}', this, `showModal('{{ $data->phone_no_1 }}','@lang('site.' . $data->relation_1)','{{ $data->email }}')`)">@lang('site.click_here')</a>
            @endif
        </div>
    </div>
    <div
        class="slide-read-more-button slide-read-more-button-{{ $data->id }} read-more-button-{{ $data->id }}">
        @lang('site.read_more')</div>
    <div class="slide-read-more-button slide-read-more-button-{{ $data->id }}">@lang('site.read_less')</div>
</div>
<div class="media_area mb-7">
    <img src="{{ asset($data->image) }}" alt="post" class="w-full" />
</div>

@php
    $setting = App\Models\Setting::first();
@endphp
<header>
    <div id="od_header">
        <div class="od-w-100">
            <div class="od-container">
                <div class="od-row od-align-items-center">
                    <div class="od-col-4 od-col-md-3 md-order-2">
                        <div class="od-site-logo">
                            <!-- <a href="{{ route('frontend.home') }}"><img
                                    src="https://muslimbie.com/storage/assets/images/logo/1753418699.jpg">
                                </a> -->
                            <!-- <a href="{{ route('frontend.home') }}"><img
                                    src="{{ asset('storage/' . $setting->logo ?? 'assets/images/logo/MuslimBie_1.png') }}">
                                </a> -->

                                 <!-- <a href="{{ route('frontend.home') }}"><img
                                    src="{{ asset('storage/' . $setting->logo ?? 'assets/images/logo/MuslimBie_1.png') }}">
                                </a> -->
                                 <a href="{{ route('frontend.home') }}"><img
                                    src="{{ asset('assets/logo/updated_logo.png') }}">
                                </a>
                                
                        </div>
                    </div>
                    <div class="od-col-4 od-col-md-6 md-order-1">
                        <div class="od-mobile-menu-trigger">
                            <a href="#"><i class="fa fa-bars"></i></a>
                        </div>
                        <nav class="od-menu-lists-container">
                            <ul class="od-menu-lists ">
                                <li class="od-menu-list-item"><a
                                        href="{{ route('frontend.home') }}">@lang('site.home')</a>
                                </li>
                                <li class="od-menu-list-item"><a
                                        href="{{ route('frontend.about_us') }}">@lang('site.about_us')</a></li>
                                <li class="od-menu-list-item"><a
                                        href="{{ route('frontend.faq') }}">@lang('site.faq')</a>
                                </li>
                                <li class="od-menu-list-item"><a
                                        href="{{ route('frontend.guide') }}">@lang('site.guide')</a>
                                </li>
                                <li class="od-menu-list-item"><a
                                        href="{{ route('frontend.contact_us') }}">@lang('site.contact_us')</a>
                                </li>
                                <li class="od-menu-list-item od-localization-container hide-od-xl">
                                    <a href="javascript:void(0);">
                                        <div class="od-localization-content od-display-flex od-align-items-center">
                                            <div class="od-icon"><i class="fa fa-language"></i></div>
                                            <div class="od-selected-language">
                                                <span>
                                                    {{ App::getLocale() == 'en' ? 'English' : 'বাংলা' }}
                                                </span>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="od-dropdown-menu-container od-animate od-slideIn">
                                        <div class="od-dropdown-menu-content">
                                            <ul class="od-dropdown-menu-lists">
                                                <li><a href="{{ route('frontend.lang', 'en') }}">English</a></li>
                                                <li><a href="{{ route('frontend.lang', 'bn') }}">বাংলা</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="od-col-4 od-col-md-3 md-order-3">
                        <div class="od-header-right-container">
                            <div class="od-menu-lists od-display-flex od-align-items-center od-justify-content-end">
                                <div class="od-menu-list-item">
                                    <div class="od-localization-container hide-od">
                                        <a href="javascript:void(0);">
                                            <div
                                                class="od-localization-content od-display-flex od-align-items-center text-secondary-color">
                                                <div class="od-icon"><i class="fa fa-language"></i></div>
                                                <div class="od-selected-language">
                                                    <span>
                                                        {{ App::getLocale() == 'en' ? 'English' : 'বাংলা' }}
                                                    </span>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <div
                                            class="od-dropdown-menu-container od-animate od-slideIn text-secondary-color ">
                                            <div class="od-dropdown-menu-content">
                                                <ul class="od-dropdown-menu-lists">
                                                    <li><a href="{{ route('frontend.lang', 'en') }}">English</a></li>
                                                    <li><a href="{{ route('frontend.lang', 'bn') }}">বাংলা</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::guard('user')->check())
                                    @php
                                        $user = Auth::guard('user')->user();
                                        $biodata = App\Models\Biodata::where([
                                            'user_id' => $user->id,
                                            'deleted' => '0',
                                            'admin_created' => '0',
                                        ])->first();
                                    @endphp
                                    <div class="od-menu-list-item">
                                        <div class="od-my-account-container">
                                            <a href="#"><i class="fa fa-user text-secondary-color"></i> <span
                                                    class="od-my-account-nav-text">@lang('site.my_account')</span></a>
                                            <div class="od-dropdown-menu-container od-animate od-slideIn">
                                                <div class="odd-user-info">
                                                    <img src="{{ asset('assets/images/users/' . ($user->gender == '1' ? 'nikab.PNG' : 'islamicMan.jpg')) }}"
                                                        alt="{{ $user->gender == '1' ? 'Fem' : 'M' }}ale-Avatar"
                                                        class="!mx-auto rounded-full">
                                                    <div class="odd-bio-status-wrap">
                                                        @if ($biodata)
                                                            <h3>@lang('site.biodata_status')</h3>
                                                        @endif
                                                        <div class="odd-bio-status">
                                                            @if (!$biodata)
                                                                {{-- <span class="od-incomplete"> <a
                                                                        href="{{ route('user.edit_biodata.index') }}"
                                                                        class="fw-bold !no-underline">@lang('site.no_biodata')</a></span> --}}
                                                            @elseif ($biodata->status == '0')
                                                                <span
                                                                    class="od-incomplete fw-bold">@lang('site.incomplete')</span>
                                                            @elseif($biodata->status == '1')
                                                                <span
                                                                    class="od-incomplete fw-bold">@lang('site.pending')</span>
                                                            @elseif($biodata->status == '2')
                                                                <span
                                                                    class="od-incomplete fw-bold">@lang('site.approved')</span>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="od-preview-biodata-link">
                                                        <a class="od-button"
                                                            href="{{ route('user.my_biodata') }}">{{ $biodata ? __('site.my_biodata') : __('site.create_biodata') }}</a>
                                                    </div>
                                                </div>
                                                <nav class="odd-nav od-dropdown-menu-content">
                                                    <ul class="od-dropdown-menu-lists">
                                                        <li>
                                                            <a href="{{ route('user.dashboard') }}">
                                                                <img src="https://ordhekdeen.com/images/dashborad-ico.svg"
                                                                    alt="Dashboard-icon">
                                                                @lang('site.dashboard')
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('user.edit_biodata.index') }}">
                                                                <img src="https://ordhekdeen.com/images/editbiodata-ico.svg"
                                                                    alt="Edit biodata-icon">
                                                                @lang('site.edit_biodata')
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('user.favourite') }}">
                                                                <img src="https://ordhekdeen.com/images/shortlist-ico.svg"
                                                                    alt="Shortlist-icon">
                                                                @lang('site.favourite_list')
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('user.my_purchases') }}">
                                                                <img src="https://ordhekdeen.com/images/mypurchased-ico.svg"
                                                                    alt="Mypurchased-icon">
                                                                @lang('site.purchase_list')
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('user.settings') }}">
                                                                <img src="https://ordhekdeen.com/images/settings-ico.svg"
                                                                    alt="Setting-icon">
                                                                @lang('site.settings')</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ URL::to('/user_login/logout') }}">
                                                                <img src="https://ordhekdeen.com/images/logout-ico.svg"
                                                                    alt="Logout-icon">
                                                                @lang('site.logout')
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="od-menu-list-item">
                                        <div class="od-my-account-container">
                                            <a class="od-button signin-button" href="{{ route('user.auth.login') }}"><i
                                                    class="fa fa-user"></i>
                                                <span style="white-space: nowrap;">@lang('site.login')</span></a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

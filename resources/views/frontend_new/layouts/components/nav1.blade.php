@php
$setting = App\Models\Setting::first();
@endphp
<div class="main_header_scvBG">


  <!-- mobile manue start -->
  <div class="menu-position hidden-md hidden-lg">
    <nav
      id="sidebar"
      class="mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar"
      style="overflow: visible">
      <div
        id="mCSB_1"
        class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside"
        style="max-height: 929px"
        tabindex="0">
        <div
          id="mCSB_1_container"
          class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
          style="position: relative; top: 0; left: 0"
          dir="ltr">
          <div
            id="mCSB_1"
            class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside"
            style="max-height: none"
            tabindex="0">
            <div
              id="mCSB_1_container"
              class="mCSB_container"
              style="position: relative; top: 0; left: 0"
              dir="ltr">
              <div id="dismiss" class="dismiss">
                <i class="fas fa-times" aria-hidden="true"></i>
              </div>
              <ul class="list-unstyled components" id="sidebar-2">
                <li><a href="{{ route('frontend.home') }}">@lang('site.home')</a></li>
                <li><a href="{{ route('frontend.about_us') }}">@lang('site.about_us')</a></li>
                <li>
                  <a href="{{ route('frontend.faq') }}">@lang('site.faq')</a>
                </li>
                <li>
                  <a href="{{ route('frontend.guide') }}">@lang('site.guide')</a>
                </li>
                <li>
                  <a href="{{ route('frontend.contact_us') }}">@lang('site.contact_us')</a>
                </li>

                <!-- <li>
                      <a href="#">Success Stories</a>
                    </li>
                    <li>
                      <a href="#">Contact Us</a>
                    </li>
                    <li>
                      <a href="#" class="nb-0">Register</a>
                    </li> -->

                @if (Auth::guard('user')->check())
                @php
                $user = Auth::guard('user')->user();
                $biodata = App\Models\Biodata::where([
                'user_id' => $user->id,
                'deleted' => '0',
                'admin_created' => '0',
                ])->first();
                @endphp
                <li>
                  <a href="{{ route('user.my_biodata') }}">{{ $biodata ? __('site.my_biodata') : __('site.create_biodata') }}</a>
                </li>
                
                <li>
                  <a href="{{ route('user.dashboard') }}">@lang('site.dashboard')</a>
                </li>
                

                @else
                  <div class="login-btn-bg">
                    <a href="{{ route('user.auth.login') }}" class="login-btn-main">
                      <span><img
                          src="{{ asset('assets') }}/svg/login-icon.svg"
                          alt=""
                          class="mCS_img_loaded" /></span>
                      @lang('site.login')</a>
                  </div>

                @endif





              </ul>
            </div>
          </div>
        </div>
      </div>
      <div
        id="mCSB_1_scrollbar_vertical"
        class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical"
        style="display: none">
        <div class="mCSB_draggerContainer">
          <div
            id="mCSB_1_dragger_vertical"
            class="mCSB_dragger"
            style="position: absolute; min-height: 50px; top: 0px">
            <div class="mCSB_dragger_bar" style="line-height: 50px"></div>
          </div>
          <div class="mCSB_draggerRail"></div>
        </div>
      </div>
    </nav>
    <div class="overlay" style="display: none"></div>
    <div class="container">
      <div class="row">
        <div class="nav-main">
          <div class="logo-mobile">
            <a href="/"><img src="{{ asset('assets/logo/updated_logo.png') }}" alt="logo" /></a>

          </div>
          <div class="left t-margin-top hidden-md hidden-lg">
            <div class="sidebar-icon">
              <img
                src="{{ asset('assets') }}/newImages/menu-bar.png"
                alt=""
                id="sidebarCollapse"
                class="side_cnf" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-----mobile menu end------>

  <!-----desk menu start------>
  <nav class="navbar-desk hidden-sm hidden-xs">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="flex_desk_menubar">
            <div class="nav-brand-logo">
              <a href="#"><img src="{{ asset('assets/logo/updated_logo.png') }}" alt="logo" /></a>
            </div>
            <ul class="menu-desk-link">
              <!-- <li class="active">
                <a href="#">Home</a>
              </li>
              <li>
                <a href="#">Membership</a>
              </li>
              <li>
                <a href="#">Success Stories</a>
              </li>
              <li>
                <a href="#">Contact Us</a>
              </li> -->
              <li><a href="{{ route('frontend.home') }}">@lang('site.home')</a></li>
                <li><a href="{{ route('frontend.about_us') }}">@lang('site.about_us')</a></li>
                <li>
                  <a href="{{ route('frontend.faq') }}">@lang('site.faq')</a>
                </li>
                <li>
                  <a href="{{ route('frontend.guide') }}">@lang('site.guide')</a>
                </li>
                <li>
                  <a href="{{ route('frontend.contact_us') }}">@lang('site.contact_us')</a>
                </li>
              <!-- <li>
                <a href="#" class="nb-0">Register</a>
              </li> -->
              
              
                @if (Auth::guard('user')->check())
                    <a href="{{ route('user.auth.login') }}" class="login-btn-main"><img src="{{ asset('assets') }}/svg/login-icon.svg" alt="login-icon" />@lang('site.dashboard')</a>
                @else
                    <a href="{{ route('user.auth.login') }}" class="login-btn-main"><img src="{{ asset('assets') }}/svg/login-icon.svg" alt="login-icon" />@lang('site.login')</a>
                @endif
                
            </ul>

          </div>
        </div>
      </div>
    </div>
  </nav>
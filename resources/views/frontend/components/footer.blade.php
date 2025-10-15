@php
    $setting = App\Models\Setting::first();
@endphp
<footer>
  <div class="top_footer py-20">
    <div class="lg:w-4/5 px-2 lg:px-0 mx-1 sm:mx-auto text-white">
      <div class="grid lg:grid-cols-12">
        <div class="lg:col-span-4 px-5">
          <div class="flex w-full items-end">
            <img src="{{url('storage/'.$setting->footer_logo?? 'assets/images/logo/secondary_logo.svg')}}" alt="MuslimBie" class="w-16" />
            <hr class="h-px flex-1 ml-2"/>
          </div>
          <p class="raleway mt-6 text-center lg:text-left">{{$setting->description}}</p>
          <div class="mt-11 text-center lg:text-left">
            <a target="_blank" href="{{$setting->social_facebook}}" class="inline-block">
              <img src="{{asset('assets/frontend/res/images/icons/facebook.svg')}}" alt="facebook" class="w-3 cursor-pointer mr-6"/>
            </a>
            <a target="_blank" href="{{$setting->social_insta}}" class="inline-block">
              <img src="{{asset('assets/frontend/res/images/icons/instagram.svg')}}" alt="instagram" class="w-5 cursor-pointer mr-6"/>
            </a>
            <a target="_blank" href="{{$setting->social_youtube}}" class="inline-block">
              <img src="{{asset('assets/frontend/res/images/icons/youtube.svg')}}" alt="youtube" class="w-6 cursor-pointer mr-6"/>
            </a>
            <a target="_blank" href="{{$setting->social_linkedin}}" class="inline-block">

              <img src="{{asset('assets/frontend/res/images/icons/linkedin.svg')}}" alt="linkedin" class="w-5 cursor-pointer mr-6"/>
            </a>
          </div>
        </div>
        <div class="lg:col-span-4 px-5 text-center lg:text-left mt-5 lg:mt-0">
          <div class="font-[700] text-2xl mt-4 footer_item_heading">@lang('site.useful_link')</div>
          <ul class="raleway font-[600] mt-5">
            <li class="mt-2">
              <a href="#" class="hover:text-primary-color ease-in-out duration-150">@lang('site.about_us')</a>
            </li>
            <li class="mt-2">
              <a href="#" class="hover:text-primary-color ease-in-out duration-150">@lang('site.tutorial')</a>
            </li>
            <li class="mt-2">
              <a href="#" class="hover:text-primary-color ease-in-out duration-150">@lang('site.blog')</a>
            </li>
            <li class="mt-2">
              <a href="#" class="hover:text-primary-color ease-in-out duration-150">@lang('site.privacy_policy')</a>
            </li>
            <li class="mt-2">
              <a href="#" class="hover:text-primary-color ease-in-out duration-150">@lang('site.terms_and_conditions')</a>
            </li>
          </ul>
        </div>
        <div class="lg:col-span-4 px-5 text-center lg:text-left mt-5 lg:mt-0">
          <div class="font-[700] text-2xl mt-4 footer_item_heading">@lang('site.contact_us')</div>
          <ul class="raleway mt-5">
            {{-- <li class="mt-3 flex items-center justify-center lg:justify-start">
              <img src="{{asset('assets/frontend/res/images/icons/call.svg')}}" alt="call" class="w-4 mr-6"/>
              <span class="roboto">01781-251002</span>
            </li> --}}
            <li class="mt-3 flex items-center justify-center lg:justify-start">
              <img src="{{asset('assets/frontend/res/images/icons/envelop.svg')}}" alt="envelop" class="w-4 mr-6"/>
              <span>{{$setting->email}}</span>
            </li>
            <li class="mt-3 flex items-center justify-center lg:justify-start">
              <img src="{{asset('assets/frontend/res/images/icons/location.svg')}}" alt="location" class="w-4 mr-6"/>
              <span>{{$setting->address}}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom_footer bg-secondary-color p-4 raleway text-sm text-white">
    <div class="customContainer">
      <div class="customGrid">
        <div class="col-span-6 text-center md:text-left">
          @lang('site.copyright')
        </div>
        <div class="col-span-6 text-center md:text-right">
          @lang('site.developed_by'): <a href="https://www.w3asolution.com" target="_blank" class="font-semibold hover:underline">W3aSolution</a>.
        </div>
      </div>
    </div>
  </div>
</footer>

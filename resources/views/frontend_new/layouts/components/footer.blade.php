@php
    $setting = App\Models\Setting::first();
@endphp
<footer>
    <div class="od-footer-content !bg-button-color"style="background: transparent linear-gradient(217deg, #1f0785 0%, #FF2ADE 100%) 0% 0% no-repeat padding-box;">
        <div class="od-container">
            <div class="od-item-container">
                <div class="od-row od-align-items-center od-justify-content-center">
                    <div class="od-footer-item text-center"><a href="{{ route('frontend.privacy_policy') }}">Privacy
                            Policy<br />গোপনীয়তার নীতিমালা</a></div>
                    <div class="od-footer-item text-center"><a href="{{ route('frontend.tos') }}">Terms &
                            Conditions<br />শর্তাবলী</a>
                    </div>
                    <div class="od-footer-item text-center"><a href="{{ route('frontend.refund_policy') }}">Refund
                            Policy<br />রিফান্ড পলিসি </a></div>
                </div>

            </div>

            <div class="od-social-icon">
                <a href="{{$setting->social_facebook}}" target="_blank"><i class="fa fa-facebook-square"></i></a>
                <a href="{{$setting->social_youtube}}" target="_blank"><i class="fa fa-youtube-play"></i></a>
            </div>
            <div class="flex items-center justify-center gap-3">
                <div class="od-footer-bottom-text">&copy; {{ date('Y') }} MuslimBiye.com.bd</div>
                {{-- <div>|</div>
              <div class="od-footer-bottom-text">@lang('site.developed_by'): <a href="http://w3asolution.com" class="font-bold !text-white !no-underline" target="_BLANK">W3aSolution</a></div> --}}
            </div>

            <div id="scrollUp" class="od-scrollTo-top">
                <a><i class="fa fa-angle-up"></i></a>
            </div>
        </div>
    </div>
</footer>

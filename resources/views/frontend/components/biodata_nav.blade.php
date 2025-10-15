<div class="nav-scroller py-1 mb-2 inline-block biodata-nav-container">
  <nav class="nav d-flex justify-content-between mt-2">
      <a class="biodata-nav mr-4 text-black {{$active=="1" ? "active" : ""}}" href="{{ route('frontend.personalinfo') }}">@lang('site.personal_information')</a>
      <a class="biodata-nav mr-4 text-black {{$active=="2" ? "active" : ""}}" href="{{ route('frontend.familyDetails') }}">@lang('site.details_family')</a>
      <a class="biodata-nav mr-4 text-black {{$active=="3" ? "active" : ""}}" href="{{ route('frontend.brideGroomMoreDetails') }}">
        @lang($biodata && $biodata->bride_groom === 'Bride'? 'site.details_bride': 'site.details_groom')</a>
      <a class="biodata-nav mr-4 text-black {{$active=="4" ? "active" : ""}}" href="{{ route('frontend.requirment') }}">
        @lang($biodata->bride_groom === 'Bride' ? "site.expected_groom" : "site.expected_bride")</a>
      <a class="biodata-nav text-black {{$active=="5" ? "active" : ""}}" href="{{ route('frontend.communication') }}">@lang('site.communication_means')</a>
  </nav>
</div>
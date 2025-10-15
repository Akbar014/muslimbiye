@php
    $i = 1;
@endphp
<div class="biodata_nav">
    <div class="biodata_nav_container">
        <div class="biodata_navigation" data-nav_id="general">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.general_info')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="address">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.address')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="education">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.educational_qualification')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="family">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.family_information')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="personal">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.personal_info')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="professional">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.professional_info')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="marrage">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.marital_info')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="expected">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.expected_life_partner')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="commitment">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.commitment')</span>
        </div>
        <div class="biodata_navigation" data-nav_id="contact">
            <span class="biodata_nav_number">{{ $i++ }}</span>
            <span class="biodata_nav_title">@lang('site.contact_us')</span>
        </div>
        <div class="biodata_nav_container_before"></div>
    </div>
</div>

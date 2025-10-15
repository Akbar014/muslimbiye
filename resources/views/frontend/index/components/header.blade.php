@php
    $setting = App\Models\Setting::first();
@endphp
{{-- header area --}}
<div class="w-4/5 px-2 lg:px-0 mx-auto">
    <div class="grid lg:grid-cols-12">
        <div class="col-span-6">
            <h1 class="balooDa2 text-4xl md:text-5xl pt-20 leading-normal md:leading-normal">
                <span class="text-gray-color">@lang('site.muslimbie_slogan_1')</span>
                <span class="text-black block font-bold">@lang('site.muslimbie_slogan_2')</span>
                <span class="text-primary-color block font-bold">@lang('site.muslimbie_slogan_3')</span>
            </h1>
            <p class="mt-8 hindShiliguri text-lg leading-8 text-gray-color mb-20">@lang('site.website_for_whom')
            </p>
            <div class="sm:flex align-baseline">
                <a href="{{ route('frontend.biodata') }}"
                    class="bg-secondary-color hover:bg-primary-color ease-in-out duration-200 text-white rounded py-5 px-8 raleway  font-[700] inline-block">@lang('site.make_biodata')</a>
                <a href="{{ $setting->ytLink ?? '' }}" class="inline-flex items-center mt-3 lg:mt-0 lg:pl-10" target="_BLANK">
                    <img src="{{ asset('assets/frontend/res/images/icons/play_btn.svg') }}" class="w-14" />
                    <span class="raleway inline-block font-[500] text-dark-color lg:ml-5 py-auto">@lang('site.how_to_make_biodata')</span>
                </a>
            </div>
        </div>
        <div class="aspect-square header_image bg-no-repeat bg-center bg-contain col-span-6 hindShiliguri font-[400] text-md text-gray-color leading-6 flex items-center justify-center"
            style="background-image: url('{{ asset('assets/frontend/res/images/icons/Love_1.svg') }}');">
            <div class="text-center ml-10">
                @lang('site.hadith')
            </div>
        </div>
    </div>
</div>
{{-- header area --}}

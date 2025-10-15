<div class="col-span-4">
    <div class="cv-card rounded-md m-4 drop-shadow-xl bg-white hover:bg-secondary-color mb-12 duration-300 ease-in">
        <div class="card-heading text-center pt-5">
            <div class="avatar w-24 aspect-square rounded-full bg-white drop-shadow-xl mx-auto overflow-hidden">
                @if ($data->bride_groom == 'Groom')
                <img src="{{ asset('assets/frontend/res/images/icons/groom.svg') }}"
                class="w-full" alt="bride" />
                @else
                <img src="{{ asset('assets/frontend/res/images/icons/bride.svg') }}"
                class="w-full" alt="bride" />
                @endif

            </div>
            <div class="raleway font-[700] text-dark-color text-2xl mt-4 hoverable-content">@lang('site.postcode')</div>
            <div class="roboto font-[700] text-gray-color mt-1 mb-7 hoverable-content">{{$data->code}}</div>
            <div class="grid grid-cols-2 gap-x-4 gap-y-2.5 px-5">
                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">@lang('site.marital_status')</div>
                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    @lang(
                    $data->bride_groom == 'Groom'
                    ? 'site.'.strtolower($data->maritualStatusWant)
                    : 'site.f_'.strtolower($data->maritualStatusWant)
                )
                </div>

                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    @lang('site.date_of_birth')</div>
                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    {{$data->dateOfBirth}}
                </div>

                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    @lang('site.height_only')
                </div>
                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    
                    {{$data->heightFt}} @lang('site.feet') {{$data->heightInch}} @lang('site.inch')</div>

                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    @lang('site.profession')
                </div>
                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    @lang('site.'.strtolower($data->occupationWant)??'')
                </div>

                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    @lang('site.address')
                </div>
                <div
                    class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                    @lang('site.'.strtolower($data->permanentDistrict))
                </div>
            </div>
            <a href="{{route('frontend.biodata_details',$data->id)}}"
                class="bg-white border border-secondary-color hover:bg-primary-color ease-in-out duration-200 hover:text-white text-secondary-color rounded py-2 px-4 raleway  font-[700] inline-block my-5">@lang('site.see_details')</a>
        </div>
    </div>
</div>
@php
    $brotherNameData = json_decode($data->brotherName);
    $brotherEduQualificationData = json_decode($data->brotherEduQualification);
    $brotherOccupationData = json_decode($data->brotherOccupation);
    $brotherMarritalStatusData = json_decode($data->brotherMarritalStatus);
    
    $sisterNameData = json_decode($data->sisterName);
    $sisterEduQualificationData = json_decode($data->sisterEduQualification);
    $sisterOccupationData = json_decode($data->sisterOccupation);
    $sisterMarritalStatusData = json_decode($data->sisterMarritalStatus);
    
    $paternalUncleNameData = json_decode($data->paternalUncleName);
    $paternalUncleEduQualificationData = json_decode($data->paternalUncleEduQualification);
    $paternalUncleOccupationData = json_decode($data->paternalUncleOccupation);
    $paternalUncleMarritalStatusData = json_decode($data->paternalUncleMarritalStatus);
    
    $maternalUncleNameData = json_decode($data->maternalUncleName);
    $maternalUncleEduQualificationData = json_decode($data->maternalUncleEduQualification);
    $maternalUncleOccupationData = json_decode($data->maternalUncleOccupation);
    $maternalUncleMarritalStatusData = json_decode($data->maternalUncleMarritalStatus);
@endphp
@extends('frontend.layouts.master')
@section('title')
{{$data->bride_groom == 'Groom'?'পাত্রের':'পাত্রীর' }} বায়োডাটা | বায়োডাটা নং.  {{$data->code}}
@endsection
@section('meta_img', $data->image)
@section('content')
    <div class="customContainer !mt-5">
        <div class="customGrid gap-4">
            <div class="col-span-4">
                <div class="cv-card rounded-md !mx-4 drop-shadow-xl bg-secondary-color !mb-12 duration-300 ease-in !pb-6">
                    <div class="card-heading text-center !pt-5">
                        <div class="avatar w-24 aspect-square rounded-full bg-white drop-shadow-xl !mx-auto overflow-hidden">
                            @if ($data->bride_groom == 'Groom')
                                <img src="{{ asset('assets/frontend/res/images/icons/groom.svg') }}" class="w-full"
                                    alt="groom" />
                            @else
                                <img src="{{ asset('assets/frontend/res/images/icons/bride.svg') }}" class="w-full"
                                    alt="bride" />
                            @endif

                        </div>
                        <div class="raleway font-[700] text-2xl !mt-4 text-white">@lang('site.postcode') </div>
                        <div class="roboto font-[700] !mt-1 !mb-7 text-white">{{ $data->code }}</div>
                        <div class="grid grid-cols-2 gap-x-4 gap-y-2.5 !px-5">
                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">@lang('site.marital_status')</div>
                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">
                                @lang(
                                    $data->bride_groom == 'Groom'
                                    ? 'site.'.strtolower($data->maritualStatusWant)
                                    : 'site.f_'.strtolower($data->maritualStatusWant)
                                )
                            </div>

                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">@lang('site.date_of_birth')</div>
                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">
                                {{ $data->dateOfBirth }}
                            </div>

                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">
                                @lang('site.height_only')
                            </div>
                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">
                                {{$data->heightFt}} @lang('site.feet') {{$data->heightInch}} @lang('site.inch')</div>

                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">
                                @lang('site.profession')
                            </div>
                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">
                                @lang('site.'.strtolower($data->occupationWant)??'')
                            </div>

                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">
                                @lang('site.address')
                            </div>
                            <div class="bg-primary-purple-color text-gray-color text-sm raleway !py-3 rounded">
                                @lang('site.'.strtolower($data->permanentDistrict))
                            </div>
                        </div>
                        {{-- <a href="{{ route('frontend.biodata_details', $data->id) }}"
                            class="bg-white border border-secondary-color hover:bg-primary-color ease-in-out duration-200 hover:text-white text-secondary-color rounded !py-2 !px-4 raleway  font-[700] inline-block !my-5">@lang('site.see_details')</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                @include('frontend.components.post')
            </div>
        </div>
    </div>
    <div class="w-screen h-screen fixed top-0 left-0 raleway hidden bg-black/40 modal-bg contact-modal z-50">
        <div class="nav-gap"></div>
        <div class="modal-container max-w-3xl bg-white !mx-auto !mt-16 hindShiliguri rounded-xl overflow-hidden">
            <div class="modal-header text-center bg-secondary-color text-white font-bold text-2xl !py-2.5 relative">
                @lang('site.communication_means')
            </div>
            <div class="modal-body !px-6 md:px-20 !py-6 ">
                <div class="text-center">
                    <div class="inline-flex !mx-auto text-base">
                        <img src="{{ asset('assets/frontend/res/images/icons/phone.svg') }}" class="w-3" alt="phone">
                        <span class="!mx-1 font-semibold" id="biodata_phone_number"></span>
                        <span class="!mx-1 font-light" id="biodata_phone_owner"></span>
                    </div><br />
                    <div class="inline-flex !mx-auto text-base">
                        <img src="{{ asset('assets/frontend/res/images/icons/envalope.svg') }}" class="w-3"
                            alt="email">
                        <span class="!mx-1 font-semibold" id="biodata_email"></span>
                    </div>
                </div>
                <p class="text-center !mt-5 text-slate-600">
                    * @lang('site.call_if')<br/>
                    * @lang('site.confirm_by_phone')<br/>
                    * @lang('site.photo_share_permission')
                </p>
                <button class="!mx-auto block bg-secondary-color text-white !mt-8 !px-3.5 !py-1.5 rounded-md"
                    onclick="okayBtn()">@lang('site.okay')</button>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        function showModal(biodata_phone_number, biodata_phone_owner, biodata_email) {
            document.getElementById('biodata_phone_number').innerHTML = biodata_phone_number;
            document.getElementById('biodata_email').innerHTML = biodata_email;
            document.getElementById('biodata_phone_owner').innerHTML = `(${biodata_phone_owner})`;
            $(".contact-modal").removeClass('hidden');
        }

        function okayBtn() {
            $(".contact-modal").addClass('hidden');
        }
    </script>
@endsection

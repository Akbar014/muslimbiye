@extends('frontend.layouts.master')
@section('title', 'Communication')
@section('content')
    <div class="customContainer raleway">
        @error('message')
            <div class="alert-success">{{ $message }}</div>
        @enderror
        @include('frontend.components.biodata_nav', ["active"=>'5'])
        <h2 class="text-center my-8 text-4xl font-bold">@lang('site.communication_means')</h2>
        <form id="finalSubmitForm"  class="preventEnter">
            @csrf
            <div class="mb-3 customGrid gap-4">
                <div class="col-span-6">
                    <label class="form-label block" for="form3Example3c">@lang('site.guardians_acknowledgement')<span class="font-semibold">*</span></label>
                    &nbsp;
                    &nbsp;
                    <label class="flex items-center mr-3 mt-2  biodata-radio cursor-pointer">
                        <input class="w-5 h-5 border-gray-300" type="radio"
                            {{ $biodata->marage_plan ?? old('marage_plan') == 'yes' ? 'checked' : '' }} name="marage_plan"
                            id="marage_plan1" value="yes">
                        <span class="ml-2 text-gray-900" for="marage_plan1">@lang('site.yes')</span>
                    </label>
                    <label class="flex items-center mr-3 mt-2  biodata-radio cursor-pointer">
                        <input class="w-5 h-5 border-gray-300" type="radio"
                            {{ $biodata->marage_plan ?? old('marage_plan') == 'no' ? 'checked' : '' }} name="marage_plan"
                            id="marage_plan2" value="no">
                        <span class="ml-2 text-gray-900" for="marage_plan2">@lang('site.no')</span>
                    </label>
                    <div class="alert text-red-600" id="error_marage_plan"></div>
                </div>
                <div class="col-span-6">
                    <label class="form-label block" for="form3Example3c">@lang('site.about_biodata_on_website')<span class="font-semibold">*</span></label>
                    &nbsp;
                    &nbsp;
                    <label class="flex items-center mr-3 mt-2  biodata-radio cursor-pointer">
                        <input class="w-5 h-5 border-gray-300" type="radio"
                            {{ $biodata->allow_post_blog ?? old('allow_post_blog') == 'yes' ? 'checked' : '' }}
                            name="allow_post_blog" id="inlineRadio1" value="yes">
                        <span class="ml-2 text-gray-900" for="inlineRadio1">@lang('site.yes')</span>
                    </label>
                    <label class="flex items-center mr-3 mt-2  biodata-radio cursor-pointer">
                        <input class="w-5 h-5 border-gray-300" type="radio"
                            {{ $biodata->allow_post_blog ?? old('allow_post_blog') == 'no' ? 'checked' : '' }}
                            name="allow_post_blog" id="inlineRadio2" value="no">
                        <span class="ml-2 text-gray-900" for="inlineRadio2">@lang('site.no')</span>
                    </label>
                    <div class="alert text-red-600" id="error_allow_post_blog"></div>
                </div>

                <div class="col-span-12">
                    <label class="form-label block" for="form3Example1c">
                        @lang('site.phone_numbers_male_guardians_will_be_verified')
                    </label>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label class="form-label block" for="form3Example1c">@lang('site.number_1')</label>
                        <input type="number" name="phone_no_1" value="{{ $biodata->phone_no_1 ?? old('phone_no_1') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="+880123456789" minlength="11"/>
                        <div class="alert text-red-600" id="error_phone_no_1"></div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label class="form-label block" for="form3Example1c">@lang('site.name')<span
                                class="font-semibold">*</span></label>
                        <input type="text" name="name_1" value="{{ $biodata->name_1 ?? old('name_1') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color" placeholder="@lang('site.name')" />
                        <div class="alert text-red-600" id="error_name_1"></div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label class="form-label block" for="form3Example1c">@lang('site.relationship')<span
                                class="font-semibold">*</span></label>
                        <select name="relation_1" value="{{ $biodata->relation_1 ?? old('relation_1') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow">
                            <option value="father">@lang('site.father')</option>
                            <option value="paternalUncle">@lang('site.paternalUncle')</option>
                            <option value="maternalUncle">@lang('site.maternalUncle')</option>
                            <option value="paternalGrandFather">@lang('site.paternalGrandFather')</option>
                            <option value="maternalGrandFather">@lang('site.maternalGrandFather')</option>
                            <option value="brother">@lang('site.brother')</option>
                            <option value="brotherInLaw">@lang('site.brotherInLaw')</option>
                        </select>
                        <div class="alert text-red-600" id="error_relation_1"></div>
                    </div>
                </div>



                <div class="col-span-4">
                    <div class="mb-3">
                        <label class="form-label block" for="form3Example1c">@lang('site.number_2')<span
                                class="font-semibold">*</span></label>
                        <input type="number" name="phone_no_2" value="{{ $biodata->phone_no_2 ?? old('phone_no_2') }}"  minlength="11"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="+880123456789" />
                        <div class="alert text-red-600" id="error_phone_no_2"></div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label class="form-label block" for="form3Example1c">@lang('site.name')<span
                                class="font-semibold">*</span></label>
                        <input type="text" name="name_2" value="{{ $biodata->name_2 ?? old('name_2') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color" placeholder="@lang('site.name')" />
                        <div class="alert text-red-600" id="error_name_2"></div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label class="form-label block" for="form3Example1c">@lang('site.relationship')<span
                                class="font-semibold">*</span></label>
                        <select name="relation_2" value="{{ $biodata->relation_2 ?? old('relation_2') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow">
                            <option value="father">@lang('site.father')</option>
                            <option value="paternalUncle">@lang('site.paternalUncle')</option>
                            <option value="maternalUncle">@lang('site.maternalUncle')</option>
                            <option value="paternalGrandFather">@lang('site.paternalGrandFather')</option>
                            <option value="maternalGrandFather">@lang('site.maternalGrandFather')</option>
                            <option value="brother">@lang('site.brother')</option>
                            <option value="sister">@lang('site.sister')</option>
                            <option value="mother">@lang('site.mother')</option>
                            <option value="brotherInLaw">@lang('site.brotherInLaw')</option>
                        </select>
                        <div class="alert text-red-600" id="error_relation_2"></div>
                    </div>
                </div>

                <div class="col-span-12">
                    <div class="mb-3">
                        <label class="form-label block" for="form3Example1c">@lang('site.email')<span
                            class="font-semibold">*</span></label>
                        <input type="email" name="email" value="{{ $biodata->email ?? old('email') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color" placeholder="@lang('site.email_correct')" />
                        <div class="alert text-red-600" id="error_email"></div>
                    </div>
                </div>
            </div>

            <div> <span class="font-semibold text-primary-color font-2xl"><b>@lang('site.special_note')</b></span>
                <ul class="text-slate-600 biodata_rules ml-4 text-base leading-4 mt-3">
                    <li>@lang('site.call_if')</li>
                    <li>@lang('site.confirm_by_phone')</li>
                    <li>@lang('site.photo_share_permission')</li>
                </ul>
            </div>
            <div class="mt-4">
                <input class="w-5 h-5 border-gray-300 mr-2" required type="checkbox" value=""
                    id="flexCheckIndeterminate" onchange="submitCheck()">
                <span class="text-primary-color font-bold cursor-pointer">
                    <label for="flexCheckIndeterminate">@lang('site.terms_conditions_acceptance')</label>
                </span>
            </div>

            <div class="mt-4 flex">
                <input type="checkbox" id="promise" class="w-5 h-5 border-gray-300 mr-2" onchange="submitCheck()">
                <label class="cursor-pointer" for="promise">@lang('site.all_info_correct_oath') </label>
            </div>

            <div class="customGrid gap-4 mt-5">
                <div class="col-span-6">
                    <a href="{{ route('frontend.requirment') }}"
                        class="inline-block bg-secondary-color rounded text-white py-2 px-5 text-lg mb-4" type="submit">
                        <span class="flex font-bold">
                            <img src="{{ asset('assets/frontend/res/images/icons/arrow_left_small.svg') }}"
                                alt="" class="w-4 mr-2">
                                @lang('site.back')
                        </span>
                    </a>
                </div>
                <div class="col-span-6">
                    <button class="block ml-auto bg-secondary-color rounded text-white py-2 px-5 text-lg mb-4"
                        type="submit" id="submitBtn" disabled>
                        <span class="flex  font-bold">
                            @lang('site.submit_for_review')
                            <img src="{{ asset('assets/frontend/res/images/icons/arrow_right_small.svg') }}"
                                alt="" class="w-4 ml-2">
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="w-screen h-screen fixed top-0 left-0 raleway bg-black/40 modal-bg hidden success-modal">
        <div class="nav-gap"></div>
        <div class="modal-container max-w-3xl bg-white mx-auto mt-16 hindShiliguri rounded-xl overflow-hidden">
            <div class="modal-header text-center bg-secondary-color text-white font-bold text-2xl py-2.5 relative">
                অভিনন্দন
                <img src="{{ asset('assets/frontend/res/images/icons/close.svg') }}" alt="close"
                    class="w-5 h-5 absolute right-3 top-4 cursor-pointer" onclick="okayBtn()">
            </div>
            <div class="modal-body px-6 md:px-20 py-6 ">
                <p class="text-center">বায়োডাটা পাঠানোর জন্য ধন্যবাদ! বায়োডাটায় প্রদত্ত সকল তথ্য ভেরিফাই করে পাবলিশ করা
                    হবে ইনশাআল্লাহ! এই প্রক্রিয়ায় ২-৫ দিন সময় লাগতে পারে। নির্ধারিত সময়ের মধ্যে পাবলিশ না হলে অনুগ্রহ করে
                    পেইজ এ যোগাযোগ করুন। জাযাকাল্লাহু খইরান !</p>
                <p class="text-center mt-5">আপনার আত্নীয় এবং বন্ধুদের মুসলিম বিয়ে সম্পর্কে জানাতে ভুলবেন না।<br />জয়েন করুন
                    আমাদের ফেসবুক গ্রুপ <a class="text-blue-600 font-semibold hover:underline"
                        href="https://www.facebook.com/groups/muslimbiebd">“মুসলিম বিয়ে - MuslimBie”</a> তে।<br />ফলো করুন
                    আমাদের ফেসবুক পেইজ <a class="text-blue-600 font-semibold hover:underline"
                        href="https://www.facebook.com/muslimbiebd/">“মুসলিম বিয়ে - MuslimBie”</a> কে।</p>
                <button class="!mx-auto block bg-secondary-color text-white mt-10 px-3.5 py-1.5 rounded-md"
                    onclick="okayBtn()">ঠিক আছে</button>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById('finalSubmitForm').addEventListener('submit', function(e) {
            e.preventDefault();
            $("#submitBtn").prop('disabled', true);
            $("#submitBtn").text("Submitting...");
            let myData = new FormData($("#finalSubmitForm")[0]);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            myData.append('_token', CSRF_TOKEN);
            $.ajax({
                url: "{{ route('frontend.personalInfoProcessStepCompelete') }}",
                type: 'POST',
                data: myData,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#submitBtn").prop('disabled', false);
                    $("#submitBtn").text("Submit For Review");
                    if (data.type === 'success') {
                        $(".success-modal").removeClass('hidden');
                    } else if (data.type == "error") {
                        @if (env('APP_DEBUG', false))
                            console.log(data);
                        @endif
                        if (data.errors) {
                            $.each(data.errors, function(key, val) {
                                toastr.error(val[0]);
                                $('#error_' + key).html(val[0]);
                            });
                        }else {
                            toastr.error('something went wrong. please try again later.');
                        }
                    } else {
                        @if (env('APP_DEBUG', false))
                            console.log(data);
                        @endif
                        toastr.error('something went wrong. please try again later.');
                    }
                },
                error: function(errors) {
                    @if (env('APP_DEBUG', false))
                        console.log(data);
                    @endif
                    $("#submitBtn").props('disabled', false);
                    $("#submitBtn").text("Submit For Review");
                    toastr.error('something went wrong. please try again later.');
                }
            });
        });

        function okayBtn() {
            window.location.href = "{{ route('frontend.home') }}";
        }


        function submitCheck() {
            let tosAccept = $('#flexCheckIndeterminate').prop('checked');
            let promiseAccept = $('#promise').prop('checked');
            let submitBtn = $('#submitBtn');
            if (tosAccept && promiseAccept) {
                submitBtn.prop('disabled', false)
            } else {
                submitBtn.prop('disabled', true)
            }
        }
    </script>
@endsection

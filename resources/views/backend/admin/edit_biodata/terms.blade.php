@extends('backend.layouts.master')
@section('title', 'Biodata')
@section('content')
    <div class="odd-content">
        <form method="post" action="{{ route('admin.biodata.store') }}"
            class="odd-content-inner pledge-page form-horizontal">
            <div class="odd-content-title">
                <div class="od-row">
                    <div class="od-col-12">
                        <h1 class="!text-3xl">মুসলিম বিয়ে ডটকম এ বায়োডাটা জমা দেয়ার নূন্যতম আবশ্যকতা</h1>
                    </div>
                </div>
            </div>

            <div class="!mx-auto max-w-[500px]">
                <div class="od-form-group-container required-field w-full">
                    <div class="od-form-group-label">
                        <label>বায়োডাটার ধরণ <span class="od-required-label">*</span></label>
                    </div>
                    <div class="od-form-group-input od-custom-drop_down_select_box">
                        <select
                            class="od-biodata-gender-field od-field-type__selectbox form-control select2 od-profile-field-select-control od-biodata-advanced-count-field select2-hidden-accessible"
                            onchange="if(this.value=='deen'){document.getElementById('deen_rules').style.maxHeight='400px'; document.getElementById('general_rules').style.maxHeight='0px'}else{document.getElementById('general_rules').style.maxHeight='400px'; document.getElementById('deen_rules').style.maxHeight='0px'}"
                            style="width: 100%" name="biodata_type" id="biodata_type" required>
                            <option value="">নির্বাচন করুন</option>
                            <option value="general">জেনারেল</option>
                            <option value="deen">দ্বীনদার জেনারেল, আলেম-আলেমা</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="od-primary-terms max-h-0 overflow-hidden duration-300" id="deen_rules">
                <div class="od-row">
                    <div class="od-col-12 od-col-sm-6 for-male">
                        <img src="{{ asset('assets/images/users/islamicMan.jpg') }}" alt="Male Icon">
                        <!-- <h2>user-account.menu_list.pledge.for_men</h2> -->
                        <ul>
                            <li><input type="checkbox" name="term_2" class="!mr-2">৫ ওয়াক্ত নামাযী হতে হবে।
                            </li>
                            <li><input type="checkbox" name="term_2" class="!mr-2">ওয়াজিব দাড়ি সুন্নতি
                                পদ্ধতিতে বড় থাকতে হবে। </li>
                            <li><input type="checkbox" name="term_2" class="!mr-2">টাখনুর উপর কাপড় পরিধান করতে
                                হবে। </li>
                            <li><input type="checkbox" name="term_2" class="!mr-2">অভিভাবকের অনুমতি নিতে হবে।
                            </li>
                        </ul>
                    </div>
                    <div class="od-col-12 od-col-sm-6 for-female">
                        <img src="{{ asset('assets/images/users/nikab.PNG') }}" alt="Female Icon">
                        <!-- <h2>user-account.menu_list.pledge.for_woman</h2> -->

                        <ul>
                            <li> <input type="checkbox" name="term_2" class="!mr-2">৫ ওয়াক্ত নামাযী হতে হবে।
                            </li>
                            <li><input type="checkbox" name="term_2" class="!mr-2">নিকাব সহ ফরজ পর্দানশীন হতে
                                হবে। </li>
                            <li><input type="checkbox" name="term_2" class="!mr-2">অভিভাবকের অনুমতি নিতে হবে।
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="od-primary-terms max-h-0 overflow-hidden duration-300" id="general_rules">
                <div class="for-male !mx-auto">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/images/users/smile.png') }}" alt="Male Icon">
                        <img src="{{ asset('assets/images/users/generalFemale.jpg') }}" alt="Male Icon">
                    </div>
                    <!-- <h2>user-account.menu_list.pledge.for_men</h2> -->
                    <ul class="ml-3">
                        <li>সকল মুসলিম পাত্রপাত্রী বায়োডাটা পুরণ করতে পারবেন।</li>
                    </ul>
                </div>
            </div>

            <div>
                @csrf
                <div class="od-acceptance !pt-0">
                    <h2 class="!mt-0 ">অঙ্গীকারনামা<span class="od-required-label">*</span></h2>
                    <div class="each-pledge">
                        <label><input type="checkbox" name="term_1" required>আমি সাক্ষ্য দিচ্ছি যে, আমি
                            বায়োডাটার
                            তথ্যগুলো
                            সত্য প্রদান
                            করবো।</label>
                    </div>
                    <div class="each-pledge">
                        <label><input type="checkbox" name="term_2" required>আমি মুসলিম বিয়ে ডটকম এ বায়োডাটা
                            তৈরি করার
                            বিষয়ে আমার
                            অভিভাবকের অনুমতি নিয়েছি।</label>
                    </div>
                    <div class="each-pledge">
                        <label><input type="checkbox" name="term_3" required>আমি যদি কোনো মিথ্যা তথ্য প্রদান
                            করি তাহলে
                            প্রচলিত আইনগত
                            এবং আখিরাতের দায়ভার মুসলিম বিয়ে ডটকম নিবে না।</label>
                    </div>


                    {{-- <div class="!my-10 text-center  max-h-[400px] overflow-hidden duration-200" id="terms_btn">
                  <button class="text-white text-2xl bg-secondary-color !px-10 !py-4 rounded-full"
                      type="button"
                      onclick="document.getElementById('terms_btn').style.maxHeight='0px'; document.getElementById('biodata_section').style.maxHeight='400px'">আমি
                      শর্তসমুহ মেনে চলবো</button>
              </div> --}}

                    <div class="col-span-12">
                        <div class="od-bio-create">
                            <button class="od-bio-create-btn" type="submit">আপনার বায়োডাটা তৈরি
                                করুন</button>
                        </div>
                    </div>

                    <div class="row max-h-0 overflow-hidden duration-200" id="biodata_section">
                        {{-- <div class="col-span-12 md:col-span-6">
                      <div class="od-form-group-container required-field">
                          <div class="od-form-group-label">
                              <label>কার জন্য বায়োডাটা তৈরি করবেন? <span
                                      class="od-required-label">*</span></label>
                          </div>
                          <div class="od-form-group-input od-custom-drop_down_select_box">
                              <select
                                  class="od-biodata-gender-field od-field-type__selectbox form-control select2 od-profile-field-select-control od-biodata-advanced-count-field select2-hidden-accessible"
                                  style="width: 100%" name="bride_groom" id="bride_groom" required>
                                  <option value="">নির্বাচন করুন</option>
                                  <option value="groom">পাত্রের জন্য</option>
                                  <option value="bride">পাত্রীর জন্য</option>
                              </select>
                          </div>
                      </div>
                  </div> 
               <div class="col-span-12 md:col-span-6">
                      <div class="od-form-group-container required-field">
                          <div class="od-form-group-label">
                              <label>বৈবাহিক অবস্থা <span class="od-required-label">*</span></label>
                          </div>

                          <div class="od-form-group-input od-custom-drop_down_select_box">
                              <select
                                  class="od-field-type__selectbox form-control select2 od-profile-field-select-control od-biodata-advanced-count-field select2-hidden-accessible"
                                  style="width: 100%" name="marital_status" id="marital_status"
                                  onchange="formsController(this)" required>
                                  <option value="">নির্বাচন করুন</option>
                                  <option value="unmarried">অবিবাহিত</option>
                                  <option value="married">বিবাহিত</option>
                                  <option value="divorced">ডিভোর্সড</option>
                                  <option value="widow">বিধবা</option>
                                  <option value="widower">বিপত্নীক</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-span-12">
                      <div class="od-bio-create">
                          <button class="od-bio-create-btn" type="submit">আপনার বায়োডাটা তৈরি
                              করুন</button>
                      </div>
                  </div> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend_new/css/css-ordhekdeen-frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend_new/css/main.min.css') }}">
@endsection
@section('js')

@endsection

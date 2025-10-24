@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')

    <div class="od-content-main overflow-hidden">
        <div class="od-user-account-container">
            <div class="od-row">
                @include('frontend_new.user.components.sidebar')
                <div class="odd-content">
                    <form method="post" action="{{ route('user.edit_biodata.biodata') }}"
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
                                        onchange="if(this.value=='deen'){document.getElementById('deen_rules').style.maxHeight='900px'; document.getElementById('general_rules').style.maxHeight='0px'}else{document.getElementById('general_rules').style.maxHeight='400px'; document.getElementById('deen_rules').style.maxHeight='0px'}"
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
                                    <img src="{{ asset('assets/images/users/generalMale.jpeg') }}" alt="Male Icon">
                                    <img src="{{ asset('assets/images/users/generalFemale.jpeg') }}" alt="Male Icon">
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
            </div>
        </div>
    </div>

<style>
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .custom-modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        width: 700px;
        max-width: 90%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .close-btn {
        float: right;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }

    #approvalModal p {
        line-height: 200%;
    }

    .create-biodata-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 10px 25px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 600;
    margin-top: 8px;
    background: #1f0785;
    color: #fff;
    box-shadow: 0 3px 10px rgba(175, 33, 153, 0.25);
    transition: all 0.25s ease;
    }

    .create-biodata-btn:hover {
    transform: translateY(-2px);
    }

    .create-biodata-btn svg {
    pointer-events: none;
    }

</style>
        <div id="afterFinalSubmit" class="custom-modal">
        <div class="custom-modal-content">
            <span id="closeModalBtn2" class="close-btn">&times;</span>
            <h2
                style="
                    background: linear-gradient(217deg, #1f0785 0%, #af2199 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;    padding: 5px; 
                ">
                মুসলিম বিয়ে
            </h2>

            <p style="color: black;"> আপনার বায়োডাটা সাবমিট করুন।</p>
            <p style="color: black;">!!! বায়োডাটা সাবমিট করলে আপনি পাচ্ছেন ১০ টি এক্সক্লুসিভ কানেকশন
                একদম ফ্রি !!!
            <p>
                
            <a href="{{ route('user.edit_biodata.index') }}"
            class="create-biodata-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 16 16">
                    <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z"></path>
                </svg>
                বায়োডাটা তৈরি করুন
            </a>
        </div>
    </div>


@endsection
@section('js')
    <script>
        localStorage.setItem('biodataNav', 0);
        // $(document).ready(function() {
        //     $('.select2').select2({
        //         placeholder: "নির্বাচন করুন",
        //         allowClear: true
        //     });
        // });
    </script>

    @if (session('show_login_modal'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal2 = document.getElementById('afterFinalSubmit');
            var close2 = document.getElementById('closeModalBtn2');
            if (!modal2 || !close2) return;

            modal2.style.display = 'flex';

            // close handlers
            function hideModal2() {
                modal2.style.display = 'none';
            }
            close2.addEventListener('click', hideModal2);
            window.addEventListener('click', function(e) {
                if (e.target === modal2) hideModal2();
            });
            window.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') hideModal2();
            });
        });
    </script>
@endif
@endsection

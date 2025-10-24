@php
  use Illuminate\Support\Facades\Auth;
  use App\Models\Biodata;

  $viewer     = Auth::guard('user')->user();
  $isGuest    = !$viewer;
  $hasApproved= false;

  if ($viewer) {      
      $hasApproved = Biodata::where('user_id', $viewer->id)
                      ->where('status', 2)
                      ->where('deleted', '0')
                      ->exists();
  }

  $canViewDetails = !$isGuest && $hasApproved;
@endphp


@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')

@section('css')
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
            width: 400px;
            max-width: 90%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .close-btn {
            float: right;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
@endsection


@section('content')
    <div class="od-content-main">

        <div class="od-biodatas-container">
            <div class="od-row !mt-10">
                <div class="od-col-12">
                    <div class="odbc-head">
                        <div class="odbc-title-group">
                            <!--<h1 class="text-4xl text-secondary-color">@lang('site.all_biodata')</h1>-->
                            <h1 class="text-4xl text-secondary-color">সার্চ রেজাল্ট</h1>
                            <!--<p class="result-found result-found__desktop">{{ $totalCount }} @lang('site.biodata_found')!</p>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="od-row">
                @forelse ($result as $biodata)
                    @include('frontend_new.layouts.components.biodata_card', 
                    ['biodata' => $biodata, 'canViewDetails' => $canViewDetails])
                @empty
                    <div class="od-col-12">
                        <div class="text-center">@lang('site.biodata_not_found')</div>
                    </div>
                @endforelse

            </div>

            <div class="od-row od-col-12">
                <div class="pagination !mx-3 !mb-20 text-center relative">
                    @if ($result->previousPageUrl() != null)
                        <div class="left_arrow" style="display: inline-block">
                            <a href="{{ route('frontend.search') }}{{ $result->previousPageUrl() }}"
                                class="hoverable-btn bg-secondary-color hover:bg-primary-color ease-in-out duration-200 !text-white rounded-1 !py-2 !px-4 raleway  font-[700] inline-block !my-5 !mx-auto !no-underline">
                                <img class="inline-block !mr-2 sm:ml-4"
                                    src="{{ asset('assets/frontend/res/images/icons/arrow_left_small.svg') }}" />
                                @lang('site.previous_page')
                            </a>
                        </div>
                    @endif
                    @if ($result->nextPageUrl() != null)
                        <div class="right_arrow" style="display: inline-block">
                            <a href="{{ route('frontend.search') }}{{ $result->nextPageUrl() }}"
                                class="hoverable-btn bg-secondary-color hover:bg-primary-color ease-in-out duration-200 !text-white rounded-1 !py-2 !px-4 raleway  font-[700] inline-block !my-5 !mx-auto !no-underline">@lang('site.next_page')
                                <img class="inline-block !ml-2 sm:ml-4"
                                    src="{{ asset('assets/frontend/res/images/icons/arrow_right_small.svg') }}" />
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>



    <div id="loginAlertModal" class="custom-modal">
        <div class="custom-modal-content">
            <span id="closeModalBtn2" class="close-btn">&times;</span>
            <h3
                style="
                background: linear-gradient(217deg, #1f0785 0%, #af2199 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;    padding: 5px;  
            ">
                মুসলিম বিয়ে
            </h3>

            <!--<p style="color: black;">  বায়োডাটা দেখতে লগইন করুন।</p>-->
            <!--<p style="color: black;">!!! বায়োডাটা সাবমিট করলে আপনি পাচ্ছেন ১০ টি এক্সক্লুসিভ কানেকশন একদম ফ্রি !!!<p>-->

            <p style="color: black" ;> একটি বিশ্বস্ত ও নিরাপদ পরিবেশ বজায় রাখতে আমরা শুধুমাত্র
                ভেরিফায়েড সদস্যদের বায়োডাটা প্রদর্শন করি। তাই অন্যদের বায়োডাটা দেখতে হলে আপনার
                বায়োডাটা সাবমিট করুন!</p>

            <p style="color: black;margin-bottom: 6px;">!!! বায়োডাটা এপ্রুভ হলে আপনি পাবেন ৳১,০০০
                মূল্যের ১০টি এক্সক্লুসিভ কানেকশন — একদম ফ্রি !!!
            <p>


                <!-- Confirm + Go to Login -->
            <div style="color: #fff">
                <button id="loginModalConfirm"
                    class="bg-secondary-color text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none hover:drop-shadow-lg shadow-slate-400 duration-100 group !no-underline ms-4 inline-block">ঠিক
                    আছে, চালিয়ে যান</button>

                <a href="{{ route('user.auth.login') }}" style="color: #fff"
                    class="bg-secondary-color-alter text-white !py-2 !px-3 rounded-sm cursor-pointer drop-shadow-none !no-underline hover:drop-shadow-lg shadow-slate-400 duration-100 group">
                    লগইন / বায়োডাটা সাবমিট
                </a>
            </div>


            {{--     
                <button class="btn btn-info mt-4 create-bio">

                    <a href="{{ route('user.auth.login') }}"
                        class="col-span-12 sm:col-span-6 bg-button-color !text-white font-bold text-center drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md gap-2 p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline !text-[1rem] sm:!text-[1.2rem]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem"
                            viewBox="0 0 16 16">
                            <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z"></path>
                        </svg> &nbsp বায়োডাটা সাবমিট করুন
                    </a>
                </button> --}}

        </div>
    </div>


    <div id="approvalModal" class="custom-modal">
        <div class="custom-modal-content">
            <span id="closeModalBtn" class="close-btn">&times;</span>
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
                <button class="btn btn-info mt-2 create-bio">

                    <a href="{{ route('user.edit_biodata.index') }}"
                        class="col-span-12 sm:col-span-6 bg-button-color !text-white font-bold text-center drop-shadow-none shadow-slate-600 hover:drop-shadow-lg rounded-md gap-2 p-4 w-full h-[60px] flex items-center justify-center max-w-[425px] !no-underline !text-[1rem] sm:!text-[1.2rem]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 16 16">
                            <path fill="white" d="M7 7V.5h2V7h6.5v2H9v6.5H7V9H.5V7z"></path>
                        </svg> বায়োডাটা তৈরি করুন
                    </a>
                </button>

        </div>
    </div>


@endsection


@section('js')
    <script>
       // Reusable helpers
  function showModal(modalId) {
    const m = document.getElementById(modalId);
    if (!m) return;
    m.style.display = 'flex';

    // backdrop close (একটাই লিসেনার রাখি)
    const onBackdrop = function (ev) {
      if (ev.target === m) {
        hideModal(modalId);
        m.removeEventListener('click', onBackdrop);
      }
    };
    m.addEventListener('click', onBackdrop);

    // [x] বা data-close দিয়ে বন্ধ
    m.querySelectorAll('.close-btn,[data-close]').forEach(btn => {
      btn.onclick = () => hideModal(modalId);
    });
  }

  function hideModal(modalId) {
    const m = document.getElementById(modalId);
    if (!m) return;
    m.style.display = 'none';
  }

  // ---------- Case A: Approved user -> loginAlertModal ----------
  // এই modal-এ "ঠিক আছে, চালিয়ে যান" চাপলে details URL এ যাবে
  let __detailsUrl = null;

  function openLoginAlert(e, detailsUrl) {
    if (e) e.preventDefault();
    __detailsUrl = detailsUrl;

    // বাটন/লিঙ্কে একাধিকবার bind এড়াতে clone ট্রিক
    const goBtn = document.getElementById('loginModalConfirm');
    if (goBtn) {
      const clone = goBtn.cloneNode(true);
      goBtn.parentNode.replaceChild(clone, goBtn);
      clone.addEventListener('click', function () {
        if (__detailsUrl) window.location.href = __detailsUrl;
      });
    }
    showModal('loginAlertModal');
    return false;
  }

  // ---------- Case B: Guest/Not-approved -> approvalModal ----------
  // এই modal থেকে "লগইন/বায়োডাটা" এ যাবে
  function openApproval(e, loginUrl) {
    if (e) e.preventDefault();
    // চাইলে এখানেই লিঙ্ক সেট করে দাও
    const toLogin = document.querySelector('#approvalModal a[href*="{{ route('user.edit_biodata.index') }}"], #approvalModal a, #approvalModal .btn-info a');
    // উপরের সিলেক্টর wide রাখা হলো—তোমার ভিতরের <a> যেটা আছে সেটাই ধরবে
    // না পেলে fallback:
    if (toLogin) toLogin.setAttribute('href', loginUrl);

    showModal('approvalModal');
    return false;
  }
    </script>

@endsection

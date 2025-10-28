<div class="od-biodata-form-content nav_page">
    <div class="oddb-title">
        <h2 class="text-secondary-color-alter text-center">@lang('site.contact_us')</h2>
    </div>
    <div class="od-fields-container w-full od-pt-20">
        @php
            $routeUrl =
                $biodata->admin_created == '1' ? route('admin.biodata.contact') : route('user.edit_biodata.contact');
        @endphp
        <form action="{{ $routeUrl }}" method="POST" class="od-row od-justify-content-spaceBetween" id="contactForm">
            @csrf
            <input type="hidden" name="confirmed_once" id="confirmed_once" value="0">
            <div class="bride_groom_bride_open od-form-group-container od-conditional-field-4 od-conditional-field-id-2 od-biodata-conditional-field-track required-field"
                style="display: none">
                <div class="od-form-group-label">
                    <label class="!text-[1.2rem] md:text-[1rem]">@lang('site.brides_name') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="bride_name" id="bride_name"
                        value="{{ isset($contact) ? $contact->bride_name : '' }}" class="od-field-type__textbox"
                        required />
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>@lang('site.write_full_name')<br /></p>
                </div>
            </div>

            <div class="bride_groom_groom_open od-form-group-container od-conditional-field-3 od-conditional-field-id-2 od-biodata-conditional-field-track required-field"
                style="display: none">
                <div class="od-form-group-label">
                    <label class="!text-[1.2rem] md:text-[1rem]">@lang('site.grooms_name') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="groom_name" id="groom_name"
                        value="{{ isset($contact) ? $contact->groom_name : '' }}" class="od-field-type__textbox"
                        required />
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>@lang('site.write_full_name')<br /></p>
                </div>
            </div>



            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="!text-[1.2rem] md:text-[1rem]">@lang('site.gurdian_name')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="gurdian_name" id="gurdian_name"
                        value="{{ isset($contact) ? $contact->gurdian_name : '' }}" class="od-field-type__textbox"
                        required />
                </div>
            </div>


            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="!text-[1.2rem] md:text-[1rem]">@lang('site.parents_phone_number')
                        <span class="od-required-label">*</span></label>
                </div>


                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="gurdian_phone" id="gurdian_phone"
                        value="{{ $contact->gurdian_phone ?? '' }}" class="od-field-type__textbox" required />
                </div>


                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.gurdian_phone_details')
                        @lang('site.gurdian_phone_details2')
                    </p>
                </div>
            </div>


            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="!text-[1.2rem] md:text-[1rem] !font-normal">
                        @lang('site.parents_whatsapp_number')
                        <span class="od-required-label">*</span>
                    </label>

                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="gurdian_whatsapp" id="gurdian_whatsapp"
                        value="{{ isset($contact) ? $contact->gurdian_whatsapp : '' }}"
                        class="od-field-type__textbox !font-normal" required />
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.gurdian_phone_details')
                        @lang('site.gurdian_phone_details2')
                    </p>
                </div>
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="66">
                <div class="od-form-group-label">
                    <label class="!text-[1.2rem] md:text-[1rem] !font-normal">@lang('site.gurdian_relation')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="gurdian_relation" id="gurdian_relation"
                        value="{{ isset($contact) ? $contact->gurdian_relation : '' }}"
                        class="od-field-type__textbox !font-normal" placeholder="@lang('site.father')" required />
                </div>
            </div>

            <div class="od-form-group-container required-field" data-visibility="yes" data-field_id="68">
                <div class="od-form-group-label">
                    <label class="text-[1.2rem] md:text-[1rem] !font-normal">@lang('site.your_email_address')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-email">
                    <input type="email" class="od-field-type__email !font-normal" name="biodata_email"
                        id="biodata_email" value="{{ isset($contact) ? $contact->biodata_email : '' }}" required />
                </div>

                <div class="od-field-desc od-pt-10">
                    <p>
                        @lang('site.gurdian_email_recommended')
                    </p>
                </div>
            </div>
            @include('frontend_new.user.edit_biodata.components.submit')
        </form>
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
        width: 800px;
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


<div id="approvalModal" class="custom-modal">
  <div class="custom-modal-content" style="max-width:480px;padding:25px 30px;text-align:center;border-radius:10px;background:#fff;box-shadow:0 5px 20px rgba(0,0,0,.15);">
    <span id="closeModalBtn1" class="close-btn" style="float:right;font-size:22px;font-weight:600;cursor:pointer;color:#444;">&times;</span>

    <h2 style="
      font-weight:700;
      background: linear-gradient(217deg,#1f0785 0%,#af2199 100%);
      -webkit-background-clip:text;
      -webkit-text-fill-color:transparent;
      margin-bottom:15px;
    ">
      সতর্কতা
    </h2>

    <p style="color:#333;line-height:1.6;margin-bottom:10px;">
      মুসলিম বিয়ে-তে বায়োডাটা সাবমিট করার জন্য আন্তরিক মোবারকবাদ।
    </p>

    <p style="color:#333;line-height:1.6;margin-bottom:10px;">
      ইনশাআল্লাহ <b>০৩ কার্যদিবসের মধ্যে</b> ভেরিফিকেশন সম্পন্ন করে আপনার বায়োডাটা এপ্রুভ করা হবে।
    </p>

    <p style="color:#333;line-height:1.6;margin-bottom:10px;">
      এপ্রুভ হলে আপনার মেইলে নোটিফিকেশন যাবে এবং ড্যাশবোর্ডেও দেখতে পারবেন।
    </p>

    <p style="color:#333;line-height:1.6;margin-bottom:10px;">
      অনুগ্রহ করে আপনার <b>মোবাইল নাম্বার ও অভিভাবকের নাম্বার সক্রিয় রাখুন</b> — এটি হতে পারে আপনার বরকতময় জীবনের প্রথম পদক্ষেপ ইনশাআল্লাহ।
    </p>

    <p style="color:#333;font-weight:600;margin-bottom:15px;">জাযাকাল্লাহু খাইরান।</p>

    <div style="display:flex;justify-content:center;gap:10px;margin-top:15px;">
      <button type="button" id="confirmSubmitBtn"
        style="padding:8px 20px;color:#fff;background:#243c9b;border:none;border-radius:5px;cursor:pointer;font-weight:600;">
        সাবমিট নিশ্চিত করুন
      </button>

      <button type="button" id="cancelModalBtn"
        style="padding:8px 20px;color:#fff;background:#c21ca2;border:none;border-radius:5px;cursor:pointer;font-weight:600;">
        পরে করবো
      </button>
    </div>
  </div>
</div>



{{-- <div id="afterFinalSubmit" class="custom-modal">
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
</div> --}}


{{-- <script>
document.addEventListener("DOMContentLoaded", function () {
  const form      = document.getElementById("contactForm");
  const modal     = document.getElementById("approvalModal");
  const closeBtn  = document.getElementById("closeModalBtn");
  const confirmBtn= document.getElementById("confirmSubmitBtn");
  const cancelBtn = document.getElementById("cancelModalBtn");

  if (!form || !modal || !closeBtn || !confirmBtn || !cancelBtn) return;

  let allowRealSubmit = false;

  // Intercept form submit
  form.addEventListener("submit", function (e) {
    if (allowRealSubmit) return;   // already confirmed; let it pass

    e.preventDefault();

    // if HTML5 required fields invalid, show browser prompts
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    // Show modal
    modal.style.display = "flex";
  });

  // Confirm => actually submit
  confirmBtn.addEventListener("click", function () {
    modal.style.display = "none";
    allowRealSubmit = true;
    form.submit();
  });

  // Cancel/Close => hide only
  function hideModal() { modal.style.display = "none"; }
  cancelBtn.addEventListener("click", hideModal);
  closeBtn.addEventListener("click", hideModal);

  // Click outside to close
  window.addEventListener("click", function (e) {
    if (e.target === modal) hideModal();
  });

  // ESC to close
  window.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && modal.style.display === "flex") hideModal();
  });
});
</script> --}}


<script>
document.addEventListener("DOMContentLoaded", function() {
  const form       = document.getElementById("contactForm");
  const modal1     = document.getElementById("approvalModal");
  const closeBtn1  = document.getElementById("closeModalBtn1");
  const confirmBtn = document.getElementById("confirmSubmitBtn");
  const cancelBtn1 = document.getElementById("cancelModalBtn");
  const confirmed  = document.getElementById("confirmed_once");

  // ⬇️ Use your preferred URL helper:
  // const DASHBOARD_URL = "{{ route('user.dashboard') }}";
  const DASHBOARD_URL = "{{ url('user/dashboard') }}"; // or just "user/dashboard"

  if (!form || !modal1 || !closeBtn1 || !confirmBtn || !cancelBtn1 || !confirmed) return;

  // Intercept submit → show modal
  form.addEventListener("submit", function(e) {
    if (confirmed.value === "1") return; // already confirmed → allow submit
    e.preventDefault();
    if (!form.checkValidity()) { form.reportValidity(); return; }
    modal1.style.display = "flex";
  });

  // Confirm → mark hidden + submit
  confirmBtn.addEventListener("click", function() {
    modal1.style.display = "none";
    confirmed.value = "1";
    form.submit();
  });

  // Go dashboard helper
  function goDashboard() {
    modal1.style.display = "none";
    window.location.href = DASHBOARD_URL;
  }

  // “পরে করবো” & Close (×) → dashboard
  cancelBtn1.addEventListener("click", goDashboard);
  closeBtn1.addEventListener("click", goDashboard);

  // Backdrop/Escape → dashboard (remove if you only want to close)
  window.addEventListener("click", (e) => { if (e.target === modal1) goDashboard(); });
  window.addEventListener("keydown", (e) => { if (e.key === "Escape") goDashboard(); });
});
</script>





{{-- @if (session('show_final_modal'))
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
@endif --}}

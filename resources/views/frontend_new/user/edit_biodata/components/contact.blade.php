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
            <div class="bride_groom_bride_open od-form-group-container od-conditional-field-4 od-conditional-field-id-2 od-biodata-conditional-field-track required-field"
                style="display: none">
                <div class="od-form-group-label">
                    <label class="!text-[1.2rem] md:text-[1rem]">@lang('site.brides_name') <span
                            class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="bride_name" id="bride_name"
                        value="{{ isset($contact) ? $contact->bride_name : '' }}" class="od-field-type__textbox"
                        placeholder="" required />
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
                        placeholder="" required />
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
                        placeholder=""  required />
                </div>
            </div>


            <div class="od-form-group-container required-field">
                <div class="od-form-group-label">
                    <label class="!text-[1.2rem] md:text-[1rem]">@lang('site.parents_phone_number')
                        <span class="od-required-label">*</span></label>
                </div>

                <div class="od-form-group-input od-custom-text_box">
                    <input type="text" name="gurdian_phone" id="gurdian_phone"
                        value="{{ isset($contact) ? $contact->gurdian_phone : '' }}" class="od-field-type__textbox"
                        placeholder="01700-000000" required />
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
                        class="od-field-type__textbox !font-normal" placeholder="01700-000000" required />
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
                        id="biodata_email" value="{{ isset($contact) ? $contact->biodata_email : '' }}"
                        placeholder="your-email@gmail.com" required />
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
    background: rgba(0,0,0,0.5); 
    justify-content: center; 
    align-items: center;
}

.custom-modal-content {
    background: #fff; 
    padding: 20px; 
    border-radius: 8px; 
    text-align: center;
    width: 500px;
    max-width: 90%;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

.close-btn {
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
} 

</style>


<div id="approvalModal" class="custom-modal">
  <div class="custom-modal-content">
    <span id="closeModalBtn" class="close-btn">&times;</span>

    <h1 style="
      background: linear-gradient(217deg, #1f0785 0%, #af2199 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    ">
      ভেরিফিকেশন সতর্কতা
    </h1>

    <p style="color:black;">📜 <strong>মুসলিম বিয়ে-তে বায়োডাটা সাবমিট করার জন্য আন্তরিক মোবারকবাদ!</strong> 🌸</p>
    <p style="color:black;">🌸 ইনশাআল্লাহ ০৩ কার্যদিবসের মধ্যে ভেরিফিকেশন সম্পন্ন করে আপনার বায়োডাটা এপ্রুভ করা হবে।</p>
    <p style="color:black;">🌸 এপ্রুভ হলে আপনার মেইলে নোটিফিকেশন যাবে এবং ড্যাশবোর্ডেও দেখতে পারবেন।</p>
    <p style="color:black;">✨ অনুগ্রহ করে আপনার মোবাইল নাম্বার, অভিভাবকের সম্মতি ও নাম্বার সক্রিয় রাখুন — <strong>এটাই হতে পারে আপনার বরকতময় জীবনের প্রথম পদক্ষেপ ইনশাআল্লাহ।</strong> 🕊️</p>
    <p style="color:black;">জাযাকাল্লাহু খাইরান। 💝</p>

<div style="margin-top: 5px" class="mt-4 flex justify-center gap-3">
  <button
    type="button"
    id="confirmSubmitBtn"
    style="padding: 8px 20px; color:#fff; background-color: #28a745; border: none; border-radius: 5px; cursor: pointer;"
  >
    সাবমিট নিশ্চিত করুন
  </button>

  <button
    type="button"
    id="cancelModalBtn"
     style="padding: 8px 20px; color:#fff; background-color: rgb(226, 50, 50); border: none; border-radius: 5px; cursor: pointer;"
  >
    পরে করবো
  </button>
</div>

    </div>
  </div>
</div>



<script>
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
</script>

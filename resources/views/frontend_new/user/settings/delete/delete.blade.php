<div class="odd-content">
    <div class="odd-content-inner">
        <div class="odd-content-title">
            <div class="od-row">
                <div class="od-col-12">
                    <h1 class="text-4xl font-bold">@lang('site.delete_biodata')</h1>
                </div>
            </div>
        </div>

        <div class="od-row">
            <div class="od-col-12">
                <form method="post" action="{{ route('user.delete_biodata') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="odd-delete-bio-container">
                        {{-- <h2>@lang('site.delete_biodata')</h2> --}}
                        <div class="odd-before-delete-bio">
                            <p class="text-red-600 font-bold">@lang('site.permanently_delete_biodata')</p>
                        </div>
                        <div class="odd-delete-bio">
                            <label><input type="checkbox" name="delete_confirmation" required=""
                                    onchange="document.getElementById('delete_btn').disabled=!this.checked;">@lang('site.permanently_delete_biodata_acknowledge')</label>
                            <div class="od-form-group-container !mt-5">
                                <div class="od-form-group-label">
                                    <label>@lang('site.your_password')</label>
                                </div>
                                <div class="od-form-group-input">
                                    <input type="password" name="password" required>

                                </div>
                            </div>
                            @if ($biodata->status == 2)
                                <div class="od-form-group-container !mt-5">
                                    <div class="od-form-group-label">
                                        <label>@lang('site.delete_reason')</label>
                                    </div>
                                    <div class="od-form-group-input">
                                        <select name="reason"
                                            onchange="if(this.value == 'married') { document.getElementById('married_by_muslimbie').style.display = 'block'; } else { document.getElementById('married_by_muslimbie').style.display = 'none'; }"
                                            required>
                                            <option value="">@lang('site.please_select')</option>
                                            <option value="married">@lang('site.i_ve_married')</option>
                                            <option value="other">@lang('site.other')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="od-form-group-container !mt-5" id="married_by_muslimbie"
                                    style="display: none;">
                                    <div class="od-form-group-label">
                                        <label>@lang('site.married_by_muslimbie')</label>
                                    </div>
                                    <div class="od-form-group-input">
                                        <select name="married_by_muslimbie">
                                            <option value="1">@lang('site.yes')</option>
                                            <option value="0">@lang('site.no')</option>
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="">
                                <button
                                    class="!py-2 w-full rounded-full text-white bg-secondary-color hover:bg-primary-color duration-200 disabled:opacity-65 disabled:cursor-not-allowed"
                                    id="delete_btn" type="submit" disabled>@lang('site.delete_biodata')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

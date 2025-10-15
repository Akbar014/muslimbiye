<div class="odd-content">
    <div class="odd-content-inner">
        <div class="odd-content-title">
            <div class="od-row">
                <div class="od-col-12">
                    <h1 class="text-4xl font-bold">@lang('site.account_settings')</h1>
                </div>
            </div>
        </div>
        <div class="od-row">
            <div class="od-col-12">
                <div style="padding:0px 20px;">

                </div>
                <div class="odd-change-pass-container">
                    <h2>@lang('site.change_password')</h2>
                    <form method="post" action="{{ route('user.change_password') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="od-form-group-container">
                            <div class="od-form-group-label">
                                <label>@lang('site.old_password')</label>

                            </div>
                            <div class="od-form-group-input">
                                <input type="password" name="old_password" required>

                            </div>
                        </div>
                        <div class="od-form-group-container">
                            <div class="od-form-group-label">
                                <label>@lang('site.new_password')</label>
                            </div>
                            <div class="od-form-group-input">
                                <input type="password" name="password" required="">

                            </div>
                        </div>
                        <div class="od-form-group-container">
                            <div class="od-form-group-label">
                                <label>@lang('site.confirm_new_password')</label>
                            </div>
                            <div class="od-form-group-input">
                                <input type="password" name="password_confirmation" required="">

                            </div>
                        </div>

                        <div class="od-form-submit-button">
                            <button
                                class="!py-2 w-full rounded-full text-white bg-secondary-color hover:bg-primary-color duration-200"
                                type="submit">@lang('site.update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

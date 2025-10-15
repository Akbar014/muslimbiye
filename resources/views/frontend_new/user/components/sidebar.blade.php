@php
    $user = Auth::guard('user')->user();
    $biodata = App\Models\Biodata::where(['user_id' => $user->id, 'deleted' => '0', 'admin_created' => '0'])->first();
@endphp
<div class="odd-sidebar bg-button-color">
    <a href="#" class="sidebar-trigger"></a>
    <div class="odd-user-info border-b-2 border-slate-100/20 !pb-10">
        <img src="{{ asset('assets/images/users/' . ($user->gender == '1' ? 'nikab.PNG' : 'islamicMan.jpg')) }}"
            alt="{{ $user->gender == '1' ? 'Fem' : 'M' }}ale-Avatar" class="!mx-auto rounded-full">


        <div class="odd-bio-status-wrap">
            @if ($biodata)
                <h3 class="!text-white">@lang('site.biodata_status')</h3>
            @endif
            <div class="odd-bio-status">
                @if (!$biodata)
                    {{-- <span class="od-incomplete"> <a href="{{ route('user.edit_biodata.index') }}" class="fw-bold !no-underline">@lang('site.no_biodata')</a></span> --}}
                @elseif ($biodata->status == '0')
                    <span class="od-incomplete fw-bold">@lang('site.incomplete')</span>
                @elseif($biodata->status == '1')
                    <span class="od-incomplete fw-bold">@lang('site.pending')</span>
                @elseif($biodata->status == '2')
                    <span class="od-incomplete fw-bold">@lang('site.approved')</span>
                @endif
            </div>

        </div>

        <div class="!mt-10">
            <a class="rounded-full !no-underline !text-white !py-2 !px-6 shadow-sm hover:shadow-md shadow-slate-800/10 hover:shadow-slate-800/50 bg-primary-color"
                href="{{ route('user.my_biodata') }}">
                {{ $biodata ? __('site.my_biodata') : __('site.create_biodata') }}
            </a>
        </div>
    </div>
    <nav class="odd-nav">
        <ul class="!mt-5">
            <li>
                <a href="{{ route('user.dashboard') }}"
                    class="!text-white bg-transparent duration-150 hover:bg-slate-100/10">
                    <i class="fa fa-tachometer text-2xl !mr-3" aria-hidden="true"></i>
                    @lang('site.dashboard')
                </a>
            </li>
            <li class="">
                <a href="{{ route('user.edit_biodata.index') }}"
                    class="!text-white bg-transparent duration-150 hover:bg-slate-100/10">
                    <i class="fa fa-pencil-square text-2xl !mr-3" aria-hidden="true"></i>
                    @lang('site.edit_biodata')
                </a>
            </li>
            <li class="">
                <a href="{{ route('user.favourite') }}"
                    class="!text-white bg-transparent duration-150 hover:bg-slate-100/10">
                    <i class="fa fa-heart text-2xl !mr-3" aria-hidden="true"></i>
                    @lang('site.favourite_list')
                </a>
            </li>
            <li class="">
                <a href="{{ route('user.my_purchases') }}"
                    class="!text-white bg-transparent duration-150 hover:bg-slate-100/10">
                    <i class="fa fa-shopping-cart text-2xl !mr-3" aria-hidden="true"></i>
                    @lang('site.purchase_list')
                </a>
            </li>
            <li class="">
                <a href="{{ route('user.settings') }}"
                    class="!text-white bg-transparent duration-150 hover:bg-slate-100/10">
                    <i class="fa fa-cog text-2xl !mr-3" aria-hidden="true"></i>
                    @lang('site.settings')
                </a>
            </li>
            @if ($biodata)
                <li class="">
                    <a href="{{ route('user.delete_biodata_page') }}"
                        class="!text-white bg-transparent duration-150 hover:bg-slate-100/10">
                        <i class="fa fa-trash text-2xl !mr-3" aria-hidden="true"></i>
                        @lang('site.delete_biodata')
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ URL::to('/user_login/logout') }}"
                    class="!text-white bg-transparent duration-150 hover:bg-slate-100/10">
                    <i class="fa fa-sign-out text-2xl !mr-3" aria-hidden="true"></i>
                    @lang('site.logout')
                </a>
            </li>
        </ul>
    </nav>
</div>

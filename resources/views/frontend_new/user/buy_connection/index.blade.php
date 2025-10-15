@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
<div class="od-content-main">
    <div class="od-user-account-container">
        <div class="od-row">
            @include('frontend_new.user.components.sidebar')
            <div class="odd-content">
                <div class="connection-details">
                    <div class="odd-content-title">
                        <div class="od-row">
                            <div class="od-col-12">
                                <h1>কানেকশন সম্পর্কিত তথ্য</h1>
                            </div>
                        </div>
                    </div>

                    <div class="od-row">
                        <div class="od-col-12">
                            <div class="odd-wallet">
                                <span>{{Auth::guard("user")->user()->connection}}</span>
                                <h3>কানেকশন রয়েছে</h3>

                            </div>
                            <div class="how-to-video">
                                <a href="#" target="_blank" class="od-button !gap-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="50" height="15">
                                        <rect width="100" height="100" rx="15" fill="#FF0000" />
                                        <polygon points="35,25 35,75 75,50" fill="white" />
                                    </svg>যেভাবে
                                    কানেকশন কিনবেন</a>
                            </div>
                        </div>
                    </div>
                    <div class="od-row">
                        <div class="od-col-12 odd-purchase-connections">
                            <h2>কানেকশন ক্রয় করুন</h2>
                        </div>
                    </div>

                    <div class="od-row">
                        @forelse ($packages as $package)
                        <div class="od-col-12 od-col-sm-4">
                            <div class="odd-each-price-plan">
                                <div class="oddepp-title">
                                    <h2>{{ $package->name }}</h2>
                                </div>
                                <div class="oddepp-content">
                                    <h3>
                                        {{ EnToBn($package->connection_amount) }} টি কানেকশন
                                    </h3>
                                     <h4 class="od-package-price-line">৳ {{ EnToBn($package->price) }}</h4> 
                                    <!--<h4 class="od-package-price-line">৳৬৫০</h4>-->
                                    <p class="od-conn-desc">{{ EnToBn($package->connection_amount) }} টি বায়োডাটার
                                        যোগাযোগ তথ্য দেখা যাবে।</p>
                                </div>
                                <div class="oddepp-action">
                                    <a href="{{ route('user.connection', $package->id) }}" class="od-button">ক্রয় করুন</a>
                                    <!--<a href="{{ route('user.connection', $package->id) }}" class="od-button"><img-->
                                    <!--        src="https://ordhekdeen.com/images/mypurchased-ico.svg"-->
                                    <!--        alt="Mypurchased-icon">ক্রয় করুন</a>-->
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="od-col-12">
                            <div class="bg-white !p-10 shadow-md shadow-slate-200 text-center text-2xl">
                                @lang('site.no_connection')
                            </div>
                        </div>
                        @endforelse
                        <!--<div class="od-col-12 od-col-sm-4">-->
                        <!--    <div class="odd-each-price-plan">-->
                        <!--        <div class="oddepp-title">-->
                        <!--            <h2>প্লাটিনাম</h2>-->
                        <!--        </div>-->
                        <!--        <div class="oddepp-content">-->
                        <!--            <h3>-->
                        <!--                ৭ টি কানেকশন-->
                        <!--            </h3>-->
                        <!--            <h4 class="od-package-price-line">৳৮০০</h4>-->
                        <!--            <p class="od-conn-desc">৭ টি বায়োডাটার যোগাযোগ তথ্য দেখা যাবে।</p>-->
                        <!--        </div>-->
                        <!--        <div class="oddepp-action">-->
                        <!--            <a href="https://ordhekdeen.com/user/account/payment-process/selection?package=c3RhbmRhcmQ%3D"-->
                        <!--                class="od-button"><img src="https://ordhekdeen.com/images/mypurchased-ico.svg"-->
                        <!--                    alt="Mypurchased-icon">ক্রয় করুন</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="od-col-12 od-col-sm-4">-->
                        <!--    <div class="odd-each-price-plan">-->
                        <!--        <div class="oddepp-title">-->
                        <!--            <h2>প্রিমিয়াম</h2>-->
                        <!--        </div>-->
                        <!--        <div class="oddepp-content">-->
                        <!--            <h3>-->
                        <!--                ১০ টি কানেকশন-->
                        <!--            </h3>-->
                        <!--            <h4 class="od-package-price-line">৳১০০০</h4>-->
                        <!--            <p class="od-conn-desc">১০ টি বায়োডাটার যোগাযোগ তথ্য দেখা যাবে।</p>-->
                        <!--        </div>-->
                        <!--        <div class="oddepp-action">-->
                        <!--            <a href="https://ordhekdeen.com/user/account/payment-process/selection?package=YmFzaWM%3D"-->
                        <!--                class="od-button"><img src="https://ordhekdeen.com/images/mypurchased-ico.svg"-->
                        <!--                    alt="Mypurchased-icon">ক্রয় করুন</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    
                    <div class="od-row !mt-3 " style="display: none;">
                        <div class="od-col-12">
                            <div class="odd-each-price-plan">
                                <div class="text-left">
                                    <h2 class="text-2xl font-semibold">@lang('site.coupon_text')</h2>
                                    <form action="{{ route('user.apply_coupon') }}" method="POST"
                                        class="od-coupon-form !mt-4">
                                        @csrf
                                        <label for="coupon_code"
                                            class="block text-lg font-medium text-gray-700">@lang('site.coupon_code')</label>
                                        <div class="od-row">
                                            <div class="od-col-12">
                                                <input type="text" id="coupon_code" name="coupon_code"
                                                    class="od-biodata-search-control outline-none h-full w-full !px-3 !py-2 border-[#d5d5d5] border-[1px] rounded-[10px]"
                                                    placeholder="@lang('site.write_coupon_code')">
                                            </div>
                                            <div class="od-col-12">
                                                <button type="submit"
                                                    class="od-button !mt-4 !w-[220px]">@lang('site.apply_coupon')</button>
                                            </div>
                                        </div>
                                        @if ($errors->has('coupon_code'))
                                        <p class="text-red-500 !mt-2">{{ $errors->first('coupon_code') }}</p>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
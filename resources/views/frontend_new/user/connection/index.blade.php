@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">
        <div class="od-user-account-container">
            <div class="od-row">
                @include('frontend_new.user.components.sidebar')
                <div class="odd-content">
                    <div class="connection-details">
                        <div class="od-row">
                            <div class="od-col-12 odd-purchase-connections">
                                <h2>কানেকশন ক্রয় করুন</h2>
                            </div>
                        </div>

                        <div class="od-row">
                            <div class="od-col-12">
                                <div class="odd-each-price-plan">
                                    <div class="oddepp-title">
                                        <h2>{{ $package->name }}</h2>
                                    </div>
                                    <div class="oddepp-content">
                                        <h3>
                                            {{ EnToBn($package->connection_amount) }}টি কানেকশন
                                        </h3>
                                        <h4 class="od-package-price-line">৳ {{ EnToBn($package->price) }}</h4>
                                        <p class="od-conn-desc">{{ EnToBn($package->connection_amount) }}টি বায়োডাটার
                                            যোগাযোগ তথ্য দেখা যাবে।</p>
                                    </div>
                                    <h1 class="mt-5 text-2xl">পেমেন্ট মেথড নির্বাচন করুন</h1>
                                    <div class="od-row !mx-auto w-80 !mt-10">
                                        <div class="od-col-6 !p-3">
                                            <form action="{{ route('user.connection_buy_bkash', $package->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit">
                                                    <img src="{{ asset('public/assets/images/logo/bkash.png') }}"
                                                        alt="bkash" class="w-40 cursor-pointer">
                                                </button>
                                            </form>
                                        </div>
                                        <div class="od-col-6 !p-3">
                                            <form action="{{ route('user.connection_buy_nagad', $package->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit">
                                                    <img src="{{ asset('public/assets/images/logo/nagad.png') }}"
                                                        alt="nagad" class="w-40 cursor-pointer">
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                         <div class="od-row">
                            <div class="od-col-12">
                                <div class="odd-each-price-plan">
                                    <div class="oddepp-title">
                                        🎁 মেগা অফার

                                        <!--<h2>{{ $package->name }}</h2>-->
                                        <h2>বায়োডাটা সাবমিট করলেই ১,০০০/- মূল্যের ১০টি এক্সক্লুসিভ কানেকশন উপহার! </h2>
                                    </div>
                                    <div class="oddepp-content">
                                        <h3>
                                           শুধুমাত্র প্রথম ৩,০০০ জনের জন্য
                                        </h3>
                                    ক্লু
                                    </div>
                                    <!--<h1 class="mt-5 text-2xl">পেমেন্ট মেথড নির্বাচন করুন</h1>-->
                                   
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

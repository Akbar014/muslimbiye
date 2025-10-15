<div class="odd-content">
    <div class="odd-content-inner">
        <div class="odd-content-title">
            <div class="od-row">
                <div class="od-col-12">
                    <h1 class="text-4xl">@lang('site.my_purchases')</h1>
                </div>
            </div>
        </div>
        <div class="od-row">
            <div class="od-col-12">
                <div class="odd-list-items shortlist">
                    <div class="odd-list-item list-head !bg-secondary-color">
                        <h4 class="!text-white">#</h4>
                        <h4 class="!text-white">TrxID</h4>
                        <h4 class="!text-white">@lang('site.payment_method')</h4>
                        <h4 class="!text-white">@lang('site.package')</h4>
                        <h4 class="!text-white">@lang('site.price')</h4>
                        <h4 class="!text-white">@lang('site.date')</h4>
                    </div>
                    @forelse ($user->purchase_list() as $key => $purchase)
                        <div class="odd-list-item">
                            <h4>{{ $key + 1 }}</h4>
                            <h4>{{ $purchase->trxID }}</h4>
                            <h4>@lang('site.bkash')</h4>
                            <h4>{{ $purchase->package() ? $purchase->package()->name : 'Deleted Package' }}</h4>
                            <h4>{{ $purchase->amount }}</h4>
                            <h4>{{ \Carbon\Carbon::parse($purchase->created_at)->format('d/m/Y') }}</h4>
                        </div>
                    @empty
                        <div class="odd-list-item">
                            <span class="inline-block !mx-auto">@lang('site.no_purchase')</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="od-row">
            <div class="od-col-12">
                <div class="od-pagination">

                </div>
            </div>
        </div>
        
        <div class="!mt-10">
            <a class="rounded-full !no-underline !text-white !py-2 !px-6 shadow-sm hover:shadow-md shadow-slate-800/10 hover:shadow-slate-800/50 bg-primary-color"
                href="{{ route('user.buy_connection') }}">
                <i class="fa fa-arrow-left !mr-2" aria-hidden="true"></i>নতুন কানেকশন ক্রয় করুন
            </a>
        </div>
        
        
    </div>
</div>

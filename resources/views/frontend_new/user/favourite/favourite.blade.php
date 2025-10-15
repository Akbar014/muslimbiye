<div class="odd-content">
    <div class="odd-content-inner">
        <div class="odd-content-title">
            <div class="od-row">
                <div class="od-col-12">
                    <h1 class="text-4xl">@lang('site.favourite_list')</h1>
                </div>
            </div>
        </div>
        <div class="od-row">
            <div class="od-col-12">
                <div class="odd-list-items shortlist">
                    <div class="odd-list-item list-head !bg-secondary-color">
                        <h4 class="!text-white">#</h4>
                        <h4 class="!text-white">@lang('site.biodata_no')</h4>
                        <h4 class="!text-white">@lang('site.date_of_birth')</h4>
                        <h4 class="!text-white">@lang('site.address')</h4>
                        <h4 class="!text-white">@lang('site.option')</h4>
                    </div>
                    @forelse ($favorites as $key => $favorite)
                        @if ($favorite->biodata())
                            <div class="odd-list-item" id="favorite_{{ $key }}">
                                <h4>{{ $key + 1 }}</h4>
                                <h4><a
                                        href="{{ route('frontend.biodata_details', $favorite->biodata()->id) }}">{{ $favorite->biodata()->code }}</a>
                                </h4>
                                <h4>{{ \Carbon\Carbon::parse($favorite->biodata()->general()->birthdate)->format('d/m/Y') }}
                                </h4>
                                <h4>{{ $favorite->biodata()->address()->parmanent_zella }}<br />{{ $favorite->biodata()->address()->parmanent_address }}
                                </h4>
                                <h4>
                                    <a href="javascript:void(0)"
                                        onclick="removeFavouriteFromList({{ $favorite->biodata()->id }}, 'favorite_{{ $key }}')"
                                        class="bg-secondary-color rounded-sm !px-4 !py-2 cursor-pointer hover:bg-primary-color duration-300">
                                        <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                    </a>
                                </h4>
                            </div>
                        @else
                            <div class="relative">
                                <div class="odd-list-item blur-sm">
                                    <h4>{{ $key + 1 }}</h4>
                                    <h4><a href="#">000000</a>
                                    </h4>
                                    <h4>00/00/0000</h4>
                                    <h4>@lang('site.not_found')</h4>
                                    <h4>
                                        <a href="javascript:void(0)"
                                            class="bg-secondary-color rounded-sm !px-4 !py-2 cursor-pointer hover:bg-primary-color duration-300">
                                            <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div class="absolute flex items-center justify-center top-0 left-0 h-full w-full">
                                    <span
                                        class="inline-block !mx-auto text-black text-lg bg-white/80 !p-2 rounded-sm">@lang('site.biodata_deleted')</span>
                                </div>
                            </div>
                        @endif

                    @empty
                        <div class="odd-list-item">
                            <span class="inline-block !mx-auto">@lang('site.biodata_not_found')</span>
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
    </div>
</div>

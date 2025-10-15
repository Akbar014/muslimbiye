<div class="w-full lg:w-4/5 px-2 lg:px-0 mx-auto">
    <div class="grid lg:grid-cols-12 gap-5">
        @forelse ($result as $data)
            @include('frontend.search.components.result')
        @empty
            No Result Found
        @endforelse
    </div>
    <div class="pagination mb-20 text-center relative">
        @if ($result->previousPageUrl() !=null)
        <div class="left_arrow" style="display: inline-block">
            <a href="{{$result->previousPageUrl()}}"
                class="hoverable-btn bg-secondary-color hover:bg-primary-color ease-in-out duration-200 text-white rounded-1 py-2 px-4 raleway  font-[700] inline-block my-5 mx-auto">
                <img class="inline-block mr-2 sm:ml-4" src="{{ asset('assets/frontend/res/images/icons/arrow_left_small.svg') }}" />
                @lang('site.previous_page')
            </a>
        </div>
        @endif
        @if ($result->nextPageUrl() !=null)
        <div class="right_arrow" style="display: inline-block">
            <a href="{{$result->nextPageUrl()}}"
                class="hoverable-btn bg-secondary-color hover:bg-primary-color ease-in-out duration-200 text-white rounded-1 py-2 px-4 raleway  font-[700] inline-block my-5 mx-auto">@lang('site.next_page')
                <img class="inline-block ml-2 sm:ml-4"
                    src="{{ asset('assets/frontend/res/images/icons/arrow_right_small.svg') }}" />
            </a>
        </div>
        @endif

        <div class="right my-5 sm:absolute top-0 right-0">
            <div class="inline-flex relative z-50 items-center">
                {{-- Page
                <select class="!mx-2 inline-block bg-transparent border border-black">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                of 4
                <a href="#"
                    class="hoverable-btn bg-secondary-color hover:bg-primary-color ease-in-out duration-200 text-white rounded-1 py-1 px-2inline-block ml-2 rounded-l">
                    <img class="inline-block px-2 mb-1"
                        src="{{ asset('assets/frontend/res/images/icons/left_arrow_small.svg') }}" />
                </a>
                <a href="#"
                    class="hoverable-btn bg-secondary-color hover:bg-primary-color ease-in-out duration-200 text-white rounded-1 py-1 px-2inline-block rounded-r">
                    <img class="inline-block px-2 mb-1"
                        src="{{ asset('assets/frontend/res/images/icons/right_arrow_small.svg') }}" />
                </a> --}}
                {{-- {!! $result->links() !!} --}}


            </div>
        </div>
    </div>
</div>

@section('css')
    {{-- <style>
        .pagination {
            display: flex;
            justify-content: center;
        }

        .left {
            margin: auto;
        }

        .right {
            align-self: flex-end;
        }
    </style> --}}
@endsection

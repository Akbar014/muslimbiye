@extends('frontend.layouts.master')
@section('title', 'Success Stories')
@section('content')
    <div class="bg-primary-light-color raleway">
        <div class="customContainer">
            <div class="customGrid gap-4 my-5">
                <div class="col-span-2"></div>
                <div class="col-span-8">
                    @foreach ($successList as $success)
                        <div class="blog_post bg-white mb-5">
                            <div class="post_area p-5">
                                <div class="flex mb-3">
                                    <div class="post_user w-11 h-10 p-1 border-secondary-color border-2 rounded-full">
                                        <img src="{{ asset('assets/frontend/res/images/icons/groom.svg') }}" alt="user"
                                            class="w-full max-h-full" />
                                    </div>
                                    <div class="ml-2">
                                        <div class="raleway font-[600] text-dark-color">
                                            মুসলিম বিয়ে - MuslimBie
                                        </div>
                                        <div class="raleway text-sm font-[200] text-gray-color">
                                            {{ $success->created_at->format('j F, Y, g:i a') }}</div>
                                    </div>
                                </div>
                                <h2 class="hindShiliguri text-3xl font-medium py-4">
                                    {!! $success->title !!}
                                </h2>
                                <div class="slide-read-more slide-read-more-{{ $success->id }} bottom-linear">
                                    {!! preg_replace('#<script(.*?)>(.*?)</script>#is', '', $success->story) !!}
                                    <span class="pb-5">&nbsp;</span>
                                    @if ($success->image)
                                    <div class="media_area">
                                        <img src="{{ asset($success->image) }}" alt="image" class="!mx-auto" />
                                    </div>
                                    @endif
                                </div>
                                <div
                                    class="slide-read-more-button slide-read-more-button-{{ $success->id }} read-more-button-{{ $success->id }}">
                                    @lang('site.read_more')</div>
                                <div class="slide-read-more-button slide-read-more-button-{{ $success->id }}">@lang('site.read_less')
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                // resize the slide-read-more Div
                                var box = $(".slide-read-more-{{ $success->id }}");
                                var minimumHeight = 75; // max height in pixels
                                var initialHeight = box.innerHeight();
                                // reduce the text if it's longer than 200px
                                if (initialHeight > minimumHeight) {
                                    box.css('height', minimumHeight);
                                    $(".read-more-button-{{ $success->id }}").show();
                                }

                                function SliderReadMore() {
                                    $(".slide-read-more-button-{{ $success->id }}").on('click', function() {
                                        // get current height
                                        var currentHeight = box.innerHeight();

                                        // get height with auto applied
                                        var autoHeight = box.css('height', 'auto').innerHeight();

                                        // reset height and revert to original if current and auto are equal
                                        var newHeight = (currentHeight | 0) === (autoHeight | 0) ? minimumHeight : autoHeight;

                                        box.css('height', currentHeight).animate({
                                            height: (newHeight)
                                        })
                                        $('html, body').animate({
                                            scrollTop: box.offset().top
                                        });
                                        $(".slide-read-more-button-{{ $success->id }}").toggle();
                                    });
                                }

                                SliderReadMore();

                            });
                        </script>
                    @endforeach
                    <div class="mt-12">
                        {!! $successList->links() !!}
                    </div>
                </div>
                <div class="col-span-2">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection

@extends('frontend.layouts.master')
@section('title', $success->title)
@section('content')
    <div class="bg-primary-light-color raleway">
        <div class="customContainer">
            <div class="customGrid gap-4 my-5">
                <div class="col-span-2"></div>
                <div class="col-span-8">
                    <div class="blog_post bg-white overflow-hidden">
                        <div class="post_area !p-5 ">
                            <div class="flex mb-3">
                                <div class="post_user w-11 h-10 !p-1 border-secondary-color border-2 rounded-full">
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
                            <h2 class="hindShiliguri text-3xl font-medium !py-4">
                                {!! $success->title !!}
                            </h2>
                            <div>
                                {!! preg_replace('#<script(.*?)>(.*?)</script>#is', '', $success->story) !!}
                            </div>
                            @if ($success->image)
                            <div class="media_area">
                                <img src="{{ asset($success->image) }}" alt="image" class="!mx-auto" />
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                </div>
            </div>
        </div>
    </div>
@endsection
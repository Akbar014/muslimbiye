@php
    $biodata = App\Models\Biodata::where(['status' => '1', 'deleted' => '0', 'admin_created' => '0'])
        // ->latest()
        ->orderBy('approval_date', 'DESC')
        ->paginate(6);

@endphp
<div class="lg:col-span-7 mb-8">
    @forelse ($biodata as $data)
        @php
            $brotherNameData = json_decode($data->brotherName);
            $brotherEduQualificationData = json_decode($data->brotherEduQualification);
            $brotherOccupationData = json_decode($data->brotherOccupation);
            $brotherMarritalStatusData = json_decode($data->brotherMarritalStatus);

            $sisterNameData = json_decode($data->sisterName);
            $sisterEduQualificationData = json_decode($data->sisterEduQualification);
            $sisterOccupationData = json_decode($data->sisterOccupation);
            $sisterMarritalStatusData = json_decode($data->sisterMarritalStatus);

            $paternalUncleNameData = json_decode($data->paternalUncleName);
            $paternalUncleEduQualificationData = json_decode($data->paternalUncleEduQualification);
            $paternalUncleOccupationData = json_decode($data->paternalUncleOccupation);
            $paternalUncleMarritalStatusData = json_decode($data->paternalUncleMarritalStatus);

            $maternalUncleNameData = json_decode($data->maternalUncleName);
            $maternalUncleEduQualificationData = json_decode($data->maternalUncleEduQualification);
            $maternalUncleOccupationData = json_decode($data->maternalUncleOccupation);
            $maternalUncleMarritalStatusData = json_decode($data->maternalUncleMarritalStatus);
        @endphp

        <div class="blog_post bg-white pb-1 mb-5 select-none">
            @include('frontend.components.post')

            {{-- 
            <div class="reaction_area m-5 mt-0 flex">
                <div
                    class="like_btn w-2/4 p-4 flex justify-center items-center cursor-pointer text-secondary-color hover:bg-slate-100 ease-in duration-100">
                    <span class="pr-2">10</span>
                    <img src="{{ asset('assets/frontend/res/images/icons/liked.svg') }}" alt="liked" class="pr-2" />
                    <span>Liked</span>
                </div>
                <div
                    class="fav_btn w-2/4 p-4 flex justify-center items-center cursor-pointer hover:bg-slate-100 ease-in duration-100">
                    <img src="{{ asset('assets/frontend/res/images/icons/favourite.svg') }}" alt="liked" class="w-7 pr-2" />
                    <span>Add to Favourite</span>
                </div>
            </div> --}}
        </div>

        <script>
            $(document).ready(function() {
                // resize the slide-read-more Div
                var box = $(".slide-read-more-{{ $data->id }}");
                var minimumHeight = 158; // max height in pixels
                var initialHeight = box.innerHeight();
                // reduce the text if it's longer than 200px
                if (initialHeight > minimumHeight) {
                    box.css('height', minimumHeight);
                    $(".read-more-button-{{ $data->id }}").show();
                }

                function SliderReadMore() {
                    $(".slide-read-more-button-{{ $data->id }}").on('click', function() {
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
                        $(".slide-read-more-button-{{ $data->id }}").toggle();
                    });
                }
                SliderReadMore();
            });
        </script>
    @empty
        No Biodata Found
    @endforelse

</div>

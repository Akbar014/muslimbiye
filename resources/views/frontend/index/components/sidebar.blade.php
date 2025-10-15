
@php
$bride=App\Models\BioData::where('bride_groom','Bride')->where(['status'=>'1', 'featured'=>'1'])->latest()->get();
$groom=App\Models\BioData::where('bride_groom','Groom')->where(['status'=>'1', 'featured'=>'1'])->latest()->get();
$SuccessStory=App\Models\SuccessStory::with('admins')->where('status','1',)->latest()->get();
@endphp
<aside class="lg:col-span-5 pb-8">
    <div class="bg-primary-light-color lg:p-6">
        <h2 class="text-2xl text-center raleway"><b class="font-[700]">@lang('site.featured_bio')</b></h2>
        <div class="switch border-2 rounded-full border-dark-color grid grid-cols-2 mt-6 w-3/5 mx-auto mb-10">
            <div>
                <div id="groomSwitch"  class="switch_option groom text-center py-1.5 px-5.5 m-0.5 rounded-full cursor-pointer ease-in duration-150 bg-white text-black"
                    onclick="cvSwitcher('groom')">@lang('site.groom')</div>
            </div>
            <div>
                <div id="brideSwitch" class="switch_option bride text-center py-1.5 px-5.5 m-0.5 rounded-full cursor-pointer ease-in duration-150 bg-white text-black selected-option"
                    onclick="cvSwitcher('bride')">@lang('site.bride')</div>
            </div>
        </div>
  
  
        <!-- Slider main container -->
        @if (count($groom) > 0)
          <div class="w-96 lg:w-full swiper groom_slide">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                  <!-- Slides -->
                  @foreach ($groom as $data )
                      <div class="swiper-slide">
                          <div class="cv-card rounded-md m-4 drop-shadow-xl bg-white mb-12">
                              <div class="card-heading text-center pt-5">
                                  <div class="avatar w-24 aspect-square rounded-full bg-white drop-shadow-xl mx-auto overflow-hidden">
                                      <img src="{{ asset('assets/frontend/res/images/icons/groom.svg') }}"
                                          class="w-full" alt="groom" />
                                  </div>
                                  <div class="raleway font-[700] text-dark-color text-2xl mt-4">@lang('site.postcode')</div>
                                  <div class="roboto font-[700] text-gray-color mt-1 mb-7">{{$data->code}}</div>
                                  <div class="grid grid-cols-2 gap-x-4 gap-y-2.5 px-5">
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.marital_status')</div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.'.strtolower($data->maritualStatusWant))
                                      </div>
  
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.date_of_birth')</div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          {{$data->dateOfBirth}}
                                      </div>
  
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.height_only')
                                      </div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          {{$data->heightFt}} @lang('site.feet') {{$data->heightInch}} @lang('site.inch')</div>
  
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.profession')
                                      </div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.'.strtolower($data->occupationWant))
                                      </div>
  
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.address')
                                      </div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.'.strtolower($data->permanentDistrict))
                                      </div>
                                  </div>
                                  <a href="{{route('frontend.biodata_details',$data->id)}}"
                                      class="bg-secondary-color hover:bg-primary-color ease-in-out duration-200 text-white rounded py-2 px-4 raleway  font-[700] inline-block my-5">@lang('site.see_details')</a>
                              </div>
                          </div>
                      </div>
                  @endforeach
  
              </div>
  
              <div class="flex swiper-controller mb-3">
                  <div class="swiper-button-prev text-primary-color"></div>
                  <div class="swiper-pagination inline-block mx-3"></div>
                  <div class="swiper-button-next"></div>
              </div>
          </div>
        @endif
  
        @if (count($bride) > 0)
          <div class="w-96 lg:w-full swiper bride_slide">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                  <!-- Slides -->
                  @foreach ($bride as $data )
                      <div class="swiper-slide">
                          <div class="cv-card rounded-md m-4 drop-shadow-xl bg-white mb-12">
                              <div class="card-heading text-center pt-5">
                                  <div class="avatar w-24 aspect-square rounded-full bg-white drop-shadow-xl mx-auto  overflow-hidden">
                                      <img src="{{ asset('assets/frontend/res/images/icons/bride.svg') }}"
                                          class="w-full" alt="bride" />
                                  </div>
                                  <div class="raleway font-[700] text-dark-color text-2xl mt-4">@lang('site.postcode')</div>
                                  <div class="roboto font-[700] text-gray-color mt-1 mb-7">{{$data->code}}</div>
                                  <div class="grid grid-cols-2 gap-x-4 gap-y-2.5 px-5">
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.marital_status')</div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.'.strtolower($data->maritualStatusWant))
                                      </div>
  
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.date_of_birth')</div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          {{$data->dateOfBirth}}
                                      </div>
  
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.height_only')
                                      </div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          {{$data->heightFt}} @lang('site.feet') {{$data->heightInch}} @lang('site.inch')</div>
  
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.profession')
                                      </div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.'.strtolower($data->occupationWant))
                                      </div>
  
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.address')
                                      </div>
                                      <div
                                          class="bg-primary-purple-color text-gray-color text-sm raleway py-3 rounded">
                                          @lang('site.'.strtolower($data->permanentDistrict))
                                      </div>
                                  </div>
                                  <a href="{{route('frontend.biodata_details',$data->id)}}"
                                      class="bg-secondary-color hover:bg-primary-color ease-in-out duration-200 text-white rounded py-2 px-4 raleway  font-[700] inline-block my-5">@lang('site.see_details')</a>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
  
              <div class="flex swiper-controller mb-3">
                  <div class="swiper-button-prev text-primary-color"></div>
                  <div class="swiper-pagination inline-block mx-3"></div>
                  <div class="swiper-button-next"></div>
              </div>
          </div>
        @endif
  
  
    </div>
    <div class="md:sticky top-0 bg-primary-light-color mt-8">
  
        <h2 class="text-center pt-8 raleway font-[700] text-2xl text-dark-color">@lang('site.success_story')</h2>
        <!-- Slider main container -->
        <div class="w-96 lg:w-full swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($SuccessStory as $data)
                  <a href="{{route('frontend.successSingle', $data->id)}}" class="swiper-slide block">
                      <div class="bg-white success_story_card p-8 mt-8 mx-4 box-shadow-lg my-8">
                          <div class="success_story_user flex justify-center">
                              <div
                                  class="success_user_avatar w-11 h-10 p-1 border-secondary-color border-2 rounded-full">
                                  <img src="{{ asset('assets/frontend/res/images/icons/groom.svg') }}"
                                      alt="user" class="w-full max-h-full" />
                              </div>
                              <div class="ml-2">
                                  <div class="raleway font-[600] text-dark-color">{{$data->admins[0]->name}}</div>
                                  <div class="raleway text-sm font-[200] text-gray-color">Admin</div>
                              </div>
                          </div>
                          <div class="text-gray-color raleway text-sm my-6">
                              <div class="main-story bottom-linear">
                                  {!!strip_tags($data->story)!!}
                              </div>
                          </div>
                      </div>
                  </a>
                @endforeach
            </div>
  
            <div class="flex swiper-controller mb-6">
                <div class="swiper-button-prev text-primary-color"></div>
                <div class="swiper-pagination inline-block mx-3"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</aside>
<script>
    $(document).ready(function(){
        $('.groom_slide').hide();
        $('.bride_slide').show();

      $("#groomSwitch").click(function(){
        $('.groom_slide').show();
        $('.bride_slide').hide();
      });
    $("#brideSwitch").click(function(){
        $('.groom_slide').hide();
        $('.bride_slide').show();
      });
    });
    </script>
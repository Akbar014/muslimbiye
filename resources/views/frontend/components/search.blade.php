    {{-- search section --}}
    <div class="search_section search_bg shadow-lg p-10 bg-white mx-auto">
        <form action="{{ route('frontend.searchSubmit') }}" method="POST" class="grid lg:grid-cols-3 gap-5">
            @csrf
            <select name="type_of_biodata" class="w-full item_filter text-dark-color input_arrow search_filter_bg">
                <option value="all">@lang('site.all_biodata')</option>
                <option value="Groom">@lang('site.groom_biodata')</option>
                <option value="Bride">@lang('site.bride_biodata')</option>
            </select>



            <select id="districtMultiple" name="district[]" data-placeholder="@lang('site.all_district')"
                class="w-full item_filter text-dark-color input_arrow search_filter_bg" multiple>
                <option value="Bagerhat">@lang('site.bagerhat')</option>
                <option value="Bandarban">@lang('site.bandarban')</option>
                <option value="Barguna">@lang('site.barguna')</option>
                <option value="Barisal">@lang('site.barisal')</option>
                <option value="Bhola">@lang('site.bhola')</option>
                <option value="Bogra">@lang('site.bogra')</option>
                <option value="Brahmanbaria">@lang('site.brahmanbaria')</option>
                <option value="Chandpur">@lang('site.chandpur')</option>
                <option value="Chittagong">@lang('site.chittagong')</option>
                <option value="Chuadanga">@lang('site.chuadanga')</option>
                <option value="Comilla">@lang('site.comilla')</option>
                <option value="CoxBazar">@lang('site.coxbazar')</option>
                <option value="Dhaka">@lang('site.dhaka')</option>
                <option value="Dinajpur">@lang('site.dinajpur')</option>
                <option value="Faridpur">@lang('site.faridpur')</option>
                <option value="Feni">@lang('site.feni')</option>
                <option value="Gaibandha">@lang('site.gaibandha')</option>
                <option value="Gazipur">@lang('site.gazipur')</option>
                <option value="Gopalganj">@lang('site.gopalganj')</option>
                <option value="Habiganj">@lang('site.habiganj')</option>
                <option value="Jaipurhat">@lang('site.jaipurhat')</option>
                <option value="Jamalpur">@lang('site.jamalpur')</option>
                <option value="Jessore">@lang('site.jessore')</option>
                <option value="Jhalokati">@lang('site.jhalokati')</option>
                <option value="Jhenaidah">@lang('site.jhenaidah')</option>
                <option value="Khagrachari">@lang('site.khagrachari')</option>
                <option value="Khulna">@lang('site.khulna')</option>
                <option value="Kishoreganj">@lang('site.kishoreganj')</option>
                <option value="Kurigram">@lang('site.kurigram')</option>
                <option value="Kushtia">@lang('site.kushtia')</option>
                <option value="Lakshmipur">@lang('site.lakshmipur')</option>
                <option value="Lalmonirhat">@lang('site.lalmonirhat')</option>
                <option value="Madaripur">@lang('site.madaripur')</option>
                <option value="Magura">@lang('site.magura')</option>
                <option value="Manikganj">@lang('site.manikganj')</option>
                <option value="Maulvibazar">@lang('site.maulvibazar')</option>
                <option value="Meherpur">@lang('site.meherpur')</option>
                <option value="Munshiganj">@lang('site.munshiganj')</option>
                <option value="Mymensingh">@lang('site.mymensingh')</option>
                <option value="Naogaon">@lang('site.naogaon')</option>
                <option value="Narail">@lang('site.narail')</option>
                <option value="Narayanganj">@lang('site.narayanganj')</option>
                <option value="Narsingdi">@lang('site.narsingdi')</option>
                <option value="Natore">@lang('site.natore')</option>
                <option value="Nawabganj">@lang('site.nawabganj')</option>
                <option value="Netrokona">@lang('site.netrokona')</option>
                <option value="Nilphamari">@lang('site.nilphamari')</option>
                <option value="Noakhali">@lang('site.noakhali')</option>
                <option value="Pabna">@lang('site.pabna')</option>
                <option value="Panchagarh">@lang('site.panchagarh')</option>
                <option value="Patuakhali">@lang('site.patuakhali')</option>
                <option value="Pirojpur">@lang('site.pirojpur')</option>
                <option value="Rajbari">@lang('site.rajbari')</option>
                <option value="Rajshahi">@lang('site.rajshahi')</option>
                <option value="Rangamati">@lang('site.rangamati')</option>
                <option value="Rangpur">@lang('site.rangpur')</option>
                <option value="Satkhira">@lang('site.satkhira')</option>
                <option value="Shariatpur">@lang('site.shariatpur')</option>
                <option value="Sherpur">@lang('site.sherpur')</option>
                <option value="Sirajganj">@lang('site.sirajganj')</option>
                <option value="Sunamganj">@lang('site.sunamganj')</option>
                <option value="Sylhet">@lang('site.sylhet')</option>
                <option value="Tangail">@lang('site.tangail')</option>
                <option value="Thakurgaon">@lang('site.thakurgaon')</option>
            </select>
            <div class="pt-0 py-5 lg:py-0">
                <span class="raleway text-neutral-600 mt-0 block text-center">@lang('site.b_exp_age')</span>
                <div class="wrapper mt-1.5">
                    <div class="slider">
                        <div class="progress"></div>
                        <div class="toolTipMin ageTooltip px-4 py-px rounded bg-primary-color text-white"><span
                                class="tooltipVal minToolTipVal text-sm roboto">18</span><span
                                class="tooltipCorner"></span>
                        </div>
                        <div class="toolTipMax ageTooltip px-4 py-px rounded bg-primary-color text-white"><span
                                class="tooltipVal maxToolTipVal text-sm roboto">75</span><span
                                class="tooltipCorner"></span>
                        </div>
                    </div>
                    <div class="range-input">
                        <input type="range" name="age_range_first" class="range-min" min="18" max="75"
                            value="18">
                        <input type="range" name="age_range_secound" class="range-max" min="18" max="75"
                            value="75">
                    </div>
                </div>
            </div>
            <select id="marriage_statusMultiple" name="marriage_status[]"
                class="w-full item_filter text-dark-color input_arrow search_filter_bg"
                data-placeholder="@lang('site.marital_status')" multiple>
                <option value="Single">@lang('site.single')</option>
                <option value="Married">@lang('site.married')</option>
                <option value="Divorced">@lang('site.divorced')</option>
                <option value="Widowed">@lang('site.widowed')</option>
                <option value="all">@lang('site.all')</option>
            </select>
            {{-- <input type="hidden" name="want_occupation" id="want_occupation"> --}}
            <select id="want_occupationMultiple" name="want_occupation[]"
                data-placeholder="@lang('site.all') @lang('site.profession')"
                class="w-full item_filter text-dark-color input_arrow search_filter_bg" multiple>
                <option value="all">@lang('site.all') @lang('site.profession')</option>
                <option value="unemployed">@lang('site.unemployed')</option>
                <option value="student">@lang('site.student')</option>
                <option value="earningStudent">@lang('site.earningstudent')</option>
                <option value="doctor">@lang('site.doctor')</option>
                <option value="engineer">@lang('site.engineer')</option>
                <option value="Government e@lang('site.government')"></option>
                <option value="Private e@lang('site.private')"></option>
                <option value="madrasaTeacher">@lang('site.madrasateacher')</option>
                <option value="generalTeacher">@lang('site.generalteacher')</option>
                <option value="farming">@lang('site.farming')</option>
                <option value="imam">@lang('site.imam')</option>
                <option value="alem">@lang('site.alem')</option>
                <option value="alem_f">@lang('site.alem_f')</option>
                <option value="muazzim">@lang('site.muazzim')</option>
                <option value="Trader">@lang('site.trader')</option>
                <option value="immigrant">@lang('site.immigrant')</option>
                <option value="freelancer">@lang('site.freelancer')</option>
                <option value="entrepreneur">@lang('site.entrepreneur')</option>
                <option value="homemaker">@lang('site.homemaker')</option>
            </select>
            <input type="text" name="biodata_no" placeholder="@lang('site.biodata_no')"
                class="w-full item_filter placeholder-dark-color" />
            <button type="submit"
                class="bg-secondary-color hover:bg-primary-color ease-in-out duration-200 text-white rounded item_filter_submit text-center lg:col-start-2 raleway  font-[700] inline-block">
                @lang('site.search')
            </button>
        </form>
    </div>
    {{-- /search section --}}

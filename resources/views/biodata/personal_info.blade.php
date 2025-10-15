@extends('frontend.layouts.master')
@section('title', 'Personal Info')
@section('content')
    <div class="customContainer raleway">
        @include('frontend.components.biodata_nav', ['active' => '1'])
        <h2 class="text-center my-8 text-4xl font-bold">@lang('site.personal_information')</h2>
        <form action="{{ route('frontend.personalInfoProcessSecondStep') }}" class="preventEnter" method="post">
            @csrf
            <div class="customGrid gap-4">
                <div class="col-span-12">
                    <div class="mb-3">
                        <label for="form3Example1c">
                            @lang('site.full_name')*
                        </label>
                        <input type="text" name="name" value="{{ $biodata->name ?? old('name') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.name')" required />
                        @error('name')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example3c">
                            @lang('site.father_name_title')*
                        </label>
                        <input type="text" name="fatherName" value="{{ $biodata->fatherName ?? old('fatherName') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.father_name')" required />
                        @error('fatherName')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.father_occupation')<span class="font-extrabold">*</span></label>
                        <select name="fatherOccupation" value="{{ $biodata->fatherOccupation ?? old('fatherOccupation') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow"
                            id="fatherOccupation" required>
                            <option value="">@lang('site.father_prof_selection')</option>
                            <option {{ $biodata->fatherOccupation == 'student' ? 'selected' : '' }} value="student">
                                @lang('site.student')</option>
                            <option
                                {{ $biodata->fatherOccupation == 'earningStudent' ? 'selected' : '' }} value="earningStudent">
                                @lang('site.earningstudent')</option>
                            <option {{ $biodata->fatherOccupation == 'doctor' ? 'selected' : '' }} value="doctor">
                                @lang('site.doctor')</option>
                            <option {{ $biodata->fatherOccupation == 'engineer' ? 'selected' : '' }} value="engineer">
                                @lang('site.engineer')</option>
                            <option
                                {{ $biodata->fatherOccupation == 'govtEmployee' ? 'selected' : '' }} value="govtEmployee">
                                @lang('site.govtemployee')</option>
                            <option
                                {{ $biodata->fatherOccupation == 'privateEmployee' ? 'selected' : '' }} value="privateEmployee">
                                @lang('site.privateemployee')</option>
                            <option
                                {{ $biodata->fatherOccupation == 'madrasaTeacher' ? 'selected' : '' }} value="madrasaTeacher">
                                @lang('site.madrasateacher')</option>
                            <option
                                {{ $biodata->fatherOccupation == 'generalTeacher' ? 'selected' : '' }} value="generalTeacher">
                                @lang('site.generalteacher')</option>
                            <option {{ $biodata->fatherOccupation == 'farming' ? 'selected' : '' }} value="farming">
                                @lang('site.farming')</option>
                            <option {{ $biodata->fatherOccupation == 'imam' ? 'selected' : '' }} value="imam">
                                @lang('site.imam')</option>
                            <option {{ $biodata->fatherOccupation == 'alem' ? 'selected' : '' }} value="alem">
                                @lang('site.alem')</option>
                            <option {{ $biodata->motherOccupation == 'muazzim' ? 'selected' : '' }} value="muazzim">
                                @lang('site.muazzim')</option>
                            <option {{ $biodata->fatherOccupation == 'Trader' ? 'selected' : '' }} value="Trader">
                                @lang('site.trader')</option>
                            <option {{ $biodata->fatherOccupation == 'immigrant' ? 'selected' : '' }} value="immigrant">
                                @lang('site.immigrant')</option>
                            <option {{ $biodata->fatherOccupation == 'freelancer' ? 'selected' : '' }} value="freelancer">
                                @lang('site.freelancer')</option>
                            <option
                                {{ $biodata->fatherOccupation == 'entrepreneur' ? 'selected' : '' }} value="entrepreneur">
                                @lang('site.entrepreneur')</option>
                            <option {{ $biodata->fatherOccupation == 'unemployed' ? 'selected' : '' }} value="unemployed">
                                @lang('site.unemployed')</option>
                            <option {{ $biodata->fatherOccupation == 'late' ? 'selected' : '' }} value="late">
                                @lang('site.late')</option>
                            <option {{ $biodata->fatherOccupation == 'other' ? 'selected' : '' }} value="other">
                                @lang('site.other')</option>
                        </select>
                        @error('fatherOccupation')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 {{ $biodata->fatherOccupationCustom || old('fatherOccupationCustom') ? '' : 'hidden' }}"
                        id="fatherOccupationCustom">
                        <label for="form3Example1c">@lang('site.specify_father_occupation')</span>*</label>
                        <input type="text" name="fatherOccupationCustom"
                            value="{{ $biodata->fatherOccupationCustom ?? old('fatherOccupationCustom') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.specify_father_occupation_placeholder')" maxlength="50" />
                        @error('fatherOccupationCustom')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.about_father_occupation')</label>
                        <input type="text" name="fatherOccupationInfo"
                            value="{{ $biodata->fatherOccupationInfo ?? old('fatherOccupationInfo') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.within_200_characters')" maxlength="200" />
                        @error('fatherOccupationInfo')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.mother_name_title')</span>*</label>
                        <input type="text" name="motherName" value="{{ $biodata->motherName ?? old('motherName') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.mother_name')" required />
                        @error('motherName')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.mother_occupation')<span class="font-extrabold">*</span></label>
                        <select name="motherOccupation" required
                            value="{{ $biodata->motherOccupation ?? old('motherOccupation') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow"
                            onchange="(this.value=='other' || this.value=='late')? document.getElementById('motherOccupationCustom').classList.remove('hidden') : document.getElementById('motherOccupationCustom').classList.add('hidden')">
                            <option value="">@lang('site.father_prof_selection')</option>
                            <option {{ $biodata->motherOccupation == 'student' ? 'selected' : '' }} value="student">
                                @lang('site.student')</option>
                            <option
                                {{ $biodata->motherOccupation == 'earningStudent' ? 'selected' : '' }} value="earningStudent">
                                @lang('site.earningstudent')</option>
                            <option {{ $biodata->motherOccupation == 'doctor' ? 'selected' : '' }} value="doctor">
                                @lang('site.doctor')</option>
                            <option {{ $biodata->motherOccupation == 'engineer' ? 'selected' : '' }} value="engineer">
                                @lang('site.engineer')</option>
                            <option
                                {{ $biodata->motherOccupation == 'govtEmployee' ? 'selected' : '' }} value="govtEmployee">
                                @lang('site.govtemployee')</option>
                            <option
                                {{ $biodata->motherOccupation == 'privateEmployee' ? 'selected' : '' }} value="privateEmployee">
                                @lang('site.privateemployee')</option>
                            <option
                                {{ $biodata->motherOccupation == 'madrasaTeacher' ? 'selected' : '' }} value="madrasaTeacher">
                                @lang('site.madrasateacher')</option>
                            <option
                                {{ $biodata->motherOccupation == 'generalTeacher' ? 'selected' : '' }} value="generalTeacher">
                                @lang('site.generalteacher')</option>
                            <option {{ $biodata->motherOccupation == 'farming' ? 'selected' : '' }} value="farming">
                                @lang('site.farming')</option>
                            <option {{ $biodata->motherOccupation == 'imam' ? 'selected' : '' }} value="imam">
                                @lang('site.imam')</option>
                            <option {{ $biodata->motherOccupation == 'alem_f' ? 'selected' : '' }} value="alem_f">
                                @lang('site.alem_f')</option>
                            <option {{ $biodata->motherOccupation == 'Trader' ? 'selected' : '' }} value="Trader">
                                @lang('site.trader')</option>
                            <option {{ $biodata->motherOccupation == 'immigrant' ? 'selected' : '' }} value="immigrant">
                                @lang('site.immigrant')</option>
                            <option {{ $biodata->motherOccupation == 'freelancer' ? 'selected' : '' }} value="freelancer">
                                @lang('site.freelancer')</option>
                            <option
                                {{ $biodata->motherOccupation == 'entrepreneur' ? 'selected' : '' }} value="entrepreneur">
                                @lang('site.entrepreneur')</option>
                            <option {{ $biodata->motherOccupation == 'homemaker' ? 'selected' : '' }} value="homemaker">
                                @lang('site.homemaker')</option>
                            <option {{ $biodata->motherOccupation == 'unemployed' ? 'selected' : '' }} value="unemployed">
                                @lang('site.unemployed')</option>
                            <option {{ $biodata->motherOccupation == 'late' ? 'selected' : '' }} value="late">
                                @lang('site.late')</option>
                            <option {{ $biodata->motherOccupation == 'other' ? 'selected' : '' }} value="other">
                                @lang('site.other')</option>
                        </select>
                        @error('motherOccupation')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 {{ $biodata->motherOccupationCustom || old('motherOccupationCustom') ? '' : 'hidden' }} "
                        id="motherOccupationCustom">
                        <label for="form3Example1c">@lang('site.specify_mother_occupation')*</label>
                        <input type="text" name="motherOccupationCustom"
                            value="{{ $biodata->motherOccupationCustom ?? old('motherOccupationCustom') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.specify_mother_occupation_placeholder')" maxlength="50" />
                        @error('motherOccupationCustom')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.about_mother_occupation')</label>
                        <input type="text" name="motherOccupationInfo"
                            value="{{ $biodata->motherOccupationInfo ?? old('motherOccupationInfo') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            placeholder="@lang('site.within_200_characters')" maxlength="200" />
                        @error('motherOccupationInfo')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12">
                    <label class="font-bold">@lang('site.address_permanent')*</label>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.village_street')<span class="font-extrabold">*</span></label>
                        <input type="text" placeholder="@lang('site.village_street')" name="permanentVillage"
                            value="{{ $biodata->permanentVillage ?? old('permanentVillage') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color" maxlength="150"
                            id="permanentVillage" onchange="toggleAddrLocation()" required />
                        @error('permanentVillage')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.post_office')</label>
                        <input type="text" placeholder="@lang('site.post_office')" name="permanentPostoffice"
                            value="{{ $biodata->permanentPostoffice ?? old('permanentPostoffice') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            onchange="toggleAddrLocation()" id="permanentPostoffice" />
                        @error('permanentPostoffice')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.police_station')<span class="font-extrabold">*</span></label>
                        <input type="text" required placeholder="@lang('site.police_station')" onchange="toggleAddrLocation()"
                            name="permanentThana" id="permanentThana"
                            value="{{ $biodata->permanentThana ?? old('permanentThana') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color" />
                        @error('permanentThana')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.district')<span class="font-extrabold">*</span></label>
                        <select name="permanentDistrict" onchange="toggleAddrLocation()"
                            value="{{ $biodata->permanentDistrict }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow"
                            id="permanentDistrict" required>
                            <option value="">@lang('site.select_district')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Bagerhat' || old('permanentDistrict') == 'Bagerhat' ? 'selected' : '' }} value="Bagerhat">
                                @lang('site.bagerhat')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Bandarban' || old('permanentDistrict') == 'Bandarban' ? 'selected' : '' }} value="Bandarban">
                                @lang('site.bandarban')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Barguna' || old('permanentDistrict') == 'Barguna' ? 'selected' : '' }} value="Barguna">
                                @lang('site.barguna')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Barisal' || old('permanentDistrict') == 'Barisal' ? 'selected' : '' }} value="Barisal">
                                @lang('site.barisal')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Bhola' || old('permanentDistrict') == 'Bhola' ? 'selected' : '' }} value="Bhola">
                                @lang('site.bhola')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Bogra' || old('permanentDistrict') == 'Bogra' ? 'selected' : '' }} value="Bogra">
                                @lang('site.bogra')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Brahmanbaria' || old('permanentDistrict') == 'Brahmanbaria' ? 'selected' : '' }}
                                value="Brahmanbaria">@lang('site.brahmanbaria')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Chandpur' || old('permanentDistrict') == 'Chandpur' ? 'selected' : '' }} value="Chandpur">
                                @lang('site.chandpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Chittagong' || old('permanentDistrict') == 'Chittagong' ? 'selected' : '' }} value="Chittagong">
                                @lang('site.chittagong')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Chuadanga' || old('permanentDistrict') == 'Chuadanga' ? 'selected' : '' }} value="Chuadanga">
                                @lang('site.chuadanga')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Comilla' || old('permanentDistrict') == 'Comilla' ? 'selected' : '' }} value="Comilla">
                                @lang('site.comilla')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Cox' || old('permanentDistrict') == 'Cox' ? 'selected' : '' }} value="CoxBazar">
                                @lang('site.coxbazar')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Dhaka' || old('permanentDistrict') == 'Dhaka' ? 'selected' : '' }} value="Dhaka">
                                @lang('site.dhaka')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Dinajpur' || old('permanentDistrict') == 'Dinajpur' ? 'selected' : '' }} value="Dinajpur">
                                @lang('site.dinajpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Faridpur' || old('permanentDistrict') == 'Faridpur' ? 'selected' : '' }} value="Faridpur">
                                @lang('site.faridpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Feni' || old('permanentDistrict') == 'Feni' ? 'selected' : '' }} value="Feni">
                                @lang('site.feni')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Gaibandha' || old('permanentDistrict') == 'Gaibandha' ? 'selected' : '' }} value="Gaibandha">
                                @lang('site.gaibandha')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Gazipur' || old('permanentDistrict') == 'Gazipur' ? 'selected' : '' }} value="Gazipur">
                                @lang('site.gazipur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Gopalganj' || old('permanentDistrict') == 'Gopalganj' ? 'selected' : '' }} value="Gopalganj">
                                @lang('site.gopalganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Habiganj' || old('permanentDistrict') == 'Habiganj' ? 'selected' : '' }} value="Habiganj">
                                @lang('site.habiganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Jaipurhat' || old('permanentDistrict') == 'Jaipurhat' ? 'selected' : '' }} value="Jaipurhat">
                                @lang('site.jaipurhat')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Jamalpur' || old('permanentDistrict') == 'Jamalpur' ? 'selected' : '' }} value="Jamalpur">
                                @lang('site.jamalpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Jessore' || old('permanentDistrict') == 'Jessore' ? 'selected' : '' }} value="Jessore">
                                @lang('site.jessore')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Jhalokati' || old('permanentDistrict') == 'Jhalokati' ? 'selected' : '' }} value="Jhalokati">
                                @lang('site.jhalokati')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Jhenaidah' || old('permanentDistrict') == 'Jhenaidah' ? 'selected' : '' }} value="Jhenaidah">
                                @lang('site.jhenaidah')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Khagrachari' || old('permanentDistrict') == 'Khagrachari' ? 'selected' : '' }} value="Khagrachari">
                                @lang('site.khagrachari')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Khulna' || old('permanentDistrict') == 'Khulna' ? 'selected' : '' }} value="Khulna">
                                @lang('site.khulna')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Kishoreganj' || old('permanentDistrict') == 'Kishoreganj' ? 'selected' : '' }} value="Kishoreganj">
                                @lang('site.kishoreganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Kurigram' || old('permanentDistrict') == 'Kurigram' ? 'selected' : '' }} value="Kurigram">
                                @lang('site.kurigram')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Kushtia' || old('permanentDistrict') == 'Kushtia' ? 'selected' : '' }} value="Kushtia">
                                @lang('site.kushtia')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Lakshmipur' || old('permanentDistrict') == 'Lakshmipur' ? 'selected' : '' }} value="Lakshmipur">
                                @lang('site.lakshmipur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Lalmonirhat' || old('permanentDistrict') == 'Lalmonirhat' ? 'selected' : '' }} value="Lalmonirhat">
                                @lang('site.lalmonirhat')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Madaripur' || old('permanentDistrict') == 'Madaripur' ? 'selected' : '' }} value="Madaripur">
                                @lang('site.madaripur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Magura' || old('permanentDistrict') == 'Magura' ? 'selected' : '' }} value="Magura">
                                @lang('site.magura')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Manikganj' || old('permanentDistrict') == 'Manikganj' ? 'selected' : '' }} value="Manikganj">
                                @lang('site.manikganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Maulvibazar' || old('permanentDistrict') == 'Maulvibazar' ? 'selected' : '' }} value="Maulvibazar">
                                @lang('site.maulvibazar')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Meherpur' || old('permanentDistrict') == 'Meherpur' ? 'selected' : '' }} value="Meherpur">
                                @lang('site.meherpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Munshiganj' || old('permanentDistrict') == 'Munshiganj' ? 'selected' : '' }} value="Munshiganj">
                                @lang('site.munshiganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Mymensingh' || old('permanentDistrict') == 'Mymensingh' ? 'selected' : '' }} value="Mymensingh">
                                @lang('site.mymensingh')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Naogaon' || old('permanentDistrict') == 'Naogaon' ? 'selected' : '' }} value="Naogaon">
                                @lang('site.naogaon')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Narail' || old('permanentDistrict') == 'Narail' ? 'selected' : '' }} value="Narail">
                                @lang('site.narail')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Narayanganj' || old('permanentDistrict') == 'Narayanganj' ? 'selected' : '' }} value="Narayanganj">
                                @lang('site.narayanganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Narsingdi' || old('permanentDistrict') == 'Narsingdi' ? 'selected' : '' }} value="Narsingdi">
                                @lang('site.narsingdi')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Natore' || old('permanentDistrict') == 'Natore' ? 'selected' : '' }} value="Natore">
                                @lang('site.natore')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Nawabganj' || old('permanentDistrict') == 'Nawabganj' ? 'selected' : '' }} value="Nawabganj">
                                @lang('site.nawabganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Netrokona' || old('permanentDistrict') == 'Netrokona' ? 'selected' : '' }} value="Netrokona">
                                @lang('site.netrokona')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Nilphamari' || old('permanentDistrict') == 'Nilphamari' ? 'selected' : '' }} value="Nilphamari">
                                @lang('site.nilphamari')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Noakhali' || old('permanentDistrict') == 'Noakhali' ? 'selected' : '' }} value="Noakhali">
                                @lang('site.noakhali')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Pabna' || old('permanentDistrict') == 'Pabna' ? 'selected' : '' }} value="Pabna">
                                @lang('site.pabna')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Panchagarh' || old('permanentDistrict') == 'Panchagarh' ? 'selected' : '' }} value="Panchagarh">
                                @lang('site.panchagarh')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Patuakhali' || old('permanentDistrict') == 'Patuakhali' ? 'selected' : '' }} value="Patuakhali">
                                @lang('site.patuakhali')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Pirojpur' || old('permanentDistrict') == 'Pirojpur' ? 'selected' : '' }} value="Pirojpur">
                                @lang('site.pirojpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Rajbari' || old('permanentDistrict') == 'Rajbari' ? 'selected' : '' }} value="Rajbari">
                                @lang('site.rajbari')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Rajshahi' || old('permanentDistrict') == 'Rajshahi' ? 'selected' : '' }} value="Rajshahi">
                                @lang('site.rajshahi')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Rangamati' || old('permanentDistrict') == 'Rangamati' ? 'selected' : '' }} value="Rangamati">
                                @lang('site.rangamati')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Rangpur' || old('permanentDistrict') == 'Rangpur' ? 'selected' : '' }} value="Rangpur">
                                @lang('site.rangpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Satkhira' || old('permanentDistrict') == 'Satkhira' ? 'selected' : '' }} value="Satkhira">
                                @lang('site.satkhira')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Shariatpur' || old('permanentDistrict') == 'Shariatpur' ? 'selected' : '' }} value="Shariatpur">
                                @lang('site.shariatpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Sherpur' || old('permanentDistrict') == 'Sherpur' ? 'selected' : '' }} value="Sherpur">
                                @lang('site.sherpur')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Sirajganj' || old('permanentDistrict') == 'Sirajganj' ? 'selected' : '' }} value="Sirajganj">
                                @lang('site.sirajganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Sunamganj' || old('permanentDistrict') == 'Sunamganj' ? 'selected' : '' }} value="Sunamganj">
                                @lang('site.sunamganj')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Sylhet' || old('permanentDistrict') == 'Sylhet' ? 'selected' : '' }} value="Sylhet">
                                @lang('site.sylhet')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Tangail' || old('permanentDistrict') == 'Tangail' ? 'selected' : '' }} value="Tangail">
                                @lang('site.tangail')</option>
                            <option
                                {{ $biodata->permanentDistrict == 'Thakurgaon' || old('permanentDistrict') == 'Thakurgaon' ? 'selected' : '' }} value="Thakurgaon">
                                @lang('site.thakurgaon')</option>
                        </select>
                        @error('permanentDistrict')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-12">
                    <label class="font-bold">@lang('site.address_current')*</label>
                </div>
                <div class="col-span-12 hidden presentAddrCheckboxContainer">
                    <input type="checkbox" id="presentAddrCheckbox">
                    <label for="presentAddrCheckbox">@lang('site.same_as_parmanent')</label>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.village_street')<span class="font-extrabold">*</span></label>
                        <input type="text" placeholder="@lang('site.village_street')" name="presentVillage"
                            value="{{ $biodata->presentVillage ?? old('presentVillage') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color" maxlength="150"
                            id="presentVillage" required />
                        @error('presentVillage')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.post_office')</label>
                        <input type="text" placeholder="@lang('site.post_office')" name="presentPostoffice"
                            value="{{ $biodata->presentPostoffice ?? old('presentPostoffice') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color"
                            id="presentPostoffice" />
                        @error('presentPostoffice')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.police_station')<span class="font-extrabold">*</span></label>
                        <input type="text" placeholder="@lang('site.police_station')" name="presentThana"
                            value="{{ $biodata->presentThana ?? old('presentThana') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color" id="presentThana"
                            required />
                        @error('presentThana')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.district')<span class="font-extrabold">*</span></label>
                        <select name="presentDistrict" required id="presentDistrict"
                            value="{{ $biodata->presentDistrict }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow" required>
                            <option value="">@lang('site.select_district')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Bagerhat' || old('presentDistrict') == 'Bagerhat' ? 'selected' : '' }} value="Bagerhat">
                                @lang('site.bagerhat')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Bandarban' || old('presentDistrict') == 'Bandarban' ? 'selected' : '' }} value="Bandarban">
                                @lang('site.bandarban')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Barguna' || old('presentDistrict') == 'Barguna' ? 'selected' : '' }} value="Barguna">
                                @lang('site.barguna')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Barisal' || old('presentDistrict') == 'Barisal' ? 'selected' : '' }} value="Barisal">
                                @lang('site.barisal')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Bhola' || old('presentDistrict') == 'Bhola' ? 'selected' : '' }} value="Bhola">
                                @lang('site.bhola')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Bogra' || old('presentDistrict') == 'Bogra' ? 'selected' : '' }} value="Bogra">
                                @lang('site.bogra')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Brahmanbaria' || old('presentDistrict') == 'Brahmanbaria' ? 'selected' : '' }} value="Brahmanbaria">
                                @lang('site.brahmanbaria')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Chandpur' || old('presentDistrict') == 'Chandpur' ? 'selected' : '' }} value="Chandpur">
                                @lang('site.chandpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Chittagong' || old('presentDistrict') == 'Chittagong' ? 'selected' : '' }} value="Chittagong">
                                @lang('site.chittagong')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Chuadanga' || old('presentDistrict') == 'Chuadanga' ? 'selected' : '' }} value="Chuadanga">
                                @lang('site.chuadanga')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Comilla' || old('presentDistrict') == 'Comilla' ? 'selected' : '' }} value="Comilla">
                                @lang('site.comilla')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Cox' || old('presentDistrict') == 'Cox' ? 'selected' : '' }} value="CoxBazar">
                                @lang('site.coxbazar')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Dhaka' || old('presentDistrict') == 'Dhaka' ? 'selected' : '' }} value="Dhaka">
                                @lang('site.dhaka')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Dinajpur' || old('presentDistrict') == 'Dinajpur' ? 'selected' : '' }} value="Dinajpur">
                                @lang('site.dinajpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Faridpur' || old('presentDistrict') == 'Faridpur' ? 'selected' : '' }} value="Faridpur">
                                @lang('site.faridpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Feni' || old('presentDistrict') == 'Feni' ? 'selected' : '' }} value="Feni">
                                @lang('site.feni')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Gaibandha' || old('presentDistrict') == 'Gaibandha' ? 'selected' : '' }} value="Gaibandha">
                                @lang('site.gaibandha')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Gazipur' || old('presentDistrict') == 'Gazipur' ? 'selected' : '' }} value="Gazipur">
                                @lang('site.gazipur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Gopalganj' || old('presentDistrict') == 'Gopalganj' ? 'selected' : '' }} value="Gopalganj">
                                @lang('site.gopalganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Habiganj' || old('presentDistrict') == 'Habiganj' ? 'selected' : '' }} value="Habiganj">
                                @lang('site.habiganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Jaipurhat' || old('presentDistrict') == 'Jaipurhat' ? 'selected' : '' }} value="Jaipurhat">
                                @lang('site.jaipurhat')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Jamalpur' || old('presentDistrict') == 'Jamalpur' ? 'selected' : '' }} value="Jamalpur">
                                @lang('site.jamalpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Jessore' || old('presentDistrict') == 'Jessore' ? 'selected' : '' }} value="Jessore">
                                @lang('site.jessore')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Jhalokati' || old('presentDistrict') == 'Jhalokati' ? 'selected' : '' }} value="Jhalokati">
                                @lang('site.jhalokati')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Jhenaidah' || old('presentDistrict') == 'Jhenaidah' ? 'selected' : '' }} value="Jhenaidah">
                                @lang('site.jhenaidah')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Khagrachari' || old('presentDistrict') == 'Khagrachari' ? 'selected' : '' }} value="Khagrachari">
                                @lang('site.khagrachari')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Khulna' || old('presentDistrict') == 'Khulna' ? 'selected' : '' }} value="Khulna">
                                @lang('site.khulna')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Kishoreganj' || old('presentDistrict') == 'Kishoreganj' ? 'selected' : '' }} value="Kishoreganj">
                                @lang('site.kishoreganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Kurigram' || old('presentDistrict') == 'Kurigram' ? 'selected' : '' }} value="Kurigram">
                                @lang('site.kurigram')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Kushtia' || old('presentDistrict') == 'Kushtia' ? 'selected' : '' }} value="Kushtia">
                                @lang('site.kushtia')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Lakshmipur' || old('presentDistrict') == 'Lakshmipur' ? 'selected' : '' }} value="Lakshmipur">
                                @lang('site.lakshmipur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Lalmonirhat' || old('presentDistrict') == 'Lalmonirhat' ? 'selected' : '' }} value="Lalmonirhat">
                                @lang('site.lalmonirhat')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Madaripur' || old('presentDistrict') == 'Madaripur' ? 'selected' : '' }} value="Madaripur">
                                @lang('site.madaripur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Magura' || old('presentDistrict') == 'Magura' ? 'selected' : '' }} value="Magura">
                                @lang('site.magura')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Manikganj' || old('presentDistrict') == 'Manikganj' ? 'selected' : '' }} value="Manikganj">
                                @lang('site.manikganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Maulvibazar' || old('presentDistrict') == 'Maulvibazar' ? 'selected' : '' }} value="Maulvibazar">
                                @lang('site.maulvibazar')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Meherpur' || old('presentDistrict') == 'Meherpur' ? 'selected' : '' }} value="Meherpur">
                                @lang('site.meherpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Munshiganj' || old('presentDistrict') == 'Munshiganj' ? 'selected' : '' }} value="Munshiganj">
                                @lang('site.munshiganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Mymensingh' || old('presentDistrict') == 'Mymensingh' ? 'selected' : '' }} value="Mymensingh">
                                @lang('site.mymensingh')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Naogaon' || old('presentDistrict') == 'Naogaon' ? 'selected' : '' }} value="Naogaon">
                                @lang('site.naogaon')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Narail' || old('presentDistrict') == 'Narail' ? 'selected' : '' }} value="Narail">
                                @lang('site.narail')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Narayanganj' || old('presentDistrict') == 'Narayanganj' ? 'selected' : '' }} value="Narayanganj">
                                @lang('site.narayanganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Narsingdi' || old('presentDistrict') == 'Narsingdi' ? 'selected' : '' }} value="Narsingdi">
                                @lang('site.narsingdi')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Natore' || old('presentDistrict') == 'Natore' ? 'selected' : '' }} value="Natore">
                                @lang('site.natore')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Nawabganj' || old('presentDistrict') == 'Nawabganj' ? 'selected' : '' }} value="Nawabganj">
                                @lang('site.nawabganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Netrokona' || old('presentDistrict') == 'Netrokona' ? 'selected' : '' }} value="Netrokona">
                                @lang('site.netrokona')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Nilphamari' || old('presentDistrict') == 'Nilphamari' ? 'selected' : '' }} value="Nilphamari">
                                @lang('site.nilphamari')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Noakhali' || old('presentDistrict') == 'Noakhali' ? 'selected' : '' }} value="Noakhali">
                                @lang('site.noakhali')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Pabna' || old('presentDistrict') == 'Pabna' ? 'selected' : '' }} value="Pabna">
                                @lang('site.pabna')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Panchagarh' || old('presentDistrict') == 'Panchagarh' ? 'selected' : '' }} value="Panchagarh">
                                @lang('site.panchagarh')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Patuakhali' || old('presentDistrict') == 'Patuakhali' ? 'selected' : '' }} value="Patuakhali">
                                @lang('site.patuakhali')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Pirojpur' || old('presentDistrict') == 'Pirojpur' ? 'selected' : '' }} value="Pirojpur">
                                @lang('site.pirojpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Rajbari' || old('presentDistrict') == 'Rajbari' ? 'selected' : '' }} value="Rajbari">
                                @lang('site.rajbari')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Rajshahi' || old('presentDistrict') == 'Rajshahi' ? 'selected' : '' }} value="Rajshahi">
                                @lang('site.rajshahi')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Rangamati' || old('presentDistrict') == 'Rangamati' ? 'selected' : '' }} value="Rangamati">
                                @lang('site.rangamati')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Rangpur' || old('presentDistrict') == 'Rangpur' ? 'selected' : '' }} value="Rangpur">
                                @lang('site.rangpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Satkhira' || old('presentDistrict') == 'Satkhira' ? 'selected' : '' }} value="Satkhira">
                                @lang('site.satkhira')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Shariatpur' || old('presentDistrict') == 'Shariatpur' ? 'selected' : '' }} value="Shariatpur">
                                @lang('site.shariatpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Sherpur' || old('presentDistrict') == 'Sherpur' ? 'selected' : '' }} value="Sherpur">
                                @lang('site.sherpur')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Sirajganj' || old('presentDistrict') == 'Sirajganj' ? 'selected' : '' }} value="Sirajganj">
                                @lang('site.sirajganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Sunamganj' || old('presentDistrict') == 'Sunamganj' ? 'selected' : '' }} value="Sunamganj">
                                @lang('site.sunamganj')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Sylhet' || old('presentDistrict') == 'Sylhet' ? 'selected' : '' }} value="Sylhet">
                                @lang('site.sylhet')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Tangail' || old('presentDistrict') == 'Tangail' ? 'selected' : '' }} value="Tangail">
                                @lang('site.tangail')</option>
                            <option
                                {{ $biodata->presentDistrict == 'Thakurgaon' || old('presentDistrict') == 'Thakurgaon' ? 'selected' : '' }} value="Thakurgaon">
                                @lang('site.thakurgaon')</option>
                        </select>
                        @error('presentDistrict')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.date_of_birth_original')*</label>
                        <input type="date" name="dateOfBirth"
                            value="{{ $biodata->dateOfBirth ?? old('dateOfBirth') }}"
                            onchange="checkBirthDate(this.value)"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color" required />
                        @error('dateOfBirth')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                        <div class="text-red-600 hidden" id="bdateError"></div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.height_feet')<span class="font-extrabold">*</span></label>
                        <select required name="heightFt" value="{{ $biodata->heightFt }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block input_arrow">
                            <option value="">@lang('site.select_feet')</option>
                            <option {{ $biodata->heightFt == '3' || old('heightFt') == '3' ? 'selected' : '' }} value="3">
                                @lang('site.3') @lang('site.feet')</option>
                            <option {{ $biodata->heightFt == '4' || old('heightFt') == '4' ? 'selected' : '' }} value="4">
                                @lang('site.4') @lang('site.feet')</option>
                            <option {{ $biodata->heightFt == '5' || old('heightFt') == '5' ? 'selected' : '' }} value="5">
                                @lang('site.5') @lang('site.feet')</option>
                            <option {{ $biodata->heightFt == '6' || old('heightFt') == '6' ? 'selected' : '' }} value="6">
                                @lang('site.6') @lang('site.feet')</option>
                            <option {{ $biodata->heightFt == '7' || old('heightFt') == '7' ? 'selected' : '' }} value="7">
                                @lang('site.7') @lang('site.feet')</option>
                        </select>
                        @error('heightFt')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.height_inches')<span class="font-extrabold">*</span></label>
                        <select required type="number" name="heightInch" value="{{ $biodata->heightInch }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block input_arrow">
                            <option value="">@lang('site.select_inches')</option>
                            <option
                                {{ $biodata->heightInch == '0' || old('heightInch') == '0' ? 'selected' : '' }} value="0">
                                @lang('site.0') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '0.5' || old('heightInch') == '0.5' ? 'selected' : '' }} value="0">
                                @lang('site.0').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '1' || old('heightInch') == '1' ? 'selected' : '' }} value="1">
                                @lang('site.1') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '1.5' || old('heightInch') == '1.5' ? 'selected' : '' }} value="1.5">
                                @lang('site.1').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '2' || old('heightInch') == '2' ? 'selected' : '' }} value="2">
                                @lang('site.2') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '2.5' || old('heightInch') == '2.5' ? 'selected' : '' }} value="2.5">
                                @lang('site.2').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '3' || old('heightInch') == '3' ? 'selected' : '' }} value="3">
                                @lang('site.3') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '3.5' || old('heightInch') == '3.5' ? 'selected' : '' }} value="3.5">
                                @lang('site.3').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '4' || old('heightInch') == '4' ? 'selected' : '' }} value="4">
                                @lang('site.4') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '4.5' || old('heightInch') == '4.5' ? 'selected' : '' }} value="4.5">
                                @lang('site.4').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '5' || old('heightInch') == '5' ? 'selected' : '' }} value="5">
                                @lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '5.5' || old('heightInch') == '5.5' ? 'selected' : '' }} value="5.5">
                                @lang('site.5').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '6' || old('heightInch') == '6' ? 'selected' : '' }} value="6">
                                @lang('site.6') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '6.5' || old('heightInch') == '6.5' ? 'selected' : '' }} value="6.5">
                                @lang('site.6').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '7' || old('heightInch') == '7' ? 'selected' : '' }} value="7">
                                @lang('site.7') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '7.5' || old('heightInch') == '7.5' ? 'selected' : '' }} value="7.5">
                                @lang('site.7').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '8' || old('heightInch') == '8' ? 'selected' : '' }} value="8">
                                @lang('site.8') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '8.5' || old('heightInch') == '8.5' ? 'selected' : '' }} value="8.5">
                                @lang('site.8').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '9' || old('heightInch') == '9' ? 'selected' : '' }} value="9">
                                @lang('site.9') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '9.5' || old('heightInch') == '9.5' ? 'selected' : '' }} value="9.5">
                                @lang('site.9').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '10' || old('heightInch') == '10' ? 'selected' : '' }} value="10">
                                @lang('site.1')@lang('site.0') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '10.5' || old('heightInch') == '10.5' ? 'selected' : '' }} value="10.5">
                                @lang('site.1')@lang('site.0').@lang('site.5') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '11' || old('heightInch') == '11' ? 'selected' : '' }} value="11">
                                @lang('site.1')@lang('site.1') @lang('site.inch')</option>
                            <option
                                {{ $biodata->heightInch == '11.5' || old('heightInch') == '11.5' ? 'selected' : '' }} value="11.5">
                                @lang('site.1')@lang('site.1').@lang('site.5') @lang('site.inch')</option>
                        </select>
                        @error('heightInch')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.weight_minimum_maximum')</label>
                        <input type="number" required placeholder="@lang('site.specify_in_kg')" name="weight"
                            value="{{ $biodata->weight ?? old('weight') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block"
                            min="30" max="130" />
                        @error('weight')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c">@lang('site.complexion')</label>
                            <select name="complexion" value="{{ $biodata->complexion }}"
                                class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block input_arrow">
                                <option value="">@lang('site.select_complexion')</option>
                                <option
                                    {{ $biodata->complexion == 'bright_fair' || old('complexion') == 'bright_fair' ? 'selected' : '' }}
                                    value="bright_fair">@lang('site.bright_fair')</option>
                                <option
                                    {{ $biodata->complexion == 'fair' || old('complexion') == 'fair' ? 'selected' : '' }}
                                    value="fair">@lang('site.fair')</option>
                                <option
                                    {{ $biodata->complexion == 'light-mediam' || old('complexion') == 'light-mediam' ? 'selected' : '' }}
                                    value="light-mediam">@lang('site.light-mediam')</option>
                                <option
                                    {{ $biodata->complexion == 'mediam' || old('complexion') == 'mediam' ? 'selected' : '' }}
                                    value="mediam">@lang('site.mediam')</option>
                                <option
                                    {{ $biodata->complexion == 'light-dark' || old('complexion') == 'light-dark' ? 'selected' : '' }}
                                    value="light-dark">@lang('site.light-dark')</option>
                                <option
                                    {{ $biodata->complexion == 'dark' || old('complexion') == 'dark' ? 'selected' : '' }}
                                    value="dark">@lang('site.dark')</option>
                            </select>
                            @error('complexion')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="bloodGroup">@lang('site.blood_group')</label>
                        <select
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block input_arrow"
                            name="blood_groop" id="bloodGroup">
                            <option value="">@lang('site.select_blood_group')</option>
                            <option
                                {{ $biodata->blood_groop == 'A+' || old('blood_groop') == 'A+' ? 'selected' : '' }} value="A+">
                                A+</option>
                            <option
                                {{ $biodata->blood_groop == 'A-' || old('blood_groop') == 'A-' ? 'selected' : '' }} value="A-">
                                A-</option>
                            <option
                                {{ $biodata->blood_groop == 'O+' || old('blood_groop') == 'O+' ? 'selected' : '' }} value="O+">
                                O+</option>
                            <option
                                {{ $biodata->blood_groop == 'O-' || old('blood_groop') == 'O-' ? 'selected' : '' }} value="O-">
                                O-</option>
                            <option
                                {{ $biodata->blood_groop == 'B+' || old('blood_groop') == 'B+' ? 'selected' : '' }} value="B+">
                                B+</option>
                            <option
                                {{ $biodata->blood_groop == 'B-' || old('blood_groop') == 'B-' ? 'selected' : '' }} value="B-">
                                B-</option>
                            <option
                                {{ $biodata->blood_groop == 'AB+' || old('blood_groop') == 'AB+' ? 'selected' : '' }} value="AB+">
                                AB+</option>
                            <option
                                {{ $biodata->blood_groop == 'AB-' || old('blood_groop') == 'AB-' ? 'selected' : '' }} value="AB-">
                                AB-
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.madhhab')<span class="font-extrabold">*</span></label>
                        <select
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block input_arrow"
                            name="majhab" id="majhab" required>
                            <option value="">@lang('site.select_madhhab')</option>
                            <option
                                {{ $biodata->majhab === 'Hanafi' || old('majhab') === 'Hanafi' ? 'selected' : '' }} value="Hanafi">
                                @lang('site.hanafi')</option>
                            <option
                                {{ $biodata->majhab === 'Shafeyi' || old('majhab') === 'Shafeyi' ? 'selected' : '' }} value="Shafeyi">
                                @lang('site.shafeyi')</option>
                            <option
                                {{ $biodata->majhab === 'Maleki' || old('majhab') === 'Maleki' ? 'selected' : '' }} value="Maleki">
                                @lang('site.maleki')</option>
                            <option
                                {{ $biodata->majhab === 'Hamboli' || old('majhab') === 'Hamboli' ? 'selected' : '' }} value="Hamboli">
                                @lang('site.hamboli')</option>
                            <option
                                {{ $biodata->majhab === 'Others' || old('majhab') === 'Others' ? 'selected' : '' }} value="Others">
                                @lang('site.other')</option>
                        </select>
                        @error('majhab')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 hidden" id="majhabDetailsContainer">
                        <label for="form3Example1c">@lang('site.custom_madhhab')<span class="font-extrabold">*</span></label>
                        <textarea maxlength="100" id="majhabDetails"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block" name="majhabDetails"
                            placeholder="@lang('site.custom_madhhab_placeholder')" rows="4">{{ $biodata->majhabDetails ?? old('majhabDetails') }}</textarea>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.educational_qualification')<span class="font-extrabold">*</span></label>
                        <input type="text" name="educationalQualification"
                            value="{{ $biodata->educationalQualification ?? old('educationalQualification') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block"
                            placeholder="@lang('site.write_educational_qualification')" required />
                        @error('educationalQualification')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="form3Example1c">@lang('site.profession')<span class="font-extrabold">*</span></label>
                            <select required
                                name="occupationWant"value="{{ $biodata->occupationWant ?? old('occupationWant') }}"class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block input_arrow"placeholder="Occupation (100 Characters)">
                                <option value="">@lang('site.select_profession')</option>
                                <option
                                    {{ $biodata->occupationWant == 'unemployed' || old('occupationWant') == 'unemployed' ? 'selected' : '' }}
                                    value="unemployed">@lang('site.unemployed')</option>
                                <option
                                    {{ $biodata->occupationWant == 'student' || old('occupationWant') == 'student' ? 'selected' : '' }}
                                    value="student">@lang('site.student')</option>
                                <option
                                    {{ $biodata->occupationWant == 'earningStudent' || old('occupationWant') == 'earningStudent' ? 'selected' : '' }}
                                    value="earningStudent">@lang('site.earningstudent')</option>
                                <option
                                    {{ $biodata->occupationWant == 'doctor' || old('occupationWant') == 'doctor' ? 'selected' : '' }}
                                    value="doctor">@lang('site.doctor')</option>
                                <option
                                    {{ $biodata->occupationWant == 'engineer' || old('occupationWant') == 'engineer' ? 'selected' : '' }}
                                    value="engineer">@lang('site.engineer')</option>
                                <option
                                    {{ $biodata->occupationWant == 'govtEmployee' || old('occupationWant') == 'govtEmployee' ? 'selected' : '' }}
                                    value="govtEmployee">@lang('site.govtemployee')</option>
                                <option
                                    {{ $biodata->occupationWant == 'privateEmployee' || old('occupationWant') == 'privateEmployee' ? 'selected' : '' }}
                                    value="privateEmployee">@lang('site.privateemployee')</option>
                                <option
                                    {{ $biodata->occupationWant == 'madrasaTeacher' || old('occupationWant') == 'madrasaTeacher' ? 'selected' : '' }}
                                    value="madrasaTeacher">@lang('site.madrasateacher')</option>
                                <option
                                    {{ $biodata->occupationWant == 'generalTeacher' || old('occupationWant') == 'generalTeacher' ? 'selected' : '' }}
                                    value="generalTeacher">@lang('site.generalteacher')</option>
                                <option
                                    {{ $biodata->occupationWant == 'farming' || old('occupationWant') == 'farming' ? 'selected' : '' }}
                                    value="farming">@lang('site.farming')</option>
                                <option
                                    {{ $biodata->occupationWant == 'imam' || old('occupationWant') == 'imam' ? 'selected' : '' }}
                                    value="imam">@lang('site.imam')</option>
                                <option
                                    {{ $biodata->occupationWant == 'alem' || old('occupationWant') == 'alem' ? 'selected' : '' }}
                                    value="alem">@lang('site.alem')</option>
                                <option
                                    {{ $biodata->occupationWant == 'muazzim' || old('occupationWant') == 'muazzim' ? 'selected' : '' }}
                                    value="muazzim">@lang('site.muazzim')</option>
                                <option
                                    {{ $biodata->occupationWant == 'alem_f' || old('occupationWant') == 'alem_f' ? 'selected' : '' }}
                                    value="alem_f">@lang('site.alem_f')</option>
                                <option
                                    {{ $biodata->occupationWant == 'Trader' || old('occupationWant') == 'Trader' ? 'selected' : '' }}
                                    value="Trader">@lang('site.trader')</option>
                                <option
                                    {{ $biodata->occupationWant == 'immigrant' || old('occupationWant') == 'immigrant' ? 'selected' : '' }}
                                    value="immigrant">@lang('site.immigrant')</option>
                                <option
                                    {{ $biodata->occupationWant == 'freelancer' || old('occupationWant') == 'freelancer' ? 'selected' : '' }}
                                    value="freelancer">@lang('site.freelancer')</option>
                                <option
                                    {{ $biodata->occupationWant == 'entrepreneur' || old('occupationWant') == 'entrepreneur' ? 'selected' : '' }}
                                    value="entrepreneur">@lang('site.entrepreneur')</option>
                                <option
                                    {{ $biodata->occupationWant == 'homemaker' || old('occupationWant') == 'homemaker' ? 'selected' : '' }}
                                    value="homemaker">@lang('site.homemaker')</option>
                            </select>
                            @error('occupationWant')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="mb-3">
                        <label for="maritualStatus">@lang('site.marital_status')<span class="font-extrabold">*</span></label>
                        <select
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block input_arrow"
                            name="maritualStatusWant" id="maritualStatusWant" required>
                            <option value="">@lang('site.select_marital_status')</option>
                            <option
                                {{ $biodata->maritualStatusWant == 'Single' || old('maritualStatusWant') == 'Single' ? 'selected' : '' }}
                                value="Single">@lang($biodata->bride_groom == 'Bride' ? 'site.f_single' : 'site.single')</option>
                            <option
                                {{ $biodata->maritualStatusWant == 'Widowed' || old('maritualStatusWant') == 'Widowed' ? 'selected' : '' }}
                                value="Widowed">@lang($biodata->bride_groom == 'Bride' ? 'site.f_widowed' : 'site.widowed')</option>
                            @if ($biodata->bride_groom == 'Groom')
                                <option
                                    {{ $biodata->maritualStatusWant == 'Separated' || old('maritualStatusWant') == 'Separated' ? 'selected' : '' }}
                                    value="Separated"> @lang('site.separated') </option>
                            @endif
                            <option
                                {{ $biodata->maritualStatusWant == 'Divorced' || old('maritualStatusWant') == 'Divorced' ? 'selected' : '' }}
                                value="Divorced">@lang($biodata->bride_groom == 'Bride' ? 'site.f_divorced' : 'site.divorced')</option>
                            @if ($biodata->bride_groom == 'Groom')
                                <option
                                    {{ $biodata->maritualStatusWant == 'Married' || old('maritualStatusWant') == 'Married' ? 'selected' : '' }}
                                    value="Married">@lang('site.married')</option>
                            @endif


                        </select>
                        @error('maritualStatusWant')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 hidden" id="divorceReason">
                        <label class="form-label" for="form3Example1c">@lang('site.divorce_reason')<span
                                class="font-extrabold">*</span></label>
                        <input type="text" name="divorceReason"
                            value="{{ $biodata->divorceReason ?? old('divorceReason') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block"
                            placeholder="@lang('site.divorce_reason_500')" maxlength="500" />
                        @error('divorceReason')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-3">
                    <div class="mb-3">
                        <label class="form-label" for="form3Example1c">@lang('site.political_view')</label>
                        <input type="text" name="politicalView"
                            value="{{ $biodata->politicalView ?? old('politicalView') }}"
                            class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block"
                            placeholder="@lang('site.write_political_view')" />
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="mb-3">
                        <label for="form3Example1c">@lang('site.about_yourself')</label>
                        <textarea class="w-full item_filter item_filter_biodata placeholder-dark-color inline-block"
                            placeholder="@lang('site.about_yourself_2000')" name="aboutYourself" maxlength="2000" rows="5">{{ $biodata->aboutYourself ?? old('aboutYourself') }}</textarea>
                        @error('aboutYourself')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-span-6">
                    <a href="{{ route('frontend.biodata') }}"
                        class="inline-block bg-secondary-color rounded text-white py-2 px-5 text-lg mb-4" type="submit">
                        <span class="flex font-bold">
                            <img src="{{ asset('assets/frontend/res/images/icons/arrow_left_small.svg') }}"alt=""
                                class="w-4 mr-2">
                            @lang('site.back')
                        </span>
                    </a>
                </div>
                <div class="col-span-6">
                    <button class="block ml-auto bg-secondary-color rounded text-white py-2 px-5 text-lg mb-4"
                        type="submit">
                        <span class="flex  font-bold">
                            @lang('site.save_and_continue')
                            <img src="{{ asset('assets/frontend/res/images/icons/arrow_right_small.svg') }}"alt=""
                                class="w-4 ml-2">
                        </span>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <!-- <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                startDate: '-3d'
            });
        });
    </script> -->
@endsection
@section('js')
    <script>
        $("#majhab").on("change", function() {
            if ($("#majhab").val() === 'Others') {
                $("#majhabDetailsContainer").attr('class', 'mb-3');
                $("#majhabDetails").prop('required', true);
            } else {
                $("#majhabDetailsContainer").attr('class', 'mb-3 hidden');
                $("#majhabDetails").prop('required', false);
            }
        });
        $("#majhabDetailsContainer").attr('class', $("#majhab").val() === 'Others' ? 'mb-3' : 'mb-3 hidden');


        $("#presentAddrCheckbox").prop("checked", false);
        $("#presentAddrCheckbox").on("change", function() {
            let stat = $("#presentAddrCheckbox").prop("checked");
            document.getElementById('presentVillage').value = stat ? document.getElementById('permanentVillage')
                .value : "";
            document.getElementById('presentPostoffice').value = stat ? document.getElementById(
                'permanentPostoffice').value : "";
            document.getElementById('presentThana').value = stat ? document.getElementById('permanentThana').value :
                "";
            $('#presentDistrict').val(stat ? document.getElementById('permanentDistrict').value : "");
        });

        function toggleAddrLocation() {
            if (
                $("#permanentVillage").val() == "" ||
                // $("#permanentPostoffice").val() == "" ||
                $("#permanentThana").val() == "" ||
                $("#permanentDistrict").val() == ""
            ) {
                $(".presentAddrCheckboxContainer").addClass('hidden');
            } else {
                $(".presentAddrCheckboxContainer").removeClass('hidden');
            }
        }
    </script>
    @if ($biodata->bride_groom === 'Bride')
        <script>
            function checkMaritualStatus() {
                if ($("#maritualStatusWant").val() == 'Divorced') {
                    $("#divorceReason").removeClass('hidden');
                    $("#divorceReason input").attr("required", "");
                } else {
                    $("#divorceReason").addClass('hidden');
                    $("#divorceReason input").val("");
                    $("#divorceReason input").removeAttr("required");
                }
            }
            checkMaritualStatus()
            $("#maritualStatusWant").on('change', checkMaritualStatus);
        </script>
    @else
        <script>
            function checkMaritualStatus() {
                if ($("#maritualStatusWant").val() == 'Divorced' || $("#maritualStatusWant").val() == 'Separated') {
                    $("#divorceReason").removeClass('hidden');
                } else {
                    $("#divorceReason").addClass('hidden');
                    $("#divorceReason input").val("");
                }
            }
            checkMaritualStatus();
            $("#maritualStatusWant").on('change', checkMaritualStatus);
        </script>
    @endif

    <script>
        function fatherOccupationController() {
            let fatherOccupation = document.getElementById('fatherOccupation')
            let fatherOccupationCustom = document.getElementById('fatherOccupationCustom')
            let fatherOccupationCustomInput = document.querySelector('#fatherOccupationCustom input')
            if (fatherOccupation.value == 'other' || fatherOccupation.value == 'late') {
                fatherOccupationCustom.classList.remove('hidden');
                fatherOccupationCustomInput.setAttribute('required', '');
            } else {
                fatherOccupationCustom.classList.add('hidden');
                fatherOccupationCustomInput.removeAttribute('required', '');
            }
        }
        fatherOccupationController();
        $("#fatherOccupation").on('change', fatherOccupationController);
    </script>
    {{-- maritualStatusWant divorceReason Separated --}}
    <script>
        function checkBirthDate(bdate) {
            const birthdate = new Date(bdate);
            const today = new Date();
            const age = today.getFullYear() - birthdate.getFullYear() -
                (today.getMonth() < birthdate.getMonth() ||
                    (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate()));
            if (age < 18) {
                $('#bdateError').text('দুঃখিত, বয়স ১৮ বছরের কম হলে বায়োডাটা গ্রহনযোগ্য নয়।');
                $('#bdateError').removeClass('hidden');
            } else if (age > 75) {
                $('#bdateError').text('দুঃখিত, বয়স ৭৫ বছরের বেশি হলে বায়োডাটা গ্রহনযোগ্য নয়।');
                $('#bdateError').removeClass('hidden');
            } else {
                $('#bdateError').addClass('hidden');
            }
        }
    </script>
@endsection

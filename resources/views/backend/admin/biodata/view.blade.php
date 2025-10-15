@extends('backend.layouts.master')
@section('title', 'Biodata')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>View Biodata</div>
            </div>
        </div>
    </div>
    <div class="section_wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item m-auto">
                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                                    aria-controls="home" aria-selected="false">Biodata Filling Up</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                                    aria-controls="profile" aria-selected="false">Personal Information</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link " id="contact-tab3" data-toggle="tab" href="#contact3" role="tab"
                                    aria-controls="contact" aria-selected="true">Family Details</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link " id="BioDataTab4Id" data-toggle="tab" href="#BioDataTab4" role="tab"
                                    aria-controls="BioDataTab4Aria" aria-selected="true">Bride/Grooms More Details</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link " id="BioDataTab5Id" data-toggle="tab" href="#BioDataTab5" role="tab"
                                    aria-controls="BioDataTab5Id" aria-selected="true">Requirment</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link " id="BioDataTab6Id" data-toggle="tab" href="#BioDataTab6" role="tab"
                                    aria-controls="BioDataTab6Id" aria-selected="true">Communication</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade active show" id="home3" role="tabpanel"
                                aria-labelledby="home-tab3">
                                <div class="form-row mt-2">
                                    <div class="form-group col-md-6">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <div class="col-form-label col-sm-6 pt-0">Biodata filling up for?</div>
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <div class="custom-control custom-radio">
                                                            <input readonly disabled type="radio"
                                                                {{ $data->bride_groom == 'Bride' ? 'checked' : '' }}
                                                                id="customRadio3" name="bride_groom" value='Bride'
                                                                class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="customRadio3">Bride</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input readonly disabled type="radio" id="customRadio2"
                                                                {{ $data->bride_groom == 'Groom' ? 'checked' : '' }}
                                                                name="bride_groom" value="Groom"
                                                                class="custom-control-input">
                                                            <label class="custom-control-label"
                                                                for="customRadio2">Groom</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="maritualStatus">Name of the person filling the
                                            biodata <span style="color: red;">*</span></label>
                                        <select readonly disabled name="person_name" class="form-control"
                                            id="maritualStatus">
                                            <option {{ $data->person_name == 'Brother' ? 'selected' : '' }} value="Brother">
                                                Brother</option>
                                            <option {{ $data->person_name == 'Sister' ? 'selected' : '' }} value="Sister">
                                                Sister </option>
                                            <option {{ $data->person_name == 'Father' ? 'selected' : '' }} value="Father">
                                                Father </option>
                                            <option {{ $data->person_name == 'Mother' ? 'selected' : '' }} value="Mother">
                                                Mother </option>
                                            <option {{ $data->person_name == 'Uncle' ? 'selected' : '' }} value="Uncle">
                                                Uncle </option>
                                            <option {{ $data->person_name == 'Aunt' ? 'selected' : '' }} value="Aunt">Aunt
                                            </option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                <div class="row">
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">
                                                Name <span style="color: red;">*</span>
                                            </label>
                                            <input readonly disabled type="text" name="name"
                                                value="{{ $data->name }}" class="form-control" />
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4 col-md-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Father's Name<span
                                                    style="color: red;">*</span></label>
                                            <input readonly disabled type="text" name="fatherName"
                                                value="{{ $data->fatherName }}" class="form-control" />
                                            @error('fatherName')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4 col-md-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">Father's Occupation<span
                                                    style="color: red;">*</span></label>
                                            <input readonly disabled type="text" name="fatherOccupation"
                                                value="{{ $data->fatherOccupation }}" class="form-control" />
                                            @error('fatherOccupation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4 col-md-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">Mother's Name<span
                                                    style="color: red;">*</span></label>
                                            <input readonly disabled type="text" name="motherName"
                                                value="{{ $data->motherName }}" class="form-control" />
                                            @error('motherName')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4 col-md-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">Mother's Occupation<span
                                                    style="color: red;">*</span></label>
                                            <input readonly disabled type="text" name="motherOccupation"
                                                value="{{ $data->motherOccupation }}" class="form-control" />
                                            @error('motherOccupation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="font-bold">Address <span
                                                class="font-normal text-slate-500">(Permanent)</span>*</label>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="form3Example1c">Village/Road<span
                                                    class="font-extrabold">*</span></label>
                                            <input type="text" placeholder="Village" name="permanentVillage" disabled
                                                readonly value="{{ $data->permanentVillage ?? old('permanentVillage') }}"
                                                class="w-full item_filter item_filter_biodata placeholder-dark-color form-control"
                                                maxlength="150" />
                                            @error('permanentVillage')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="form3Example1c">Post office<span
                                                    class="font-extrabold">*</span></label>
                                            <input type="text" placeholder="Village" name="permanentPostoffice"
                                                disabled readonly
                                                value="{{ $data->permanentPostoffice ?? old('permanentPostoffice') }}"
                                                class="w-full item_filter item_filter_biodata placeholder-dark-color form-control"
                                                maxlength="150" />
                                            @error('permanentPostoffice')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="form3Example1c">Thana<span class="font-extrabold">*</span></label>
                                            <input type="text" placeholder="Thana" name="permanentThana" disabled
                                                readonly value="{{ $data->permanentThana ?? old('permanentThana') }}"
                                                class="w-full item_filter item_filter_biodata placeholder-dark-color form-control"
                                                maxlength="150" />
                                            @error('permanentThana')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="form3Example1c">District<span
                                                    class="font-extrabold">*</span></label>
                                            <select class="form-control" disabled name="permanentDistrict"
                                                value="{{ $data->permanentDistrict }}"
                                                class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow">
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'all' ? 'selected' : '' }}
                                                    value="all">সকল জেলা</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Bagerhat' ? 'selected' : '' }}
                                                    value="Bagerhat">Bagerhat</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Bandarban' ? 'selected' : '' }}
                                                    value="Bandarban">Bandarban</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Barguna' ? 'selected' : '' }}
                                                    value="Barguna">Barguna</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Barisal' ? 'selected' : '' }}
                                                    value="Barisal">Barisal</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Bhola' ? 'selected' : '' }}
                                                    value="Bhola">Bhola</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Bogra' ? 'selected' : '' }}
                                                    value="Bogra">Bogra</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Brahmanbaria' ? 'selected' : '' }}
                                                    value="Brahmanbaria">Brahmanbaria</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Chandpur' ? 'selected' : '' }}
                                                    value="Chandpur">Chandpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Chittagong' ? 'selected' : '' }}
                                                    value="Chittagong">Chittagong</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Chuadanga' ? 'selected' : '' }}
                                                    value="Chuadanga">Chuadanga</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Comilla' ? 'selected' : '' }}
                                                    value="Comilla">Comilla</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Cox' ? 'selected' : '' }}
                                                    value="Cox'sBazar">Cox'sBazar</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Dhaka' ? 'selected' : '' }}
                                                    value="Dhaka">Dhaka</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Dinajpur' ? 'selected' : '' }}
                                                    value="Dinajpur">Dinajpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Faridpur' ? 'selected' : '' }}
                                                    value="Faridpur">Faridpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Feni' ? 'selected' : '' }}
                                                    value="Feni">Feni</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Gaibandha' ? 'selected' : '' }}
                                                    value="Gaibandha">Gaibandha</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Gazipur' ? 'selected' : '' }}
                                                    value="Gazipur">Gazipur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Gopalganj' ? 'selected' : '' }}
                                                    value="Gopalganj">Gopalganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Habiganj' ? 'selected' : '' }}
                                                    value="Habiganj">Habiganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Jaipurhat' ? 'selected' : '' }}
                                                    value="Jaipurhat">Jaipurhat</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Jamalpur' ? 'selected' : '' }}
                                                    value="Jamalpur">Jamalpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Jessore' ? 'selected' : '' }}
                                                    value="Jessore">Jessore</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Jhalokati' ? 'selected' : '' }}
                                                    value="Jhalokati">Jhalokati</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Jhenaidah' ? 'selected' : '' }}
                                                    value="Jhenaidah">Jhenaidah</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Khagrachari' ? 'selected' : '' }}
                                                    value="Khagrachari">Khagrachari</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Khulna' ? 'selected' : '' }}
                                                    value="Khulna">Khulna</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Kishoreganj' ? 'selected' : '' }}
                                                    value="Kishoreganj">Kishoreganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Kurigram' ? 'selected' : '' }}
                                                    value="Kurigram">Kurigram</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Kushtia' ? 'selected' : '' }}
                                                    value="Kushtia">Kushtia</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Lakshmipur' ? 'selected' : '' }}
                                                    value="Lakshmipur">Lakshmipur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Lalmonirhat' ? 'selected' : '' }}
                                                    value="Lalmonirhat">Lalmonirhat</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Madaripur' ? 'selected' : '' }}
                                                    value="Madaripur">Madaripur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Magura' ? 'selected' : '' }}
                                                    value="Magura">Magura</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Manikganj' ? 'selected' : '' }}
                                                    value="Manikganj">Manikganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Maulvibazar' ? 'selected' : '' }}
                                                    value="Maulvibazar">Maulvibazar</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Meherpur' ? 'selected' : '' }}
                                                    value="Meherpur">Meherpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Munshiganj' ? 'selected' : '' }}
                                                    value="Munshiganj">Munshiganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Mymensingh' ? 'selected' : '' }}
                                                    value="Mymensingh">Mymensingh</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Naogaon' ? 'selected' : '' }}
                                                    value="Naogaon">Naogaon</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Narail' ? 'selected' : '' }}
                                                    value="Narail">Narail</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Narayanganj' ? 'selected' : '' }}
                                                    value="Narayanganj">Narayanganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Narsingdi' ? 'selected' : '' }}
                                                    value="Narsingdi">Narsingdi</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Natore' ? 'selected' : '' }}
                                                    value="Natore">Natore</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Nawabganj' ? 'selected' : '' }}
                                                    value="Nawabganj">Nawabganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Netrokona' ? 'selected' : '' }}
                                                    value="Netrokona">Netrokona</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Nilphamari' ? 'selected' : '' }}
                                                    value="Nilphamari">Nilphamari</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Noakhali' ? 'selected' : '' }}
                                                    value="Noakhali">Noakhali</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Pabna' ? 'selected' : '' }}
                                                    value="Pabna">Pabna</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Panchagarh' ? 'selected' : '' }}
                                                    value="Panchagarh">Panchagarh</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Patuakhali' ? 'selected' : '' }}
                                                    value="Patuakhali">Patuakhali</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Pirojpur' ? 'selected' : '' }}
                                                    value="Pirojpur">Pirojpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Rajbari' ? 'selected' : '' }}
                                                    value="Rajbari">Rajbari</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Rajshahi' ? 'selected' : '' }}
                                                    value="Rajshahi">Rajshahi</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Rangamati' ? 'selected' : '' }}
                                                    value="Rangamati">Rangamati</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Rangpur' ? 'selected' : '' }}
                                                    value="Rangpur">Rangpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Satkhira' ? 'selected' : '' }}
                                                    value="Satkhira">Satkhira</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Shariatpur' ? 'selected' : '' }}
                                                    value="Shariatpur">Shariatpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Sherpur' ? 'selected' : '' }}
                                                    value="Sherpur">Sherpur</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Sirajganj' ? 'selected' : '' }}
                                                    value="Sirajganj">Sirajganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Sunamganj' ? 'selected' : '' }}
                                                    value="Sunamganj">Sunamganj</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Sylhet' ? 'selected' : '' }}
                                                    value="Sylhet">Sylhet</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Tangail' ? 'selected' : '' }}
                                                    value="Tangail">Tangail</option>
                                                <option
                                                    {{ $data->permanentDistrict ?? old('permanentDistrict') == 'Thakurgaon' ? 'selected' : '' }}
                                                    value="Thakurgaon">Thakurgaon</option>
                                            </select>
                                            @error('permanentDistrict')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <label class="font-bold">Address <span
                                                class="font-normal text-slate-500">(Present)</span>*</label>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="form3Example1c">Village/Road<span
                                                    class="font-extrabold">*</span></label>
                                            <input type="text" placeholder="Village" name="presentVillage" disabled
                                                readonly value="{{ $data->presentVillage ?? old('presentVillage') }}"
                                                class="w-full item_filter item_filter_biodata placeholder-dark-color form-control"
                                                maxlength="150" />
                                            @error('presentVillage')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="form3Example1c">Post office<span
                                                    class="font-extrabold">*</span></label>
                                            <input type="text" placeholder="Village" name="presentPostoffice" disabled
                                                readonly value="{{ $data->presentPostoffice ?? old('presentPostoffice') }}"
                                                class="w-full item_filter item_filter_biodata placeholder-dark-color form-control"
                                                maxlength="150" />
                                            @error('presentPostoffice')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="form3Example1c">Thana<span class="font-extrabold">*</span></label>
                                            <input type="text" placeholder="Thana" name="presentThana" disabled
                                                readonly value="{{ $data->presentThana ?? old('presentThana') }}"
                                                class="w-full item_filter item_filter_biodata placeholder-dark-color form-control"
                                                maxlength="150" />
                                            @error('presentThana')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-3">
                                        <div class="form-outline flex-fill mb-0">
                                            <label for="form3Example1c">District<span
                                                    class="font-extrabold">*</span></label>
                                            <select class="form-control" disabled name="presentDistrict"
                                                value="{{ $data->presentDistrict }}"
                                                class="w-full item_filter item_filter_biodata placeholder-dark-color input_arrow">
                                                <option {{ $data->presentDistrict == 'all' ? 'selected' : '' }}
                                                    value="all">সকল জেলা</option>
                                                <option {{ $data->presentDistrict == 'Bagerhat' ? 'selected' : '' }}
                                                    value="Bagerhat">Bagerhat</option>
                                                <option {{ $data->presentDistrict == 'Bandarban' ? 'selected' : '' }}
                                                    value="Bandarban">Bandarban</option>
                                                <option {{ $data->presentDistrict == 'Barguna' ? 'selected' : '' }}
                                                    value="Barguna">Barguna</option>
                                                <option {{ $data->presentDistrict == 'Barisal' ? 'selected' : '' }}
                                                    value="Barisal">Barisal</option>
                                                <option {{ $data->presentDistrict == 'Bhola' ? 'selected' : '' }}
                                                    value="Bhola">Bhola</option>
                                                <option {{ $data->presentDistrict == 'Bogra' ? 'selected' : '' }}
                                                    value="Bogra">Bogra</option>
                                                <option {{ $data->presentDistrict == 'Brahmanbaria' ? 'selected' : '' }}
                                                    value="Brahmanbaria">Brahmanbaria</option>
                                                <option {{ $data->presentDistrict == 'Chandpur' ? 'selected' : '' }}
                                                    value="Chandpur">Chandpur</option>
                                                <option {{ $data->presentDistrict == 'Chittagong' ? 'selected' : '' }}
                                                    value="Chittagong">Chittagong</option>
                                                <option {{ $data->presentDistrict == 'Chuadanga' ? 'selected' : '' }}
                                                    value="Chuadanga">Chuadanga</option>
                                                <option {{ $data->presentDistrict == 'Comilla' ? 'selected' : '' }}
                                                    value="Comilla">Comilla</option>
                                                <option {{ $data->presentDistrict == 'Cox' ? 'selected' : '' }}
                                                    value="Cox'sBazar">Cox'sBazar</option>
                                                <option {{ $data->presentDistrict == 'Dhaka' ? 'selected' : '' }}
                                                    value="Dhaka">Dhaka</option>
                                                <option {{ $data->presentDistrict == 'Dinajpur' ? 'selected' : '' }}
                                                    value="Dinajpur">Dinajpur</option>
                                                <option {{ $data->presentDistrict == 'Faridpur' ? 'selected' : '' }}
                                                    value="Faridpur">Faridpur</option>
                                                <option {{ $data->presentDistrict == 'Feni' ? 'selected' : '' }}
                                                    value="Feni">Feni</option>
                                                <option {{ $data->presentDistrict == 'Gaibandha' ? 'selected' : '' }}
                                                    value="Gaibandha">Gaibandha</option>
                                                <option {{ $data->presentDistrict == 'Gazipur' ? 'selected' : '' }}
                                                    value="Gazipur">Gazipur</option>
                                                <option {{ $data->presentDistrict == 'Gopalganj' ? 'selected' : '' }}
                                                    value="Gopalganj">Gopalganj</option>
                                                <option {{ $data->presentDistrict == 'Habiganj' ? 'selected' : '' }}
                                                    value="Habiganj">Habiganj</option>
                                                <option {{ $data->presentDistrict == 'Jaipurhat' ? 'selected' : '' }}
                                                    value="Jaipurhat">Jaipurhat</option>
                                                <option {{ $data->presentDistrict == 'Jamalpur' ? 'selected' : '' }}
                                                    value="Jamalpur">Jamalpur</option>
                                                <option {{ $data->presentDistrict == 'Jessore' ? 'selected' : '' }}
                                                    value="Jessore">Jessore</option>
                                                <option {{ $data->presentDistrict == 'Jhalokati' ? 'selected' : '' }}
                                                    value="Jhalokati">Jhalokati</option>
                                                <option {{ $data->presentDistrict == 'Jhenaidah' ? 'selected' : '' }}
                                                    value="Jhenaidah">Jhenaidah</option>
                                                <option {{ $data->presentDistrict == 'Khagrachari' ? 'selected' : '' }}
                                                    value="Khagrachari">Khagrachari</option>
                                                <option {{ $data->presentDistrict == 'Khulna' ? 'selected' : '' }}
                                                    value="Khulna">Khulna</option>
                                                <option {{ $data->presentDistrict == 'Kishoreganj' ? 'selected' : '' }}
                                                    value="Kishoreganj">Kishoreganj</option>
                                                <option {{ $data->presentDistrict == 'Kurigram' ? 'selected' : '' }}
                                                    value="Kurigram">Kurigram</option>
                                                <option {{ $data->presentDistrict == 'Kushtia' ? 'selected' : '' }}
                                                    value="Kushtia">Kushtia</option>
                                                <option {{ $data->presentDistrict == 'Lakshmipur' ? 'selected' : '' }}
                                                    value="Lakshmipur">Lakshmipur</option>
                                                <option {{ $data->presentDistrict == 'Lalmonirhat' ? 'selected' : '' }}
                                                    value="Lalmonirhat">Lalmonirhat</option>
                                                <option {{ $data->presentDistrict == 'Madaripur' ? 'selected' : '' }}
                                                    value="Madaripur">Madaripur</option>
                                                <option {{ $data->presentDistrict == 'Magura' ? 'selected' : '' }}
                                                    value="Magura">Magura</option>
                                                <option {{ $data->presentDistrict == 'Manikganj' ? 'selected' : '' }}
                                                    value="Manikganj">Manikganj</option>
                                                <option {{ $data->presentDistrict == 'Maulvibazar' ? 'selected' : '' }}
                                                    value="Maulvibazar">Maulvibazar</option>
                                                <option {{ $data->presentDistrict == 'Meherpur' ? 'selected' : '' }}
                                                    value="Meherpur">Meherpur</option>
                                                <option {{ $data->presentDistrict == 'Munshiganj' ? 'selected' : '' }}
                                                    value="Munshiganj">Munshiganj</option>
                                                <option {{ $data->presentDistrict == 'Mymensingh' ? 'selected' : '' }}
                                                    value="Mymensingh">Mymensingh</option>
                                                <option {{ $data->presentDistrict == 'Naogaon' ? 'selected' : '' }}
                                                    value="Naogaon">Naogaon</option>
                                                <option {{ $data->presentDistrict == 'Narail' ? 'selected' : '' }}
                                                    value="Narail">Narail</option>
                                                <option {{ $data->presentDistrict == 'Narayanganj' ? 'selected' : '' }}
                                                    value="Narayanganj">Narayanganj</option>
                                                <option {{ $data->presentDistrict == 'Narsingdi' ? 'selected' : '' }}
                                                    value="Narsingdi">Narsingdi</option>
                                                <option {{ $data->presentDistrict == 'Natore' ? 'selected' : '' }}
                                                    value="Natore">Natore</option>
                                                <option {{ $data->presentDistrict == 'Nawabganj' ? 'selected' : '' }}
                                                    value="Nawabganj">Nawabganj</option>
                                                <option {{ $data->presentDistrict == 'Netrokona' ? 'selected' : '' }}
                                                    value="Netrokona">Netrokona</option>
                                                <option {{ $data->presentDistrict == 'Nilphamari' ? 'selected' : '' }}
                                                    value="Nilphamari">Nilphamari</option>
                                                <option {{ $data->presentDistrict == 'Noakhali' ? 'selected' : '' }}
                                                    value="Noakhali">Noakhali</option>
                                                <option {{ $data->presentDistrict == 'Pabna' ? 'selected' : '' }}
                                                    value="Pabna">Pabna</option>
                                                <option {{ $data->presentDistrict == 'Panchagarh' ? 'selected' : '' }}
                                                    value="Panchagarh">Panchagarh</option>
                                                <option {{ $data->presentDistrict == 'Patuakhali' ? 'selected' : '' }}
                                                    value="Patuakhali">Patuakhali</option>
                                                <option {{ $data->presentDistrict == 'Pirojpur' ? 'selected' : '' }}
                                                    value="Pirojpur">Pirojpur</option>
                                                <option {{ $data->presentDistrict == 'Rajbari' ? 'selected' : '' }}
                                                    value="Rajbari">Rajbari</option>
                                                <option {{ $data->presentDistrict == 'Rajshahi' ? 'selected' : '' }}
                                                    value="Rajshahi">Rajshahi</option>
                                                <option {{ $data->presentDistrict == 'Rangamati' ? 'selected' : '' }}
                                                    value="Rangamati">Rangamati</option>
                                                <option {{ $data->presentDistrict == 'Rangpur' ? 'selected' : '' }}
                                                    value="Rangpur">Rangpur</option>
                                                <option {{ $data->presentDistrict == 'Satkhira' ? 'selected' : '' }}
                                                    value="Satkhira">Satkhira</option>
                                                <option {{ $data->presentDistrict == 'Shariatpur' ? 'selected' : '' }}
                                                    value="Shariatpur">Shariatpur</option>
                                                <option {{ $data->presentDistrict == 'Sherpur' ? 'selected' : '' }}
                                                    value="Sherpur">Sherpur</option>
                                                <option {{ $data->presentDistrict == 'Sirajganj' ? 'selected' : '' }}
                                                    value="Sirajganj">Sirajganj</option>
                                                <option {{ $data->presentDistrict == 'Sunamganj' ? 'selected' : '' }}
                                                    value="Sunamganj">Sunamganj</option>
                                                <option {{ $data->presentDistrict == 'Sylhet' ? 'selected' : '' }}
                                                    value="Sylhet">Sylhet</option>
                                                <option {{ $data->presentDistrict == 'Tangail' ? 'selected' : '' }}
                                                    value="Tangail">Tangail</option>
                                                <option {{ $data->presentDistrict == 'Thakurgaon' ? 'selected' : '' }}
                                                    value="Thakurgaon">Thakurgaon</option>
                                            </select>
                                            @error('presentDistrict')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Date of Birth
                                                    (Original)<span style="color: red;">*</span></label>
                                                <input readonly disabled type="date" class="form-control"
                                                    name="dateOfBirth" value="{{ $data->dateOfBirth }}" />
                                                @error('presentAddress')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Height<span
                                                        style="color: red;">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-4" style="padding-right: 0;">
                                                        <input readonly disabled type="number" placeholder="Foot only"
                                                            name="heightFt" value="{{ $data->heightFt }}"
                                                            class="form-control" />
                                                        @error('presentAddress')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-1" style="padding: 2;">
                                                        <label class="form-label" for="form3Example1c">ft'</label>
                                                    </div>
                                                    <div class="col-md-4" style="padding-right: 0;">
                                                        <input readonly disabled type="number" placeholder="Inch only"
                                                            name="heightInch" value="{{ $data->heightInch }}"
                                                            class="form-control" />
                                                        @error('presentAddress')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-1" style="padding-left: 2;">
                                                        <label class="form-label" for="form3Example1c">inch"</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Weight<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="number" placeholder="KG only"
                                                    name="weight" value="{{ $data->weight }}" class="form-control" />
                                                @error('presentAddress')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Complexion<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="text" name="complexion"
                                                    value="{{ $data->complexion }}" class="form-control" />
                                                @error('presentAddress')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="bloodGroup">Blood Group</label>
                                                <select readonly disabled class="form-control" name="blood_groop"
                                                    id="bloodGroup">
                                                    <option {{ $data->blood_groop == 'A+' ? 'selected' : '' }}
                                                        value="A+">A+</option>
                                                    <option {{ $data->blood_groop == 'A-' ? 'selected' : '' }}
                                                        value="A-">A-</option>
                                                    <option {{ $data->blood_groop == 'O+' ? 'selected' : '' }}
                                                        value="O+">O+</option>
                                                    <option {{ $data->blood_groop == 'O-' ? 'selected' : '' }}
                                                        value="O-">O-</option>
                                                    <option {{ $data->blood_groop == 'B+' ? 'selected' : '' }}
                                                        value="B+">B+</option>
                                                    <option {{ $data->blood_groop == 'B-' ? 'selected' : '' }}
                                                        value="B-">B-</option>
                                                    <option {{ $data->blood_groop == 'AB+' ? 'selected' : '' }}
                                                        value="AB+">AB+</option>
                                                    <option {{ $data->blood_groop == 'AB-' ? 'selected' : '' }}
                                                        value="AB-">AB-</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Majhab<span
                                                        style="color: red;">*</span></label>
                                                <select readonly disabled class="form-control" name="majhab"
                                                    id="majhab">
                                                    <option {{ $data->majhab == 'Hanafi' ? 'selected' : '' }}
                                                        value="Hanafi">Hanafi</option>
                                                    <option {{ $data->majhab == 'Shafeyi' ? 'selected' : '' }}
                                                        value="Shafeyi">Shafeyi</option>
                                                    <option {{ $data->majhab == 'Maleki' ? 'selected' : '' }}
                                                        value="Maleki">Maleki</option>
                                                    <option {{ $data->majhab == 'Hamboli' ? 'selected' : '' }}
                                                        value="Hamboli">Hamboli</option>
                                                    <option {{ $data->majhab == 'Others' ? 'selected' : '' }}
                                                        value="Others">Others</option>
                                                </select>
                                                @error('presentAddress')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        @if ($data->majhabDetails != null)
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example1c">Majhab Details<span
                                                            style="color: red;">*</span></label>
                                                    <textarea disabled rows="3" class="form-control" name="majhabDetails">{{ $data->majhabDetails }}</textarea>
                                                    @error('majhabDetails')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c">Educational Qualification<span
                                                style="color: red;">*</span></label>
                                        <input readonly disabled type="text" name="educationalQualification"
                                            value="{{ $data->educationalQualification }}" class="form-control" />
                                        @error('presentAddress')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Occupation<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="text" name="occupationWant"
                                                    value="{{ $data->occupationWant }}" class="form-control" />
                                                @error('presentAddress')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="maritualStatus">Maritual Status<span
                                                        style="color: red;">*</span></label>
                                                <select readonly disabled class="form-control" name="maritualStatusWant"
                                                    id="maritualStatus">
                                                    <option {{ $data->maritualStatusWant == 'Single' ? 'selected' : '' }}
                                                        value="Single">Single</option>
                                                    <option {{ $data->maritualStatusWant == 'Widowed' ? 'selected' : '' }}
                                                        value="Widowed">Widowed </option>
                                                    <option
                                                        {{ $data->maritualStatusWant == 'Separated' ? 'selected' : '' }}
                                                        value="Separated">Separated </option>
                                                    <option {{ $data->maritualStatusWant == 'Divorced' ? 'selected' : '' }}
                                                        value="Divorced">Divorced </option>
                                                    <option {{ $data->maritualStatusWant == 'Married' ? 'selected' : '' }}
                                                        value="Married">Married </option>
                                                </select>
                                                @error('presentAddress')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">The political point of
                                                    view</label>
                                                <input readonly disabled type="text" name="politicalView"
                                                    value="{{ $data->politicalView }}" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c">About Yourself<span
                                                style="color: red;">*</span></label>
                                        <textarea readonly disabled class="col-md-12" placeholder="Write something about you. not more then 250 words"
                                            name="aboutYourself" rows="5">{{ $data->aboutYourself }}</textarea>
                                        @error('presentAddress')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                {{-- @php
                                    $brotherNameData = json_decode($data->brotherName);
                                    $brotherEduQualificationData = json_decode($data->brotherEduQualification);
                                    $brotherOccupationData = json_decode($data->brotherOccupation);
                                    $brotherMarritalStatusData = json_decode($data->brotherMarritalStatus);

                                    $sisterNameData = json_decode($data->sisterName);
                                    $sisterEduQualificationData = json_decode($data->sisterEduQualification);
                                    $sisterOccupationData = json_decode($data->sisterOccupation);
                                    $sisterMarritalStatusData = json_decode($data->sisterMarritalStatus);

                                    $paternalUncleNameData = json_decode($data->paternalUncleName);
                                    $paternalUncleEduQualificationData = json_decode(
                                        $data->paternalUncleEduQualification,
                                    );
                                    $paternalUncleOccupationData = json_decode($data->paternalUncleOccupation);
                                    $paternalUncleMarritalStatusData = json_decode($data->paternalUncleMarritalStatus);

                                    $maternalUncleNameData = json_decode($data->maternalUncleName);
                                    $maternalUncleEduQualificationData = json_decode(
                                        $data->maternalUncleEduQualification,
                                    );
                                    $maternalUncleOccupationData = json_decode($data->maternalUncleOccupation);
                                    $maternalUncleMarritalStatusData = json_decode($data->maternalUncleMarritalStatus);
                                @endphp
                                <div id="addMore">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="font-bold">Brother <span
                                                    class="font-normal text-slate-500">({{ $data->brotherNumber }})</span>*</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                @if ($brotherNameData != null)
                                                    @foreach ($brotherNameData as $brotherName)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Brothers's Name<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="brotherName[]" value="{{ $brotherName }}"
                                                                        class="form-control" />
                                                                    @error('brotherName')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                @if ($brotherEduQualificationData != null)
                                                    @foreach ($brotherEduQualificationData as $brotherEduQualification)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Educational Qualification<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="brotherEduQualification[]"
                                                                        value="{{ $brotherEduQualification }}"
                                                                        class="form-control" />
                                                                    @error('brotherEduQualification')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                @if ($brotherOccupationData != null)
                                                    @foreach ($brotherOccupationData as $brotherOccupation)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Occupation<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="brotherOccupation[]"
                                                                        value="{{ $brotherOccupation }}"
                                                                        class="form-control" />
                                                                    @error('brotherOccupation')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                @if ($brotherMarritalStatusData != null)
                                                    @foreach ($brotherMarritalStatusData as $brotherMarritalStatus)
                                                        <div class="col-md-12">
                                                            <div class="flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="brotherMarritalStatus">Maritual Status<span
                                                                            style="color: red;">*</span></label>
                                                                    <select readonly disabled
                                                                        name="brotherMarritalStatus[]"
                                                                        class="form-control" id="brotherMarritalStatus">
                                                                        <option
                                                                            {{ $brotherMarritalStatus == 'Single' ? 'selected' : '' }}
                                                                            value="Single">Single</option>
                                                                        <option
                                                                            {{ $brotherMarritalStatus == 'Widowed' ? 'selected' : '' }}
                                                                            value="Widowed">Widowed </option>
                                                                        <option
                                                                            {{ $brotherMarritalStatus == 'Separated' ? 'selected' : '' }}
                                                                            value="Separated">Separated </option>
                                                                        <option
                                                                            {{ $brotherMarritalStatus == 'Divorced' ? 'selected' : '' }}
                                                                            value="Divorced">Divorced </option>
                                                                        <option
                                                                            {{ $brotherMarritalStatus == 'Married' ? 'selected' : '' }}
                                                                            value="Married">Married </option>
                                                                    </select>
                                                                    @error('brotherMarritalStatus')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="font-bold">Sister <span
                                                    class="font-normal text-slate-500">({{ $data->brotherNumber }})</span>*</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                @if ($sisterNameData != null)
                                                    @foreach ($sisterNameData as $sisterName)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Sister's Name<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="sisterName[]" value="{{ $sisterName }}"
                                                                        class="form-control" />
                                                                    @error('sisterName')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                @if ($sisterEduQualificationData != null)
                                                    @foreach ($sisterEduQualificationData as $sisterEduQualification)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Educational Qualification<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="sisterEduQualification[]"
                                                                        value="{{ $sisterEduQualification }}"
                                                                        class="form-control" />
                                                                    @error('sisterEduQualification')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                @if ($sisterOccupationData != null)
                                                    @foreach ($sisterOccupationData as $sisterOccupation)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Occupation<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="sisterOccupation[]"
                                                                        value="{{ $sisterOccupation }}"
                                                                        class="form-control" />
                                                                    @error('sisterOccupation')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                @if ($sisterMarritalStatusData != null)
                                                    @foreach ($sisterMarritalStatusData as $sisterMarritalStatus)
                                                        <div class="col-md-12">
                                                            <div class="flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="sisterMarritalStatus">Maritual Status<span
                                                                            style="color: red;">*</span></label>
                                                                    <select readonly disabled name="sisterMarritalStatus[]"
                                                                        class="form-control" id="sisterMarritalStatus">
                                                                        <option
                                                                            {{ $sisterMarritalStatus == 'Single' ? 'selected' : '' }}
                                                                            value="Single">Single</option>
                                                                        <option
                                                                            {{ $sisterMarritalStatus == 'Widowed' ? 'selected' : '' }}
                                                                            value="Widowed">Widowed </option>
                                                                        <option
                                                                            {{ $sisterMarritalStatus == 'Separated' ? 'selected' : '' }}
                                                                            value="Separated">Separated </option>
                                                                        <option
                                                                            {{ $sisterMarritalStatus == 'Divorced' ? 'selected' : '' }}
                                                                            value="Divorced">Divorced </option>
                                                                        <option
                                                                            {{ $sisterMarritalStatus == 'Married' ? 'selected' : '' }}
                                                                            value="Married">Married </option>
                                                                    </select>
                                                                    @error('sisterMarritalStatus')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="addmore">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Financial status<span
                                                        class="font-extrabold">*</span></label>
                                                <select disabled name="financialStatus"
                                                    value="{{ $data->financialStatus }}"
                                                    class="w-full item_filter form-control item_filter_biodata placeholder-dark-color input_arrow">
                                                    <option value="">Select One</option>
                                                    <option
                                                        {{ $data->financialStatus ?? old('financialStatus') == 'upper_class' ? 'selected' : '' }}
                                                        value="upper_class">উচ্চবিত্ত</option>
                                                    <option
                                                        {{ $data->financialStatus ?? old('financialStatus') == 'upper_middleclass' ? 'selected' : '' }}
                                                        value="upper_middleclass">উচ্চ মধ্যবিত্ত</option>
                                                    <option
                                                        {{ $data->financialStatus ?? old('financialStatus') == 'middleclass' ? 'selected' : '' }}
                                                        value="middleclass">মধ্যবিত্ত</option>
                                                    <option
                                                        {{ $data->financialStatus ?? old('financialStatus') == 'lower_middleclass' ? 'selected' : '' }}
                                                        value="lower_middleclass">নিম্ন মধ্যবিত্ত</option>
                                                    <option
                                                        {{ $data->financialStatus ?? old('financialStatus') == 'lower_class' ? 'selected' : '' }}
                                                        value="lower_class">দরিদ্র</option>
                                                    <option
                                                        {{ $data->financialStatus ?? old('financialStatus') == 'poor' ? 'selected' : '' }}
                                                        value="poor">হতদরিদ্র</option>
                                                </select>
                                                @error('financialStatus')
                                                    <div class="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Social status<span
                                                        class="font-extrabold">*</span></label>
                                                <select disabled name="socialStatus" value="{{ $data->socialStatus }}"
                                                    class="w-full item_filter form-control item_filter_biodata placeholder-dark-color input_arrow">
                                                    <option value="">Select One</option>
                                                    <option
                                                        {{ $data->socialStatus ?? old('socialStatus') == 'honored' ? 'selected' : '' }}
                                                        value="honored">সম্ভ্রান্ত</option>
                                                    <option
                                                        {{ $data->socialStatus ?? old('socialStatus') == 'influential' ? 'selected' : '' }}
                                                        value="influential">প্রভাবশালী</option>
                                                    <option
                                                        {{ $data->socialStatus ?? old('socialStatus') == 'respected' ? 'selected' : '' }}
                                                        value="respected">সম্মানিত</option>
                                                    <option
                                                        {{ $data->socialStatus ?? old('socialStatus') == 'honored_influential' ? 'selected' : '' }}
                                                        value="honored_influential">সম্ভ্রান্ত ও প্রভাবশালী</option>
                                                    <option
                                                        {{ $data->socialStatus ?? old('socialStatus') == 'respected_influential' ? 'selected' : '' }}
                                                        value="respected_influential">সম্মানিত ও প্রভাবশালী</option>
                                                    <option
                                                        {{ $data->socialStatus ?? old('socialStatus') == 'honored_respected' ? 'selected' : '' }}
                                                        value="honored_respected">সম্ভ্রান্ত ও সম্মানিত</option>
                                                    <option
                                                        {{ $data->socialStatus ?? old('socialStatus') == 'average' ? 'selected' : '' }}
                                                        value="average">মোটামুটি</option>
                                                </select>
                                                @error('socialStatus')
                                                    <div class="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="addMore">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="font-bold">Paternal Uncle <span
                                                    class="font-normal text-slate-500">({{ $data->paternalUncleNumber }})</span>*</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                @foreach ($data->family()->paternal_uncles as $paternal_uncle)
                                                    <div class="col-md-12">
                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <div class="form-outline flex-fill mb-0">
                                                                <label class="form-label" for="form3Example1c">Paternal
                                                                    Uncle Name<span style="color: red;">*</span></label>
                                                                <input readonly disabled type="text"
                                                                    name="paternalUncleName[]"
                                                                    value="{{ $paternalUncleName }}"
                                                                    class="form-control" />
                                                                @error('paternalUncleName')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                @if ($paternalUncleEduQualificationData != null)
                                                    @foreach ($paternalUncleEduQualificationData as $paternalUncleEduQualification)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Educational Qualification<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="paternalUncleEduQualification[]"
                                                                        value="{{ $paternalUncleEduQualification }}"
                                                                        class="form-control" />
                                                                    @error('paternalUncleEduQualification')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                @if ($paternalUncleOccupationData != null)
                                                    @foreach ($paternalUncleOccupationData as $paternalUncleOccupation)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Occupation<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="paternalUncleOccupation[]"
                                                                        value="{{ $paternalUncleOccupation }}"
                                                                        class="form-control" />
                                                                    @error('paternalUncleOccupation')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                @if ($paternalUncleMarritalStatusData != null)
                                                    @foreach ($paternalUncleMarritalStatusData as $paternalUncleMarritalStatus)
                                                        <div class="col-md-12">
                                                            <div class="flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="paternalUncleMarritalStatus">Maritual
                                                                        Status<span style="color: red;">*</span></label>
                                                                    <select readonly disabled
                                                                        name="paternalUncleMarritalStatus[]"
                                                                        class="form-control"
                                                                        id="paternalUncleMarritalStatus">
                                                                        <option
                                                                            {{ $paternalUncleMarritalStatus == 'Single' ? 'selected' : '' }}
                                                                            value="Single">Single</option>
                                                                        <option
                                                                            {{ $paternalUncleMarritalStatus == 'Widowed' ? 'selected' : '' }}
                                                                            value="Widowed">Widowed </option>
                                                                        <option
                                                                            {{ $paternalUncleMarritalStatus == 'Separated' ? 'selected' : '' }}
                                                                            value="Separated">Separated </option>
                                                                        <option
                                                                            {{ $paternalUncleMarritalStatus == 'Divorced' ? 'selected' : '' }}
                                                                            value="Divorced">Divorced </option>
                                                                        <option
                                                                            {{ $paternalUncleMarritalStatus == 'Married' ? 'selected' : '' }}
                                                                            value="Married">Married </option>
                                                                    </select>
                                                                    @error('paternalUncleMarritalStatus')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="font-bold">Maternal Uncle <span
                                                    class="font-normal text-slate-500">({{ $data->maternalUncleNumber }})</span>*</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                @if ($maternalUncleNameData != null)
                                                    @foreach ($maternalUncleNameData as $maternalUncleName)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Maternal Uncle Name<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="maternalUncleName[]"
                                                                        value="{{ $maternalUncleName }}"
                                                                        class="form-control" />
                                                                    @error('maternalUncleName')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                @if ($maternalUncleEduQualificationData != null)
                                                    @foreach ($maternalUncleEduQualificationData as $maternalUncleEduQualification)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Educational Qualification<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="maternalUncleEduQualification[]"
                                                                        value="{{ $maternalUncleEduQualification }}"
                                                                        class="form-control" />
                                                                    @error('maternalUncleEduQualification')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                @if ($maternalUncleOccupationData != null)
                                                    @foreach ($maternalUncleOccupationData as $maternalUncleOccupation)
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="form3Example1c">Occupation<span
                                                                            style="color: red;">*</span></label>
                                                                    <input readonly disabled type="text"
                                                                        name="maternalUncleOccupation[]"
                                                                        value="{{ $maternalUncleOccupation }}"
                                                                        class="form-control" />
                                                                    @error('maternalUncleOccupation')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                @if ($maternalUncleMarritalStatusData != null)
                                                    @foreach ($maternalUncleMarritalStatusData as $maternalUncleMarritalStatus)
                                                        <div class="col-md-12">
                                                            <div class="flex-row align-items-center mb-4">
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="maternalUncleMarritalStatus">Maritual
                                                                        Status<span style="color: red;">*</span></label>
                                                                    <select readonly disabled name="sisterMarritalStatus[]"
                                                                        class="form-control"
                                                                        id="maternalUncleMarritalStatus">
                                                                        <option
                                                                            {{ $maternalUncleMarritalStatus == 'Single' ? 'selected' : '' }}
                                                                            value="Single">Single</option>
                                                                        <option
                                                                            {{ $maternalUncleMarritalStatus == 'Widowed' ? 'selected' : '' }}
                                                                            value="Widowed">Widowed </option>
                                                                        <option
                                                                            {{ $maternalUncleMarritalStatus == 'Separated' ? 'selected' : '' }}
                                                                            value="Separated">Separated </option>
                                                                        <option
                                                                            {{ $maternalUncleMarritalStatus == 'Divorced' ? 'selected' : '' }}
                                                                            value="Divorced">Divorced </option>
                                                                        <option
                                                                            {{ $maternalUncleMarritalStatus == 'Married' ? 'selected' : '' }}
                                                                            value="Married">Married </option>
                                                                    </select>
                                                                    @error('maternalUncleMarritalStatus')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                            <div class="tab-pane fade " id="BioDataTab4" role="tabpanel"
                                aria-labelledby="BioDataTab4Id">
                                <div class="row">
                                    <div class="d-flex flex-row align-items-center mb-4 col-md-6">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Concept about Marriage (short
                                                note)<span style="color: red;">*</span></label>
                                            <input readonly disabled type="text" name="concept_about"
                                                value="{{ $data->concept_about }}" class="form-control" />
                                            @error('concept_about')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if ($data->vail != null)
                                        <div class="d-flex flex-row align-items-center mb-4 col-md-6">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Vail ( Do you follow
                                                    Mahram, Non-Mahram, Hijab, or Nikab?)<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="text" name="vail"
                                                    value="{{ $data->vail }}" class="form-control" />
                                                @error('vail')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif

                                    @if ($data->job_permission != null)
                                        <div class="d-flex flex-row align-items-center mb-4 col-md-6">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Will you allow your wife to
                                                    have a job? (Gents only)<span style="color: red;">*</span></label>
                                                <input readonly disabled type="text" name="job_permission"
                                                    value="{{ $data->job_permission }}" class="form-control" />
                                                @error('job_permission')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif

                                    @if ($data->job_join != null)
                                        <div class="d-flex flex-row align-items-center mb-4 col-md-6">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Do you want to join any
                                                    jobs in the future? (Ladies only)<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="text" name="job_join"
                                                    value="{{ $data->job_join }}" class="form-control" />
                                                @error('job_join')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Do you have beards? (Gents
                                                    only)<span style="color: red;">*</span></label>
                                                &nbsp;
                                                &nbsp;
                                                <div class="form-check form-check-inline">
                                                    <input readonly disabled class="form-check-input"
                                                        {{ $data->beards == '1' ? 'checked' : '' }} type="radio"
                                                        name="beards" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input readonly disabled class="form-check-input"
                                                        {{ $data->beards == '0' ? 'checked' : '' }} type="radio"
                                                        name="beards" id="inlineRadio2" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @error('beards')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Do you watch TV or listen
                                                    to any kind of music?</label>
                                                &nbsp;
                                                &nbsp;
                                                <div class="form-check form-check-inline">
                                                    <input readonly disabled class="form-check-input" type="radio"
                                                        {{ $data->tv_watch == '1' ? 'checked' : '' }} name="tv_watch"
                                                        id="inlineRadio11" value="1">
                                                    <label class="form-check-label" for="inlineRadio11">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input readonly disabled class="form-check-input" type="radio"
                                                        {{ $data->tv_watch == '0' ? 'checked' : '' }} name="tv_watch"
                                                        id="inlineRadio22" value="0">
                                                    <label class="form-check-label" for="inlineRadio22">No</label>
                                                </div>
                                                @error('tv_watch')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example3c">Do you know how to recite The Holy
                                            Quran in Sahih Tajbid (purely)?<span style="color: red;">*</span></label>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                {{ $data->music_listen == 'yes' ? 'checked' : '' }} name="music_listen"
                                                id="music_listen1" value="yes">
                                            <label class="form-check-label" for="music_listen1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                {{ $data->music_listen == 'no' ? 'checked' : '' }} name="music_listen"
                                                id="music_listen2" value="no">
                                            <label class="form-check-label" for="music_listen2">No</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                {{ $data->music_listen == 'roughly' ? 'checked' : '' }}
                                                name="music_listen" id="music_listen3" value="roughly">
                                            <label class="form-check-label" for="music_listen3">Roughly</label>
                                        </div>
                                        @error('music_listen')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example3c">Do you have any disease or any
                                            mental/physical disability?<span style="color: red;">*</span></label>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                name="physical_disability"
                                                {{ $data->physical_disability == 'yes' ? 'checked' : '' }}
                                                id="physical_disabilit1" value="yes">
                                            <label class="form-check-label" for="physical_disabilit1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                name="physical_disability"
                                                {{ $data->physical_disability == 'no' ? 'checked' : '' }}
                                                id="physical_disabilit2" value="no">
                                            <label class="form-check-label" for="physical_disabilit2">No</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                name="physical_disability"
                                                {{ $data->physical_disability == 'roughly' ? 'checked' : '' }}
                                                id="physical_disabilit3" value="roughly">
                                            <label class="form-check-label" for="physical_disabilit3">Roughly</label>
                                        </div>
                                        @error('physical_disability')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example3c">Do you Perform 5 times Salat every
                                            day?<span style="color: red;">*</span></label>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                name="salat" {{ $data->salat == 'yes' ? 'checked' : '' }}
                                                id="salat1" value="yes">
                                            <label class="form-check-label" for="salat1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                name="salat" {{ $data->salat == 'no' ? 'checked' : '' }} id="salat2"
                                                value="no">
                                            <label class="form-check-label" for="salat2">No</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                name="salat" {{ $data->salat == 'roughly' ? 'checked' : '' }}
                                                id="salat3" value="roughly">
                                            <label class="form-check-label" for="salat3">Roughly</label>
                                        </div>
                                        @error('fatherName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="BioDataTab5" role="tabpanel"
                                aria-labelledby="BioDataTab5Id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Age<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="number" name="want_age"
                                                    value="{{ $data->want_age }}" class="form-control" />
                                                @error('want_age')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Height<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="number" name="want_height"
                                                    value="{{ $data->want_height }}" class="form-control" />
                                                @error('want_height')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Weight<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="number" name="want_weight"
                                                    value="{{ $data->want_weight }}"class="form-control" />
                                                @error('want_weight')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Complexion<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="text" name="want_complexion"
                                                    value="{{ $data->want_complexion }}" class="form-control" />
                                                @error('want_complexion')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="paternalUncleMarritalStatus">Maritual
                                                    Status<span style="color: red;">*</span></label>
                                                <select readonly disabled name="want_maritualStatus"
                                                    class="form-control" id="maritualStatus">
                                                    <option {{ $data->want_maritualStatus == 'Single' ? 'selected' : '' }}
                                                        value="Single">Single</option>
                                                    <option {{ $data->want_maritualStatus == 'Widowed' ? 'selected' : '' }}
                                                        value="Widowed">Widowed </option>
                                                    <option
                                                        {{ $data->want_maritualStatus == 'Separated' ? 'selected' : '' }}
                                                        value="Separated">Separated </option>
                                                    <option
                                                        {{ $data->want_maritualStatus == 'Divorced' ? 'selected' : '' }}
                                                        value="Divorced">Divorced </option>
                                                    <option {{ $data->want_maritualStatus == 'Married' ? 'selected' : '' }}
                                                        value="Married">Married </option>
                                                </select>
                                                @error('want_maritualStatus')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c">Education<span
                                                style="color: red;">*</span></label>
                                        <input readonly disabled type="text" name="want_education"
                                            value="{{ $data->want_education }}" class="form-control" />
                                        @error('want_education')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">District<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="text" name="want_district"
                                                    value="{{ $data->want_district }}" class="form-control" />
                                                @error('want_district')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Current location<span
                                                        style="color: red;">*</span></label>
                                                <input readonly disabled type="text" name="want_location"
                                                    value="{{ $data->want_location }}" class="form-control" />
                                                @error('want_location')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c">Special qualities: (short)<span
                                                style="color: red;">*</span></label>
                                        <input readonly disabled type="text" name="want_special_qualities"
                                            value="{{ $data->want_special_qualities }}" class="form-control" />
                                        @error('want_special_qualities')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="BioDataTab6" role="tabpanel"
                                aria-labelledby="BioDataTab6Id">
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example3c">Have you informed your parents
                                            about your marriage Plan?<span style="color: red;">*</span></label>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input"
                                                {{ $data->marage_plan == 'yes' ? 'checked' : '' }} type="radio"
                                                name="marage_plan" id="marage_plan1" value="yes">
                                            <label class="form-check-label" for="marage_plan1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input"
                                                {{ $data->marage_plan == 'no' ? 'checked' : '' }} type="radio"
                                                name="marage_plan" id="marage_plan2" value="no">
                                            <label class="form-check-label" for="marage_plan2">No</label>
                                        </div>
                                        @error('marage_plan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example3c">Do your parents well aware of
                                            Posting the Bio-data in the Muslim Bie?<span
                                                style="color: red;">*</span></label>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                {{ $data->allow_post_blog == 'yes' ? 'checked' : '' }}
                                                name="allow_post_blog" id="inlineRadio1" value="yes">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input readonly disabled class="form-check-input" type="radio"
                                                {{ $data->allow_post_blog == 'no' ? 'checked' : '' }}
                                                name="allow_post_blog" id="inlineRadio2" value="no">
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                        @error('allow_post_blog')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <label class="form-label" for="form3Example1c"><b>Mobile Number</b><span
                                        style="color: red;">*</span></label>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="form3Example1c">Mobile
                                                            Number-1<span style="color: red;">*</span></label>
                                                        <input readonly disabled type="number" name="phone_no_1"
                                                            value="{{ $data->phone_no_1 }}" class="form-control" />
                                                        @error('phone_no_1')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="form3Example1c">Name <span
                                                                style="color: red;">*</span></label>
                                                        <input readonly disabled type="text" name="name_1"
                                                            value="{{ $data->name_1 }}" class="form-control" />
                                                        @error('name_1')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="form3Example1c">Relation <span
                                                                style="color: red;">*</span></label>
                                                        <input readonly disabled type="text" name="relation_1"
                                                            value="{{ $data->relation_1 }}" class="form-control" />
                                                        @error('relation_1')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="form3Example1c">Mobile
                                                            Number-2<span style="color: red;">*</span></label>
                                                        <input readonly disabled type="number" name="phone_no_2"
                                                            value="{{ $data->phone_no_2 }}" class="form-control" />
                                                        @error('phone_no_2')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="form3Example1c">Name <span
                                                                style="color: red;">*</span></label>
                                                        <input readonly disabled type="text" name="name_2"
                                                            value="{{ $data->name_2 }}" class="form-control" />
                                                        @error('name_2')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="form3Example1c">Relation <span
                                                                style="color: red;">*</span></label>
                                                        <input readonly disabled type="text" name="relation_2"
                                                            value="{{ $data->relation_2 }}" class="form-control" />
                                                        @error('relation_2')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label class="form-label" for="form3Example1c">Email</label>
                                                        <input readonly disabled type="email" name="email"
                                                            value="{{ $data->email }}" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->can('biodata-code-image'))
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <div class="form-outline flex-fill mb-0">
                                                            <label class="form-label" for="form3Example1c">Code</label>
                                                            <input readonly disabled type="text" name="code"
                                                                placeholder="Code" value="{{ $data->code }}"
                                                                required class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <div class="form-outline flex-fill mb-0">
                                                            <label class="form-label" for="form3Example1c">Image</label>
                                                            @if ($data->image != null)
                                                                <img src="{{ asset($data->image) }}" width="200"
                                                                    height="100" class="img mt-2">
                                                            @else
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'nikosh', sans-serif;
        }

        .title div {
            text-align: center;
            width: 150px;
            background: #EB3D63;
            border-radius: 12px;
            color: white;
            font-size: 14px;
            padding: 4px 0;
            margin: 0 auto;
        }

        .container {
            border: 0;
            margin: 10px 30px;
            width: 100%;
        }

        .container td {
            width: 50%;
            vertical-align: top;
        }

        .itemContainer div b {
            margin: 10px 0;
            color: #333333;
        }
    </style>
</head>

<body>
    <div class="title">
        <br><br>
        <div>ব্যক্তিগত তথ্য</div>
    </div>
    <table class="container">
        <tr>
            <td>
                <div class="itemContainer">
                    <div><b>নাম : </b>{{ $biodata['name'] ?? '' }}</div>
                    <div><b>পিতার নাম : </b>{{ $biodata['fatherName'] ?? '' }}</div>
                    <div><b>পিতার পেশা : </b>{{ $profession[strtolower($biodata['fatherOccupation'])] ?? '' }}</div>
                    <div><b>মাতার নাম : </b>{{ $biodata['motherName'] ?? '' }}</div>
                    <div><b>মাতার পেশা : </b>{{ $profession[strtolower($biodata['motherOccupation'])] ?? '' }}</div>
                    <div><b>রক্তের গ্রুপ : </b>{{ $biodata['blood_groop'] ?? '' }}</div>
                    <div><b>শিক্ষাগত যোগ্যতা : </b>{{ $biodata['educationalQualification'] ?? '' }}</div>
                    <div><b>পেশা : </b>@lang('site.'.strtolower($biodata['occupationWant']))</div>
                    <div><b>গাত্রবর্ণ : </b>@lang('site.'.strtolower($biodata['complexion']))</div>
                    <div><b>রাজনৈতিক দর্শন : </b>{{ $biodata['politicalView'] ?? '' }}</div>
                </div>
            </td>
            <td>
                <div class="itemContainer">
                    <div><b>স্থায়ী ঠিকানা :
                        </b>{{ $biodata['permanentVillage'] ?? '' }},{{ $biodata['permanentPostoffice'] ?? '' }},{{ $biodata['permanentThana'] ?? '' }},@lang('site.' . strtolower($biodata['permanentDistrict'] ?? ''))
                    </div>
                    <div><b>বর্তমান ঠিকানা :
                        </b>{{ $biodata['presentVillage'] ?? '' }},{{ $biodata['presentPostoffice'] ?? '' }},{{ $biodata['presentThana'] ?? '' }},@lang('site.' . strtolower($biodata['presentDistrict'] ?? ''))
                    </div>
                    <div><b>জন্মতারিখ : </b>{{ $biodata['dateOfBirth'] ?? '' }}</div>
                    <div><b>উচ্চতা : </b>{{ $biodata['heightFt'] ?? '' }} ফুট, {{ $biodata['heightInch'] ?? '' }}
                        ইঞ্চি
                    </div>
                    <div><b>মাজহাব : </b>@lang('site.' . strtolower($biodata['majhab']))</div>
                    <div><b>বৈবাহিক অবস্থা : </b>
                        @lang($biodata['bride_groom'] === 'Bride' ? 'site.' . strtolower($biodata['maritualStatusWant']) : 'site.' . strtolower($biodata['maritualStatusWant']))
                    </div>
                    <div><b>নিজের সম্পর্কে কিছু : </b>{{ $biodata['aboutYourself'] ?? '' }}</div>
                </div>
            </td>
        </tr>
    </table>


    <br><br>
    <div class="title">
        <div>পারিবারিক তথ্য</div>
    </div>
    <table class="container">
        <tr>
            <td>
                <div class="itemContainer">
                    <div><b>ভাই-বোন : </b> ভাই
                        {{$biodata['brotherNumber'] != 0 ? $biodata['brotherNumber'] : 'নেই'}}, বোন
                        {{$biodata['sisterNumber'] != 0 ? $biodata['sisterNumber'] : 'নেই'}}</div><br>
                    @php
                        $list = ['ক', 'খ', 'গ', 'ঘ', 'ঙ', 'চ', 'ছ', 'জ', 'ঝ', 'ঞ', 'ট', 'ঠ', 'ড', 'ঢ', 'ণ', 'ত', 'থ', 'দ', 'ধ', 'ন', 'প', 'ফ', 'ব', 'ভ', 'ম', 'য', 'র', 'ল', 'শ', 'ষ', 'স', 'হ', 'ড়', 'ঢ়', 'য়', 'ৎ', 'ং', 'ঃ', 'ঁ'];
                        
                        $brotherOccupation = json_decode($biodata['brotherOccupation']) ?? [];
                        $brotherMarritalStatus = json_decode($biodata['brotherMarritalStatus']) ?? [];
                        
                        $sisterOccupation = json_decode($biodata['sisterOccupation']) ?? [];
                        $sisterMarritalStatus = json_decode($biodata['sisterMarritalStatus']) ?? [];
                    @endphp
                    @if ($biodata['brotherNumber'] != 0)
                        @foreach ($brotherOccupation as $key => $brother)
                            <div><b>{{ $list[$key] }}.</b> {{ $brother }},
                                @lang('site.'.strtolower(array_key_exists($key, $brotherMarritalStatus) ? $brotherMarritalStatus[$key] : ''))
                            </div>
                        @endforeach
                    @endif
                    <br>
                    @if ($biodata['sisterNumber'] != 0)
                        @foreach ($sisterOccupation as $key => $sister)
                            <div><b>{{ $list[$key] }}.</b> {{ $sister }},
                                @lang('site.f_'.strtolower(array_key_exists($key, $sisterMarritalStatus) ? $sisterMarritalStatus[$key] : ''))
                            </div>
                        @endforeach
                    @endif
                </div>
            </td>
            <td>
                <div class="itemContainer">
                    <div><b>পারিবারিক অবস্থা : </b>@lang('site.' . strtolower($biodata['financialStatus']))
                    </div>
                </div>
                <div class="itemContainer">
                    <div><b>সামাজিক অবস্থা : </b>@lang('site.' . strtolower($biodata['socialStatus']))</div>
                </div>
                @php
                    $paternalUncleOccupation = json_decode($biodata['paternalUncleOccupation']) ?? [];
                    $paternalUncleMarritalStatus = json_decode($biodata['paternalUncleMarritalStatus']) ?? [];
                    
                    $maternalUncleOccupation = json_decode($biodata['maternalUncleOccupation']) ?? [];
                    $maternalUncleMarritalStatus = json_decode($biodata['maternalUncleMarritalStatus']) ?? [];
                @endphp
                <br>
                @if ($biodata['paternalUncleNumber'] != 0)
                    <div>
                        <b>চাচার পেশা ও বৈবাহিক অবস্থাঃ</b>
                    </div>
                    @foreach ($paternalUncleOccupation as $key => $paternalUncle)
                        <div><b>{{ $list[$key] }}.</b> {{ $paternalUncle }},
                            @lang('site.' . strtolower(array_key_exists($key, $paternalUncleMarritalStatus) ? $paternalUncleMarritalStatus[$key] : ''))
                        </div>
                    @endforeach
                @endif
                <br>
                @if ($biodata['maternalUncleNumber'] != 0)
                    <div>
                        <b>মামার পেশা ও বৈবাহিক অবস্থাঃ</b>
                    </div>
                    @foreach ($maternalUncleOccupation as $key => $maternalUncle)
                        <div><b>{{ $list[$key] }}.</b> {{ $maternalUncle }},
                            @lang('site.' . strtolower(array_key_exists($key, $maternalUncleMarritalStatus) ? $maternalUncleMarritalStatus[$key] : ''))
                        </div>
                    @endforeach
                @endif
            </td>
        </tr>
    </table>

    <br><br>
    <div class="title">
        <div>{{ $biodata['bride_groom'] === 'Bride' ? 'পাত্রী' : 'পাত্র' }} সম্পর্কে প্রাথমিক ধারনা</div>
    </div>
    <table class="container">
        <tr>
            <td>
                <div class="itemContainer">
                    <div><b>বিয়ে সম্পর্কে ধারনাঃ </b>{{ $biodata['concept_about'] }}</div>
                    <div><b>টিভি দেখেন বা গান শুনেন কি?: </b>{{ $biodata['tv_watch'] ?? '' }}</div>
                    <div><b>শুদ্ধভাবে কুরআন তিলাওয়াত করতে পারেন?: </b>{{ $biodata['music_listen'] ?? '' }}</div>
                    <div><b>বিশেষ কোনো দ্বীনি মেহনতের সঙ্গে সম্পৃক্ত?: </b>{{ $biodata['dini_mehonot'] ?? '' }}</div>
                </div>
            </td>
            <td>
                @if ($biodata['bride_groom'] === 'Groom')
                    <div><b>আপনার স্ত্রীকে চাকরি করতে দিবেন কি?: </b>{{ $biodata['job_permission'] ?? '' }}</div>
                @else
                    <div><b>পর্দা করেন কি?: </b>{{ $biodata['vail'] ?? '' }}</div>
                @endif
                <div><b>মানসিক বা শারিরিক কোনো সমস্যা আছে কি?: </b>{{ $biodata['physical_disability'] ?? '' }}</div>
                <div><b>পাঁচ ওয়াক্ত নামাজ পড়া হয় কি?: </b>{{ $biodata['salat'] ?? '' }}</div>
            </td>
        </tr>
    </table>
    <br><br>
    <div class="title">
        <div>যেমন {{ $biodata['bride_groom'] === 'Bride' ? 'পাত্র' : 'পাত্রী' }} চাই</div>
    </div>
    <table class="container">
        <tr>
            <td>
                <div class="itemContainer">
                    <div><b>বয়সঃ </b>{{ $biodata['want_age'] }}</div>
                    <div><b>উচ্চতাঃ </b>{{ $biodata['want_height'] ?? '' }}</div>
                    <div><b>ওজনঃ </b>{{ $biodata['want_weight'] ?? '' }}</div>
                    <div><b>শিক্ষাগত যোগ্যতাঃ </b>{{ $biodata['want_education'] ?? '' }}</div>
                    <div><b>পেশাঃ </b>{{ $biodata['want_occupation'] ?? '' }}</div>
                </div>
            </td>
            <td>
                @php
                    $want_maritualStatus = json_decode($biodata['want_maritualStatus']);
                @endphp
                <div><b>বৈবাহিক অবস্থা: </b>
                    @foreach ($want_maritualStatus as $key => $maritualStatus)
                        @lang($biodata['bride_groom'] === 'Bride' ? 'site.' . strtolower($maritualStatus) : 'site.f_' . strtolower($maritualStatus)),
                    @endforeach
                </div>

                @php
                    $want_complexion = json_decode($biodata['want_complexion']);
                @endphp
                <div><b>গাত্রবর্ণঃ </b>
                    @foreach ($want_complexion as $key => $complexionItem)
                        @lang('site.'.strtolower($complexionItem)),
                    @endforeach
                </div>

                @php
                    $want_district = json_decode($biodata['want_district']);
                @endphp
                <div><b>জেলাঃ </b>
                    @foreach ($want_district as $key => $district)
                        @lang('site.' . strtolower($district)),
                    @endforeach
                </div>

            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="itemContainer">
                    <div><b>বিশেষ গুনাগুনঃ </b>{{ $biodata['want_special_qualities'] ?? '' }}</div>
                </div>
            </td>
        </tr>
    </table>

    <br><br>
    <div class="title">
        <div>যোগাযোগ</div>
    </div>
    <table class="container">
        <tr>
            <td>
                <div class="itemContainer">
                    <div><b>মোবাইল নম্বরঃ </b>{{ $biodata['phone_no_1'] }}</div>
                    <div><b>মোবাইল নম্বরঃ </b>{{ $biodata['phone_no_2'] ?? '' }}</div>
                </div>
            </td>
            <td>
                <div><b>ইমেইল </b>{{ $biodata['email'] ?? '' }}</div>
            </td>
        </tr>
    </table>
</body>

</html>

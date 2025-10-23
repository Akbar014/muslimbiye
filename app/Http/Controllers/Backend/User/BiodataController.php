<?php

namespace App\Http\Controllers\Backend\User;

use App\Models\Biodata;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BiodataFamilyInfo;
use App\Models\BiodataAddressInfo;
use App\Models\BiodataContactInfo;
use App\Models\BiodataGeneralInfo;
use App\Models\BiodataMarrageInfo;
use Illuminate\Support\Facades\DB;
use App\Models\BiodataExpectedInfo;
use App\Models\BiodataPersonalInfo;
use App\Http\Controllers\Controller;
use App\Models\BiodataEducationInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\BiodataCommitmentInfo;
use App\Models\BiodataProfessionalInfo;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    // show the page
    public function index()
    {
        $biodata = Biodata::where(['user_id' => Auth::guard('user')->user()->id, 'deleted' => "0", 'admin_created' => '0'])->first();

        if (!$biodata) {
            return view('frontend_new.user.edit_biodata.terms');
        }
        $general = $biodata->general();
        $address = $biodata->address();
        $education = $biodata->education();
        $family = $biodata->family();
        $personal = $biodata->personal();
        $professional = $biodata->professional();
        $marrage = $biodata->marrage();
        $expected = $biodata->expected();
        $commitment = $biodata->commitment();
        $contact = $biodata->contact();

        // dd($general, $address,  $education, $family,  $personal, $professional,  $marrage,  $expected, $commitment, $contact);

        return view('frontend_new.user.edit_biodata.index', compact('biodata', 'general', 'address', 'education', 'family', 'personal', 'professional', 'marrage', 'expected', 'commitment', 'contact'));
    }

    // status update if everything is okay.
    public function updateStatus($biodata)
    {
        if (
            $biodata
        ) {
            $general = $biodata->general();
            $address = $biodata->address();
            $education = $biodata->education();
            $family = $biodata->family();
            $personal = $biodata->personal();
            $professional = $biodata->professional();
            $marrage = $biodata->marrage();
            $expected = $biodata->expected();
            $commitment = $biodata->commitment();
            $contact = $biodata->contact();

            if (
                $general &&
                $address &&
                $education &&
                $family &&
                $personal &&
                $professional &&
                $marrage &&
                $expected &&
                $commitment &&
                $contact
            ) {
                if ($biodata->code == null) {
                    do {
                        $uniqueKey = rand(100000, 999999);  // Or use mt_rand(10000000, 99999999) for numeric keys
                    } while (DB::table('biodatas')->where('code', $uniqueKey)->exists());
                    $biodata->code = $uniqueKey;
                }

                $biodata->status = 1;
                $biodata->save();

                return true;
            }
        }
        return false;
    }

    // terms page
    public function biodata(Request $request)
    {
        $request->validate([
            "biodata_type" => "required|string",
            "term_1" => "required|string",
            "term_2" => "required|string",
            "term_3" => "required|string"
        ]);

        $page_id = 0;
        $user_id = Auth::guard('user')->user()->id;

        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataGeneralInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "biodata_type" => $request->biodata_type,
            ]
        );

        $biodata->general_id = $data->id;
        $biodata->completed = json_encode(["general"]);
        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }


    public function general(Request $request)
    {
        // --- Build birthdate from day/month/year (old logic preserved) ---
        $day   = $request->input('day');
        $month = $request->input('month');
        $year  = $request->input('year');

        if ($day && $month && $year && checkdate($month, $day, $year)) {
            $birthdate = Carbon::createFromDate($year, $month, $day)->format('Y-m-d');
        } else {
            $birthdate = null;
        }

        // Keep your old merge line
        $request->merge(['birthdate' => $birthdate]);

        // ---- Single-pass validation (no duplicates) ----
        $rules = [
            'bride_groom'     => ['required','in:bride,groom'],
            'marital_status'  => ['required'],
            'day'             => ['nullable','integer','between:1,31'],
            'month'           => ['nullable','integer','between:1,12'],
            'year'            => ['nullable','integer','between:1950,' . now()->year],
            'height'          => ['nullable','string','max:32'],
            'complexion'      => ['nullable','string','max:32'],
            'weight'          => ['nullable','string','max:16'],
            'blood_group'     => ['nullable','in:A+,A-,B+,B-,O+,O-,AB+,AB-,N/A'],
            'page_id'         => ['nullable','integer','min:0'],
        ];

        $messages = [
            'bride_groom.required'    => 'পাত্র/পাত্রী নির্বাচন করুন।',
            'marital_status.required' => 'বৈবাহিক অবস্থা নির্বাচন করুন।',
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        // Laravel 8: no Request::integer(), cast manually
        $validator->after(function ($v) use ($request) {
            $d = (int) $request->input('day');
            $m = (int) $request->input('month');
            $y = (int) $request->input('year');

            if ($d && $m && $y) {
                if (!checkdate($m, $d, $y)) {
                    $v->errors()->add('birthdate', 'জন্মতারিখ সঠিক নয়।');
                    return;
                }

                $birth = Carbon::createFromDate($y, $m, $d);
                $age   = $birth->age;

                if ($age < 18 || $age > 70) {
                    $v->errors()->add('birthdate', 'বিয়ে উপযোগী বয়স 18–70 বছর।');
                }
            }
            // Partial DOB allowed (don’t block the step)
        });

        $validator->validate();

        // Build birthdate only if fully provided & valid; keep null otherwise
        $birthdate = null;
        if ($request->filled(['day','month','year'])) {
            $d = (int) $request->input('day');
            $m = (int) $request->input('month');
            $y = (int) $request->input('year');
            if (checkdate($m, $d, $y)) {
                $birthdate = Carbon::createFromDate($y, $m, $d)->format('Y-m-d');
            }
        }

        $page_id = (int) $request->input('page_id', 0);
        $user_id = Auth::guard('user')->id();

        // ---- Atomic save (no half-writes) ----
        DB::transaction(function () use ($user_id, $birthdate, $request) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $data = BiodataGeneralInfo::updateOrCreate(
                ['user_id' => $user_id, 'biodata_id' => $biodata->id],
                [
                    'user_id'        => $user_id,
                    'biodata_id'     => $biodata->id,
                    'bride_groom'    => $request->input('bride_groom'),
                    'marital_status' => $request->input('marital_status'),
                    'birthdate'      => $birthdate, // nullable
                    'height'         => $request->input('height'),
                    'complexion'     => $request->input('complexion'),
                    'weight'         => $request->input('weight'),
                    'blood_group'    => $request->input('blood_group'),
                ]
            );

            // Link section id
            $biodata->general_id = $data->id;

            // Maintain wizard progress
            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('address', $completed, true)) {
                $completed[] = 'address';
            }
            // Store as JSON string to avoid casting issues
            $biodata->completed = json_encode($completed);

            $biodata->save();
        });

        // Continue to next step (never breaks the flow)
        return back()->with([
            'page_id' => $page_id + 1,
            'success' => 'তথ্য সংরক্ষিত হয়েছে। পরবর্তী ধাপে যান।',
        ]);
    }

    public function address(Request $request)
    {
        // --- Normalize (trim spaces) ---
        $request->merge([
            'parmanent_zella'    => trim((string) $request->input('parmanent_zella')),
            'parmanent_address'  => trim((string) $request->input('parmanent_address')),
            'present_zella'      => trim((string) $request->input('present_zella')),
            'present_address'    => trim((string) $request->input('present_address')),
            'where_raised'       => trim((string) $request->input('where_raised')),
        ]);

        // --- Single-pass validation ---
        $request->validate([
            'parmanent_zella'      => ['required','string','max:255'],
            'parmanent_address'    => ['required','string','max:255'],
            'where_raised'         => ['required','string','max:255'],

            'present_address_same' => ['nullable'],

            'present_zella'        => ['required_unless:present_address_same,on','string','max:255'],
            'present_address'      => ['required_unless:present_address_same,on','string','max:255'],
        ], [
            'parmanent_zella.required'     => 'স্থায়ী জেলার নাম দিন।',
            'parmanent_zella.max'          => 'স্থায়ী জেলা ২৫৫ অক্ষরের বেশি হতে পারবে না।',
            'parmanent_address.required'   => 'স্থায়ী ঠিকানা দিন।',
            'parmanent_address.max'        => 'স্থায়ী ঠিকানা ২৫৫ অক্ষরের বেশি হতে পারবে না।',
            'where_raised.required'        => 'যেখানে বড় হয়েছেন তা দিন।',
            'where_raised.max'             => 'এই ঘরটি ২৫৫ অক্ষরের বেশি হতে পারবে না।',
            'present_zella.required_unless'=> 'বর্তমান জেলা দিন (যদি “একই” না সিলেক্ট করেন)।',
            'present_zella.max'            => 'বর্তমান জেলা ২৫৫ অক্ষরের বেশি হতে পারবে না।',
            'present_address.required_unless'=> 'বর্তমান ঠিকানা দিন (যদি “একই” না সিলেক্ট করেন)।',
            'present_address.max'          => 'বর্তমান ঠিকানা ২৫৫ অক্ষরের বেশি হতে পারবে না।',
        ]);

        $same   = $request->input('present_address_same') === 'on';
        $pageId = (int) ($request->input('page_id', 0));
        $userId = Auth::guard('user')->id();

        DB::transaction(function () use ($request, $same, $userId) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $userId, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $userId]
            );

            $data = BiodataAddressInfo::updateOrCreate(
                ['user_id' => $userId, 'biodata_id' => $biodata->id],
                [
                    'user_id'               => $userId,
                    'biodata_id'            => $biodata->id,
                    'parmanent_zella'       => $request->input('parmanent_zella'),
                    'parmanent_address'     => $request->input('parmanent_address'),
                    'present_address_same'  => $same ? 'on' : null,
                    'present_zella'         => $same ? $request->input('parmanent_zella')   : $request->input('present_zella'),
                    'present_address'       => $same ? $request->input('parmanent_address') : $request->input('present_address'),
                    'where_raised'          => $request->input('where_raised'),
                ]
            );

            $biodata->address_id = $data->id;

            // Wizard progress
            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('education', $completed, true)) {
                $completed[] = 'education';
            }
            $biodata->completed = json_encode($completed);
            $biodata->save();
        });

        return back()->with([
            'page_id' => $pageId + 1,
            'success' => 'ঠিকানা সংরক্ষিত হয়েছে। পরবর্তী ধাপে যান।',
        ]);
    }

    public function education(Request $request)
    {
        $page_id = (int) ($request->input('page_id', 0));
        $user_id = Auth::guard('user')->id();

        // সব VARCHAR(255) ফিল্ড
        $varchar255 = [
            'education_medium',
            'general_highest_education',
            'general_highest_school_study',
            'ssc_year',
            'ssc_dept',
            'ssc_result',
            'hsc_study_running',
            'study_after_ssc',
            'hsc_pass_year',
            'hsc_dept',
            'hsc_result',
            'diploma_subject',
            'diploma_institution',
            'diploma_current_year',
            'diploma_passing_year',
            'honors_subject',
            'honors_institution',
            'honors_instutution',
            'honors_passing_year',
            'honors_study_year',
            'masters_subject',
            'masters_institution',
            'masters_passing_year',
            'doctorate_subject',
            'doctorate_institution',
            'doctorate_passing_year',
            'qawmi_education_qualification',
            'ibtedai_madrasa',
            'mutawassitah_madrasa',
            'sanabia_ulya_madrasa',
            'fazilat_madrasa',
            'takmil_madrasa',
            'takhassus_madrasa',
            'qawmi_result',
            'qawmi_passing_year',
            'takhassus_subject',
            'takhassus_result',
            'takhassus_passing_year',
            'others_educational_qualifications',
            'deen_designations',
        ];

        // --- বাংলা লেবেল (error message friendly) ---
        $bnLabels = [
            'education_medium' => 'শিক্ষার মাধ্যম',
            'general_highest_education' => 'সর্বোচ্চ শিক্ষা',
            'general_highest_school_study' => 'স্কুল পর্যন্ত পড়াশোনা',
            'ssc_year' => 'এসএসসি সন',
            'ssc_dept' => 'এসএসসি বিভাগ',
            'ssc_result' => 'এসএসসি ফলাফল',
            'hsc_study_running' => 'এইচএসসি অধ্যয়ন',
            'study_after_ssc' => 'এসএসসি পরবর্তী পড়াশোনা',
            'hsc_pass_year' => 'এইচএসসি পাশের সন',
            'hsc_dept' => 'এইচএসসি বিভাগ',
            'hsc_result' => 'এইচএসসি ফলাফল',
            'diploma_subject' => 'ডিপ্লোমা বিষয়',
            'diploma_institution' => 'ডিপ্লোমা প্রতিষ্ঠান',
            'diploma_current_year' => 'চলতি বর্ষ',
            'diploma_passing_year' => 'পাশের সন',
            'honors_subject' => 'অনার্স বিষয়',
            'honors_institution' => 'অনার্স প্রতিষ্ঠান',
            'honors_instutution' => 'অনার্স প্রতিষ্ঠান',
            'honors_passing_year' => 'অনার্স পাশের সন',
            'honors_study_year' => 'অনার্স অধ্যয়ন বর্ষ',
            'masters_subject' => 'মাস্টার্স বিষয়',
            'masters_institution' => 'মাস্টার্স প্রতিষ্ঠান',
            'masters_passing_year' => 'মাস্টার্স পাশের সন',
            'doctorate_subject' => 'ডক্টরেট বিষয়',
            'doctorate_institution' => 'ডক্টরেট প্রতিষ্ঠান',
            'doctorate_passing_year' => 'ডক্টরেট পাশের সন',
            'qawmi_education_qualification' => 'কওমি শিক্ষা যোগ্যতা',
            'ibtedai_madrasa' => 'ইবতেদায়ী মাদরাসা',
            'mutawassitah_madrasa' => 'মুতাওয়াসসিতা মাদরাসা',
            'sanabia_ulya_madrasa' => 'সানাবিয়া উলিয়া মাদরাসা',
            'fazilat_madrasa' => 'ফাজিলাত মাদরাসা',
            'takmil_madrasa' => 'তাকমিল মাদরাসা',
            'takhassus_madrasa' => 'তাখাসসুস মাদরাসা',
            'qawmi_result' => 'কওমি ফলাফল',
            'qawmi_passing_year' => 'কওমি পাশের সন',
            'takhassus_subject' => 'তাখাসসুস বিষয়',
            'takhassus_result' => 'তাখাসসুস ফলাফল',
            'takhassus_passing_year' => 'তাখাসসুস পাশের সন',
            'others_educational_qualifications' => 'অন্যান্য শিক্ষাগত যোগ্যতা',
            'deen_designations' => 'দ্বীনি পদবী',
        ];

        // --- Validation rules ---
        $rules = [];
        foreach ($varchar255 as $f) {
            // year ফিল্ডে numeric year validation
            if (Str::endsWith($f, ['_year', '_passing_year', '_pass_year'])) {
                $rules[$f] = ['nullable', 'digits:4', 'regex:/^(19|20)\d{2}$/'];
            } else {
                $rules[$f] = ['nullable', 'string', 'max:255'];
            }
        }

        // --- Bangla messages ---
        $messages = [];
        foreach ($varchar255 as $f) {
            $label = $bnLabels[$f] ?? $f;

            if (Str::endsWith($f, ['_year', '_passing_year', '_pass_year'])) {
                $messages["$f.digits"] = "‘{$label}’ ৪ সংখ্যার হতে হবে (যেমন 2022)।";
                $messages["$f.regex"]  = "‘{$label}’ সঠিক বছর নয়।";
            }

            $messages["$f.string"]   = "‘{$label}’ অবশ্যই টেক্সট হতে হবে।";
            $messages["$f.max"]      = "‘{$label}’ ২৫৫ অক্ষরের বেশি হতে পারবে না।";
            $messages["$f.required"] = "‘{$label}’ ঘরটি পূরণ করুন।";
        }
        $request->validate($rules, $messages);

        // --- Sanitize: trim & hard-limit 255 ---
        $clean = [];
        foreach ($varchar255 as $f) {
            $val = $request->input($f);
            if (is_array($val)) $val = implode(',', $val);
            if ($val !== null) {
                $val = trim((string) $val);
                if (mb_strlen($val) > 255) $val = mb_substr($val, 0, 255);
            }
            $clean[$f] = $val ?: null;
        }

        // honors_instutution → honors_institution mapping
        if (!array_key_exists('honors_institution', $clean) || $clean['honors_institution'] === null) {
            if (!empty($clean['honors_instutution'])) {
                $clean['honors_institution'] = $clean['honors_instutution'];
            }
        }
        unset($clean['honors_instutution']);

        DB::transaction(function () use ($user_id, $clean) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $payload = array_merge([
                'user_id'    => $user_id,
                'biodata_id' => $biodata->id,
            ], $clean);

            $data = BiodataEducationInfo::updateOrCreate(
                ['user_id' => $user_id, 'biodata_id' => $biodata->id],
                $payload
            );

            $biodata->education_id = $data->id;

            // Completed step update
            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('family', $completed, true)) {
                $completed[] = 'family';
            }
            $biodata->completed = json_encode($completed);
            $biodata->save();
        });

        return back()->with([
            'page_id' => $page_id + 1,
            'success' => 'শিক্ষাগত তথ্য সফলভাবে সংরক্ষিত হয়েছে। পরবর্তী ধাপে যান।',
        ]);
    }


    public function family(Request $request)
    {
        $page_id = (int) ($request->input('page_id', 0));
        $user_id = Auth::guard('user')->id();

        // --- Trim basics ---
        $trimFields = [
            'fathers_name','father_status','father_profession',
            'mothers_name','mother_status','mother_profession',
            'family_status','financial_status','family_environment',
        ];
        foreach ($trimFields as $f) {
            $request->merge([$f => trim((string)$request->input($f))]);
        }

        // --- Single-pass validation (no after()) ---
        $rules = [
            // required strings
            'fathers_name'       => ['required','string','max:255'],
            'father_status'      => ['required','string','max:255'],
            'father_profession'  => ['required','string','max:255'],

            'mothers_name'       => ['required','string','max:255'],
            'mother_status'      => ['required','string','max:255'],
            'mother_profession'  => ['required','string','max:255'],

            'family_status'      => ['required','string','max:255'],
            'financial_status'   => ['required','string','max:255'],
            'family_environment' => ['nullable','string','max:255'],

            // only these two totals are enforced
            'total_brother'      => ['required','integer','min:0','max:20'],
            'total_sister'       => ['required','integer','min:0','max:20'],

            // arrays (optional)
            'brother_names'             => ['nullable','array'],
            'brother_educations'        => ['nullable','array'],
            'brother_jobs'              => ['nullable','array'],
            'brother_merital_status'    => ['nullable','array'],
            'brother_spause_profession' => ['nullable','array'],
            'brother_spouse_education'  => ['nullable','array'],

            'sister_names'              => ['nullable','array'],
            'sister_educations'         => ['nullable','array'],
            'sister_jobs'               => ['nullable','array'],
            'sister_merital_status'     => ['nullable','array'],
            'sister_spause_profession'  => ['nullable','array'],
            'sister_spouse_education'   => ['nullable','array'],

            // paternal/maternal totals — NO validation per your request
            'total_paternal_uncle'      => ['nullable'],
            'total_maternal_uncle'      => ['nullable'],

            'paternal_uncle_names'          => ['nullable','array'],
            'paternal_uncle_educations'     => ['nullable','array'],
            'paternal_uncle_jobs'           => ['nullable','array'],
            'paternal_uncle_merital_status' => ['nullable','array'],

            'maternal_uncle_names'          => ['nullable','array'],
            'maternal_uncle_educations'     => ['nullable','array'],
            'maternal_uncle_jobs'           => ['nullable','array'],
            'maternal_uncle_merital_status' => ['nullable','array'],
        ];

        // Per-item string rules (max:255)
        $itemString255 = [
            'brother_names.*','brother_educations.*','brother_jobs.*','brother_merital_status.*',
            'brother_spause_profession.*','brother_spouse_education.*',
            'sister_names.*','sister_educations.*','sister_jobs.*','sister_merital_status.*',
            'sister_spause_profession.*','sister_spouse_education.*',
            'paternal_uncle_names.*','paternal_uncle_educations.*','paternal_uncle_jobs.*','paternal_uncle_merital_status.*',
            'maternal_uncle_names.*','maternal_uncle_educations.*','maternal_uncle_jobs.*','maternal_uncle_merital_status.*',
        ];
        foreach ($itemString255 as $f) {
            $rules[$f] = ['nullable','string','max:255'];
        }

        $messages = [
            'fathers_name.required'      => 'বাবার নাম দিন।',
            'father_status.required'     => 'বাবার অবস্থা দিন।',
            'father_profession.required' => 'বাবার পেশা দিন।',
            'mothers_name.required'      => 'মায়ের নাম দিন।',
            'mother_status.required'     => 'মায়ের অবস্থা দিন।',
            'mother_profession.required' => 'মায়ের পেশা দিন।',
            'family_status.required'     => 'পরিবারের অবস্থা দিন।',
            'financial_status.required'  => 'আর্থিক অবস্থা দিন।',
            'total_brother.required'     => 'ভাইয়ের সংখ্যা দিন।',
            'total_sister.required'      => 'বোনের সংখ্যা দিন।',
        ];

        $request->validate($rules, $messages);

        // --- Auto-correct totals from actual lists (smooth UX, no errors) ---
        $countFilled = function ($arr) {
            return is_array($arr) ? count(array_filter($arr, fn($x)=>trim((string)$x) !== '')) : 0;
        };

        $tb = $countFilled($request->input('brother_names'));
        $ts = $countFilled($request->input('sister_names'));
        $tp = $countFilled($request->input('paternal_uncle_names')) ?: null;  // keep null if empty
        $tm = $countFilled($request->input('maternal_uncle_names')) ?: null;

        $request->merge([
            'total_brother'        => $tb,
            'total_sister'         => $ts,
            'total_paternal_uncle' => $tp,
            'total_maternal_uncle' => $tm,
        ]);

        // --- Build structured arrays (trim + hard-cap 255) ---
        $cap = function ($val) {
            $val = trim((string)$val);
            return $val === '' ? null : mb_substr($val, 0, 255);
        };

        $zip = function($names, $edu, $jobs, $status, $spouseProf = null, $spouseEdu = null) use ($cap) {
            $out = [];
            $n = is_array($names) ? count($names) : 0;
            for ($i = 0; $i < $n; $i++) {
                $out[] = [
                    'name'             => isset($names[$i]) ? $cap($names[$i]) : null,
                    'education'        => is_array($edu) ? ($edu[$i] ?? null ? $cap($edu[$i]) : null) : null,
                    'job'              => is_array($jobs) ? ($jobs[$i] ?? null ? $cap($jobs[$i]) : null) : null,
                    'merital_status'   => is_array($status) ? ($status[$i] ?? null ? $cap($status[$i]) : null) : null,
                    'spause_profession'=> is_array($spouseProf) ? ($spouseProf[$i] ?? null ? $cap($spouseProf[$i]) : null) : null,
                    'spouse_education' => is_array($spouseEdu) ? ($spouseEdu[$i] ?? null ? $cap($spouseEdu[$i]) : null) : null,
                ];
            }
            return $out;
        };

        $brothers = $zip(
            $request->input('brother_names'),
            $request->input('brother_educations'),
            $request->input('brother_jobs'),
            $request->input('brother_merital_status'),
            $request->input('brother_spause_profession'),
            $request->input('brother_spouse_education')
        );

        $sisters = $zip(
            $request->input('sister_names'),
            $request->input('sister_educations'),
            $request->input('sister_jobs'),
            $request->input('sister_merital_status'),
            $request->input('sister_spause_profession'),
            $request->input('sister_spouse_education')
        );

        $zipSimple = function($names, $edu, $jobs, $status) use ($cap) {
            $out = [];
            $n = is_array($names) ? count($names) : 0;
            for ($i=0; $i<$n; $i++) {
                $out[] = [
                    'name'           => isset($names[$i]) ? $cap($names[$i]) : null,
                    'education'      => is_array($edu) ? ($edu[$i] ?? null ? $cap($edu[$i]) : null) : null,
                    'job'            => is_array($jobs) ? ($jobs[$i] ?? null ? $cap($jobs[$i]) : null) : null,
                    'merital_status' => is_array($status) ? ($status[$i] ?? null ? $cap($status[$i]) : null) : null,
                ];
            }
            return $out;
        };

        $paternal_uncles = $zipSimple(
            $request->input('paternal_uncle_names'),
            $request->input('paternal_uncle_educations'),
            $request->input('paternal_uncle_jobs'),
            $request->input('paternal_uncle_merital_status')
        );

        $maternal_uncles = $zipSimple(
            $request->input('maternal_uncle_names'),
            $request->input('maternal_uncle_educations'),
            $request->input('maternal_uncle_jobs'),
            $request->input('maternal_uncle_merital_status')
        );

        // --- Save atomically ---
        DB::transaction(function () use (
            $user_id, $request, $brothers, $sisters, $paternal_uncles, $maternal_uncles
        ) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $data = BiodataFamilyInfo::updateOrCreate(
                ['user_id' => $user_id, 'biodata_id' => $biodata->id],
                [
                    'user_id'    => $user_id,
                    'biodata_id' => $biodata->id,

                    'fathers_name'      => $request->input('fathers_name'),
                    'father_status'     => $request->input('father_status'),
                    'father_profession' => $request->input('father_profession'),

                    'mothers_name'      => $request->input('mothers_name'),
                    'mother_status'     => $request->input('mother_status'),
                    'mother_profession' => $request->input('mother_profession'),

                    'total_brother'        => (int) $request->input('total_brother'),
                    'total_sister'         => (int) $request->input('total_sister'),
                    'total_paternal_uncle' => $request->input('total_paternal_uncle'), // optional
                    'total_maternal_uncle' => $request->input('total_maternal_uncle'), // optional

                    'family_status'      => $request->input('family_status'),
                    'financial_status'   => $request->input('financial_status'),
                    'family_environment' => $request->input('family_environment'),

                    'brothers'         => json_encode($brothers),
                    'sisters'          => json_encode($sisters),
                    'paternal_uncles'  => json_encode($paternal_uncles),
                    'maternal_uncles'  => json_encode($maternal_uncles),
                ]
            );

            $biodata->family_id = $data->id;

            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('personal', $completed, true)) {
                $completed[] = 'personal';
            }
            $biodata->completed = $completed;
            $biodata->save();
        });

        return back()->with([
            'page_id' => $page_id + 1,
            'success' => 'পরিবারের তথ্য সংরক্ষিত হয়েছে। পরবর্তী ধাপে যান।',
        ]);
    }  

    public function personal(Request $request)
    {
        $page_id = (int) ($request->input('page_id', 0));
        $user_id = Auth::guard('user')->id();

        /* A) phone_number normalize (if present) */
        if ($request->filled('phone_number')) {
            $bn = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
            $en = ['0','1','2','3','4','5','6','7','8','9'];
            $phone = str_replace($bn, $en, (string)$request->input('phone_number'));
            $phone = preg_replace('/[^\d\+]/', '', $phone);
            if (strpos($phone, '+880') === 0) {
                // ok
            } elseif (strpos($phone, '880') === 0) {
                $phone = '+' . $phone;
            } elseif (strpos($phone, '01') === 0 && strlen($phone) === 11) {
                $phone = '+88' . $phone;
            } elseif (preg_match('/^1[3-9]\d{8}$/', $phone)) {
                $phone = '+880' . $phone;
            }
            $request->merge(['phone_number' => $phone]);
        }

        /* B) Validate (single pass) */
        $request->validate([
            'dressup'             => ['nullable','string','max:255'],
            'niqab_info'          => ['nullable','string','max:255'],
            'beard_info'          => ['nullable','string','max:255'],
            'above_ankle_info'    => ['nullable','string','max:255'],
            'namaz_info'          => ['nullable','string','max:255'],
            'namaz_waqt_info'     => ['nullable','string','max:255'],
            'mahram_info'         => ['nullable','string','max:255'],
            'quran_info'          => ['nullable','string','max:255'],
            'fiqh_info'           => ['nullable','string','max:255'],
            'enternainment_info'  => ['nullable','string','max:255'],
            'disablity_info'      => ['nullable','string','max:255'],
            'deen_mehnot_info'    => ['nullable','string','max:255'],
            'mazar_concept_info'  => ['nullable','string','max:255'],
            'islami_books'        => ['nullable','string','max:255'],
            'favourite_alem'      => ['nullable','string','max:255'],
            'person_category'     => ['nullable','array'],
            'become_muslim'       => ['nullable','string','max:255'],
            'hobby'               => ['nullable','string','max:255'],
            'phone_number'        => ['nullable','regex:/^\+8801[3-9]\d{8}$/'],
            'photo'               => ['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'], // 2MB
        ], [
            'phone_number.regex' => 'ফোন নম্বরটি +8801XXXXXXXXX ফরম্যাটে দিন (বাংলা সংখ্যাও লিখতে পারেন)।',
            'photo.image'        => 'শুধুমাত্র ইমেজ ফাইল আপলোড করতে পারবেন।',
            'photo.mimes'        => 'ইমেজ ফরম্যাট jpeg, png, jpg বা gif হতে হবে।',
            'photo.max'          => 'ইমেজের সাইজ সর্বোচ্চ 2MB হতে পারবে।',
        ]);

        /* C) Sanitize: trim + 255 hard-cap */
        $cap = function ($v) {
            $v = trim((string)$v);
            return $v === '' ? null : mb_substr($v, 0, 255);
        };
        $payload = [
            'dressup'             => $cap($request->input('dressup')),
            'niqab_info'          => $cap($request->input('niqab_info')),
            'beard_info'          => $cap($request->input('beard_info')),
            'above_ankle_info'    => $cap($request->input('above_ankle_info')),
            'namaz_info'          => $cap($request->input('namaz_info')),
            'namaz_waqt_info'     => $cap($request->input('namaz_waqt_info')),
            'mahram_info'         => $cap($request->input('mahram_info')),
            'quran_info'          => $cap($request->input('quran_info')),
            'fiqh_info'           => $cap($request->input('fiqh_info')),
            'enternainment_info'  => $cap($request->input('enternainment_info')),
            'disablity_info'      => $cap($request->input('disablity_info')),
            'deen_mehnot_info'    => $cap($request->input('deen_mehnot_info')),
            'mazar_concept_info'  => $cap($request->input('mazar_concept_info')),
            'islami_books'        => $cap($request->input('islami_books')),
            'favourite_alem'      => $cap($request->input('favourite_alem')),
            'become_muslim'       => $cap($request->input('become_muslim')),
            'hobby'               => $cap($request->input('hobby')),
            'phone_number'        => $cap($request->input('phone_number')), // E.164
            'person_category'     => json_encode($request->input('person_category') ?? []),
        ];

        /* D) Image upload (public disk, unique name, replace old) */
        $newPhotoPath = null;
        $newPhotoUrl  = null; // যদি পরে Blade-এ সরাসরি ইউআরএল দরকার হয়

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            if ($file->isValid()) {
                $ext      = strtolower($file->getClientOriginalExtension());
                $filename = Str::uuid()->toString().'.'.$ext;
                $dir      = 'biodata/photos/'.$user_id;        // storage/app/public/biodata/photos/{user}
                $newPhotoPath = $file->storeAs($dir, $filename, 'public');
                $newPhotoUrl  = Storage::disk('public')->url($newPhotoPath); // e.g. /storage/...
            }
        }

        /* E) Save atomically */
        DB::transaction(function () use ($user_id, $payload, $newPhotoPath) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $record = BiodataPersonalInfo::firstOrNew([
                'user_id'    => $user_id,
                'biodata_id' => $biodata->id,
            ]);

            $oldPhotoPath = $record->photo; // ধরে নিচ্ছি কলামের নাম photo

            foreach ($payload as $k => $v) {
                $record->{$k} = $v;
            }

            if ($newPhotoPath) {
                $record->photo = $newPhotoPath; // DB-তে path রাখছি
            }

            $record->user_id    = $user_id;
            $record->biodata_id = $biodata->id;
            $record->save();

            // পুরোনো ছবি ডিলিট (নতুন থাকলেই এবং path আলাদা হলে)
            if ($newPhotoPath && $oldPhotoPath && $oldPhotoPath !== $newPhotoPath) {
                if (Storage::disk('public')->exists($oldPhotoPath)) {
                    Storage::disk('public')->delete($oldPhotoPath);
                }
            }

            // wizard linkage
            $biodata->personal_id = $record->id;

            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('professional', $completed, true)) {
                $completed[] = 'professional';
            }
            $biodata->completed = $completed;
            $biodata->save();
        });

        return back()->with([
            'page_id' => $page_id + 1,
            'success' => 'ব্যক্তিগত তথ্য সংরক্ষিত হয়েছে। পরবর্তী ধাপে যান।',
        ]);
    }

    public function professional(Request $request)
    {
        $page_id = (int) ($request->input('page_id', 0));
        $user_id = Auth::guard('user')->id();

        // Validation
        $request->validate([
            'profession'         => ['required','string','max:255'],
            'profession_details' => ['required','string','max:255'],
            'monthly_income'     => ['required','string','max:255'],
        ], [
            'profession.required'         => 'পেশা লিখুন।',
            'profession_details.required' => 'পেশার বিস্তারিত লিখুন।',
            'monthly_income.required'     => 'মাসিক আয় লিখুন।',
            'profession.max'              => 'পেশা ২৫৫ অক্ষরের বেশি হতে পারবে না।',
            'profession_details.max'      => 'পেশার বিস্তারিত ২৫৫ অক্ষরের বেশি হতে পারবে না।',
            'monthly_income.max'          => 'মাসিক আয় ২৫৫ অক্ষরের বেশি হতে পারবে না।',
        ]);

        // Sanitize
        $cap = function ($v) {
            $v = trim((string)$v);
            return mb_substr($v, 0, 255);
        };
        $profession         = $cap($request->input('profession'));
        $profession_details = $cap($request->input('profession_details'));
        $monthly_income     = $cap($request->input('monthly_income'));

        // Save atomically
        DB::transaction(function () use ($user_id, $profession, $profession_details, $monthly_income) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $data = BiodataProfessionalInfo::updateOrCreate(
                ['user_id' => $user_id, 'biodata_id' => $biodata->id],
                [
                    'user_id'            => $user_id,
                    'biodata_id'         => $biodata->id,
                    'profession'         => $profession,
                    'profession_details' => $profession_details,
                    'monthly_income'     => $monthly_income,
                ]
            );

            $biodata->professional_id = $data->id;

            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('marrage', $completed, true)) {
                $completed[] = 'marrage';
            }
            $biodata->completed = json_encode($completed);
            $biodata->save();
        });

        return back()->with([
            'page_id' => $page_id + 1,
            'success' => 'পেশাগত তথ্য সংরক্ষিত হয়েছে। পরবর্তী ধাপে যান।',
        ]);
    }

    public function marrage(Request $request)
    {
        $page_id = (int) ($request->input('page_id', 0));
        $user_id = Auth::guard('user')->id();

        // All optional, just string|max:255
        $fields = [
            'wife_died_reason','why_marry_after_marrage','wife_and_childrens','wife_cover',
            'wife_study','wife_job','where_live','expectetions_from_wife',
            'husband_died_reason','job_interested','continue_study','continue_job',
            'marrage_divorce_date_reason','guardian_accept','marrage_concept',
        ];

        $rules = [];
        foreach ($fields as $f) $rules[$f] = ['nullable','string','max:255'];

        $request->validate($rules);

        $cap = function ($v) {
            $v = trim((string)$v);
            return $v === '' ? null : mb_substr($v, 0, 255);
        };

        $clean = [];
        foreach ($fields as $f) $clean[$f] = $cap($request->input($f));

        DB::transaction(function () use ($user_id, $clean) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $payload = array_merge([
                'user_id' => $user_id,
                'biodata_id' => $biodata->id,
            ], $clean);

            $data = BiodataMarrageInfo::updateOrCreate(
                ['user_id' => $user_id, 'biodata_id' => $biodata->id],
                $payload
            );

            $biodata->marrage_id = $data->id;

            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('expected', $completed, true)) {
                $completed[] = 'expected';
            }
            $biodata->completed = json_encode($completed);
            $biodata->save();
        });

        return back()->with([
            'page_id' => $page_id + 1,
            'success' => 'বিয়েসংক্রান্ত তথ্য সংরক্ষিত হয়েছে। পরবর্তী ধাপে যান।',
        ]);
    }

    public function expected(Request $request)
    {
        $page_id = (int) ($request->input('page_id', 0));
        $user_id = Auth::guard('user')->id();

        $fields = [
            'expected_age','expected_complexion','expected_height','expected_education',
            'expect_district','groom_expected_marital_status','bride_expected_marital_status',
            'expected_profession','expected_financial_status','expected_features',
        ];

        $rules = [];
        foreach ($fields as $f) $rules[$f] = ['nullable','string','max:255'];
        $request->validate($rules);

        $cap = function ($v) {
            $v = trim((string)$v);
            return $v === '' ? null : mb_substr($v, 0, 255);
        };

        $clean = [];
        foreach ($fields as $f) $clean[$f] = $cap($request->input($f));

        DB::transaction(function () use ($user_id, $clean) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $payload = array_merge([
                'user_id' => $user_id,
                'biodata_id' => $biodata->id,
            ], $clean);

            $data = BiodataExpectedInfo::updateOrCreate(
                ['user_id' => $user_id, 'biodata_id' => $biodata->id],
                $payload
            );

            $biodata->expected_id = $data->id;

            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('commitment', $completed, true)) {
                $completed[] = 'commitment';
            }
            $biodata->completed = json_encode($completed);
            $biodata->save();
        });

        return back()->with([
            'page_id' => $page_id + 1,
            'success' => 'প্রত্যাশিত জীবনসাথী সম্পর্কিত তথ্য সংরক্ষিত হয়েছে।',
        ]);
    }


    public function commitment(Request $request)
    {
        $page_id = (int) ($request->input('page_id', 0));
        $user_id = Auth::guard('user')->id();

        $request->validate([
            'gurdian_aknowledgement' => ['required','string','max:255'],
            'all_data_valid'         => ['required','string','max:255'],
            'responsibility'         => ['required','string','max:255'],
        ], [
            'gurdian_aknowledgement.required' => 'অভিভাবকের সম্মতি নিশ্চিত করুন।',
            'all_data_valid.required'         => 'তথ্যগুলোর সত্যতা নিশ্চিত করুন।',
            'responsibility.required'         => 'দায়বদ্ধতা নিশ্চিত করুন।',
        ]);

        $cap = function ($v) {
            $v = trim((string)$v);
            return mb_substr($v, 0, 255);
        };

        $gurdian_aknowledgement = $cap($request->input('gurdian_aknowledgement'));
        $all_data_valid         = $cap($request->input('all_data_valid'));
        $responsibility         = $cap($request->input('responsibility'));

        DB::transaction(function () use ($user_id, $gurdian_aknowledgement, $all_data_valid, $responsibility) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $data = BiodataCommitmentInfo::updateOrCreate(
                ['user_id' => $user_id, 'biodata_id' => $biodata->id],
                [
                    'user_id'                 => $user_id,
                    'biodata_id'              => $biodata->id,
                    'gurdian_aknowledgement'  => $gurdian_aknowledgement,
                    'all_data_valid'          => $all_data_valid,
                    'responsibility'          => $responsibility,
                ]
            );

            $biodata->commitment_id = $data->id;

            $completed = json_decode($biodata->completed, true) ?: [];
            if (!in_array('contact', $completed, true)) {
                $completed[] = 'contact';
            }
            $biodata->completed = json_encode($completed);
            $biodata->save();
        });

        return back()->with([
            'page_id' => $page_id + 1,
            'success' => 'কমিটমেন্ট তথ্য সংরক্ষিত হয়েছে। পরবর্তী ধাপে যান।',
        ]);
    }

    public function contact(Request $request)
    {
        $page_id = (int) ($request->input('page_id', 0));
        $user_id = Auth::guard('user')->id();

        // Helper: phone normalize to +8801XXXXXXXXX
        $normalizePhone = function ($raw) {
            if ($raw === null) return null;
            $raw = (string)$raw;
            $bn = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
            $en = ['0','1','2','3','4','5','6','7','8','9'];
            $p = str_replace($bn, $en, $raw);
            $p = preg_replace('/[^\d\+]/', '', $p);
            if ($p === '') return null;

            if (strpos($p, '+880') === 0) {
                // ok
            } elseif (strpos($p, '880') === 0) {
                $p = '+' . $p;
            } elseif (strpos($p, '01') === 0 && strlen($p) === 11) {
                $p = '+88' . $p;
            } elseif (preg_match('/^1[3-9]\d{8}$/', $p)) {
                $p = '+880' . $p;
            }
            return $p;
        };

        $gurdian_phone    = $normalizePhone($request->input('gurdian_phone'));
        $gurdian_whatsapp = $normalizePhone($request->input('gurdian_whatsapp'));

        $request->merge([
            'gurdian_phone'    => $gurdian_phone,
            'gurdian_whatsapp' => $gurdian_whatsapp,
        ]);

        // Validation
        $request->validate([
            'bride_name'        => ['nullable','string','max:255'],
            'groom_name'        => ['nullable','string','max:255'],
            'gurdian_name'      => ['nullable','string','max:255'],
            'gurdian_relation'  => ['nullable','string','max:255'],
            'biodata_email'     => ['nullable','string','email','max:255'],

            // phones optional but format-checked if present
            'gurdian_phone'     => ['nullable','regex:/^\+8801[3-9]\d{8}$/'],
            'gurdian_whatsapp'  => ['nullable','regex:/^\+8801[3-9]\d{8}$/'],
        ], [
            'gurdian_phone.regex'    => 'অভিভাবকের ফোন নম্বরটি +8801XXXXXXXXX ফরম্যাটে দিন।',
            'gurdian_whatsapp.regex' => 'অভিভাবকের হোয়াটসঅ্যাপ নম্বরটি +8801XXXXXXXXX ফরম্যাটে দিন।',
            'biodata_email.email'    => 'বৈধ ইমেইল ঠিকানা দিন।',
        ]);

        $cap = function ($v) {
            $v = trim((string)$v);
            return $v === '' ? null : mb_substr($v, 0, 255);
        };

        $payload = [
            'bride_name'        => $cap($request->input('bride_name')),
            'groom_name'        => $cap($request->input('groom_name')),
            'gurdian_phone'     => $cap($request->input('gurdian_phone')),
            'gurdian_whatsapp'  => $cap($request->input('gurdian_whatsapp')),
            'gurdian_name'      => $cap($request->input('gurdian_name')),
            'gurdian_relation'  => $cap($request->input('gurdian_relation')),
            'biodata_email'     => $cap($request->input('biodata_email')),
        ];

        DB::transaction(function () use ($user_id, $payload) {
            $biodata = Biodata::updateOrCreate(
                ['user_id' => $user_id, 'deleted' => '0', 'admin_created' => '0'],
                ['user_id' => $user_id]
            );

            $data = BiodataContactInfo::updateOrCreate(
                ['user_id' => $user_id, 'biodata_id' => $biodata->id],
                array_merge([
                    'user_id'    => $user_id,
                    'biodata_id' => $biodata->id,
                ], $payload)
            );

            $biodata->contact_id = $data->id;
            $biodata->save();
        });

        return back()->with([
            'page_id' => $page_id, // শেষ স্টেপ, তাই increment নয়
            'success' => 'কন্ট্যাক্ট তথ্য সংরক্ষিত হয়েছে।',
        ]);
    }


}

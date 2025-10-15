<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\BiodataAddressInfo;
use App\Models\BiodataCommitmentInfo;
use App\Models\BiodataContactInfo;
use App\Models\BiodataEducationInfo;
use App\Models\BiodataExpectedInfo;
use App\Models\BiodataFamilyInfo;
use App\Models\BiodataGeneralInfo;
use App\Models\BiodataMarrageInfo;
use App\Models\BiodataPersonalInfo;
use App\Models\BiodataProfessionalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        // if ($request->has('biodata_type')) {
        //     $this->biodata($request);
        // }
        $day = $request->input('day');
        $month = $request->input('month');
        $year = $request->input('year');
        
        if ($day && $month && $year) {
            $birthdate = \Carbon\Carbon::createFromDate($year, $month, $day)->format('Y-m-d');
        } else {
            $birthdate = null;
        } 
        
        $request->merge(['birthdate' => $birthdate]);
        
        
        $request->validate([
            "bride_groom" => "required|string",
            "marital_status" => "required|string",
            // "birthdate" => "required|string",
            // "birthdate" => "required",
            "height" => "required|string",
            "complexion" => "required|string",
            "weight" => "required|string",
            "blood_group" => "required|string",
        ]);

        // $request->validate([
        //     'birthdate' => ['required', function ($attribute, $value, $fail) {
        //         $birthdate = Carbon::createFromFormat('d/m/Y', $value);
        //         $age = $birthdate->age;
    
        //         if ($age < 18 || $age > 70) {
        //             $fail('Marriage is only valid for ages between 18 and 70.');
        //         }
        //     }]
        // ]);
        
        $request->validate([
            'birthdate' => ['required', 'date', function ($attribute, $value, $fail) {
                try {
                    // input আসবে YYYY-MM-DD format এ
                    $birthdate = Carbon::createFromFormat('Y-m-d', $value);
                    $age = $birthdate->age;
        
                    if ($age < 18 || $age > 70) {
                        $fail('Marriage is only valid for ages between 18 and 70.');
                    }
                } catch (\Exception $e) {
                    $fail('The '.$attribute.' is not a valid date.');
                }
            }]
        ]);


        $page_id = $request->page_id ?? 0;
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
                "bride_groom" => $request->bride_groom,
                "marital_status" => $request->marital_status,
                // "birthdate" => Carbon::createFromFormat('d/m/Y', $request->birthdate)->format('Y-m-d H:i:s'),
                "birthdate" => $birthdate,
                "height" => $request->height,
                "complexion" => $request->complexion,
                "weight" => $request->weight,
                "blood_group" => $request->blood_group,
            ]
        );

        $biodata->general_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("address", $completed)) {
            array_push($completed, "address");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function address(Request $request)
    {
        $request->validate([
            "parmanent_zella" => "required|string",
            "parmanent_address" => "required|string",
            "where_raised" => "required|string",
        ]);

        if ($request->present_address_same != 'on') {
            $request->validate([
                "present_zella" => "string",
                "present_address" => "string",
            ]);
        }



        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;

        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataAddressInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "parmanent_zella" => $request->parmanent_zella,
                "parmanent_address" => $request->parmanent_address,
                "present_address_same" => $request->present_address_same,
                "present_zella" => $request->present_address_same != 'on' ? $request->present_zella : $request->parmanent_zella,
                "present_address" => $request->present_address_same != 'on' ? $request->present_address : $request->parmanent_address,
                "where_raised" => $request->where_raised,
            ]
        );

        $biodata->address_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("education", $completed)) {
            array_push($completed, "education");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function education(Request $request)
    {
        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;


        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataEducationInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "education_medium" => $request->education_medium ?? null,
                "general_highest_education" => $request->general_highest_education ?? null,
                "general_highest_school_study" => $request->general_highest_school_study ?? null,
                "ssc_year" => $request->ssc_year ?? null,
                "ssc_dept" => $request->ssc_dept ?? null,
                "ssc_result" => $request->ssc_result ?? null,
                "hsc_study_running" => $request->hsc_study_running ?? null,
                "study_after_ssc" => $request->study_after_ssc ?? null,
                "hsc_pass_year" => $request->hsc_pass_year ?? null,
                "hsc_dept" => $request->hsc_dept ?? null,
                "hsc_result" => $request->hsc_result ?? null,
                "diploma_subject" => $request->diploma_subject ?? null,
                "diploma_institution" => $request->diploma_institution ?? null,
                "diploma_current_year" => $request->diploma_current_year ?? null,
                "diploma_passing_year" => $request->diploma_passing_year ?? null,
                "honors_subject" => $request->honors_subject ?? null,
                "honors_instutution" => $request->honors_instutution ?? null,
                "honors_passing_year" => $request->honors_passing_year ?? null,
                "honors_study_year" => $request->honors_study_year ?? null,
                "masters_subject" => $request->masters_subject ?? null,
                "masters_institution" => $request->masters_institution ?? null,
                "masters_passing_year" => $request->masters_passing_year ?? null,
                "doctorate_subject" => $request->doctorate_subject ?? null,
                "doctorate_institution" => $request->doctorate_institution ?? null,
                "doctorate_passing_year" => $request->doctorate_passing_year ?? null,
                "qawmi_education_qualification" => $request->qawmi_education_qualification ?? null,
                "ibtedai_madrasa" => $request->ibtedai_madrasa ?? null,
                "mutawassitah_madrasa" => $request->mutawassitah_madrasa ?? null,
                "sanabia_ulya_madrasa" => $request->sanabia_ulya_madrasa ?? null,
                "fazilat_madrasa" => $request->fazilat_madrasa ?? null,
                "takmil_madrasa" => $request->takmil_madrasa ?? null,
                "takhassus_madrasa" => $request->takhassus_madrasa ?? null,
                "qawmi_result" => $request->qawmi_result ?? null,
                "qawmi_passing_year" => $request->qawmi_passing_year ?? null,
                "takhassus_subject" => $request->takhassus_subject ?? null,
                "takhassus_result" => $request->takhassus_result ?? null,
                "takhassus_passing_year" => $request->takhassus_passing_year ?? null,
                "others_educational_qualifications" => $request->others_educational_qualifications ?? null,
                "deen_designations" => $request->deen_designations ?? null,
            ]
        );

        $biodata->education_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("family", $completed)) {
            array_push($completed, "family");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function family(Request $request)
    {
        $request->validate([
            "fathers_name" => "required|string",
            "father_status" => "required|string",
            "father_profession" => "required|string",
            "mothers_name" => "required|string",
            "mother_status" => "required|string",
            "mother_profession" => "required|string",
            "total_brother" => "required|string",
            "total_sister" => "required|string",
            // "total_paternal_uncle" => "required|string",
            // "total_maternal_uncle" => "required|string",
            "family_status" => "required|string",
            "financial_status" => "required|string",
            // "family_environment" => "required|string",
        ]);


        if ($request->total_brother != "0") {
            $request->validate([
                "brother_names.*" => "required|string",
                "brother_educations.*" => "required|string",
                "brother_jobs.*" => "required|string",
                "brother_merital_status.*" => "required|string",
            ]);
        }
        if ($request->total_sister != "0") {
            $request->validate([
                "sister_names.*" => "required|string",
                "sister_educations.*" => "required|string",
                "sister_jobs.*" => "required|string",
                "sister_merital_status.*" => "required|string",
            ]);
        }
        if ($request->has('total_paternal_uncle')) {
            if ($request->total_paternal_uncle != "0") {
                $request->validate([
                    "paternal_uncle_names.*" => "required|string",
                    "paternal_uncle_educations.*" => "required|string",
                    "paternal_uncle_jobs.*" => "required|string",
                    "paternal_uncle_merital_status.*" => "required|string",
                ]);
            }
        }
        if ($request->has('total_maternal_uncle')) {
            if ($request->total_maternal_uncle != "0") {
                $request->validate([
                    "maternal_uncle_names.*" => "required|string",
                    "maternal_uncle_educations.*" => "required|string",
                    "maternal_uncle_jobs.*" => "required|string",
                    "maternal_uncle_merital_status.*" => "required|string",
                ]);
            }
        }

        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;

        $brothers = [];
        $sisters = [];
        $paternal_uncles = [];
        $maternal_uncles = [];



        if (
            $request->has('brother_names') &&
            $request->has('brother_educations') &&
            $request->has('brother_jobs') &&
            $request->has('brother_merital_status')
        ) {
            foreach ($request->brother_names as $key => $name) {
                $array_data = [
                    "name" => $name,
                    "education" => array_key_exists($key, $request->brother_educations) ? $request->brother_educations[$key] : null,
                    "job" => array_key_exists($key, $request->brother_jobs) ? $request->brother_jobs[$key] : null,
                    "merital_status" => array_key_exists($key, $request->brother_merital_status) ? $request->brother_merital_status[$key] : null,
                    "spause_profession" => $request->brother_spause_profession && array_key_exists($key, $request->brother_spause_profession) ? $request->brother_spause_profession[$key] : null,
                    "spouse_education" => $request->brother_spouse_education && array_key_exists($key, $request->brother_spouse_education) ? $request->brother_spouse_education[$key] : null,
                ];
                array_push($brothers, $array_data);
            }
        }


        if (
            $request->has('sister_names') &&
            $request->has('sister_educations') &&
            $request->has('sister_jobs') &&
            $request->has('sister_merital_status')
        ) {
            foreach ($request->sister_names as $key => $name) {
                $array_data = [
                    "name" => $name,
                    "education" => array_key_exists($key, $request->sister_educations) ? $request->sister_educations[$key] : null,
                    "job" => array_key_exists($key, $request->sister_jobs) ? $request->sister_jobs[$key] : null,
                    "merital_status" => array_key_exists($key, $request->sister_merital_status) ? $request->sister_merital_status[$key] : null,
                    "spause_profession" => $request->sister_spause_profession && array_key_exists($key, $request->sister_spause_profession) ? $request->sister_spause_profession[$key] : null,
                    "spouse_education" => $request->sister_spouse_education && array_key_exists($key, $request->sister_spouse_education) ? $request->sister_spouse_education[$key] : null,
                ];
                array_push($sisters, $array_data);
            }
        }

        if ($request->has('total_paternal_uncle')) {
            if (
                $request->has('paternal_uncle_names') &&
                $request->has('paternal_uncle_educations') &&
                $request->has('paternal_uncle_jobs') &&
                $request->has('paternal_uncle_merital_status')
            ) {
                foreach ($request->paternal_uncle_names as $key => $name) {
                    $array_data = [
                        "name" => $name,
                        "education" => array_key_exists($key, $request->paternal_uncle_educations) ? $request->paternal_uncle_educations[$key] : null,
                        "job" => array_key_exists($key, $request->paternal_uncle_jobs) ? $request->paternal_uncle_jobs[$key] : null,
                        "merital_status" => array_key_exists($key, $request->paternal_uncle_merital_status) ? $request->paternal_uncle_merital_status[$key] : null,
                    ];
                    array_push($paternal_uncles, $array_data);
                }
            }
        }
        if ($request->has('total_maternal_uncle')) {
            if (
                $request->has('maternal_uncle_names') &&
                $request->has('maternal_uncle_educations') &&
                $request->has('maternal_uncle_jobs') &&
                $request->has('maternal_uncle_merital_status')
            ) {
                foreach ($request->maternal_uncle_names as $key => $name) {
                    $array_data = [
                        "name" => $name,
                        "education" => array_key_exists($key, $request->maternal_uncle_educations) ? $request->maternal_uncle_educations[$key] : null,
                        "job" => array_key_exists($key, $request->maternal_uncle_jobs) ? $request->maternal_uncle_jobs[$key] : null,
                        "merital_status" => array_key_exists($key, $request->maternal_uncle_merital_status) ? $request->maternal_uncle_merital_status[$key] : null,
                    ];
                    array_push($maternal_uncles, $array_data);
                }
            }
        }



        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataFamilyInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,

                "fathers_name" => $request->fathers_name,
                "father_status" => $request->father_status,
                "father_profession" => $request->father_profession,

                "mothers_name" => $request->mothers_name,
                "mother_status" => $request->mother_status,
                "mother_profession" => $request->mother_profession,

                "total_brother" => $request->total_brother,
                "total_sister" => $request->total_sister,
                "total_paternal_uncle" => $request->total_paternal_uncle,
                "total_maternal_uncle" => $request->total_maternal_uncle,

                "family_status" => $request->family_status,
                "financial_status" => $request->financial_status,
                "family_environment" => $request->family_environment,

                "brothers" => json_encode($brothers),
                "sisters" => json_encode($sisters),
                "paternal_uncles" => json_encode($paternal_uncles),
                "maternal_uncles" => json_encode($maternal_uncles),
            ]
        );

        $biodata->family_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("personal", $completed)) {
            array_push($completed, "personal");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function personal(Request $request)
    {
        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;

        // Handle the image upload
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the image in the 'images' directory
            $path = $image->storeAs('images', $imageName, 'public');
        }

        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
                // "personal_id" => $data->id
            ]
        );

        $data = BiodataPersonalInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "dressup" => $request->dressup,
                "niqab_info" => $request->niqab_info,
                "beard_info" => $request->beard_info,
                "above_ankle_info" => $request->above_ankle_info,
                "namaz_info" => $request->namaz_info,
                "namaz_waqt_info" => $request->namaz_waqt_info,
                "mahram_info" => $request->mahram_info,
                "quran_info" => $request->quran_info,
                "fiqh_info" => $request->fiqh_info,
                "enternainment_info" => $request->enternainment_info,
                "disablity_info" => $request->disablity_info,
                "deen_mehnot_info" => $request->deen_mehnot_info,
                "mazar_concept_info" => $request->mazar_concept_info,
                "islami_books" => $request->islami_books,
                "favourite_alem" => $request->favourite_alem,
                "person_category" => json_encode($request->person_category ?? []),
                "become_muslim" => $request->become_muslim,
                "hobby" => $request->hobby,
                "phone_number" => $request->phone_number,
                // "photo" => $path,
            ]
        );

        if ($request->hasFile('photo')) {
            $data->photo = $path;
            $data->save();
        }




        $biodata->personal_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("professional", $completed)) {
            array_push($completed, "professional");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function professional(Request $request)
    {
        $request->validate([
            "profession" => "required|string",
            "profession_details" => "required|string",
            "monthly_income" => "required|string",
        ]);


        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;

        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataProfessionalInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "profession" => $request->profession,
                "profession_details" => $request->profession_details,
                "monthly_income" => $request->monthly_income
            ]
        );

        $biodata->professional_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("marrage", $completed)) {
            array_push($completed, "marrage");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function marrage(Request $request)
    {
        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;

        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataMarrageInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "wife_died_reason" => $request->wife_died_reason ?? null,
                "why_marry_after_marrage" => $request->why_marry_after_marrage ?? null,
                "wife_and_childrens" => $request->wife_and_childrens ?? null,
                "wife_cover" => $request->wife_cover ?? null,
                "wife_study" => $request->wife_study ?? null,
                "wife_job" => $request->wife_job ?? null,
                "where_live" => $request->where_live ?? null,
                "expectetions_from_wife" => $request->expectetions_from_wife ?? null,
                "husband_died_reason" => $request->husband_died_reason ?? null,
                "job_interested" => $request->job_interested ?? null,
                "continue_study" => $request->continue_study ?? null,
                "continue_job" => $request->continue_job ?? null,
                "marrage_divorce_date_reason" => $request->marrage_divorce_date_reason ?? null,
                "guardian_accept" => $request->guardian_accept ?? null,
                "marrage_concept" => $request->marrage_concept ?? null,
            ]
        );

        $biodata->marrage_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("expected", $completed)) {
            array_push($completed, "expected");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function expected(Request $request)
    {
        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;

        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataExpectedInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "expected_age" => $request->expected_age,
                "expected_complexion" => $request->expected_complexion,
                "expected_height" => $request->expected_height,
                "expected_education" => $request->expected_education,
                "expect_district" => $request->expect_district,
                "groom_expected_marital_status" => $request->groom_expected_marital_status,
                "bride_expected_marital_status" => $request->bride_expected_marital_status,
                "expected_profession" => $request->expected_profession,
                "expected_financial_status" => $request->expected_financial_status,
                "expected_features" => $request->expected_features,
            ]
        );

        $biodata->expected_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("commitment", $completed)) {
            array_push($completed, "commitment");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function commitment(Request $request)
    {

        $request->validate([
            "gurdian_aknowledgement" => "required|string",
            "all_data_valid" => "required|string",
            "responsibility" => "required|string",
        ]);

        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;

        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataCommitmentInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "gurdian_aknowledgement" => $request->gurdian_aknowledgement,
                "all_data_valid" => $request->all_data_valid,
                "responsibility" => $request->responsibility,
            ]
        );

        $biodata->commitment_id = $data->id;

        $completed = json_decode($biodata->completed);
        if (!in_array("contact", $completed)) {
            array_push($completed, "contact");
        }
        $biodata->completed = $completed;

        $biodata->save();

        $updateStatus = $this->updateStatus($biodata);
        if ($updateStatus) {
            return redirect()->route('user.my_biodata')->with('success', 'You\'r Biodata Has Been Submitted. We\'ll Approve Your Biodata Soon.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id + 1, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }

    public function contact(Request $request)
    {
        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('user')->user()->id;

        $biodata = Biodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '0'],
            [
                "user_id" => $user_id,
            ]
        );

        $data = BiodataContactInfo::updateOrCreate(
            ["user_id" => $user_id, "biodata_id" => $biodata->id],
            [
                "user_id" => $user_id,
                "biodata_id" => $biodata->id,
                "bride_name" => $request->bride_name,
                "groom_name" => $request->groom_name,
                "gurdian_phone" => $request->gurdian_phone,
                "gurdian_whatsapp" => $request->gurdian_whatsapp,
                "gurdian_name" => $request->gurdian_name,
                "gurdian_relation" => $request->gurdian_relation,
                "biodata_email" => $request->biodata_email,
            ]
        );



        $biodata->contact_id = $data->id;
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
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BioData;
use App\Models\DraftBiodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BioDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function bioData()
    {
        $user_id = Auth::user()->id;
        $biodata = DraftBiodata::where('user_id', $user_id)->first();
        return view('frontend.biodata', compact('biodata'));
    }

    public function showPersonalInfo()
    {
        $user_id = Auth::user()->id;
        $biodata = DraftBiodata::where('user_id', $user_id)->first();
        if (!$biodata) {
            return redirect()->route("frontend.biodata");
        }
        return view('biodata.personal_info', compact('biodata'));
    }
    public function personalInfoProcessFirstStep(Request $request)
    {
        $validator = Validator(
            $request->all(),
            [
                'bride_groom' => 'required',
                'person_name' => 'required',
                'language' => 'required',
            ], [
                "*.required"=>"এই ফিল্ডটি পুরণ করা আবশ্যক"
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user_id = Auth::user()->id;
        $FindBioData = DraftBiodata::where('user_id', $user_id)->first();
        if ($FindBioData != null) {
            $d_bio = $FindBioData;
        } else {
            $d_bio = new DraftBiodata();
        }


        $d_bio->user_id = Auth::user()->id;
        $d_bio->bride_groom = $request->bride_groom;
        $d_bio->person_name = $request->person_name;
        $d_bio->language = $request->language;
        $d_bio->save();
        return redirect()->route('frontend.personalinfo')->with('success', 'Successfully Submited');
    }
    public function personalInfoProcessSecondStep(Request $request)
    {
        // $oldBioData = session()->get('biodata');
        $validator = Validator(
            $request->all(),
            [
                'name' => 'required',
                'fatherName' => 'required',
                'fatherOccupation' => 'required',
                'motherName' => 'required',
                'motherOccupation' => 'required',
                'permanentVillage' => 'required',
                // 'permanentPostoffice' => 'required',
                'permanentThana' => 'required',
                'permanentDistrict' => 'required',
                'presentVillage' => 'required',
                // 'presentPostoffice' => 'required',
                'presentThana' => 'required',
                'presentDistrict' => 'required',
                'dateOfBirth' => 'required',
                'heightFt' => 'required',
                'heightInch' => 'required',
                'weight' => 'required',
                // 'complexion' => 'required',
                'majhab' => 'required',
                'educationalQualification' => 'required',
                'occupationWant' => 'required',
                'maritualStatusWant' => 'required',
                // 'divorceReason' => 'required',
                // 'aboutYourself' => 'required',
                'aboutYourself' => 'max:2000',
            ], [
                "*.required"=>"এই ফিল্ডটি পুরণ করা আবশ্যক",
                "*.max"=>"নির্ধারিত মাত্রার অধিক ক্যারেক্টার ব্যবহার করা হয়েছে",
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (time() < strtotime('+18 years', strtotime($request->dateOfBirth))) {
            return redirect()->back()->withErrors(['dateOfBirth'=>"দুঃখিত, বয়স ১৮ বছরের কম হলে বায়োডাটা গ্রহনযোগ্য নয়।"])->withInput();
         }
        if (strtotime($request->dateOfBirth) < strtotime('-75 years', time())) {
            return redirect()->back()->withErrors(['dateOfBirth'=>"দুঃখিত, বয়স ৭৫ বছরের বেশি হলে বায়োডাটা গ্রহনযোগ্য নয়।"])->withInput();
         }

        $user_id = Auth::user()->id;
        $FindBioData = DraftBiodata::where('user_id', $user_id)->first();
        if ($FindBioData != null) {
            $d_bio = $FindBioData;
        } else {
            $d_bio = new DraftBiodata();
        }

        $d_bio->name = $request->name;
        $d_bio->fatherName = $request->fatherName;
        $d_bio->fatherOccupation = $request->fatherOccupation;
        $d_bio->motherName = $request->motherName;
        $d_bio->motherOccupation = $request->motherOccupation;
        $d_bio->fatherOccupationCustom = $request->fatherOccupationCustom;
        $d_bio->motherOccupationCustom = $request->motherOccupationCustom;
        $d_bio->fatherOccupationInfo = $request->fatherOccupationInfo;
        $d_bio->motherOccupationInfo = $request->motherOccupationInfo;
        $d_bio->permanentVillage = $request->permanentVillage;
        $d_bio->permanentPostoffice = $request->permanentPostoffice ?? null;
        $d_bio->permanentThana = $request->permanentThana;
        $d_bio->permanentDistrict = $request->permanentDistrict;
        $d_bio->presentVillage = $request->presentVillage;
        $d_bio->presentPostoffice = $request->presentPostoffice ?? null;
        $d_bio->presentThana = $request->presentThana;
        $d_bio->presentDistrict = $request->presentDistrict;
        $d_bio->dateOfBirth = $request->dateOfBirth;
        $d_bio->heightFt = $request->heightFt;
        $d_bio->heightInch = $request->heightInch;
        $d_bio->weight = $request->weight;
        $d_bio->complexion = $request->complexion ?? null;
        $d_bio->blood_groop = $request->blood_groop ?? null;
        $d_bio->majhab = $request->majhab;
        $d_bio->majhabDetails = $request->majhabDetails;
        $d_bio->educationalQualification = $request->educationalQualification;
        $d_bio->occupationWant = $request->occupationWant;
        $d_bio->maritualStatusWant = $request->maritualStatusWant;
        $d_bio->divorceReason = $request->divorceReason ?? null;
        $d_bio->politicalView = $request->politicalView ?? null;
        $d_bio->aboutYourself = $request->aboutYourself ?? null;
        $d_bio->save();

        return redirect()->route('frontend.familyDetails')->with('success', 'Successfully Submited');
    }
    public function personalInfoProcessThirdStep(Request $request)
    {
        $validator = Validator(
            $request->all(),
            [
                "financialStatus" => "required",
                "socialStatus" => "required",
                "brotherNumber" => "required",
                "sisterNumber" => "required",
                "paternalUncleNumber" => "required",
                "maternalUncleNumber" => "required",
            ], [
                "*.required"=>"এই ফিল্ডটি পুরণ করা আবশ্যক"
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        


        $oldBioData = session()->get('biodata');
        $user_id = Auth::user()->id;
        $FindBioData = DraftBiodata::where('user_id', $user_id)->first();
        if ($FindBioData != null) {
            $d_bio = $FindBioData;
        } else {
            $d_bio = new DraftBiodata();
        }
        $d_bio->brotherNumber = $request->brotherNumber;
        $d_bio->sisterNumber = $request->sisterNumber;
        $d_bio->brotherName = $request->brotherName;
        $d_bio->brotherEduQualification = $request->brotherEduQualification;
        $d_bio->brotherOccupation = $request->brotherOccupation;
        $d_bio->brotherMarritalStatus = $request->brotherMarritalStatus;
        $d_bio->sisterName = $request->sisterName;
        $d_bio->sisterEduQualification = $request->sisterEduQualification;
        $d_bio->sisterOccupation = $request->sisterOccupation;
        $d_bio->sisterMarritalStatus = $request->sisterMarritalStatus;
        $d_bio->brotherInLawStatus = $request->brotherInLawStatus;
        $d_bio->financialStatus = $request->financialStatus;
        $d_bio->socialStatus = $request->socialStatus;
        $d_bio->paternalUncleNumber = $request->paternalUncleNumber;
        $d_bio->maternalUncleNumber = $request->maternalUncleNumber;
        $d_bio->paternalUncleName = $request->paternalUncleName;
        $d_bio->paternalUncleEduQualification = $request->paternalUncleEduQualification;
        $d_bio->paternalUncleOccupation = $request->paternalUncleOccupation;
        $d_bio->paternalUncleMarritalStatus = $request->paternalUncleMarritalStatus;
        $d_bio->maternalUncleName = $request->maternalUncleName;
        $d_bio->maternalUncleEduQualification = $request->maternalUncleEduQualification;
        $d_bio->maternalUncleOccupation = $request->maternalUncleOccupation;
        $d_bio->maternalUncleMarritalStatus = $request->maternalUncleMarritalStatus;
        $d_bio->save();
        return redirect()->route('frontend.brideGroomMoreDetails')->with('success', 'Successfully Submited');
    }
    public function personalInfoProcessForthStep(Request $request)
    {
        $oldBioData = session()->get('biodata');
        $validator = Validator(
            $request->all(),
            [
                'vail' => 'required',
                'tv_watch' => 'required',
                'music_listen' => 'required',
                'physical_disability' => 'required',
                'salat' => 'required',
                'dini_mehonot' => 'required',
                
                // 'beards' => 'required',
                // 'job_permission' => 'required',
            ], [
                "*.required"=>"এই ফিল্ডটি পুরণ করা আবশ্যক"
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user_id = Auth::user()->id;
        $FindBioData = DraftBiodata::where('user_id', $user_id)->first();
        if ($FindBioData != null) {
            $d_bio = $FindBioData;
        } else {
            $d_bio = new DraftBiodata();
        }
        $d_bio->concept_about = $request->concept_about;
        $d_bio->vail = $request->vail;
        $d_bio->job_permission = $request->job_permission;
        $d_bio->job_join = $request->job_join;
        $d_bio->beards = $request->beards;
        $d_bio->tv_watch = $request->tv_watch;
        $d_bio->music_listen = $request->music_listen;
        $d_bio->physical_disability = $request->physical_disability;
        $d_bio->salat = $request->salat;
        $d_bio->dini_mehonot = $request->dini_mehonot;
        $d_bio->save();
        return redirect()->route('frontend.requirment')->with('success', 'Successfully Submited');
    }
    public function personalInfoProcessFifthStep(Request $request)
    {
        $oldBioData = session()->get('biodata');

        $validator = Validator(
            $request->all(),
            [
                'want_age' => 'required',
                'want_height' => 'required',
                'want_weight' => 'required',
                'want_complexion' => 'required',
                'want_maritualStatus' => 'required',
                'want_education' => 'required',
                'want_occupation' => 'required',
                'want_district' => 'required',
                'want_location' => 'required',
                // 'want_special_qualities' => 'required',
            ], [
                "*.required"=>"এই ফিল্ডটি পুরণ করা আবশ্যক"
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::user()->id;
        $FindBioData = DraftBiodata::where('user_id', $user_id)->first();
        if ($FindBioData != null) {
            $d_bio = $FindBioData;
        } else {
            $d_bio = new DraftBiodata();
        }
        $d_bio->want_age = $request->want_age;
        $d_bio->want_height = $request->want_height;
        $d_bio->want_weight = $request->want_weight;
        $d_bio->want_complexion = $request->want_complexion;
        $d_bio->want_maritualStatus = $request->want_maritualStatus;
        $d_bio->want_education = $request->want_education;
        $d_bio->want_district = $request->want_district;
        $d_bio->want_location = $request->want_location;
        $d_bio->want_occupation = $request->want_occupation;
        $d_bio->want_special_qualities = $request->want_special_qualities ?? null;
        $d_bio->save();
        return redirect()->route('frontend.communication')->with('success', 'Successfully Submited');
    }
    public function personalInfoProcessStepCompelete(Request $request)
    {
        if ($request->ajax()) {
            // $oldBioData = session()->get('biodata');
            // dd($oldBioData);
            $user_id = Auth::user()->id;
            $oldBioData = DraftBiodata::where('user_id', $user_id)->first();
            $validator = Validator(
                $request->all(),
                [
                    'marage_plan' => 'required',
                    'allow_post_blog' => 'required',
                    'phone_no_1' => 'required',
                    'phone_no_2' => 'required',
                    'name_1' => 'required',
                    'relation_1' => 'required',
                    'name_2' => 'required',
                    'relation_2' => 'required',
                    'email' => 'required',
                ], [
                    "*.required"=>"এই ফিল্ডটি পুরণ করা আবশ্যক"
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {
                $validator = Validator(
                    $oldBioData->toArray(),
                    [
                        'bride_groom' => 'required',
                        'person_name' => 'required',
                        'language' => 'required',
    
                        'name' => 'required',
                        'fatherName' => 'required',
                        'fatherOccupation' => 'required',
                        'motherName' => 'required',
                        'motherOccupation' => 'required',
                        'permanentVillage' => 'required',
                        // 'permanentPostoffice' => 'required',
                        'permanentThana' => 'required',
                        'permanentDistrict' => 'required',
                        'presentVillage' => 'required',
                        // 'presentPostoffice' => 'required',
                        'presentThana' => 'required',
                        'presentDistrict' => 'required',
                        'dateOfBirth' => 'required',
                        'heightFt' => 'required',
                        'heightInch' => 'required',
                        'weight' => 'required',
                        // 'complexion' => 'required',
                        'majhab' => 'required',
                        'educationalQualification' => 'required',
                        'occupationWant' => 'required',
                        'maritualStatusWant' => 'required',
                        // 'aboutYourself' => 'required',
    
                        'tv_watch' => 'required',
                        'music_listen' => 'required',
                        'physical_disability' => 'required',
                        'salat' => 'required',
                        'dini_mehonot' => 'required',
    
                        'want_age' => 'required',
                        'want_height' => 'required',
                        'want_weight' => 'required',
                        'want_complexion' => 'required',
                        'want_maritualStatus' => 'required',
                        'want_education' => 'required',
                        'want_district' => 'required',
                        'want_location' => 'required',
                        // 'want_special_qualities' => 'required',
                    ]
                );
    
                if ($validator->fails()) {
                    return response()->json([
                        'type' => 'error',
                        'errors' => $validator->getMessageBag()->toArray()
                    ]);
                }
            }



            if ($request->phone_no_1 == $request->phone_no_2) {
                return response()->json([
                    'type' => 'error',
                    'errors' => [
                        "phone_no_2" => ["Please use an Unique Phone Number"]
                    ]
                ]);
            }

            $data = new BioData();
            $data->bride_groom = $oldBioData->bride_groom;
            $data->user_id = Auth::user()->id;
            $data->person_name = $oldBioData->person_name;
            $data->language = $oldBioData->language;
            $data->name = $oldBioData->name;
            $data->fatherName = $oldBioData->fatherName;
            $data->fatherOccupation = $oldBioData->fatherOccupation;
            $data->motherName = $oldBioData->motherName;
            $data->motherOccupation = $oldBioData->motherOccupation;
            $data->motherOccupationCustom = $oldBioData->motherOccupationCustom;
            $data->fatherOccupationCustom = $oldBioData->fatherOccupationCustom;
            $data->fatherOccupationInfo = $oldBioData->fatherOccupationInfo;
            $data->motherOccupationInfo = $oldBioData->motherOccupationInfo;
            $data->permanentVillage = $oldBioData->permanentVillage;
            $data->permanentPostoffice = $oldBioData->permanentPostoffice ?? null;
            $data->permanentThana = $oldBioData->permanentThana;
            $data->permanentDistrict = $oldBioData->permanentDistrict;
            $data->presentVillage = $oldBioData->presentVillage;
            $data->presentPostoffice = $oldBioData->presentPostoffice ?? null;
            $data->presentThana = $oldBioData->presentThana;
            $data->presentDistrict = $oldBioData->presentDistrict;
            $data->dateOfBirth = $oldBioData->dateOfBirth;
            $data->heightFt = $oldBioData->heightFt;
            $data->heightInch = $oldBioData->heightInch;
            $data->weight = $oldBioData->weight;
            $data->complexion = $oldBioData->complexion ?? null;
            $data->blood_groop = $oldBioData->blood_groop ?? null;
            $data->majhab = $oldBioData->majhab;
            $data->majhabDetails = $oldBioData->majhabDetails;
            $data->educationalQualification = $oldBioData->educationalQualification;
            $data->occupationWant = $oldBioData->occupationWant;
            $data->maritualStatusWant = $oldBioData->maritualStatusWant;
            $data->divorceReason = $oldBioData->divorceReason ?? null;
            $data->politicalView = $oldBioData->politicalView ?? null;
            $data->aboutYourself = $oldBioData->aboutYourself ?? null;
            $data->brotherNumber = $oldBioData->brotherNumber;
            $data->sisterNumber = $oldBioData->sisterNumber;
            $data->brotherName = $oldBioData->brotherName;
            $data->brotherEduQualification = $oldBioData->brotherEduQualification;
            $data->brotherOccupation = $oldBioData->brotherOccupation;
            $data->brotherMarritalStatus = $oldBioData->brotherMarritalStatus;
            $data->sisterName = $oldBioData->sisterName;
            $data->sisterEduQualification = $oldBioData->sisterEduQualification;
            $data->sisterOccupation = $oldBioData->sisterOccupation;
            $data->sisterMarritalStatus = $oldBioData->sisterMarritalStatus;
            $data->brotherInLawStatus = $oldBioData->brotherInLawStatus;
            $data->financialStatus = $oldBioData->financialStatus;
            $data->socialStatus = $oldBioData->socialStatus;
            $data->paternalUncleNumber = $oldBioData->paternalUncleNumber;
            $data->maternalUncleNumber = $oldBioData->maternalUncleNumber;
            $data->paternalUncleName = $oldBioData->paternalUncleName;
            $data->paternalUncleEduQualification = $oldBioData->paternalUncleEduQualification;
            $data->paternalUncleOccupation = $oldBioData->paternalUncleOccupation;
            $data->paternalUncleMarritalStatus = $oldBioData->paternalUncleMarritalStatus;
            $data->maternalUncleName = $oldBioData->maternalUncleName;
            $data->maternalUncleEduQualification = $oldBioData->maternalUncleEduQualification;
            $data->maternalUncleOccupation = $oldBioData->maternalUncleOccupation;
            $data->maternalUncleMarritalStatus = $oldBioData->maternalUncleMarritalStatus;
            $data->concept_about = $oldBioData->concept_about;
            $data->vail = $oldBioData->vail;
            $data->job_permission = $oldBioData->job_permission;
            $data->job_join = $oldBioData->job_join;
            $data->want_occupation = $oldBioData->want_occupation;
            $data->beards = $oldBioData->beards;
            $data->tv_watch = $oldBioData->tv_watch;
            $data->music_listen = $oldBioData->music_listen;
            $data->physical_disability = $oldBioData->physical_disability;
            $data->salat = $oldBioData->salat;
            $data->dini_mehonot = $oldBioData->dini_mehonot;
            $data->want_age = $oldBioData->want_age;
            $data->want_height = $oldBioData->want_height;
            $data->want_weight = $oldBioData->want_weight;
            $data->want_complexion = $oldBioData->want_complexion;
            $data->want_maritualStatus = $oldBioData->want_maritualStatus;
            $data->want_education = $oldBioData->want_education;
            $data->want_district = $oldBioData->want_district;
            $data->want_location = $oldBioData->want_location;
            $data->want_special_qualities = $oldBioData->want_special_qualities ?? null;
            $data->marage_plan = $request->marage_plan;
            $data->allow_post_blog = $request->allow_post_blog;
            $data->phone_no_1 = $request->phone_no_1;
            $data->phone_no_2 = $request->phone_no_2;
            $data->name_1 = $request->name_1;
            $data->relation_1 = $request->relation_1;
            $data->name_2 = $request->name_2;
            $data->relation_2 = $request->relation_2;
            $data->email = $request->email;
            $data->save();


            DraftBiodata::where('user_id', $user_id)->delete();
            return response()->json(['type' => 'success', 'message' => "Successfully Submitted"]);
        } else {
            abort(403);
        }
    }

    public function familyDetails()
    {
        $user_id = Auth::user()->id;
        $biodata = DraftBiodata::where('user_id', $user_id)->first();
        if (!$biodata) {
            return redirect()->route("frontend.biodata");
        }
        return view('biodata.family_details', compact('biodata'));
    }

    public function brideGroomMoreDetails()
    {
        $user_id = Auth::user()->id;
        $biodata = DraftBiodata::where('user_id', $user_id)->first();
        if (!$biodata) {
            return redirect()->route("frontend.biodata");
        }
        return view('biodata.bride_groom_more_details', compact('biodata'));
    }

    public function requirment()
    {
        $user_id = Auth::user()->id;
        $biodata = DraftBiodata::where('user_id', $user_id)->first();
        if (!$biodata) {
            return redirect()->route("frontend.biodata");
        }

        return view('biodata.requirment', compact('biodata'));
    }

    public function communication()
    {
        $user_id = Auth::user()->id;
        $biodata = DraftBiodata::where('user_id', $user_id)->first();
        if (!$biodata) {
            return redirect()->route("frontend.biodata");
        }

        return view('biodata.communication', compact('biodata'));
    }
}

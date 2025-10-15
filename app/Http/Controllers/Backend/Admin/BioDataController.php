<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Common;
use App\Models\Admin;
use App\Models\BioData;
use App\Models\User;
use App\Models\Biodata as NewBiodata;
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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class BioDataController extends Controller
{

    public function approved()
    {
        $haspermision = auth()->user()->can('biodata-approved');
        if ($haspermision) {
            $page_name = 'Approved Biodata';
            $page = 'approved';
            return view('backend.admin.biodata.index', compact('page_name', 'page'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }

    public function pending()
    {
        $haspermision = auth()->user()->can('biodata-pending');
        if ($haspermision) {
            $page_name = 'Pending Biodata';
            $page = 'pending';
            return view('backend.admin.biodata.index', compact('page_name', 'page'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }

    public function getAll($page)
    {

        $can_edit = $can_view = $can_approve = $can_delete = '';
        if (!auth()->user()->can('biodata-edit')) {
            $can_edit = "style='display:none;'";
        }
        if (!auth()->user()->can('biodata-delete')) {
            $can_delete = "style='display:none;'";
        }
        if (!auth()->user()->can('biodata-view')) {
            $can_view = "style='display:none;'";
        }
        if (!auth()->user()->can('biodata-approve')) {
            $can_approve = "style='display:none;'";
        }

        if ($page == 'incomplete') {
            $BioData = NewBiodata::where('status', '0')->where(['deleted' => '0'])->orderBy('id', 'DESC')->get();
            return DataTables::of($BioData)
                ->addColumn('name', function ($BioData) {
                    return $BioData->user()->name;
                })
                ->addColumn('email', function ($BioData) {
                    return $BioData->user()->email;
                })
                ->addColumn('phone', function ($BioData) {
                    return $BioData->user()->phone;
                })
                ->rawColumns(['name', 'email', 'phone'])
                ->addIndexColumn()
                ->make(true);
        } elseif ($page == 'pending') {
            $BioData = NewBiodata::where('status', '1')->where(['deleted' => '0'])->orderBy('id', 'DESC')->get();
        } elseif ($page == 'approved') {
            $BioData = NewBiodata::where('status', '2')->where(['deleted' => '0'])->orderBy('id', 'DESC')->get();
        } elseif ($page == 'suspected') {
            $BioData = NewBiodata::where('status', '3')->where(['deleted' => '0'])->orderBy('id', 'DESC')->get();
        } elseif ($page == 'married') {
            $BioData = NewBiodata::where('status', '4')->where(['deleted' => '0'])->orderBy('id', 'DESC')->get();
        } elseif ($page == 'deleted') {
            $BioData = NewBiodata::whereIn('status', ['2', '4'])->where(['deleted' => '1'])->orderBy('id', 'DESC')->get();
        }

        return DataTables::of($BioData)
            ->addColumn('name', function ($BioData) {
                return $BioData->general()->bride_groom == 'groom' ? $BioData->contact()->groom_name : $BioData->contact()->bride_name;
            })
            ->addColumn('parents', function ($BioData) {
                return __('site.father') . ": " . $BioData->family()->fathers_name . "<br>" . __('site.mother') . ": " . $BioData->family()->mothers_name;
            })
            ->addColumn('dateOfBirth', function ($BioData) {
                return Carbon::parse($BioData->general()->birthdate)->format('d M Y');
            })
            ->addColumn('contacts', function ($BioData) {
                return __("site.self") . ": <a href='tel:" . $BioData->personal()->phone_number . "'>" . $BioData->personal()->phone_number . "</a> <br/>" .
                    __("site.parents") . ": <a href='tel:" . $BioData->contact()->gurdian_phone . "'>" . $BioData->contact()->gurdian_phone . "</a><br/>" .
                    "Whatsapp: <a target='_BLANK' href='https://wa.me/" . $BioData->contact()->gurdian_whatsapp . "'>" . $BioData->contact()->gurdian_whatsapp . "</a><br/>" .
                    __("site.email") . ": <a href='mailto:" . $BioData->contact()->biodata_email . "'>" . $BioData->contact()->biodata_email . "</a>";
            })
            ->addColumn('status', function ($BioData) use ($can_approve) {

                if ($BioData->deleted == '1') {
                    return '<a class="badge badge-danger text-white">Deleted</a>';
                }

                if ($BioData->status == '1') {
                    $status = "Pending";
                } else if ($BioData->status == '2') {
                    $status = "Approved";
                } else if ($BioData->status == '3') {
                    $status = "Suspected";
                } else if ($BioData->status == '4') {
                    $status = "Married";
                } else {
                    $status = "UnKnown";
                }
                return '<a href="' . url('admin/biodata/edit_status') . '/' . $BioData->id . '" class="badge badge-danger" ' . $can_approve . ' >' . $status . '</a>';
            })
            ->addColumn('parmanent_address', function ($BioData) {
                $parmanent_zella = explode(',', $BioData->address()->parmanent_zella);
                foreach ($parmanent_zella as $key => $value) {
                    $parmanent_zella[$key] = __('districts.' . trim($value));
                }
                $parmanent_zella = implode(', ', array_reverse($parmanent_zella));
                return $parmanent_zella . "<br/>" . $BioData->address()->parmanent_address;
            })
            ->addColumn('presentAddress', function ($BioData) {
                return $BioData->address()->present_zella . ", " . $BioData->address()->present_address;
            })
            ->addColumn('submited_date', function ($BioData) {
                $date = date('d M Y', strtotime($BioData->created_at));
                return $date;
            })
            ->addColumn('delete_date', function ($BioData) {
                $date = date('d M Y', strtotime($BioData->updated_at));
                return $date;
            })
            ->addColumn('action', function ($BioData) use ($can_view, $can_edit, $can_approve, $can_delete) {
                $html = '<div class="btn-group">';

                $html .= '<a target="_BLANK" href=' . url('admin/biodata/view') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_view . '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';

                // $html .= '<a href=' . url('admin/biodata/edit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
                // $html .= '<a data-toggle="tooltip" ' .$can_approve. '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 approve" title="Approve"><i class="fas fa-check fa-fw"></i> </a>';

                if ($BioData->deleted != '1') {
                    $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
                }

                $html .= '</div>';
                return $html;
            })
            ->addColumn('note', function ($BioData) {
                return $BioData->note ?? "<span class='text-secondary'>None</span>";
            })
            ->rawColumns(['action', 'parmanent_address', 'presentAddress', 'note', 'submited_date', 'status', 'parents', 'contacts', 'delete_date'])
            ->addIndexColumn()
            ->make(true);
    }


    public function suspected()
    {
        $haspermision = auth()->user()->can('biodata-suspected');
        if ($haspermision) {
            $page_name = 'Suspected Biodata';
            $page = 'suspected';
            return view('backend.admin.biodata.index', compact('page_name', 'page'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function married()
    {
        $haspermision = auth()->user()->can('biodata-married');
        if ($haspermision) {
            $page_name = 'Married Biodata';
            $page = 'married';
            return view('backend.admin.biodata.index', compact('page_name', 'page'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function deleted()
    {
        $haspermision = auth()->user()->can('biodata-deleted');
        if ($haspermision) {
            $page_name = 'Deleted Biodata';
            $page = 'deleted';
            return view('backend.admin.biodata.index', compact('page_name', 'page'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function incomplete()
    {
        $haspermision = auth()->user()->can('biodata-incomplete');
        if ($haspermision) {
            $page_name = 'Incomplete Biodata';
            $page = 'incomplete';
            return view('backend.admin.biodata.index', compact('page_name', 'page'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }


    public function view($id)
    {
        $haspermision = auth()->user()->can('biodata-view') || auth()->user()->can('user-biodata-view');
        if ($haspermision) {
            $biodata = NewBiodata::find($id);
            return View::make('frontend_new.biodata_details.index', compact('biodata'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function edit($id)
    {
        $haspermision = auth()->user()->can('biodata-edit') || auth()->user()->can('user-biodata-edit');
        if ($haspermision) {
            $data = NewBiodata::find($id);
            if (!$data) {
                abort(404);
            }
            $page_name = 'Edit Biodata';
            $page = 'edit';
            // $user_info = Admin::where('id', $data->user_id)->first();
            return view('backend.admin.biodata.edit', compact('data', 'page_name', 'page'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }

    public function delete_modal($id, Request $request)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('biodata-delete') || auth()->user()->can('user-biodata-delete');
            if ($haspermision) {
                $data = BioData::findOrFail($id);

                $view = View::make('backend.admin.biodata.delete_modal', compact('data'))->render();
                return response()->json(['html' => $view]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    public function softdestroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = NewBiodata::findOrFail($id);
            $user = Auth::guard('admin')->user()->id;
            $haspermision = auth()->user()->can('biodata-delete') || auth()->user()->can('user-biodata-delete');
            if ($haspermision) {
                $data->deleted = "1";
                if ($request->has('delete_note')) {
                    $data->delete_note = $request->delete_note;
                }
                $data->save();
                return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
    public function edit_status($id)
    {
        $haspermision = auth()->user()->can('biodata-edit') || auth()->user()->can('user-biodata-edit');
        if ($haspermision) {
            $data = NewBiodata::find($id);
            if (!$data) {
                abort(404);
            }
            return view('backend.admin.biodata.edit_status', compact('data'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function update_status(Request $request, $id)
    {
        $request->validate([
            "status" => "required"
        ]);

        $haspermision = auth()->user()->can('biodata-edit') || auth()->user()->can('biodata-approve');

        if ($haspermision) {
            $data = NewBiodata::find($id);
            if (!$data) {
                abort(404);
            }
            $data->status = $request->status;
            $data->save();
            
            
            $user = User::find($data->user_id);
            // dd($user);
            // $user->connection = $request->connection;
            $user->connection = 10;
            $user->save(); 
            if ($request->status == "2") {
                try {
                    $text = "অভিনন্দন!<br/>
                        <a href='" . route('frontend.home') . "' href='_BLANK'>MuslimBiye.com.bd</a> - এ আপনার বায়োডাটা সফলভাবে এপ্রুভ হয়েছে।<br/>
                        
                        আপনি ১,০০০/- মূল্যের ১০টি কানেকশন উপহার পেয়েছেন!


                        আমরা দোয়া করি, আল্লাহ তাআ'লা আপনার জন্য উত্তম জীবনসঙ্গী সহজ করে দিন।<br/>

                        আপনার নিরাপত্তা ও প্রাইভেসি নিশ্চিত রাখতে, বিয়ের সিদ্ধান্ত চূড়ান্ত হলে অনুগ্রহ করে নিজ দায়িত্বে বায়োডাটা ডিলিট করুন।<br/>

                        যেকোনো সহায়তার জন্য 'মুসলিম বিয়ে' সবসময় আপনার পাশে আছে।";
                    Mail::to($data->user()->email)->send(new Common(["message" => $text]));
                } catch (\Throwable $th) {
                    //throw $th; 
                    dd($th);
                }
            }

            return redirect()->back()->with('success', 'Successfully Updated!');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }






    public function create()
    {
        $haspermision = auth()->user()->can('biodata-create');
        if ($haspermision) {
            $biodata = NewBiodata::where(['user_id' => Auth::guard('admin')->user()->id, 'deleted' => "0", 'admin_created' => '1', 'status' => '0'])->first();

            // dd(Auth::guard('admin')->user()->id);

            if (!$biodata) {
                return view('backend.admin.edit_biodata.terms');
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
            return view('backend.admin.edit_biodata.index', compact('biodata', 'general', 'address', 'education', 'family', 'personal', 'professional', 'marrage', 'expected', 'commitment', 'contact'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }



    // terms page
    public function biodata_store(Request $request)
    {
        $haspermision = auth()->user()->can('biodata-create');
        if ($haspermision) {
            $request->validate([
                "biodata_type" => "required|string",
                "term_1" => "required|string",
                "term_2" => "required|string",
                "term_3" => "required|string"
            ]);

            $page_id = 0;
            $user_id = Auth::guard('admin')->user()->id;

            $biodata = NewBiodata::updateOrCreate(
                ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
                [
                    "user_id" => $user_id,
                    'admin_created' => '1'
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
                return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
            }
            if ($data && $biodata) {
                return redirect()->back()->with(["page_id" => $page_id, 'success' => 'Successfully Stored']);
            } else {
                return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
            }
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
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

                $biodata->status = 2;
                $biodata->save();

                return true;
            }
        }
        return false;
    }


    public function general(Request $request)
    {

        // if ($request->has('biodata_type')) {
        //     $this->biodata($request);
        // }

        $request->validate([
            "bride_groom" => "required|string",
            "marital_status" => "required|string",
            "birthdate" => "required|string",
            "height" => "required|string",
            "complexion" => "required|string",
            "weight" => "required|string",
            "blood_group" => "required|string",
        ]);

        $request->validate([
            'birthdate' => ['required', function ($attribute, $value, $fail) {
                $birthdate = Carbon::createFromFormat('d/m/Y', $value);
                $age = $birthdate->age;

                if ($age < 18 || $age > 70) {
                    $fail('Marriage is only valid for ages between 18 and 70.');
                }
            }]
        ]);

        $page_id = $request->page_id ?? 0;
        $user_id = Auth::guard('admin')->user()->id;


        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
                "birthdate" => Carbon::createFromFormat('d/m/Y', $request->birthdate)->format('Y-m-d H:i:s'),
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;

        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;


        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;

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



        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;

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

        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;

        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;

        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;

        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;

        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
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
        $user_id = Auth::guard('admin')->user()->id;

        $biodata = NewBiodata::updateOrCreate(
            ["user_id" => $user_id, "deleted" => '0', 'admin_created' => '1', 'status' => '0'],
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
        if ($biodata->admin_created == '1') {
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted Successfully!');
        }
        if ($updateStatus) {
            return redirect()->route('admin.biodata.approved')->with('success', 'You\'r Biodata Has Been Submitted.');
        }
        if ($data && $biodata) {
            return redirect()->back()->with(["page_id" => $page_id, 'success' => 'Successfully Stored']);
        } else {
            return redirect()->back()->with("page_id", $page_id)->withErrors(['biodata' => 'Something Went Wrong']);
        }
    }









    // public function myDataEdit($id)
    // {
    //     $haspermision = auth()->user()->can('user-biodata-edit');
    //     if ($haspermision) {
    //         $data = BioData::where(['id' => $id, 'user_id' => Auth::user()->id])->first();
    //         if (!$data) {
    //             abort(404);
    //         }
    //         return view('backend.admin.biodata.edit', compact('data'));
    //     } else {
    //         abort(403, 'Sorry, you are not authorized to access the page');
    //     }
    // }
    // public function featured($id)
    // {
    //     $data = BioData::where('id', $id)->first();
    //     $data->featured = !$data->featured;
    //     $data->save();
    //     return redirect()->back();
    // }








    // public function request_pending()
    // {
    //     $haspermision = auth()->user()->can('biodata-request_pending');
    //     if ($haspermision) {
    //         return view('backend.admin.biodata.request_pending');
    //     } else {
    //         abort(403, 'Sorry, you are not authorized to access the page');
    //     }
    // }
    // public function request_delete()
    // {
    //     $haspermision = auth()->user()->can('biodata-request_delete');
    //     if ($haspermision) {
    //         return view('backend.admin.biodata.request_delete');
    //     } else {
    //         abort(403, 'Sorry, you are not authorized to access the page');
    //     }
    // }
    // public function my_biodata_pending()
    // {
    //     $haspermision = auth()->user()->can('user-biodata-pending');
    //     if ($haspermision) {
    //         return view('backend.admin.biodata.my_biodata_pending');
    //     } else {
    //         abort(403, 'Sorry, you are not authorized to access the page');
    //     }
    // }
    // public function my_biodataPrint($id)
    // {
    //     $haspermision = auth()->user()->can('biodata-download');
    //     if ($haspermision) {
    //         $biodata = BioData::where(["id" => $id, "status" => 1])->first()->toArray();
    //         // return view('backend.admin.biodata.pdf.base', $biodata);


    //         // $pdf = Pdf::loadView('backend.admin.biodata.pdf.base', $biodata);
    //         // $pdf->setPaper('A4', 'portrait');
    //         // return $pdf->download('biodata.pdf');


    //         $pdf = PDF::loadView('backend.admin.biodata.pdf.base', compact('biodata'));

    //         return $pdf->stream('biodata.pdf');
    //     } else {
    //         abort(403, 'Sorry, you are not authorized to access the page');
    //     }
    // }
    // public function ApproveIndex()
    // {
    //     $haspermision = auth()->user()->can('biodata-approve-view');
    //     if ($haspermision) {
    //         return view('backend.admin.biodata.approve');
    //     } else {
    //         abort(403, 'Sorry, you are not authorized to access the page');
    //     }
    // }
    // public function VerifyIndex()
    // {
    //     $haspermision = auth()->user()->can('biodata-verify-view');
    //     if ($haspermision) {
    //         return view('backend.admin.biodata.verify');
    //     } else {
    //         abort(403, 'Sorry, you are not authorized to access the page');
    //     }
    // }


    // public function request_pendingData()
    // {

    //     $can_edit = $can_view = $can_approve = $can_delete = '';
    //     if (!auth()->user()->can('biodata-edit')) {
    //         $can_edit = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-delete')) {
    //         $can_delete = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-view')) {
    //         $can_view = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-approve')) {
    //         $can_approve = "style='display:none;'";
    //     }
    //     $BioData = BioData::where('status', '6')->orderBy('id', 'DESC')->get();
    //     return DataTables::of($BioData)
    //         // ->addColumn('height', function ($BioData) {
    //         //     return $BioData->heightFt . " ft' " . $BioData->heightInch . " inch'";
    //         // })
    //         // ->addColumn('weight', function ($BioData) {
    //         //     return $BioData->weight . " KG ";
    //         // })
    //         ->addColumn('status', function ($BioData) {
    //             if ($BioData->status == 0) {
    //                 return '<span class="badge badge-danger">Pending</span>';
    //             } elseif ($BioData->status == 6) {
    //                 return '<span class="badge badge-danger">Requested for Edit</span>';
    //             } else {
    //                 return '<span class="badge badge-success">Approved</span>';
    //             }
    //         })
    //         ->addColumn('permanentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->permanentThana . ', District :' . $BioData->permanentDistrict;
    //         })
    //         ->addColumn('presentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->presentThana . ', District :' . $BioData->presentDistrict;
    //         })
    //         ->addColumn('submited_date', function ($BioData) {
    //             $date = date('d M Y, H:i:s', strtotime($BioData->created_at));
    //             return $date;
    //         })
    //         ->addColumn('action', function ($BioData) use ($can_view, $can_edit, $can_approve, $can_delete) {
    //             $html = '<div class="btn-group">';
    //             $html .= '<a href=' . url('admin/biodata/view') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_view . '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
    //             $html .= '<a href=' . url('admin/biodata/edit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
    //             // $html .= '<a data-toggle="tooltip" ' .$can_approve. '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 approve" title="Approve"><i class="fas fa-check fa-fw"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
    //             $html .= '</div>';
    //             return $html;
    //         })
    //         ->addColumn('note', function ($BioData) {
    //             return $BioData->note ?? "<span class='text-secondary'>None</span>";
    //         })
    //         ->rawColumns(['action', 'permanentAddress', 'presentAddress', 'note', 'submited_date', 'status'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }
    // public function request_deleteData()
    // {

    //     $can_edit = $can_view = $can_approve = $can_delete = '';
    //     if (!auth()->user()->can('biodata-edit')) {
    //         $can_edit = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-delete')) {
    //         $can_delete = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-view')) {
    //         $can_view = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-approve')) {
    //         $can_approve = "style='display:none;'";
    //     }
    //     $BioData = BioData::where('status', '7')->orderBy('id', 'DESC')->get();
    //     return DataTables::of($BioData)
    //         // ->addColumn('height', function ($BioData) {
    //         //     return $BioData->heightFt . " ft' " . $BioData->heightInch . " inch'";
    //         // })
    //         // ->addColumn('weight', function ($BioData) {
    //         //     return $BioData->weight . " KG ";
    //         // })
    //         ->addColumn('status', function ($BioData) {
    //             if ($BioData->status == 0) {
    //                 return '<span class="badge badge-danger">Pending</span>';
    //             } elseif ($BioData->status == 7) {
    //                 return '<span class="badge badge-danger">Requested for Delete</span>';
    //             } else {
    //                 return '<span class="badge badge-success">Approved</span>';
    //             }
    //         })
    //         ->addColumn('permanentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->permanentThana . ', District :' . $BioData->permanentDistrict;
    //         })
    //         ->addColumn('presentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->presentThana . ', District :' . $BioData->presentDistrict;
    //         })
    //         ->addColumn('submited_date', function ($BioData) {
    //             $date = date('d M Y, H:i:s', strtotime($BioData->created_at));
    //             return $date;
    //         })
    //         ->addColumn('action', function ($BioData) use ($can_view, $can_edit, $can_approve, $can_delete) {
    //             $html = '<div class="btn-group">';
    //             $html .= '<a href=' . url('admin/biodata/view') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_view . '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
    //             $html .= '<a href=' . url('admin/biodata/edit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
    //             // $html .= '<a data-toggle="tooltip" ' .$can_approve. '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 approve" title="Approve"><i class="fas fa-check fa-fw"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
    //             $html .= '</div>';
    //             return $html;
    //         })
    //         ->addColumn('note', function ($BioData) {
    //             return "<span class='font-weight-bold'>Admin Note:</span><br/>" . ($BioData->note ?? "<span class='text-secondary'>None</span>") .
    //                 "<br/><br/><span class='font-weight-bold'>User Note:</span><br/>" . ($BioData->delete_note ?? "<span class='text-secondary'>None</span>");
    //         })
    //         ->rawColumns(['action', 'permanentAddress', 'presentAddress', 'note', 'submited_date', 'status'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }
    // public function allMyData()
    // {
    //     $can_edit = $can_delete = '';
    //     if (!auth()->user()->can('user-biodata-edit')) {
    //         $can_edit = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('user-biodata-delete')) {
    //         $can_delete = "style='display:none;'";
    //     }
    //     $BioData = BioData::where('user_id', Auth::user()->id)->where('status', '1')->orderBy('id', 'DESC')->get();
    //     return DataTables::of($BioData)
    //         ->addColumn('status', function ($BioData) {
    //             if ($BioData->status == 0) {
    //                 return '<span class="badge badge-danger">Pending</span>';
    //             } elseif ($BioData->status == 1) {
    //                 return '<span class="badge badge-success">Approved</span>';
    //             }
    //         })
    //         ->addColumn('permanentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->permanentThana . ', District :' . $BioData->permanentDistrict;
    //         })
    //         ->addColumn('presentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->presentThana . ', District :' . $BioData->presentDistrict;
    //         })
    //         ->addColumn('action', function ($BioData) use ($can_edit, $can_delete) {
    //             $html = '<div class="btn-group">';
    //             $html .= '<a href=' . url('admin/biodata/data/myDataEdit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
    //             $html .= '<a href="' . route('admin.biodata.my_biodataPrint', $BioData->id) . '" data-toggle="tooltip"  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 view" title="Download Biodata"><i class="fa fa-download fa-fw"></i> </a>';
    //             $html .= '</div>';
    //             return $html;
    //         })
    //         ->rawColumns(['action', 'permanentAddress', 'presentAddress', 'status'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }
    // public function allMyDataPending()
    // {
    //     $can_edit = $can_delete = '';
    //     if (!auth()->user()->can('user-biodata-edit')) {
    //         $can_edit = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('user-biodata-delete')) {
    //         $can_delete = "style='display:none;'";
    //     }
    //     $BioData = BioData::where('status', '0')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
    //     return DataTables::of($BioData)
    //         ->addColumn('status', function ($BioData) {
    //             $html = '';
    //             if ($BioData->status == 0) {
    //                 $html .= '<span class="badge badge-danger">Pending</span>';
    //             } elseif ($BioData->status == 6) {
    //                 return '<span class="badge badge-danger">Requested for Edit</span>';
    //             } else {
    //                 $html .= '<span class="badge badge-success">Approved</span>';
    //             }
    //             if ($BioData->featured == 1) {
    //                 $html .= '<span class="badge mt-1 badge-info mt-1">Featured</span>';
    //             }
    //             if ($BioData->verify == 1) {
    //                 $html .= '<span class="badge mt-1 badge-primary">Verified </span>';
    //             }
    //             return $html;
    //         })
    //         ->addColumn('permanentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->permanentThana . ', District :' . $BioData->permanentDistrict;
    //         })
    //         ->addColumn('presentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->presentThana . ', District :' . $BioData->presentDistrict;
    //         })
    //         ->addColumn('action', function ($BioData) use ($can_edit, $can_delete) {
    //             $html = '<div class="btn-group">';
    //             $html .= '<a href=' . url('admin/biodata/data/myDataEdit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
    //             $html .= '</div>';
    //             return $html;
    //         })
    //         ->rawColumns(['action', 'permanentAddress', 'presentAddress', 'status'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }

    // public function myBiodataDistroy(Request $request, $id)
    // {
    //     if ($request->ajax()) {
    //         $haspermision = auth()->user()->can('user-biodata-delete');
    //         if ($haspermision) {
    //             $delte = BioData::findOrFail($id);
    //             if (auth()->user()->id = $delte->user_id) {
    //                 $delte->delete();
    //             } else {
    //                 abort(403, 'Sorry, you are not authorized to access the page');
    //             }
    //             return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
    //         } else {
    //             abort(403, 'Sorry, you are not authorized to access the page');
    //         }
    //     } else {
    //         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
    //     }
    // }
    // public function approveData()
    // {
    //     $can_edit = $can_view = $can_reverse = $can_delete = $can_download = '';
    //     if (!auth()->user()->can('biodata-edit')) {
    //         $can_edit = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-delete')) {
    //         $can_delete = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-view')) {
    //         $can_view = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-reverse')) {
    //         $can_reverse = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-download')) {
    //         $can_download = "style='display:none;'";
    //     }
    //     $BioData = BioData::with(['approveBy', 'verifyBy'])->where('status', '1')->orderBy('id', 'DESC')->get();
    //     return DataTables::of($BioData)
    //         // ->addColumn('height', function ($BioData) {
    //         //     return $BioData->heightFt . " ft' " . $BioData->heightInch . " inch'";
    //         // })
    //         // ->addColumn('weight', function ($BioData) {
    //         //     return $BioData->weight . " KG ";
    //         // })
    //         ->addColumn('status', function ($BioData) {
    //             $html = '';
    //             if ($BioData->status == 0) {
    //                 $html .= '<span class="badge badge-danger">Pending</span>';
    //             } elseif ($BioData->status == 6) {
    //                 return '<span class="badge badge-danger">Requested for Edit</span>';
    //             } else {
    //                 $html .= '<span class="badge badge-success">Approved by  ' . $BioData->approveBy[0]->name . '</span>';
    //             }
    //             if ($BioData->featured == 1) {
    //                 $html .= '<span class="badge mt-1 badge-info mt-1">Featured</span>';
    //             }
    //             if ($BioData->verify == 1) {
    //                 $html .= '<span class="badge mt-1 badge-primary">Verified by  ' . $BioData->verifyBy[0]->name . '</span>';
    //             }
    //             return $html;
    //         })
    //         ->addColumn('permanentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->permanentThana . ', District :' . $BioData->permanentDistrict;
    //         })
    //         ->addColumn('presentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->presentThana . ', District :' . $BioData->presentDistrict;
    //         })
    //         ->addColumn('note', function ($BioData) {
    //             return $BioData->note ?? "<span class='text-secondary'>None</span>";
    //         })
    //         ->addColumn('submited_date', function ($BioData) {
    //             $date = date('d M Y, H:i:s', strtotime($BioData->created_at));
    //             return $date;
    //         })
    //         ->addColumn('action', function ($BioData) use ($can_view, $can_edit, $can_delete, $can_reverse, $can_download) {
    //             $html = '<div class="btn-group">';
    //             $html .= '<a href=' . url('admin/biodata/view') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_view . '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';

    //             if ($BioData->featured) {
    //                 $html .= '<a href=' . url('admin/biodata/featured') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-warning margin-r-5 feature" title="Remove This Biodata from Featured Area"><i class="fa fa-star fa-fw"></i> </a>';
    //             } else {
    //                 $html .= '<a href=' . url('admin/biodata/featured') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-info margin-r-5 feature" title="Feature This Biodata"><i class="far fa-star fa-fw"></i> </a>';
    //             }


    //             $html .= '<a href=' . url('admin/biodata/edit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
    //             $html .= '<a href="' . route('admin.biodata.my_biodataPrint', $BioData->id) . '" data-toggle="tooltip" ' . $can_download . '  id="' . $BioData->id . '" class="btn btn-xs btn-warning margin-r-5 download" title="download"><i class="fas fa-download"></i> </a>';
    //             $html .= '</div>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_reverse . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 reverse" title="reverse"><i class="fas fa-undo"></i> </a>';
    //             $html .= '</div>';
    //             return $html;
    //         })
    //         ->rawColumns(['action', 'permanentAddress', 'presentAddress', 'submited_date', 'status', 'note'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }
    // public function VerifyData()
    // {
    //     $can_edit = $can_view = $can_delete = '';
    //     if (!auth()->user()->can('biodata-edit')) {
    //         $can_edit = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-delete')) {
    //         $can_delete = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-view')) {
    //         $can_view = "style='display:none;'";
    //     }
    //     $BioData = BioData::with(['approveBy', 'verifyBy'])->where('verify', '1')->where('status', '0')->where('status', '!=', '5')->orderBy('id', 'DESC')->get();

    //     return DataTables::of($BioData)
    //         // ->addColumn('height', function ($BioData) {
    //         //     return $BioData->heightFt . " ft' " . $BioData->heightInch . " inch'";
    //         // })
    //         // ->addColumn('weight', function ($BioData) {
    //         //     return $BioData->weight . " KG ";
    //         // })
    //         ->addColumn('status', function ($BioData) {
    //             $html = '';
    //             if ($BioData->status == 0) {
    //                 $html .= '<span class="badge badge-danger">Pending</span>';
    //             } elseif ($BioData->status == 6) {
    //                 return '<span class="badge badge-danger">Requested for Edit</span>';
    //             } else {
    //                 $html .= '<span class="badge badge-success">Approved by  ' . $BioData->approveBy[0]->name . '</span>';
    //             }
    //             if ($BioData->featured == 1) {
    //                 $html .= '<span class="badge mt-1 badge-info mt-1">Featured</span>';
    //             }
    //             if ($BioData->verify == 1) {
    //                 $html .= '<span class="badge mt-1 badge-primary">Verified by  ' . $BioData->verifyBy[0]->name . '</span>';
    //             }
    //             return $html;
    //         })
    //         ->addColumn('permanentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->permanentThana . ', District :' . $BioData->permanentDistrict;
    //         })
    //         ->addColumn('presentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->presentThana . ', District :' . $BioData->presentDistrict;
    //         })
    //         ->addColumn('note', function ($BioData) {
    //             return $BioData->note ?? "<span class='text-secondary'>None</span>";
    //         })
    //         ->addColumn('submited_date', function ($BioData) {
    //             $date = date('d M Y, H:i:s', strtotime($BioData->created_at));
    //             return $date;
    //         })
    //         ->addColumn('action', function ($BioData) use ($can_view, $can_edit, $can_delete) {
    //             $html = '<div class="btn-group">';
    //             $html .= '<a href=' . url('admin/biodata/view') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_view . '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';


    //             $html .= '<a href=' . url('admin/biodata/edit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
    //             $html .= '</div>';
    //             return $html;
    //         })
    //         ->rawColumns(['action', 'permanentAddress', 'presentAddress', 'submited_date', 'status', 'note'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }
    // public function trashData()
    // {

    //     $can_edit = $can_view = $can_delete = $can_reverse = '';
    //     if (!auth()->user()->can('biodata-edit')) {
    //         $can_edit = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-trash')) {
    //         $can_delete = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-view')) {
    //         $can_view = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('biodata-reverse')) {
    //         $can_reverse = "style='display:none;'";
    //     }

    //     $BioData = BioData::where('status', '5')->orderBy('id', 'DESC')->get();
    //     return DataTables::of($BioData)
    //         ->addColumn('status', function ($BioData) {
    //             if ($BioData->status == 0) {
    //                 return '<span class="badge badge-danger">Pending</span>';
    //             } else if ($BioData->status == 5) {
    //                 return '<span class="badge badge-danger">Trash</span>';
    //             } elseif ($BioData->status == 6) {
    //                 return '<span class="badge badge-danger">Requested for Edit</span>';
    //             } else {
    //                 return '<span class="badge badge-success">Approved</span>';
    //             }
    //         })
    //         ->addColumn('permanentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->permanentThana . ', District :' . $BioData->permanentDistrict;
    //         })
    //         ->addColumn('presentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->presentThana . ', District :' . $BioData->presentDistrict;
    //         })
    //         ->addColumn('submited_date', function ($BioData) {
    //             $date = date('d M Y, H:i:s', strtotime($BioData->created_at));
    //             return $date;
    //         })
    //         ->addColumn('action', function ($BioData) use ($can_view, $can_edit, $can_delete, $can_reverse) {
    //             $html = '<div class="btn-group">';
    //             $html .= '<a href=' . url('admin/biodata/view') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_view . '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
    //             $html .= '<a href=' . url('admin/biodata/edit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_reverse . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 reverse" title="reverse"><i class="fas fa-undo"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
    //             $html .= '</div>';
    //             return $html;
    //         })
    //         ->rawColumns(['action', 'permanentAddress', 'presentAddress', 'submited_date', 'status'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }
    // public function UsertrashData()
    // {

    //     $can_edit = $can_view = $can_delete = $can_reverse = '';

    //     if (!auth()->user()->can('user-biodata-view')) {
    //         $can_view = "style='display:none;'";
    //     }
    //     if (!auth()->user()->can('user-biodata-reverse')) {
    //         $can_reverse = "style='display:none;'";
    //     }

    //     $BioData = BioData::where('status', '5')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
    //     return DataTables::of($BioData)
    //         ->addColumn('status', function ($BioData) {
    //             if ($BioData->status == 0) {
    //                 return '<span class="badge badge-danger">Pending</span>';
    //             } else if ($BioData->status == 5) {
    //                 return '<span class="badge badge-danger">Trash</span>';
    //             } elseif ($BioData->status == 6) {
    //                 return '<span class="badge badge-danger">Requested for Edit</span>';
    //             } else {
    //                 return '<span class="badge badge-success">Approved</span>';
    //             }
    //         })
    //         ->addColumn('permanentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->permanentThana . ', District :' . $BioData->permanentDistrict;
    //         })
    //         ->addColumn('presentAddress', function ($BioData) {
    //             return 'Thana :' . $BioData->presentThana . ', District :' . $BioData->presentDistrict;
    //         })
    //         ->addColumn('submited_date', function ($BioData) {
    //             $date = date('d M Y, H:i:s', strtotime($BioData->created_at));
    //             return $date;
    //         })
    //         ->addColumn('action', function ($BioData) use ($can_view, $can_edit, $can_delete, $can_reverse) {
    //             $html = '<div class="btn-group">';
    //             $html .= '<a href=' . url('admin/biodata/view') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_view . '  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
    //             // $html .= '<a href=' . url('admin/biodata/edit') . '/' . $BioData->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $BioData->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
    //             $html .= '<a data-toggle="tooltip" ' . $can_reverse . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 reverse" title="reverse"><i class="fas fa-undo"></i> </a>';
    //             // $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
    //             $html .= '</div>';
    //             return $html;
    //         })
    //         ->rawColumns(['action', 'permanentAddress', 'presentAddress', 'submited_date', 'status'])
    //         ->addIndexColumn()
    //         ->make(true);
    // }
    // public function destroy(Request $request, $id)
    // {
    //     if ($request->ajax()) {
    //         $haspermision = auth()->user()->can('biodata-delete');
    //         if ($haspermision) {
    //             $delte = BioData::findOrFail($id);
    //             $delte->delete();
    //             return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
    //         } else {
    //             abort(403, 'Sorry, you are not authorized to access the page');
    //         }
    //     } else {
    //         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
    //     }
    // }

    // public function approve(Request $request, $id)
    // {
    //     if ($request->ajax()) {
    //         $haspermision = auth()->user()->can('biodata-approve');
    //         if ($haspermision) {
    //             $permission = BioData::findOrFail($id);
    //             $permission->update(['status' => '1']);
    //             return response()->json(['type' => 'success', 'message' => "Successfully Approved"]);
    //         } else {
    //             abort(403, 'Sorry, you are not authorized to access the page');
    //         }
    //     } else {
    //         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
    //     }
    // }
    // public function reverse(Request $request, $id)
    // {
    //     if ($request->ajax()) {
    //         $haspermision = auth()->user()->can('biodata-reverse') || auth()->user()->can('user-biodata-reverse');
    //         if ($haspermision) {
    //             $permission = BioData::findOrFail($id);
    //             $user = Auth::guard('admin')->user()->id;
    //             $status = $permission->status;
    //             $verify = $permission->verify;
    //             if ($user == $permission->user_id) {
    //                 if ($status == 5) {
    //                     $permission->update(['status' => '6', 'verify' => '0']);
    //                 }
    //             } else {
    //                 if ($status == 1 && $verify == 1) {
    //                     $permission->update(['status' => '0']);
    //                 } elseif ($status == 5) {
    //                     $permission->update(['status' => '0', 'verify' => '0']);
    //                 }
    //             }
    //             return response()->json(['type' => 'success', 'message' => "Successfully Approved"]);
    //         } else {
    //             abort(403, 'Sorry, you are not authorized to access the page');
    //         }
    //     } else {
    //         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
    //     }
    // }
    // public function update(Request $request, $id)
    // {

    //     if ($request->biodata_form_type == 'general') {
    //         $request->validate([
    //             "biodata_type" => "required|string",
    //             "bride_groom" => "required|string",
    //             "marital_status" => "required|string",
    //             "birthdate" => "required|string",
    //             "height" => "required|string",
    //             "complexion" => "required|string",
    //             "weight" => "required|string",
    //             "blood_group" => "required|string",
    //         ]);


    //         BiodataGeneralInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "biodata_type" => $request->biodata_type,
    //                 "bride_groom" => $request->bride_groom,
    //                 "marital_status" => $request->marital_status,
    //                 "birthdate" => Carbon::parse($request->birthdate)->toDateTimeString(),
    //                 "height" => $request->height,
    //                 "complexion" => $request->complexion,
    //                 "weight" => $request->weight,
    //                 "blood_group" => $request->blood_group,
    //             ]
    //         );

    //         return redirect()->back()->with(['next' => 'address', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'address') {
    //         $request->validate([
    //             "parmanent_zella" => "required|string",
    //             "parmanent_address" => "required|string",
    //             "where_raised" => "required|string",
    //         ]);


    //         BiodataAddressInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "parmanent_zella" => $request->parmanent_zella,
    //                 "parmanent_address" => $request->parmanent_address,
    //                 "present_address_same" => $request->present_address_same,
    //                 "present_zella" => $request->present_address_same != 'on' ? $request->present_zella : $request->parmanent_zella,
    //                 "present_address" => $request->present_address_same != 'on' ? $request->present_address : $request->parmanent_address,
    //                 "where_raised" => $request->where_raised,
    //             ]
    //         );

    //         return redirect()->back()->with(['next' => 'education', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'education') {
    //         BiodataEducationInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "education_medium" => $request->education_medium ?? null,
    //                 "general_highest_education" => $request->general_highest_education ?? null,
    //                 "general_highest_school_study" => $request->general_highest_school_study ?? null,
    //                 "ssc_year" => $request->ssc_year ?? null,
    //                 "ssc_dept" => $request->ssc_dept ?? null,
    //                 "ssc_result" => $request->ssc_result ?? null,
    //                 "hsc_study_running" => $request->hsc_study_running ?? null,
    //                 "study_after_ssc" => $request->study_after_ssc ?? null,
    //                 "hsc_pass_year" => $request->hsc_pass_year ?? null,
    //                 "hsc_dept" => $request->hsc_dept ?? null,
    //                 "hsc_result" => $request->hsc_result ?? null,
    //                 "diploma_subject" => $request->diploma_subject ?? null,
    //                 "diploma_institution" => $request->diploma_institution ?? null,
    //                 "diploma_current_year" => $request->diploma_current_year ?? null,
    //                 "diploma_passing_year" => $request->diploma_passing_year ?? null,
    //                 "honors_subject" => $request->honors_subject ?? null,
    //                 "honors_instutution" => $request->honors_instutution ?? null,
    //                 "honors_passing_year" => $request->honors_passing_year ?? null,
    //                 "honors_study_year" => $request->honors_study_year ?? null,
    //                 "masters_subject" => $request->masters_subject ?? null,
    //                 "masters_institution" => $request->masters_institution ?? null,
    //                 "masters_passing_year" => $request->masters_passing_year ?? null,
    //                 "doctorate_subject" => $request->doctorate_subject ?? null,
    //                 "doctorate_institution" => $request->doctorate_institution ?? null,
    //                 "doctorate_passing_year" => $request->doctorate_passing_year ?? null,
    //                 "qawmi_education_qualification" => $request->qawmi_education_qualification ?? null,
    //                 "ibtedai_madrasa" => $request->ibtedai_madrasa ?? null,
    //                 "mutawassitah_madrasa" => $request->mutawassitah_madrasa ?? null,
    //                 "sanabia_ulya_madrasa" => $request->sanabia_ulya_madrasa ?? null,
    //                 "fazilat_madrasa" => $request->fazilat_madrasa ?? null,
    //                 "takmil_madrasa" => $request->takmil_madrasa ?? null,
    //                 "takhassus_madrasa" => $request->takhassus_madrasa ?? null,
    //                 "qawmi_result" => $request->qawmi_result ?? null,
    //                 "qawmi_passing_year" => $request->qawmi_passing_year ?? null,
    //                 "takhassus_subject" => $request->takhassus_subject ?? null,
    //                 "takhassus_result" => $request->takhassus_result ?? null,
    //                 "takhassus_passing_year" => $request->takhassus_passing_year ?? null,
    //                 "others_educational_qualifications" => $request->others_educational_qualifications ?? null,
    //                 "deen_designations" => $request->deen_designations ?? null,
    //             ]
    //         );

    //         return redirect()->back()->with(['next' => 'family', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'family') {
    //         // dd($request->all());
    //         $request->validate([
    //             "fathers_name" => "required|string",
    //             "father_status" => "required|string",
    //             "father_profession" => "required|string",
    //             "mothers_name" => "required|string",
    //             "mother_status" => "required|string",
    //             "mother_profession" => "required|string",
    //             "total_brother" => "required|string",
    //             "total_sister" => "required|string",
    //             // "total_paternal_uncle" => "required|string",
    //             // "total_maternal_uncle" => "required|string",
    //             "family_status" => "required|string",
    //             "financial_status" => "required|string",
    //             // "family_environment" => "required|string",
    //         ]);

    //         if ($request->total_brother != "0") {
    //             $request->validate([
    //                 "brother_names.*" => "required|string",
    //                 "brother_educations.*" => "required|string",
    //                 "brother_jobs.*" => "required|string",
    //                 "brother_merital_status.*" => "required|string",
    //             ]);
    //         }
    //         if ($request->total_sister != "0") {
    //             $request->validate([
    //                 "sister_names.*" => "required|string",
    //                 "sister_educations.*" => "required|string",
    //                 "sister_jobs.*" => "required|string",
    //                 "sister_merital_status.*" => "required|string",
    //             ]);
    //         }
    //         if ($request->has('total_paternal_uncle')) {
    //             if ($request->total_paternal_uncle != "0") {
    //                 $request->validate([
    //                     "paternal_uncle_names.*" => "required|string",
    //                     "paternal_uncle_educations.*" => "required|string",
    //                     "paternal_uncle_jobs.*" => "required|string",
    //                     "paternal_uncle_merital_status.*" => "required|string",
    //                 ]);
    //             }
    //         }
    //         if ($request->has('total_maternal_uncle')) {
    //             if ($request->total_maternal_uncle != "0") {
    //                 $request->validate([
    //                     "maternal_uncle_names.*" => "required|string",
    //                     "maternal_uncle_educations.*" => "required|string",
    //                     "maternal_uncle_jobs.*" => "required|string",
    //                     "maternal_uncle_merital_status.*" => "required|string",
    //                 ]);
    //             }
    //         }


    //         $brothers = [];
    //         $sisters = [];
    //         $paternal_uncles = [];
    //         $maternal_uncles = [];



    //         if (
    //             $request->has('brother_names') &&
    //             $request->has('brother_educations') &&
    //             $request->has('brother_jobs') &&
    //             $request->has('brother_merital_status')
    //         ) {
    //             foreach ($request->brother_names as $key => $name) {
    //                 $array_data = [
    //                     "name" => $name,
    //                     "education" => array_key_exists($key, $request->brother_educations) ? $request->brother_educations[$key] : null,
    //                     "job" => array_key_exists($key, $request->brother_jobs) ? $request->brother_jobs[$key] : null,
    //                     "merital_status" => array_key_exists($key, $request->brother_merital_status) ? $request->brother_merital_status[$key] : null,
    //                 ];
    //                 array_push($brothers, $array_data);
    //             }
    //         }


    //         if (
    //             $request->has('sister_names') &&
    //             $request->has('sister_educations') &&
    //             $request->has('sister_jobs') &&
    //             $request->has('sister_merital_status')
    //         ) {
    //             foreach ($request->sister_names as $key => $name) {
    //                 $array_data = [
    //                     "name" => $name,
    //                     "education" => array_key_exists($key, $request->sister_educations) ? $request->sister_educations[$key] : null,
    //                     "job" => array_key_exists($key, $request->sister_jobs) ? $request->sister_jobs[$key] : null,
    //                     "merital_status" => array_key_exists($key, $request->sister_merital_status) ? $request->sister_merital_status[$key] : null,
    //                 ];
    //                 array_push($sisters, $array_data);
    //             }
    //         }

    //         if ($request->has('total_paternal_uncle')) {
    //             if (
    //                 $request->has('paternal_uncle_names') &&
    //                 $request->has('paternal_uncle_educations') &&
    //                 $request->has('paternal_uncle_jobs') &&
    //                 $request->has('paternal_uncle_merital_status')
    //             ) {
    //                 foreach ($request->paternal_uncle_names as $key => $name) {
    //                     $array_data = [
    //                         "name" => $name,
    //                         "education" => array_key_exists($key, $request->paternal_uncle_educations) ? $request->paternal_uncle_educations[$key] : null,
    //                         "job" => array_key_exists($key, $request->paternal_uncle_jobs) ? $request->paternal_uncle_jobs[$key] : null,
    //                         "merital_status" => array_key_exists($key, $request->paternal_uncle_merital_status) ? $request->paternal_uncle_merital_status[$key] : null,
    //                     ];
    //                     array_push($paternal_uncles, $array_data);
    //                 }
    //             }
    //         }
    //         if ($request->has('total_maternal_uncle')) {
    //             if (
    //                 $request->has('maternal_uncle_names') &&
    //                 $request->has('maternal_uncle_educations') &&
    //                 $request->has('maternal_uncle_jobs') &&
    //                 $request->has('maternal_uncle_merital_status')
    //             ) {
    //                 foreach ($request->maternal_uncle_names as $key => $name) {
    //                     $array_data = [
    //                         "name" => $name,
    //                         "education" => array_key_exists($key, $request->maternal_uncle_educations) ? $request->maternal_uncle_educations[$key] : null,
    //                         "job" => array_key_exists($key, $request->maternal_uncle_jobs) ? $request->maternal_uncle_jobs[$key] : null,
    //                         "merital_status" => array_key_exists($key, $request->maternal_uncle_merital_status) ? $request->maternal_uncle_merital_status[$key] : null,
    //                     ];
    //                     array_push($maternal_uncles, $array_data);
    //                 }
    //             }
    //         }

    //         BiodataFamilyInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [

    //                 "fathers_name" => $request->fathers_name,
    //                 "father_status" => $request->father_status,
    //                 "father_profession" => $request->father_profession,

    //                 "mothers_name" => $request->mothers_name,
    //                 "mother_status" => $request->mother_status,
    //                 "mother_profession" => $request->mother_profession,

    //                 "total_brother" => $request->total_brother,
    //                 "total_sister" => $request->total_sister,
    //                 "total_paternal_uncle" => $request->total_paternal_uncle,
    //                 "total_maternal_uncle" => $request->total_maternal_uncle,

    //                 "family_status" => $request->family_status,
    //                 "financial_status" => $request->financial_status,
    //                 "family_environment" => $request->family_environment,

    //                 "brothers" => json_encode($brothers),
    //                 "sisters" => json_encode($sisters),
    //                 "paternal_uncles" => json_encode($paternal_uncles),
    //                 "maternal_uncles" => json_encode($maternal_uncles),
    //             ]
    //         );

    //         return redirect()->back()->with(['next' => 'personal', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'personal') {

    //         // Handle the image upload
    //         if ($request->hasFile('photo')) {
    //             $request->validate([
    //                 'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //             ]);
    //             $image = $request->file('photo');
    //             $imageName = time() . '.' . $image->getClientOriginalExtension();

    //             // Store the image in the 'images' directory
    //             $path = $image->storeAs('images', $imageName, 'public');
    //         }

    //         $data = BiodataPersonalInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "dressup" => $request->dressup,
    //                 "niqab_info" => $request->niqab_info,
    //                 "beard_info" => $request->beard_info,
    //                 "above_ankle_info" => $request->above_ankle_info,
    //                 "namaz_info" => $request->namaz_info,
    //                 "namaz_waqt_info" => $request->namaz_waqt_info,
    //                 "mahram_info" => $request->mahram_info,
    //                 "quran_info" => $request->quran_info,
    //                 "fiqh_info" => $request->fiqh_info,
    //                 "enternainment_info" => $request->enternainment_info,
    //                 "disablity_info" => $request->disablity_info,
    //                 "deen_mehnot_info" => $request->deen_mehnot_info,
    //                 "mazar_concept_info" => $request->mazar_concept_info,
    //                 "islami_books" => $request->islami_books,
    //                 "favourite_alem" => $request->favourite_alem,
    //                 "person_category" => json_encode($request->person_category ?? []),
    //                 "become_muslim" => $request->become_muslim,
    //                 "hobby" => $request->hobby,
    //                 "phone_number" => $request->phone_number,
    //                 // "photo" => $path,
    //             ]
    //         );

    //         if ($request->hasFile('photo')) {
    //             $data->photo = $path;
    //             $data->save();
    //         }



    //         return redirect()->back()->with(['next' => 'professional', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'professional') {
    //         $request->validate([
    //             "profession" => "required|string",
    //             "profession_details" => "required|string",
    //             "monthly_income" => "required|string",
    //         ]);


    //         BiodataProfessionalInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "profession" => $request->profession,
    //                 "profession_details" => $request->profession_details,
    //                 "monthly_income" => $request->monthly_income
    //             ]
    //         );



    //         return redirect()->back()->with(['next' => 'marrage', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'marrage') {
    //         BiodataMarrageInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "wife_died_reason" => $request->wife_died_reason ?? null,
    //                 "why_marry_after_marrage" => $request->why_marry_after_marrage ?? null,
    //                 "wife_and_childrens" => $request->wife_and_childrens ?? null,
    //                 "wife_cover" => $request->wife_cover ?? null,
    //                 "wife_study" => $request->wife_study ?? null,
    //                 "wife_job" => $request->wife_job ?? null,
    //                 "where_live" => $request->where_live ?? null,
    //                 "expectetions_from_wife" => $request->expectetions_from_wife ?? null,
    //                 "husband_died_reason" => $request->husband_died_reason ?? null,
    //                 "job_interested" => $request->job_interested ?? null,
    //                 "continue_study" => $request->continue_study ?? null,
    //                 "continue_job" => $request->continue_job ?? null,
    //                 "marrage_divorce_date_reason" => $request->marrage_divorce_date_reason ?? null,
    //                 "guardian_accept" => $request->guardian_accept ?? null,
    //                 "marrage_concept" => $request->marrage_concept ?? null,
    //             ]
    //         );



    //         return redirect()->back()->with(['next' => 'expected', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'expected') {
    //         BiodataExpectedInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "expected_age" => $request->expected_age,
    //                 "expected_complexion" => $request->expected_complexion,
    //                 "expected_height" => $request->expected_height,
    //                 "expected_education" => $request->expected_education,
    //                 "expect_district" => $request->expect_district,
    //                 "groom_expected_marital_status" => $request->groom_expected_marital_status,
    //                 "bride_expected_marital_status" => $request->bride_expected_marital_status,
    //                 "expected_profession" => $request->expected_profession,
    //                 "expected_financial_status" => $request->expected_financial_status,
    //                 "expected_features" => $request->expected_features,
    //             ]
    //         );



    //         return redirect()->back()->with(['next' => 'commitment', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'commitment') {
    //         BiodataCommitmentInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "gurdian_aknowledgement" => $request->gurdian_aknowledgement,
    //                 "all_data_valid" => $request->all_data_valid,
    //                 "responsibility" => $request->responsibility,
    //             ]
    //         );



    //         return redirect()->back()->with(['next' => 'contact', 'success' => 'Successful!']);
    //     } elseif ($request->biodata_form_type == 'contact') {
    //         BiodataContactInfo::updateOrCreate(
    //             ["biodata_id" => $id],
    //             [
    //                 "bride_name" => $request->bride_name,
    //                 "groom_name" => $request->groom_name,
    //                 "gurdian_phone" => $request->gurdian_phone,
    //                 "gurdian_whatsapp" => $request->gurdian_whatsapp,
    //                 "gurdian_name" => $request->gurdian_name,
    //                 "gurdian_relation" => $request->gurdian_relation,
    //                 "biodata_email" => $request->biodata_email,
    //             ]
    //         );



    //         return redirect()->back()->with(['next' => 'contact', 'success' => 'Successful!']);
    //     }
    // }
}

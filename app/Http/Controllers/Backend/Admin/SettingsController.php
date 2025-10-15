<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use DB;
use View;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        return view('backend.admin.setting.index', compact('settings'));
    }

    public function getAll()
    {

        $can_edit = $can_delete = '';
        if (!auth()->user()->can('settings-update')) {
            $can_edit = "style='display:none;'";
        }
        if (!auth()->user()->can('settings-delete')) {
            $can_delete = "style='display:none;'";
        }

        $settings = Setting::all();
        return DataTables::of($settings)
            ->addColumn('layout', function ($settings) {
                return $settings->layout ? '<span class="label label-success">Fullwidth</span>' : '<span class="label label-danger">Boxed</span>';
            })
            ->addColumn('action', function ($settings) use ($can_edit, $can_delete) {
                $html = '<div class="btn-group">';
                $html .= '<a data-toggle="tooltip"  id="' . $settings->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
                $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $settings->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['action', 'layout'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('settings-read');
            if ($haspermision) {
                $settings = Setting::findOrFail($id);
                $view = View::make('backend.admin.setting.view', compact('settings'))->render();
                return response()->json(['html' => $view]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Setting $setting)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('settings-create');
            if ($haspermision) {
                $settings = Setting::findOrFail($setting->id);
                $view = View::make('backend.admin.setting.edit', compact('settings'))->render();
                return response()->json(['html' => $view]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('settings-create');
            if ($haspermision) {

                $settings = Setting::findOrFail($setting->id);
                $logo = $settings->logo;
                $footer_logo = $settings->footer_logo;
                $favicon = $settings->favicon;


                if ($request->hasFile('footer_logo')) {
                    $extensionLogo_footer_logo = strtolower($request->file('footer_logo')->getClientOriginalExtension());
                    if ($extensionLogo_footer_logo == "jpg" || $extensionLogo_footer_logo == "jpeg" || $extensionLogo_footer_logo == "png" || $extensionLogo == "svg") {
                        if ($request->file('footer_logo')->isValid()) {
                            $destinationLogoPath = storage_path('assets/images/logo');
                            $logoNamefooter_logo = time() . '.' . $extensionLogo_footer_logo; // renameing image
                            $footer_logo = 'assets/images/logo/' . $logoNamefooter_logo;
                            $request->file('footer_logo')->move($destinationLogoPath, $logoNamefooter_logo); // uploading file to given path

                        } else {
                            return response()->json([
                                'type' => 'error',
                                'message' => "<div class='alert alert-warning'>File is not valid</div>",
                            ]);
                        }
                    } else {
                        return response()->json([
                            'type' => 'error',
                            'message' => "<div class='alert alert-warning'>Error! File type is not valid</div>",
                        ]);
                    }
                }
                if ($request->hasFile('logo')) {
                    $extensionLogo = strtolower($request->file('logo')->getClientOriginalExtension());
                    if ($extensionLogo == "jpg" || $extensionLogo == "jpeg" || $extensionLogo == "png" || $extensionLogo == "svg") {
                        if ($request->file('logo')->isValid()) {
                            $destinationLogoPath = storage_path('assets/images/logo');
                            $logoName = time() . '.' . $extensionLogo; // renameing image
                            $logo = 'assets/images/logo/' . $logoName;
                            $request->file('logo')->move($destinationLogoPath, $logoName); // uploading file to given path

                        } else {
                            return response()->json([
                                'type' => 'error',
                                'message' => "<div class='alert alert-warning'>File is not valid</div>",
                            ]);
                        }
                    } else {
                        return response()->json([
                            'type' => 'error',
                            'message' => "<div class='alert alert-warning'>Error! File type is not valid</div>",
                        ]);
                    }
                }

                if ($request->hasFile('favicon')) {
                    $extensionFav = strtolower($request->file('favicon')->getClientOriginalExtension());
                    if ($extensionFav == "jpg" || $extensionFav == "jpeg" || $extensionFav == "png") {
                        if ($request->file('favicon')->isValid()) {
                            $destinationFavPath = public_path('assets/images/logo');
                            $fileFavName = time() . '.' . $extensionFav; // renameing image
                            $favicon = 'assets/images/logo/' . $fileFavName;
                            $request->file('favicon')->move($destinationFavPath, $fileFavName); // uploading file to given path

                        } else {
                            return response()->json([
                                'type' => 'error',
                                'message' => "<div class='alert alert-warning'>File is not valid</div>",
                            ]);
                        }
                    } else {
                        return response()->json([
                            'type' => 'error',
                            'message' => "<div class='alert alert-warning'>Error! File type is not valid</div>",
                        ]);
                    }
                }


                $settings->name = $request->input('name');
                $settings->email = $request->input('email');
                $settings->contact = $request->input('contact');
                $settings->address = $request->input('address');
                $settings->logo = $logo;
                $settings->footer_logo = $footer_logo;
                $settings->favicon = $favicon;
                $settings->social_facebook = $request->input('social_facebook');
                $settings->social_linkedin = $request->input('social_linkedin');
                $settings->social_insta = $request->input('social_insta');
                $settings->social_youtube = $request->input('social_youtube');
                $settings->ytLink = $request->input('ytLink');
                // $settings->description = $request->input('description');
                $settings->show_statistics = $request->input('show_statistics');
                $settings->created_at = Carbon::now();
                $settings->updated_at = Carbon::now();
                $settings->save();
                return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Setting $setting)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('settings-delete');
            if ($haspermision) {
                $setting->delete();
                return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    public function page_content()
    {
        $content = PageContent::first();
        return view('backend.admin.setting.page_content', compact('content'));
    }
    public function page_content_update(Request $request)
    {
        $haspermision = auth()->user()->can('settings-page');
        if ($haspermision) {

            $PageContent= PageContent::first();
            if($PageContent !=null){
                $store =$PageContent;
            }else{
                $store = new PageContent();
            }
            $store->about_us = $request->about_us;
            $store->about_us_en = $request->about_us_en;
            $store->terms = $request->terms;
            $store->mission = $request->mission;
            $store->vision = $request->vision;
            $store->admin_info = $request->admin_info;
            $store->privacy_policy = $request->privacy_policy;
            $store->refund_policy = $request->refund_policy;
            $store->achievement = $request->achievement;
            $store->save();
            return redirect()->back()->with('success','Successfully Publish');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
}

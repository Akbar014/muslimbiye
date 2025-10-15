<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $haspermision = auth()->user()->can('success-index');
        if ($haspermision) {
            return view('backend.admin.success.index');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function getAll()
    {

        $can_edit = $can_view = $can_approve = $can_delete = '';
        if (!auth()->user()->can('success-edit')) {
            $can_edit = "style='display:none;'";
        }
        if (!auth()->user()->can('success-delete')) {
            $can_delete = "style='display:none;'";
        }
        if (!auth()->user()->can('success-view')) {
            $can_view = "style='display:none;'";
        }
        if (!auth()->user()->can('success-approve')) {
            $can_approve = "style='display:none;'";
        }
        $Data = SuccessStory::with('admins')->latest()->get();
        return DataTables::of($Data)
            ->addColumn('status', function ($Data) {
                if ($Data->status == 0) {
                    return '<span class="badge badge-danger">Pending</span>';
                } else {
                    return '<span class="badge badge-success">Approve</span>';
                }
            })
            ->addColumn('name', function ($Data) {
                return $Data->admins[0]->name;
            })
            ->addColumn('action', function ($Data) use ($can_view, $can_edit, $can_approve, $can_delete) {
                $html = '<div class="btn-group">';
                $html .= '<a href=' . url('admin/success/view') . '/' . $Data->id . ' data-toggle="tooltip" ' . $can_view . '  id="' . $Data->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
                $html .= '<a href=' . url('admin/success/edit') . '/' . $Data->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $Data->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
                if($Data->status == 0){
                    $html .= '<a data-toggle="tooltip" ' .$can_approve. '  id="' . $Data->id . '" class="btn btn-xs btn-success margin-r-5 approve" title="Pending"><i class="fas fa-check fa-fw"></i> </a>';
                }
                $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $Data->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['name','action', 'status'])
            ->addIndexColumn()
            ->make(true);
    }
    public function edit($id)
    {
        $haspermision = auth()->user()->can('success-edit');
        if ($haspermision) {
            $data = SuccessStory::find($id);
            return view('backend.admin.success.edit',compact('data'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function view($id)
    {
        $haspermision = auth()->user()->can('success-edit');
        if ($haspermision) {
            $data = SuccessStory::find($id);
            return view('backend.admin.success.view',compact('data'));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function create()
    {
        $haspermision = auth()->user()->can('success-create');
        if ($haspermision) {
            return view('backend.admin.success.create');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function store(Request $request)
    {
            $haspermision = auth()->user()->can('success-create');
            if ($haspermision) {
                $store = new SuccessStory();
                $store->user_id =Auth::user()->id;
                $store->title =$request->title;
                $store->story =$request->story;
                $store->status =$request->status;

                if ($request->hasFile('image')) {
                    if ($request->file('image')->isValid()) {
                        $destinationPath = storage_path('assets/images/successStory/');
                        $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                        $fileName = time() . '.' . $extension;
                        $file_path = 'storage/assets/images/successStory/' . $fileName;
                        $request->file('image')->move($destinationPath, $fileName);
                    } else {
                        return response()->json([
                            'type' => 'error',
                            'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                        ]);
                    }
                }
                $store->image = $file_path ?? $store->image;

                $store->save();
                return redirect()->route('admin.success.index')->with('success','Successfully Publish');
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }

    }
    public function update(Request $request,$id)
    {
            $haspermision = auth()->user()->can('success-edit');
            if ($haspermision) {
                $store = SuccessStory::find($id);
                $store->user_id =Auth::user()->id;
                $store->title =$request->title;
                $store->story =$request->story;
                $store->status =$request->status;
                if ($request->hasFile('image')) {
                    if ($request->file('image')->isValid()) {
                        $destinationPath = storage_path('assets/images/successStory/');
                        $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                        $fileName = time() . '.' . $extension;
                        $file_path = 'storage/assets/images/successStory/' . $fileName;
                        if($store->image) {
                            unlink(storage_path(substr($store->image, 8)));
                        }
                        $request->file('image')->move($destinationPath, $fileName);
                    } else {
                        return response()->json([
                            'type' => 'error',
                            'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                        ]);
                    }
                }
                $store->image = $file_path ?? $store->image;
                $store->save();
                return redirect()->route('admin.success.index')->with('success','Successfully Updated');
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }

    }
    public function approve(Request $request, $id)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('success-approve');
            if ($haspermision) {
                $permission = SuccessStory::findOrFail($id);
                $permission->update(['status' => '1']);
                return response()->json(['type' => 'success', 'message' => "Successfully Approve"]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('success-delete');
            if ($haspermision) {
                $delte = SuccessStory::findOrFail($id);
                $delte->delete();
                return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}

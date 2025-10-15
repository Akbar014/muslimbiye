<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Packages;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PackagesController extends Controller
{
    public function index()
    {
        $haspermision = auth()->user()->can('packages-read');
        if ($haspermision) {
            return view('backend.admin.packages.index');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function getAll()
    {

        $can_edit = $can_view = $can_approve = $can_delete = '';
        if (!auth()->user()->can('package-update')) {
            $can_edit = "style='display:none;'";
        }
        if (!auth()->user()->can('packages-delete')) {
            $can_delete = "style='display:none;'";
        }
        $Data = Packages::all();
        return DataTables::of($Data)
            ->addColumn('status', function ($Data) {
                if ($Data->status == 0) {
                    return '<span class="badge badge-danger">Inactive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }
            })
            ->addColumn('price', function ($Data) {
                return "৳ " . $Data->price;
            })
            ->addColumn('connection_amount', function ($Data) {
                return "Total <b>$Data->connection_amount</b> connections";
            })
            ->addColumn('action', function ($Data) use ($can_view, $can_edit, $can_approve, $can_delete) {
                $html = '<div class="btn-group">';
                $html .= '<a href=' . url('admin/packages/edit') . '/' . $Data->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $Data->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
                $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $Data->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['price', 'action', 'status', 'connection_amount'])
            ->addIndexColumn()
            ->make(true);
    }
    public function edit(Request $request, $id)
    {
        $haspermision = auth()->user()->can('package-update');
        if ($haspermision) {
            $data = Packages::find($id);
            if ($data) {
                return view('backend.admin.packages.create', compact('data'));
            } else {
                return abort(404);
            }
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function create()
    {
        $haspermision = auth()->user()->can('packages-create');
        if ($haspermision) {
            return view('backend.admin.packages.create');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function store(Request $request)
    {
        $haspermision = auth()->user()->can('packages-create');
        if ($haspermision) {
            return $this->update($request);
            return redirect()->route('admin.packages.index')->with('success', 'Successfully Publish');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function update(Request $request, $id=null)
    {
        $haspermision = auth()->user()->can('package-update');
        if ($haspermision) {
            $request->validate([
                "name" => "required|string",
                "connection_amount" => "required|integer",
                "price" => "required|integer",
                "status" => "required|integer",
            ]);

            if ($id) {
                $packages = Packages::find($id);
            } else {
                $packages = new Packages();
            }

            $packages->name = $request->name;
            $packages->connection_amount = $request->connection_amount;
            $packages->price = $request->price;
            $packages->status = $request->status;

            $packages->save();

            return redirect()->route('admin.packages.index')->with('success', 'Successfully Updated');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('packages-delete');
            if ($haspermision) {
                $delete = Packages::findOrFail($id);
                $delete->delete();
                return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}

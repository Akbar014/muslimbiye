<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{
    public function index()
    {
        $haspermision = auth()->user()->can('coupons-read');
        if ($haspermision) {
            return view('backend.admin.coupons.index');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }

    public function getAll()
    {

        $can_edit = $can_view = $can_approve = $can_delete = '';
        if (!auth()->user()->can('coupon-update')) {
            $can_edit = "style='display:none;'";
        }
        if (!auth()->user()->can('coupons-delete')) {
            $can_delete = "style='display:none;'";
        }
        $Data = Coupon::all();
        return DataTables::of($Data)
            ->addColumn('status', function ($Data) {
                if ($Data->status == 0) {
                    return '<span class="badge badge-danger">Inactive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }
            })
            ->addColumn('action', function ($Data) use ($can_view, $can_edit, $can_approve, $can_delete) {
                $html = '<div class="btn-group">';
                $html .= '<a href=' . url('admin/coupons/edit') . '/' . $Data->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $Data->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
                $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $Data->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['action', 'status'])
            ->addIndexColumn()
            ->make(true);
    }
    public function edit(Request $request, $id)
    {
        $haspermision = auth()->user()->can('coupons-update');
        if ($haspermision) {
            $data = Coupon::find($id);
            if ($data) {
                return view('backend.admin.coupons.create', compact('data'));
            } else {
                return abort(404);
            }
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function create()
    {
        $haspermision = auth()->user()->can('coupons-create');
        if ($haspermision) {
            return view('backend.admin.coupons.create');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function store(Request $request)
    {
        $haspermision = auth()->user()->can('coupons-create');
        if ($haspermision) {
            return $this->update($request);
            return redirect()->route('admin.coupons.index')->with('success', 'Successfully Publish');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }

    public function update(Request $request, $id=null)
    {
        $haspermision = auth()->user()->can('coupons-update');
        if ($haspermision) {
            $request->validate([
                "code" => "required|string",
                "connection_amount" => "required|integer",
                "start_date" => "required",
                "end_date" => "required",
                "usage_limit" => "required|integer",
                // "status" => "required|integer",
            ]);

            if ($id) {
                $coupons = Coupon::find($id);
            } else {
                $coupons = new Coupon();
            }

            $coupons->code = $request->code;
            $coupons->connection_amount = $request->connection_amount;
            $coupons->start_date = $request->start_date;
            $coupons->end_date = $request->end_date;
            $coupons->usage_limit = $request->usage_limit;
            $coupons->status = $request->status ?? 1;

            $coupons->save();

            return redirect()->route('admin.coupons.index')->with('success', 'Successfully Updated');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('coupons-delete');
            if ($haspermision) {
                $delete = Coupon::findOrFail($id);
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

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionHistory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        return view('backend.admin.transaction.index');
    }


    public function getAll()
    {
        $Data = SubscriptionHistory::orderBy('id','DESC')->get();
        return DataTables::of($Data)
            // ->addColumn('status', function ($Data) {
            //     if ($Data->status == 0) {
            //         return '<span class="badge badge-danger">Inactive</span>';
            //     } else {
            //         return '<span class="badge badge-success">Active</span>';
            //     }
            // })
            ->addColumn('amount', function ($Data) {
                return "৳ " . $Data->amount;
            })
            ->addColumn('user', function ($Data) {
                if ($Data->user()) {
                    return $Data->user()->name;
                }
                return "Unknown User";
            })
            ->addColumn('package', function ($Data) {
                if ($Data->package()) {
                    return $Data->package()->name;
                }
                return "Unknown Package";
            })
            ->addColumn('trxid', function ($Data) {
                return $Data->trxID;
            })
            // ->addColumn('action', function ($Data) use ($can_view, $can_edit, $can_approve, $can_delete) {
            //     $html = '<div class="btn-group">';
            //     $html .= '<a href=' . url('admin/packages/edit') . '/' . $Data->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $Data->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
            //     $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $Data->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
            //     $html .= '</div>';
            //     return $html;
            // })
            ->rawColumns(['amount', 'action', 'status', 'connection_amount', 'user', 'package'])
            ->addIndexColumn()
            ->make(true);
    }
}

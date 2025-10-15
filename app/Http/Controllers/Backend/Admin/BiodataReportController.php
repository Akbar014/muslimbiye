<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiodataReport;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BiodataReportController extends Controller
{
    public function index()
    {
        return view('backend.admin.biodata_report.index');
    }
    public function getAll()
    {
        $Data = BiodataReport::all();
        return DataTables::of($Data)
            ->addColumn('biodata', function ($Data) {
                return "<a href='".route('frontend.biodata_details', $Data->biodata()->id)."' target='_BLANK'>Check Biodata</a>";
            })
            ->addColumn('reported_by', function ($Data) {
                return $Data->user()->name;
            })
            ->addColumn('message', function ($Data) {
                return $Data->report_reason;
            })
            ->addColumn('action', function ($Data) {
                $BioData = $Data->biodata();
                $html = '<div class="btn-group">';

                // $html .= '<a target="_BLANK" href=' . url('admin/biodata/view') . '/' . $BioData->id . ' data-toggle="tooltip"  id="' . $BioData->id . '" class="btn btn-xs btn-success margin-r-5 view" title="View"><i class="fa fa-eye fa-fw"></i> </a>';

                if ($BioData->deleted != '1') {
                    $html .= '<a data-toggle="tooltip"  id="' . $BioData->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
                }

                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['biodata','reported_by','message', 'action'])
            ->addIndexColumn()
            ->make(true);
    }
}

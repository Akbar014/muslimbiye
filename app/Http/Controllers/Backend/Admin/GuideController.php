<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GuideController extends Controller
{
    public function index()
    {
        $haspermision = auth()->user()->can('seeting-page');
        if ($haspermision) {
            return view('backend.admin.guides.index');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function getAll()
    {

        $can_edit = $can_view = $can_approve = $can_delete = '';
        if (!auth()->user()->can('seeting-page')) {
            $can_edit = "style='display:none;'";
        }
        if (!auth()->user()->can('seeting-page')) {
            $can_delete = "style='display:none;'";
        }
        $Data = Guide::all();
        return DataTables::of($Data)
            ->addColumn('question', function ($Data) {
                return "<p><b>বাংলা:</b><br/>$Data->question_bn</p><p><b>English:</b><br/>$Data->question_en</p>";
            })
            ->addColumn('answer', function ($Data) {
                return "<p><b>বাংলা:</b><br/>$Data->answer_bn</p><p><b>English:</b><br/>$Data->answer_en</p>";
            })
            ->addColumn('status', function ($Data) {
                if ($Data->status == 0) {
                    return '<span class="badge badge-danger">Inactive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }
            })

            ->addColumn('action', function ($Data) use ($can_view, $can_edit, $can_approve, $can_delete) {
                $html = '<div class="btn-group">';
                $html .= '<a href=' . url('admin/guides/edit') . '/' . $Data->id . ' data-toggle="tooltip" ' . $can_edit . '  id="' . $Data->id . '" class="btn btn-xs btn-primary margin-r-5 edit" title="Edit"><i class="fa fa-edit fa-fw"></i> </a>';
                $html .= '<a data-toggle="tooltip" ' . $can_delete . '  id="' . $Data->id . '" class="btn btn-xs btn-danger margin-r-5 delete" title="Delete"><i class="fas fa-trash fa-fw"></i> </a>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['action', 'status', 'question', 'answer'])
            ->addIndexColumn()
            ->make(true);
    }
    public function edit(Request $request, $id)
    {
        $haspermision = auth()->user()->can('seeting-page');
        if ($haspermision) {
            $data = Guide::find($id);
            if ($data) {
                return view('backend.admin.guides.create', compact('data'));
            } else {
                return abort(404);
            }
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function create()
    {
        $haspermision = auth()->user()->can('seeting-page');
        if ($haspermision) {
            return view('backend.admin.guides.create');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function store(Request $request)
    {
        $haspermision = auth()->user()->can('seeting-page');
        if ($haspermision) {
            return $this->update($request);
            return redirect()->route('admin.guides.index')->with('success', 'Successfully Publish');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function update(Request $request, $id = null)
    {
        $haspermision = auth()->user()->can('seeting-page');
        if ($haspermision) {
            $request->validate([
                "question_en" => "required|string",
                "answer_en" => "required|string",
                "question_bn" => "required|string",
                "answer_bn" => "required|string",
            ]);

            if ($id) {
                $guides = Guide::find($id);
            } else {
                $guides = new Guide();
            }

            $guides->question_en = $request->question_en;
            $guides->answer_en = $request->answer_en;
            $guides->question_bn = $request->question_bn;
            $guides->answer_bn = $request->answer_bn;
            $guides->status = $request->status ?? 1;

            $guides->save();

            return redirect()->route('admin.guides.index')->with('success', 'Successfully Updated');
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('seeting-page');
            if ($haspermision) {
                $delete = Guide::findOrFail($id);
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

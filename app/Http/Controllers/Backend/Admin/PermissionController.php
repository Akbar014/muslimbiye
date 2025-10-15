<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Permission as UserPermission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use View;
use DB;

class PermissionController extends Controller
{
   /**
    * Display a listing of the resource.
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('backend.admin.permission.index');
   }

   public function getAll()
   {
      $can_edit = $can_delete = '';
      if (!auth()->user()->can('permission-update')) {
         $can_edit = "style='display:none;'";
      }
      if (!auth()->user()->can('permission-delete')) {
         $can_delete = "style='display:none;'";
      }

      $usepermission = UserPermission::get();
      return Datatables::of($usepermission)
         ->addColumn('action', function ($usepermission) use ($can_edit, $can_delete) {
            $html = '<div class="btn-group">';
            $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $usepermission->id . '" class="btn btn-xs btn-info mr-1 edit" title="Edit"><i class="fa fa-edit"></i> </a>';

            if($usepermission->deletable) {
               $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $usepermission->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
            }
            $html .= '</div>';
            return $html;
         })
         ->rawColumns(['action'])
         ->addIndexColumn()
         ->make(true);
   }

   /**
    * Show the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function create(Request $request)
   {
      if ($request->ajax()) {
         $haspermision = auth()->user()->can('permission-create');
         if ($haspermision) {
            $view = View::make('backend.admin.permission.create')->render();
            return response()->json(['html' => $view]);
         } else {
            abort(403, 'Sorry, you are not authorized to access the page');
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {

      if ($request->ajax()) {
         // Setup the validator
         $rules = [
            'name' => 'required|unique:permissions',
            'group_name' => 'required'
         ];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
               'type' => 'error',
               'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {
            Permission::Create(['guard_name' => 'admin', 'name' => $request->name, 'group_name' => $request->group_name]);
            return response()->json(['type' => 'success', 'message' => "Successfully Created"]);
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  int $id
    *
    * @return \Illuminate\Http\Response
    */
   public function show(Request $request, Permission $permission)
   {
      if ($request->ajax()) {
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    *
    * @return \Illuminate\Http\Response
    */
   public function edit(Request $request, Permission $permission)
   {
      if ($request->ajax()) {
         $haspermision = auth()->user()->can('permission-update');
         if ($haspermision) {
            $view = View::make('backend.admin.permission.edit', compact('permission'))->render();
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
    *
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Permission $permission)
   {
      if ($request->ajax()) {
         // Setup the validator
         Permission::findOrFail($permission->id);

         $rules = [
            'name' => 'required|unique:permissions,name,' . $permission->id,
            'group_name' => 'required'
         ];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
               'type' => 'error',
               'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {
            $permission->name = $request->name;
            $permission->group_name = $request->group_name;
            $permission->save();
            return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int $id
    *
    * @return \Illuminate\Http\Response
    */
   public function destroy(Request $request, $id)
   {
      if ($request->ajax()) {
         $haspermision = auth()->user()->can('permission-delete');
         if ($haspermision) {
            $permission = Permission::findOrFail($id);
            if($permission->deletable) {
               $permission->delete();
            } else {
               abort(403);
            }
            return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
         } else {
            abort(403, 'Sorry, you are not authorized to access the page');
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }
}

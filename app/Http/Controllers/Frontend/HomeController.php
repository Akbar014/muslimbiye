<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Admin;
use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Biodata as NewBiodata;



class HomeController extends Controller
{

   public function index()
   {
      $totalBiodata = NewBiodata::where(['deleted' => '0', 'status' => '2'])->get();
      $totalBiodataCount = count($totalBiodata);
      $totalSuccessCount = count(NewBiodata::where(['deleted' => '0', 'status' => '4'])->get());
      $totalBrideBiodataCount = 0;
      $totalGroomBiodataCount = 0;
      foreach ($totalBiodata as $biodata) {
         if ($biodata->general()->bride_groom == 'groom') {
            $totalGroomBiodataCount++;
         } else {
            $totalBrideBiodataCount++;
         }
      }
      return View::make('frontend_new.index.index', compact('totalBiodataCount', 'totalSuccessCount', 'totalBrideBiodataCount', 'totalGroomBiodataCount'));
   }

   public function search()
   {
      return View::make('frontend.search.search');
   }
   public function biodata_details($id)
   {
      $biodata = Biodata::where(["id" => $id, "deleted" => '0'])->first();
      if (!$biodata || $biodata->status != 2) {
          return response()
            ->view('frontend_new.biodata_details.unavailable', [
                'id'      => $id,
                'biodata' => $biodata, // null বা pending হতে পারে
            ], 404);
      }
      $biodata->visit_count += 1;
      $biodata->save();

      return View::make('frontend_new.biodata_details.index', compact('biodata'));
      // return View::make('frontend.biodata_details.biodata_details',compact('biodata'));
   }

   public function checkPhone()
   {
      return View::make('frontend.check_phone');
   }

   public function addPhone(Request $request)
   {
      $request->validate([
         'phone' => 'required|unique:admins'
      ]);

      $auth = Auth::guard('admin');
      $user = Admin::find($auth->id());

      $user->phone = $request->phone;
      $user->save();

      return redirect()->route('admin.dashboard');
   }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\User;
// use App\Models\BioData;
// use App\Models\DraftBiodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Services\GoogleAnalyticsGA4Service;

class DashboardController extends Controller
{


    protected $analyticsService;

    public function __construct(GoogleAnalyticsGA4Service $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }



    public function index()
    {
        $haspermision = auth()->user()->can('dashboard-read');
        $user = Auth::guard('admin')->user();
        $pendingBiodata = "";
        $biodataCount = count(Biodata::where(['deleted' => "0", "status" => "2"])->get() ?? []);
        if ($user->can('biodata-index')) {
            $pendingBiodata = Biodata::where(['deleted' => "0", 'status' => '1'])->orderBy('id', 'DESC')->get()->take(20);
        }
        if ($haspermision) {



            $propertyId = config('services.google_analytics.property_id');
            $report = $this->analyticsService->getReport($propertyId);


            $totalUser = User::where('email', '!=', null)->where('phone', '!=', null)->count();
            $totalCompletedBiodata = Biodata::where('status', '2')->count();

            return View::make('backend.admin.home', compact(['pendingBiodata', 'biodataCount', 'report', 'totalUser', 'totalCompletedBiodata']));
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
    }


    public function getBiodataStats()
    {
        $statuses = [
            "incomplete" => 0,
            "pending" => 1,
            "approved" => 2,
            "suspected" => 3,
            "married" => 4
        ];

        $chartData = [];

        foreach ($statuses as $key => $status) {
            $chartData[$key] = Biodata::where("deleted", "0")
                ->where("status", $status)
                ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
                ->groupBy("month")
                ->orderBy("month", "ASC")
                ->pluck("count", "month")
                ->toArray();
        }

        return response()->json($chartData);
    }
}

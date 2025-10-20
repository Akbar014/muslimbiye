<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\Biodata;
use Illuminate\Http\Request;
// use App\Models\BioData;
// use App\Models\DraftBiodata;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
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



    // public function index()
    // {
    //     $haspermision = auth()->user()->can('dashboard-read');
    //     $user = Auth::guard('admin')->user();
    //     $pendingBiodata = "";
    //     $biodataCount = count(Biodata::where(['deleted' => "0", "status" => "2"])->get() ?? []);
    //     if ($user->can('biodata-index')) {
    //         $pendingBiodata = Biodata::where(['deleted' => "0", 'status' => '1'])->orderBy('id', 'DESC')->get()->take(20);
    //     }
    //     if ($haspermision) {



    //         $propertyId = config('services.google_analytics.property_id');
    //         $report = $this->analyticsService->getReport($propertyId);

    //         $totalUser = User::where('email', '!=', null)->where('phone', '!=', null)->count();
    //         $totalCompletedBiodata = Biodata::where('status', '2')->count();

    //         return View::make('backend.admin.home', compact(['pendingBiodata', 'biodataCount', 'report', 'totalUser', 'totalCompletedBiodata']));
    //     } else {
    //         abort(403, 'Sorry, you are not authorized to access the page');
    //     }
    // }


    public function index()
{
    $haspermision = auth()->user()->can('dashboard-read');
    $user = Auth::guard('admin')->user();

    $pendingBiodata = "";
    $biodataCount   = \App\Models\Biodata::where(['deleted' => "0", "status" => "2"])->count();

    if ($user->can('biodata-index')) {
        $pendingBiodata = \App\Models\Biodata::where(['deleted' => "0", 'status' => '1'])
            ->latest()->take(20)->get();
    }

    if (!$haspermision) {
        abort(403, 'Sorry, you are not authorized to access the page');
    }

    // GA4: safe fetch (no crash if missing access)
    $propertyId = config('services.google_analytics.property_id');
    $report = null;

    try {
        if ($propertyId) {
            $report = $this->analyticsService->getReport($propertyId);
        }
    } catch (GoogleServiceException $e) {
        Log::warning('GA4 fetch failed', ['code' => $e->getCode(), 'message' => $e->getMessage()]);
        $report = null;
    } catch (\Throwable $e) {
        Log::error('GA4 unexpected error', ['message' => $e->getMessage()]);
        $report = null;
    }

    $totalUser             = \App\Models\User::whereNotNull('email')->whereNotNull('phone')->count();
    $totalCompletedBiodata = \App\Models\Biodata::where('status', '2')->count();

    return view('backend.admin.home', compact(
        'pendingBiodata', 'biodataCount', 'report', 'totalUser', 'totalCompletedBiodata'
    ));
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

<?php

namespace App\Http\Controllers\Backend\Admin;

use Exception;
use App\Models\User;
use App\Models\Biodata;
// use App\Models\BioData;
// use App\Models\DraftBiodata;
use Illuminate\Http\Request;
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

        if (!$haspermision) {
            abort(403, 'Sorry, you are not authorized to access the page');
        }

        // ----- Status helpers (view-এর জন্য) -----
        $statusLabels = [
            0 => 'Incomplete',
            1 => 'Pending',
            2 => 'Approved',
            3 => 'Suspected',
            4 => 'Married',
            5 => 'Postponed',
        ];
        $statusClasses = [ // Bootstrap 4 badge classes
            0 => 'badge-secondary',
            1 => 'badge-warning',
            2 => 'badge-success',
            3 => 'badge-warning',   // চাইলে 'badge-danger' করতে পারো
            4 => 'badge-info',
            5 => 'badge-dark',
        ];

        $pendingBiodata = collect();

        $biodataCount   = Biodata::where(['deleted' => "0", "status" => "2"])->count();

        if ($user->can('biodata-index')) {     
                $pendingBiodata = Biodata::where(['deleted' => "0", 'status' => '1'])
                        ->latest()
                        ->take(20)
                        ->get();
        }

        $statusCounts = Biodata::where('deleted', '0')
            ->selectRaw('status, COUNT(*) as cnt')
            ->groupBy('status')
            ->pluck('cnt', 'status')
            ->toArray();

        $propertyId = config('services.google_analytics.property_id');
        $report = null;

        try {
            if ($propertyId) {
                $report = $this->analyticsService->getReport($propertyId);
            }
        } catch (GoogleServiceException $e) {
            Log::warning('GA4 fetch failed', ['code' => $e->getCode(), 'message' => $e->getMessage()]);
            $report = null;
        } catch (Exception $e) {
            Log::error('GA4 unexpected error', ['message' => $e->getMessage()]);
            $report = null;
        }

        $totalUser             = User::whereNotNull('email')->whereNotNull('phone')->count();
        $totalCompletedBiodata = Biodata::where('status', '2')->count();

        return view('backend.admin.home', compact(
            'pendingBiodata',
            'biodataCount',
            'report',
            'totalUser',
            'totalCompletedBiodata',
            'statusLabels',
            'statusClasses',
            'statusCounts'
        ));
    }


    public function getBiodataStats()
    {
        $statuses = [
            "incomplete" => 0,
            "pending" => 1,
            "approved" => 2,
            "suspected" => 3,
            "married" => 4,
            "postponed"  => 5,
        ];

        $chartData = [];

        foreach ($statuses as $key => $status) {
            $chartData[$key] = Biodata::where("deleted", "0")
                ->where("status", $status)
                ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
                ->groupBy("month")
                ->orderBy("month", "desc")
                ->pluck("count", "month")
                ->toArray();
        }

        return response()->json($chartData);
    }
}

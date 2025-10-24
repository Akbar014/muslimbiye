<?php

namespace App\Http\Controllers\Frontend\Search;

use App\Http\Controllers\Controller;
use App\Models\BioData;
use App\Models\Biodata as NewBiodata;
use App\Models\BiodataGeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function paginate($items, $perPage = 8, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if ($request->session()->has('search')) {
            $searchQuery = session()->get('search');
            if ($searchQuery['biodata_no']) {
                $result = NewBiodata::where(['status' => '2', 'code' => $searchQuery['biodata_no'], "deleted" => '0'])->paginate(6);
                // dd($result);
            } else {
                $general = BiodataGeneralInfo::where('user_id', "!=", null);
                if ($searchQuery['biodata_type'] !== null && $searchQuery['biodata_type'] !== "all") {
                    $general->whereIn('biodata_type', [$searchQuery['biodata_type']]);
                }
                if ($searchQuery['marital_status'] !== null) {
                    $general->where('marital_status', $searchQuery['marital_status']);
                }
                // dd($searchQuery['marital_status']);
                if ($searchQuery['bride_groom'] !== null && $searchQuery['bride_groom'] !== "all") {
                    $general->whereIn('bride_groom', [$searchQuery['bride_groom']]);
                }

                $locationFilteredBiodata = [];

                foreach ($general->get() as $general) {
                    if ($general->biodata()->deleted == '0' && $general->biodata()->status == '2') {
                        if ($searchQuery['district'] !== null) {
                            if ($general->biodata()->address()->parmanent_zella == $searchQuery['district']) {
                                array_push($locationFilteredBiodata, $general->biodata());
                            }
                        } else {
                            array_push($locationFilteredBiodata, $general->biodata());
                        }
                    }
                }


                $totalCount = count($locationFilteredBiodata);
                $result = $this->paginate($locationFilteredBiodata);
            }
            return view('frontend_new.search.index', compact('result', 'totalCount'));
        } else {
            return redirect()->route('frontend.home')->with('error', 'somtheing wrong');
        }
    }

    // public function search(Request $request)
    // {
    //     if ($request->session()->has('search')) {
    //         $searchQuery = session()->get('search');

    //         if (!empty($searchQuery['biodata_no'])) {
    //             $result = NewBiodata::where([
    //                 'status'  => '2',
    //                 'code'    => $searchQuery['biodata_no'],
    //                 'deleted' => '0',
    //             ])->paginate(6);

    //         } else {
    //             // base query
    //             $general = BiodataGeneralInfo::query()
    //                 ->whereNotNull('user_id');

    //             if (!empty($searchQuery['biodata_type']) && $searchQuery['biodata_type'] !== 'all') {
    //                 $general->whereIn('biodata_type', [$searchQuery['biodata_type']]);
    //             }

    //             if (!empty($searchQuery['marital_status'])) {
    //                 $general->where('marital_status', $searchQuery['marital_status']);
    //             }

    //             if (!empty($searchQuery['bride_groom']) && $searchQuery['bride_groom'] !== 'all') {
    //                 $general->whereIn('bride_groom', [$searchQuery['bride_groom']]);
    //             }

    //             // eager load to avoid N+1
    //             $rows = $general
    //                 ->with([
    //                     'biodataRef:id,status,deleted',
    //                     'biodataAddressRef: id,biodata_id,parmanent_zella'
    //                 ])
    //                 ->get();

    //             $locationFilteredBiodata = [];
    //             $wantDistrict = $searchQuery['district'] ?? null;

    //             foreach ($rows as $item) {
    //                 $b = $item->biodataRef;
    //                 if (!$b || $b->deleted !== '0' || $b->status !== '2') {
    //                     continue;
    //                 }

    //                 if ($wantDistrict) {
    //                     $addr = $item->biodataAddressRef;
    //                     if ($addr && $addr->parmanent_zella == $wantDistrict) {
    //                         $locationFilteredBiodata[] = $b;
    //                     }
    //                 } else {
    //                     $locationFilteredBiodata[] = $b;
    //                 }
    //             }

    //             $totalCount = count($locationFilteredBiodata);

    //             $result = $this->paginate($locationFilteredBiodata);
    //         }

    //         return view('frontend_new.search.index', compact('result', 'totalCount'));
    //     }

    //     return redirect()->route('frontend.home')->with('error', 'somtheing wrong');
    // }


    public function searchSubmit(Request $request)
    {
        // dd($request->all());
        if ($request->session()->has('search')) {
            $request->session()->forget('search');
        }
        Session::put([
            'search' => [
                'biodata_type' => $request->biodata_type ?? null,
                'marital_status' => $request->marital_status ?? null,
                'bride_groom' => $request->bride_groom ?? null,
                'district' => $request->district ?? null,
                'biodata_no' => $request->biodata_no ?? null
            ],
        ]);
        return redirect()->route('frontend.search');
    }
    
    public function search_slug($slug)
    {
        $result = BioData::where('bride_groom', $slug)->where('status', '1')->paginate(6);
        return view('frontend.search.bride_groom', compact('result', 'slug'));
    }
}

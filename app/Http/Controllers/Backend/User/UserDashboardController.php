<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\BiodataConnection;
use App\Models\BiodataReport;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\DraftBiodata;
use App\Models\Favorite;
use App\Models\Packages;
use App\Models\SubscriptionHistory;
use App\Models\User;
use App\Services\BkashService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    protected $bkashService;

    public function __construct(BkashService $bkashService)
    {
        $this->bkashService = $bkashService;
    }


    public function index()
    {
        $incomplete_biodata = Biodata::where(['user_id' => Auth::guard("user")->user()->id, 'deleted' => "0", 'admin_created' => '0'])->first();

        $user = Auth::guard('user')->user();
        $coupon_usages = CouponUsage::where(['user_id' => $user->id])->first();
        return view('frontend_new.user.dashboard.index', compact('incomplete_biodata', 'coupon_usages'));
    }


    public function my_biodata()
    {
        $user_id = Auth::guard('user')->user()->id;
        $biodata = Biodata::where(['user_id' => $user_id, 'deleted' => "0", 'admin_created' => '0'])->first();
        if (!$biodata) {
            return redirect()->route('user.edit_biodata.index')->withErrors(['Error' => 'You Don\'t Have Any Biodata, Please Create One.']);
        }
        return view('frontend_new.user.my_biodata.index', compact('biodata'));
    }
    public function favourite()
    {
        $favorites = Favorite::where('user_id', Auth::guard('user')->user()->id)->get();
        return view('frontend_new.user.favourite.index', compact('favorites'));
    }
    public function my_purchases()
    {
        return view('frontend_new.user.my_purchases.index');
    }
    public function settings()
    {
        return view('frontend_new.user.settings.index');
    }

    public function buy_connection()
    {
        $packages = Packages::where('status', "1")->get();
        return view('frontend_new.user.buy_connection.index', compact('packages'));
    }
    public function connection($id)
    {
        $package = Packages::find($id);
        if ($package) {
            return view('frontend_new.user.connection.index', compact('package'));
        }
        return abort(404);
    }
    public function connection_buy_bkash($id)
    {
        try {
            $user = Auth::guard('user')->user();
            $getSubscriptionPack = Packages::where('id', $id)->where('status', "1")->first();

            if (!$getSubscriptionPack) {
                return redirect()->back()->withErrors('Subscription Pack not found');
            }

            $amount = $getSubscriptionPack->price;


            if ($amount >= 0) {
                try {
                    $invoiceNumber = 'INV-' . now()->timestamp;
                    $pay_id = "type:SubscriptionPackage,UserId:{$user->id},SubscriptionPackageId:{$getSubscriptionPack->id}";

                    $payerReference = 'SubscriptionPackage';
                    $checkoutUrl = $this->bkashService->createCheckout($amount, $invoiceNumber, $payerReference, $pay_id);

                    return redirect()->to($checkoutUrl);
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            } else {
                updateSubscription($user->id, $getSubscriptionPack->id);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Subscription Pack not found');
        }
    }

    public function bkash_callback(Request $request)
    {
        $reference = $request->query('reference');
        $pay_id = $request->query('pay_id');
        $paymentID = $request->query('paymentID');
        $status = $request->query('status');
        $signature = $request->query('signature');


        // Decode the pay_id
        $pay_id_parts = explode(',', $pay_id);
        $pay_id_data = [];
        foreach ($pay_id_parts as $part) {
            list($key, $value) = explode(':', $part);
            $pay_id_data[$key] = $value;
        }

        // Example: Extract values
        $type = $pay_id_data['type'] ?? null;
        $userId = $pay_id_data['UserId'] ?? null;
        $subscriptionPackageId = $pay_id_data['SubscriptionPackageId'] ?? null;
        $subscriptionPackage = Packages::where('id', $subscriptionPackageId)->where('status', "1")->first();
        $user = User::find($userId);

        // Call the BkashResponseStore method to handle the response
        $excute = $this->executePayment($paymentID);
        $executeData = $excute->getData();  // Extract JSON data from JsonResponse

        $statusCode = $executeData->statusCode ?? null;
        $trxID = $executeData->trxID ?? null;
        $statusMessage = $executeData->statusMessage ?? null;

        $subscription = new SubscriptionHistory();

        $subscription->type = $type ?? null;
        $subscription->type_id = $subscriptionPackageId ?? null;
        // $subscription->day = $subscriptionPackage->day ?? null;
        $subscription->reference = $reference ?? null;
        $subscription->pay_id = $pay_id ?? null;
        $subscription->payment_id = $paymentID ?? null;
        $subscription->payment_details = json_encode($executeData) ?? null;
        $subscription->trxID = $trxID ?? null;
        $subscription->message = $statusMessage ?? null;
        $subscription->status = $status ?? null;
        $subscription->status_code = $statusCode ?? null;
        $subscription->amount = $subscriptionPackage->price;
        $subscription->users_id = $user->id ?? Auth::guard('user')->user()->id;
        $subscription->users = json_encode($user) ?? null;
        $subscription->apiVersion = $request->query('apiVersion') ?? '1.0';
        $subscription->updated_at = now();
        $subscription->created_at = now();

        $subscription->save();

        if ($status == 'success' && $statusCode == '0000') {
            $user->connection += $subscriptionPackage->connection_amount;
            $user->save();
            return redirect()->route('user.dashboard')->with('success', 'Purchase Successful!');
        }
        return redirect()->route('user.dashboard')->withErrors('error', 'Something Went Wrong, Please Try Again!');
    }

    public function executePayment($paymentID)
    {

        try {
            $result = $this->bkashService->executePayment($paymentID);
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function connection_buy_nagad($id)
    {
        try {
            $user = Auth::guard('user')->user();
            $getSubscriptionPack = Packages::where('id', $id)->where('status', "1")->first();
            if (!$getSubscriptionPack) {
                return redirect()->back()->withErrors('Subscription Pack not found');
            }

            $amount = $getSubscriptionPack->discount_amount ?? $getSubscriptionPack->amount;
            if ($amount >= 0) {
                try {
                    $invoiceNumber = 'INV-' . now()->timestamp;
                    $amount = $getSubscriptionPack->discount_amount ?? $getSubscriptionPack->amount;
                    $pay_id = "type:SubscriptionPackage,UserId:{$user->id},SubscriptionPackageId:{$getSubscriptionPack->id}";

                    $payerReference = 'SubscriptionPackage';
                    $checkoutUrl = env('APP_URL') . "/nagad/$invoiceNumber/$amount";
                    // dd($checkoutUrl);
                    return redirect()->to($checkoutUrl);
                    // return redirect()->back()->with('url', $checkoutUrl);
                    // return response()->json(['url' => $checkoutUrl]);
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            } else {
                updateSubscription($user->id, $getSubscriptionPack->id);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Subscription Pack not found');
        }
    }

    public function change_password(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);


        if (!Hash::check($request->old_password, Auth::guard("user")->user()->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect']);
        }

        $user = User::find(Auth::guard("user")->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password changed successfully');
    }

    public function delete_biodata_page(Request $request) {
        $biodata = Biodata::where(['user_id' => Auth::guard("user")->user()->id, 'deleted' => "0", 'admin_created' => '0'])->first();
        if ($biodata) {
            return view('frontend_new.user.settings.delete.index', compact('biodata'));
        }
        return abort(403);
    }
    public function delete_biodata(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'delete_confirmation' => 'required',
            'password' => 'required|min:8',
        ]);

        if (!Hash::check($request->password, Auth::guard("user")->user()->password)) {
            return back()->withErrors(['password' => 'The password is incorrect']);
        }

        $biodata = Biodata::where(['user_id' => Auth::guard("user")->user()->id, 'deleted' => "0", 'admin_created' => '0'])->first();


        if ($biodata) {
            if ($request->has('reason') && $request->reason == 'married') {
                $biodata->status = 4;
            }
            $biodata->deleted = "1";
            $biodata->married_by_muslimbie = $request->married_by_muslimbie ?? 0;
            $biodata->save();
        } else {
            return back()->with('success', 'Create Biodata First');
        }


        return redirect()->route('user.dashboard')->with('success', 'Biodata Deleted successfully');
    }

    public function use_connection(Request $request, $id)
    {
        $user = User::find(Auth::guard("user")->user()->id);
        if ($user->connection > 0) {

            BiodataConnection::updateOrCreate(
                ["user_id" => $user->id, "biodata_id" => $id],
                [
                    "user_id" => $user->id,
                    "biodata_id" => $id
                ]
            );

            $user->connection -= 1;
            $user->save();

            $coupon_usages = CouponUsage::where(['user_id' => $user->id])->where('connection_remain', '>', 0)->first();
            if ($coupon_usages) {
                if($coupon_usages->connection_remain >= 0) {
                    $coupon_usages->connection_remain -= 1;
                    $coupon_usages->save();
                }
            }

            return redirect()->back()->with('success', 'Successfully Unlocked Biodata')->withFragment('contact');
        } else {
            return redirect()->route('user.buy_connection')->withErrors(['error' => 'You do not have connections. Please Purchase Connections']);
        }
    }

    public function biodata_report(Request $request, $id) {
        $report = new BiodataReport();
        $report->user_id = Auth::guard("user")->user()->id;
        $report->biodata_id = $id;
        $report->report_reason = $request->report_reason;
        $report->save();

        return back()->with('success', 'Reported Successfully, Admin will review it soon');
    }

    public function apply_coupon(Request $request) {
        $request->validate([
            'coupon_code' => 'required|string|max:255',
        ]);

        $coupon = Coupon::where(['code' => $request->coupon_code, 'status'=>'1'])->first();
        if (!$coupon) {
            return back()->withErrors(['coupon_code' => 'Coupon not found']);
        }
        if ($coupon->start_date > now()) {
            return back()->withErrors(['coupon_code' => 'Coupon not valid yet']);
        }
        if ($coupon->end_date < now()) {
            return back()->withErrors(['coupon_code' => 'Coupon expired']);
        }
        if ($coupon->usage_limit !== null && $coupon->usage_count >= $coupon->usage_limit) {
            return back()->withErrors(['coupon_code' => 'Coupon usage limit reached']);
        }
        $user = Auth::guard("user")->user();
        $coupon_usages = CouponUsage::where(['user_id' => $user->id, 'coupon_id' => $coupon->id])->first();

        if($coupon_usages) {
            return back()->withErrors(['coupon_code' => 'You have already used this coupon']);
        }

        $coupon_usage = new CouponUsage();
        $coupon_usage->user_id = $user->id;
        $coupon_usage->coupon_id = $coupon->id;
        $coupon_usage->connection_amount = $coupon->connection_amount;
        $coupon_usage->connection_remain = $coupon->connection_amount;
        $coupon_usage->code = $request->coupon_code;
        $coupon_usage->save();

        $coupon->usage_count += 1;
        $coupon->save();

        $user->connection += $coupon->connection_amount;
        $user->save();
        

        return redirect()->route('user.dashboard')->with('success', 'Coupon applied successfully, you\'ve received ' . $coupon->connection_amount . ' connections');
    }
}

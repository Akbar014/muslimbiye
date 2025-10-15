<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Packages;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\BkashService;

class BkashPaymentController extends Controller
{
    protected $bkashService;

    public function __construct(BkashService $bkashService)
    {
        $this->bkashService = $bkashService;
    }


    public function callback(Request $request)
    {
        // Extract necessary information from the request
        // try {
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
        $subscriptionPackage = Packages::where('id', $subscriptionPackageId)->where('status', 1)->first();
        $user = User::find($userId);


        // Call the BkashResponseStore method to handle the response
        $excute = $this->executePayment($paymentID);
        $executeData = $excute->getData();  // Extract JSON data from JsonResponse

        $statusCode = $executeData->statusCode ?? null;
        $trxID = $executeData->trxID ?? null;
        $amount = $executeData->amount ?? null;
        $statusMessage = $executeData->statusMessage ?? null;

        $bkashStore = [
            'type' => $type ?? null,
            'type_id' => $subscriptionPackageId ?? null,
            'day' => $subscriptionPackage->day ?? null,
            'reference' => $reference ?? null,
            'pay_id' => $pay_id ?? null,
            'paymentID' => $paymentID ?? null,
            'payment_details' => json_encode($executeData) ?? null,
            'trxID' => $trxID ?? null,
            'message' => $statusMessage ?? null,
            'status' => $status ?? null,
            'status_code' => $statusCode ?? null,
            'amount' => $amount ?? $subscriptionPackage->discount_amount ?? $subscriptionPackage->amount ?? null,
            'users_id' => $user->id ?? null,
            'users' => json_encode($user) ?? null,
            'apiVersion' => $request->query('apiVersion') ?? '1.0',
            'updated_at' => now(),
            'created_at' => now(),
        ];
        BkashResponseStore($bkashStore);

        \Log::info('Bkash callback data:', $bkashStore);
        if ($statusCode == '0000') {
            updateSubscription($userId, $subscriptionPackageId);
        }
        return redirect()->to(env('FRONTEND_URL') . "/payment_confirmation?statuscode=$status");
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
}

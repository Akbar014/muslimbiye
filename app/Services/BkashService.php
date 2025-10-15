<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\BkashToken;

class BkashService
{
    protected $baseUrl;
    protected $credentials;

    public function __construct()
    {
        $this->credentials = [
            'app_key' => env('BKASH_SANDBOX') ? env('BKASH_SANDBOX_APP_KEY') : env('BKASH_APP_KEY'),
            'app_secret' => env('BKASH_SANDBOX') ? env('BKASH_SANDBOX_APP_SECRET') : env('BKASH_APP_SECRET'),
            'username' => env('BKASH_SANDBOX') ? env('BKASH_SANDBOX_USERNAME') : env('BKASH_USERNAME'),
            'password' => env('BKASH_SANDBOX') ? env('BKASH_SANDBOX_PASSWORD') : env('BKASH_PASSWORD'),
            'sandbox' => env('BKASH_SANDBOX')
        ];

        $this->baseUrl = $this->credentials['sandbox']
            ? 'https://tokenized.sandbox.bka.sh/'
            : 'https://tokenized.pay.bka.sh/';
    }

    public function generateToken()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'username' => $this->credentials['username'],
            'password' => $this->credentials['password'],
            'Content-Type' => 'application/json'
        ])
        ->withoutVerifying() // Disable SSL verification for local testing

        ->post($this->baseUrl . 'v1.2.0-beta/tokenized/checkout/token/grant', [
            'app_key' => $this->credentials['app_key'],
            'app_secret' => $this->credentials['app_secret']
        ]);

        if ($response->failed()) {
            throw new \Exception('bKash API request failed with status code: ' . $response->status() . ' and response: ' . $response->body());
        }

        $data = $response->json();
        if (isset($data['id_token'])) {
            return $data['id_token'];
        } else {
            throw new \Exception('Failed to retrieve id_token from bKash API. Response: ' . $response->body());
        }
    }

    public function createCheckout($amount, $invoiceNumber, $payerReference,$pay_id)
    {
        $idToken = $this->generateToken();
        $response = Http::withToken($idToken)
            ->withHeaders([
                'Accept' => 'application/json',
                'X-APP-Key' => $this->credentials['app_key'],
                'Content-Type' => 'application/json'
            ])
            ->withoutVerifying() // Disable SSL verification for local testing

            ->post($this->baseUrl . 'v1.2.0-beta/tokenized/checkout/create', [
                'payerReference' => $payerReference,
                'amount' => $amount,
                'currency' => 'BDT',
                'merchantInvoiceNumber' => $invoiceNumber,
                'mode' => '0011',
                'callbackURL' => env('BKASH_CALLBACK_URL') . '?reference=' . $payerReference . '&pay_id=' . $pay_id,
                'intent' => 'sale'
            ]);

        if ($response->failed()) {
            throw new \Exception('bKash API request failed with status code: ' . $response->status() . ' and response: ' . $response->body());
        }

        $data = $response->json();
        return $data['bkashURL'] ?? '';
    }

    public function executePayment($paymentID)
    {
        $idToken = $this->generateToken();
        $response = Http::withToken($idToken)
            ->withHeaders([
                'Accept' => 'application/json',
                'X-APP-Key' => $this->credentials['app_key'],
                'Content-Type' => 'application/json'
            ])
            ->withoutVerifying() // Disable SSL verification for local testing

            ->post($this->baseUrl . 'v1.2.0-beta/tokenized/checkout/execute', [
                'paymentID' => $paymentID
            ]);

        if ($response->failed()) {
            throw new \Exception('bKash API request failed with status code: ' . $response->status() . ' and response: ' . $response->body());
        }

        return $response->json();
    }

    public function getPaymentDetails($paymentID)
    {
        $idToken = $this->generateToken();
        $response = Http::withToken($idToken)
            ->withHeaders([
                'Accept' => 'application/json',
                'X-APP-Key' => $this->credentials['app_key'],
                'Content-Type' => 'application/json'
            ])
            ->withoutVerifying() // Disable SSL verification for local testing

            ->post($this->baseUrl . 'v1.2.0-beta/tokenized/checkout/payment/status', [
                'paymentID' => $paymentID
            ]);

        if ($response->failed()) {
            throw new \Exception('bKash API request failed with status code: ' . $response->status() . ' and response: ' . $response->body());
        }

        return $response->json();
    }
}

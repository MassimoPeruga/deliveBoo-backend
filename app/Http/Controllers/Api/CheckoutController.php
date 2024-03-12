<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway as BraintreeGateway;

class CheckoutController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new BraintreeGateway([
            'environment' => 'sandbox',
            'merchantId' => env('MERCHANT_ID'),
            'publicKey' => env('PUBLIC_KEY'),
            'privateKey' => env('PRIVATE_KEY'),
        ]);
    }

    public function getToken()
    {
        $clientToken = $this->gateway->clientToken()->generate();
        return response()->json(['token' => $clientToken]);
    }

    public function checkout(Request $request)
    {
        $nonce = $request->input('payment_method_nonce');
        $total = $request->input('total');

        $result = $this->gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {
            return response()->json(['success' => true, 'transaction_id' => $result->transaction->id]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}

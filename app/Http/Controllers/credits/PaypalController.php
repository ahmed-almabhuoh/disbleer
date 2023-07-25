<?php

namespace App\Http\Controllers\credits;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function handlePayment($amount)
    {
        $transaction = Transaction::create([
            'method' => 'paypal',
            'currency_code' => 'USD',
            'amount' => (int)$amount,
            'coins' => ((int)$amount) * 16,
            'type' => 'payment',
            'status' => 'pending',
            'disable_id' => auth()->user()->id,
        ]);


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment', Crypt::encrypt($transaction->id)),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "$amount"
                    ]
                ]
            ]
        ]);


        Transaction::where('id', $transaction->id)->update([
            'created_order' => json_encode($response),
        ]);



        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        return redirect()
            ->route('create.payment')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request, $transaction_id)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {


            Transaction::where('id', Crypt::decrypt($transaction_id))->update([
                'description' => 'Completed without errors',
                'status' => 'completed',
                'dispatched_order' => json_encode($response),
            ]);


            return redirect()
                ->route('clientv1.credits')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentCallbackController extends Controller
{
    public function handleCallback(Request $request)
    {
        $data = $request->all();
        $transaction_status = $data['transaction_status'];

        // Update status transaksi di database
        $payment = Payment::where('order_id', $data['order_id'])->first();
        if ($payment) {
            $payment->status = $transaction_status;
            $payment->save();
        }

        // Kirim respons balik ke server payment gateway
        return response()->json(['status' => 'success']);
    }
}

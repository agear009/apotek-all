<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Data transaksi
        $transaction_details = [
            'order_id' => 'ORDER' . rand(),
            'gross_amount' => 100000, // nominal pembayaran
        ];

        // Data item
        $items = [
            [
                'id' => 'item1',
                'price' => 100000,
                'quantity' => 1,
                'name' => 'Product Name',
            ],
        ];

        // Data customer
        $customer_details = [
            'first_name'    => "John",
            'last_name'     => "Doe",
            'email'         => "johndoe@example.com",
            'phone'         => "081234567890",
        ];

        // Buat transaksi
        $params = [
            'transaction_details' => $transaction_details,
            'item_details'        => $items,
            'customer_details'    => $customer_details,
        ];

        try {
            $snap_token = Snap::getSnapToken($params);
            return view('payment', ['snap_token' => $snap_token]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}

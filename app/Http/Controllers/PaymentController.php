<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$merchantId = env('MIDTRANS_MERCHANT_ID'); 
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * Menginisiasi pembayaran dan membuat Snap Token.
     */
    public function processPayment(Order $order)
    {
        if ($order->user_id !== Auth::id()) { abort(403); }

        $params = [
            'transaction_details' => [
                'order_id' => $order->invoice_number,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,
            ],
            // Jika ada item_details, tambahkan di sini
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $order->update(['payment_token' => $snapToken]); // Simpan token
            
            // Arahkan ke view yang akan memicu pop-up Midtrans
            return view('payment.process', compact('snapToken', 'order')); 

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal inisiasi pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Menangani notifikasi (webhook) dari Midtrans.
     */
    public function handleNotification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $transactionStatus = $notif->transaction_status;
        $orderId = $notif->order_id;
        $fraudStatus = $notif->fraud_status;

        $order = Order::where('invoice_number', $orderId)->first();

        if (!$order) { return response()->json(['message' => 'Order not found'], 404); }

        // Logic update status order berdasarkan notifikasi Midtrans
        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'accept') {
                $order->update(['payment_status' => 'paid', 'status' => 'processing']);
            }
        } elseif ($transactionStatus == 'settlement') {
            $order->update(['payment_status' => 'paid', 'status' => 'processing']);
        } elseif (in_array($transactionStatus, ['pending', 'expire', 'cancel', 'deny'])) {
             $order->update(['payment_status' => $transactionStatus]);
        }
        
        // 

        // TODO: Tambahkan logic bisnis lain (misal: kirim email, update stok, dll.)

        return response()->json(['message' => 'Notification processed successfully']);
    }
}

<?php

namespace App\Services;

use App\Models\FormAdminOrder;
use Midtrans\Config;
use Midtrans\Snap;

class Midtrans {

  public function __construct() {
    $this->configMidtrans();
  }

   public static function configMidtrans() {
      Config::$serverKey = config('midtrans.SERVER_KEY');
      Config::$isProduction = false;
      Config::$isSanitized = false;
      Config::$is3ds = false;
  }

  public static function getSnapToken($form_admin_order) {
    $adjustTrxDetail = self::transactionDetail($form_admin_order);

    $snapToken = Snap::getSnapToken($adjustTrxDetail);
    return $snapToken;
  }

  protected static function transactionDetail($form_admin_order) {
    $transaction_detail = [
            'transaction_details' => [
                'order_id' => $form_admin_order->invoice,
                'gross_amount' => 125000,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => 125000,
                    'quantity' => 1,
                    'name' => 'Formulir Administrasi Pendaftaran.',
                ],
            ],
            'customer_details' => [
                'first_name' => $form_admin_order->user->fullname,
                'email' => $form_admin_order->user->email,
                'phone' => $form_admin_order->user->phone_number,
            ],
            "expiry" => [
              "duration" => 3,
              "unit" => "day"
            ]
        ];
    return $transaction_detail;
  }

  public function handleCbMidtrans($callback) {
    $invoice = $callback["order_id"];
    FormAdminOrder::where("invoice", $invoice)->update([
      "is_paid" => 1,
      "status" => "Sudah Lunas",
    ]);
  }
}
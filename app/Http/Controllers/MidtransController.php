<?php

namespace App\Http\Controllers;

use App\Services\Midtrans;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function handleCB(Request $request) {
        try {
            $midtransService = new Midtrans();
            $cb = $midtransService->handleCbMidtrans(json_decode($request->getContent(), TRUE));
    
            return response()->json([
                'message' => 'Pembayaran Telah Berhasil',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 
                'message' => 'ERROR SERVERSIDE: ' . $th->getMessage()
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ClassSemester;
use App\Models\FormAdminOrder;
use App\Services\Midtrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index() {
        return view("Home");
    }

    public function register() {
        return view("Register");
    }

    public function login() { 
        return view("Login");
    }

    public function afterLoginPage() {
        $isPaymentAdminPaid = FormAdminOrder::select("is_paid")->where('user_id', Auth::id())->first();
        $isUserFinishInputDataStudentSchool = ClassSemester::where('user_id', Auth::id())->count();
        // dd($isUserFinishInputDataStudentSchool);
        return view('After_Login_Page', [
            'is_payment_admin_paid' => $isPaymentAdminPaid,
            'is_user_finish_input_data_student' => $isUserFinishInputDataStudentSchool
        ]);
    }

    public function infoPaymentPage() {
        $detailOrder = FormAdminOrder::where('user_id', Auth::id())->first();
        // dd($detailOrder->invoice);
        if (!is_null($detailOrder)) {
            if (is_null($detailOrder->snap_token)) {
                $midtransService = new Midtrans();
                $detailOrder->snap_token = $midtransService->getSnapToken($detailOrder);
                $detailOrder->save();
            }
        } 
        return view('Info_Payment_Page', ['detail_order'=> $detailOrder]);
    }
}

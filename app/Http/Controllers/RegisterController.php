<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStoreRequest;
use App\Models\FormAdminOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register(RegisterStoreRequest $request) {
        $validation = $request->validated();

        DB::beginTransaction();
        try {
            if ($validation) {
                $validation['role_id'] = 2;
                $userCreated =  User::create($validation);
                DB::commit();
                toastr()->success("Registation is Successfully!", "Congratulations");

                FormAdminOrder::create([
                    'user_id' => $userCreated->id,
                    'invoice' => 'INV//' . Carbon::now()->format('Y') . '-' . Str::random(10),
                    'description' => 'Formulir administrasi pendaftaran.',
                    'price' => 125_000,
                    'status' => 'Belum Dibayar'
                ]);
                
                return redirect()->route("login");
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            return redirect()->back();
        }
    }
}

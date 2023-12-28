<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingFormController extends Controller
{
    public function updateSettingForm(Request $request) {
        // dd($request->all());
        DB::beginTransaction();
        try {
            foreach ($request->form_ids as $formType => $formId) {
                $isEnabled = isset($request->isFormEnabled[$formType]) && $request->isFormEnabled[$formType] == 'on';

                Form::where('id', $formId)->update([
                    'isFormEnabled' => $isEnabled ? 1 : 0
                ]);
            }
            DB::commit();
            toastr()->success("Perubahan Berhasil Disimpan", "Setting Updated");

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage());

            return redirect()->back();
        }
    }
}

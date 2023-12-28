<?php

namespace App\Http\Middleware;

use App\Models\Form;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isUserCanPayFormAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $form = Form::select("id", "form_type", "isFormEnabled")
                                    ->where("form_type", "FormAdministration")
                                    ->first();
        if (isset($form)) {
            if ($form->isFormEnabled) {
                return $next($request);
            } else {
                toastr()->error("Mohon maaf, pembayaran administrasi telah ditutup", "Form Administrasi Ditutup");
                return redirect()->back();
            }
        }
    }
}

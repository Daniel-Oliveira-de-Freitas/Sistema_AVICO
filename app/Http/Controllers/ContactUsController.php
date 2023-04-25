<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\FaleConoscoEmail;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /*
     * Handle the incoming request.
     *
     * @param ContactUsRequest $request
     */
    public function __invoke(ContactUsRequest $request)
    {
        Mail::to('avicobrasil@gmail.com')->send(new FaleConoscoEmail($request));
        return redirect()->back()->with("success", "Sua menssagem foi enviada!");
    }
}

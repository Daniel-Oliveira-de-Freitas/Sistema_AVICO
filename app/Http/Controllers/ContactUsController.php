<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsEmail;
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
        Mail::to('avicobrasil@gmail.com')->send(new ContactUsEmail($request));
        return redirect()->back()->with("success", "Sua mensagem foi enviada!");
    }
}

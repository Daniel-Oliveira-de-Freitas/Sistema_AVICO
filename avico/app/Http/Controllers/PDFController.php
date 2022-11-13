<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generate_pdf(Request $request){
        // $request = Request::all();
        // dd($request);
        $pdf = Pdf::loadView('layouts.pdf');
        return $pdf->setPaper('a4')->stream('teste.pdf');
    }
}
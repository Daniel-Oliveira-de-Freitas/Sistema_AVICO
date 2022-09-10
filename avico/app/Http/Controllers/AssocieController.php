<?php

namespace App\Http\Controllers;

use App\Busines\PersonBusines;
use App\Http\Requests\StoreRegistrationFormRequest;

class AssocieController extends Controller
{
    public function create()
    {
        return view('static_views.associados.associe');
    }
    
    private PersonBusines $business;
    
    public function store(StoreRegistrationFormRequest $request)
    {
        $this->business = new PersonBusines();
    
        $filesNameArray = [];
        $filesNameArray = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = $file->getClientOriginalName() . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $filepaths = 'files/' . $name;
                $filesNameArray[] = $name;
                $filesPathArray[] = $filepaths;
            }
        }
        $cadastro = $this->business->inserir($request, $filesNameArray, $filesNameArray);
        if ($cadastro) {
            return redirect()->back()
            ->with('success', 'messages.success_registration');
        }else{
            return redirect()->back()
            ->with('fail', 'messages.fail_registration');
        }
    }

}
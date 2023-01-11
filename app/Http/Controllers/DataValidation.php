<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente;
use Illuminate\Http\Request;

class DataValidation extends Controller
{
    public function store(Request $request)

    {



        $validator = $request->validated();



        if ($validator->fails()) {

            return redirect('validetortest')

                        ->withErrors($validator)

                        ->withInput();

        }

    }
}

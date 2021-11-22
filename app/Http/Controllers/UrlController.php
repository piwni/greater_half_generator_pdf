<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class UrlController extends Controller
{
    public function jsonData(Request $request)
    {
        $pdf = PDF::loadView('invoice', ["json_data" => $request->all()]);
        return $pdf->stream();
    }

}

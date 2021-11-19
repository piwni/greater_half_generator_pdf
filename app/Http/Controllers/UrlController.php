<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use PDF;
class UrlController extends Controller
{
    public function jsonData()
    {
        $json_data = Http::get("https://api.jsonbin.io/b/619769bb0ddbee6f8b0e902a/1");
       $jsonDataResponse = $json_data->json();
        $pdf = PDF::loadView('invoice', ["json_data" => $jsonDataResponse]);
        return $pdf->stream();
    }

}

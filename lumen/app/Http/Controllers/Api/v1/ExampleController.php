<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
// use Barryvdh\DomPDF\Facade\Pdf;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function index()
    {
        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

}

<?php

namespace App\Http\Controllers;



use Barryvdh\DomPDF\Facade\Pdf;

class UserManualController extends Controller
{
    public function show()
    {
        return view('user-manual');
    }

    public function exportPdf()
    {
        $pdf = PDF::loadView('user-manual', ['forPdf' => true]);
        return $pdf->download('user-manual.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use PDF;

class PdfController extends Controller
{
    public function generatePdf($id)
    {
        $rendezvous = RendezVous::findOrFail($id);

        $pdf = PDF::loadView('pdf.rendezvous', compact('rendezvous'));

        return $pdf->stream('rendezvous.pdf');
    }
}
